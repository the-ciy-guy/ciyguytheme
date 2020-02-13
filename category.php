<?php

/**
 * @package ciyguytheme
 * 
 * Single Category Page
 */
get_header(); 

if(get_header_image()) :
?>

    <header class="header_image" style="background-image: url(<?php echo get_theme_mod('image_category', get_template_directory_uri() . '/img/phone-advertisement.jpg'); ?>)";>
        <h2><?php single_cat_title(); ?></h2>
    </header>

<?php endif; ?>

<div class="container_pages">  
    <div class="search_list">
        <ul>
            <?php
            if(have_posts()):
                while(have_posts()) : the_post(); ?>
                    <li>
                        <header class="blogpost_picture"><a href="<?php the_permalink(); ?>"><?php 
                        if(has_post_thumbnail()): ?>
                    
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Image">
                        <?php endif; ?>
                        </a></header>

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
                        <p class="meta_date">Posted on <?php the_time('F j, Y'); ?></p>
                    </li>
            <?php endwhile; endif; ?>   
        </ul>
    </div> 
</div>
<?php get_footer();
