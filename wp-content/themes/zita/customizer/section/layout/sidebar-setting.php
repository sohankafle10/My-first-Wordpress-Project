<?php
/**
 *Sidebar Options for Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/********************/
// default layout
/********************/
$wp_customize->add_setting('zita_sidebar_default_layout', array(
        'default'        => 'right',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control( 'zita_sidebar_default_layout', array(
        'settings' => 'zita_sidebar_default_layout',
        'label'   => __('Default Layout','zita'),
        'section' => 'zita-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'no-sidebar'   => __('No Sidebar','zita'),
        'left' => __('Left Sidebar','zita'),
        'right'=> __('Right Sidebar','zita'),    
        ),
        'priority'   => 1,
));
/********************/
// page layout
/********************/
$wp_customize->add_setting('zita_sidebar_page_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_sidebar_page_layout', array(
        'settings' => 'zita_sidebar_page_layout',
        'label'   => __('Page Layout','zita'),
        'section' => 'zita-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'default'   => __('Default','zita'),
        'no-sidebar'   => __('No Sidebar','zita'),
        'left' => __('Left Sidebar','zita'),
        'right'=> __('Right Sidebar','zita'),    
        ),
        'priority'   => 3,
));
/********************/
// blog page layout
/********************/
$wp_customize->add_setting('zita_sidebar_blog_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_sidebar_blog_layout', array(
        'settings' => 'zita_sidebar_blog_layout',
        'label'   => __('Blog Layout','zita'),
        'section' => 'zita-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'default'   => __('Default','zita'),
        'no-sidebar'   => __('No Sidebar','zita'),
        'left' => __('Left Sidebar','zita'),
        'right'=> __('Right Sidebar','zita'),    
        ),
        'priority'   => 4,
));
/********************/
// blog single page layout
/********************/
$wp_customize->add_setting('zita_sidebar_archive_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'zita_sidebar_archive_layout', array(
        'settings' => 'zita_sidebar_archive_layout',
        'label'   => __('Blog Post Archives','zita'),
        'section' => 'zita-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'default'   => __('Default','zita'),
        'no-sidebar'   => __('No Sidebar','zita'),
        'left' => __('Left Sidebar','zita'),
        'right'=> __('Right Sidebar','zita'),    
        ),
        'priority'   => 5,
));
/*********************/
//Sidebar width
/*********************/
if ( class_exists('Zita_WP_Customizer_Range_Value_Control')){
$wp_customize->add_setting(
            'zita_sidebar_width', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '35',
                'transport'         => 'postMessage',
                
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_sidebar_width', array(
                    'label'       => esc_html__( 'Sidebar Width (%)', 'zita' ),
                    'section'     => 'zita-section-sidebar-group',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 15,
                        'max'  => 50,
                        'step' => 1,
                    ),
                    'priority'   => 10,
                )
        )
);
}
/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_sidebar_doc_learn_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_sidebar_doc_learn_more',
            array(
        'section'     => 'zita-section-sidebar-group',
        'type'        => 'custom_message',
        
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/sidebar/', 'sidebar' ) ) ),
         'priority'   =>50,
    )));