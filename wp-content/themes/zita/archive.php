<?php
/**
 * The template for displaying archive pages
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
$zita_page_header_enable = get_theme_mod('zita_page_header_enable',false);
$zita_blog_post_masnory_class = apply_filters( 'zita_blog_post_masnory_class','');?>
<div id="content" class="site-content <?php echo esc_attr(
$zita_containerarchive); ?>">
  <div id="container" class="site-container  archive-page <?php echo esc_attr(zita_sidebar_layout());?> <?php echo esc_attr($zita_blog_post_highlight_layout_class);?> <?php echo esc_attr($zita_blog_post_sixth_highlight_layout_class);?> <?php echo esc_attr($zita_blog_post_grid_layout_class);?> <?php echo esc_attr($zita_blog_post_add_space_layout_class);?> <?php echo esc_attr($zita_blog_post_remove_space_image_class);?> <?php echo esc_attr($blog_layout_classes);?>">
	<div id="primary" class="main content-area">
		<?php if ($zita_page_header_enable != '1') { ?>
		<div class="entry-header entry-page archive">
           <h1 class="entry-title"><?php the_archive_title();?></h1>
        </div>
    <?php	} ?>
		<main id="main" class="site-main" role="main">
			<div class="main-content-row <?php echo esc_attr($zita_blog_post_masnory_class);?>">
		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
            </div>
		</main><!-- #main -->
		<?php zita_post_loader();?>
	</div>
	<?php if(zita_sidebar_layout()!=='no-sidebar'): get_sidebar(); endif; ?>
  </div>
</div>
<?php get_footer();
