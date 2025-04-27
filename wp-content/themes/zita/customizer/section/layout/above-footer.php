<?php
/**
 * Footer Options for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/******************/
//Above footer
/******************/
//choose col layout
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'zita_above_footer_layout', array(
                'default'           => 'ft-abv-none',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_above_footer_layout', array(
                    'label'    => esc_html__('Layout','zita'),
                    'section'  => 'zita-above-footer',
                    'choices'  => array(
                        'ft-abv-none'   => array(
                            'url' => ZITA_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-abv-one'   => array(
                            'url' => ZITA_FOOTER_ABOVE_LAYOUT_1,
                        ),
                        'ft-abv-two' => array(
                            'url' => ZITA_FOOTER_ABOVE_LAYOUT_2,
                        ),
                        'ft-abv-three' => array(
                            'url' => ZITA_FOOTER_ABOVE_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('zita_above_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_above_footer_col1_set', array(
        'settings' => 'zita_above_footer_col1_set',
        'label'    => __('Column 1','zita'),
        'section'  => 'zita-above-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','zita'),
        'text'             => __('Text','zita'),
        'menu'             => __('Menu','zita'),
        'search'           => __('Search','zita'),
        'widget'           => __('Widget','zita'),
        'social'           => __('Social Media','zita'),   
    ),
));
//col1-text/html
$wp_customize->add_setting('zita_footer_col1_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('zita_footer_col1_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-above-footer',
        'settings' => 'zita_footer_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_footer_col1_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize,'zita_footer_col1_widget_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__('Go To Widget','zita'),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_footer_col1_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize,'zita_footer_col1_menu_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__('Go To Menu','zita'),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_footer_col1_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_footer_col1_social_media_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
/***************************************/
// col2
/***************************************/
$wp_customize->add_setting('zita_above_footer_col2_set',array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_above_footer_col2_set',array(
        'settings' => 'zita_above_footer_col2_set',
        'label'   => __('Column 2','zita'),
        'section' => 'zita-above-footer',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','zita'),
        'text'             => __('Text','zita'),
        'menu'                 => __('Menu','zita'),
        'search'             => __('Search','zita'),
        'widget'                 => __('Widget','zita'),
        'social'             => __('Social Media','zita'),     
        ),
    ));
//col2-text/html
$wp_customize->add_setting('zita_above_footer_col2_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea', 
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control('zita_above_footer_col2_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-above-footer',
        'settings' => 'zita_above_footer_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_above_footer_col2_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize,'zita_above_footer_col2_widget_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 menu redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_above_footer_col2_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize,'zita_above_footer_col2_menu_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'zita' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_above_footer_col2_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_above_footer_col2_social_media_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('zita_above_footer_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_above_footer_col3_set', array(
        'settings' => 'zita_above_footer_col3_set',
        'label'   => __('Column 3','zita'),
        'section' => 'zita-above-footer',
        'type'    => 'select',
        'choices' => array(
        'none'             => __('None','zita'),
        'text'             => __('Text','zita'),
        'menu'             => __('Menu','zita'),
        'search'           => __('Search','zita'),
        'widget'           => __('Widget','zita'),
        'social'           => __('Social Media','zita'),   
        ),
    ));
//col3-text/html
$wp_customize->add_setting('zita_above_footer_col3_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea', 
        'transport'         => 'postMessage', 
    ));
$wp_customize->add_control('zita_above_footer_col3_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-above-footer',
        'settings' => 'zita_above_footer_col3_texthtml',
        'type'    => 'textarea',
    ));
// col3 social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_above_footer_col3_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_above_footer_col3_social_media_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_above_footer_col3_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize,'zita_above_footer_col3_widget_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// col3 menu redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_above_footer_col3_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize,'zita_above_footer_col3_menu_redirect', array(
                    'section'      => 'zita-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'zita' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_abve_ftr_hgt', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '30',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_abve_ftr_hgt', array(
                    'label'       => esc_html__( 'Height', 'zita' ),
                    'section'     => 'zita-above-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 30,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                )
        )
);
}
// above bottom-border
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_abv_ftr_botm_brd', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_abv_ftr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'zita' ),
                    'section'     => 'zita-above-footer',
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
 $wp_customize->add_setting('zita_above_frt_brdr_clr', array(
        'default'        => '#eee',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_above_frt_brdr_clr', array(
        'label'      => __('Border Color', 'zita' ),
        'section'    => 'zita-above-footer',
        'settings'   => 'zita_above_frt_brdr_clr',
    ) ) 
 );  
//choose color layout
if((zita_pro_activation_class())==''){
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_above_footer_color_scheme', array(
                'default'           => 'abv-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_above_footer_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'zita' ),
                    'section'  => 'zita-above-footer',
                    'choices'  => array(
                       'abv-default' => array(
                            'url'    => ZITA_COLOR_SCHM_DEF,
                        ),
                        'abv-dark'   => array(
                            'url'    => ZITA_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    }
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_abv_footer_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_abv_footer_more',
            array(
        'section'     => 'zita-above-footer',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To get acess to all premium features <a target="_blank" href="%s">Get Pro</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://themehunk.com/zita-pro-wordpress-theme/', 'above-footer' ) ) ),
        'priority'   =>30,
    )));