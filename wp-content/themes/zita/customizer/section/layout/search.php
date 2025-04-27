<?php 
/**
 *Search Options for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
//Icon-font-size
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_search_icon_font_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_icon_font_size', array(
                    'label'       => esc_html__( 'Icon Font Size', 'zita' ),
                    'section'     => 'zita-search-icon',
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
//Radius
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_search_icon_radius', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_icon_radius', array(
                    'label'       => esc_html__( 'Icon Radius', 'zita' ),
                    'section'     => 'zita-search-icon',
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
// iconcolor
$wp_customize->add_setting('zita_search_icon_clr', array(
        'default'        => '#006799',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_search_icon_clr', array(
        'label'      => __('Icon Color', 'zita' ),
        'section'    => 'zita-search-icon',
        'settings'   => 'zita_search_icon_clr',
    ) ) 
 ); 
// brdrcolor
$wp_customize->add_setting('zita_search_icon_brd_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_search_icon_brd_clr', array(
        'label'      => __('Icon Border Color', 'zita' ),
        'section'    => 'zita-search-icon',
        'settings'   => 'zita_search_icon_brd_clr',
    ) ) 
 ); 
// iconhover
$wp_customize->add_setting('zita_search_icon_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_search_icon_hvr_clr', array(
        'label'      => __('Icon Hover Color', 'zita' ),
        'section'    => 'zita-search-icon',
        'settings'   => 'zita_search_icon_hvr_clr',
    ) ) 
 ); 
// bgcolor
$wp_customize->add_setting('zita_search_icon_bg_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_search_icon_bg_clr', array(
        'label'      => __('Icon Background Color', 'zita' ),
        'section'    => 'zita-search-icon',
        'settings'   => 'zita_search_icon_bg_clr',
    ) ) 
 ); 
//****************//
// search box
//****************//
//Icon-font-size
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_search_box_icon_width', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '100',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_box_icon_width', array(
                    'label'       => esc_html__( 'Width', 'zita' ),
                    'section'     => 'zita-search-box',
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
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_search_box_icon_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '40',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_box_icon_height', array(
                    'label'       => esc_html__( 'Height', 'zita' ),
                    'section'     => 'zita-search-box',
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
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_search_box_radius', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_box_radius', array(
                    'label'       => esc_html__( 'Border Radius', 'zita' ),
                    'section'     => 'zita-search-box',
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

if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_search_box_plc_txt_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_box_plc_txt_size', array(
                    'label'       => esc_html__( 'Placeholder Font Size', 'zita' ),
                    'section'     => 'zita-search-box',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
$wp_customize->add_setting(
            'zita_search_box_icon_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_search_box_icon_size', array(
                    'label'       => esc_html__( 'Icon Size', 'zita' ),
                    'section'     => 'zita-search-box',
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
// place holder text
$wp_customize->add_setting('zita_search_placeholder_txt', array(
        'default'           =>__('Search..','zita'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_text',
        
    ));
$wp_customize->add_control('zita_search_placeholder_txt', array(
        'label'    => __('Placeholder Text', 'zita'),
        'section'  => 'zita-search-box',
        'settings' => 'zita_search_placeholder_txt',
         'type'    => 'text',
    ));
$wp_customize->add_setting('zita_social_box_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_social_box_bg_clr', array(
        'label'      => __('Search Box Background Color', 'zita' ),
        'section'    => 'zita-search-box',
        'settings'   => 'zita_social_box_bg_clr',
    ) ) 
 );
$wp_customize->add_setting('zita_social_box_plc_holdr_clr', array(
        'default'           => '#bbb',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
 ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_social_box_plc_holdr_clr', array(
        'label'      => __('Placeholder Text Color', 'zita' ),
        'section'    => 'zita-search-box',
        'settings'   => 'zita_social_box_plc_holdr_clr',
  )) 
);
$wp_customize->add_setting('zita_social_box_brdr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
 ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_social_box_brdr_clr', array(
        'label'      => __('Border Color', 'zita' ),
        'section'    => 'zita-search-box',
        'settings'   => 'zita_social_box_brdr_clr',
  )) 
);

$wp_customize->add_setting('zita_social_box_icon_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
 ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_social_box_icon_clr', array(
        'label'      => __('Icon Color', 'zita' ),
        'section'    => 'zita-search-box',
        'settings'   => 'zita_social_box_icon_clr',
  )) 
);

/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_search_icon_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_search_icon_link_more',
            array(
        'section'     => 'zita-search-icon',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/search-icon/', 'search-icon' ) ) ),
        'priority'   =>30,
    )));
/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_search_box_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_search_box_link_more',
            array(
        'section'     => 'zita-search-box',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/search-box/', 'search-box' ) ) ),
        'priority'   =>30,
    )));
