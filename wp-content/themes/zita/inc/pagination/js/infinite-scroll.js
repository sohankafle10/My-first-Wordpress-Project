/* Ajax functions */
jQuery(document).ready(function($){
        //find scroll position
        //init
 if(jQuery('#loadMore').length!='') {      
        var that    = jQuery('#loadMore');
        var page    = that.data('page');
        var count   = 2;
        var ppp     = that.data('ppp');
        var total   = that.data('total');
        var cat     = that.data('catslug');
        var author  = that.data('authorid');
        var year    = that.data('year');
        var month   = that.data('month');
        var ajaxurl = that.data('url');
        jQuery(window).scroll(function(){
        if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
        if (count > total){
              return false;
           }else{
               loadScrolling(count,ppp,ajaxurl);
           }
           count++;
          }
       });
function loadScrolling(page,ppp,ajaxurl){
jQuery('.inifiniteLoader').show('fast');
if( jQuery('.zta-masnory').length > 0 ){
  $container = jQuery('.zta-masnory');
  $container.imagesLoaded(function(){ 
  $container.masonry({
        itemSelector: '.post',
        percentPosition:true,
        isFitWidth: true,
    });
  });  
}
jQuery.ajax({  
            url: ajaxurl,
            type: 'POST',
            data: {
                offset:(page * ppp),
                paged: page,
                ppp: ppp,
                catslug: cat,
                authorid: author,
                yearid: year,
                monthid: month,
                action:'zita_ajax_script_load_more'
            },
    }).success( function(response){ 
      
if (response == 0){
jQuery('.scroll-error').append('<div id="no-more" class="text-center"><p>No more posts to load.</p></div>');
jQuery('.inifiniteLoader').hide('1000');
}else{
 page++;
if( jQuery('.zta-masnory').length > 0 ){
   jQuery('.zta-masnory').append(response).each(function(){
      jQuery('.zta-masnory').masonry('reloadItems',true);
          jQuery(window).resize(function (){
             jQuery('.zta-masnory').masonry('bindResize')
               });
           });
      jQuery('.zta-masnory').imagesLoaded(function(){ 
         jQuery('.zta-masnory').masonry();
           });
         }else{
             jQuery("#main .main-content-row").append(response); // CHANGE THIS!
        }
}
jQuery('.inifiniteLoader').hide('1000');
});
return false;
}
}
});