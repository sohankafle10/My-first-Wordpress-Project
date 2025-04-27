jQuery(document).ready(function(){
/* woo, wc_add_to_cart_params */
  if ( typeof wc_add_to_cart_params === 'undefined' ){
      return false;
  }
  // Ajax remove cart item
  jQuery( document ).on( 'click', 'a.remove', function(e) { // Remove button selector
      e.preventDefault();
      // AJAX add to cart request

      var $thisbutton = jQuery( this );
      if ( $thisbutton.is( '.remove' ) ){
          //Check if the button has a product ID
          if ( ! $thisbutton.attr( 'data-product_id' ) ){ 
              return true;
          }
        }
        $product_id = $thisbutton.attr( 'data-product_id' );
          var data = {'product_id':$product_id,
           'action': 'zita_product_remove'
         };
         jQuery.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response){
            jQuery('.zita-quickcart-dropdown').html(response);

        var data = {
           'action': 'zita_product_count_update'
         };
         jQuery.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response_data){
            jQuery('.cart-contents').html(response_data);
           }
         );

           }
         );

      return false;
  });
});

jQuery(document).ready(function($){  
            $('form.cart').on( 'click', 'button.plus, button.minus', function(){
                // Get current quantity values
                var qty = $( this ).siblings('.quantity').find( '.qty' );
                var val = parseFloat(qty.val()) ? parseFloat(qty.val()) : '0';
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));
 
                // Change the value if plus or minus
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
                 
            });
             
        });
