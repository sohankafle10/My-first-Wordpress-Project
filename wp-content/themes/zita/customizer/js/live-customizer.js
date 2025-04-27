/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(jQuery(function( $){
/**
 * Dynamic Internal/Embedded Style for a Control
 */
function zita_add_dynamic_css( control, style ){
      control = control.replace( '[', '-' );
      control = control.replace( ']', '' );
      jQuery( 'style#' + control ).remove();

      jQuery( 'head' ).append(
            '<style id="' + control + '">' + style + '</style>'
      );
}
/**
 * Responsive Spacing CSS
 */
function zita_responsive_spacing( control, selector, type, side ){
	wp.customize( control, function( value ){
		value.bind( function( value ){
			var sidesString = "";
			var spacingType = "padding";
			if ( value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left ) {
				if ( typeof side != undefined ) {
					sidesString = side + "";
					sidesString = sidesString.replace(/,/g , "-");
				}
				if ( typeof type != undefined ) {
					spacingType = type + "";
				}
				// Remove <style> first!
				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();

				var desktopPadding = '',
					tabletPadding = '',
					mobilePadding = '';

				var paddingSide = ( typeof side != undefined ) ? side : [ 'top','bottom','right','left' ];

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['desktop'][sideValue] ) {
						desktopPadding += spacingType + '-' + sideValue +': ' + value['desktop'][sideValue] + value['desktop-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['tablet'][sideValue] ) {
						tabletPadding += spacingType + '-' + sideValue +': ' + value['tablet'][sideValue] + value['tablet-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['mobile'][sideValue] ) {
						mobilePadding += spacingType + '-' + sideValue +': ' + value['mobile'][sideValue] + value['mobile-unit'] +';';
					}
				});

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
					+ selector + '	{ ' + desktopPadding +' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + tabletPadding + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
					+ '</style>'
				);

			} else {
				wp.customize.preview.send( 'refresh' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();
			}

		} );
	} );
}
/**
 * Apply CSS for the element
 */
function zita_css( control, css_property, selector, unit ){

	wp.customize( control, function( value ) {
		value.bind( function( new_value ) {

			// Remove <style> first!
			control = control.replace( '[', '-' );
			control = control.replace( ']', '' );

			if ( new_value ){
				/**
				 *	If ( unit == 'url' ) then = url('{VALUE}')
				 *	If ( unit == 'px' ) then = {VALUE}px
				 *	If ( unit == 'em' ) then = {VALUE}em
				 *	If ( unit == 'rem' ) then = {VALUE}rem.
				 */
				if ( 'undefined' != typeof unit) {
					if ( 'url' === unit ) {
						new_value = 'url(' + new_value + ')';
					} else {
						new_value = new_value + unit;
					}
				}

				// Remove old.
				jQuery( 'style#' + control ).remove();

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + css_property + ': ' + new_value + ' }'
					+ '</style>'
				);

			} else {

				wp.customize.preview.send( 'refresh' );

				// Remove old.
				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}
/*******************************/
// Range slider live customizer
/*******************************/
function zitaGetCss( arraySizes, settings, to ) {
    'use strict';
    var data, desktopVal, tabletVal, mobileVal,
        className = settings.styleClass, i = 1;

    var val = JSON.parse( to );
    if ( typeof( val ) === 'object' && val !== null ) {
        if ('desktop' in val) {
            desktopVal = val.desktop;
        }
        if ('tablet' in val) {
            tabletVal = val.tablet;
        }
        if ('mobile' in val) {
            mobileVal = val.mobile;
        }
    }

    for ( var key in arraySizes ) {
        // skip loop if the property is from prototype
        if ( ! arraySizes.hasOwnProperty( key )) {
            continue;
        }
        var obj = arraySizes[key];
        var limit = 0;
        var correlation = [1,1,1];
        if ( typeof( val ) === 'object' && val !== null ) {

            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }

            data = {
                desktop: ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0]) > limit ? ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0] ) : limit,
                tablet: ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) > limit ? ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) : limit,
                mobile: ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) > limit ? ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) : limit
            };
        } else {
            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }
            data =( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] > limit ? ( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] : limit;
        }
        settings.styleClass = className + '-' + i;
        settings.selectors  = obj.selectors;

        zitaSetCss( settings, data );
        i++;
    }
}
function zitaSetCss( settings, to ){
    'use strict';
    var result     = '';
    var styleClass = jQuery( '.' + settings.styleClass );
    if ( to !== null && typeof to === 'object' ) {
        jQuery.each(
            to, function ( key, value ) {
                var style_to_add;
                if ( settings.selectors === '.container' ) {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
                } else {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
                }
                switch ( key ) {
                    case 'desktop':
                        result += style_to_add;
                        break;
                    case 'tablet':
                        result += '@media (max-width: 767px){' + style_to_add + '}';
                        break;
                    case 'mobile':
                        result += '@media (max-width: 544px){' + style_to_add + '}';
                        break;
                }
            }
        );
        if ( styleClass.length > 0 ) {
            styleClass.text( result );
        } else {
            jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
        }
    } else {
        jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
    }
}
//*****************************/
// Logo
//*****************************/
wp.customize(
    'zita_logo_width', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'max-width',
                    propertyUnit: 'px',
                    styleClass: 'zita-logo-width'
                };

                var arraySizes = {
                    size3: { selectors:'.zita-logo img', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
//*****************************/
// PageHeader
//*****************************/
zita_css( 'zita_pageheader_clr','background', '.zita-pageheader:after');
/**************************************/
// container live preview
/**************************************/
// conatiner full width
wp.customize( 'zita_conatiner_width', function( setting ){
		setting.bind( function( width ) {
        var  dynamicStyle = 'header .container, #container.site- container, footer .container, #content #container,header .container, #container.site- container, footer .container, #content #container, #content.site-content.boxed #container, #content.site-content.contentbox #container, #content.site-content.fullwidthcontained #container{ max-width: ' + ( parseInt( width ) ) + 'px; } ';
		zita_add_dynamic_css( 'zita_conatiner_width', dynamicStyle );
	} );
 } );
zita_css( 'zita_blog_cnt_widht','max-width', '.blog #content #container.site-container,.archive #content #container.site-container', 'px');
zita_css( 'zita_product_cnt_widht','max-width', '.single-product.woocommerce #content.site-content.product #container', 'px');
zita_css( 'zita_sngle_cnt_widht','max-width', '#content.site-content.blog-single.boxed #container,.boxed #content.site-content.blog-single #container, #content.site-content.blog-single.contentbox #container,.contentbox #content.site-content.blog-single #container, #content.site-content.blog-single.fullwidthcontained #container,.fullwidthcontained #content.site-content.blog-single #container', 'px');
/**************************************/
// Above Header live preview
/**************************************/
wp.customize('zita_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col1 .content-html,li.menu-item.zta-custom-item').text(to);
         });
     });
 wp.customize('zita_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col2 .content-html').text(to);
         });
     });
 wp.customize('zita_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col3 .content-html').text(to);
         });
     });
zita_css( 'zita_abv_hdr_botm_brd','border-bottom-width', '.top-header-bar', 'px' );
zita_css( 'zita_above_brdr_clr','border-bottom-color', '.top-header-bar');
zita_css( 'zita_abv_hdr_hgt','line-height', '.top-header-container', 'px');
/**************************************/
// Main Header live preview
/**************************************/
wp.customize('zita_main_header_btn_txt', function(value){
         value.bind(function(to) {
             $('.main-header .main-header-bar a.main-header-btn').text(to);
         });
     });
wp.customize('zita_main_header_texthtml', function(value){
         value.bind(function(to) {
             $('.zta-custom-item .menu-custom-html,.menu-custom-html').text(to);
         });
     });
wp.customize('zita_main_header_mobile_txt', function(value){
         value.bind(function(to) {
             $('.menu-toggle .text').text(to);
         });
     });
/**
* Border bottom 
*/
zita_css( 'zita_main_hdr_botm_brd','border-bottom-width', '.main-header-bar', 'px' );
zita_css( 'zita_main_brdr_clr','border-bottom-color', '.main-header-bar');
/**************************************/
// Bottom Header live preview
/**************************************/
 wp.customize('zita_col1_bottom_texthtml', function(value){
         value.bind(function(to) {
             $('.bottom-header-col1 .content-html').text(to);
         });
     });
 wp.customize('zita_col2_bottom_texthtml', function(value){
         value.bind(function(to) {
             $('.bottom-header-col2 .content-html').text(to);
         });
     });
 wp.customize('zita_col3_bottom_texthtml', function(value){
         value.bind(function(to) {
             $('.bottom-header-col3 .content-html').text(to);
         });
     });
zita_css( 'zita_bottom_hdr_botm_brd','border-bottom-width', '.bottom-header-bar', 'px' );
zita_css( 'zita_bottom_brdr_clr','border-bottom-color', '.bottom-header-bar');
zita_css( 'zita_bottom_hdr_hgt','line-height', '.bottom-header-container', 'px');
/****************/
// footer
/****************/
wp.customize('zita_footer_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('zita_above_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('zita_above_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col3 .content-html').text(to);
         });
     });
 wp.customize('zita_footer_bottom_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.bottom-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('zita_bottom_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.bottom-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('zita_bottom_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.bottom-footer-col3 .content-html').text(to);
         });
     });
/**************************************/
// Sidebar live preview
/**************************************/
/**
* Primary Sidebar Width Option
*/
	wp.customize( 'zita_sidebar_width', function( setting ) {
		setting.bind( function( width ) {

			if ( ! jQuery( '.site-container' ).hasClass( 'no-sidebar' ) && width >= 15 && width <= 50 ) {

				var dynamicStyle = '';

				dynamicStyle += '.site-content #primary{ width: ' + ( 100 - parseInt( width ) ) + '% } ';
				dynamicStyle += '.site-content #sidebar-primary{ width: ' + width + '% } ';

				zita_add_dynamic_css( 'zita_sidebar_width', dynamicStyle );
			}

		} );
	} );
    /**
	 * BLOG PAGE AND ARCHIVE PAGE LIVE PREVIEW
	*/
    wp.customize('zita_blog_read_more_txt', function(value){
         value.bind(function(to) {
             $('.entry-content p.read-more a').text(to);
         });
     });
/***************************/
// Scroll to top live preview
/***************************/
zita_css( 'zita_scroll_to_top_icon_radius','border-radius', '#move-to-top', 'px');
zita_css( 'zita_scroll_to_top_icon_clr','color', '#move-to-top');
zita_css( 'zita_scroll_to_top_icon_bg_clr','background', '#move-to-top');
zita_css( 'zita_scroll_to_top_icon_hvr_clr','color', '#move-to-top:hover');
zita_css( 'zita_scroll_to_top_icon_bghvr_clr','background', '#move-to-top:hover');
/***************************/
// Footer Live Preview
/***************************/
zita_css( 'zita_abv_ftr_botm_brd','border-bottom-width', '.top-footer-bar', 'px' );
zita_css( 'zita_above_frt_brdr_clr','border-bottom-color', '.top-footer-bar');
zita_css( 'zita_abve_ftr_hgt','line-height', '.top-footer-container', 'px');
zita_css( 'zita_btm_ftr_botm_brd','border-top-width', '.bottom-footer-bar', 'px' );
zita_css( 'zita_bottom_frt_brdr_clr','border-top-color', '.bottom-footer-bar');
zita_css( 'zita_btm_ftr_hgt','line-height','.bottom-footer-container', 'px');
/****************************************/
// color and background
/****************************************/
// gloabal color
zita_css( 'zita_link_hvr_clr','color','a:hover,.single .nav-previous:hover:before,.single .nav-next:hover:after,article.zita-article h2.entry-title a:hover,.zita-menu li a:hover,.main-header .zita-menu > li > a:hover,.main-header .main-header-bar a:hover, .zita-menu .content-social .social-icon li a:hover,.top-header .top-header-bar a:hover,.bottom-header .bottom-header-bar a:hover');
zita_css( 'zita_theme_clr','color','.blog article.zita-article .entry-content p:first-child:first-letter,.blog article.zita-article .entry-content p:first-child:first-letter,a:hover,.inifiniteLoader,mark,.single .nav-previous:hover:before,.single .nav-next:hover:after,.page-numbers.current, .page-numbers:hover, .prev.page-numbers:hover, .next.page-numbers:hover,.zita-load-more #load-more-posts:hover,.mhdrleftpan .header-pan-icon span,.mhdrrightpan .header-pan-icon span,article.zita-article h2.entry-title a:hover,.zita-menu li a:hover,.main-header .zita-menu > li > a:hover,a:hover,.single .nav-previous:hover:before,.single .nav-next:hover:after,article.zita-article h2.entry-title a:hover,.zita-menu li a:hover,.main-header .zita-menu > li > a:hover,.main-header .main-header-bar a:hover, .zita-menu .content-social .social-icon li a:hover,.top-header .top-header-bar a:hover,.bottom-header .bottom-header-bar a:hover,.top-footer .top-footer-bar a:hover,.bottom-footer .bottom-footer-bar a:hover');
wp.customize( 'zita_theme_clr', function( value ){
        value.bind( function( newval ) {
            $('.menu-custom-html > a button,.read-more .zta-button,button,.woocommerce #respond input#submit, .woocommerce a.button,.woocommerce button.button, .woocommerce input.button,.menu-custom-html > a button, .read-more .zta-button, #respond.comment-respond #submit, button,.zta-date-meta .posted-on,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.cart-contents .cart-crl,.main-header .main-header-bar a.main-header-btn,#move-to-top').css('background', newval );
            $('.menu-custom-html > a button, .read-more .zta-button, #respond.comment-respond #submit, button,.main-header .main-header-bar a.main-header-btn').css('border-color', newval );
        } );
    } );

zita_css( 'zita_link_clr','color','a,.single .nav-previous:before,.single .nav-next:after');
zita_css( 'zita_text_clr','color','body,.zita-site #content .entry-meta');
zita_css( 'zita_title_clr','color','article.zita-article h2.entry-title a,#sidebar-primary h2.widget-title,.woocommerce h1.product_title, .woocommerce-Tabs-panel h2, .related.products h2, section.up-sells h2, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-account .addresses .title h3,h1.page-title, h1.entry-title');
//site button
zita_css('zita_button_txt_clr','color','.menu-custom-html > a button,.read-more .zta-button,button,.woocommerce #respond input#submit, .woocommerce a.button,.woocommerce button.button, .woocommerce input.button,.main-header .main-header-bar a.main-header-btn');
zita_css('zita_button_border_radius','border-radius','.menu-custom-html > a button,.read-more .zta-button,button,.woocommerce #respond input#submit, .woocommerce a.button,.woocommerce button.button, .woocommerce input.button,.main-header .main-header-bar a.main-header-btn','px');
zita_css('zita_button_txt_hvr_clr','color','.menu-custom-html > a button:hover,.read-more .zta-button:hover,button:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,.woocommerce button.button:hover, .woocommerce input.button:hover,.main-header .main-header-bar a.main-header-btn:hover');
zita_css('zita_button_bg_clr','background','.menu-custom-html > a button,.read-more .zta-button,button,.woocommerce #respond input#submit, .woocommerce a.button,.woocommerce button.button, .woocommerce input.button,.main-header .main-header-bar a.main-header-btn');
zita_css('zita_button_bg_hvr_clr','background','.menu-custom-html > a button:hover,.read-more .zta-button:hover,button:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,.woocommerce button.button:hover, .woocommerce input.button:hover,.main-header .main-header-bar a.main-header-btn:hover');
// search icon
zita_css('zita_search_icon_font_size','font-size','.searchfrom .search-btn','px');
zita_css('zita_search_icon_radius','border-radius','.searchfrom .search-btn','px');
zita_css('zita_search_icon_clr','color','.top-header-bar .searchfrom .search-btn,.main-header-bar .searchfrom .search-btn,.bottom-header-bar .searchfrom .search-btn ,.zita-menu .menu-custom-search .searchfrom a');
zita_css('zita_search_icon_brd_clr','border-color','.searchfrom .search-btn');
zita_css('zita_search_icon_bg_clr','background','.searchfrom .search-btn');
zita_css('zita_search_icon_hvr_clr','color','.top-header-bar .searchfrom .search-btn:hover,.main-header-bar .searchfrom .search-btn:hover,.bottom-header-bar .searchfrom .search-btn:hover');
// search box
zita_css('zita_search_box_icon_width','width','.widget-area #searchform .form-content,.searchfrom #searchform .form-content','%');
zita_css('zita_search_box_icon_size','font-size','.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before','px');
zita_css('zita_search_box_icon_height','line-height','.widget-area #searchform input[type=submit],.widget-area input#s,.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before,.searchfrom input#s,.searchfrom #searchform input[type=submit]','px');
wp.customize( 'zita_search_box_icon_height', function( value ) {
        value.bind( function( newval ) {
            $('.widget-area #searchform input[type=submit],.widget-area input#s,.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before,.searchfrom input#s,.searchfrom #searchform input[type=submit]').css('height', newval );
        } );
    } );
zita_css('zita_search_box_radius','border-radius','.widget-area #searchform input[type=submit],.widget-area input#s,.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before,.searchfrom input#s,.searchfrom #searchform input[type=submit]','px');
zita_css('zita_social_box_bg_clr','background-color','.widget-area input#s,.searchfrom #searchform input#s');
zita_css('zita_social_box_icon_clr','color','.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before');
zita_css('zita_social_box_brdr_clr','border-color','.widget-area input#s,.searchfrom #searchform input#s');
zita_css('zita_social_box_plc_holdr_clr','color','.form-content input#s::-webkit-input-placeholder, .form-content input#s');
zita_css('zita_search_box_plc_txt_size','font-size','.form-content input#s::-webkit-input-placeholder, .form-content input#s','px');
/*************************/
// Hamburger Colors
/*************************/
zita_css('zita_hamburger_border_radius','border-radius','.menu-toggle .menu-btn,.bar-menu-toggle .menu-btn','px');
zita_css('zita_hamburger_bg_clr','background','.menu-toggle .menu-btn,.bar-menu-toggle .menu-btn');
zita_css('zita_hamburger_brdr_clr','border-color','.menu-toggle .menu-btn,.bar-menu-toggle .menu-btn');
zita_css('zita_hamburger_icon_clr','background','.menu-toggle .icon-bar');
wp.customize( 'zita_hamburger_icon_clr', function( value ) {
        value.bind( function( newval ) {
            $('.menu-toggle .icon-bar').css('color', newval );
        } );
    } );

/**********************/
// woocommerce
/**********************/
     /**
     * Shop: Box Shadow
     */
    wp.customize( 'zita_shop_product_box_shadow', function( setting ) {
        setting.bind( function( product_shadow ) {
            var products = $(document).find('.woocommerce-page .products .product, .woocommerce .products .product');
            product_shadow = product_shadow > 5 ? 5 : ( product_shadow < 0 ? 0 : product_shadow );
            products.removeClass('zita-shadow-1 zita-shadow-2 zita-shadow-3 zita-shadow-4 zita-shadow-5');
            products.addClass( 'zita-shadow-' + product_shadow );
        } );
    } );
    /**
     * Shop: Box Shadow Hover
     */
    wp.customize( 'zita_shop_product_box_shadow_on_hover', function( setting ) {
        setting.bind( function( product_shadow ) {
            var products = $(document).find('.woocommerce-page .products .product, .woocommerce .products .product');
            product_shadow = product_shadow > 5 ? 5 : ( product_shadow < 0 ? 0 : product_shadow );
            products.removeClass('zita-shadow-hover-1 zita-shadow-hover-2 zita-shadow-hover-3 zita-shadow-hover-4 zita-shadow-hover-5');
            products.addClass( 'zita-shadow-hover-' + product_shadow );
        } );
    } );
/*******************/
//Typography
/******************/
// body font size
wp.customize(
    'zita_body_font_size', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_body_font_size'
                };
                var arraySizes = {
                    size3: { selectors:'body', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// line-height
wp.customize(
    'zita_body_font_line_height', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_body_font_line_height'
                };

                var arraySizes = {
                    size3: { selectors:'body', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// letter-spacing
wp.customize(
    'zita_body_font_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_body_font_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'body', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);

// content
// h1
wp.customize(
    'zita_h1_size', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_h1_size'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h1', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h1_line_height', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_h1_line_height'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h1', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h1_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_h1_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h1', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// h2
wp.customize(
    'zita_h2_size', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_h2_size'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h2', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h2_line_height', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_h2_line_height'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h2', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h2_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_h2_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h2', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// h3
wp.customize(
    'zita_h3_size', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_h3_size'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h3', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h3_line_height', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_h3_line_height'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h3', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h3_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_h3_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h3', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// h4
wp.customize(
    'zita_h4_size', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_h4_size'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h4', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h4_line_height', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_h4_line_height'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h4', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h4_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_h4_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h4', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// h5
wp.customize(
    'zita_h5_size', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_h5_size'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h5', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h5_line_height', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_h5_line_height'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h5', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h5_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_h5_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h5', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
// h6
wp.customize(
    'zita_h6_size', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'px',
                    styleClass: 'zita_h6_size'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h6', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h6_line_height', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: '',
                    styleClass: 'zita_h6_line_height'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h6', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'zita_h6_letter_spacing', function (value){
       'use strict';
        value.bind(
            function( to ){
                var settings = {
                    cssProperty: 'letter-spacing',
                    propertyUnit: 'px',
                    styleClass: 'zita_h6_letter_spacing'
                };
                var arraySizes = {
                    size3: { selectors:'.entry-content h6', values: ['','',''] }
                };
                zitaGetCss( arraySizes, settings, to );
            }
        );
    }
);
}));