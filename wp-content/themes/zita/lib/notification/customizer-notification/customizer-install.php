<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return;
}
function zita_customizer_scripts() {
    wp_enqueue_script('zita-customizer', get_template_directory_uri() . '/lib/notification/customizer-notification/customizer.js', array('jquery'), '1.0', true);

    wp_localize_script('zita-customizer', 'theme_data_customizer', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('thactivatenonce'),
        'redirectUrl' => esc_url(admin_url('themes.php?page=zita-site-library'))
    ));
}
add_action('customize_controls_enqueue_scripts', 'zita_customizer_scripts');

// style
function zita_customizer_notify_css(){
    
  wp_enqueue_style('zita-customizer-notify-styles', ZITA_THEME_URI .'lib/notification/customizer-notification/customizer-notify.css');
}
add_action('customize_controls_print_styles', 'zita_customizer_notify_css');