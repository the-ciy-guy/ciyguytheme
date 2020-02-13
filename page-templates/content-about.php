<?php
/**
 * @package ciyguytheme
 * 
 * Template Name: About Page
 * 
 * Page Template
 */
get_header();
?>

<?php if(have_posts()):
    while(have_posts()) : the_post();
?>    
<header class="header_image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)";>
    <h2><?php single_post_title(); ?></h2>
</header>

<div class="container_pages">
    <div class="post-description">
        <?php the_content(); ?>
    </div>
    
</div>

<?php endwhile;
    endif;
?>    

<?php get_footer(); ?>