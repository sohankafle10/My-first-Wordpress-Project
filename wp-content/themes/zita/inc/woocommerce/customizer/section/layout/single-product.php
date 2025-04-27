<?php
/**
 * Single Product for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/*********************/
//Single Product content width
/*********************/
    $wp_customize->add_setting('zita_single_product_content_width', array(
        'default'          =>'defualt',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('zita_single_product_content_width', array(
        'settings'=> 'zita_single_product_content_width',
        'label'   => __('Content Width','zita'),
        'section' => 'zita_woo_single_product',
        'type'    => 'select',
        'choices' => array(
        'defualt'    => __('Default','zita'),
        'custom'     => __('Custom (Pro)','zita'), 
        ),
    ));
$wp_customize->add_setting('zita_single_sidebar_disable', array(
                'default'               => true,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'zita_single_sidebar_disable', array(
                'label'         => __('Force to disable sidebar in single product page.', 'zita'),
                'type'          => 'checkbox',
                'section'       => 'zita_woo_single_product',
                'settings'      => 'zita_single_sidebar_disable',
            ) ) );
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_product_cnt_widht', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1200',
                 'transport'        => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_product_cnt_widht', array(
                    'label'       => __( 'Enter Width', 'zita' ),
                    'section'     => 'zita_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                )
        )
);
}
/***********************************/  
//Product Layout Alignment
/***********************************/ 
$wp_customize->add_setting('zita_single_product_alignment', array(
                'default'               => 'left',
                'sanitize_callback'     => 'zita_sanitize_select',
            ) );
$wp_customize->add_control( new Zita_Customizer_Buttonset_Control( $wp_customize, 'zita_single_product_alignment', array(
                'label'                 => esc_html__( 'Product Content Alignment', 'zita' ),
                'section'               => 'zita_woo_single_product',
                'settings'              => 'zita_single_product_alignment',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'zita' ),
                    'center'            => esc_html__( 'center', 'zita' ),
                    'right'             => esc_html__( 'Right', 'zita' ),
                ),
            ) ) );
/***********************************/  
// Single product structure 
/***********************************/  
$wp_customize->add_setting(
        ZITA_THEME_SETTINGS . '[zita-woo-single-product-structure]', array(
            'default'           => zita_get_option('zita-woo-single-product-structure'),
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Zita_Control_Sortable(
            $wp_customize, ZITA_THEME_SETTINGS . '[zita-woo-single-product-structure]', array(
                'type'     => 'zta-sortable',
                'section'  => 'zita_woo_single_product',
                'label'    => __( 'Product Structure', 'zita' ),
                'choices'  => array(
                        'title'      => __( 'Title', 'zita' ),
                    'price'      => __( 'Price', 'zita' ),
                    'ratings'    => __( 'Ratings', 'zita' ),
                    'add_cart'   => __( 'Add To Cart', 'zita' ),
                    'short_desc' => __( 'Short Description', 'zita' ),
                    'meta'       => __( 'Meta', 'zita' ),
                ),
            )
        )
    );
	
/**********************/
// Display product Tab
/**********************/
// product tab divider
$wp_customize->add_setting('zita_single_product_tab_display_divide', array(
        'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control( new Zita_Misc_Control( $wp_customize, 'zita_single_product_tab_display_divide',
            array(
        'section'     => 'zita_woo_single_product',
        'type'        => 'custom_message',
        'description' => __('Product Description Tab','zita' ),
)));
$wp_customize->add_setting('zita_single_product_tab_display', array(
                'default'               => true,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'zita_single_product_tab_display', array(
                'label'         => __('Display Product Description Tab', 'zita'),
                'type'          => 'checkbox',
                'section'       => 'zita_woo_single_product',
                'settings'      => 'zita_single_product_tab_display',
            ) ) );

$wp_customize->add_setting('zita_single_product_tab_layout', array(
                'default'               => 'horizontal',
                'sanitize_callback'     => 'zita_sanitize_select',
            ) );
$wp_customize->add_control( new Zita_Customizer_Buttonset_Control( $wp_customize, 'zita_single_product_tab_layout', array(
                'label'                 => esc_html__( 'Product Tab Layout', 'zita' ),
                'section'               => 'zita_woo_single_product',
                'settings'              => 'zita_single_product_tab_layout',
                'choices'               => array(
                    'horizontal'          => esc_html__( 'Horizontal', 'zita' ),
                    'vertical'            => esc_html__( 'Vertical', 'zita' ),
                ),
            ) ) );
/******************************/
// Up Sell Product
/******************************/
$wp_customize->add_setting('zita_single_upsell_product_divide', array(
        'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control( new Zita_Misc_Control( $wp_customize, 'zita_single_upsell_product_divide',
            array(
        'section'     => 'zita_woo_single_product',
        'type'        => 'custom_message',
        'description' => __('Up Sell Product','zita' ),
)));
// display upsell
$wp_customize->add_setting('zita_upsell_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'zita_upsell_product_display', array(
                'label'         => __('Display up sell product', 'zita'),
                'type'          => 'checkbox',
                'section'       => 'zita_woo_single_product',
                'settings'      => 'zita_upsell_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_upsale_num_col_shw', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default' => '3',  
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_upsale_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'zita' ),
                    'section'     => 'zita_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'zita_upsale_num_product_shw', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default' => '3',
                
                
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_upsale_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'zita' ),
                    'section'     => 'zita_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/******************************/
// Related Product
/******************************/
$wp_customize->add_setting('zita_single_related_product_divide', array(
        'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control( new Zita_Misc_Control( $wp_customize, 'zita_single_related_product_divide',
            array(
        'section'     => 'zita_woo_single_product',
        'type'        => 'custom_message',
        'description' => __('Related Product','zita' ),
)));
// display upsell
$wp_customize->add_setting('zita_related_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'zita_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'zita_related_product_display', array(
                'label'         => __('Display Related product', 'zita'),
                'type'          => 'checkbox',
                'section'       => 'zita_woo_single_product',
                'settings'      => 'zita_related_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_related_num_col_shw', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default' => '3',
                
                
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_related_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'zita' ),
                    'section'     => 'zita_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'zita_related_num_product_shw', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default' => '3',
                
                
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_related_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'zita' ),
                    'section'     => 'zita_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_woo_single_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_woo_single_link_more',
            array(
        'section'     => 'zita_woo_single_product',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/single-product/', 'single-product' ) ) ),
        'priority'   =>30,
    )));