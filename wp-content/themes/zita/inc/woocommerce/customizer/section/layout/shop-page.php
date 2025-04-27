<?php
/**
 * Shop Page for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
$wp_customize->get_setting( 'woocommerce_catalog_columns' )->priority = '1';
$wp_customize->get_control( 'woocommerce_catalog_columns' )->section = 'zita-woo-shop';
$wp_customize->get_setting( 'woocommerce_catalog_rows' )->priority = '1';
$wp_customize->get_control( 'woocommerce_catalog_rows' )->section = 'zita-woo-shop';
// product animation
$wp_customize->add_setting('zita_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_woo_product_animation', array(
        'settings'=> 'zita_woo_product_animation',
        'label'   => __('Product Image Hover Style','zita'),
        'section' => 'zita-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','zita'),
        'zoom'            => __('Zoom (Pro)','zita'),
        'swap'            => __('Swap (Pro)','zita'),         
        ),
    ));
//product stucture
     $wp_customize->add_setting(
        ZITA_THEME_SETTINGS . '[zita-product-structure]', array(
            'default'           => zita_get_option('zita-product-structure'),
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Zita_Control_Sortable(
            $wp_customize, ZITA_THEME_SETTINGS . '[zita-product-structure]', array(
                'type'     => 'zta-sortable',
                'section'  => 'zita-woo-shop',
                'label'    => __( 'Product Structure', 'zita' ),
                'choices'  => array(
                        'title'      => __( 'Title', 'zita' ),
						'price'      => __( 'Price', 'zita' ),
						'ratings'    => __( 'Ratings', 'zita' ),
						'add_cart'   => __( 'Add To Cart', 'zita' ),
						'category'   => __( 'Category', 'zita' ),
                        'short_desc' => __( 'Short Description', 'zita' ),
                ),
            )
        )
    );
/***********************************/  
//Product content alignment
/***********************************/ 
$wp_customize->add_setting('zita_product_content_alignment', array(
                'default'               => 'left',
                'sanitize_callback'     => 'zita_sanitize_select',
            ) );

$wp_customize->add_control( new Zita_Customizer_Buttonset_Control( $wp_customize, 'zita_product_content_alignment', array(
                'label'                 => esc_html__( 'Product Content Alignment', 'zita' ),
                'section'               => 'zita-woo-shop',
                'settings'              => 'zita_product_content_alignment',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'zita' ),
                    'center'            => esc_html__( 'center', 'zita' ),
                    'right'             => esc_html__( 'Right', 'zita' ),
                ),
            ) ) );
/****************************/
// Box Shadow
/****************************/
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_shop_product_box_shadow', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_shop_product_box_shadow', array(
                    'label'       => esc_html__( 'Product Box shadow', 'zita' ),
                    'section'     => 'zita-woo-shop',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 5,
                        'step' => 1,
                    ),
                )
        )
);
//**********************/
// Box shadow on hover
//**********************/
$wp_customize->add_setting(
            'zita_shop_product_box_shadow_on_hover', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_shop_product_box_shadow_on_hover', array(
                    'label'       => esc_html__( 'Product Box shadow on Hover', 'zita' ),
                    'section'     => 'zita-woo-shop',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 5,
                        'step' => 1,
                    ),
                )
        )
);
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_woo_shop_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_woo_shop_link_more',
            array(
        'section'     => 'zita-woo-shop',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/shop-page/', 'shop-page' ) ) ),
        'priority'   =>30,
    )));