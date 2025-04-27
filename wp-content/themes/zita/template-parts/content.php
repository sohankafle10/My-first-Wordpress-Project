<?php
/**
 * Template part for displaying posts
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Zita
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('zita-article'); ?>>
	<?php
	$blog_layout_classes = apply_filters( 'zita_blog_post_layout_class','');
    ?>
	<div class="entry-content-outer-wrapper <?php echo esc_attr($blog_layout_classes);?>" >
	    <?php 
	    if($blog_layout_classes=='zta-blog-layout-1'){
	       zita_blog_post_thumbnai_and_title_order();
	       zita_the_excerpt();
	      } else { ?>
           <?php $no_thumb=''; if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
			<div class="post-img-wrapper">
		    <div class="post-img">
		    <?php echo apply_filters( 'zita_post_date_box','');?>
			<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_loop'); ?></a>
			</div>
	        </div>
			<?php }else{
				$no_thumb='no-thumb';
			} ?>    
		    <div class="entry-content-wrapper <?php echo esc_attr($no_thumb);?>">
		    <?php if($no_thumb=='no-thumb'){
		    	echo apply_filters( 'zita_post_date_box','');
		    }?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php zita_blog_get_post_meta();?>
			<?php zita_the_excerpt();?> 
		    </div>  
	      <?php }	 
		?>     
	</div>
</article>
