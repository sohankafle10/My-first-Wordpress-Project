<?php
/** 
 * Class Zita WXR Importer
 *
 * @since  1.0.0
 */

defined( 'ABSPATH' ) or exit;

class Zita_Site_Library_WXR_Importer {

	/**
	 * Instance of Zita_Site_Library_WXR_Importer
	 *
	 * @since  1.0.0
	 * @var Zita_Site_Library_WXR_Importer
	 */
	private static $_instance = null;

	/**
	 * Instantiate Zita_Site_Library_WXR_Importer
	 *
	 * @since  1.0.0
	 * @return (Object) Zita_Site_Library_WXR_Importer.
	 */
	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	private function __construct() {

		if ( ! class_exists( 'WP_Importer' ) ) {
			defined( 'WP_LOAD_IMPORTERS' ) || define( 'WP_LOAD_IMPORTERS', true );
			require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
		}

		if ( ! class_exists( 'WP_Importer_Logger' ) ) {
			require_once ZITA_SITE_LIBRARY_DIR . 'importer/class-logger.php';
		}

		if ( ! class_exists( 'WP_Importer_Logger_ServerSentEvents' ) ) {
			require_once ZITA_SITE_LIBRARY_DIR . 'importer/class-wp-importer-logger-serversentevents.php';
		}

		$this->elementor_competibilty();
		if ( ! class_exists( 'WXR_Importer' ) ) {
			require_once ZITA_SITE_LIBRARY_DIR . 'importer/class-wxr-importer.php';
		}

		if ( ! class_exists( 'WXR_Import_Info' ) ) {
			require_once ZITA_SITE_LIBRARY_DIR . 'importer/class-wxr-import-info.php';
		}

		add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) );
		add_action( 'wp_ajax_zita-wxr-import', array( $this, 'xml_data_import' ) );
		add_filter( 'wxr_importer.pre_process.user', '__return_null' );
	}

	/**
	 * Constructor.
	 *
	 * @since  1.1.0
	 */
	function xml_data_import() {
		if ( isset( $_REQUEST['zita_nonce'] ) && wp_verify_nonce( $_REQUEST['zita_nonce'], 'zita_sl_nonce' ) ) {


			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}

			
			// Nonce is valid; process form data
			// Start the event stream.
			header( 'Content-Type: text/event-stream' );

			// Turn off PHP output compression.
			$previous = error_reporting( error_reporting() ^ E_WARNING );
			ini_set( 'output_buffering', 'off' );
			ini_set( 'zlib.output_compression', false );
			error_reporting( $previous );

			if ( $GLOBALS['is_nginx'] ) {
				// Setting this header instructs Nginx to disable fastcgi_buffering
				// and disable gzip for this request.
				header( 'X-Accel-Buffering: no' );
				header( 'Content-Encoding: none' );
			}

			$xml_url = urldecode( $_REQUEST['xml_url'] );
			if ( empty( $xml_url ) ) {
				exit;
			}

			// 2KB padding for IE
			echo ':' . str_repeat( ' ', 2048 ) . "\n\n";

			// Time to run the import!
			set_time_limit( 0 );

			// Ensure we're not buffered.
			wp_ob_end_flush_all();
			flush();

			// Are we allowed to create users?
			add_filter( 'wxr_importer.pre_process.user', '__return_null' );

			// Keep track of our progress.
			add_action( 'wxr_importer.processed.post', array( $this, 'imported_post' ), 10, 2 );
			add_action( 'wxr_importer.process_failed.post', array( $this, 'imported_post' ), 10, 2 );
			add_action( 'wxr_importer.process_already_imported.post', array( $this, 'already_imported_post' ), 10, 2 );
			add_action( 'wxr_importer.process_skipped.post', array( $this, 'already_imported_post' ), 10, 2 );
			add_action( 'wxr_importer.processed.comment', array( $this, 'imported_comment' ) );
			add_action( 'wxr_importer.process_already_imported.comment', array( $this, 'imported_comment' ) );
			add_action( 'wxr_importer.processed.term', array( $this, 'imported_term' ) );
			add_action( 'wxr_importer.process_failed.term', array( $this, 'imported_term' ) );
			add_action( 'wxr_importer.process_already_imported.term', array( $this, 'imported_term' ) );
			add_action( 'wxr_importer.processed.user', array( $this, 'imported_user' ) );
			add_action( 'wxr_importer.process_failed.user', array( $this, 'imported_user' ) );
			// Flush once more.
			flush();

			$importer = $this->get_importer();
			$response = $importer->import( $xml_url );

			// Let the browser know we're done.
			$complete = array(
				'action' => 'complete',
				'error'  => false,
			);
			if ( is_wp_error( $response ) ) {
				$complete['error'] = $response->get_error_message();
			}

			$this->emit_sse_message( $complete );
			exit;

		}

	}

	/**
	 * Add .xml files as supported format in the uploader.
	 *
	 * @since 1.1.5 Added SVG file support.
	 *
	 * @since 1.0.0
	 *
	 * @param array $mimes Already supported mime types.
	 */
	public function custom_upload_mimes( $mimes ) {
		if ( current_user_can( 'manage_options' ) ) {
		// Allow SVG files.
		$mimes['svg']  = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';

		// Allow XML files.
		$mimes['xml'] = 'application/xml';
		}
		return $mimes;
	}

	/**
	 * Start the xml import.
	 *
	 * @since  1.0.0
	 *
	 * @param  (String) $path Absolute path to the XML file.
	 */
	public function get_xml_data( $path ) {

		$args = array(
			'action'  => 'zita-wxr-import',
			'id'      => '1',
			'xml_url' => $path,
			'zita_nonce' => wp_create_nonce('zita_sl_nonce'),
		);

		$url  = add_query_arg( urlencode_deep( $args ), admin_url( 'admin-ajax.php' ) );

		$data = $this->get_data( $path );

		return array(
			'count'   => array(
				'posts'    => $data->post_count,
				'media'    => $data->media_count,
				'users'    => count( $data->users ),
				'comments' => $data->comment_count,
				'terms'    => $data->term_count,
			),
			'url'     => $url,
			'strings' => array(
				'complete' => __( 'Import complete!', 'zita-templates' ),
			),
		);
	}

	/**
	 * Get XML data.
	 *
	 * @since 1.1.0
	 * @param  string $url Downloaded XML file absolute URL.
	 * @return array  XML file data.
	 */
	function get_data( $url ) {
		$importer = $this->get_importer();
		$data     = $importer->get_preliminary_information( $url );
		if ( is_wp_error( $data ) ) {
			return $data;
		}
		return $data;
	}

	/**
	 * Get Importer
	 *
	 * @since 1.1.0
	 * @return object   Importer object.
	 */
	public function get_importer() {
		$options  = apply_filters(
			'zita_site_library_xml_import_options', array(
				'fetch_attachments' => true,
				'default_author'    => get_current_user_id(),
			)
		);
		$importer = new WXR_Importer( $options );
		$logger   = new WP_Importer_Logger_ServerSentEvents();

		$importer->set_logger( $logger );
		return $importer;
	}

	/**
	 * Send message when a post has been imported.
	 *
	 * @since 1.1.0
	 * @param int   $id Post ID.
	 * @param array $data Post data saved to the DB.
	 */
	public function imported_post( $id, $data ) {
		$this->emit_sse_message(
			array(
				'action' => 'updateDelta',
				'type'   => ( 'attachment' === $data['post_type'] ) ? 'media' : 'posts',
				'delta'  => 1,
			)
		);
	}

	/**
	 * Send message when a post is marked as already imported.
	 *
	 * @since 1.1.0
	 * @param array $data Post data saved to the DB.
	 */
	public function already_imported_post( $data ) {
		$this->emit_sse_message(
			array(
				'action' => 'updateDelta',
				'type'   => ( 'attachment' === $data['post_type'] ) ? 'media' : 'posts',
				'delta'  => 1,
			)
		);
	}

	/**
	 * Send message when a comment has been imported.
	 *
	 * @since 1.1.0
	 */
	public function imported_comment() {
		$this->emit_sse_message(
			array(
				'action' => 'updateDelta',
				'type'   => 'comments',
				'delta'  => 1,
			)
		);
	}

	/**
	 * Send message when a term has been imported.
	 *
	 * @since 1.1.0
	 */
	public function imported_term() {
		$this->emit_sse_message(
			array(
				'action' => 'updateDelta',
				'type'   => 'terms',
				'delta'  => 1,
			)
		);
	}

	/**
	 * Send message when a user has been imported.
	 *
	 * @since 1.1.0
	 */
	public function imported_user() {
		$this->emit_sse_message(
			array(
				'action' => 'updateDelta',
				'type'   => 'users',
				'delta'  => 1,
			)
		);
	}

	/**
	 * Emit a Server-Sent Events message.
	 *
	 * @since 1.1.0
	 * @param mixed $data Data to be JSON-encoded and sent in the message.
	 */
	public function emit_sse_message( $data ) {
		echo "event: message\n";
		echo 'data: ' . wp_json_encode( $data ) . "\n\n";

		// Extra padding.
		echo ':' . str_repeat( ' ', 2048 ) . "\n\n";

		flush();
	}




public function elementor_competibilty() {

			/**
			 * Add Slashes
			 *
			 * @todo    Elementor already have below code which works on defining the constant `WP_LOAD_IMPORTERS`.
			 *          After defining the constant `WP_LOAD_IMPORTERS` in WP CLI it was not works.
			 *          Try to remove below duplicate code in future.
			 */
			if ( defined( 'WP_CLI' ) || ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.0.0', '>=' ) ) ) {
				remove_filter( 'wp_import_post_meta', array( 'Elementor\Compatibility', 'wp_import_post_meta' ) );
				remove_filter( 'wxr_importer.pre_process.post_meta', array( 'Elementor\Compatibility', 'wxr_importer_process_post_meta' ) );

				add_filter( 'wp_import_post_meta', array( $this, 'wp_import_post_meta' ) );
				add_filter( 'wxr_importer.pre_process.post_meta', array( $this, 'wxr_importer_process_post_meta' ) );
			}
		}

		/**
		 * Process post meta before WP importer.
		 *
		 * Normalize Elementor post meta on import, We need the `wp_slash` in order
		 * to avoid the unslashing during the `add_post_meta`.
		 */
		public function wp_import_post_meta( $post_meta ) {
			foreach ( $post_meta as &$meta ) {
				if ( '_elementor_data' === $meta['key'] ) {
					$meta['value'] = wp_slash( $meta['value'] );
					break;
				}
			}

			return $post_meta;
		}

		/**
		 * Process post meta before WXR importer.
		 *
		 */
		public function wxr_importer_process_post_meta( $post_meta ) {
			if ( '_elementor_data' === $post_meta['key'] ) {
				$post_meta['value'] = wp_slash( $post_meta['value'] );
			}

			return $post_meta;
		}




}

Zita_Site_Library_WXR_Importer::instance();
