
<!--- tab first -->
<div class="theme_link">
    <h3><?php esc_html_e('1. Install Recommended Plugins','zita'); ?></h3>
    <p><?php esc_html_e('We highly Recommend to install ThemeHunk Customizer plugin to get all customization options in Zita theme. Also install recommended plugins available in recommended tab.','zita'); ?></p>
</div>
<div class="theme_link">
    <h3><?php esc_html_e('2. Setup Home Page','zita'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
        <p><?php esc_html_e('To set up the HomePage in Zita theme, Just follow the below given Instructions.','zita'); ?> </p>
<p><?php esc_html_e('Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.','zita'); ?> </p>
<p><?php esc_html_e('Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.','zita'); ?> </p>
     <p>
        <?php
		if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'zita');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'zita');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";


        }
        ?>
        <button style="<?php echo esc_attr($Bstyle); ?>" class="button activate-now <?php echo esc_attr($class); ?>">

            <?php echo esc_html($btn_text);?>
                
        </button>
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/zita/#homepage-setting" class="button"><?php esc_html_e('Go to Doc','zita'); ?></a>
    </p>
</div>

<!--- tab third -->

<!--- tab second -->

<div class="theme_link">
    <h3><?php esc_html_e('3. Customize Your Website','zita'); ?></h3>

    <p><?php esc_html_e('Zita theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','zita'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e("Start Customize","zita"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php esc_html_e("4. Customizer Links","zita"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php esc_html_e("Upload Logo","zita"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=zita-gloabal-color'); ?>" class="components-button is-link"><?php esc_html_e("Global Colors","zita"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php esc_html_e("Woocommerce","zita"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=zita-section-header-group'); ?>" class="components-button is-link"><?php esc_html_e("Header Options","zita"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=zita-panel-frontpage'); ?>" class="components-button is-link"><?php esc_html_e("FrontPage Sections","zita"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[section]=zita-section-footer-group'); ?>" class="components-button is-link"><?php esc_html_e("Footer Section","zita"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->