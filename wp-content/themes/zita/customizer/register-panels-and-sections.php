<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */

/*************************/
/*Wordpress Default Panel*/
/*************************/
$zita_panel_default = new Zita_WP_Customize_Panel( $wp_customize,'zita-panel-default', array(
    'priority' => 5,
    'title'    => __( 'WordPress Default', 'zita' ),
  ));
$wp_customize->add_panel($zita_panel_default);

$wp_customize->get_section( 'title_tagline' )->panel = 'zita-panel-default';
$wp_customize->get_section( 'static_front_page' )->panel = 'zita-panel-default';
$wp_customize->get_section( 'custom_css' )->panel = 'zita-panel-default';
/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'zita-panel-layout', array(
				'priority' => 21,
				'title'    => __( 'Layout', 'zita' ),
			) );
//conatiner section
$wp_customize->add_section('zita-conatiner', array(
        'title'    => __('Container', 'zita'),
        'panel'    => 'zita-panel-layout',
        'priority' => 1,
));
$zita_section_header_group = new Zita_WP_Customize_Section( $wp_customize, 'zita-section-header-group', array(
    'title' =>  __( 'Header', 'zita' ),
    'panel' => 'zita-panel-layout',
    'priority' => 1,
  ));
$wp_customize->add_section( $zita_section_header_group );
$zita_section_sidebar_group = new Zita_WP_Customize_Section( $wp_customize,'zita-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'zita' ),
    'panel' => 'zita-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($zita_section_sidebar_group);
$zita_section_blog_group = new Zita_WP_Customize_Section( $wp_customize,'zita-section-blog-group', array(
    'title' =>  __( 'Blog', 'zita' ),
    'panel' => 'zita-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($zita_section_blog_group);
$zita_section_footer_group = new Zita_WP_Customize_Section( $wp_customize, 'zita-section-footer-group', array(
    'title' =>  __( 'Footer', 'zita' ),
    'panel' => 'zita-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $zita_section_footer_group);
// above-header
$zita_above_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-above-header', array(
    'title'    => __( 'Above Header', 'zita' ),
    'panel'    => 'zita-panel-layout',
        'section'  => 'zita-section-header-group',
        'priority' => 1,
  ));
$wp_customize->add_section( $zita_above_header );
// main-header
$zita_main_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-main-header', array(
    'title'    => __( 'Main Header', 'zita' ),
    'panel'    => 'zita-panel-layout',
		'section'  => 'zita-section-header-group',
		'priority' => 5,
  ));
$wp_customize->add_section( $zita_main_header );
// bottom-header
$zita_main_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-bottom-header', array(
    'title'    => __( 'Below Header', 'zita' ),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-header-group',
    'priority' => 5,
  ));
$wp_customize->add_section( $zita_main_header );
// sticky-header
$zita_sticky_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-sticky-header', array(
    'title'    => __( 'Sticky Header', 'zita' ),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-header-group',
    'priority' => 5,
  ));
$wp_customize->add_section($zita_sticky_header);
// transparent-header
$zita_transparent_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-transparent-header', array(
    'title'    => __( 'Transparent Header', 'zita' ),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-header-group',
    'priority' => 6,
  ));
$wp_customize->add_section($zita_transparent_header);

$zita_page_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-page-header', array(
    'title'    => __( 'Page Header', 'zita' ),
    'panel'    => 'zita-panel-layout',
        'section'  => 'zita-section-header-group',
        'priority' => 7,
  ));
$wp_customize->add_section( $zita_page_header );
//**********************//
//blog/archive
//**********************//
$zita_blog_archive = new Zita_WP_Customize_Section( $wp_customize, 'zita-blog-archive', array(
    'title'    => __( 'Blog/Archive', 'zita' ),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-blog-group',
    'priority' => 1,
  ));
$wp_customize->add_section( $zita_blog_archive );
//**********************//
//blog single
//**********************//
$zita_blog_single = new Zita_WP_Customize_Section( $wp_customize, 'zita-blog-single', array(
    'title'    => __( 'Single Post', 'zita' ),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-blog-group',
    'priority' => 2,
  ));
$wp_customize->add_section( $zita_blog_single );
//**********************//
//social icon 
//**********************//     
$zita_social_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-social-icon', array(
    'title'    => __( 'Social Icon', 'zita' ),
    'priority' => 28,
  ));
$wp_customize->add_section( $zita_social_header );
//**********************//
//search icon 
//**********************//     
$zita_search_header = new Zita_WP_Customize_Section( $wp_customize, 'zita-search', array(
    'title'    => __( 'Search', 'zita' ),
    'priority' => 29,
  ));
$wp_customize->add_section( $zita_search_header );
$zita_search_icon = new Zita_WP_Customize_Section( $wp_customize, 'zita-search-icon', array(
    'title'    => __( 'Search Icon', 'zita' ),
    'section'  => 'zita-search',
    'priority' => 1,
  ));
$wp_customize->add_section($zita_search_icon);
$zita_search_box = new Zita_WP_Customize_Section( $wp_customize, 'zita-search-box', array(
    'title'    => __('Search Box', 'zita' ),
    'section'  => 'zita-search',
    'priority' => 2,
  ));
$wp_customize->add_section($zita_search_box);
//widget footer
$zita_widget_footer = new Zita_WP_Customize_Section($wp_customize,'zita-widget-footer', array(
    'title'    => __('Footer Widget','zita'),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $zita_widget_footer);
//Bottom footer
$zita_bottom_footer = new Zita_WP_Customize_Section($wp_customize,'zita-bottom-footer', array(
    'title'    => __('Bottom Footer','zita'),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $zita_bottom_footer);
//**************************//
//Footer Area
//**************************//
//above-footer
$zita_above_footer = new Zita_WP_Customize_Section( $wp_customize, 'zita-above-footer',array(
    'title'    => __( 'Above Footer','zita' ),
    'panel'    => 'zita-panel-layout',
        'section'  => 'zita-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $zita_above_footer);
//widget footer
$zita_widget_footer = new Zita_WP_Customize_Section($wp_customize,'zita-widget-footer', array(
    'title'    => __('Widget Footer','zita'),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $zita_widget_footer);
//Bottom footer
$zita_bottom_footer = new Zita_WP_Customize_Section($wp_customize,'zita-bottom-footer', array(
    'title'    => __('Below Footer','zita'),
    'panel'    => 'zita-panel-layout',
    'section'  => 'zita-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $zita_bottom_footer);
//*****************//
// scroll to top
//*****************//
$wp_customize->add_section('zita-scroll-to-top-section', array(
        'title'    => __('Scroll To Top', 'zita'),
        'panel'    => 'zita-panel-layout',
        'priority' => 5,
));
/****************************/
/*Color and Background Panel*/
/****************************/
// section gloab color and background
/****************************/
/*Color and Background Panel*/
/****************************/
$wp_customize->add_panel( 'zita-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Color & Background', 'zita' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('zita-gloabal-color', array(
    'title'    => __('Global Colors', 'zita'),
    'panel'    => 'zita-panel-color-background',
    'priority' => 1,
));
// Section Hamburger Color
$wp_customize->add_section('zita-hamburger-color', array(
    'title'    => __('Hamburger Colors', 'zita'),
    'panel'    => 'zita-panel-color-background',
    'priority' => 2,
));

$wp_customize->add_section('zita-pro-colorSection', array(
    'title'    => __('Advanced Premium Colors Options', 'zita'),
    'panel'    => 'zita-panel-color-background',
    'priority' => 1,
));
/*********************/
// Typography
/*********************/
$wp_customize->add_panel( 'zita-base-typography', array(
        'priority' => 23,
        'title'    => __( 'Typography', 'zita' ),
) );
/****************************/
/*Site Button*/
/****************************/
$wp_customize->add_section('zita-site-button', array(
    'title'    => __('Site Button', 'zita'),
    'priority' => 23,
));
/****************************/
/*Pre-loader*/
/****************************/
$wp_customize->add_section('zita-pre-loader', array(
    'title'    => __('Pre Loader', 'zita'),
    'priority' => 24,
));
/*******************/
//Typograpgy
/*******************/
$zita_base_typography_font_subset = new Zita_WP_Customize_Section( $wp_customize,'zita-base-typography-font-subset', array(
    'title'      => __('Font Subset', 'zita'), 
    'panel'      => 'zita-base-typography',
    'priority'   => 1,
));
$wp_customize->add_section($zita_base_typography_font_subset);
$zita_base_typography_base_typo = new Zita_WP_Customize_Section( $wp_customize,'zita-base-typography-base-typo', array(
    'title'      => __('Base Typography', 'zita' ), 
    'panel'      => 'zita-base-typography',
    'priority'   => 2,
  ));
$wp_customize->add_section($zita_base_typography_base_typo);
$zita_base_typography_body_font = new Zita_WP_Customize_Section( $wp_customize,'zita-base-typography-body-font', array(
    'title'      => __('Body', 'zita' ), 
    'panel'      => 'zita-base-typography',
    'section'    => 'zita-base-typography-base-typo',
    'priority'   => 1,
  ));
$wp_customize->add_section($zita_base_typography_body_font);
$zita_base_typography_heading = new Zita_WP_Customize_Section( $wp_customize,'zita-base-typography-heading', array(
    'title'      => __('Title', 'zita' ), 
    'panel'      => 'zita-base-typography',
    'section'    => 'zita-base-typography-base-typo',
    'priority'   => 2,
  ));
$wp_customize->add_section($zita_base_typography_heading);
$zita_base_typography_content = new Zita_WP_Customize_Section( $wp_customize,'zita-base-typography-content', array(
    'title'      => __('Content', 'zita' ), 
    'panel'      => 'zita-base-typography',
    'section'    => 'zita-base-typography-base-typo',
    'priority'   => 3,
  ));
$wp_customize->add_section($zita_base_typography_content);


$wp_customize->add_section('zita-imp-link-section', array(
        'title'    => __('Important Links', 'zita'),
        'priority' => 30,
));

$zita_base_typography_pro = new Zita_WP_Customize_Section( $wp_customize,'zita-base-typography-pro', array(
    'title'      => __('Premium Typography (Pro)', 'zita' ), 
    'panel'      => 'zita-base-typography',
    'priority'   => 2,
  ));
$wp_customize->add_section($zita_base_typography_pro);

// Pro feature List

if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_typography_pro_list', array(
                'default'           => 'headerPro',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_typography_pro_list', array(
                    'label'    => esc_html__( 'A lot of Pro Typography Features (Pro)', 'zita' ),
                    'section'  => 'zita-base-typography-pro',
                    'priority'   => 108,
                    'choices'  => array(
                        'headerPro'   => array(
                            'url' => ZITA_TYPOGRAPHY_PRO,
                        ),       
                    ),
                )
            )
        );
}

$wp_customize->add_setting('zita_typography_pro_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_typography_pro_more',
            array(
        'section'     => 'zita-base-typography-pro',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( '<a target="_blank" href="%s">Get Pro</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_pro_link', zita_get_pro_url( 'https://themehunk.com/zita-pro-wordpress-theme/' ) )),
         'priority'   =>50,
    )));