<?php 
/**
 * @package ciyguytheme
 * 
 * Footer template
 */
?>
</div>
<footer>
    <section class="navigation">
        <h2>Navigation</h2>
        <?php wp_nav_menu(array(
            'theme_location' => 'ciy-footer'
        ));
        ?>
    </section>
    <section class="navigation">
        <h2>Social</h2>
        <ul>
            <li><a href="<?php echo get_theme_mod('social_media_youtube', 'Youtube link here!'); ?>">YouTube</a></li>
            <li><a href="<?php echo get_theme_mod('social_media_pinterest', 'Pinterest link here!'); ?>">Pinterest</a></li>
            <li><a href="<?php echo get_theme_mod('social_media_twitter'); ?>">Twitter</a></li>
            <li><a href="<?php echo get_theme_mod('social_media_instagram', 'Instagram handler here!'); ?>">Instagram</a></li>
        </ul>
    </section>
    <section class="copyright">
        <h4>The Code It Yourself Guy</h4>
        <p>All rights reserved &copy; 2019</p>
    </section>
</footer>
<?php wp_footer(); ?>
    </body>
</html>