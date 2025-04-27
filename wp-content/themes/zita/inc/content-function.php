<?php
/**
 *Content Function for Zita Theme
 */
if ( ! function_exists( 'zita_page_content_layout' ) ){
function zita_page_content_layout($page_post_meta_set='default', $default=''){
    $zita_containerpage     = get_theme_mod('zita_containerpage',$default);
    $zita_containerblogpage = get_theme_mod('zita_containerblogpage',$default);
    $zita_containerwoopage  = get_theme_mod('zita_containerwoopage',$default);
    $layout='';
if($page_post_meta_set=='default' || $page_post_meta_set==''){
    if((class_exists( 'WooCommerce' ))&&(is_woocommerce() || is_checkout() || is_cart() || is_account_page())){
       $layout = $zita_containerwoopage;
       
    }
    elseif(is_page()){
       $layout = $zita_containerpage;
      
    }
    elseif(is_single()){
       $layout = $zita_containerblogpage;
    }
    
    else{
       $layout = '';
    }   
    return apply_filters( 'zita_page_content_layout', $layout, $default ); 
  }else{
      if(is_page()){
       $layout = $page_post_meta_set;
      }
      elseif(is_single()){
       $layout = $page_post_meta_set;
      } 
      elseif((class_exists( 'WooCommerce' )) && (is_woocommerce() || is_checkout() || is_cart() || is_account_page())){
       $layout = $page_post_meta_set;
      } 
   else{
       $layout = '';
     }
    return apply_filters( 'zita_page_content_layout',$layout, $default ); 
    }
  }
}
/******************/
// Page Title
/******************/
if ( ! function_exists( 'zita_page_title_post_meta' ) ){
function zita_page_title_post_meta($page_post_meta_set){
if($page_post_meta_set!=='on'){?>
<h1 class='entry-title'><?php the_title();?></h1>
 <?php     }
    }
  }

/******************/
// Page Feature image
/******************/
if ( ! function_exists( 'zita_page_feature_img_post_meta' ) ){
function zita_page_feature_img_post_meta($page_post_meta_set){
if($page_post_meta_set!=='on'){
      if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){
        the_post_thumbnail('post-thumbnails'); 
      }
     }
    }
  }

/******************/
// Page Header image
/******************/
if ( ! function_exists( 'zita_page_header_image' ) ){
function zita_page_header_image($id){
$page_post_meta_set = get_post_meta($id, 'zita_disable_feature_image_dyn', true ); 
$featuredimg_url = wp_get_attachment_url( get_post_thumbnail_id($id), 'thumbnail' );
$headerimg_url = get_theme_mod('header_image','');
if($page_post_meta_set!=='on'){
      if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){ ?>
        <div class="zita-pageheader-img" style="background-image: url(<?php echo esc_url($featuredimg_url);?>)">
        </div>
   <?php   }
      elseif ($headerimg_url != '' && $headerimg_url != 'remove-header') { ?>
        <div class="zita-pageheader-img" style="background-image: url(<?php echo esc_url($headerimg_url);?>)">
        </div>
    <?php  }
     }
    }
  }

/******************/
// Page Header image for Archive
/******************/
if ( ! function_exists( 'zita_page_header_image_for_archive' ) ){
function zita_page_header_image_for_archive(){
$headerimg_url = get_theme_mod('header_image','');
     if ($headerimg_url != '' && $headerimg_url != 'remove-header') { ?>
        <div class="zita-pageheader-img" style="background-image: url(<?php echo esc_url($headerimg_url);?>)">
        </div>
    <?php  }
     
    }
  }