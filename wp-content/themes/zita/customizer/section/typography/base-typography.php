<?php 
/**
 * Base-Typography for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
if ( class_exists( 'Zita_Customize_Control_Checkbox_Multiple' ) ){
    $wp_customize->add_setting(
            'zita_font_subsets', array(
                'default' => array( 'latin' ),
                'sanitize_callback' => 'zita_checkbox_explode',
            )
        );
    $wp_customize->add_control(
            new Zita_Customize_Control_Checkbox_Multiple(
                $wp_customize, 'zita_font_subsets', array(
                    'section' => 'zita-base-typography-font-subset',
                    'label'   => esc_html__( 'Font Subsets', 'zita' ),
                    'choices' => array(
                        'latin'     => 'latin',
                        'latin-ext' => 'latin-ext',
                        'cyrillic'  => 'cyrillic',
                        'cyrillic-ext' => 'cyrillic-ext',
                        'greek'        => 'greek',
                        'greek-ext'    => 'greek-ext',
                        'vietnamese'   => 'vietnamese',
                        'arabic'       => 'arabic',
                    ),
                    'priority' => 1,
                )
            )
        );
}
//Body
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_body_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_body_font', array(
        'label' => esc_html__( 'Font family (Pro)', 'zita' ),
                    'section'           => 'zita-base-typography-body-font',
                    'priority'          => 1,
                    'type'              => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_body_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_body_font_weight', array(
        'settings' => 'zita_body_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-body-font',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'  => __( 'Thin 100', 'zita' ),
        '200'  => __( 'Light 200', 'zita' ),
        '300'  => __( 'Book 300', 'zita' ),
        '400'  => __( 'Normal 400', 'zita' ),   
        '500'  => __( 'Medium 500', 'zita' ),
        '600'  => __( 'Semibold 600', 'zita' ),
        '700'  => __( 'Bold 700', 'zita' ), 
        '900'  => __( 'Extra Bold 900', 'zita' ),
        '900'  => __( 'Black 900', 'zita' ),   
        ),
));
//Text-transform
$wp_customize->add_setting('zita_body_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_body_text_transform', array(
        'settings' => 'zita_body_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-body-font',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
/*******************/
// font-size
/*******************/
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_body_font_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_body_font_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-body-font',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
// font line-height
$wp_customize->add_setting(
            'zita_body_font_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.6',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_body_font_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-body-font',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
// font letter spacing
$wp_customize->add_setting(
                'zita_body_font_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_body_font_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-body-font',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/*******************/
//Heading Font-Style
/*******************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_heading_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_heading_font', array(
            'label' => esc_html__( 'Font family', 'zita' ),
                    'section'     => 'zita-base-typography-heading',
                    'priority'    => 1,
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_heading_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_heading_font_weight', array(
        'settings' => 'zita_heading_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-heading',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));

//Text-transform
$wp_customize->add_setting('zita_heading_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_heading_text_transform', array(
        'settings' => 'zita_heading_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-heading',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
/**********************/
//Content Font-Style H1
/**********************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_h1_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_h1_font', array(
            'label' => esc_html__( 'H1', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_h1_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h1_font_weight', array(
        'settings' => 'zita_h1_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));


//H1 Text-transform
$wp_customize->add_setting('zita_h1_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h1_text_transform', array(
        'settings' => 'zita_h1_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_h1_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '48',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h1_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'zita_h1_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.2',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_h1_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'zita_h1_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h1_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H2
/**********************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_h2_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_h2_font', array(
            'label' => esc_html__( 'H2', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_h2_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h2_font_weight', array(
        'settings' => 'zita_h2_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));

//H2 Text-transform
$wp_customize->add_setting('zita_h2_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h2_text_transform', array(
        'settings' => 'zita_h2_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_h2_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '44',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h2_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'zita_h2_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.3',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_h2_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'zita_h2_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h2_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H3
/**********************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_h3_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_h3_font', array(
            'label' => esc_html__( 'H3', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_h3_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h3_font_weight', array(
        'settings' => 'zita_h3_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));
//H3 Text-transform
$wp_customize->add_setting('zita_h3_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h3_text_transform', array(
        'settings' => 'zita_h3_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_h3_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '40',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h3_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'zita_h3_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.4',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_h3_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'zita_h3_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h3_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H4
/**********************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_h4_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_h4_font', array(
            'label' => esc_html__( 'H4', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_h4_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h4_font_weight', array(
        'settings' => 'zita_h4_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));
//H4 Text-transform
$wp_customize->add_setting('zita_h4_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h4_text_transform', array(
        'settings' => 'zita_h4_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_h4_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '36',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h4_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'zita_h4_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.5',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_h4_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'zita_h4_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h4_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H5
/**********************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_h5_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_h5_font', array(
            'label' => esc_html__( 'H5', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_h5_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h5_font_weight', array(
        'settings' => 'zita_h5_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));
//H5 Text-transform
$wp_customize->add_setting('zita_h5_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h5_text_transform', array(
        'settings' => 'zita_h5_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_h5_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '32',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h5_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'zita_h5_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.6',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_h5_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'zita_h5_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h5_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H6
/**********************/
if (class_exists( 'Zita_Font_Selector')){
        $wp_customize->add_setting(
            'zita_h6_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Zita_Font_Selector(
                $wp_customize, 'zita_h6_font', array(
            'label' => esc_html__( 'H6', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'select',
            )
        )
    );
}
//Font-Weight
$wp_customize->add_setting('zita_h6_font_weight', array(
        'default'           => 'normal',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h6_font_weight', array(
        'settings' => 'zita_h6_font_weight',
        'label'    => __('Font Weight','zita'),
        'description' => __('Important: Not all fonts support every font-weight.','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices' => array(
        'normal' => __( 'Default', 'zita' ),
        '100'   => __( 'Thin 100', 'zita' ),
        '200'   => __( 'Light 200', 'zita' ),
        '300'   => __( 'Book 300', 'zita' ),
        '400'   => __( 'Normal 400', 'zita' ),   
        '500'   => __( 'Medium 500', 'zita' ),
        '600'   => __( 'Semibold 600', 'zita' ),
        '700'   => __( 'Bold 700', 'zita' ), 
        '900'   => __( 'Extra Bold 900', 'zita' ),
        '900'   => __( 'Black 900', 'zita' ),   
        ),
));
//H5 Text-transform
$wp_customize->add_setting('zita_h6_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'zita_h6_text_transform', array(
        'settings' => 'zita_h6_text_transform',
        'label'    => __('Text Transform','zita'),
        'section'  => 'zita-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'zita' ),
        'none'       => __( 'None', 'zita' ),
        'capitalize' => __( 'Capitalize', 'zita' ),
        'uppercase'  => __( 'Uppercase', 'zita' ),
        'lowercase'  => __( 'Lowercase', 'zita' ),    
        ),
));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_h6_size', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '30',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h6_size', array(
                    'label'       => esc_html__( 'Font-Size', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'zita_h6_line_height', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1.7',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize,'zita_h6_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'zita_h6_letter_spacing', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_h6_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'zita' ),
                    'section'     => 'zita-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}

/****************/
//font subset doc link
/****************/
$wp_customize->add_setting('zita_font_subset_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_font_subset_more',
            array(
        'section'     => 'zita-base-typography-font-subset',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/font-subset/', 'font-subset' ) ) ),
        'priority'   =>30,
    )));

/****************/
//body doc link
/****************/
$wp_customize->add_setting('zita_body_font_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_body_font_more',
            array(
        'section'     => 'zita-base-typography-body-font',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/base-typography/', 'base-typography' ) ) ),
        'priority'   =>30,
    )));