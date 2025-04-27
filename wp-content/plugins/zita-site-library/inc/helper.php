<?php
/**
 * Zita Site Library
 *
 * @since  1.0.0
 * @package wpzita
 */

defined( 'ABSPATH' ) or exit;

if ( ! class_exists( 'Zita_Site_Library_Helper' ) ) :

	class Zita_Site_Library_Helper {
		/**
		 * Instance of zita_site_library
		 *
		 * @since  1.0.0
		 * @var (Object) zita_site_library
		 */
		private static $_instance = null;

		/**
		 * Instance of zita_site_library.
		 *
		 * @since  1.0.0
		 *
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}


		/**
		 * Download File Into Uploads Directory
		 *
		 * @param  string $file Download File URL.
		 * @return array        Downloaded file data.
		 */
		static public  function download_file( $file = '' ) {

			// Gives us access to the download_url() and wp_handle_sideload() functions.
			require_once( ABSPATH . 'wp-admin/includes/file.php' );

			$timeout_seconds = 55;

			// Download file to temp dir.
			$temp_file = download_url( $file, $timeout_seconds );

			// WP Error.
			if ( is_wp_error( $temp_file ) ) {
				return array(
					'success' => false,
					'data'    => $temp_file->get_error_message(),
				);
			}

			// Array based on $_FILE as seen in PHP file uploads.
			$file_args = array(
				'name'     => basename( $file ),
				'tmp_name' => $temp_file,
				'error'    => 0,
				'size'     => filesize( $temp_file ),
			);

			$overrides = array(

				// Tells WordPress to not look for the POST form
				// fields that would normally be present as
				// we downloaded the file from a remote server, so there
				// will be no form fields
				// Default is true.
				'test_form'   => false,

				// Setting this to false lets WordPress allow empty files, not recommended.
				// Default is true.
				'test_size'   => true,

				// A properly uploaded file will pass this test. There should be no reason to override this one.
				'test_upload' => true,

			);

			// Move the temporary file into the uploads directory.
			$results = wp_handle_sideload( $file_args, $overrides );

			if ( isset( $results['error'] ) ) {
				return array(
					'success' => false,
					'data'    => $results,
				);
			}

			// Success.
			return array(
				'success' => true,
				'data'    => $results,
			);
		}

		/**
		 * Downloads an image from the specified URL.
		 *
		 * Taken from the core media_sideload_image() function and
		 * modified to return an array of data instead of html.
		 *
		 * @since 1.0.10
		 *
		 * @param string $file The image file path.
		 * @return array An array of image data.
		 */
		static public function _sideload_image( $file ) {
			$data = new stdClass();

			if ( ! function_exists( 'media_handle_sideload' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/media.php' );
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
			}

			if ( ! empty( $file ) ) {

				// Set variables for storage, fix file filename for query strings.
				preg_match( '/[^\?]+\.(jpe?g|jpe|svg|gif|png)\b/i', $file, $matches );
				$file_array         = array();
				$file_array['name'] = basename( $matches[0] );

				// Download file to temp location.
				$file_array['tmp_name'] = download_url( $file );

				// If error storing temporarily, return the error.
				if ( is_wp_error( $file_array['tmp_name'] ) ) {
					return $file_array['tmp_name'];
				}

				// Do the validation and storage stuff.
				$id = media_handle_sideload( $file_array, 0 );

				// If error storing permanently, unlink.
				if ( is_wp_error( $id ) ) {
					unlink( $file_array['tmp_name'] );
					return $id;
				}

				// Build the object to return.
				$meta                = wp_get_attachment_metadata( $id );
				$data->attachment_id = $id;
				$data->url           = wp_get_attachment_url( $id );
				$data->thumbnail_url = wp_get_attachment_thumb_url( $id );
				$data->height        = $meta['height'];
				$data->width         = $meta['width'];
			}

			return $data;
		}

		/**
		 * Checks to see whether a string is an image url or not.
		 *
		 * @since 1.0.10
		 *
		 * @param string $string The string to check.
		 * @return bool Whether the string is an image url or not.
		 */
		static public function _is_image_url( $string = '' ) {
			if ( is_string( $string ) ) {

				if ( preg_match( '/\.(jpg|jpeg|png|gif)/i', $string ) ) {
					return true;
				}
			}

			return false;
		}



/**
	 * Import customizer options.
	 *
	 * @since  1.0.0
	 *
	 * @param  (Array) $options customizer options from the demo.
	 */
	static public function import( $options ) {
		// Update zita Theme customizer settings.
		if ( isset( $options['zita-settings'] ) ) {
			self::_import_settings($options['zita-settings']);
		}

		// Add Custom CSS.
		if ( isset( $options['custom-css'] ) ) {
			wp_update_custom_css_post( $options['custom-css'] );
		}

	}

	/**
	 * Import zita Setting's
	 *
	 * Download & Import images from zita Customizer Settings.
	 *
	 * @since 1.0.10
	 *
	 * @param  array $options zita Customizer setting array.
	 * @return void
	 */
static public function _import_settings( $options = array() ) {
		if(defined('ZITA_THEME_SETTINGS')){

		$theme_mods = 'theme_mods_'.get_option('stylesheet');

			foreach ( $options as $key => $val ) {
				if ( self::_is_image_url( $val ) ) {
					$data = self::_sideload_image( $val );

					if ( ! is_wp_error( $data ) ) {
						$options[ $key ] = $data->url;
					}
				}
			}
		update_option( $theme_mods, $options );
		update_option( 'zita-settings', $options );

	 	}
	}
}

		Zita_Site_Library_Helper::get_instance();

endif;