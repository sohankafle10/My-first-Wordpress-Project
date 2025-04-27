<?php
/**
 * Transparent Header for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/************************/
//Header Transparent
/************************/
$wp_customize->add_setting( 'zita_header_transparent', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_header_transparent', array(
                'label'                 => esc_html__('Enable Header Transparent
', 'zita'),
                'type'                  => 'checkbox',
                'section'               => 'zita-transparent-header',
                'settings'              => 'zita_header_transparent',
            ) ) );

// force disable on special page 
$wp_customize->add_setting( 'zita_header_transparent_special_page_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_header_transparent_special_page_disable', array(
                'label'                 => esc_html__('Disable transparent header for Special pages', 'zita'),
                'description'           => esc_html__('(like archive,404,search,shop, product page etc.)', 'zita'),
                'type'                  => 'checkbox',
                'section'               => 'zita-transparent-header',
                'settings'              => 'zita_header_transparent_special_page_disable',
            ) ) );
/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_tranparnet_header_doc_learn_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_tranparnet_header_doc_learn_more',
            array(
        'section'     => 'zita-transparent-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ),apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/transparent-header/', 'transparent-header' ) ) ),
         'priority'   =>50,
    )));


//Page Header
$wp_customize->add_setting( 'zita_page_header_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_page_header_enable', array(
                'label'                 => esc_html__('Enable Page Header
', 'zita'),
                'type'                  => 'checkbox',
                'section'               => 'zita-page-header',
                'settings'              => 'zita_page_header_enable',
            ) ) );