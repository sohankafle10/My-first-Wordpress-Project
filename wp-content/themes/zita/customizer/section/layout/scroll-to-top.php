<?php
/**
 *Scroll to top option
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/***********************/
//DISABLE SCROLL TO TOP
/***********************/
    $wp_customize->add_setting( 'zita_scroll_to_top_disable', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_scroll_to_top_disable', array(
                'label'       => esc_html__('Disable Scroll To Top (Pro)', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-scroll-to-top-section',
                'settings'    => 'zita_scroll_to_top_disable',
                'priority'   =>1,
            ) ) );
/********************/
// position left/right
/********************/
$wp_customize->add_setting('zita_scroll_to_top_option', array(
                'default'               => 'right',
                'sanitize_callback'     => 'zita_sanitize_select',
            ) );
$wp_customize->add_control( new Zita_Customizer_Buttonset_Control( $wp_customize,'zita_scroll_to_top_option', array(
                'label'                 => esc_html__( 'Position', 'zita' ),
                'section'               => 'zita-scroll-to-top-section',
                'settings'              => 'zita_scroll_to_top_option',
                'choices'               => array(
                    'left'   => esc_html__( 'Left', 'zita' ),
                    'right'  => esc_html__( 'Right', 'zita' ),
             ),
                'priority'   =>2,
) ) );
//icon background radius
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_scroll_to_top_icon_radius', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '2',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_scroll_to_top_icon_radius', array(
                    'label'       => esc_html__( 'Icon Radius', 'zita' ),
                    'section'     => 'zita-scroll-to-top-section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'priority'   =>3,
                )
        )
);
}
// color option
// icon-color
 $wp_customize->add_setting('zita_scroll_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_scroll_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'zita' ),
        'section'    => 'zita-scroll-to-top-section',
        'settings'   => 'zita_scroll_to_top_icon_clr',
        'priority'   =>4,
    ) ) 
 ); 

// icon-bg-color
 $wp_customize->add_setting('zita_scroll_to_top_icon_bg_clr', array(
        'default'        => '#006799',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_scroll_to_top_icon_bg_clr', array(
        'label'      => __('Icon Background Color', 'zita' ),
        'section'    => 'zita-scroll-to-top-section',
        'settings'   => 'zita_scroll_to_top_icon_bg_clr',
        'priority'   =>5,
    ) ) 
 );  
// icon-hvr-color
 $wp_customize->add_setting('zita_scroll_to_top_icon_hvr_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_scroll_to_top_icon_hvr_clr', array(
        'label'      => __('Icon Hover Color', 'zita' ),
        'section'    => 'zita-scroll-to-top-section',
        'settings'   => 'zita_scroll_to_top_icon_hvr_clr',
        'priority'   =>6,
    ) ) 
 );  
// icon-bghvr-color
 $wp_customize->add_setting('zita_scroll_to_top_icon_bghvr_clr', array(
        'default'        => '#015782',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_scroll_to_top_icon_bghvr_clr', array(
        'label'      => __('Icon Background Hover Color', 'zita' ),
        'section'    => 'zita-scroll-to-top-section',
        'settings'   => 'zita_scroll_to_top_icon_bghvr_clr',
        'priority'   =>7,
    ) ) 
 );  
/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_scroll_to_top_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_scroll_to_top_more',
            array(
        'section'     => 'zita-scroll-to-top-section',
        'type'        => 'custom_message',

        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/scroll-to-top/', 'scroll-to-top' ) )),
        'priority'   =>30,
    )));