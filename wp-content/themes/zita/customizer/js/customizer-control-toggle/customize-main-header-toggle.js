/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// container hide and show settings
//**********************************/
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ){
		ZTACustomizerToggles ['zita_main_header_set'] = [
		    {
				controls: [    
				'zita_main_header_texthtml',
				'zita_mian_header_widget_redirect',
				'zita_mian_header_social_media_redirect',
				'zita_main_header_btn_txt',
				'zita_main_header_btn_url'   
				],
				callback: function(custommenu){
					if (custommenu =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'zita_main_header_texthtml',   
				],
				callback: function(custommenu){
					if (custommenu =='text'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'zita_mian_header_widget_redirect',   
				],
				callback: function(custommenu){
					if (custommenu =='widget'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'zita_mian_header_social_media_redirect',   
				],
				callback: function(custommenu){
					if (custommenu =='social'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'zita_main_header_btn_txt',
				'zita_main_header_btn_url' 
				],
				callback: function(custommenu){
					if (custommenu =='button'){
					return true;
					}
					return false;
				}
			},	
		];
		ZTACustomizerToggles ['zita_main_header_layout'] = [
		    {
				controls: [    
				'zita_mobile_menu_open', 
				'zita_main_header_menu_align',
				'zita_main_header_mobile_txt'
				],
				callback: function(custommenu){
					if (custommenu =='mhdrleftpan' || custommenu =='mhdrrightpan'){
					return false;
					}
					return true;
				}
			},	
			 
		];	
  });
})( jQuery );