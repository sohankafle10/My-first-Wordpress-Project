<?php
/**
 * Blog Single page option
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/*********************/
//Single post content width
/*********************/
    $wp_customize->add_setting('zita_single_post_content_width', array(
        'default'          =>'defualt',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('zita_single_post_content_width', array(
        'settings'=> 'zita_single_post_content_width',
        'label'   => __('Single Post Content Width','zita'),
        'section' => 'zita-blog-single',
        'type'    => 'select',
        'choices' => array(
        'defualt'    => __('Default','zita'),
        'custom' => __('Custom (Pro)','zita'),
        ),
        'priority'   =>1,
    ));
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_sngle_cnt_widht', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1200',
                 'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_sngle_cnt_widht', array(
                    'label'       => esc_html__( 'Enter Width', 'zita' ),
                    'section'     => 'zita-blog-single',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                    'priority'   =>2,
                )
        )
);
}
//blog single title & meta ordering
     $wp_customize->add_setting(
        ZITA_THEME_SETTINGS . '[zita-blog-single-structure-meta]', array(
            'default'           => zita_get_option('zita-blog-single-structure-meta'),
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Zita_Control_Sortable(
            $wp_customize, ZITA_THEME_SETTINGS . '[zita-blog-single-structure-meta]', array(
                'type'     => 'zta-sortable',
                'section'  => 'zita-blog-single',
                'label'    => __( 'Single Post Structure', 'zita' ),
                'choices'  => array(
                    'image'  => __( 'Feature Image', 'zita' ),
                    'title'  => __( 'Post Title & Meta', 'zita' ),  
                ),
                'priority'   =>3,
            )
        )
    );
    //single post meta odering
     $wp_customize->add_setting(
        ZITA_THEME_SETTINGS . '[zita-blog-meta-single]', array(
            'default'           => zita_get_option('zita-blog-meta-single'),
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Zita_Control_Sortable(
            $wp_customize, ZITA_THEME_SETTINGS . '[zita-blog-meta-single]', array(
                'type'     => 'zta-sortable',
                'section'  => 'zita-blog-single',
                'label'    => __( 'Single Post Meta', 'zita' ),
                'choices'  => array(
                    'comments'  => __( 'Comments', 'zita' ),
                    'category'  => __( 'Category', 'zita' ),
                    'author'    => __( 'Author', 'zita' ),
                    'date'      => __( 'Publish Date', 'zita' ),
                ),
                'priority'   =>4,
            )
        )
    );   
 //single post meta seprator
    $wp_customize->add_setting('zita_single_meta_seprator', array(
            'default'           =>'/',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'zita_sanitize_text',
        )
    );
    $wp_customize->add_control('zita_single_meta_seprator', array(
            'type'        => 'text',
            'section'     => 'zita-blog-single',
            'label'       => __( 'Single Post Meta Separator', 'zita' ),
            'settings' => 'zita_single_meta_seprator',
            'priority'   =>5,
            
        )
    );

       // Enable drop cap
    $wp_customize->add_setting( 'zita_single_drop_cap', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_single_drop_cap', array(
                'label'       => esc_html__('Enable Drop Cap', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-single',
                'settings'    => 'zita_single_drop_cap',
                'priority'   =>6,
            ) ) );
// Remove Feature image padding
    $wp_customize->add_setting( 'zita_single_remove_img_pad', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_single_remove_img_pad', array(
                'label'       => esc_html__('Remove Featured Image Padding', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-single',
                'settings'    => 'zita_single_remove_img_pad',
                'priority'    =>7,
            ) ) );
    
    // DISPALY AUTOR BIO
    $wp_customize->add_setting( 'zita_single_authr_bio', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_single_authr_bio', array(
                'label'       => esc_html__('Display Author Info', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-single',
                'settings'    => 'zita_single_authr_bio',
                'priority'    =>9,
            ) ) );
 // Display Related Post
    $wp_customize->add_setting( 'zita_single_related_post', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_single_related_post', array(
                'label'       => esc_html__('Display Related Post', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-single',
                'settings'    => 'zita_single_related_post',
                'priority'    =>10,
            ) ) );
/***********************************/  
// Related post option tag & category
/***********************************/ 
$wp_customize->add_setting('zita_single_related_post_option', array(
                'default'               => 'category',
                'sanitize_callback'     => 'zita_sanitize_select',
            ) );

$wp_customize->add_control( new Zita_Customizer_Buttonset_Control( $wp_customize,'zita_single_related_post_option', array(
                'label'                 => esc_html__( 'Related Post ', 'zita' ),
                'section'               => 'zita-blog-single',
                'settings'              => 'zita_single_related_post_option',
                'choices'               => array(
                    'category'   => esc_html__( 'Category', 'zita' ),
                    'tag'        => esc_html__( 'Tag', 'zita' ),
             ),
                'priority'   =>11,
        ) ) );
/****************/
//single blog doc link
/****************/
$wp_customize->add_setting('zita_blog_learn_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_blog_learn_more',
            array(
        'section'     => 'zita-blog-single',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/single-post/', 'blog-archive' ) ) ),
        'priority'   =>30,
    )));