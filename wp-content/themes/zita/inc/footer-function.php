<?php 
/**
 * Common Function for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/**
 * Function to get above footer
 */
if ( ! function_exists( 'zita_top_footer_markup' ) ){	
function zita_top_footer_markup(){ ?>
<?php 
$zita_above_footer_layout    = get_theme_mod( 'zita_above_footer_layout','ft-abv-none');
$zita_above_footer_col1_set  = get_theme_mod( 'zita_above_footer_col1_set','text');
$zita_above_footer_col2_set  = get_theme_mod( 'zita_above_footer_col2_set','text');
$zita_above_footer_col3_set  = get_theme_mod( 'zita_above_footer_col3_set','text');
?>	
<div class="top-footer">
		 	<div class="top-footer-bar <?php echo esc_attr($zita_above_footer_layout);?>">
		       <div class="container">
			      <div class="top-footer-container">
			      	<?php if($zita_above_footer_layout=='ft-abv-one'):?>	
		             <div class="top-footer-col1">
		             	<?php zita_top_footer_conetnt_col1($zita_above_footer_col1_set); ?>
		             </div>
		             <?php elseif($zita_above_footer_layout=='ft-abv-two'):?>
		             <div class="top-footer-col1">
		             	<?php zita_top_footer_conetnt_col1($zita_above_footer_col1_set); ?>
		             </div>	
		             	<div class="top-footer-col2">
                    <?php zita_top_footer_conetnt_col2($zita_above_footer_col2_set); ?>
                    </div>
		             	<?php elseif($zita_above_footer_layout=='ft-abv-three'):?>
		             		<div class="top-footer-col1">
		             	<?php zita_top_footer_conetnt_col1($zita_above_footer_col1_set); ?>
		                </div>	
		             	<div class="top-footer-col2"><?php zita_top_footer_conetnt_col2($zita_above_footer_col2_set); ?></div>
		             	<div class="top-footer-col3"><?php zita_top_footer_conetnt_col3($zita_above_footer_col3_set); ?></div>
		            <?php endif;?> 
		           </div>
		       </div>
		    </div>
		</div>
<?php }
}
add_action( 'zita_top_footer', 'zita_top_footer_markup' );
//************************************/
// Footer top col1 function
//************************************/
if ( ! function_exists( 'zita_top_footer_conetnt_col1' ) ){	
function zita_top_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
<?php echo esc_html(get_theme_mod('zita_footer_col1_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }
elseif($content=='menu'){
if ( has_nav_menu('zita-abv-footer-menu' ) ) {?>     
<?php 
 zita_avove_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('footer-top-first' ) ){
    dynamic_sidebar('footer-top-first' );
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
// Footer top col2 function
//************************************/
if ( ! function_exists( 'zita_top_footer_conetnt_col2' ) ){	
function zita_top_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('zita_above_footer_col2_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('zita-abv-footer-menu' ) ) {?>
<?php 
  zita_avove_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('footer-top-second' ) ){
    dynamic_sidebar('footer-top-second' );
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
// Footer top col3 function
//************************************/
if ( ! function_exists( 'zita_top_footer_conetnt_col3' ) ){	
function zita_top_footer_conetnt_col3($content){?>
<?php if($content=='text'){?>
<div class='content-html'>
<?php echo esc_html(get_theme_mod('zita_above_footer_col3_texthtml',  __( 'Add your content here', 'zita' )));;?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('zita-abv-footer-menu' ) ){?>
<?php 
  zita_avove_footer_nav_menu();
 } else { ?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'zita' );?></a>
<?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('footer-top-third' ) ){
    dynamic_sidebar('footer-top-third' );
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
/**
 * Function to get bottom footer
 */
if ( ! function_exists( 'zita_bottom_footer_markup' ) ){	
function zita_bottom_footer_markup(){ ?>
<?php 
$zita_bottom_footer_layout  = get_theme_mod( 'zita_bottom_footer_layout','ft-btm-one');
$zita_bottom_footer_col1_set= get_theme_mod( 'zita_bottom_footer_col1_set','text');
$zita_bottom_footer_col2_set= get_theme_mod( 'zita_bottom_footer_col2_set','text');
$zita_bottom_footer_col3_set= get_theme_mod( 'zita_bottom_footer_col3_set','text');
?>	
<div class="bottom-footer">
		 	<div class="bottom-footer-bar <?php echo esc_attr($zita_bottom_footer_layout);?>">
		       <div class="container">
			      <div class="bottom-footer-container">
              <?php if($zita_bottom_footer_layout=='ft-btm-one'):?>  
                 <div class="bottom-footer-col1">
                  <?php zita_bottom_footer_conetnt_col1($zita_bottom_footer_col1_set); ?>
                 </div>
               <?php elseif($zita_bottom_footer_layout=='ft-btm-two'):?> 
                <div class="bottom-footer-col1">
                  <?php zita_bottom_footer_conetnt_col1($zita_bottom_footer_col1_set); ?>
                 </div>
                 <div class="bottom-footer-col2">
                  <?php zita_bottom_footer_conetnt_col2($zita_bottom_footer_col2_set); ?>
                  </div>
              <?php elseif($zita_bottom_footer_layout=='ft-btm-three'):?>
                   <div class="bottom-footer-col1">
                  <?php zita_bottom_footer_conetnt_col1($zita_bottom_footer_col1_set); ?>
                 </div>
                 <div class="bottom-footer-col2">
                  <?php zita_bottom_footer_conetnt_col2($zita_bottom_footer_col2_set); ?>
                  </div>
                  <div class="bottom-footer-col3">
                    <?php zita_bottom_footer_conetnt_col3($zita_bottom_footer_col3_set); ?>
                  </div>
              <?php endif;?>
		           </div>
		       </div>
		    </div>
</div>
<?php }
}
add_action( 'zita_bottom_footer', 'zita_bottom_footer_markup' );
//************************************/
// Footer bottom col1 function
//************************************/
if ( ! function_exists( 'zita_bottom_footer_conetnt_col1' ) ){ 
function zita_bottom_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php 
  $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
      );
  if(esc_html(get_theme_mod('zita_footer_bottom_col1_texthtml',''))!=''){ 
   echo wp_kses(get_theme_mod('zita_footer_bottom_col1_texthtml'),$allowed_html);
 }else{?>
<p class="footer-copyright">&copy;
              <?php
              echo date_i18n(
                /* translators: Copyright date format, see https://www.php.net/date */
                _x( 'Y', 'copyright date format', 'zita' )
              );
              ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <span class="powered-by-wordpress">
              <span><?php esc_html_e( 'Powered by', 'zita' ); ?></span>
              <a href="<?php echo esc_url( 'https://themehunk.com/' ); ?>">
                <?php esc_html_e( 'ThemeHunk', 'zita' ); ?>
              </a>
            </span>
            </p><!-- .footer-copyright -->
<?php } ?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('zita-btm-footer-menu' ) ) {?>
<?php 
  zita_bottom_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-bottom-first' ) ){
    dynamic_sidebar('footer-bottom-first' );
     } else { ?>
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
// Footer bottom col2 function
//************************************/
if ( ! function_exists( 'zita_bottom_footer_conetnt_col2' ) ){ 
function zita_bottom_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php 
    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
      );
  echo wp_kses(get_theme_mod('zita_bottom_footer_col2_texthtml',  __( 'Add your content here', 'zita' )),$allowed_html);?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('zita-btm-footer-menu' ) ) {?>
<?php 
  zita_bottom_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-bottom-second')){
    dynamic_sidebar('footer-bottom-second');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
        <?php } ?>
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
// Footer bottom col3 function
//************************************/
if ( ! function_exists( 'zita_bottom_footer_conetnt_col3' ) ){ 
function zita_bottom_footer_conetnt_col3($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('zita_bottom_footer_col3_texthtml',  __( 'Add your content here', 'zita' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('zita-btm-footer-menu' ) ) {?>
<?php 
  zita_bottom_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'zita' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-bottom-third')){
    dynamic_sidebar('footer-bottom-third');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
        <?php } ?>
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
/**
 * Function to get footer widget
 */
if ( ! function_exists( 'zita_footer_widget_markup' ) ){	
function zita_footer_widget_markup(){ ?>
<?php 
$zita_bottom_footer_widget_layout  = get_theme_mod( 'zita_bottom_footer_widget_layout','ft-wgt-none');
?>	
<div class="widget-footer">
		 	<div class="widget-footer-bar <?php echo esc_attr($zita_bottom_footer_widget_layout);?>">
		       <div class="container">
			      <div class="widget-footer-container">
			      	<?php if($zita_bottom_footer_widget_layout=='ft-wgt-one'):?>
		             <div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-two'): ?>
                      	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-three'): ?>
                      	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-four'): ?>
                      	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col4"><?php if( is_active_sidebar('footer-4' ) ){
                                       dynamic_sidebar('footer-4' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                  <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-five'): ?>
                  	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                       <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-six'): ?>
                       <div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                  <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-seven'): ?>
                  	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                  <?php elseif($zita_bottom_footer_widget_layout=='ft-wgt-eight'): ?>
                  	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'zita' );?></a>
                          <?php }?>
                      </div>
                  <?php endif;?>
		        </div>
		  </div>
	</div>
</div>
<?php }
}
add_action( 'zita_widget_footer', 'zita_footer_widget_markup' );
/***********************************************************
*Footer Post Meta Hide and show Function for Zita Theme
***************************************************************/
if( ! function_exists( 'zita_footer_abv_post_meta' ) ){
function zita_footer_abv_post_meta($page_post_meta_set=''){
    $zita_above_footer_layout = get_theme_mod('zita_above_footer_layout','ft-abv-none');
    if($page_post_meta_set!=='on'){
        if( $zita_above_footer_layout!=='ft-abv-none'):
             zita_top_footer();
    endif;    
  }
 }
}
//Widget footer
if( ! function_exists( 'zita_footer_widget_post_meta' ) ){
function zita_footer_widget_post_meta($page_post_meta_set=''){
   $zita_bottom_footer_widget_layout = get_theme_mod('zita_bottom_footer_widget_layout','ft-wgt-none');
    if($page_post_meta_set!=='on'){
        if($zita_bottom_footer_widget_layout!=='ft-wgt-none'):
             zita_widget_footer();
    endif;    
  }
 }
}
//Footer bottom
if( ! function_exists( 'zita_footer_bottom_post_meta' ) ){
function zita_footer_bottom_post_meta($page_post_meta_set=''){
   $zita_bottom_footer_layout = get_theme_mod('zita_bottom_footer_layout','ft-btm-one');
    if($page_post_meta_set!=='on'){
        if($zita_bottom_footer_layout!=='ft-btm-none'):
             zita_bottom_footer();
    endif;    
  }
 }
}