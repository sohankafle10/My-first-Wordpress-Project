<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zita
 * @since 1.0.0
 */
get_header(); 
$page_post_meta_set         = get_post_meta( $post->ID, 'zita_sidebar_dyn', true );
$page_content_post_meta_set = get_post_meta( $post->ID, 'zita_content_dyn', true );
?>
<div id="content" class="site-content <?php echo esc_attr(zita_page_content_layout($page_content_post_meta_set,'')); ?>">
  <div id="container" class="site-container <?php echo esc_attr(zita_sidebar_layout($page_post_meta_set,''));?>">
	<div id="primary" class="main content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				 get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div>
	<?php if(zita_sidebar_layout($page_post_meta_set,'')!=='no-sidebar'): get_sidebar(); endif; ?>
</div>
</div><!-- #primary -->
<?php get_footer();
