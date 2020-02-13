<?php

/**
 * @package ciyguytheme
 * 
 * Enqueue all your files here
 */

function load_scripts($hook){
    global $wp_query;
    wp_enqueue_style('ciyguytheme_style', get_template_directory_uri() . '/css/ciyguytheme.style.css', array(), '1.0.0', 'all');
    wp_enqueue_script('my_font_awesome', 'https://kit.fontawesome.com/a6659bdbd6.js');
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Lato&display=swap', false);

    wp_enqueue_script('jquery');
    wp_register_script('mainjs', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'));

    wp_localize_script('mainjs', 'ciy_loadmore_params', array(
        'ajaxurl'   => site_url() . '/wp-admin/admin-ajax.php',
        'posts'     => json_encode($wp_query->query_vars),
        'current_page'  => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page'  => $wp_query->max_num_pages
    ));
    wp_enqueue_script('mainjs');
}
add_action('wp_enqueue_scripts', 'load_scripts');