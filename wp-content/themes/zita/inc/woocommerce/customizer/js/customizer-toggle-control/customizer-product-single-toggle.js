/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ) {
ZTACustomizerToggles ['zita_single_product_tab_display'] = [
		    {
				controls: [    
				'zita_single_product_tab_layout',   
				],
				callback: function(layout){
					if(layout == true){
					return true;
					}
					return false;
				}
			},		
		];
ZTACustomizerToggles ['zita_upsell_product_display'] = [
		    {
				controls: [    
				'zita_upsale_num_col_shw',
				'zita_upsale_num_product_shw',   
				],
				callback: function(layout){
					if(layout == true){
					return true;
					}
					return false;
				}
			},		
		];
ZTACustomizerToggles ['zita_related_product_display'] = [
		    {
				controls: [    
				'zita_related_num_col_shw',
				'zita_related_num_product_shw',   
				],
				callback: function(layout){
					if(layout == true){
					return true;
					}
					return false;
				}
			},		
		];
ZTACustomizerToggles ['zita_single_product_content_width'] = [
		    {
				controls: [    
				'zita_product_cnt_widht',   
				],
				callback: function(layout){
					if(layout == 'defualt'){
					return false;
					}
					return true;
				}
			},		
		];		
  });
})( jQuery );