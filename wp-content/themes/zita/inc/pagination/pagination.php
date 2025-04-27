<?php
/**
 * Add a load more button to your page
 * @param string $context
 * @param string $text. (optional) Text to display on button.
 * @param int $paged. (optional) WP query var.
 * @return void
 */
if( ! function_exists( 'zita_load_more_button' )){
function zita_load_more_button( $context = 'default', $text = 'More Posts', $paged = 0 ){
  if ( empty( $paged ) ){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
  }
  $load_more = new Zita_Load_More_Posts();
  
  if(is_category()){
    $load_more->zita_load_more_cat_button( $context, $text, $paged );
  }elseif(is_author()){
    $load_more->zita_load_more_author_button( $context, $text, $paged );
  }elseif(is_date()){
    $load_more->zita_load_more_date_button( $context, $text, $paged );
  }else{
    $load_more->zita_load_more_buttonn( $context, $text, $paged );
  }
  
  }
}
if( !class_exists( 'Zita_Load_More_Posts' ) ) :
/**
 * Load more button functionality  
 * Uses WP pagination
 */
class Zita_Load_More_Posts{
  /**
   * Add hooks
   */
  public function __construct(){
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
    add_action( 'wp_ajax_zita_load_more_posts', array( $this, 'zita_load_more_posts' ) );
    add_action( 'wp_ajax_nopriv_zita_load_more_posts', array( $this, 'zita_load_more_posts' ) );
  }
  /**
   * Enqueue the necessary assets
   */
  public function enqueue_assets(){
    wp_enqueue_script( 'load-more-posts-js', get_parent_theme_file_uri() . '/inc/pagination/js/load-more-posts.js', array( 'jquery' ), '0.1', true );
    wp_localize_script( 'load-more-posts-js', 'loadmore', array( 'wp_ajax_url' => admin_url( 'admin-ajax.php' ) ) );
  }
  /**
   * Spit out the button html
   * @param $text. (optional) Text to display on button
   * @param $paged. (optional) WP query var
   * @return void
   */
  public function zita_load_more_buttonn( $context, $text, $paged ){
    global $wp_query;
    // Lets recreate the current query within our ajax call
    wp_localize_script( 'load-more-posts-js', 'load_more_data', array( 'query' => $wp_query->query ) );
    wp_nonce_field( 'load-more-posts-nonce-' . esc_attr($context), 'load-more-posts-nonce' );
    echo '<div id="load-more-posts-error" class="load-more-posts-error error">' . esc_html__( 'No More Posts', 'zita' ) . '</div>';
    echo '<div class="zita-load-more"><button id="load-more-posts" class="load-more-posts-button" data-context="'.esc_attr($context).'" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($wp_query->max_num_pages).'" >'.esc_html($text).'</button><span class="inifiniteLoader"></span></div>';
  }
  public function zita_load_more_cat_button( $context, $text, $paged ){
    global $wp_query;
    $queried_category = get_term( get_query_var('cat'), 'category' ); 

    // Lets recreate the current query within our ajax call
    wp_localize_script( 'load-more-posts-js', 'load_more_data', array( 'query' => $wp_query->query ) );
    wp_nonce_field( 'load-more-posts-nonce-' . esc_attr($context), 'load-more-posts-nonce' );
    echo '<div id="load-more-posts-error" class="load-more-posts-error error">' . esc_html__( 'No More Posts', 'zita' ) . '</div>';
    echo '<div class="zita-load-more"><button id="load-more-posts" class="load-more-posts-button" data-context="'.esc_attr($context).'" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($wp_query->max_num_pages).'" data-cat-slug="'.esc_attr($queried_category->term_id).'">'.esc_html($text).'</button><span class="inifiniteLoader"></span></div>';
  }
  public function zita_load_more_author_button( $context, $text, $paged ){
    global $wp_query;
    $post = get_post( $wp_query->id);
    
    // Lets recreate the current query within our ajax call
    wp_localize_script( 'load-more-posts-js', 'load_more_data', array( 'query' => $wp_query->query ) );
    wp_nonce_field( 'load-more-posts-nonce-' . esc_attr($context), 'load-more-posts-nonce' );
    echo '<div id="load-more-posts-error" class="load-more-posts-error error">' . esc_html__( 'No More Posts', 'zita' ) . '</div>';
    echo '<div class="zita-load-more"><button id="load-more-posts" class="load-more-posts-button" data-context="'.esc_attr($context).'" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($wp_query->max_num_pages).'" data-author-id="'.esc_attr($post->post_author).'">'.esc_html($text).'</button><span class="inifiniteLoader"></span></div>';
  }
  public function zita_load_more_date_button( $context, $text, $paged ){
    global $wp_query;
    // Lets recreate the current query within our ajax call
    wp_localize_script( 'load-more-posts-js', 'load_more_data', array( 'query' => $wp_query->query ) );
    wp_nonce_field( 'load-more-posts-nonce-' . esc_attr($context), 'load-more-posts-nonce' );
    echo '<div id="load-more-posts-error" class="load-more-posts-error error">' . esc_html__( 'No More Posts', 'zita' ) . '</div>';
    echo '<div class="zita-load-more"><button id="load-more-posts" class="load-more-posts-button" data-context="'.esc_attr($context).'" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($wp_query->max_num_pages).'" data-year="'.esc_attr(get_the_date( 'Y')).'"  data-month="'.esc_attr(get_the_date( 'F')).'">'.esc_html($text).'</button><span class="inifiniteLoader"></span></div>';
  }
  /**
   * Ajax handler for load more posts
   */
  public function zita_load_more_posts(){
 
      global $post; // required by setup post data
      $context = ( ! empty( $_POST['context'] ) ) ? sanitize_text_field( $_POST['context'] ) : 'default';
      $args = (array) $_POST['query'];
      // A filter if you want to customize the query
      // $args = apply_filters( 'load-more-posts-args-' . sanitize_text_field( $_POST['context'] ), $args );
       $args = array(
      'post_type'       => 'post',
      'post_status'     => 'publish',
      'paged'           => sanitize_text_field( $_POST['paged'] ),
      'author'          => $_POST['author_id'],
      'cat'             => $_POST['cat_slug'],  
      'date_query'      => array(
                array(
                    
                        # Setting date to array above allows to call specific values within that date    
                        'year'  =>  $_POST['data_year'],
                        'month' =>  $_POST['data_month'],
                   
                    
                ),
            ),
      );  
      $query = new WP_Query( $args );
      $posts = $query->get_posts();
      foreach( $posts as $post ) {
        setup_postdata( $post );
        get_template_part( 'template-parts/content', $context );
        wp_reset_postdata();
      }
    
    exit;
  }
}
new Zita_Load_More_Posts();
endif;