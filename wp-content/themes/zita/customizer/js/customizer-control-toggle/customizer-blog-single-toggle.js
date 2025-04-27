/*************************************/
// Blog Single Hide and Show control
/*************************************/
( function( $ ){
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ){
ZTACustomizerToggles ['zita_single_post_content_width'] = [
		    {
				controls: [    
				'zita_sngle_cnt_widht',
				],
				callback: function(layout){
					if((layout == 'defualt')){
					return false;
					}
					return true;
				}
			},
		];
ZTACustomizerToggles ['zita_single_related_post'] = [
		    {
				controls: [    
				'zita_single_related_post_option',
				],
				callback: function(layout){
					if((layout == 1)){
					return true;
					}
					return false;
				}
			},
		];
  });
})( jQuery );