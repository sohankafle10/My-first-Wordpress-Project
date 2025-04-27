<?php
/**
 * Site Button for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
// Button Text Color
$wp_customize->add_setting('zita_button_txt_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_button_txt_clr', array(
        'label'      => __('Button Text Color', 'zita' ),
        'section'    => 'zita-site-button',
        'settings'   => 'zita_button_txt_clr',
        'priority' => 1,
    ) ) 
 );  

// Button BG color
 $wp_customize->add_setting('zita_button_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_button_bg_clr', array(
        'label'      => __('Button Background Color', 'zita' ),
        'section'    => 'zita-site-button',
        'settings'   => 'zita_button_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
// Button Text Hover Color
$wp_customize->add_setting('zita_button_txt_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_button_txt_hvr_clr', array(
        'label'      => __('Button Text Hover Color', 'zita' ),
        'section'    => 'zita-site-button',
        'settings'   => 'zita_button_txt_hvr_clr',
        'priority'   =>3,
    ) ) 
 ); 
 // Button BG hover color
 $wp_customize->add_setting('zita_button_bg_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_button_bg_hvr_clr', array(
        'label'      => __('Button Background Hover Color', 'zita' ),
        'section'    => 'zita-site-button',
        'settings'   => 'zita_button_bg_hvr_clr',
        'priority'   => 4,
    ) ) 
 );
/**********************/  
// Button border radius
/**********************/ 
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_button_border_radius', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_button_border_radius', array(
                    'label'       => esc_html__( 'Button Border Radius', 'zita' ),
                    'section'     => 'zita-site-button',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
        )
    );
}
/****************/
//body doc link
/****************/
$wp_customize->add_setting('zita_site_button_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_site_button_more',
            array(
        'section'     => 'zita-site-button',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/site-button/', 'site-button' ) ) ),
        'priority'   =>30,
    )));