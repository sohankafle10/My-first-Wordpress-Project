<?php 
/**
 * Common Function for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/***************************/
// LEFTMINBAR HEADERLAYOUT
/***************************/
if ( ! function_exists( 'zita_minbar_header_markup' ) ){
function zita_minbar_header_markup(){ 
$zita_main_header_layout = get_theme_mod('zita_main_header_layout'); 
if($zita_main_header_layout=='mhdminbarleft'){
$barlayout='leftminbar';
}else{
$barlayout='rightminbar';    
} 
$zita_main_header_menu_disable = get_theme_mod( 'zita_main_header_menu_disable',false);?>
<div class="min-bar-header <?php echo esc_attr($barlayout);?>">
    <div class="min-bar-header-content">
                <div class="container">
                    <div class="min-bar-container">
        <div class="min-bar-col1">
            <div class="bar-menu-toggle">
            <button type="button" class="menu-btn" id="bar-menu-btn">
            <span class="menu-icon-inner"></span>
            </button>
            </div>
            <?php 
    if(class_exists( 'WooCommerce' )){
    if(get_theme_mod('zita_woo_cart_visibility')=='display-all'){?>
    <div class="zita_woo_cart">
    <?php do_action( 'zita_cart_count' ); 
       do_action( 'zita_cart' );?>
    </div>
   <?php  }
    if(get_theme_mod('zita_woo_cart_visibility')=='disable-mobile'){
       if (!wp_is_mobile()):?>
        <div class="zita_woo_cart">
       <?php do_action( 'zita_cart_count' ); 
       do_action( 'zita_cart' );?>
        </div>
       <?php endif;
     }
    }
    ?>
    </div>
             <div class="min-bar-col2">
                <?php zita_logo();?>
             </div>
                    </div>
                </div>
     </div>
</div>
<?php } }

/************************/
// bottombar_header
/************************/
if ( ! function_exists( 'zita_bottombar_header_markup' ) ){
function zita_bottombar_header_markup(){ 
$zita_main_header_layout = get_theme_mod('zita_main_header_layout','mhdrleft'); 
if($zita_main_header_layout=='mhdminbarbtm'){
$barlayout='bottomminbar';
}
$zita_main_header_menu_disable = get_theme_mod( 'zita_main_header_menu_disable',false);?>
<div class="min-bar-header <?php echo esc_attr($barlayout);?>">
    <div class="min-bar-header-content">
                <div class="container">
                    <div class="min-btm-bar-container">
        
             <div class="min-btm-bar-col1">
                <?php zita_logo();?>
             </div>
             <div class="min-btm-bar-col2">
            <div class="bar-menu-toggle">
            <button type="button" class="menu-btn" id="bar-menu-btn">
            <span class="menu-icon-inner"></span>
            </button>
            </div>
            <?php 
    if(class_exists( 'WooCommerce' )){
    if(get_theme_mod('zita_woo_cart_visibility')=='display-all'){?>
    <div class="zita_woo_cart">
    <?php do_action( 'zita_cart_count' ); 
       do_action( 'zita_cart' );?>
    </div>
   <?php  }
    if(get_theme_mod('zita_woo_cart_visibility')=='disable-mobile'){
       if (!wp_is_mobile()):?>
        <div class="zita_woo_cart">
       <?php do_action( 'zita_cart_count' ); 
       do_action( 'zita_cart' );?>
        </div>
       <?php endif;
     }
    }
    ?>
    </div>
                    </div>
                </div>
                
     </div>
</div>
<?php } }

/**
 * Function to get mian Header
 */
if ( ! function_exists( 'zita_main_header_markup' ) ){
function zita_main_header_markup(){ ?>
<?php 
$zita_main_header_layout = get_theme_mod( 'zita_main_header_layout','mhdrleft');
$zita_main_header_menu_disable = get_theme_mod( 'zita_main_header_menu_disable',false);
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter');
$zita_main_header_mobile_txt = get_theme_mod( 'zita_main_header_mobile_txt','');
$zita_main_header_menu_align = get_theme_mod( 'zita_main_header_menu_align','inline');
//menu style
if($zita_main_header_layout=='mhdrleft' || $zita_main_header_layout=='mhdrcenter' || $zita_main_header_layout=='mhdrright'){
$zitapro_menu_alignment = get_theme_mod( 'zitapro_menu_alignment','right-menu');
$zitapro_menu_effect = get_theme_mod( 'zitapro_menu_effect','linkeffect-none');
}else{
  $zitapro_menu_alignment='';  
  $zitapro_menu_effect='';
}
?>	
<div class="main-header <?php echo esc_attr($zita_main_header_layout);?> <?php echo esc_attr($zita_main_header_menu_align);?> <?php echo esc_attr($zitapro_menu_alignment);?> <?php echo esc_attr($zitapro_menu_effect);?>">
	     	<div class="main-header-bar two">
	     		<div class="container">
	     			<div class="main-header-container">
           <?php if($zita_main_header_layout!=='mhdrrightpan' && $zita_main_header_layout!=='mhdrleftpan' && $zita_main_header_layout!=='mhdminbarleft' && $zita_main_header_layout!=='mhdminbarright' && $zita_main_header_layout!=='mhdminbarbtm'):?>
		                <div class="main-header-col1">
		                     <?php zita_logo();?>
                        </div>
                    <?php endif; ?>
      <div class="main-header-col2">
   <?php if($zita_main_header_menu_disable==false){?>
        <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
            <div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
            </div>
            <div class="text">
                 <?php if($zita_main_header_mobile_txt!==''){ ?>
                <span><?php echo esc_html($zita_main_header_mobile_txt);?></span>
                 <?php } ?>
            </div>
           
            </button>
        </div>
        <div class="sider main zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner"><?php if( has_nav_menu('zita-main-menu' )){
         zita_main_nav_menu();
        }else{
            wp_page_menu(
                array( 
            'items_wrap'  => '<ul class="zita-menu" data-menu-style="'.esc_attr(zita_header_menu_style()).'">%3$s</ul>',
            'link_before' => '<span>',
            'link_after'  => '</span>')
            ); 
        }?>
        </div>
        </div>
        </nav>

    <?php } else { ?>

        <div class="sider-inner">
        <?php echo zita_add_header_widthout_menu_custom_item();?>
        </div>

    <?php } ?>
    <?php 
    if($zita_main_header_layout!=='mhdminbarleft' && $zita_main_header_layout!=='mhdminbarright' && $zita_main_header_layout!=='mhdminbarbtm'){
    if(class_exists( 'WooCommerce' )){    
    if(get_theme_mod('zita_woo_cart_visibility')=='display-all'){?>
    <div class="zita_woo_cart">
    <?php do_action( 'zita_cart_count' ); 
       do_action( 'zita_cart' );?>
    </div>
   <?php  }
    if(get_theme_mod('zita_woo_cart_visibility')=='disable-mobile'){
       if (!wp_is_mobile()):?>
        <div class="zita_woo_cart">
       <?php do_action( 'zita_cart_count' ); 
       do_action( 'zita_cart' );?>
        </div>
       <?php endif;
     }
    }
    }
    ?>
        <!-- Responsive Menu Structure-->
    </div> <!-- col-2-->
		            </div>
		        </div>
		    </div>
		</div> 				
<?php	}
}
add_action( 'zita_main_header', 'zita_main_header_markup' );
/**************************************/
//logo & site title function
/**************************************/
if ( ! function_exists( 'zita_logo' ) ){
function zita_logo(){
$title_disable          = get_theme_mod( 'title_disable','enable');
$tagline_disable        = get_theme_mod( 'tagline_disable','enable');
$description            = get_bloginfo( 'description', 'display' );?>
<div class="zita-logo">
<?php zita_custom_logo();?>
</div>
<?php 
if($title_disable!='' || $tagline_disable!=''){
if($title_disable!=''){	
?>
<?php if(zita_is_blog()){?>
<h1 class="site-title">
    <span>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
     </span>
</h1>
<?php }else{?>
    <div class="site-title">
    <span>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
     </span>
</div>

<?php }
}
if($tagline_disable!=''){
if( $description || is_customize_preview() ):?>
<div class="site-description">
   <p><?php echo esc_html($description); ?></p>
</div>
<?php endif;
      }
    } 
  }
}
/**************************************/
//Top Header function
/**************************************/
if ( ! function_exists( 'zita_top_header_markup' ) ){	
function zita_top_header_markup(){ ?>
<?php 
$zita_above_header_layout     = get_theme_mod( 'zita_above_header_layout','abv-none');
$zita_above_header_col1_set   = get_theme_mod( 'zita_above_header_col1_set','text');
$zita_above_header_col2_set   = get_theme_mod( 'zita_above_header_col2_set','text');
$zita_above_header_col3_set   = get_theme_mod( 'zita_above_header_col3_set','text');
?>
<div class="top-header">
			<div class="top-header-bar <?php echo esc_attr($zita_above_header_layout);?>">
	     	<div class="container">
	     		<div class="top-header-container">
	     		<?php if($zita_above_header_layout=='abv-one'):?>	
		         <div class="top-header-col1">
		         	<?php zita_top_header_conetnt_col1($zita_above_header_col1_set); ?>
		         </div>
		        <?php elseif($zita_above_header_layout=='abv-two'): ?>
		        <div class="top-header-col1">
		        	<?php zita_top_header_conetnt_col1($zita_above_header_col1_set); ?>
		         </div>
		         <div class="top-header-col2">
                    <?php zita_top_header_conetnt_col2($zita_above_header_col2_set); ?></div>
		         <?php elseif($zita_above_header_layout=='abv-three'): ?>
                  <div class="top-header-col1">
                  	<?php zita_top_header_conetnt_col1($zita_above_header_col1_set); ?>
		         </div>
		         <div class="top-header-col2">
                    <?php zita_top_header_conetnt_col2($zita_above_header_col2_set); ?></div>
		         <div class="top-header-col3">
                    <?php zita_top_header_conetnt_col3($zita_above_header_col3_set); ?></div>
                 <?php endif;?>
		          </div>
		        </div>
		</div>
</div>
<?php	}
}
add_action( 'zita_top_header', 'zita_top_header_markup' );
//************************************/
// top header col1 function
//************************************/
if ( ! function_exists( 'zita_top_header_conetnt_col1' ) ){	
function zita_top_header_conetnt_col1($content){ 
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter');?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('zita_col1_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('zita-above-menu' ) ) {?>
<!-- Menu Toggle btn-->
     <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn menu-btn-abv" id="menu-btn-abv">
            	<div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                </div>
            </button>
        </div>
        <div class="sider above zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php zita_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
  }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col1' ) ){
    dynamic_sidebar('top-header-widget-col1' );
     }else{?>
     	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo zita_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// top header col2 function
//************************************/
if ( ! function_exists( 'zita_top_header_conetnt_col2' ) ){	
function zita_top_header_conetnt_col2($content){ 
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter');?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('zita_col2_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('zita-above-menu' ) ){?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn menu-btn-abv" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                </div>
            </button>
        </div>
        <div class="sider above zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php zita_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col2' ) ){
    dynamic_sidebar('top-header-widget-col2' );
     }else{?>
     	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo zita_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}

//************************************/
// top header col3 function
//************************************/
if ( ! function_exists( 'zita_top_header_conetnt_col3' ) ){	
function zita_top_header_conetnt_col3($content){ 
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter');?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('zita_col3_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('zita-above-menu' ) ) {?>
<!-- Menu Toggle btn-->
       <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn menu-btn-abv" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                </div>
            </button>
        </div>
        <div class="sider above zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php zita_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col3' ) ){
    dynamic_sidebar('top-header-widget-col3' );
     }else{?>
     	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo zita_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
/***************************/
// bottom-header
/***************************/
if ( ! function_exists( 'zita_bottom_header_markup' ) ){
function zita_bottom_header_markup(){ ?>
<?php 
$zita_bottom_header_layout     = get_theme_mod( 'zita_bottom_header_layout','btm-none');
$zita_bottom_header_col1_set   = get_theme_mod( 'zita_bottom_header_col1_set','text');
$zita_bottom_header_col2_set   = get_theme_mod( 'zita_bottom_header_col2_set','text');
$zita_bottom_header_col3_set   = get_theme_mod( 'zita_bottom_header_col3_set','text');
?>
<div class="bottom-header">
            <div class="bottom-header-bar <?php echo esc_attr($zita_bottom_header_layout);?>">
                <div class="container">
                    <div class="bottom-header-container">
                 <?php if($zita_bottom_header_layout=='btm-one'):?>
                     <div class="bottom-header-col1">
                        <?php zita_bottom_header_content_col1($zita_bottom_header_col1_set); ?>
                        </div>
                 <?php endif; ?>
                 <?php if($zita_bottom_header_layout=='btm-two'):?>
                     <div class="bottom-header-col1">
                        <?php zita_bottom_header_content_col1($zita_bottom_header_col1_set); ?></div>
                     <div class="bottom-header-col2">
                        <?php zita_bottom_header_content_col2($zita_bottom_header_col2_set); ?>
                        </div>
                 <?php endif; ?>
                  <?php if($zita_bottom_header_layout=='btm-three'):?>
                     <div class="bottom-header-col1">
                        <?php zita_bottom_header_content_col1($zita_bottom_header_col1_set); ?></div>
                     <div class="bottom-header-col2">
                        <?php zita_bottom_header_content_col2($zita_bottom_header_col2_set); ?>
                        </div>
                     <div class="bottom-header-col3">
                        <?php zita_bottom_header_content_col3($zita_bottom_header_col3_set); ?></div>
                 <?php endif; ?>
                   </div>
                 </div>
             </div>
         </div>
<?php   }
}
add_action( 'zita_bottom_header', 'zita_bottom_header_markup' );

//************************************/
// bottom header col1 function
//************************************/
if ( ! function_exists( 'zita_bottom_header_content_col1' ) ){ 
function zita_bottom_header_content_col1($content){ 
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter');?>
<?php if($content=='text'){?>
<div class='content-html'>
    <?php echo esc_html(get_theme_mod('zita_col1_bottom_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
    if ( has_nav_menu('zita-bottom-menu' ) ) {?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn menu-btn-btm" id="menu-btn-btm">
                <div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                </div>
            </button>
        </div>
        <div class="sider bottom zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php zita_btm_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 

 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Bottom Header Menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
    <div class="content-widget">
    <?php if( is_active_sidebar('bottom-header-widget-col1' ) ){
    dynamic_sidebar('bottom-header-widget-col1' );
     }else{?>
        <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo zita_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// bottom header col2 function
//************************************/
if ( ! function_exists( 'zita_bottom_header_content_col2' ) ){ 
function zita_bottom_header_content_col2($content){ 
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter'); ?>
<?php if($content=='text'){?>
<div class='content-html'>
    <?php echo esc_html(get_theme_mod('zita_col2_bottom_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
    if ( has_nav_menu('zita-bottom-menu' ) ) {?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn menu-btn-btm" id="menu-btn-btm">
                <div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                </div>
            </button>
        </div>
        <div class="sider bottom zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php zita_btm_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 

 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Bottom Header Menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
    <div class="content-widget">
    <?php if( is_active_sidebar('bottom-header-widget-col2' ) ){
    dynamic_sidebar('bottom-header-widget-col2' );
     }else{?>
        <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo zita_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// bottom header col3 function
//************************************/
if ( ! function_exists( 'zita_bottom_header_content_col3' ) ){ 
function zita_bottom_header_content_col3($content){
$zita_mobile_menu_open = get_theme_mod( 'zita_mobile_menu_open','overcenter'); ?>
<?php if($content=='text'){?>
<div class='content-html'>
    <?php echo esc_html(get_theme_mod('zita_col3_bottom_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
    if ( has_nav_menu('zita-bottom-menu' ) ) {?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn menu-btn-btm" id="menu-btn-btm">
                <div class="btn">
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                <span class="icon-bar" tabindex="-1"></span>
                </div>
            </button>
        </div>
        <div class="sider bottom zita-menu-hide <?php echo esc_attr($zita_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php zita_btm_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 

 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Bottom Header Menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
    <div class="content-widget">
    <?php if( is_active_sidebar('bottom-header-widget-col3' ) ){
    dynamic_sidebar('bottom-header-widget-col3' );
     }else{?>
        <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo zita_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
/******************************/
//Transparent header function
/******************************/
function zita_header_transparent_class($zita_transparent_post_meta){
    if($zita_transparent_post_meta=='default' || $zita_transparent_post_meta==''){
        $class='';
        $zita_header_transparent_special_page_disable = get_theme_mod('zita_header_transparent_special_page_disable',false);
        $zita_header_transparent = get_theme_mod( 'zita_header_transparent',false);
        if($zita_header_transparent==true){
            if(($zita_header_transparent_special_page_disable==true) && (is_archive()||is_404()||is_search()|| (class_exists( 'WooCommerce' ) && (is_shop()||is_product()))) ){
                    $class= '';
            }else{
                    $class= 'zta-transparent-header';
           }             
         
        }else{
            $class= '';
        } 
       return $class;
   }else{
        $class='';
        if($zita_transparent_post_meta=='enable'){
        $class= 'zta-transparent-header'; 
        return $class;
      }

   }
}
if(get_theme_mod('zita_main_header_set','none')!=='none'):
function zita_add_header_custom_item($items, $args){
    if(get_theme_mod('zita_main_header_set')=='text'){
        $csmhtml = get_theme_mod('zita_main_header_texthtml',__('Add your content here','zita'));
          if( ($args->theme_location!== 'zita-above-menu') && ($args->theme_location!== 'zita-bottom-menu') && ($args->theme_location!== 'zita-abv-footer-menu') && ($args->theme_location!== 'zita-btm-footer-menu')){
          $items .= '<li class="menu-item zta-custom-item">'
                  . '<div class="menu-custom-html">'
                  .  esc_html($csmhtml)
                  . '</div>'
                  . '</li>';
          }
        return $items;
    }elseif(get_theme_mod('zita_main_header_set')=='widget'){
        ob_start();
dynamic_sidebar('main-header-widget');
$sidebar = ob_get_contents();
ob_end_clean();
          if( ($args->theme_location!== 'zita-above-menu') && ($args->theme_location!== 'zita-bottom-menu') && ($args->theme_location!== 'zita-abv-footer-menu') && ($args->theme_location!== 'zita-btm-footer-menu')){
            $items .= '<li class="menu-item zta-custom-item">'
                   . '<div class="menu-custom-widget">'
                   . $sidebar
                   . '</div>'
                   . '</li>';
          }
        return $items;
    }elseif(get_theme_mod('zita_main_header_set')=='search'){
         if( ($args->theme_location!== 'zita-above-menu') && ($args->theme_location!== 'zita-bottom-menu') && ($args->theme_location!== 'zita-abv-footer-menu') && ($args->theme_location!== 'zita-btm-footer-menu')){
          $items .= '<li class="menu-item zta-custom-item">'
                  . '<div class="menu-custom-search">'
                  .'<div class="searchfrom">'
                  .'<a href="#" class="search-btn"><i class="fa fa-search"></i></a>'
                  . get_search_form().'</div>'
                  .'</div>'
                  .'</li>';
          }
        return $items;
    }
    elseif(get_theme_mod('zita_main_header_set')=='social'){
          if( ($args->theme_location!== 'zita-above-menu') && ($args->theme_location!== 'zita-bottom-menu') && ($args->theme_location!== 'zita-abv-footer-menu') && ($args->theme_location!== 'zita-btm-footer-menu')){
          $items .= '<li class="menu-item zta-custom-item">
                    <div class="menu-custom-search"><div class="content-social">
                    '.zita_social_links().'</div></div></li>';
          }
        return $items;
    }
    elseif(get_theme_mod('zita_main_header_set')=='button'){
         $btntxt = get_theme_mod('zita_main_header_btn_txt','');
         $btnurl = get_theme_mod('zita_main_header_btn_url','');
          if( ($args->theme_location!== 'zita-above-menu') && ($args->theme_location!== 'zita-bottom-menu') && ($args->theme_location!== 'zita-abv-footer-menu') && ($args->theme_location!== 'zita-btm-footer-menu')){
          $items .='<a class="main-header-btn" href="'.esc_url($btnurl).'">'.esc_html($btntxt)
                  .'</a>';
          }
        return $items;
    }
    elseif(get_theme_mod('zita_main_header_set')=='none'){
          if( ($args->theme_location!== 'zita-above-menu') && ($args->theme_location!== 'zita-bottom-menu') && ($args->theme_location!== 'zita-abv-footer-menu') && ($args->theme_location!== 'zita-btm-footer-menu')){
          $items .= '';
          }
        return $items;
    }

}
add_filter('wp_nav_menu_items', 'zita_add_header_custom_item', 10, 2);
endif;
/************************/
// Without menu 
/************************/
function zita_add_header_widthout_menu_custom_item(){
     $items="";
    if(get_theme_mod('zita_main_header_set')=='text'){
        $csmhtml = get_theme_mod('zita_main_header_texthtml',__('Add your content here','zita'));
          $items .= '<div class="menu-custom-html">'
                  . esc_html($csmhtml)
                  . '</div>';
          
        return $items;
    }elseif(get_theme_mod('zita_main_header_set')=='widget'){
        ob_start();
dynamic_sidebar('main-header-widget');
$sidebar = ob_get_contents();
ob_end_clean();
          
            $items .= '<div class="menu-custom-widget">'
                   . $sidebar
                   . '</div>';           
        return $items;
    }elseif(get_theme_mod('zita_main_header_set')=='search'){
          
          $items .='<div class="menu-custom-search">'
                  .'<div class="searchfrom">'
                  .'<a href="#" class="search-btn"><i class="fa fa-search"></i></a>'
                  . get_search_form().'</div>'
                  .'</div>';
                  return $items;
                 
          }
      
    elseif(get_theme_mod('zita_main_header_set')=='social'){
          
          $items .= '<div class="menu-custom-search"><div class="content-social">
                    '.zita_social_links().'</div></div></li>';
         
        return $items;
    }
    elseif(get_theme_mod('zita_main_header_set')=='button'){
         $btntxt = get_theme_mod('zita_main_header_btn_txt','');
         $btnurl = get_theme_mod('zita_main_header_btn_url','');
          
          $items .='<a class="main-header-btn" href="'.esc_url($btnurl).'">'.esc_html($btntxt)
                  .'</a>';
        return $items;
    }
    elseif(get_theme_mod('zita_main_header_set')=='none'){
          
          $items .= '';
          
        return $items;
    }
}
/***********************************************************
*Header Post Meta Hide and show Function for Zita Theme
***************************************************************/
if( ! function_exists( 'zita_header_abv_post_meta' ) ){
function zita_header_abv_post_meta($page_post_meta_set=''){
   $zita_above_header_layout = get_theme_mod('zita_above_header_layout','abv-none');
    if($page_post_meta_set!=='on'){
        if($zita_above_header_layout!=='abv-none'):
            zita_top_header();
    endif;    
  }
 }
}
// main
if( ! function_exists( 'zita_header_main_post_meta' ) ){
function zita_header_main_post_meta($page_post_meta_set=''){
    if($page_post_meta_set!=='on'){
        zita_main_header();
  }
 }
}
// bottom
if( ! function_exists( 'zita_header_btm_post_meta' ) ){
function zita_header_btm_post_meta($page_post_meta_set=''){
    $zita_bottom_header_layout = get_theme_mod('zita_bottom_header_layout','btm-none');
    if($page_post_meta_set!=='on'){
        if( $zita_bottom_header_layout!=='btm-none'):
            zita_bottom_header();
    endif;    
  }
 }
}
//PRELOADER
if( ! function_exists( 'zita_preloader' ) ){
function zita_preloader(){
 if (( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
                isset( $_REQUEST['elementor-preview'] )){
      return;
 }else{         
    $zita_preloader_enable = get_theme_mod('zita_preloader_enable',false);
    $zita_preloader_image_upload = get_theme_mod('zita_preloader_image_upload',ZITA_LOADER);
    if($zita_preloader_enable==true){ ?>
    <div class="zita_overlayloader">
    <div class="zita-pre-loader"><img src="<?php echo esc_url($zita_preloader_image_upload);?>"></div>
    </div> 
   <?php }
   }
 }
}
//page header markup
if( ! function_exists( 'zita_page_header_markup' ) ){
    function zita_page_header_markup($id){ ?>
        <div class="zita-pageheader">
            <div class="zita-pageheader-content">
                <div class="container">
            <?php if (is_archive()) { ?>
                <div class="entry-header entry-page archive">
                    <h1 class="entry-title"><?php the_archive_title();?></h1>
                </div>
        <?php   } 
               elseif (zita_is_blog()) { ?>
                <div class="entry-header entry-page blog">
                    <h1 class="entry-title"><?php echo __('Blog','zita')?></h1>
                </div>
              <?php }
              else{ ?>
                <div class="entry-header entry-page">
                <?php echo esc_attr(zita_page_title_post_meta(get_post_meta($id, 'zita_disable_title_dyn', true ))); ?>
                </div>
          <?php    } ?>
                </div>
            </div>
            <?php 
            if (is_archive() || zita_is_blog()) { 
                zita_page_header_image_for_archive();
             }
             elseif (class_exists( 'WooCommerce' ) && is_product()) {
                 zita_page_header_image_for_archive();
              } 
             else{
                zita_page_header_image($id);
             }
             ?>
        </div>
    <?php }
}