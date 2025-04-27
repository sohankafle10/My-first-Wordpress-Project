/*************************************/
// Blog Archive Hide and Show control
/*************************************/
( function( $ ){
ZTAControlTrigger.addHook( 'zita-toggle-control', function( argument, api ){
ZTACustomizerToggles ['zita_blog_layout'] = [
		    {
				controls: [    
				'zita_blog_grid_layout',
				'zita-settings[zita-blog-structure-meta]',
				'zita_blog_img_rmv_space' 
				],
				callback: function(layout){
					if((layout == 'zta-blog-layout-1')){
					return true;
					}
					return false;
				}
			},
				
		];

  });
  ZTACustomizerToggles ['zita_date_box'] = [
		    {
				controls: [    
				'zita_datebox_style'
				],
				callback: function(layout){
					if(layout==1){
					return true;
					}
					return false;
				}
			},	
		];
ZTACustomizerToggles ['zita_blog_post_content'] = [
		    {
				controls: [    
				'zita_blog_expt_length',
				'zita_blog_read_more_txt',
				'zita_main_read_more_btn',
				'zita_main_read_more_btn_excert_optional',
				],
				callback: function(layout){
					if(layout=='full'||layout=='nocontent'){
					return false;
					}
					return true;
				}
			},	
		];
ZTACustomizerToggles ['zita_main_read_more_btn_excert_optional'] = [
		    {
				controls: [    
				'zita_blog_expt_length',
				],
				callback: function(optn){
					if(optn==true){
					return false;
					}
					return true;
				}
			},	
		];		
 ZTACustomizerToggles ['zita_blog_post_pagination'] = [
		    {
				controls: [    
				'zita_load_more_txt'
				],
				callback: function(layout){
					if(layout=='num' || layout=='scroll'){
					return false;
					}
					return true;
				}
			},	
		];
  ZTACustomizerToggles ['zita_blog_content_width'] = [
		    {
				controls: [    
				'zita_blog_cnt_widht'
				],
				callback: function(layout){
					if(layout=='custom'){
					return true;
					}
					return false;
				}
			},	
		];
 ZTACustomizerToggles ['zita_blog_grid_layout'] = [
		    {
				controls: [    
				'zita_blog_highlight'
				],
				callback: function(layout){
					if(layout!=='zta-one-colm'){
					return true;
					}
					return false;
				}
			},	
		];
})( jQuery );