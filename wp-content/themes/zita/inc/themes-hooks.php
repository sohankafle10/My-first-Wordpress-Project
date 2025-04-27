<?php /**
 * Theme Hook.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018,Zita
 * @since       Zita 1.0.0
 */
/**
 * Main Header
 */
function zita_main_header(){
	do_action( 'zita_main_header' );
}
/**
 * top Header
 */
function zita_top_header(){
	do_action( 'zita_top_header' );
}
/**
 * bottom Header
 */
function zita_bottom_header(){
	do_action( 'zita_bottom_header' );
}
/**
 * above Footer 
 */
function zita_top_footer(){
	do_action( 'zita_top_footer' );
}
/**
 * widget Footer 
 */
function zita_widget_footer(){
	do_action( 'zita_widget_footer' );
}
/**
 * bottom Footer 
 */
function zita_bottom_footer(){
	do_action( 'zita_bottom_footer' );
}

/**
 * Blog post layout before
 */
function zita_blog_post_before_feature_image(){
	do_action( 'zita_blog_post_before_feature_image' );
}
/**
 * Blog post layout after
 */
function zita_blog_post_after_feature_image(){
	do_action( 'zita_blog_post_after_feature_image' );
}

