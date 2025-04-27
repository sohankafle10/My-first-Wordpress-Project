<?php
/**
 * Zita Theme Options
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/**
 * Theme Options
 */
if ( ! class_exists( 'Zita_Theme_Options' ) ) {
	/**
	 * Theme Options
	 */
	  class Zita_Theme_Options {
		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;
		/**
		 * Post id.
		 *
		 * @var $instance Post id.
		 */
		public static $post_id = null;
		/**
		 * A static option variable.
		 *
		 * @since 1.0.0
		 * @access private
		 * @var mixed $db_options
		 */
		private static $db_options;
		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			// Refresh options variables after customizer save.
			add_action( 'after_setup_theme', array( $this, 'refresh' ) );

		}

		/**
		 * Set default theme option values
		 *
		 * @since 1.0.0
		 * @return default values of the theme.
		 */
		public static function defaults(){
			// Defaults list of options.
			return apply_filters(
				'zita_theme_defaults', array(	
	
			    'zita-blog-single-structure-meta'    => array(
						'image',
						'title'
					),
			    'zita-blog-meta-single'    => array(
						'comments',
						'category',
						'author',
						'date',
					),
			    'zita-blog-structure-meta'    => array(
						'image',
						'title'
					),
			    'zita-blog-meta'    => array(
						'comments',
						'category',
						'author',
						'date',
					),
				)
			);
		}
		/**
		 * Get theme options from static array()
		 *
		 * @return array Return array of theme options.
		 */
		public static function get_options(){
			return self::$db_options;
		}
		/**
		 * Update theme static option array.
		 */
		public static function refresh() {
			self::$db_options = wp_parse_args(
				get_option( ZITA_THEME_SETTINGS ),
				self::defaults()
			);
		}
	}
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Zita_Theme_Options::get_instance();
