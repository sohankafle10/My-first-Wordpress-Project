<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zita
 * @since 1.0.0
 */
get_header();
$zita_containerpage     = get_theme_mod('zita_containerpage','');?>
<div id="content" class="site-content <?php echo esc_attr($zita_containerpage); ?>">
  <div id="container" class="site-container no-sidebar">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
          <article id="error-404" class="zita-article">
			<div class="error-404 not-found">
				<div class="error-heading">
					<h2><?php esc_html_e( '404', 'zita' ); ?></h2>
					<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'zita' ); ?></h3>
				</div><!-- .error-heading -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'zita' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-404',
					'depth'          => 1,
					'container'      => 'div',
					'container_id'   => 'quick-links-404',
					'fallback_cb'    => false,
					) );
				?>
			</div><!-- .error-404 -->
          </article>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</div>
<?php
get_footer();