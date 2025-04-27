/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ){
ZTACustomizerToggles ['zita_sidebar_default_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width'  
				],
				callback: function(layout){
					var pageset = api( 'zita_sidebar_page_layout' ).get();
					var blogset = api( 'zita_sidebar_blog_layout' ).get();
					var arcset = api( 'zita_sidebar_archive_layout' ).get();
					if(layout=='no-sidebar'){
					return false;
					}
					return true;
				}
			},		
		];
  ZTACustomizerToggles ['zita_sidebar_page_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'zita_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['zita_sidebar_blog_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'zita_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['zita_sidebar_archive_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'zita_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['zita_sidebar_woo_layout'] = [
		    {
				controls: [    
				'zita_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'zita_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	});
})( jQuery );