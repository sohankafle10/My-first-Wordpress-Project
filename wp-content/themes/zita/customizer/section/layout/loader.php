<?php
/**
 * Site Loader for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
//Enable Loader
$wp_customize->add_setting( 'zita_preloader_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_preloader_enable', array(
                'label'                 => esc_html__('Enable Loader (Pro)', 'zita'),
                'type'                  => 'checkbox',
                'section'               => 'zita-pre-loader',
                'settings'              => 'zita_preloader_enable',
                'priority'   => 1,
            ) ) );
// BG color
 $wp_customize->add_setting('zita_loader_bg_clr', array(
        'default'           => '#f5f5f5',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_loader_bg_clr', array(
        'label'      => __('Background Color', 'zita' ),
        'section'    => 'zita-pre-loader',
        'settings'   => 'zita_loader_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
/*******************/ 
// Pre loader Image
/*******************/ 
$wp_customize->add_setting('zita_preloader_image_upload', array(
        'default'       => ZITA_LOADER,
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'zita_preloader_image_upload', array(
        'label'          => __('Pre Loader Image', 'zita'),
        'description'    => __('(You can also use GIF image.)', 'zita'),
        'section'        => 'zita-pre-loader',
        'settings'       => 'zita_preloader_image_upload',
 )));
/****************/
//body doc link
/****************/
$wp_customize->add_setting('zita_pre_loader_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_pre_loader_more',
            array(
        'section'     => 'zita-pre-loader',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/pre-loader/', 'pre-loader' ) ) ),
        'priority'   =>30,
    )));