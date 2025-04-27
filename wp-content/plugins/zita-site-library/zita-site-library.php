<?php
/**
 * Plugin Name: Zita Site Library
 * Plugin URI: https://wpzita.com/zita-site-library
 * Description: Zita site library is a addon plugin for Zita WordPress theme. This plugin contain lot of pre made sites for nearly all niches (like : Corporate, E-commerce, Small businesses ). You can import these sites with a single click.
 * Version: 1.6.5
 * Author: themehunk
 * Author URI: https://wpzita.com
 * Text Domain: zita-site-library
 *
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! defined( 'ZITA_SITE_LIBRARY_VER' ) ) {
	define( 'ZITA_SITE_LIBRARY_VER', '1.6.5' );
}

if ( ! defined( 'ALLOW_UNFILTERED_UPLOADS' ) ) {
	define( 'ALLOW_UNFILTERED_UPLOADS', true );
}

if ( ! defined( 'ZITA_SITE_LIBRARY_NAME' ) ) {
	define( 'ZITA_SITE_LIBRARY_NAME', 'Zita Site Library');
}

if ( ! defined( 'ZITA_SITE_LIBRARY_FILE' ) ) {
	define( 'ZITA_SITE_LIBRARY_FILE', __FILE__ );
}


if ( ! defined( 'ZITA_SITE_LIBRARY_BASE' ) ) {
	define( 'ZITA_SITE_LIBRARY_BASE', plugin_basename( ZITA_SITE_LIBRARY_FILE ) );
}

if ( ! defined( 'ZITA_SITE_LIBRARY_DIR' ) ) {
	define( 'ZITA_SITE_LIBRARY_DIR', plugin_dir_path( ZITA_SITE_LIBRARY_FILE ) );
}

if ( ! defined( 'ZITA_SITE_LIBRARY_URI' ) ) {
	define( 'ZITA_SITE_LIBRARY_URI', plugins_url( '/', ZITA_SITE_LIBRARY_FILE ) );
}

function zita_site_library_text_domain(){
	$theme = wp_get_theme();
	$themeArr=array();
	$themeArr[] = $theme->get( 'TextDomain' );
	$themeArr[] = $theme->get( 'Template' );
	return $themeArr;
}

if ( ! function_exists( 'zita_site_library_setup' ) ) :
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	/**
	 * Zita Sites Setup
	 *
	 * @since 1.4.7
	 */
	function zita_site_library_setup() {
		$theme = zita_site_library_text_domain(); 
	    if(in_array("zita", $theme)){

	require_once ZITA_SITE_LIBRARY_DIR . 'inc/zita-site-library-page.php';
	require_once ZITA_SITE_LIBRARY_DIR . 'inc/admin-load-page.php';
	require_once ZITA_SITE_LIBRARY_DIR . 'notify/notify.php';

	}
}

	add_action( 'plugins_loaded', 'zita_site_library_setup' );

endif;