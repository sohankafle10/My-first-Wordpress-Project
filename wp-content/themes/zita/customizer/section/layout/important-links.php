<?php
/**
 * Importants Links For Zita Theme.
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
/****************/
//support link
/****************/
$wp_customize->add_setting('zita_review_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_review_link_more',
            array(
        'section'     => 'zita-imp-link-section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( '<a target="_blank" href="%s">Review</a>', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wordpress.org/support/theme/zita/reviews/#new-post', 'review' ) )),
         'priority'   =>1,
    )));

/****************/
//Support link
/****************/
$wp_customize->add_setting('zita_support_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_support_link_more',
            array(
        'section'     => 'zita-imp-link-section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( '<a target="_blank" href="%s">Support</a>', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/support/', 'support' ) )),
         'priority'   =>2,
    )));



/****************/
//Doc link
/****************/
$wp_customize->add_setting('zita_doc_link_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_doc_link_more',
            array(
        'section'     => 'zita-imp-link-section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( '<a target="_blank" href="%s">Document</a>', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/', 'doc' ) )),
         'priority'   =>3,
 )));