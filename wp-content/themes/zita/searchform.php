<?php
/**
 * Template for displaying search form
 *
 * @package Zita
 * @since 1.0.0
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="form-content">
		<input type="text" placeholder="<?php echo esc_attr_x(get_theme_mod('zita_search_placeholder_txt',  __( 'search..', 'zita' )), 'placeholder', 'zita' ); ?>" name="s" id="s" value="<?php echo get_search_query(); ?>"/>
		<input type="submit" value="<?php echo _x('Search', 'submit button', 'zita' ); ?>" />
	</div>
</form>

