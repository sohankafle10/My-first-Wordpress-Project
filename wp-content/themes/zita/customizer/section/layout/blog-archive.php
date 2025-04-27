<?php
/**
 *Blog Option
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/********************/
// Blog layout
/********************/
if(class_exists('Zita_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'zita_blog_layout', array(
                'default'           => 'zta-blog-layout-1',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_blog_layout', array(
                    'label'    => esc_html__( 'Blog Layout', 'zita' ),
                    'section'  => 'zita-blog-archive',
                    'choices'  => array(   
                        'zta-blog-layout-1' => array(
                            'url' => ZITA_BLOG_ARCHIVE_LAYOUT_1,
                        ),
                        
                    ),
                    'priority'   =>1,
                )
            )
        );
    } 
    /*********************/
    //Grid-layout
    /*********************/
    $wp_customize->add_setting('zita_blog_grid_layout', array(
        'default'          =>'zta-one-colm',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('zita_blog_grid_layout', array(
        'settings'=> 'zita_blog_grid_layout',
        'label'   => __('Grid Layout','zita'),
        'section' => 'zita-blog-archive',
        'type'    => 'select',
        'choices' => array(
        'zta-one-colm'     => __('One Column','zita'),
        'zta-two-colm'     => __('Two Column','zita'),
        'zta-three-colm'   => __('Three Column (Pro) ','zita'),
        'zta-four-colm'    => __('Four Column (Pro) ','zita'), 
        ),
         'priority'   =>2,
    ));
    // Highlight first image
    $wp_customize->add_setting( 'zita_blog_highlight', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_blog_highlight', array(
                'label'       => esc_html__('Make First Post Large (Pro)', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_blog_highlight',
                 'priority'   =>3,
            ) ) );
    
    // add Space b/w post
    $wp_customize->add_setting( 'zita_blog_add_space', array(
                'default'           => true,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_blog_add_space', array(
                'label'       => esc_html__('Add Space Between Post', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_blog_add_space',
                 'priority'   =>4,
            ) ) );
    // add Space b/w post
    $wp_customize->add_setting( 'zita_blog_img_rmv_space', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_blog_img_rmv_space', array(
                'label'       => esc_html__('Remove Featured Image Space
','zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_blog_img_rmv_space',
                 'priority'   =>5,
            ) ) );
    //date box
    $wp_customize->add_setting( 'zita_date_box', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_date_box', array(
                'label'       => esc_html__('Enable Date Box', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_date_box',
                 'priority'   =>6,
            ) ) );
    // Date box style
    $wp_customize->add_setting('zita_datebox_style', array(
        'default'        => 'square',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('zita_datebox_style', array(
        'settings' => 'zita_datebox_style',
        'label'   => __('Blog Date','zita'),
        'section' => 'zita-blog-archive',
        'type'    => 'select',
        'choices'    => array(
        'square'   => __('Square','zita'),
        'circle' => __('Circle','zita'), 
        'diamond' => __('Diamond','zita'), 
        ),
         'priority'   =>7,
    ));
    //enable dropcap
    $wp_customize->add_setting( 'zita_blog_dropcap', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_blog_dropcap', array(
                'label'       => esc_html__('Enable Drop Cap', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_blog_dropcap',
                 'priority'   =>8,
            ) ) );
    /*******************/
    //blog post content
    /*******************/
    $wp_customize->add_setting('zita_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('zita_blog_post_content', array(
        'settings' => 'zita_blog_post_content',
        'label'   => __('Blog Post Content','zita'),
        'section' => 'zita-blog-archive',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','zita'),
        'excerpt' => __('Excerpt Content','zita'), 
        'nocontent' => __('No Content','zita'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('zita_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'zita_sanitize_number',
		)
	);
	$wp_customize->add_control('zita_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'zita-blog-archive',
			'label'       => __( 'Excerpt Length', 'zita' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('zita_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'zita_sanitize_text',
            'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control('zita_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'zita-blog-archive',
			'label'       => __( 'Read More Text', 'zita' ),
			'settings' => 'zita_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
	// display read more as a button
    $wp_customize->add_setting( 'zita_main_read_more_btn', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_main_read_more_btn', array(
                'label'       => esc_html__('Display Read More as Button', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_main_read_more_btn',
                 'priority'   =>12,
            ) ) );
    // display read more as a button
    $wp_customize->add_setting( 'zita_main_read_more_btn_excert_optional', array(
                'default'           => false,
                'sanitize_callback' => 'zita_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zita_main_read_more_btn_excert_optional', array(
                'label'       => esc_html__('Enable Post Editor Excerpt', 'zita'),
                'type'        => 'checkbox',
                'section'     => 'zita-blog-archive',
                'settings'    => 'zita_main_read_more_btn_excert_optional',
                 'priority'   =>12,
            ) ) );
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('zita_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('zita_blog_post_pagination', array(
        'settings' => 'zita_blog_post_pagination',
        'label'   => __('Post Pagination','zita'),
        'section' => 'zita-blog-archive',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','zita'),
        'click'   => __('Load More (Pro)','zita'), 
        'scroll'  => __('Infinite Scroll (Pro)','zita'), 
        ),
        'priority'   =>13,
    ));
    //load more text
    $wp_customize->add_setting('zita_load_more_txt', array(
            'default'           =>'More Posts',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'zita_sanitize_text',
        )
    );
    $wp_customize->add_control('zita_load_more_txt', array(
            'type'        => 'text',
            'section'     => 'zita-blog-archive',
            'label'       => __( 'Load More Text', 'zita' ),
            'settings' => 'zita_load_more_txt',
             'priority'   =>14,
            
        )
    );
    //blog title & meta ordering
     $wp_customize->add_setting(
        ZITA_THEME_SETTINGS . '[zita-blog-structure-meta]', array(
            'default'           =>zita_get_option('zita-blog-structure-meta'),
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Zita_Control_Sortable(
            $wp_customize, ZITA_THEME_SETTINGS . '[zita-blog-structure-meta]', array(
                'type'     => 'zta-sortable',
                'section'  => 'zita-blog-archive',
                'label'    => __( 'Blog Structure', 'zita' ),
                'choices'  => array(
                    'image'  => __( 'Featured Image', 'zita' ),
                    'title'  => __( 'Post Title & Meta', 'zita' ),  
                ),
                 'priority'   =>15,
            )
        )
    );
    //blog meta odering
     $wp_customize->add_setting(
        ZITA_THEME_SETTINGS . '[zita-blog-meta]', array(
            'default'           =>zita_get_option('zita-blog-meta'),
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Zita_Control_Sortable(
            $wp_customize, ZITA_THEME_SETTINGS . '[zita-blog-meta]', array(
                'type'     => 'zta-sortable',
                'section'  => 'zita-blog-archive',
                'label'    => __( 'Blog Meta', 'zita' ),
                'choices'  => array(
                    'comments'  => __( 'Comments', 'zita' ),
                    'category'  => __( 'Category', 'zita' ),
                    'author'    => __( 'Author', 'zita' ),
                    'date'      => __( 'Publish Date', 'zita' ),
                ),
                 'priority'   =>16,
            )
        )
    );
    //post meta seprator
    $wp_customize->add_setting('zita_blog_meta_seprator', array(
            'default'           =>'/',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'zita_sanitize_text',
        )
    );
    $wp_customize->add_control('zita_blog_meta_seprator', array(
            'type'        => 'text',
            'section'     => 'zita-blog-archive',
            'label'       => __( 'Post Meta Separator', 'zita' ),
            'settings' => 'zita_blog_meta_seprator',
             'priority'   =>17,
            
        )
    );
    /*********************/
    //blog content width
    /*********************/
    $wp_customize->add_setting('zita_blog_content_width', array(
        'default'          =>'defualt',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('zita_blog_content_width', array(
        'settings'=> 'zita_blog_content_width',
        'label'   => __('Blog Content Width','zita'),
        'section' => 'zita-blog-archive',
        'type'    => 'select',
        'choices' => array(
        'defualt'    => __('Default','zita'),
        'custom' => __('Custom','zita'), 
        ),
         'priority'   =>18,
    ));
    if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_blog_cnt_widht', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '1200',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_blog_cnt_widht', array(
                    'label'       => esc_html__( 'Enter Width in px', 'zita' ),
                    'section'     => 'zita-blog-archive',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                     'priority'   =>19,
                )
        )
);
}
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('zita_blog_arch_learn_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_blog_arch_learn_more',
            array(
        'section'     => 'zita-blog-archive',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/blog-archive/', 'blog-archive' ) )),
         'priority'   =>30,
    )));