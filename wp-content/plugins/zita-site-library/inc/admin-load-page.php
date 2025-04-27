<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Zita Site Library
 *
 */

if ( ! class_exists( 'Zita_Site_Library_Load' ) ) :

	class Zita_Site_Library_Load {

		public static $api_url;

		private static $_instance = null;

		public static function get_instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		/**
		 * Constructor.
		 *
		 */
		private function __construct() {

			//self::set_api_url();

			$this->includes();

			add_action( 'admin_notices', array( $this, 'add_notice' ), 1 );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
		}

		/**
		 * Add Admin Notice.
		 */
		function add_notice() {

			Zita_Site_Library_Notices::add_notice(
				array(
					'id'               => 'zita-theme-activation',
					'type'             => 'error',
					'show_if'          => ( ! defined( 'ZITA_THEME_SETTINGS' ) ) ? true : false,
					/* translators: 1: theme.php file*/
					'message'          => sprintf( __( 'Zita Theme needs to be active for you to use currently installed "%1$s" plugin. <a href="%2$s">Install & Activate Now</a>', 'zita-site-library' ), ZITA_SITE_LIBRARY_NAME, esc_url( admin_url( 'themes.php?theme=zita' ) ) ),
					'dismissible'      => true,
					'dismissible-time' => WEEK_IN_SECONDS,
				)
			);

		}

		/**
		 * Loads textdomain for the plugin.
		 *
		 * @since 1.0.1
		 */
		function load_textdomain() {
			load_plugin_textdomain( 'zita-templates' );
		}

		/**
		 * Admin Notices
		 *
		 * @since 1.0.5
		 * @return void
		 */
		function admin_notices() {

			if ( ! defined( 'ZITA_THEME_SETTINGS' ) ) {
				return;
			}

			add_action( 'plugin_action_links_' . ZITA_SITE_LIBRARY_BASE, array( $this, 'action_links' ) );
		}

		/**
		 * Show action links on the plugin screen.
		 *
		 * @param   mixed $links Plugin Action links.
		 * @return  array
		 */
		function action_links( $links ) {
			$action_links = array(
				'settings' => '<a href="' . admin_url( 'themes.php?page=zita-site-library' ) . '" aria-label="' . esc_attr__( 'See Library', 'zita-site-library' ) . '">' . esc_html__( 'See Library', 'zita-site-library' ) . '</a>',
			);

			return array_merge( $action_links, $links );
		}

		/**
		 * Enqueue admin scripts.
		 *
		 * @since  1.0.5    Added 'getUpgradeText' and 'getUpgradeURL' localize variables.
		 *
		 * @since  1.0.0
		 *
		 * @param  string $hook Current hook name.
		 * @return void
		 */
		public function admin_enqueue( $hook = '' ) {
			if ( 'appearance_page_zita-site-library' !== $hook && 'appearance_page_zita' !== $hook) {
				return;
			}

			// Admin Page.
			wp_enqueue_style( 'zita-site-library-admin', ZITA_SITE_LIBRARY_URI . 'assets/css/admin.css', ZITA_SITE_LIBRARY_VER, true );
			wp_enqueue_style( 'zita-site-library-drop-down', ZITA_SITE_LIBRARY_URI . 'assets/css/drop-down.css', ZITA_SITE_LIBRARY_VER, true );

			wp_enqueue_script( 'classie', ZITA_SITE_LIBRARY_URI . 'assets/js/classie.js', array( 'jquery'), ZITA_SITE_LIBRARY_VER, true );

			wp_enqueue_script( 'selectFx', ZITA_SITE_LIBRARY_URI . 'assets/js/selectFx.js', array( 'jquery'), ZITA_SITE_LIBRARY_VER, true );

			wp_enqueue_script( 'zita-site-library-admin-load', ZITA_SITE_LIBRARY_URI . 'assets/js/admin-load.js', array( 'jquery','wp-util', 'updates'), ZITA_SITE_LIBRARY_VER, true );

			$data = apply_filters(
				'zita_sites_localize_vars',
				array(
					'debug'           => ( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || isset( $_GET['debug'] ) ) ? true : false,
					'ajax_url'         => esc_url( admin_url( 'admin-ajax.php' ) ),
					'zita_nonce' 		=> wp_create_nonce( 'zita_site_nonce' ),
					'siteURL'         => site_url(),
					'getProText'      => __( 'Buy Now', 'zita-site-library' ),
					'getProURL'       => esc_url( 'https://themehunk.com/zita-pro-wordpress-theme' ),
					'getUpgradeText'  => __( 'Upgrade', 'zita-site-library' ),
					'getUpgradeURL'   => esc_url( 'https://themehunk.com/zita-pro-wordpress-theme' ),
					'zita_ajax_nonce'     => wp_create_nonce( 'zita-site-library' ),
					'requiredPlugins' => array(),
					'unique'         => array(
						'importFailedBtnSmall' => __( 'Error!', 'zita-site-library' ),
						'importFailedBtnLarge' => __( 'Error! Read Possibilities.', 'zita-site-library' ),
						'importFailedURL'      => esc_url( 'https://wpzita.com/docs/' ),
						'viewSite'             => __( 'Done! View Site', 'zita-site-library' ),
						'pluginActivating'        => __( 'Activating', 'zita-site-library' ) . '&hellip;',
						'pluginActive'            => __( 'Active', 'zita-site-library' ),
						'importFailBtn'        => __( 'Import failed.', 'zita-site-library' ),
						'importFailBtnLarge'   => __( 'Import failed. See error log.', 'zita-site-library' ),
						'importDemo'           => __( 'Import This Site', 'zita-site-library' ),
						'importingDemo'        => __( 'Importing..', 'zita-site-library' ),
						'DescExpand'           => __( 'Read more', 'zita-site-library' ) . '&hellip;',
						'DescCollapse'         => __( 'Hide', 'zita-site-library' ),
						'responseError'        => __( 'There was a problem receiving a response from server.', 'zita-site-library' ),
						'searchNoFound'        => __( 'No Demos found, Try a different search.', 'zita-site-library' ),
						'importWarning'        => __( "Executing Demo Import will make your site similar as ours. Please bear in mind -\n\n1. It is recommended to run import on a fresh WordPress installation.\n\n2. Importing site does not delete any pages or posts. However, it can overwrite your existing content.\n\n3. Copyrighted media will not be imported. Instead it will be replaced with placeholders.", 'zita-site-library' ),
						'importComplete'          => __( 'Import Complete..', 'zita-site-library' ),
						'importCustomizer'     => __( 'Importing Customizer', 'zita-site-library' ),
						'importXMLPreparing'      => __( 'Setting up import data..', 'zita-site-library' ),
						'importingXML'            => __( 'Importing Pages & Media..', 'zita-site-library' ),
						'importingWidgets'        => __( 'Importing Widgets..', 'zita-site-library' ),
						'importingOptions'        => __( 'Importing Options Data..', 'zita-site-library' ),
						'gettingData'             => __( 'Getting Site Information..', 'zita-site-library' ),
						'serverConfiguration'     => esc_url( 'https://wpzita.com/docs/?p=1314&utm_source=demo-import-panel&utm_campaign=import-error&utm_medium=wp-dashboard' ),
					),
				)
			);

			wp_localize_script( 'zita-site-library-admin-load', 'zitaAdmin', $data); 

		}

		/**
		 * Load all the required files in the importer.
		 *
		 * @since  1.0.0
		 */
		private function includes() {

			require_once ZITA_SITE_LIBRARY_DIR . 'inc/helper.php';
			require_once ZITA_SITE_LIBRARY_DIR . 'importer/wxr-importer.php';
			require_once ZITA_SITE_LIBRARY_DIR . 'inc/zita-option-data-import.php';
			require_once ZITA_SITE_LIBRARY_DIR . 'inc/import-widgets.php';
			require_once ZITA_SITE_LIBRARY_DIR . 'inc/admin-ajax.php';
			require_once ZITA_SITE_LIBRARY_DIR . 'inc/zita-notices.php';
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Zita_Site_Library_Load::get_instance();

endif;
