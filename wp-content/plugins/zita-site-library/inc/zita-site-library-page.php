<?php // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Zita_Site_Library_Page' ) ) {

	/**
	 * Zita Admin Settings
	 */
	class Zita_Site_Library_Page {
		static public $plugin_slug = 'zita-site-library';

		/**
		 * Constructor
		 */
		function __construct() {

			if ( ! is_admin() ) {
				return;
			}

		add_action( 'init', __CLASS__ . '::init_admin_settings', 99 );
		add_shortcode('zita_site',  __CLASS__ . '::menu_callback'); 
		add_action( 'zita_site_library_cate', __CLASS__ . '::zita_site_library_cate_menu', 10, 2 );

		}


		/**
		 * Admin settings init
		 */
		static public function init_admin_settings() {

			if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], self::$plugin_slug ) !== false ) {

				// Let extensions hook into saving.
				self::save_settings();
			}

		add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 100 );
		add_action( 'zita_templates_menu_action', __CLASS__ . '::general_page' );


		}

static public function add_admin_menu() {

			$parent_page    = 'themes.php';
			$page_title     = __('Zita Site Library','zita-site-library');
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::menu_callback';

			add_theme_page( $page_title, $page_title, $capability, $page_menu_slug, $page_menu_func );
		}

		/**
		 * Save All admin settings here
		 */
		static public function save_settings() {

			// Only admins can save settings.
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
		}


	static public	function zita_site_library_cate_menu(){ ?>
			<div id="zita-site-library-filters" class="wp-filter hide-if-no-js">

	<div class="section-left">

			<!-- All Filters -->
			<div class="filter-count" style="display:none;">
				<span class="count"></span>
			</div>
					<div class="filters-wrap">
				<div id="zita-site-library-page-builder">
				<select id='zsl-demo-type' class="cs-select cs-skin-elastic zsl-demo-type" style="display:none;">
					<option value="" disabled selected>Select Builder</option>
					<option value='elementor' data-class="builder-elementor"><?php _e('Elementor','zita-site-library') ?></option>
					<option value='brizy' data-class="builder-brizy"><?php _e('Brizy','zita-site-library') ?></option>
					</select>
				</div>			
			</div>
		</div> <!-- Section Left -->

		<div class="section-right">
			<div class="filters-wrap">
				<div id="zita-site-library-category"></div>
				<!-- <php if(get_option( 'zita_license_key')!=''){ ?>
					<a href='themes.php?page=zita-site-library&site-key'   class="zita-site-key-link activated"><php _e('Pro Template Activated','zita-site-library'); ?></a>
				<php } else{ ?>
					<a href='themes.php?page=zita-site-library&site-key' class="zita-site-key-link"><php _e('Activate Pro Websites','zita-site-library'); ?></a>
				<php } ?> -->
			</div>
			<div class="search-form" style="display:none;">
				<label class="screen-reader-text" for="wp-filter-search-input"><?php _e( 'Search Sites', 'zita-site-library' ); ?> </label>
				<input placeholder="<?php _e( 'Search Sites...', 'zita-site-library' ); ?>" type="search" aria-describedby="live-search-desc" id="wp-filter-search-input" class="wp-filter-search">
			</div>

		</div>
	</div>
	
			<?php 
}

		/**
		 * Menu callback
		 *
		 * @since 1.0.6
		 */
		static public function menu_callback() {
			?>
			<div class="zita-sites-menu-page-wrapper">
				<?php do_action( 'zita_templates_menu_action'); ?>
			</div>
			<?php
		}

		static public function general_page() {
			?>
						<div class="zita-sites-menu-page-wrapper">

<?php
			require_once ZITA_SITE_LIBRARY_DIR . 'inc/admin-tmpl.php';
			?>

						</div>

<?php

		}
}
	new Zita_Site_Library_Page;
}