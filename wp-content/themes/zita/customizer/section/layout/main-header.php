<?php
/**
 * Header Options for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
// main header
// choose col layout
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_main_header_layout', array(
                'default'           => 'mhdrleft',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_main_header_layout', array(
                    'label'    => esc_html__( 'Header Layout', 'zita' ),
                    'section'  => 'zita-main-header',
                    'priority'   => 0,
                    'choices'  => array(
                        'mhdrleft'   => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_LEFT,
                        ),
                        'mhdrcenter'   => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_CENTER,
                        ),
                        'mhdrright' => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_RIGHT,
                        ),
                        'mhdrleftpan' => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_LEFTPAN,
                        ),
                        'mhdrrightpan' => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_RIGHTPAN,
                        ),
                        'mhdfull' => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_FULL,
                        ),
                        'mhdminbarleft' => array(
                            'url' => ZITA_MAINHEADER_LAYOUT_MINBARLEFT,
                        ),
                        // 'mhdminbarright' => array(
                        //     'url' => ZITA_MAINHEADER_LAYOUT_MINBARRIGHT,
                        // ),         
                    ),
                )
            )
        );
} 
// disable menu
$wp_customize->add_setting( 'zita_main_header_menu_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_main_header_menu_disable', array(
                'label'                 => esc_html__('Disable Menu', 'zita'),
                'type'                  => 'checkbox',
                'section'               => 'zita-main-header',
                'settings'              => 'zita_main_header_menu_disable',
            ) ) );
// main header setting
$wp_customize->add_setting('zita_main_header_set', array(
        'default'        => 'social',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_main_header_set', array(
        'settings' => 'zita_main_header_set',
        'label'    => __('Last Menu Item','zita'),
        'section'  => 'zita-main-header',
        'type'     => 'select',
        'choices'    => array(
        'none'       => __('None (Pro)','zita'),
        'text'       => __('Text (Pro)','zita'),
        'search'     => __('Search (Pro)','zita'),
        'widget'     => __('Widget (Pro)','zita'),
        'social'     => __('Social Media','zita'),
        'button'     => __('Button (Pro)','zita'),
        ),
    ));
// text/html
$wp_customize->add_setting('zita_main_header_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea',
        
    ));
$wp_customize->add_control('zita_main_header_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-main-header',
        'settings' => 'zita_main_header_texthtml',
         'type'    => 'textarea',
    ));
// widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_mian_header_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_mian_header_widget_redirect', array(
                    'section'      => 'zita-main-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
}    
// social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_mian_header_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_mian_header_social_media_redirect', array(
                    'section'      => 'zita-main-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-social-media-redirect',  
                )
            )
        );
}   
// button
$wp_customize->add_setting('zita_main_header_btn_txt', array(
        'default'           =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('zita_main_header_btn_txt', array(
        'label'    => __('Button Text', 'zita'),
        'section'  => 'zita-main-header',
        'settings' => 'zita_main_header_btn_txt',
         'type'    => 'text',
    ));
$wp_customize->add_setting('zita_main_header_btn_url', array(
        'default'           =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_text',
        
    ));
$wp_customize->add_control('zita_main_header_btn_url', array(
        'label'    => __('Button Url', 'zita'),
        'section'  => 'zita-main-header',
        'settings' => 'zita_main_header_btn_url',
         'type'    => 'text',
    ));

// main header bottom-border size
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_main_hdr_botm_brd', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_main_hdr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border Size','zita' ),
                    'section'     => 'zita-main-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ),
                )
        )
);
}
// border-color
$wp_customize->add_setting('zita_main_brdr_clr', array(
        'default'        => '#eee',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_main_brdr_clr', array(
        'label'      => __('Bottom Border Color', 'zita' ),
        'section'    => 'zita-main-header',
        'settings'   => 'zita_main_brdr_clr',
    ) ) 
 );
// choose full width header
$wp_customize->add_setting( 'zita_main_header_width_full', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_main_header_width_full', array(
                'label'                 => esc_html__('Enable Full Width Header (Pro)', 'zita'),
                'type'                  => 'checkbox',
                'section'               => 'zita-main-header',
                'settings'              => 'zita_main_header_width_full',
) ) );
/***********************************/  
// mobile menu open
/***********************************/ 
$wp_customize->add_setting('zita_mobile_menu_open', array(
                'default'               => 'overcenter',
                'sanitize_callback'     => 'zita_sanitize_select',
            ) );

$wp_customize->add_control( new Zita_Customizer_Buttonset_Control( $wp_customize, 'zita_mobile_menu_open', array(
                'label'                 => esc_html__( 'Mobile Menu Open', 'zita' ),
                'section'               => 'zita-main-header',
                'settings'              => 'zita_mobile_menu_open',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'zita' ),
                    'overcenter'        => esc_html__( 'center', 'zita' ),
                    'right'             => esc_html__( 'Right', 'zita' ),
                ),
            ) ) );
// text
$wp_customize->add_setting('zita_main_header_mobile_txt', array(
        'default'           =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('zita_main_header_mobile_txt', array(
        'label'    => __('Menu Label on Small Device', 'zita'),
        'section'  => 'zita-main-header',
        'settings' => 'zita_main_header_mobile_txt',
         'type'    => 'text',
    ));
// menu alignment
$wp_customize->add_setting('zita_main_header_menu_align', array(
        'default'        => 'inline',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control( 'zita_main_header_menu_align', array(
        'settings'=> 'zita_main_header_menu_align',
        'label'   => __('Menu Alignment','zita'),
        'section' => 'zita-main-header',
        'type'    => 'select',
        'choices' => array(
        'inline'  => __('Inline','zita'),
        'stack'   => __('Stack','zita'),  
        ),
    ));
//choose color layout
if((zita_pro_activation_class())==''){
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_main_color_scheme', array(
                'default'           => 'main-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_main_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'zita' ),
                    'section'  => 'zita-main-header',
                    'choices'  => array(
                       'main-default' => array(
                            'url'     => ZITA_COLOR_SCHM_DEF,
                        ),
                        'main-dark'   => array(
                            'url'     => ZITA_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    } 
}
$wp_customize->get_control( 'header_image' )->section = 'zita-page-header';
$wp_customize->get_control( 'header_image' )->priority = 35;



// Pro feature List
$wp_customize->add_setting('zita_main_header_pro_link', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_main_header_pro_link',
            array(
        'section'     => 'zita-main-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'Alot of pro features Space Main Header<a target="_blank" href="%s">Get Pro</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_pro_link', zita_get_pro_url( 'https://themehunk.com/zita-pro-wordpress-theme/', 'main-header' ) )),
         'priority'   =>50,
    )));

if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_main_header_pro_list', array(
                'default'           => 'headerPro',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_main_header_pro_list', array(
                    'label'    => esc_html__( 'Some More Pro Features', 'zita' ),
                    'section'  => 'zita-main-header',
                    'priority'   => 108,
                    'choices'  => array(
                        'headerPro'   => array(
                            'url' => ZITA_MAINHEADER_PRO1,
                        ), 
                        'headerPro2'   => array(
                            'url' => ZITA_MAINHEADER_PRO2,
                        ),       
                    ),
                )
            )
        );
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_main_header_doc_learn_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_main_header_doc_learn_more',
            array(
        'section'     => 'zita-main-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/main-header/', 'main-header' ) )),
         'priority'   =>108,
    )));