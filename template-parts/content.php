<?php
/**
 * @package ciyguytheme
 * 
 * Standard Post Format
 */
if(have_posts()):
while(have_posts()): the_post(); 
?>
<div>
<div class="container_pages">
    <header class="featured-picture"><?php echo get_the_post_thumbnail(); ?></header>
    <article>
        <h2 class="general_title">
            <?php the_title(); ?>
        </h2>
        <div class="meta-blogpost">
            <p>Posted on <?php the_time('F j, Y'); ?>
            in <?php echo get_the_category_list(', '); ?></p>
        </div>
        <div class="post-description">
            <?php the_content(); ?>
        </div>
    </article>
    <div class="post_navigation">
        <?php prev_next_pagination(); ?>
    </div>
</div> 
</div>
<?php endwhile; 
endif;   
wp_reset_postdata(); ?>  
  
 

