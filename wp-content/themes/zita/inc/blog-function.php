<?php 
/**
 * Blog Function for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/**
 * Common Functions for Blog and Single Blog
 *
 * @return  post meta
 */
if ( ! function_exists( 'zita_get_post_meta' ) ){
	/**
	 * Post meta
	 *
	 * @param  string $post_meta Post meta.
	 * @param  string $separator Separator.
	 * @return string            post meta markup.
	 */
	function zita_get_post_meta( $post_meta, $separator = '/' ){
		$output_str = '';
		$loop_count = 1;
		$post_id      = get_the_ID();

		foreach ( $post_meta as $meta_value ) {

			switch ( $meta_value ) {

				case 'author':
					$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
					$output_str .= esc_html( zita_default_strings( 'string-blog-meta-author-by', false ) ) . zita_post_author();
					break;

				case 'date':
					$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
					$output_str .= zita_post_date();
					break;

				case 'category':
					$category = zita_post_categories();
					if ( '' != $category ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $category;
					}
					break;

				case 'tag':
					$tags = zita_post_tags();
					if ( '' != $tags ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $tags;
					}
					break;

				case 'comments':
					$comment = zita_post_comments();
					if ( '' != $comment ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $comment;
					}
					break;
				case 'read-time':
					$read_time = zita_calculate_reading_time($post_id);
					$time_unit    = __( ' min ', 'zita' );
			        $time_postfix = __( ' read ', 'zita' );
					if ( '' != $read_time ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= '<span class="zta-reading-time">' . $read_time . $time_unit . $time_postfix . '</span>';
					}
					break;
				default:
					$output_str = apply_filters( 'zita_meta_case_' . $meta_value, $output_str, $loop_count, $separator );

			}

			$loop_count ++;
		}

		return $output_str;
	}
}
if ( ! function_exists( 'zita_calculate_reading_time' ) ){ 
         /**
		 * Calculate reading time.
		 *
		 * @since 1.0
		 *
		 * @param  int $post_id Post content.
		 * @return int read time.
		 */
		function zita_calculate_reading_time( $post_id ){
			$post_content       = get_post_field( 'post_content', $post_id );
			$stripped_content   = strip_shortcodes( $post_content );
			$strip_tags_content = strip_tags( $stripped_content );
			$word_count         = str_word_count( $strip_tags_content );
			$reading_time       = ceil( $word_count / 220 );
			return $reading_time;
		}
    }
	if ( ! function_exists( 'zita_post_date' ) ){
	/**
	 * Function to get Date of Post
	 *
	 * @return html                Markup.
	 */
	function zita_post_date(){
		$output        = '';
		$format        = apply_filters( 'zita_post_date_format', '' );
		$time_string   = esc_html( get_the_date( $format ) );
		$modified_date = esc_html( get_the_modified_date( $format ) );
		$posted_on     = sprintf(
			esc_html( '%s' ),
			$time_string
		);
		$modified_on   = sprintf(
			esc_html( '%s' ),
			$modified_date
		);
		$output       .= '<span class="posted-on">';
		$output       .= '<span class="published" itemprop="datePublished"> ' . $posted_on . '</span>';
		// $output       .= '<span class="updated" itemprop="dateModified"> ' . $modified_on . '</span>';
		$output       .= '</span>';
		return apply_filters( 'zita_post_date', $output );
	}
}
if ( ! function_exists( 'zita_post_author' ) ){

	/**
	 * Function to get Author of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function zita_post_author( $output_filter = '' ){
		$output = '';

		$byline = sprintf(
			esc_html( '%s' ),
			'<a class="url fn n" title="View all posts by ' . esc_attr( get_the_author() ) . '" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" itemprop="url"> <span class="author-name" itemprop="name">' . esc_html( get_the_author() ) . '</span> </a>'
		);

		$output .= '<span class="posted-by vcard author" itemtype="https://schema.org/Person" itemscope="itemscope" itemprop="author"> ' . $byline . '</span>';

		return apply_filters( 'zita_post_author', $output, $output_filter );
	}
}
/**
		 * Read more text.
		 *
		 * @param string $text default read more text.
		 * @return string read more text
		 */
		function read_more_text( $text ) {

			$read_more = get_theme_mod( 'zita_blog_read_more_txt' );

			if ( '' != $read_more ) {
				$text = $read_more;
			}

			return $text;
		}
      add_filter( 'zita_post_read_more', 'read_more_text');
/**
 * Function to get Read More Link of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'zita_post_link' ) ) {

	/**
	 * Function to get Read More Link of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function zita_post_link( $output_filter = '' ) {

		$enabled = apply_filters( 'zita_post_link_enabled', '__return_true' );
		if ( ( is_admin() && ! wp_doing_ajax() ) || ! $enabled ) {
			return $output_filter;
		}

		$read_more_text    = apply_filters( 'zita_post_read_more', __( 'Read More &raquo;', 'zita' ) );
		$read_more_classes = apply_filters( 'zita_post_read_more_class', array() );

		$post_link = sprintf(
			esc_html( '%s' ),
			'<a class="' . implode( ' ', $read_more_classes ) . '" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . $read_more_text . '</a>'
		);

		$output = '<p class="read-more"> ' . $post_link . '</p>';

		return apply_filters( 'zita_post_link', $output, $output_filter );
	}
}
/**
 * Function to get Number of Comments of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'zita_post_comments' ) ) {

	/**
	 * Function to get Number of Comments of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function zita_post_comments( $output_filter = '' ) {

		$output = '';

		ob_start();
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			?>
			<span class="comments-link">
				<?php
				/**
				 * Get Comment Link
				 *
				 * 
				 */
				comments_popup_link( zita_default_strings( 'string-blog-meta-leave-a-comment', false ), zita_default_strings( 'string-blog-meta-one-comment', false ), zita_default_strings( 'string-blog-meta-multiple-comment', false ) );
				?>

				<!-- Comment Schema Meta -->
				<span itemprop="interactionStatistic" itemscope itemtype="https://schema.org/InteractionCounter">
					<meta itemprop="interactionType" content="https://schema.org/CommentAction" />
					<meta itemprop="userInteractionCount" content="<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>" />
				</span>
			</span>

			<?php
		}

		$output = ob_get_clean();

		return apply_filters( 'zita_post_comments', $output, $output_filter );
	}
}

/**
 * Function to get Tags applied of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'zita_post_tags' ) ) {

	/**
	 * Function to get Tags applied of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function zita_post_tags( $output_filter = '' ) {
		$output = '';

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'zita' ) );

		if ( $tags_list ) {
			$output .= '<span class="tags-links">' . $tags_list . '</span>';
		}

		return apply_filters( 'zita_post_tags', $output, $output_filter );
	}
}
/**
 * Function to get Categories of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'zita_post_categories' ) ) {

	/**
	 * Function to get Categories applied of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function zita_post_categories( $output_filter = '' ){
		$output = '';
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'zita' ) );

		if ( $categories_list ) {
			$output .= '<span class="cat-links">' . $categories_list . '</span>';
		}

		return apply_filters( 'zita_post_categories', $output, $output_filter );
	}
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'zita_blog_get_post_meta' ) ){
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0
	 * @return mixed            Markup.
	 */
	function zita_blog_get_post_meta() {

		$enable_meta = apply_filters( 'zita_blog_post_meta_enabled', '__return_true' );
		$post_meta               = zita_get_option( 'zita-blog-meta' );
		$post_meta_seprator = get_theme_mod( 'zita_blog_meta_seprator','/' );
		if ( 'post' == get_post_type() && is_array( $post_meta ) && $enable_meta ) {

			$output_str = zita_get_post_meta( $post_meta, $post_meta_seprator);

			if ( ! empty( $output_str ) ) {
				echo apply_filters( 'zita_blog_post_meta', '<div class="entry-meta">' . $output_str . '</div>', $output_str ); // WPCS: XSS OK.
			}
		}
	}
}

         /**
		 * Excerpt count.
		 *
		 * @param int $length default count of words.
		 * @return int count of words
		 */
		function zita_excerpt_length( $length ) {
			$excerpt_length = (string) get_theme_mod( 'zita_blog_expt_length' );

			if ( '' != $excerpt_length ) {
				$length = $excerpt_length;
			}
			return $length;
		}
		add_filter( 'excerpt_length','zita_excerpt_length', 999 );
		/**
		 * Read more class.
		 *
		 * @param array $class default classes.
		 * @return array classes
		 */
		function zita_read_more_class( $class ) {

			$read_more_button = get_theme_mod( 'zita_main_read_more_btn' );

			if ( $read_more_button ) {
				$class[] = 'zta-button';
			}

			return $class;
		}
		add_filter( 'zita_post_read_more_class','zita_read_more_class', 999 );

		/**
 * Display Blog Post Excerpt
 */
if ( ! function_exists( 'zita_the_excerpt' ) ){
	/**
	 * Display Blog Post Excerpt
	 *
	 * @since 1.0.0
	 */
	function zita_the_excerpt(){?>
		<div class="entry-content">
		<?php $excerpt_type = get_theme_mod( 'zita_blog_post_content','excerpt');
		if ( 'full' == $excerpt_type ){
			the_content();
		} elseif('excerpt' == $excerpt_type ){
			the_excerpt();
			if(get_theme_mod('zita_main_read_more_btn_excert_optional')){
			    echo zita_post_link();
		    }else{
               add_filter( 'excerpt_more', 'zita_post_link', 1 );
		    }
		} else {
          return false;
		}?>
		</div>	
	<?php }
}
/*********************/
// Blog layout setting
/*********************/
function zita_blog_layout_class( $class ) {
			$class = get_theme_mod( 'zita_blog_layout','zta-blog-layout-1' );
			return $class;
		}
add_filter( 'zita_blog_post_layout_class','zita_blog_layout_class', 999 );
/*********************/
// Grid layout setting
/*********************/
function zita_blog_grid_layout_class( $class ){
	        $zita_blog_layout = get_theme_mod( 'zita_blog_layout','zta-blog-layout-1' );
	        if($zita_blog_layout=='zta-blog-layout-1'):
			$class = get_theme_mod( 'zita_blog_grid_layout','zta-one-colm');
		    endif;
			return $class;
		}
add_filter( 'zita_blog_post_grid_layout_class','zita_blog_grid_layout_class', 999 );
/*********************/
// highlighted first
/*********************/
function zita_blog_highlight_layout_class( $classes ){
	        $zita_blog_layout = get_theme_mod( 'zita_blog_layout' );
	        $zita_blog_grid_layout = get_theme_mod( 'zita_blog_grid_layout' );
	        if($zita_blog_layout=='zta-blog-layout-1' || $zita_blog_grid_layout){
            $zita_blog_highlight = get_theme_mod( 'zita_blog_highlight' );
			if ( $zita_blog_highlight ) {
				$classes = 'zta-blog-highlight';
			}
           }
		    return $classes;	
		}
add_filter( 'zita_blog_post_highlight_layout_class','zita_blog_highlight_layout_class', 999 );

/*********************/
// ADD SPACE BWN POST
/*********************/
function zita_blog_add_space_layout_class( $classes ){
$zita_blog_add_space = get_theme_mod( 'zita_blog_add_space',true );
if (!$zita_blog_add_space ){
$classes = 'zta-no-space';
}
return $classes;	
}
add_filter( 'zita_blog_post_add_space_layout_class','zita_blog_add_space_layout_class', 999 );
/*********************/
// REMOVE FEATURED IMAGE SPACE
/*********************/
function zita_blog_remove_space_image_class( $classes ){
$zita_blog_img_rmv_space = get_theme_mod( 'zita_blog_img_rmv_space' );
if ($zita_blog_img_rmv_space ){
$classes = 'zta-img-no-space';
}
return $classes;	
}
add_filter( 'zita_blog_post_remove_space_image_class','zita_blog_remove_space_image_class', 999 );

//************************/
// Date Box
//*************************/
function zita_date_box( $output ){
			$enable_date_box = get_theme_mod( 'zita_date_box' );
			if ( $enable_date_box ) :
				$date_box_style = get_theme_mod( 'zita_datebox_style' );
				$time_string = '<time class="entry-date published updated" datetime="%1$s"><span class="date-month">%2$s</span> <span class="date-day">%3$s</span> <span class="date-year">%4$s</span></time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ){
					$time_string = '<time class="entry-date published" datetime="%1$s"><span class="date-month">%2$s</span> <span class="date-day">%3$s</span> <span class="date-year">%4$s</span></time>';
				}
				$time_string = sprintf(
					$time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date( 'M' ) ),
					esc_html( get_the_date( 'j' ) ),
					esc_html( get_the_date( 'Y' ) ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);
				
				ob_start();
				
				if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" >
					<div class="zta-date-meta <?php echo esc_attr($date_box_style); ?>">
					<span class="posted-on"><?php echo sprintf(
					esc_html( '%s' ),
					$time_string
				); ?></span>
					</div>
				</a>
				<?php } else { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" >
					<div class="zta-date-meta no-thumb <?php echo esc_attr($date_box_style); ?>">
					<span class="posted-on"><?php echo sprintf(
					esc_html( '%s' ),
					$time_string
				); ?></span>
					</div>
				</a>
			  <?php } ?>
				<?php
				$posted_on_data = ob_get_clean();

				$output .= $posted_on_data;
			endif;
			return $output;
	}
add_filter( 'zita_post_date_box','zita_date_box', 999 );
/*******************/
// loader function
/*******************/
if ( ! function_exists( 'zita_post_loader' ) ):
function zita_post_loader(){
$zita_blog_post_pagination = get_theme_mod( 'zita_blog_post_pagination','num');
$zita_load_more_txt = get_theme_mod( 'zita_load_more_txt',__( 'More Post', 'zita' ));
if($zita_blog_post_pagination=='num'){
the_posts_pagination();
}
elseif($zita_blog_post_pagination=='click'){	
zita_load_more_button('',$zita_load_more_txt,'');
}
elseif($zita_blog_post_pagination=='scroll'){
zita_scrolling_ajax();
}
}
endif;
/**************************************/
//blog title
/**************************************/
if ( ! function_exists( 'zita_blog_title' ) ){	
function zita_blog_title(){ ?>
<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
<?php }
}

/**************************************************************************/
//blog post title and featured image odering
/*************************************************************************/
/**
 * Blog Post Thumbnail / Title & Meta Order
 */
if ( ! function_exists( 'zita_blog_post_thumbnai_and_title_order' ) ){
	/**
	 * Blog post Thubmnail, Title & Blog Meta order
	 *
	 * @since  1.0.8
	 */
	function zita_blog_post_thumbnai_and_title_order(){
		$blog_post_thumb_title_order = zita_get_option( 'zita-blog-structure-meta' );
		if ( is_array( $blog_post_thumb_title_order ) ){
			// Append the custom class for second element for single post.
			foreach ( $blog_post_thumb_title_order as $post_thumb_title_order ){
				switch ( $post_thumb_title_order ){

					// Blog Post Featured Image.
					case 'image':
						zita_before_blog_feature_img_markup();
					break;

					// Blog Post Title and Blog Post Meta.
					case 'title':
						zita_after_blog_feature_img_markup();
					break;
					
				}
			}
		}
	}
}
/**************************************/
//Blog layout archive function before
/**************************************/
if ( ! function_exists( 'zita_before_blog_feature_img_markup' ) ){	
function zita_before_blog_feature_img_markup(){?>
<div class="post-img-wrapper">	    
<?php echo apply_filters( 'zita_post_date_box','');?>
<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
	    <div class="post-img">
			<a href="<?php the_permalink() ?>"> <?php wp_kses_post(the_post_thumbnail('post_thumbnail_loop')); ?></a>
		</div> 		
		<?php } ?> 
 </div> 
<?php }
}
/**************************************/
//Blog layout archive function after
/**************************************/
if ( ! function_exists( 'zita_after_blog_feature_img_markup' ) ){	
function zita_after_blog_feature_img_markup(){ ?>
<div class="entery-header">
<?php zita_blog_title();
zita_blog_get_post_meta();
?>
</div>		
<?php }
}
