<?php 
/**
 * Custom Style for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
function zita_custom_style(){
$zita_style="";   
$zita_style.= zita_responsive_slider_funct( 'zita_logo_width', 'zita_logo_width_responsive');
//end logo width 
/**************************/
//gloabal color
/**************************/
$zita_theme_clr     = get_theme_mod('zita_theme_clr','#006799');
$zita_link_clr      = get_theme_mod('zita_link_clr','');
$zita_link_hvr_clr  = get_theme_mod('zita_link_hvr_clr','');
$zita_text_clr      = get_theme_mod('zita_text_clr','');
$zita_title_clr     = get_theme_mod('zita_title_clr','');
$zita_loader_bg_clr = get_theme_mod('zita_loader_bg_clr','#f5f5f5');
$zita_style .= "a:hover,.inifiniteLoader,mark,.single .nav-previous:hover:before,.single .nav-next:hover:after,.page-numbers.current, .page-numbers:hover, .prev.page-numbers:hover, .next.page-numbers:hover,.zita-load-more #load-more-posts:hover,article.zita-article h2.entry-title a:hover,.zita-menu li a:hover,.main-header .zita-menu > li > a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.zita-menu li.menu-active > a,.main-header .main-header-bar a:hover,.zita-menu .content-social .social-icon li a:hover,.mhdrleftpan .content-social .social-icon a:hover, .mhdrrightpan .content-social .social-icon a:hover,.footer-copyright a,.footer-copyright a:hover{color:{$zita_theme_clr}}
  .page-numbers.current, .page-numbers:hover, .prev.page-numbers:hover, .next.page-numbers:hover,.zita-load-more #load-more-posts:hover{border-color:{$zita_theme_clr}} #respond.comment-respond #submit,.read-more .zta-button, button,[type='submit'],.woocommerce #respond input#submit, 
.woocommerce a.button,
.woocommerce button.button, 
.woocommerce input.button,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.zita-cart p.buttons a,.wc-proceed-to-checkout .button.alt.wc-forward,.main-header .main-header-bar a.main-header-btn{border-color:{$zita_theme_clr};background-color:{$zita_theme_clr}} #move-to-top,.zta-date-meta .posted-on,.mhdrleftpan .header-pan-icon span,.mhdrrightpan .header-pan-icon span{background:{$zita_theme_clr}}.inifiniteLoader,.summary .yith-wcwl-wishlistaddedbrowse a, .summary .yith-wcwl-wishlistexistsbrowse a{color:{$zita_theme_clr}}
  .zita_overlayloader{background:{$zita_loader_bg_clr}} .woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,#move-to-top{background:{$zita_theme_clr}}
.cart-contents .cart-crl{background:{$zita_theme_clr}}.cart-crl:before{border-color:{$zita_theme_clr}}
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover,
 .woocommerce a.button.alt:disabled[disabled], 
 .woocommerce a.button.alt:disabled[disabled]:hover, 
 .woocommerce button.button.alt.disabled, 
 .woocommerce button.button.alt.disabled:hover, 
 .woocommerce button.button.alt:disabled, 
 .woocommerce button.button.alt:disabled:hover,
  .woocommerce button.button.alt:disabled[disabled], 
  .woocommerce button.button.alt:disabled[disabled]:hover, 
  .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, 
  .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt:disabled[disabled], 
.woocommerce input.button.alt:disabled[disabled]:hover{border-color: {$zita_theme_clr};
    background-color: {$zita_theme_clr};}";
//link-color
$zita_style .= "a,.single .nav-previous:before,.single .nav-next:after,.zita-menu li a,.main-header .zita-menu > li > a{color:{$zita_link_clr}}";
//link-hover-color
  $zita_style .= "a:hover,.single .nav-previous:hover:before,.single .nav-next:hover:after,article.zita-article h2.entry-title a:hover,.zita-menu li a:hover,.main-header .zita-menu > li > a:hover,.zita-menu li.menu-active > a,.main-header .main-header-bar a:hover,.zita-menu .content-social .social-icon li a:hover,.mhdrleftpan .content-social .social-icon a:hover, .mhdrrightpan .content-social .social-icon a:hover{color:{$zita_link_hvr_clr}}";
//body-text-color
  $zita_style .= "body,.zita-site #content .entry-meta{color:{$zita_text_clr}}";
//title-color
  $zita_style .= "article.zita-article h2.entry-title a,#sidebar-primary h2.widget-title,.woocommerce h1.product_title, .woocommerce-Tabs-panel h2, .related.products h2, section.up-sells h2, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-account .addresses .title h3,h1.page-title, h1.entry-title{color:{$zita_title_clr}}";
/*************************************/
//Hamburger COLOR
/*************************************/
$zita_hamburger_bg_clr         = get_theme_mod('zita_hamburger_bg_clr','');
$zita_hamburger_brdr_clr       = get_theme_mod('zita_hamburger_brdr_clr','');
$zita_hamburger_icon_clr       = get_theme_mod('zita_hamburger_icon_clr','');
$zita_hamburger_border_radius  = get_theme_mod('zita_hamburger_border_radius','');
$zita_style.=".menu-toggle .menu-btn,.bar-menu-toggle .menu-btn{background:{$zita_hamburger_bg_clr};border-color:{$zita_hamburger_brdr_clr}}.menu-toggle .icon-bar,.bar-menu-toggle .icon-bar{background:{$zita_hamburger_icon_clr}} .menu-toggle .menu-btn,.bar-menu-toggle .menu-btn{border-radius:{$zita_hamburger_border_radius}px;}.menu-icon-inner{color:{$zita_hamburger_icon_clr}}";
/*************************************/
//Woocommerce Remove title if page header enable
/*************************************/
$zita_page_header_enable = get_theme_mod('zita_page_header_enable',false);
$zita_pageheader_clr = get_theme_mod('zita_pageheader_clr','rgba(0,0,0,0.57)');
if ($zita_page_header_enable == '1') {  
  if (class_exists( 'WooCommerce' )) {
  if (is_shop() || is_product_tag() || is_product_category()) {
  $zita_style.=".site-main .page-title{
    display: none;
  }
  "; 
  }
}
$zita_style.=" .search-results .site-main .page-title{
    display: none;
  } ";
}
$zita_style.=".zita-pageheader:after{
  background: {$zita_pageheader_clr}
}
";
//**********************/
// Site Button Style 
//**********************/   
$zita_button_txt_clr       = get_theme_mod('zita_button_txt_clr','');
$zita_button_txt_hvr_clr   = get_theme_mod('zita_button_txt_hvr_clr','');
$zita_button_bg_clr        = get_theme_mod('zita_button_bg_clr','');
$zita_button_bg_hvr_clr    = get_theme_mod('zita_button_bg_hvr_clr','');
$zita_button_border_radius    = get_theme_mod('zita_button_border_radius');
$zita_style .=".menu-custom-html > a button,.read-more .zta-button,#respond.comment-respond #submit,button,[type='submit'],.woocommerce #respond input#submit, 
.woocommerce a.button,
.woocommerce button.button, 
.woocommerce input.button,.woocommerce #respond input#submit.alt,
 .woocommerce a.button.alt,
 .woocommerce button.button.alt,
  .woocommerce input.button.alt,.zita-cart p.buttons a,.wc-proceed-to-checkout .button.alt.wc-forward,.main-header .main-header-bar a.main-header-btn{background:{$zita_button_bg_clr};
color:{$zita_button_txt_clr};border-color:{$zita_button_bg_clr};} 
.menu-custom-html > a button,.read-more .zta-button,#respond.comment-respond #submit,button,[type='submit'],.woocommerce #respond input#submit, 
.woocommerce a.button,
.woocommerce button.button, 
.woocommerce input.button,.woocommerce #respond input#submit.alt,
 .woocommerce a.button.alt,
 .woocommerce button.button.alt,
  .woocommerce input.button.alt,.main-header .main-header-bar a.main-header-btn{border-radius:{$zita_button_border_radius}px;}
.menu-custom-html > a button:hover,.read-more .zta-button:hover,#respond.comment-respond #submit:hover,button:hover,[type='submit']:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,.woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,
 .woocommerce a.button.alt:hover,
 .woocommerce button.button.alt:hover,
  .woocommerce input.button.alt:hover,.zita-cart p.buttons a:hover,.main-header .main-header-bar .main-header .main-header-bar a.main-header-btn:hover,.main-header .main-header-bar a.main-header-btn:hover{background:{$zita_button_bg_hvr_clr};
color:{$zita_button_txt_hvr_clr}; border-color:{$zita_button_bg_hvr_clr}}
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover,
 .woocommerce a.button.alt:disabled[disabled], 
 .woocommerce a.button.alt:disabled[disabled]:hover, 
 .woocommerce button.button.alt.disabled, 
 .woocommerce button.button.alt.disabled:hover, 
 .woocommerce button.button.alt:disabled, 
 .woocommerce button.button.alt:disabled:hover,
  .woocommerce button.button.alt:disabled[disabled], 
  .woocommerce button.button.alt:disabled[disabled]:hover, 
  .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, 
  .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt:disabled[disabled], 
.woocommerce input.button.alt:disabled[disabled]:hover{border-color: {$zita_button_bg_clr};
    background-color: {$zita_button_bg_clr};}";
/********************/
// Header transparent 
/*********************/
$zita_style .=".mhdrleft.zta-transparent-header .top-header-bar,.mhdrleft.zta-transparent-header .top-header-bar:before,.mhdrleft.zta-transparent-header .main-header-bar,.mhdrleft.zta-transparent-header .main-header-bar:before,.mhdrleft.zta-transparent-header .bottom-header-bar,.mhdrleft.zta-transparent-header .bottom-header-bar:before,.zita-site .mhdrleft.zta-transparent-header .main-header-bar:before{
background:transparent;
}
.mhdrright.zta-transparent-header .top-header-bar,.mhdrright.zta-transparent-header .top-header-bar:before,.mhdrright.zta-transparent-header .main-header-bar,.mhdrright.zta-transparent-header .main-header-bar:before,.mhdrright.zta-transparent-header .bottom-header-bar,.mhdrright.zta-transparent-header .bottom-header-bar:before,.zita-site .mhdrright.zta-transparent-header .main-header-bar:before{
background:transparent;
}
.mhdrcenter.zta-transparent-header .top-header-bar,.mhdrcenter.zta-transparent-header .top-header-bar:before,.mhdrcenter.zta-transparent-header .main-header-bar,.mhdrcenter.zta-transparent-header .main-header-bar:before,.mhdrcenter.zta-transparent-header .bottom-header-bar,.mhdrcenter.zta-transparent-header .bottom-header-bar:before,.zita-site .mhdrcenter.zta-transparent-header .main-header-bar:before{
background:transparent;
}
.mhdfull.zta-transparent-header, .mhdfull.zta-transparent-header .top-header-bar,
.mhdfull.zta-transparent-header .main-header-bar,
.mhdfull.zta-transparent-header .bottom-header-bar,.mhdfull.zta-transparent-header .top-header-bar:before,
.mhdfull.zta-transparent-header .main-header-bar:before,
.mhdfull.zta-transparent-header .bottom-header-bar:before{
  background:transparent;
}
.shrink .sider-inner ul#zita-menu{
  overflow:hidden;
}";
  //header border
    $zita_theme_clr    = get_theme_mod('zita_theme_clr','#006799');
    $zita_main_hdr_botm_brd = get_theme_mod('zita_main_hdr_botm_brd','1');
    $zita_main_brdr_clr = get_theme_mod('zita_main_brdr_clr','#eee');
    $zita_style .= ".main-header-bar{border-bottom-width:{$zita_main_hdr_botm_brd}px;}.main-header-bar{border-bottom-color:{$zita_main_brdr_clr}}";
	//container
	  $zita_conatiner_width  = get_theme_mod('zita_conatiner_width');
    $zita_style.="header .container,#container.site-
    container,footer .container,#content #container,#content.site-content.boxed #container,
#content.site-content.contentbox #container,
#content.site-content.fullwidthcontained #container{max-width:{$zita_conatiner_width}px;}";
    //header fullwidth
    $zita_main_header_width_full = get_theme_mod('zita_main_header_width_full',false);
    if($zita_main_header_width_full){
       $zita_style.="header .container{max-width:100%}"; 
    } 
    /**************************/
    // Above Header
    /**************************/
    $zita_abv_hdr_hgt = get_theme_mod('zita_abv_hdr_hgt','40');
    $zita_abv_hdr_botm_brd = get_theme_mod('zita_abv_hdr_botm_brd','1');
    $zita_above_brdr_clr = get_theme_mod('zita_above_brdr_clr','#eee');
    $zita_style.=".top-header-container{line-height:{$zita_abv_hdr_hgt}px;}.top-header-bar{border-bottom-width:{$zita_abv_hdr_botm_brd}px;}.top-header-bar{border-bottom-color:{$zita_above_brdr_clr}}";
    /**************************/
    // Bottom Header
    /**************************/
    $zita_bottom_hdr_hgt = get_theme_mod('zita_bottom_hdr_hgt','40');
    $zita_bottom_hdr_botm_brd = get_theme_mod('zita_bottom_hdr_botm_brd','1');
    $zita_bottom_brdr_clr = get_theme_mod('zita_bottom_brdr_clr','#eee');
    $zita_style.=".bottom-header-container{line-height:{$zita_bottom_hdr_hgt}px;}
   .bottom-header-bar{border-bottom-width:{$zita_bottom_hdr_botm_brd}px;}.bottom-header-bar{border-bottom-color:{$zita_bottom_brdr_clr}}";
    // top footer height
    $zita_abve_ftr_hgt = get_theme_mod('zita_abve_ftr_hgt','40');
    $zita_abv_ftr_botm_brd = get_theme_mod('zita_abv_ftr_botm_brd','1');
    $zita_above_frt_brdr_clr = get_theme_mod('zita_above_frt_brdr_clr','#eee');
    $zita_style.=".top-footer-container{line-height:{$zita_abve_ftr_hgt}px;}
   .top-footer-bar{border-bottom-width:{$zita_abv_ftr_botm_brd}px;}.top-footer-bar{border-bottom-color:{$zita_above_frt_brdr_clr}}";
    // top footer height
    $zita_btm_ftr_hgt = get_theme_mod('zita_btm_ftr_hgt','100');
    $zita_btm_ftr_botm_brd = get_theme_mod('zita_btm_ftr_botm_brd','1');
    $zita_bottom_frt_brdr_clr = get_theme_mod('zita_bottom_frt_brdr_clr','#eee');
    $zita_style.=".bottom-footer-container{line-height:{$zita_btm_ftr_hgt}px;}
   .bottom-footer-bar{border-top-width:{$zita_btm_ftr_botm_brd}px;}.bottom-footer-bar{border-top-color:{$zita_bottom_frt_brdr_clr}}";
/****************/
// sidebar width
/****************/
    $zita_sidebar_width = get_theme_mod('zita_sidebar_width','35');
    $zita_primary_width = absint( 100 - $zita_sidebar_width);
    $zita_style.=".site-content #sidebar-primary{width:{$zita_sidebar_width}%}";
    $zita_style.=".site-content #primary{width:{$zita_primary_width}%}";
    /************************/
    //blog archive/setting
    /************************/
    $zita_blog_content_width = get_theme_mod('zita_blog_content_width','defualt');
    if($zita_blog_content_width=='custom'){
    $zita_blog_cnt_widht = get_theme_mod('zita_blog_cnt_widht','1200');
    $zita_style.=".blog #content #container.site-container,.archive #content #container.site-container{max-width:{$zita_blog_cnt_widht}px;}";   
    }
    /************************/
   // blog drop cap
   /************************/
 $zita_blog_dropcap = get_theme_mod('zita_blog_dropcap');
 if($zita_blog_dropcap){
  $zita_style .=".blog article.zita-article .entry-content p:first-child:first-letter{
                color: {$zita_theme_clr};
                float: left;
                font-family: Georgia;
                font-size: 75px;
                line-height: 60px;
                padding-top: 4px;
                padding-right: 15px;
                padding-left: 0px;
                text-shadow: 3px 3px 0 rgba(56, 60, 80, 0.12);
              }";
  $zita_body_font = get_theme_mod('zita_body_font');
if(!empty($zita_body_font)){
zita_enqueue_google_font($zita_body_font);
$zita_style .=".blog article.zita-article .entry-content p:first-child:first-letter{
  font-family: {$zita_body_font};
}";
}           
  }
  // single post drop cap
 $zita_single_drop_cap = get_theme_mod('zita_single_drop_cap');
 if($zita_single_drop_cap){
  $zita_style .=".single-post article.zita-article .entry-content p:first-child:first-letter{
                color:{$zita_theme_clr};
                float: left;
                font-family: Georgia;
                font-size: 75px;
                line-height: 60px;
                padding-top: 4px;
                padding-right: 15px;
                padding-left: 0px;
                text-shadow: 3px 3px 0 rgba(56, 60, 80, 0.12);
              }";
$zita_body_font = get_theme_mod('zita_body_font');
if(!empty($zita_body_font)){
zita_enqueue_google_font($zita_body_font);
$zita_style .=".single-post article.zita-article .entry-content p:first-child:first-letter{
  font-family: {$zita_body_font};
}";
}
  }

if(get_theme_mod('zita_single_post_content_width')=='custom'):
    $zita_sngle_cnt_widht = get_theme_mod('zita_sngle_cnt_widht','1200');
    $zita_style .="#content.site-content.blog-single.boxed #container,
    .boxed #content.site-content.blog-single #container, #content.site-content.blog-single.contentbox #container,
    .contentbox #content.site-content.blog-single #container, #content.site-content.blog-single.fullwidthcontained #container,
    .fullwidthcontained #content.site-content.blog-single #container{max-width:{$zita_sngle_cnt_widht}px;}";
endif;
/******************************************/    
// Woocommerce single product content width
/******************************************/
if((class_exists( 'WooCommerce' )) && (get_theme_mod('zita_single_product_content_width')=='custom')):
    $zita_product_cnt_widht = get_theme_mod('zita_product_cnt_widht','1200');
    $zita_style .=".single-product.woocommerce #content.site-content.product #container{max-width:{$zita_product_cnt_widht}px;}";
endif;
/************************/    
// scroll to top button
/************************/  
$zita_scroll_to_top_option = get_theme_mod('zita_scroll_to_top_option','right');
$zita_scroll_to_top_icon_radius = get_theme_mod('zita_scroll_to_top_icon_radius','2');
$zita_scroll_to_top_icon_clr = get_theme_mod('zita_scroll_to_top_icon_clr','#fff');
$zita_scroll_to_top_icon_bg_clr = get_theme_mod('zita_scroll_to_top_icon_bg_clr');
$zita_scroll_to_top_icon_hvr_clr = get_theme_mod('zita_scroll_to_top_icon_hvr_clr','#fff');
$zita_scroll_to_top_icon_bghvr_clr = get_theme_mod('zita_scroll_to_top_icon_bghvr_clr','#015782');
if($zita_scroll_to_top_option=='left'){
   $zita_style.="#move-to-top{left:30px; right:auto;}";  
}
$zita_style.="#move-to-top{ border-radius:{$zita_scroll_to_top_icon_radius}px;-moz-border-radius:{$zita_scroll_to_top_icon_radius}px;-webkit-border-radius:{$zita_scroll_to_top_icon_radius}px; color:{$zita_scroll_to_top_icon_clr}; background:{$zita_scroll_to_top_icon_bg_clr}} #move-to-top:hover{color:{$zita_scroll_to_top_icon_hvr_clr}; background:{$zita_scroll_to_top_icon_bghvr_clr};}"; 
/********************/
// Search-Button
/********************/
$zita_search_icon_font_size = get_theme_mod('zita_search_icon_font_size','15');
$zita_search_icon_radius    = get_theme_mod('zita_search_icon_radius','');
$zita_search_icon_clr       = get_theme_mod('zita_search_icon_clr','');
$zita_search_icon_brd_clr   = get_theme_mod('zita_search_icon_brd_clr','');
$zita_search_icon_bg_clr    = get_theme_mod('zita_search_icon_bg_clr','');
$zita_search_icon_hvr_clr    = get_theme_mod('zita_search_icon_hvr_clr','');
$zita_style.=".searchfrom .search-btn{font-size:{$zita_search_icon_font_size}px; border-radius:{$zita_search_icon_radius}px;} .top-header-bar .searchfrom .search-btn,.main-header-bar .searchfrom .search-btn,.bottom-header-bar .searchfrom .search-btn ,.zita-menu .menu-custom-search .searchfrom a{color:{$zita_search_icon_clr}; background:{$zita_search_icon_bg_clr}; border-color:{$zita_search_icon_brd_clr}}
.top-header-bar .searchfrom .search-btn:hover,.main-header-bar .searchfrom .search-btn:hover,.bottom-header-bar .searchfrom .search-btn:hover{color:{$zita_search_icon_hvr_clr}}
";
/********************/
// Search-box
/********************/
$zita_search_box_icon_width  = get_theme_mod('zita_search_box_icon_width','100');
$zita_search_box_icon_height = get_theme_mod('zita_search_box_icon_height','');
$zita_search_box_radius      = get_theme_mod('zita_search_box_radius','0');
$zita_search_box_icon_size   = get_theme_mod('zita_search_box_icon_size','');
$zita_social_box_bg_clr      = get_theme_mod('zita_social_box_bg_clr','');
$zita_social_box_icon_clr    = get_theme_mod('zita_social_box_icon_clr','#015782');
$zita_social_box_brdr_clr         = get_theme_mod('zita_social_box_brdr_clr','');
$zita_social_box_plc_holdr_clr    = get_theme_mod('zita_social_box_plc_holdr_clr','#bbb');
$zita_search_box_plc_txt_size     = get_theme_mod('zita_search_box_plc_txt_size');
$zita_style.=".widget-area #searchform .form-content,.searchfrom #searchform .form-content{width:{$zita_search_box_icon_width}%;} .widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before{color:{$zita_social_box_icon_clr}; font-size:{$zita_search_box_icon_size}px;} .widget-area input#s,.searchfrom #searchform input#s{background-color:{$zita_social_box_bg_clr}; border-color:{$zita_social_box_brdr_clr};} .widget-area #searchform input[type=submit],.widget-area input#s,.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before,.searchfrom input#s,.searchfrom #searchform input[type=submit]{height:{$zita_search_box_icon_height}px; line-height:{$zita_search_box_icon_height}px; border-radius:{$zita_search_box_radius}px;} .form-content input#s::-webkit-input-placeholder, .form-content input#s{color:{$zita_social_box_plc_holdr_clr}; font-size:{$zita_search_box_plc_txt_size}px;}";
/*****************/
//footer widget
/*****************/
$zita_footer_widget_content_width  = get_theme_mod('zita_footer_widget_content_width','content-width');
if($zita_footer_widget_content_width=='full-width'):
$zita_style.=".footer-wrap .widget-footer-bar .container{max-width:100%;}";
endif;
/************************************************************************/
/****************************Only Lite Feafure**************************/
/************************************************************************/
if((zita_pro_activation_class())==''){
/********************************/
//Above Header Color Scheme
/********************************/
$zita_above_color_scheme  = get_theme_mod('zita_above_color_scheme');
if($zita_above_color_scheme =='abv-dark'):
$zita_style.=".top-header .top-header-bar{background:#333} 
.top-header .content-html,.top-header .zita-menu > li > a,.top-header .content-widget,.top-header .top-header-bar .widget-title, .top-header .top-header-bar a{color:#fff}"; 
$zita_style.=".top-header .top-header-bar a:hover{color:{$zita_theme_clr}} .top-header .top-header-bar a:hover{color:{$zita_link_hvr_clr}} .top-header .top-header-bar .zita-menu li ul.sub-menu li a{color:#9c9c9c;}";
$zita_style.="@media screen and (max-width: 1024px){
.top-header .top-header-bar .sider.left,.top-header .top-header-bar .sider.right,.top-header .top-header-bar .sider.overcenter,.top-header .top-header-bar .right .menu-close,.top-header .top-header-bar .left .menu-close{background:#333}
}";
endif;
if($zita_above_color_scheme =='abv-default'):
$zita_style.=".top-header .top-header-bar a{color:#9c9c9c} .top-header .top-header-bar a:hover{color:{$zita_theme_clr}} .top-header .top-header-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;
/********************************/
//Main Header Color Scheme
/********************************/
$zita_main_color_scheme  = get_theme_mod('zita_main_color_scheme');
if($zita_main_color_scheme =='main-dark'):
$zita_style.=".main-header-bar p,.main-header .zita-menu > li > a, .main-header .menu-custom-html, .main-header .menu-custom-widget,.main-header .widget-title, header.mhdrleftpan p,header.mhdrrightpan p,header.mhdrleftpan .widget-title,header.mhdrrightpan .widget-title,header.mhdrrightpan .content-html,header.mhdrleftpan .content-html,.mhdrrightpan .zita-menu a,.mhdrleftpan .zita-menu a,.mhdrleftpan .content-widget,.mhdrrightpan .content-widget,.main-header .main-header-bar a,.zita-menu .content-social .social-icon li a,.mhdrleftpan .content-social .social-icon a, .mhdrrightpan .content-social .social-icon a,.cart-pan-active header.mhdrleftpan .zita-cart,.cart-pan-active header.mhdrrightpan .zita-cart,.zita-cart,header.mhdminbarleft p,header.mhdminbarright p,.mhdminbarleft .zita-menu a,.mhdminbarright .zita-menu a,.mhdminbarleft .pan-content .content-widget,.mhdminbarright .pan-content .content-widget,.mhdminbarleft .pan-content .content-html,.mhdminbarright .pan-content .content-html,.zita-cart ul.cart_list li a,.zita-cart ul.cart_list li span,.cart-close .cart-close-btn,.main-header.mhdfull .menu-close-btn{color:#fff} .zita-site .main-header-bar:before,header.mhdrrightpan:before,header.mhdrleftpan:before{background:#333;opacity:0.7} .main-header .main-header-bar .zita-menu li ul.sub-menu li a{color:#9c9c9c;}.cart-pan-active header.mhdrleftpan .zita-cart,.cart-pan-active header.mhdrrightpan .zita-cart,.cart-close .cart-close-btn,.zita-cart,.min-bar-header, .mhdminbarleft .pan-content,.mhdminbarleft .top-header-bar,.mhdminbarleft .bottom-header-bar,.min-bar-header.rightminbar, .mhdminbarright .pan-content,.mhdminbarright .top-header-bar,.mhdminbarright .bottom-header-bar,header.mhdminbarleft .zita-cart,header.mhdminbarright .zita-cart{background:#333;}.zita-cart p.buttons a.checkout{
background:transparent;
border-color:#fff;
color:#fff;
}.mobile-menu-active .mhdfull .sider.left,.mhdfull .sider.left,.mhdfull .left .menu-close,.mobile-menu-active .mhdfull .sider.right,.mhdfull .sider.right,.mhdfull .right .menu-close,.mhdfull.mobile-menu-active .sider.overcenter,.main-header.mhdfull .sider.left,.main-header.mhdfull .sider.right,.main-header.mhdfull .left .menu-close,.main-header.mhdfull .right .menu-close{background-color: #333;}header.mhdminbarleft,header.mhdminbarright{border-color:#555}"; 
$zita_style.="@media screen and (max-width: 1024px){
.main-header .sider.left,.main-header .sider.right,.main-header .left .menu-close,.main-header .right .menu-close,.mobile-menu-active .sider.overcenter {background-color: #333;} .main-header .menu-close-btn{color: #bbb;} .main-header .zita-menu li a{color:#fff}}";
else:
$zita_style.=".zita-site .main-header-bar:before,header.mhdrrightpan:before,header.mhdrleftpan:before{background:#fff;opacity:0.7}
.main-header-bar p,.main-header .zita-menu > li > a, .main-header .menu-custom-html, .main-header .menu-custom-widget,.main-header .widget-title, header.mhdrleftpan p,header.mhdrrightpan p,header.mhdrleftpan .widget-title,header.mhdrrightpan .widget-title,header.mhdrrightpan .content-html,header.mhdrleftpan .content-html,.mhdrrightpan .zita-menu a,.mhdrleftpan .zita-menu a,.mhdrleftpan .content-widget,.mhdrrightpan .content-widget,header.mhdrleftpan .top-header .top-header-bar .widget-title,header.mhdrrightpan .top-header .top-header-bar .widget-title,.mhdrrightpan .zita-menu li a, .mhdrleftpan .zita-menu li a,.mhdrrightpan .bottom-header .zita-menu > li > a,.mhdrleftpan .bottom-header .zita-menu > li > a{color:#555} .main-header .main-header-bar a,.mhdrleftpan .content-social .social-icon a, .mhdrrightpan .content-social .social-icon a,.zita-menu .content-social .social-icon li a{color:#9c9c9c}
  .main-header .main-header-bar a:hover{color:{$zita_link_hvr_clr}}.zita-cart p.buttons a.checkout{
background:transparent;
border-color:#9c9c9c;
color:#9c9c9c;
}
header.mhdminbarleft p,header.mhdminbarright p,header.mhdminbarleft .widget-title,header.mhdminbarright .widget-title,header.mhdminbarleft .content-html,header.mhdminbarright .content-html,.mhdminbarleft .zita-menu a,.mhdminbarright .zita-menu a,.mhdminbarleft .content-widget,.mhdminbarright .content-widget,header.mhdminbarleft .top-header .top-header-bar .widget-title,header.mhdminbarright .top-header .top-header-bar .widget-title,.mhdminbarleft .zita-menu li a, .mhdminbarright .zita-menu li a,.mhdminbarleft .bottom-header .zita-menu > li > a,.mhdminbarright .bottom-header .zita-menu > li > a{color:#555}";
endif;
/********************************/
//Bottom Header Color Scheme
/********************************/
$zita_bottom_color_scheme  = get_theme_mod('zita_bottom_color_scheme');
if($zita_bottom_color_scheme =='btm-dark'):
$zita_style.=".bottom-header .bottom-header-bar{background:#333} .bottom-header .content-html,.bottom-header .zita-menu > li > a,.bottom-header .content-widget,.bottom-header .bottom-header-bar .widget-title,.bottom-header .bottom-header-bar a{color:#fff} .bottom-header .bottom-header-bar .zita-menu li ul.sub-menu li a{color:#9c9c9c}"; 
$zita_style.=".bottom-header .bottom-header-bar a:hover{color:{$zita_theme_clr}} .bottom-header .bottom-header-bar a:hover{color:{$zita_link_hvr_clr}}";
$zita_style.="@media screen and (max-width: 1024px){
.bottom-header .bottom-header-bar .sider.left,.bottom-header .bottom-header-bar .sider.right,.bottom-header .bottom-header-bar .sider.overcenter,.bottom-header .bottom-header-bar .right .menu-close,.bottom-header .bottom-header-bar .left .menu-close{background:#333}
}";
endif;
if($zita_bottom_color_scheme =='btm-default'):
$zita_style.=".bottom-header .bottom-header-bar a{color:#9c9c9c} .bottom-header .bottom-header-bar a:hover{color:{$zita_theme_clr}} .bottom-header .bottom-header-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;
/********************************/
//Above Footer Color Scheme
/********************************/
$zita_above_footer_color_scheme  = get_theme_mod('zita_above_footer_color_scheme');
if($zita_above_footer_color_scheme =='abv-dark'):
$zita_style.=".top-footer .top-footer-bar{background:#333} .top-footer .content-html,.top-footer .zita-menu > li > a,.top-footer .content-widget,.top-footer .top-footer-bar .widget-title,.zita-bottom-menu li a,.top-footer .top-footer-bar a{color:#fff}"; 
$zita_style.=".top-footer .top-footer-bar a:hover{color:{$zita_theme_clr}} .top-footer .top-footer-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;
if($zita_above_footer_color_scheme =='abv-default'):
$zita_style.=".top-footer .top-footer-bar a{color:#9c9c9c} .top-footer .top-footer-bar a:hover{color:{$zita_theme_clr}} .top-footer .top-footer-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;
/********************************/
//Widget Footer Color Scheme
/********************************/
$zita_bottom_footer_widget_color_scheme  = get_theme_mod('zita_bottom_footer_widget_color_scheme');
if($zita_bottom_footer_widget_color_scheme =='ft-wgt-dark'):
$zita_style.=".widget-footer .widget-footer-bar{background:#333} .widget-footer .widget-footer-bar .widget-title,.widget-footer .widget-footer-bar ,.widget-footer .widget-footer-bar a{color:#fff}"; 
$zita_style.=".widget-footer .widget-footer-bar a:hover{color:{$zita_theme_clr}} .widget-footer .widget-footer-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;
if($zita_bottom_footer_widget_color_scheme =='ft-wgt-default'):
$zita_style.=".widget-footer .widget-footer-bar a{color:#9c9c9c} .widget-footer .widget-footer-bar a:hover{color:{$zita_theme_clr}} .widget-footer .widget-footer-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;
/********************************/
//Footer Bottom Color Scheme
/********************************/
$zita_bottom_footer_color_scheme  = get_theme_mod('zita_bottom_footer_color_scheme');
if($zita_bottom_footer_color_scheme =='ft-btm-dark'):
$zita_style.=".bottom-footer .bottom-footer-bar{background:#333} .bottom-footer .content-html,.bottom-footer .zita-menu > li > a,.bottom-footer .content-widget,.bottom-footer .bottom-footer-bar .widget-title,.zita-bottom-menu li a,.bottom-footer .bottom-footer-bar a{color:#fff}"; 
$zita_style.=".bottom-footer .bottom-footer-bar a:hover{color:{$zita_theme_clr}} .bottom-footer .bottom-footer-bar a:hover{color:{$zita_link_hvr_clr}}";
endif; 
if($zita_bottom_footer_color_scheme =='ft-btm-default'):
$zita_style.=".bottom-footer .bottom-footer-bar a{color:#9c9c9c} .bottom-footer .bottom-footer-bar a:hover{color:{$zita_theme_clr}} .bottom-footer .bottom-footer-bar a:hover{color:{$zita_link_hvr_clr}}";
endif;

}
/*************************************/
//Woocommerce Add to Cart Color Scheme
/*************************************/
if((zita_pro_activation_class())==''){
$zita_woo_cart_color_scheme  = get_theme_mod('zita_woo_cart_color_scheme');
if($zita_woo_cart_color_scheme =='woo-cart-dark'){
$zita_style.=".zita-cart{background:#333;color:#fff;}
.zita-cart ul.cart_list li a,.zita-cart p.total, .widget p.total{
color:#fff;
}";
}else{
$zita_style.=".zita-cart,.zita-cart ul.cart_list li span,.zita-cart p{background:#ffff;color:#808285;}
.zita-cart ul.cart_list li a{
color:#9c9c9c;
}.zita-cart p.buttons a.checkout {
    background: transparent;
    border-color: #9c9c9c;
    color: #9c9c9c;
}";
}
} 
return $zita_style;
}
//start logo width
function zita_logo_width_responsive( $value, $dimension = 'desktop' ){
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
  $custom_css .= '.zita-logo img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = zita_add_media_query( $dimension, $custom_css );
  return $custom_css;
}