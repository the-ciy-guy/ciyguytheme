<?php

/**
 * @package ciyguytheme
 * 
 * All functions for specific pages
 */

//  Show specific categories

function ciy_latest_post(){
    // the query
    $latestPost = new WP_Query('type=post&posts_per_page=1');

    // the loop
    if($latestPost->have_posts()) :
        while($latestPost->have_posts()) : $latestPost->the_post(); ?>
        <div class="latest_post">
            <h1>Latest Post</h1>
            <a href="<?php the_permalink(); ?>">
                <div class="header_image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)";>
            
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                
                </div>
            </a>
        </div>

        <?php 
        endwhile;
    endif;
    // Restore original Post Data
    wp_reset_postdata();
}

function category_list(){
    $args = array(
        'posts_per_page'    => 5
    );
    // A new wp query
    $query = new WP_Query($args);
    $q = array();
    ?>
    <div class="category_list"><?php
    while($query->have_posts()){ 
        
        $query->the_post(); 

        // Assign variables to the categories and post titles
        $a = '<a href="'. get_permalink() .'">' . get_the_title() . '</a>';

        // Get all the categories
        $categories = get_the_category();

        foreach($categories as $key=>$category){
            $b = '<a href="' . get_category_link($category) . '"><h2>' . $category->name . '</h2></a>';

        }
        // multidimensional array
        $q[$b][] = $a;
    }
    wp_reset_postdata();

    // Create a loop to sort your posts after category
    foreach ($q as $key=>$values){
        echo $key;

        echo '<ul>';
            foreach($values as $value){
                echo '<li>' . $value . '</li>';
            }
        echo '</ul>'; 
           
    } ?>
    </div><?php
}

// Single Post Functions
// Next and Previous Posts
function single_post_navigation(){
    $nav    = '<div>';
    $prev   = previous_post_link('<div class="post_link_nav prev"> <<%link</div', '%title');
    $nav    .= '<div class="previous_post">' .$prev . '</div>';
    $next   = next_post_link('<div class="post_link_nav next">%link>></div>', '%title');
    $nav    .= '<div class="next_post">' . $next . '</div>';
    $nav    .= '</div>';

    return $nav;
}

function prev_next_pagination(){
    previous_post_link('<div class="ciy_post_link_nav prev"><span>Previous</span>
    <p>%link</p></div>', '%title', false);
    
    next_post_link('<div class="ciy_post_link_nav next"><span>Next</span>
    <p>%link</p><div>
    ', '%title', false);
    
}

// The excerpt
function custom_excerpt_length($length){
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Search Results
function search_results(){
    global $query_string;
    global $wp_query;
    $query_args = explode("&", $query_string);
    $search_query = array();

    foreach($query_args as $key => $string){
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
    }

    $the_query = new WP_Query($search_query);
    if($the_query->have_posts()) : ?>
        <h3 class="results_heading"><?php printf( __( 'Search Results for %s:', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
        <h3 class="results_heading"><?php echo $wp_query->found_posts.' results found:'; ?></h3>
    <ul>
        <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
        <li>
            <header class="blogpost_picture"><a href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail()) : ?> <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
            <?php endif; ?>
            </a></header>
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="meta_categories">
                <?php echo get_the_category_list(' '); ?>
            </div>
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
            <p class="meta_date">Posted on <?php the_time('F j, Y'); ?></p>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <h4 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
        <p><?php _e('Sorry, no posts matched your criteria!'); ?></p><br>
        <p><?php _e('Try Again!'); ?></p><br>
        <p><?php _e('OR'); ?></p><br>
        <p>Search all the <a href="<?php the_permalink(get_page_by_path('tutorials')); ?>">blogposts</a></p>
    <?php endif;    
}

// Load more posts button
function ciy_loadmore_ajax_handler(){
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts($args); ?>
    <section class="show-posts">
    <?php if(have_posts()) :
        while(have_posts()) : the_post(); ?>
        
        <div class="card">
            <div class="card-image">
                <?php 
                    if(has_post_thumbnail()):
                ?>
                
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Image">
                
                <?php endif; ?>
            
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
            </div>
        </div>
        
<?php
    endwhile;
endif;
die;
?>
   </section> 
<?php    
 
}
add_action('wp_ajax_loadmore', 'ciy_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'ciy_loadmore_ajax_handler');

// https://rudrastyh.com/wordpress/load-more-posts-ajax.html
// https://stackoverflow.com/questions/43393813/is-home-is-front-page-not-working
// https://stackoverflow.com/questions/18694139/wordpress-is-front-page-is-not-working-static-front-page
// https://wordpress.stackexchange.com/questions/125315/style-something-only-on-the-home-page
// https://www.sitepoint.com/conditional-tags-load-styles-and-scripts-in-wordpress/
// https://amethystwebsitedesign.com/add-unique-custom-styles-to-one-wordpress-page-or-post/