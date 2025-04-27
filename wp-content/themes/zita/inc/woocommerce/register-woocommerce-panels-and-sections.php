<?php
/**
 * Register WooCommerce customizer panels & sections.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
//General Section
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
$wp_customize->get_panel('woocommerce')->priority = 30;
$zita_woo_general_section = new Zita_WP_Customize_Section( $wp_customize, 'zita-woo-general-section', array(
    'title'    => __('General', 'zita'),
        'panel'    => 'woocommerce',
        'priority' => 1,
));
$wp_customize->add_section($zita_woo_general_section);
$zita_woo_gen_sale = new Zita_WP_Customize_Section( $wp_customize, 'zita-woo-gen-sale', array(
    'title'    => __( 'On Sale Badge', 'zita' ),
     'panel'    => 'woocommerce',
		'section'  => 'zita-woo-general-section',
		'priority' => 1,
));
$wp_customize->add_section( $zita_woo_gen_sale );
$zita_woo_cart = new Zita_WP_Customize_Section( $wp_customize, 'zita-woo-cart', array(
    'title'    => __( 'Cart', 'zita' ),
     'panel'    => 'woocommerce',
        'section'  => 'zita-woo-general-section',
        'priority' => 2,
));
$wp_customize->add_section( $zita_woo_cart );
$zita_woo_shop = new Zita_WP_Customize_Section( $wp_customize, 'zita-woo-shop', array(
    'title'    => __( 'Shop Page', 'zita' ),
     'panel'    => 'woocommerce',
	 'priority' => 2,
));
$wp_customize->add_section( $zita_woo_shop );
$zita_woo_single_product = new Zita_WP_Customize_Section( $wp_customize,'zita_woo_single_product', array(
    'title'    => __( 'Single Product', 'zita' ),
    'panel'    => 'woocommerce',
    'priority' => 3,
));
$wp_customize->add_section( $zita_woo_single_product  );