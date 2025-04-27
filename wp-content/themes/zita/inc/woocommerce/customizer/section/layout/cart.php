<?php
/**
 * Cart for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
//cart visibility
$wp_customize->add_setting('zita_woo_cart_visibility', array(
        'default'        => 'disable-all',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_woo_cart_visibility', array(
        'settings'   => 'zita_woo_cart_visibility',
        'label'      => __('Visibility','zita'),
        'section'    => 'zita-woo-cart',
        'type'       => 'select',
        'choices'    => array(
        'display-all'     => __('Display on all devices','zita'),
        'disable-mobile'  => __('Disable in mobile','zita'),
        'disable-all'     => __('Disable in all device','zita'),
        ),
    ));
/**************/
//Cart display
/**************/
$wp_customize->add_setting('zita_woo_cart_disable', array(
        'default'           => 'icon',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_woo_cart_disable', array(
        'settings'   => 'zita_woo_cart_disable',
        'label'      => __('Show as','zita'),
        'section'    => 'zita-woo-cart',
        'type'       => 'select',
        'choices'    => array(
        'icon'                     => __('Icon','zita'),
        'icon+total'                => __('Icon & Total','zita'),
        'icon+cartcount'           => __('Icon & Cart Count','zita'),
        'icon+cartcount+total'     => __('Icon & Cart Count & Total','zita'),
        ),
    ));
// color scheme
if((zita_pro_activation_class())==''){
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_woo_cart_color_scheme', array(
                'default'           => 'woo-cart-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_woo_cart_color_scheme', array(
                    'label'    => esc_html__( 'Choose Dropdown Color Scheme', 'zita' ),
                    'section'  => 'zita-woo-cart',
                    'choices'  => array(
                       'woo-cart-default' => array(
                            'url'    => ZITA_COLOR_SCHM_DEF,
                        ),
                        'woo-cart-dark'   => array(
                            'url'    => ZITA_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    }
}