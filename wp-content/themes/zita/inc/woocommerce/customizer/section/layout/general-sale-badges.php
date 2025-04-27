<?php
/**
 * General Sale Badges for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
//choose sale badges style
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
$wp_customize->add_setting('zita_sale_bagde_style', array(
        'default'        => 'circle',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_sale_bagde_style', array(
        'settings' => 'zita_sale_bagde_style',
        'label'   => __('On Sale Badge Style','zita'),
        'section' => 'zita-woo-gen-sale',
        'type'    => 'select',
        'choices'    => array(
        'circle'            => __('Circle','zita'),
        'square'            => __('Square (Pro)','zita'),
        'diamond'           => __('Diamond (Pro)','zita'),         
        ),
    ));
