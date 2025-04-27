/*****************************************************************************/
/**********************customizer control setting*************************/
/*****************************************************************************/
( function( $ ) {
//**********************************/
// Footer widget hide and show settings
//**********************************/
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ){
		ZTACustomizerToggles ['zita_bottom_footer_widget_layout'] = [
			{
				controls: [
					
					'zita_footer_widget_content_width',
					'zita_bottom_footer_widget_redirect',
					'zita_bottom_footer_widget_color_scheme'
				],
				callback: function(layout){
					if ('ft-wgt-none'== layout){
						return false;
					}
					return true;
				}
			},
				
		];	
 });
})( jQuery );
