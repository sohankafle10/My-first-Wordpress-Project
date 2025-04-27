<?php
/**
 * Header Options for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
//bottom header
// choose col layout
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_bottom_header_layout', array(
                'default'           => 'btm-none',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_bottom_header_layout', array(
                    'label'    => esc_html__( 'Layout (Pro) (Its features will work in Premium version)', 'zita' ),
                    'section'  => 'zita-bottom-header',
                    'choices'  => array(
                       'btm-none'   => array(
                            'url' => ZITA_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'btm-one'   => array(
                            'url' => ZITA_TOP_HEADER_LAYOUT_1,
                        ),
                        'btm-two' => array(
                            'url' => ZITA_TOP_HEADER_LAYOUT_2,
                        ),
                        'btm-three' => array(
                            'url' => ZITA_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
// col1
$wp_customize->add_setting('zita_bottom_header_col1_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_bottom_header_col1_set', array(
        'settings' => 'zita_bottom_header_col1_set',
        'label'   => __('Column 1','zita'),
        'section' => 'zita-bottom-header',
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

// col1-text/html
$wp_customize->add_setting('zita_col1_bottom_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea',
         'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('zita_col1_bottom_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-bottom-header',
        'settings' => 'zita_col1_bottom_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col1_bottom_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col1_bottom_widget_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col1_bottom_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col1_bottom_menu_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col1_bottom_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col1_bottom_social_media_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-social_media-redirect-col1',  
                )
            )
        );
} 
// col2
$wp_customize->add_setting('zita_bottom_header_col2_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_bottom_header_col2_set', array(
        'settings' => 'zita_bottom_header_col2_set',
        'label'    => __('Column 2','zita'),
        'section'  => 'zita-bottom-header',
        'type'     => 'select',
        'choices'    => array(
        'none'             => __('None','zita'),
        'text'             => __('Text','zita'),
        'menu'             => __('Menu','zita'),
        'search'           => __('Search','zita'),
        'widget'           => __('Widget','zita'),
        'social'           => __('Social Media','zita'),
            
        ),
    ));
// col2-text/html
$wp_customize->add_setting('zita_col2_bottom_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('zita_col2_bottom_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-bottom-header',
        'settings' => 'zita_col2_bottom_texthtml',
         'type'    => 'textarea',
          
    ));
// col2 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col2_bottom_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col2_bottom_widget_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-widget-redirect-col2',  
                )
            )
        );
}   
// col2 menu redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col2_bottom_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col2_bottom_menu_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col2_bottom_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col2_bottom_social_media_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('zita_bottom_header_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_bottom_header_col3_set', array(
        'settings' => 'zita_bottom_header_col3_set',
        'label'   => __('Column 3','zita'),
        'section' => 'zita-bottom-header',
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
// col3-text/html
$wp_customize->add_setting('zita_col3_bottom_texthtml', array(
        'default'           => __('Add your content here','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_textarea',
         'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('zita_col3_bottom_texthtml', array(
        'label'    => __('Text', 'zita'),
        'section'  => 'zita-bottom-header',
        'settings' => 'zita_col3_bottom_texthtml',
         'type'    => 'textarea',
    ));


// col3 social media redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col3_bottom_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col3_bottom_social_media_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col3_bottom_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col3_bottom_widget_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-widget-redirect-col3',  
                )
            )
        );
}
// col3 widget redirection
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_col3_bottom_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_col3_bottom_menu_redirect', array(
                    'section'      => 'zita-bottom-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'zita' ),
                    'button_class' => 'focus-customizer-bottom-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_bottom_hdr_hgt', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '40',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_bottom_hdr_hgt', array(
                    'label'       => esc_html__( 'Height', 'zita' ),
                    'section'     => 'zita-bottom-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 20,
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
            'zita_bottom_hdr_botm_brd', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_bottom_hdr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'zita' ),
                    'section'     => 'zita-bottom-header',
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
 $wp_customize->add_setting('zita_bottom_brdr_clr', array(
        'default'        => '#eee',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_bottom_brdr_clr', array(
        'label'      => __('Border Color', 'zita' ),
        'section'    => 'zita-bottom-header',
        'settings'   => 'zita_bottom_brdr_clr',
    ) ) 
 );  

//choose color layout
if((zita_pro_activation_class())==''){
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_bottom_color_scheme', array(
                'default'           => 'btm-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_bottom_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'zita' ),
                    'section'  => 'zita-bottom-header',
                    'choices'  => array(
                       'btm-default' => array(
                            'url'    => ZITA_COLOR_SCHM_DEF,
                        ),
                        'btm-dark'   => array(
                            'url'    => ZITA_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    }
}

// Pro feature List

if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_below_header_pro_list', array(
                'default'           => 'headerPro',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_below_header_pro_list', array(
                    'label'    => esc_html__( 'Some More Pro Features', 'zita' ),
                    'section'  => 'zita-bottom-header',
                    'priority'   => 108,
                    'choices'  => array(
                        'headerPro'   => array(
                            'url' => ZITA_ABOVEHEADER_PRO,
                        ),       
                    ),
                )
            )
        );
}


$wp_customize->add_setting('zita_below_header_pro_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_below_header_pro_more',
            array(
        'section'     => 'zita-bottom-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'Alot of pro features Menu Space , Sub Menu Space, Space Above Header <a target="_blank" href="%s">Get Pro </a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_pro_link', zita_get_pro_url( 'https://themehunk.com/zita-pro-wordpress-theme/' ) )),
         'priority'   =>50,
    )));