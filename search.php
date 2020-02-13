<?php

/**
 * @package ciyguytheme
 * 
 * Search Results
 */
get_header(); 

if(get_header_image()) :
?>

    <header class="header_image" style="background-image: url(<?php echo get_theme_mod('image_category', get_template_directory_uri() . '/img/phone-advertisement.jpg'); ?>)";>
        <h2><?php printf( __( 'Results for %s:', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
<?php endif; ?>   
    </header>


<div class="container_pages">
    <div class="search_list">
        <?php search_results(); ?>
        <div class="search_pagination">
            <?php echo paginate_links(array(
                'posts_per_page' => 3 
                )); 
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>