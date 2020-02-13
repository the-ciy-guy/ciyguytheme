<?php
/**
 * @package ciyguytheme
 * 
 * Header Template
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta <?php bloginfo('charset') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <style type="text/css">
        .showcase:before {background-image: url(<?php echo get_theme_mod('header_image', get_template_directory_uri() . '/img/coder.jpg'); ?>;}
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="main-nav">
        <input type="checkbox" class="toggler">
        <div class="hamburger"><div></div></div>
        <div class="menu">
            <div>
                <?php
                    wp_nav_menu(
                        array(
                            'ciy-navbar'    => 'CIY Navbar',
                            'menu-class'    => 'ciy-menu',
                        )
                    );
                    
                ?>
            </div>
        </div>
    </div>
    <div class="ciy_logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod('logo_ciy'); ?>"></a>
    </div>
    <div class="search_overlay">
        <input type="checkbox" class="toggler">
        <div class="search-icon"><div></div><i class="fas fa-search"></i></div>
        <div class="search-form">
            <div>
                <div>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
    

    