<?php
/**
 * Woocommerce Page Layout for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
//container for woocommerce pages
$wp_customize->add_setting('zita_containerwoopage', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('zita_containerwoopage', array(
        'settings' => 'zita_containerwoopage',
        'label'    => __('Container For Woocommerce Page','zita'),
        'section'  => 'zita-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','zita'),
        'boxed'                  => __('Boxed','zita'),
        'contentbox'             => __('Content Boxed','zita'),
        'fullwidthcontained'     => __('Full Width/Contained','zita'),
        'fullwidthstrechched'    => __('Full Width/Stretched','zita'), 
        ),
    ));
/********************/
// Woo page layout
/********************/
$wp_customize->add_setting('zita_sidebar_woo_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
        

    ));
$wp_customize->add_control( 'zita_sidebar_woo_layout', array(
        'settings' => 'zita_sidebar_woo_layout',
        'label'    => __('WooCommerce','zita'),
        'section'  => 'zita-section-sidebar-group',
        'type'     => 'select',
        'choices'      => array(
        'default'      => __('Default','zita'),
        'no-sidebar'   => __('No Sidebar','zita'),
        'left'         => __('Left Sidebar','zita'),
        'right'        => __('Right Sidebar','zita'),    
        ),
        'priority'   => 6,
));