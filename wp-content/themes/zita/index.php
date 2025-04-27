<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zita
 * @since 1.0.0
 */
get_header(); 
$zita_blog_post_grid_layout_class = apply_filters( 'zita_blog_post_grid_layout_class','');
$zita_blog_post_highlight_layout_class = apply_filters( 'zita_blog_post_highlight_layout_class','');
$zita_blog_post_sixth_highlight_layout_class = apply_filters( 'zita_blog_post_sixth_highlight_layout_class','');
$zita_blog_post_add_space_layout_class = apply_filters( 'zita_blog_post_add_space_layout_class','');
$zita_blog_post_remove_space_image_class = apply_filters( 'zita_blog_post_remove_space_image_class','');
$blog_layout_classes = apply_filters( 'zita_blog_post_layout_class','');
$zita_containerarchive  = get_theme_mod('zita_containerarchive','');
$zita_blog_post_masnory_class = apply_filters( 'zita_blog_post_masnory_class','');
?>
<div id="content" class="site-content <?php echo esc_attr(
$zita_containerarchive); ?>">
<div id="container" class="site-container <?php echo esc_attr(zita_sidebar_layout());?>  <?php echo esc_attr($zita_blog_post_highlight_layout_class);?> <?php echo esc_attr($zita_blog_post_sixth_highlight_layout_class);?> <?php echo esc_attr($zita_blog_post_grid_layout_class);?> <?php echo esc_attr($zita_blog_post_add_space_layout_class);?> <?php echo esc_attr($zita_blog_post_remove_space_image_class);?> <?php echo esc_attr($blog_layout_classes);?> ">
	<div id="primary" class="main content-area">
		<main id="main" class="site-main" role="main">
			<div class="main-content-row <?php echo esc_attr($zita_blog_post_masnory_class);?>">
			<?php
			if( have_posts()):
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		  </div>
		</main><!-- #main -->
		<?php zita_post_loader();?>
	</div><!-- #primary -->
<?php if(zita_sidebar_layout()!=='no-sidebar'): get_sidebar(); endif; ?>
</div><!-- #container -->
</div><!-- #content -->
<?php get_footer();
