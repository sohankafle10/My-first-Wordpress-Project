<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zita
 * @since 1.0.0
 */
$zita_disable_title_dyn = get_post_meta($post->ID, 'zita_disable_title_dyn', true );
$zita_disable_feature_image_dyn = get_post_meta($post->ID, 'zita_disable_feature_image_dyn', true );
$zita_page_header_enable = get_theme_mod('zita_page_header_enable',false);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('zita-article'); ?>>
<?php if ($zita_page_header_enable != '1') { ?>
<div class="entry-header entry-page">
<?php	
 zita_page_feature_img_post_meta($zita_disable_feature_image_dyn); 
 echo esc_attr(zita_page_title_post_meta($zita_disable_title_dyn)); ?>
</div>
<?php } ?>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zita' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'zita' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post -->
