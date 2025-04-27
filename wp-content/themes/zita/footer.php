<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Zita
 * @since 1.0.0
 */ 
if ( is_single() || is_page() ){
$zita_disable_above_footer_dyn  = get_post_meta( $post->ID, 'zita_disable_above_footer_dyn', true );
$zita_disable_footer_widget_dyn = get_post_meta( $post->ID, 'zita_disable_footer_widget_dyn', true ); 
$zita_disable_bottom_footer_dyn = get_post_meta( $post->ID, 'zita_disable_bottom_footer_dyn', true ); 
}else{
$zita_disable_above_footer_dyn  ='';
$zita_disable_footer_widget_dyn ='';
$zita_disable_bottom_footer_dyn ='';
}
?>
<footer id="zita-footer">
	
	<div class="footer-wrap widget-area">
	<?php 
		zita_footer_abv_post_meta($zita_disable_above_footer_dyn);
		zita_footer_widget_post_meta($zita_disable_footer_widget_dyn);
	    zita_footer_bottom_post_meta($zita_disable_bottom_footer_dyn);
	?>
	</div>
	<?php if(get_theme_mod('zita_stick_footer_active')==true){ ?>
<div class="footer-sticky-icon">
	<span class="footer-icon">
	</span>
</div>
<?php } ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>