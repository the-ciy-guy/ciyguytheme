<?php
/**
 * @package ciyguytheme
 * 
 * Template Name: Tutorials
 * 
 * Page Template
 */
get_header();

if(have_posts()):
    while(have_posts()) : the_post();
?>
<header class="header_image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)";>
     <h2><?php single_post_title(); ?></h2>
</header>

<div class="container_pages">
    <?php 
        ciy_latest_post();
        
        category_list();
    ?>
    
</div>

<?php 
    endwhile;
    endif;
get_footer(); ?>