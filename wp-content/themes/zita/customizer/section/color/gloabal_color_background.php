<?php
/**
 * Gloabal Color and Background Options for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/******************/
//Global Option
/******************/
// theme color
 $wp_customize->add_setting('zita_theme_clr', array(
        'default'        => '#006799',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_theme_clr', array(
        'label'      => __('Theme Color', 'zita' ),
        'section'    => 'zita-gloabal-color',
        'settings'   => 'zita_theme_clr',
        'priority' => 1,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('zita_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_link_clr', array(
        'label'      => __('Link Color', 'zita' ),
        'section'    => 'zita-gloabal-color',
        'settings'   => 'zita_link_clr',
        'priority' => 2,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('zita_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'zita' ),
        'section'    => 'zita-gloabal-color',
        'settings'   => 'zita_link_hvr_clr',
        'priority' => 3,
    ) ) 
 );  
// text color
 $wp_customize->add_setting('zita_text_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_text_clr', array(
        'label'      => __('Text Color', 'zita' ),
        'section'    => 'zita-gloabal-color',
        'settings'   => 'zita_text_clr',
        'priority' => 4,
    ) ) 
 );
 // title color
 $wp_customize->add_setting('zita_title_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'zita_title_clr', array(
        'label'      => __('Title Color', 'zita' ),
        'section'    => 'zita-gloabal-color',
        'settings'   => 'zita_title_clr',
        'priority' => 4,
    ) ) 
 );

 // pageheader color
 $wp_customize->add_setting('zita_pageheader_clr', array(
        'default'        => 'rgba(0,0,0,0.57)',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_pageheader_clr', array(
        'label'      => __('Page Header Color', 'zita' ),
        'section'    => 'zita-gloabal-color',
        'settings'   => 'zita_pageheader_clr',
    ) ) 
 );

// gloabal background option
$wp_customize->get_control( 'background_color' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_color' )->priority = 6;
$wp_customize->get_control( 'background_image' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_image' )->priority = 7;
$wp_customize->get_control( 'background_preset' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_preset' )->priority = 8;
$wp_customize->get_control( 'background_position' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_position' )->priority = 8;
$wp_customize->get_control( 'background_repeat' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_repeat' )->priority = 9;
$wp_customize->get_control( 'background_attachment' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_attachment' )->priority = 10;
$wp_customize->get_control( 'background_size' )->section = 'zita-gloabal-color';
$wp_customize->get_control( 'background_size' )->priority = 11;
/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_global_clr_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_global_clr_more',
            array(
        'section'     => 'zita-gloabal-color',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/color-background', 'color-background' ) ) ),
        'priority'   => 30,
)));