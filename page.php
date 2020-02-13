<?php
/**
 * @package ciyguytheme
 * 
 * Standard Page Format
 */
get_header();
?>
<?php if(have_posts()) : while(have_posts()) : the_post();
    // Put in what you want to display here.
    the_title();
    the_content();
    endwhile;
else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_footer(); ?>
