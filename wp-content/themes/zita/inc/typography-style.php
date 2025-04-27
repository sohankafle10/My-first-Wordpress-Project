<?php 
/**
 * Typography Style for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
function zita_typography_style(){
$zita_typography_style='';
//Body 
function zita_body_font_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= 'body{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_body_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= 'body{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_body_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= 'body{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
$zita_typography_style.= zita_responsive_slider_funct('zita_body_font_size','zita_body_font_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_body_font_line_height','zita_body_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_body_font_letter_spacing','zita_body_letter_spacing_responsive');
$zita_body_font = get_theme_mod('zita_body_font');
$zita_body_font_weight = get_theme_mod('zita_body_font_weight');
$zita_body_text_transform = get_theme_mod('zita_body_text_transform');
if(!empty($zita_body_font)){
zita_enqueue_google_font($zita_body_font);
$zita_typography_style.="body, button, input, select, textarea,#respond.comment-respond #submit, .read-more .zta-button, button, [type='submit'], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,th,th a,dt,b, strong{ 
   font-family:{$zita_body_font};
   text-transform:{$zita_body_text_transform};
   font-weight:{$zita_body_font_weight};
  }";
}
$zita_heading_font           = get_theme_mod('zita_heading_font');
$zita_heading_text_transform = get_theme_mod('zita_heading_text_transform');
$zita_heading_font_weight = get_theme_mod('zita_heading_font_weight');
if(!empty($zita_heading_font)){
zita_enqueue_google_font($zita_heading_font);
$zita_typography_style.=".woocommerce .page-title,h2.widget-title,.site-title span,h2.entry-title,h2.entry-title a,h1.entry-title,h2.comments-title,h3.comment-reply-title,h4.author-header,.zita-related-post h3,#content.blog-single .zita-related-post ul li h3 a,h3.widget-title,.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title,.woocommerce h1.product_title, .woocommerce-Tabs-panel h2, .related.products h2, section.up-sells h2, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-account .addresses .title h3,.wp-block-group__inner-container h2{ 
   font-family:{$zita_heading_font};
   text-transform:{$zita_heading_text_transform};
   font-weight:{$zita_heading_font_weight};
  }"; 
}
/********************/
//Content typography
/********************/
function zita_h1_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h1{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h1_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h1{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h1_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h1{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h2
function zita_h2_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h2{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h2_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h2{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h2_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h2{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h3
function zita_h3_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h3{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h3_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h3{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h3_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h3{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h4
function zita_h4_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h4{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h4_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h4{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h4_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h4{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h5
function zita_h5_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h5{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h5_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h5{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h5_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h5{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h6
function zita_h6_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h6{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h6_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h6{
   line-height: ' . $v3 . ';
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function zita_h6_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h6{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = zita_add_media_query($dimension, $custom_css);
   return $custom_css;
}
$zita_typography_style.= zita_responsive_slider_funct('zita_h1_size','zita_h1_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h1_line_height','zita_h1_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h1_letter_spacing','zita_h1_letter_spacing_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h2_size','zita_h2_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h2_line_height','zita_h2_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h2_letter_spacing','zita_h2_letter_spacing_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h3_size','zita_h3_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h3_line_height','zita_h3_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h3_letter_spacing','zita_h3_letter_spacing_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h4_size','zita_h4_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h4_line_height','zita_h4_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h4_letter_spacing','zita_h4_letter_spacing_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h5_size','zita_h5_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h5_line_height','zita_h5_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h5_letter_spacing','zita_h5_letter_spacing_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h6_size','zita_h6_size_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h6_line_height','zita_h6_line_height_responsive');
$zita_typography_style.= zita_responsive_slider_funct('zita_h6_letter_spacing','zita_h6_letter_spacing_responsive');
$zita_h1_font = get_theme_mod('zita_h1_font');
$zita_h1_font_weight = get_theme_mod('zita_h1_font_weight');
$zita_h1_text_transform = get_theme_mod('zita_h1_text_transform');
if(!empty($zita_h1_font)){
zita_enqueue_google_font($zita_h1_font);
$zita_typography_style.=".entry-content h1{ 
   font-family:{$zita_h1_font};
   text-transform:{$zita_h1_text_transform};
   font-weight:{$zita_h1_font_weight};
  }";
}
$zita_h2_font = get_theme_mod('zita_h2_font');
$zita_h2_font_weight = get_theme_mod('zita_h2_font_weight');
$zita_h2_text_transform = get_theme_mod('zita_h2_text_transform');
if(!empty($zita_h2_font)){
zita_enqueue_google_font($zita_h2_font);
$zita_typography_style.=".entry-content h2{ 
   font-family:{$zita_h2_font};
   text-transform:{$zita_h2_text_transform};
   font-weight:{$zita_h2_font_weight};
  }";
}
$zita_h3_font = get_theme_mod('zita_h3_font');
$zita_h3_font_weight = get_theme_mod('zita_h3_font_weight');
$zita_h3_text_transform = get_theme_mod('zita_h3_text_transform');
if(!empty($zita_h3_font)){
zita_enqueue_google_font($zita_h3_font);
$zita_typography_style.=".entry-content h3{ 
   font-family:{$zita_h3_font};
   text-transform:{$zita_h3_text_transform};
   font-weight:{$zita_h3_font_weight};
  }";
}
$zita_h4_font = get_theme_mod('zita_h4_font');
$zita_h4_font_weight = get_theme_mod('zita_h4_font_weight');
$zita_h4_text_transform = get_theme_mod('zita_h4_text_transform');
if(!empty($zita_h4_font)){
zita_enqueue_google_font($zita_h4_font);
$zita_typography_style.=".entry-content h4{ 
   font-family:{$zita_h4_font};
   text-transform:{$zita_h4_text_transform};
   font-weight:{$zita_h4_font_weight};
  }";
}
$zita_h5_font = get_theme_mod('zita_h5_font');
$zita_h5_text_transform = get_theme_mod('zita_h5_text_transform');
$zita_h5_font_weight = get_theme_mod('zita_h5_font_weight');
if(!empty($zita_h5_font)){
zita_enqueue_google_font($zita_h5_font);
$zita_typography_style.=".entry-content h5{ 
   font-family:{$zita_h5_font};
   text-transform:{$zita_h5_text_transform};
   font-weight:{$zita_h5_font_weight};
  }";
}
$zita_h6_font = get_theme_mod('zita_h6_font');
$zita_h6_text_transform = get_theme_mod('zita_h6_text_transform');
$zita_h6_font_weight = get_theme_mod('zita_h6_font_weight');
if(!empty($zita_h6_font)){
zita_enqueue_google_font($zita_h6_font);
$zita_typography_style.=".entry-content h6{ 
   font-family:{$zita_h6_font};
   text-transform:{$zita_h6_text_transform};
   font-weight:{$zita_h6_font_weight};
  }";
}
return $zita_typography_style;
}