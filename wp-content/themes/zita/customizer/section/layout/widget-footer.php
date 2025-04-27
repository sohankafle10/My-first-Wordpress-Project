<?php
/**
 * Footer Options for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/******************/
//Widegt footer
/******************/
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'zita_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-four',
               'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','zita'),
                    'section'  => 'zita-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-four' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-five' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => ZITA_FOOTER_WIDGET_LAYOUT_8,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('Zita_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'zita_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Zita_Widegt_Redirect(
                $wp_customize, 'zita_bottom_footer_widget_redirect', array(
                    'section'      => 'zita-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'zita' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/************/
//CONTENT WIDTH
/************/ 
$wp_customize->add_setting('zita_footer_widget_content_width', array(
        'default'        => 'content-width',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_footer_widget_content_width', array(
        'settings' => 'zita_footer_widget_content_width',
        'label'    => __('Widget Width','zita'),
        'section'  => 'zita-widget-footer',
        'type'     => 'select',
        'choices'  => array(
        'content-width'             => __('Content Width','zita'),
        'full-width'             => __('Full Width','zita'),  
    ),
));

//choose color layout
if((zita_pro_activation_class())==''){
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_bottom_footer_widget_color_scheme', array(
                'default'           => 'ft-wgt-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_bottom_footer_widget_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'zita' ),
                    'section'  => 'zita-widget-footer',
                    'choices'  => array(
                       'ft-wgt-default' => array(
                            'url'    => ZITA_COLOR_SCHM_DEF,
                        ),
                        'ft-wgt-dark'   => array(
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
$wp_customize->add_setting('zita_widget_footer_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_widget_footer_more',
            array(
        'section'     => 'zita-widget-footer',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/widget-footer/', 'widget-footer' ) ) ),
        'priority'   =>30,
    )));