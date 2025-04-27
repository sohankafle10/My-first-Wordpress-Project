<?php 
/**
 * Social Icon Options for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
$wp_customize->add_setting('social_link_facebook', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_link_facebook', array(
        'label'    => __('Facebook URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_facebook',
         'type'       => 'text',
        
        ));

$wp_customize->add_setting('social_link_linkedin', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_link_linkedin', array(
        'label'    => __('LinkedIn URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_linkedin',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_link_pintrest', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_link_pintrest', array(
        'label'    => __('Pinterest URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_pintrest',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_link_twitter', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_link_twitter', array(
        'label'    => __('Twitter URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_twitter',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_link_insta', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_link_insta', array(
        'label'    => __('Instagram URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_insta',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_link_tumblr', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_link_tumblr', array(
        'label'    => __('Tumblr URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_tumblr',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_link_youtube', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_link_youtube', array(
        'label'    => __('Youtube URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_youtube',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_link_stumbleupon', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_link_stumbleupon', array(
        'label'    => __('Stumbleupon URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_stumbleupon',
        'type'     => 'text',
        ));
        $wp_customize->add_setting('social_link_dribble', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_link_dribble', array(
        'label'    => __('Dribble URL', 'zita'),
        'section'  => 'zita-social-icon',
        'settings' => 'social_link_dribble',
        'type'     => 'text',
        ));
//Enable Loader
$wp_customize->add_setting( 'zita_social_original_color', array(
                'default'               => false,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_social_original_color', array(
                'label'       => esc_html__('Show Original Color', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-social-icon',
                'settings'    => 'zita_social_original_color',
)));
/****************/
//body doc link
/****************/
$wp_customize->add_setting('zita_social_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_social_link_more',
            array(
        'section'     => 'zita-social-icon',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/social-icon/', 'social-icon' ) ) ),
        'priority'   =>30,
    )));