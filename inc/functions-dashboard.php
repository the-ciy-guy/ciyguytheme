<?php

/**
 * @package ciyguytheme
 * 
 * All functions for the dashboard, customizer etc.
 */

// Remove the wordpress version number
function name_remove_version(){
    return '';
}
add_filter('the_generator', 'name_remove_version');

//  Add Custom Navigation Bar
function add_navbar(){
    register_nav_menus(
        array(
            'ciy-navbar'    => __('CIY Navbar'),
            'ciy-footer'    => __('CIY Footer Navbar')
        )
        );
}
add_action('init', 'add_navbar');

// Customizer
function ciy_customizer_options($wp_customize){
    $wp_customize->add_section('custom_header', array(
        'title'         => __('Header Section', 'ciyguytheme'),
        'description'   => sprintf(__('Customize Your Header Section')),
        'priority'      => 220
    ));

    $wp_customize->add_setting('header_image', array(
        'default'   => get_template_directory_uri() . '/img/coder.jpg',
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image', array(
        'label'     => __('Header Image', 'ciyguytheme'),
        'section'   => 'custom_header',
        'settings'  => 'header_image',
        'priority'  => 1
    )));

    // Add alluring text
    $wp_customize->add_setting('alluring_text', array(
        'default'   => _x('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit laboriosam repellendus provident animi accusantium eveniet!', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('alluring_text', array(
        'label'     => __('Alluring Text', 'ciyguytheme'),
        'section'   => 'custom_header',
        'type'      => 'textarea',
        'priority'  => 2
    ));

    // CTA Button Text
    $wp_customize->add_setting('button_text', array(
        'default'   => _x('Read More', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('button_text', array(
        'label'     => __('CTA Text', 'ciyguytheme'),
        'section'   => 'custom_header',
        'priority'  => 3
    ));

    // CTA Button URL
    $wp_customize->add_setting('button_url', array(
        'default'   => _x('http://www.yoururl.com', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('button_url', array(
        'label'     => __('CTA URL', 'ciyguytheme'),
        'section'   => 'custom_header',
        'priority'  => 4
    ));
    
    // Advertiser section
    $wp_customize->add_section('ad_section', array(
        'title'         => __('Advertiser Section', 'ciyguytheme'),
        'description'   => sprintf(__('Add advertiser here')),
        'priority'      => 230
    ));

    $wp_customize->add_setting('ad_image', array(
        'default'   => get_template_directory_uri() . '/img/phone-advertisement.jpg',
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ad_image', array(
        'label'     => __('Ad Image', 'ciyguytheme'),
        'section'   => 'ad_section',
        'settings'  => 'ad_image'  ,
        'priority'  => 1
    )));

    // Ad Slogan
    $wp_customize->add_setting('ad_slogan', array(
        'default'   => _x('Your sales slogan here!', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('ad_slogan', array(
        'label'     => __('Ad Slogan', 'ciyguytheme'),
        'section'   => 'ad_section',
        'priority'  => 2
    ));

    // Short Sales Text
    $wp_customize->add_setting('sales_text', array(
        'default'   => _x('Put some more Alluring text here', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('sales_text', array(
        'label'     => __('Sales Text', 'ciyguytheme'),
        'section'   => 'ad_section',
        'type'      => 'textarea',
        'priority'  => 3
    ));

    // Sales Button
    $wp_customize->add_setting('sales_button_text', array(
        'default'   => _x('Shop Now', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('sales_button_text', array(
        'label'     => __('Sales Button Text', 'ciyguytheme'),
        'section'   => 'ad_section',
        'priority'  => 4
    ));

    // Sales Button Url
    $wp_customize->add_setting('sales_button_url', array(
        'default'   => _x('www.yoururl.com', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('sales_button_url', array(
        'label'     => __('Button Url', 'ciyguytheme'),
        'section'   => 'ad_section',
        'priority'  => 5
    ));

    // Link to advertise
    $wp_customize->add_setting('link_to_advertise', array(
        'default'   => _x('Advertise', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('link_to_advertise', array(
        'label'     => __('Advertise', 'ciyguytheme'),
        'section'   => 'ad_section',
        'priority'  => 6
    ));

    // Link to advertise email
    $wp_customize->add_setting('link_to_advertise_email', array(
        'default'   => _x('advertise@ciyguy.com', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('link_to_advertise_email', array(
        'label'     => __('Email', 'ciyguytheme'),
        'section'   => 'ad_section',
        'priority'  => 7
    ));

    // Social Media Links, prefilled titles in footer.php
    $wp_customize->add_section('social_media_links', array(
        'title'         => __('Social Media Links', 'ciyguytheme'),
        'description'   => sprintf(__('Add Your Social Media Links')),
        'priority'      => 240
    ));

    $wp_customize->add_setting('social_media_youtube', array(
        'default'   => _x('Youtube link here!', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('social_media_youtube', array(
        'label'     => __('YouTube', 'ciyguytheme'),
        'section'   => 'social_media_links',
        'priority'  => 1
    ));

    $wp_customize->add_setting('social_media_pinterest', array(
        'default'   => _x('Pinterest link here!', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('social_media_pinterest', array(
        'label'     => __('Pinterest', 'ciyguytheme'),
        'section'   => 'social_media_links',
        'priority'  => 2
    ));

    $wp_customize->add_setting('social_media_twitter', array(
        'default'   => _x('Twitter handler here!', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('social_media_twitter', array(
        'label'     => __('Twitter', 'ciyguytheme'),
        'section'   => 'social_media_links',
        'priority'  => 3
    ));

    $wp_customize->add_setting('social_media_instagram', array(
        'default'   => _x('Instagram handler here!', 'ciyguytheme'),
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('social_media_instagram', array(
        'label'     => __('Instagram', 'ciyguytheme'),
        'section'   => 'social_media_links',
        'priority'  => 4
    ));

    // Header image category page
    $wp_customize->add_section('header_image_category', array(
        'title'         => __('Header Image Category Page', 'ciyguytheme'),
        'description'   => sprintf(__('Add Header Image on Category Page')),
        'priority'      => 250
    ));

    $wp_customize->add_setting('image_category', array(
        'default'   => get_template_directory_uri() . '/img/phone-advertisement.jpg',
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_category', array(
        'label'     => __('Header Image Category', 'ciyguytheme'),
        'section'   => 'header_image_category',
        'settings'  => 'image_category',
        'priority'  => 1
    )));

    // Logo
    $wp_customize->add_section('ciy_logo', array(
        'title'         => __('Logo', 'ciyguytheme'),
        'description'   => sprintf(__('Add Your Logo')),
        'priority'      => 260
    ));

    $wp_customize->add_setting('logo_ciy', array(
        'default'   => '',
        'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_ciy', array(
        'label'     => __('Logo', 'ciyguytheme'),
        'section'   => 'ciy_logo',
        'settings'  => 'logo_ciy',
        'priority'  => 1
    )));
}
add_action('customize_register', 'ciy_customizer_options');


// Custom Post Type
function ciy_advertiser_post_type(){
    register_post_type('Advertiser', array(
        'labels'    => array(
            'name'  => __('Advertisers'),
            'singular_name' => __('Advertiser'),
            'add_new'       => __('Add new Advertiser'),
            'add_new_item'  => __('Add New Advertiser'),
            'edit_item'     => __('Edit Advertiser'),
            'search_item'   => __('Search Examples')
        ),
        'menu_position'         => 5,
        'public'                => true,
        'show_in_rest'          => true,
        'exclude_from_search'   => false,
        'has_archive'           => false,
        'register_meta_box_cd'  => 'example_metabox',
        'supports'              => array(
            'title', 'editor', 'thumbnail'
        )
    ));
}
add_action('init', 'ciy_advertiser_post_type');

// Show Advertiser post
function get_advertiser_post_type(){
    $args = array(
        'post_type' => 'advertiser',
    );
    $advertiserPosts = get_posts($args);

    // String to return
    $content = '';

    foreach($advertiserPosts as $key=>$val){
        $content .= '<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Image">';
        $content .= the_content();
    }
    return $content;
}

