<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zita
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<!-- layout class call -->
<?php 
$zita_default_container    = get_theme_mod('zita_default_container','boxed');
$zita_main_header_layout   = get_theme_mod('zita_main_header_layout','mhdrleft');
$zita_above_header_layout  = get_theme_mod('zita_above_header_layout','abv-two');
$zita_bottom_header_layout = get_theme_mod('zita_bottom_header_layout','abv-two');
// add-pro-feature
$zita_container_site_layout = get_theme_mod('zita_container_site_layout','fullwidth');
// page post meta
if ((is_single() || is_page()) || ((class_exists( 'WooCommerce' ))&&(is_woocommerce() || is_checkout() || is_cart() || is_account_page()))
 ){
    if(class_exists( 'WooCommerce' ) && is_shop()){
               $shop_page_id = get_option( 'woocommerce_shop_page_id' );
               $postid=$shop_page_id;	
        }else{
	           $postid=$post->ID;	
             }
              $zita_transparent_header_dyn = get_post_meta($postid, 'zita_transparent_header_dyn', true );
              $zita_disable_main_header_dyn = get_post_meta($postid, 'zita_disable_main_header_dyn', true );
	          $zita_disable_above_header_dyn = get_post_meta($postid, 'zita_disable_above_header_dyn', true );
	          $zita_disable_bottom_header_dyn = get_post_meta($postid, 'zita_disable_bottom_header_dyn', true );
	          if(is_search() || is_404()){
                     $zita_sticky_header_dyn='';
               }else{
                     $zita_sticky_header_dyn = get_post_meta($postid, 'zita_sticky_header_dyn', true );
                   }
     }else{
      $zita_disable_above_header_dyn='';	
      $zita_disable_main_header_dyn='';
      $zita_disable_bottom_header_dyn='';
      $zita_transparent_header_dyn='';
      $zita_sticky_header_dyn='';
     }
?>
<!-- layout class call -->
<body <?php body_class(array(esc_attr($zita_default_container), esc_attr($zita_main_header_layout), esc_attr($zita_above_header_layout),esc_attr($zita_container_site_layout))); ?>>
<?php wp_body_open();?>		

<?php if(get_theme_mod('zita_scroll_to_top_disable')==false):?>	
<input type="hidden" id="back-to-top" value="on"/>
<?php endif;?>
<?php if(get_theme_mod('zita_stick_hide_scroll_down')==true):?>	
<input type="hidden" id="header-scroll-down-hide" value="on"/>
<?php endif;?>
<?php zita_preloader();?>
<div id="page" class="zita-site">
<header class="<?php echo esc_attr($zita_main_header_layout);?>  <?php if(function_exists('zita_sticky_above_header_class')){
	echo esc_attr(zita_sticky_above_header_class($zita_sticky_header_dyn));
}?> <?php if(function_exists('zita_sticky_main_header_class')){
	echo esc_attr(zita_sticky_main_header_class($zita_sticky_header_dyn));
}?> <?php if(function_exists('zita_sticky_bottom_header_class')){
	echo esc_attr(zita_sticky_bottom_header_class($zita_sticky_header_dyn));
}?> <?php if(function_exists('zita_stick_animation_class')){ echo esc_attr(zita_stick_animation_class());} ?> <?php echo esc_attr(zita_header_transparent_class($zita_transparent_header_dyn));?>">
<a class="skip-link screen-reader-text" href="#content" aria-label="Skip Content"><?php esc_html_e( 'Skip to content', 'zita' ); ?></a>
	<?php if($zita_main_header_layout=='mhdrrightpan' || $zita_main_header_layout=='mhdrleftpan'):?>
		<div class="header-pan-icon">
		<span class="pan-icon">
		</span>
		</div>
		<div class="pan-content">
		<div class="container">
		<?php zita_logo();?>
	    </div>
	<?php endif;?>
    <!-- minbar header -->
	<?php if($zita_main_header_layout=='mhdminbarleft' || $zita_main_header_layout=='mhdminbarright' ){?>
	<?php zita_minbar_header_markup();?>
	<div class="pan-content">	
	<?php } 
	if($zita_main_header_layout=='mhdminbarbtm'){
        zita_bottombar_header_markup();?>
   <div class="pan-content">	
    <?php }
		?>
    <!-- end minbar header -->
	<!-- top-header start -->
	<?php 
	zita_header_abv_post_meta($zita_disable_above_header_dyn);
    zita_header_main_post_meta($zita_disable_main_header_dyn);
	zita_header_btm_post_meta($zita_disable_bottom_header_dyn); ?>
	<!-- bottom-header end-->
    <?php if($zita_main_header_layout=='mhdrrightpan' || $zita_main_header_layout=='mhdrleftpan'):?>
	</div>
	<?php endif;?>
	<?php if($zita_main_header_layout=='mhdminbarleft'  || $zita_main_header_layout=='mhdminbarright' || $zita_main_header_layout=='mhdminbarbtm'){?>
	</div>	
	<?php } ?>
</header>

<?php
//Page Header 
if ( isset($post->ID) ) {
$id=$post->ID;
$zita_disable_page_header_dyn = get_post_meta($id, 'zita_disable_page_header_dyn', true );
$zita_page_header_enable = get_theme_mod('zita_page_header_enable',false);

if ($zita_page_header_enable == '1' && $zita_disable_page_header_dyn !=='on') {
zita_page_header_markup($id);
}
}
else{ ?>
	<div class="zita-pageheader">
		<?php zita_page_header_image_for_archive(); ?>
	</div>
<?php }
