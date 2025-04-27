<?php
/**
 * Zita functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zita
 * @since 1.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'zita_setup' ) ) :
define( 'ZITA_THEME_VERSION','1.6.6');
define( 'ZITA_THEME_DIR', get_template_directory() . '/' );
define( 'ZITA_THEME_URI', get_template_directory_uri() . '/' );
define( 'ZITA_THEME_SETTINGS', 'zita-settings' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zita_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'zita' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'editor-styles' );

		add_editor_style( 'editor.css' );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'custom-spacing' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', apply_filters( 'zita_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
		) ) );
		// Add support for Custom Background.
        $args = array(
	    'default-color' => 'f1f1f1',
        );
        add_theme_support( 'custom-background',$args );

		
        add_theme_support( 'recommend-plugins', array(
			'zita-site-library' => array(
					'name' => esc_html__( 'Zita Site Library (Highly Recommended)', 'zita' ),
					 'img' => 'icon-128x128.png',
					 'pro_link' => '',
					'active_filename' => 'zita-site-library/zita-site-library.php',
				),
			'vayu-blocks' => array(
			   'name' => esc_html__( 'Vayu Blocks – Gutenberg Blocks for WordPress & WooCommerce', 'zita' ),
			   'img' => 'icon-128x128.png',
			   'pro_link' => esc_url(''),
			   'active_filename' => 'vayu-blocks/vayu-blocks.php',
			   'pro-plugin' => array('slug'=>'vayu-blocks',
								   'init'=>'vayu-blocks-pro/vayu-blocks.php',
								   'admin_link'=>'vayu-blocks',
								   'docs'=>esc_url('https://themehunk.com/docs/vayu-blocks/'),
								   )
		   ),
		   'th-advance-product-search' => array(
			   'name' => esc_html__( 'Th Advance Product Search', 'zita' ),
			   'img' => 'icon-128x128.gif',
			   'pro_link' => esc_url('https://themehunk.com/advance-product-search/'),
			   'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
			   'pro-plugin' => array('slug'=>'th-advance-product-search-pro',
								   'init'=>'th-advance-product-search-pro/th-advance-product-search-pro.php',
									'admin_link'=>'th-advance-product-search-pro',
									'docs'=>esc_url('https://themehunk.com/docs/th-advance-product-search/'),

								   )
		   ),
			'th-all-in-one-woo-cart' => array(
			   'name' => esc_html__( 'Th All In One Woo Cart', 'zita' ),
			   'img' => 'icon-128x128.gif',
			   'pro_link' => esc_url('https://themehunk.com/th-all-in-one-woo-cart/'),
			   'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
			   'pro-plugin' => array('slug'=>'th-all-in-one-woo-cart-pro',
								   'init'=>'th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php',
									'admin_link'=>'th-all-in-one-woo-cart-pro',
									'docs'=>esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/'),
								   )
		   ),
		   'th-product-compare' => array(
			   'name' => esc_html__( 'Th Product Compare', 'zita' ),
			   'img' => 'icon-128x128.gif',
			   'pro_link' => esc_url('https://themehunk.com/th-product-compare/'),
			   'active_filename' => 'th-product-compare/th-product-compare.php',
			   'pro-plugin' => array('slug'=>'th-product-compare-pro',
								   'init'=>'th-product-compare-pro/th-product-compare-pro.php',
									'admin_link'=>'th-product-compare-pro',
									'docs'=>esc_url('https://themehunk.com/docs/th-product-compare/'),

								   )
		   ),
		   'lead-form-builder' => array(
			   'name' => esc_html__( 'Lead Form Builder', 'zita' ),
			   'img' => 'icon-128x128.png',
			   'pro_link' => esc_url('https://themehunk.com/product/lead-form-builder-pro/'),
			   'active_filename' => 'lead-form-builder/lead-form-builder.php',
			   'pro-plugin' => array('slug'=>'lead-form-builder',
								   'init'=>'lead-form-builder/init.php',
									 'admin_link'=>'wplf-plugin-menu',
									 'docs'=>esc_url('https://themehunk.com/docs/lead-form-builder-pro/'),
								   )
		   ),
		   'th-variation-swatches' => array(
			'name' => esc_html__( 'Th Variation Swatches', 'zita' ),
			'img' => 'icon-128x128.gif',
			'pro_link' => esc_url('https://themehunk.com/th-variation-swatches/'),
			'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
			'pro-plugin' => array('slug'=>'th-variation-swatches',
								'init'=>'th-variation-swatches-pro/th-variation-swatches-pro.php',
								 'admin_link'=>'th-variation-swatches',
								 'docs'=>esc_url('https://themehunk.com/docs/th-variation-swatches-plugin/'),
								)
		),
		   'wp-popup-builder' => array(
			   'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'zita' ),
			   'img' => 'icon-128x128.png',
			   'pro_link' => esc_url('https://themehunk.com/wp-popup-builder-pro/'),
			   'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
			   'pro-plugin' => array('slug'=>'wp-popup-builder',
								   'init'=>'wp-popup-builder-pro/wp-popup-builder.php',
								   'admin_link'=>'wppb',
								   'docs'=>esc_url('https://themehunk.com/docs/wp-popup-builder-pro/'),
								   )
		   )
		   
	   ) );
	}
endif;
add_action( 'after_setup_theme', 'zita_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zita_content_width(){
	$GLOBALS['content_width'] = apply_filters( 'zita_content_width', 640 );
}
add_action( 'after_setup_theme', 'zita_content_width', 0 );
/**
 * Register widget area.
 */
function zita_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'zita' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="zita-widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'bbPress Sidebar', 'zita' ),
		'id'            => 'zita-bbpress',
		'description'   => esc_html__( 'Add widgets here to appear in your bbPress sidebar.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="zita-widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'zita' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'zita' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'zita' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Below Header First Widget', 'zita' ),
		'id'            => 'bottom-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in below header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Below Header Second Widget', 'zita' ),
		'id'            => 'bottom-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in below header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Below Header Third Widget', 'zita' ),
		'id'            => 'bottom-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in below header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Main Header Widget', 'zita' ),
		'id'            => 'main-header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in main header.', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'zita' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in Top Footer', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'zita' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in Top Footer', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'zita' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in Top Footer', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'zita' ),
		'id'            => 'footer-bottom-first',
		'description'   => esc_html__( 'Add widgets here to appear in below footer', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'zita' ),
		'id'            => 'footer-bottom-second',
		'description'   => esc_html__( 'Add widgets here to appear in below footer','zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'zita' ),
		'id'            => 'footer-bottom-third',
		'description'   => esc_html__( 'Add widgets here to appear in below Footer', 'zita' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	for ( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'zita' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
}
add_action( 'widgets_init', 'zita_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function zita_scripts(){
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'zita-font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome.css', '', '4.7.0' );
	wp_enqueue_style( 'zita-menu-style', get_template_directory_uri(). '/css/zita-menu.css','', '1.0.0');
	wp_enqueue_style( 'zita-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_add_inline_style( 'zita-style', zita_typography_style());
	wp_add_inline_style( 'zita-style', zita_custom_style());
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script("jquery-effects-core",array( 'jquery' ));
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
    if (class_exists( 'WooCommerce' ) ){
    wp_enqueue_script( 'zita-woocommerce-js', get_parent_theme_file_uri().'/inc/woocommerce/js/woocommerce.js', array( 'jquery' ), '', true );
     }
    wp_enqueue_script( 'zita-menu-js', get_parent_theme_file_uri().'/js/zita-menu.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'zita-custom-js', get_parent_theme_file_uri().'/js/zita-custom.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'zita_scripts' );
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function zita_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'zita_skip_link_focus_fix' );
if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
/**
 * Load init.
 */
require_once trailingslashit( get_template_directory()).'inc/init.php';

// Add block patterns
require get_template_directory() . '/block-pattern.php';