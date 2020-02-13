<?php
    /**
     * @package ciyguytheme
     * 
     * Front Page Template
     */
    ciy_subscriber_form();
    get_header();
?>
<!-- The header image -->
<header class="showcase">
    <div class="container showcase-inner">
    <h2><?php echo get_theme_mod('alluring_text', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit laboriosam repellendus provident animi accusantium eveniet!'); ?></h2>
    <a class="btn" href="<?php echo get_theme_mod('button_url', 'http://www.yoururl.com'); ?>"><?php echo get_theme_mod('button_text', 'Read More'); ?></a>
    </div>
</header>
<!-- Main Page subscribe and ad -->
<div class="container">
    <section class="show-posts">
        <div class="card">
            <div class="subscribe-card">
                <div class="subscribe-headers">
                    <h2>The Code It Yourself Guy</h2>
                    <p>Learn how to code things yourself!</p>
                </div>
                <div class="subscibe-card-form">
                    <h5>Subscribe below</h5>
                    <form action="" method="POST">
                        <input type="email" name="subscriber_email" class="subscribe-field" placeholder="you@email.com" require="required">
                        <input type="submit" name="submit_form" value="Subscribe" class="btn-submit">
                        <input type="hidden" name="kv_submit_subscription" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="advertiser-card" style="background-image: url(<?php echo get_theme_mod('ad_image', get_template_directory_uri() . '/img/phone-advertisement.jpg'); ?>);">
                <h2><?php echo get_theme_mod('ad_slogan', 'Your sales slogan here!'); ?></h2>
                <p><?php echo get_theme_mod('sales_text', 'Put some more Alluring text here'); ?></p>
                <a href="<?php echo get_theme_mod('sales_button_url', 'www.yoururl.com'); ?>" class="ad-button"><?php echo get_theme_mod('sales_button_text', 'Shop Now'); ?></a>
                <a href="mailto:<?php echo get_theme_mod('link_to_advertise_email', 'advertise@ciyguy.com') ?>" class="ad-warning"><?php echo get_theme_mod('link_to_advertise', 'Advertise'); ?></a>
            </div>
        </div>

        <?php if(have_posts()):
            while(have_posts()) : the_post();
        ?>
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
        <?php endwhile; 
            
            endif;
            
        ?>
        
    </section>
    <?php
        global $wp_query;
        if($wp_query->max_num_pages > 1){
            echo '<div class="ciy_loadmore">Load More Posts</div>';
        }
            
        
        wp_reset_postdata();
    ?>
    <section class="subscribe">
        <section class="subscribe-text">
            <h4>Subscribe for exclusive updates</h4>
            <p>Don't miss our new tutorials and updates.</p>
        </section>
        <section class="form-subscribe-footer">
            <h5>Subscribe Here</h5>
            <form action="" method="POST">
                <input type="email" name="subscriber_email" class="subscribe-form" placeholder="your@email.com" require="required">
                        <input type="submit" name="submit_form" value="Subscribe" class="btn-submit">
                        <input type="hidden" name="kv_submit_subscription" value="Subscribe">
            </form>
        </section>
    </section>

<?php get_footer(); ?>

