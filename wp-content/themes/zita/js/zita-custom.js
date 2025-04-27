jQuery(document).ready(function(){
 "use strict";
//-----------------------//
// loader
//-----------------------//
if(!jQuery('body').hasClass('elementor-editor-active')){
jQuery(document).ready(function(){
setTimeout(removeLoader); //wait for page load PLUS two seconds.
});
function removeLoader(){
    jQuery( ".zita_overlayloader" ).fadeOut(700, function(){
      // fadeOut complete. Remove the loading div
    jQuery(".zita-pre-loader img" ).hide(); //makes page more lightweight
    });  
  }
}
jQuery(window).on("load resize",function(e){
 if(jQuery(window).width()<='1024'){
          jQuery('#zita-menu a,#zita-above-menu a,.menu-btn-btm a,#menu-all-pages a').attr("tabindex","-1");
   }
 });
 // close-button-active
        if(jQuery('body').hasClass('mobile-menu-active','mobile-above-menu-active','mobile-bottom-menu-active').length!=''){
            jQuery('body').find('.sider').prepend('<div class="menu-close"><span tabindex="0" class="menu-close-btn"></span></div>');
            jQuery('.menu-close-btn').removeAttr("href");
            //Menu close
            jQuery('.menu-close-btn,.zita-menu li a span.zita-menu-link').click(function(){
            jQuery('body').removeClass('mobile-menu-active');
            jQuery('body').removeClass('mobile-above-menu-active');
            jQuery('body').removeClass('mobile-bottom-menu-active');
            });
            jQuery('.menu-close-btn,.zita-menu li a span.zita-menu-link').keypress(function(){
            jQuery('body').removeClass('mobile-menu-active');
            jQuery('body').removeClass('mobile-above-menu-active');
            jQuery('body').removeClass('mobile-bottom-menu-active');
            });
            zitamenu.modalMenu.init();
              // Esc key close menu
            document.addEventListener( 'keydown', function( event ) {
            if ( event.keyCode === 27 ) {
              event.preventDefault();
              document.querySelectorAll( '.mobile-menu-active' ).forEach( function( element ) {
                jQuery('body').removeClass('mobile-menu-active');
              }.bind( this ) );
              document.querySelectorAll( '.mobile-above-menu-active' ).forEach( function( element ) {
                jQuery('body').removeClass('mobile-above-menu-active');
              }.bind( this ) );
              document.querySelectorAll( '.mobile-bottom-menu-active' ).forEach( function( element ) {
                jQuery('body').removeClass('mobile-bottom-menu-active');
              }.bind( this ) );
            }
          }.bind( this ) );
        //ToggleBtn above Click
        jQuery('.menu-btn-abv').click(function (e){
           e.preventDefault();
           jQuery('.menu-btn-abv a').attr("tabindex","0");
           jQuery('body').addClass('mobile-above-menu-active');
           jQuery('#zita-above-menu').removeClass('hide-menu'); 
           jQuery('.sider.above').removeClass('zita-menu-hide');
           jQuery('.sider.main').addClass('zita-menu-hide');
           jQuery('.sider.bottom').addClass('zita-menu-hide');    
        });
        jQuery('.menu-btn-abv').keypress(function (e){
           e.preventDefault();
           jQuery('.menu-btn-abv a').attr("tabindex","0");
           jQuery('body').addClass('mobile-above-menu-active');
           jQuery('#zita-above-menu').removeClass('hide-menu'); 
           jQuery('.sider.above').removeClass('zita-menu-hide');
           jQuery('.sider.main').addClass('zita-menu-hide');
           jQuery('.sider.bottom').addClass('zita-menu-hide');    
        });
        //ToggleBtn main menu Click
        jQuery('#menu-btn').click(function (e){
           jQuery('#zita-menu a').attr("tabindex","0");
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#zita-menu').removeClass('hide-menu');
           jQuery('.sider.above').addClass('zita-menu-hide');  
           jQuery('.sider.main').removeClass('zita-menu-hide');   
           jQuery('.sider.bottom').addClass('zita-menu-hide');  
        });
        jQuery('#menu-btn').keypress(function (e){
          jQuery('#zita-menu a').attr("tabindex","0");
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#zita-menu').removeClass('hide-menu');
           jQuery('.sider.above').addClass('zita-menu-hide');  
           jQuery('.sider.main').removeClass('zita-menu-hide');   
           jQuery('.sider.bottom').addClass('zita-menu-hide');  
        });
        //ToggleBtn bottom menu Click
        jQuery('.menu-btn-btm').click(function (e){
           e.preventDefault();
           jQuery('.menu-btn-btm a').attr("tabindex","0");
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#zita-bottom-menu').removeClass('hide-menu');
           jQuery('.sider.bottom').removeClass('zita-menu-hide');  
           jQuery('.sider.main').addClass('zita-menu-hide');
           jQuery('.sider.above').addClass('zita-menu-hide');     
        });
        jQuery('.menu-btn-btm').keypress(function (e){
           e.preventDefault();
           jQuery('.menu-btn-btm a').attr("tabindex","0");
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#zita-bottom-menu').removeClass('hide-menu');
           jQuery('.sider.bottom').removeClass('zita-menu-hide');  
           jQuery('.sider.main').addClass('zita-menu-hide');
           jQuery('.sider.above').addClass('zita-menu-hide');     
        });
        // default page
        jQuery('#menu-btn').click(function (e){
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#menu-all-pages').removeClass('hide-menu');  
           jQuery('#menu-all-pages a').attr("tabindex","0");  
        });
        jQuery('#menu-btn').keypress(function (e){
           e.preventDefault();
           jQuery('body').addClass('mobile-menu-active');
           jQuery('#menu-all-pages').removeClass('hide-menu'); 
           jQuery('#menu-all-pages a').attr("tabindex","0");    
        });

      

      }
 // deafult menu
jQuery(document).ready(function(){
             jQuery("#menu-all-pages.zita-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'fast', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });       
        });
// main-menu-script
jQuery(document).ready(function (){
  if(jQuery("body").hasClass('mhdfull')){
            jQuery(".main-header #zita-menu").zitaResponsiveMenu({
                 resizeWidth:'2400', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            }); 
          }else{
           jQuery(".main-header #zita-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
          }     
      });
// above-menu-script
jQuery(document).ready(function (){
             jQuery("#zita-above-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });      
         });
// bottom-menu-script
jQuery(document).ready(function (){
             jQuery("#zita-bottom-menu").zitaResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
             
         });
//**********************/
// header top search box
//**********************/
jQuery(".top-header-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-header-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-header-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-header-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-header-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-header-col3 .searchfrom #searchform").slideToggle(300);
};
});
/********************/
// main header search
/********************/
jQuery(".menu-custom-search .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".menu-custom-search .searchfrom #searchform").slideToggle(300);
};
});
//**********************/
// header bottom search box
//**********************/
jQuery(".bottom-header-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-header-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-header-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-header-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-header-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-header-col3 .searchfrom #searchform").slideToggle(300);
};
});
//**********************/
// footer above search box
//**********************/
jQuery(".top-footer-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-footer-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-footer-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-footer-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".top-footer-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".top-footer-col3 .searchfrom #searchform").slideToggle(300);
};
});
//**********************/
// footer bottom search box
//**********************/
jQuery(".bottom-footer-col1 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-footer-col1 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-footer-col2 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-footer-col2 .searchfrom #searchform").slideToggle(300);
};
});
jQuery(".bottom-footer-col3 .search-btn").on("click", function(e){
e.preventDefault();
e.stopPropagation();
if(jQuery(this).find(jQuery(".fa")).toggleClass('fa-search').toggleClass('fa-close')){
jQuery(".bottom-footer-col3 .searchfrom #searchform").slideToggle(300);
};
});
/*------------------------------------------------/*
* masnory
/*------------------------------------------------*/
if( jQuery('.zta-masnory').length > 0 ){
   jQuery(window).load(function(){
   jQuery('.zta-masnory').masonry({
     itemSelector: '.post',
     isFitWidth:false,
     columnWidth: '.post',
     percentPosition: true
    }).imagesLoaded(function(){
    jQuery('.zta-masnory').masonry('reloadItems');
    });
    jQuery(window).resize(function (){
    jQuery('.zta-masnory').masonry('bindResize')
    });
 });
}
/**************************************************/
// Show-hide Scroll to top & move-to-top arrow
/**************************************************/
if(jQuery("#back-to-top").val()=='on'){
  jQuery("body").prepend("<a id='move-to-top' class='animate' href='#'><i class='fa fa-angle-up'></i></a>"); 
  var scrollDes = 'html,body';  
  /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
  if(navigator.userAgent.match(/opera/i)){
    scrollDes = 'html';
  }
  //show ,hide
  jQuery(window).scroll(function (){
    if(jQuery(this).scrollTop() > 160){
      jQuery('#move-to-top').addClass('filling').removeClass('hiding');
    }else{
      jQuery('#move-to-top').removeClass('filling').addClass('hiding');
    }
  });
  jQuery('#move-to-top').click(function(){
      jQuery("html, body").animate({ scrollTop: 0 }, 600);
      return false;
  });
}
/**************************************************/
// Admin-bar height calculate
/**************************************************/
(function(jQuery){
    'use strict';
    jQuery(document).ready(function() {
        // if adminbar exist (should check for visible?) then add margin to our navbar
        var $wpAdminBar = jQuery('#wpadminbar');
        if ($wpAdminBar.length) {
           jQuery('header.mhdrleftpan,header.mhdrrightpan').css('margin-top',$wpAdminBar.height()+'px');
        }
    });
})(jQuery);
/**************************************************/
//mobile pan class activate
/**************************************************/
jQuery('.pan-icon,#bar-menu-btn').click(function (e){
e.preventDefault();
jQuery('body').toggleClass('mobile-pan-active');
jQuery('body').removeClass('cart-pan-active');
jQuery('.zita-menu li a span.zita-menu-link').click(function (e){
jQuery('body').removeClass('mobile-pan-active');
});
});
/**************************************************/
//mobile pan class activate
/**************************************************/
jQuery('header.mhdrleftpan .cart-contents,header.mhdrrightpan .cart-contents,header.mhdminbarleft .cart-contents,header.mhdminbarright .cart-contents,header.mhdminbarbtm .cart-contents').click(function (e){
e.preventDefault();
jQuery('body').toggleClass('cart-pan-active');
jQuery('body').find('.zita-cart').prepend('<div class="cart-close"><a class="cart-close-btn"></a></div>');
jQuery('.cart-close a').click(function (e){
jQuery('body').removeClass('cart-pan-active');
});
});

});

/**************************************************/
//Header sticky
/**************************************************/
if(jQuery("header.zta-above-stick-hdr").length!=''||jQuery("header.zta-main-stick-hdr").length!=''||jQuery("header.zta-bottom-stick-hdr").length!=''){
if(jQuery("#header-scroll-down-hide").val()=='on'){
  var position = jQuery(window).scrollTop(); 
  var $headerBar = jQuery('header').height();
  var $mainheader = jQuery('header.zta-main-stick-hdr .main-header').height(); 
 var $topheader = jQuery('header.zta-main-stick-hdr .top-header').height(); 
 var $bottomheader = jQuery('header.zta-main-stick-hdr .bottom-header').height();
 $tl$headerBar = $mainheader + $topheader +$bottomheader;
// should start at 0
jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    if(scroll > position || scroll < $headerBar) {
    jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").removeClass("shrink");
    jQuery('#content,.elementor').css('margin-top',0+'px');
    }else{
    jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").addClass("shrink");
    if(jQuery('header.zta-transparent-header').length!=''){
          jQuery('#content,.elementor').css('margin-top',0+'px');
       }else{
         if(jQuery('body.elementor-page').length!=''){
                       jQuery('.elementor').css('margin-top',$tl$headerBar+'px');
              }else{
                      jQuery('#content').css('margin-top',$tl$headerBar+'px');
              }
         
       }
    }
    position = scroll;
});
}else{
jQuery(document).on("scroll", function(){
var $headerBar = jQuery('header').height();
var $mainheader = jQuery('header.zta-main-stick-hdr .main-header').height(); 
var $topheader = jQuery('header.zta-main-stick-hdr .top-header').height(); 
var $bottomheader = jQuery('header.zta-main-stick-hdr .bottom-header').height(); 
$tl$headerBar = $mainheader + $topheader +$bottomheader;
var $totalheaderBar = $headerBar + 20;
  if(jQuery(document).scrollTop() > $totalheaderBar){
      jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").addClass("shrink");
        if(jQuery('header.zta-transparent-header').length!=''){
          jQuery('#content,.elementor').css('margin-top',0+'px');
       }else{
         if(jQuery('body.elementor-page').length!=''){
                       jQuery('.elementor').css('margin-top',$tl$headerBar +'px');
              }else{
                      jQuery('#content').css('margin-top',$tl$headerBar +'px');
              }
       }
    }else{
      jQuery("header.zta-above-stick-hdr,header.zta-main-stick-hdr,header.zta-bottom-stick-hdr").removeClass("shrink");
      jQuery('#content,.elementor').css('margin-top',0+'px');

  } 
});
}
}
// wp nav menu widget last item
jQuery(document).ready(function(){
jQuery(".widget_nav_menu .main-header-btn").remove();
});

// add class elementor sidebar

jQuery(document).ready(function(){
if(jQuery('.elementor-widget-container').length!=''){
jQuery('.elementor-widget-container').addClass('widget-area');
}
});

/* -----------------------------------------------------------------------------------------------
  Modal Menu
--------------------------------------------------------------------------------------------------- */
var zitamenu = zitamenu || {};

zitamenu.modalMenu = {

  init: function() {
   
    this.keepFocusInModal();
  },
  keepFocusInModal: function() {
    var _doc = document;
    _doc.addEventListener( 'keydown', function( event ) {
      var toggleTarget, modal, selectors, elements, menuType, bottomMenu, activeEl, lastEl, firstEl, tabKey, shiftKey,
        toggleTarget = '.sider';
        if(jQuery('.mobile-menu-active').length!=''){
        selectors = 'a';
        modal = _doc.querySelector( toggleTarget );
        elements = modal.querySelectorAll( selectors );
        elements = Array.prototype.slice.call( elements );
        if ( '.sider' === toggleTarget ) {
          menuType = window.matchMedia( '(min-width: 1024px)' ).matches;
          menuType = menuType ? '.expanded-menu' : '.zita-menu';
          elements = elements.filter( function( element ) {
            return null !== element.closest( menuType ) && null !== element.offsetParent;
          } );

          elements.unshift( _doc.querySelector( '.menu-close-btn' ) );
        }

        lastEl = elements[ elements.length - 1 ];
        firstEl = elements[0];
        activeEl = _doc.activeElement;
        tabKey = event.keyCode === 9;
        shiftKey = event.shiftKey;

        if ( ! shiftKey && tabKey && lastEl === activeEl ) {
          event.preventDefault();
          firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === activeEl ) {
          event.preventDefault();
          lastEl.focus();
        }
      }
    } );
  }
}; // zitamenu.modalMenu