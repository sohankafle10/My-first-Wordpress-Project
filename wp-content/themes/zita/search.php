<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Zita
 * @since 1.0.0
 */
get_header(); 
$zita_blog_post_grid_layout_class = apply_filters( 'zita_blog_post_grid_layout_class','');
$zita_blog_post_highlight_layout_class = apply_filters( 'zita_blog_post_highlight_layout_class','');
$zita_blog_post_add_space_layout_class = apply_filters( 'zita_blog_post_add_space_layout_class','');
$zita_blog_post_sixth_highlight_layout_class = apply_filters( 'zita_blog_post_sixth_highlight_layout_class','');
$zita_blog_post_remove_space_image_class = apply_filters( 'zita_blog_post_remove_space_image_class','');
$blog_layout_classes = apply_filters( 'zita_blog_post_layout_class','');
$zita_containerarchive  = get_theme_mod('zita_containerarchive','');
?>
<div id="content" class="site-content <?php echo esc_attr(
$zita_containerarchive); ?>">
<div id="container" class="site-container search-page <?php echo esc_attr(zita_sidebar_layout());?>  <?php echo esc_attr($zita_blog_post_highlight_layout_class);?> <?php echo esc_attr($zita_blog_post_sixth_highlight_layout_class);?> <?php echo esc_attr($zita_blog_post_grid_layout_class);?> <?php echo esc_attr($zita_blog_post_add_space_layout_class);?> <?php echo esc_attr($zita_blog_post_remove_space_image_class);?> <?php echo esc_attr($blog_layout_classes);?> ">
	<div id="primary" class="main content-area">
		<main id="main" class="site-main" role="main">
			<div class="main-content-row ">
			<?php
			if( have_posts()): ?>

				<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'zita' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				get_template_part( 'template-parts/content', 'search' );
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
