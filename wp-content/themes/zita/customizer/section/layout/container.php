<?php
/**
 * Container Options for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
// Container Width
$wp_customize->add_setting('zita_container_pro_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_container_pro_more',
            array(
        'section'     => 'zita-conatiner',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( '<a target="_blank" href="%s">Get Pro</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_pro_link', zita_get_pro_url( 'https://themehunk.com/zita-pro-wordpress-theme/' ) )),
         'priority'   =>2,
    )));

if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_conatiner_width', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1200',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_conatiner_width', array(
                    'label'       => esc_html__( 'Container Width (Pro)', 'zita' ),
                    'section'     => 'zita-conatiner',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                    'priority'   =>2,
                )
        )
);
}
// default container
$wp_customize->add_setting('zita_default_container', array(
        'default'           => 'boxed',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_default_container', array(
        'settings' => 'zita_default_container',
        'label'    => __('Default Container','zita'),
        'section'  => 'zita-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'boxed'                  => __('Boxed','zita'),
        'contentbox'             => __('Content Boxed','zita'),
        'fullwidthcontained'     => __('Full Width/Contained','zita'),
        'fullwidthstrechched'    => __('Full Width/Stretched','zita'), 
        ),
        'priority'   =>3,
    ));

//container for pages
$wp_customize->add_setting('zita_containerpage', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_containerpage', array(
        'settings' => 'zita_containerpage',
        'label'    => __('Container For Page','zita'),
        'section'  => 'zita-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','zita'),
        'boxed'                  => __('Boxed','zita'),
        'contentbox'             => __('Content Boxed','zita'),
        'fullwidthcontained'     => __('Full Width/Contained','zita'),
        'fullwidthstrechched'    => __('Full Width/Stretched','zita'), 
        ),
        'priority'   =>4,
    ));
//Container for Blog Archives
$wp_customize->add_setting('zita_containerarchive', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_containerarchive', array(
        'settings' => 'zita_containerarchive',
        'label'    => __('Container For Blog / Archives','zita'),
        'section'  => 'zita-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','zita'),
        'boxed'                  => __('Boxed','zita'),
        'contentbox'             => __('Content Boxed','zita'),
        'fullwidthcontained'     => __('Full Width/Contained','zita'),
        'fullwidthstrechched'    => __('Full Width/Stretched','zita'), 
        ),
        'priority'   =>5,
    ));
//container for blog single pages
$wp_customize->add_setting('zita_containerblogpage', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_containerblogpage', array(
        'settings' => 'zita_containerblogpage',
        'label'    => __('Container For Blog Single','zita'),
        'section'  => 'zita-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','zita'),
        'boxed'                  => __('Boxed','zita'),
        'contentbox'             => __('Content Boxed','zita'),
        'fullwidthcontained'     => __('Full Width/Contained','zita'),
        'fullwidthstrechched'    => __('Full Width/Stretched','zita'), 
        ),
        'priority'   =>6,
    ));
/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_container_doc_learn_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_container_doc_learn_more',
            array(
        'section'     => 'zita-conatiner',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs-cate/container/', 'container' ) ) ),
         'priority'   =>50,
    )));