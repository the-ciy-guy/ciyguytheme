<?php
/**
 * @package ciyguytheme
 * 
 * Template Name: Contact
 * 
 * Page Template
 */

function deliver_mail() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {

        // sanitize form values
        $name    = sanitize_text_field( $_POST["cf-name"] );
        $email   = sanitize_email( $_POST["cf-email"] );
        $subject = sanitize_text_field( $_POST["cf-subject"] );
        $message = esc_textarea( $_POST["cf-message"] );

        // get the blog administrator's email address
        $to = get_option( 'admin_email' );

        $headers = "From: $name <$email>" . "\r\n";

        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            echo '<div>';
            echo '<p>Thanks for contacting me, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo 'An error occurred, please try again';
        }
    }
} 
deliver_mail();

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
        <div class="contact-page">
            <?php
                function html_form_code() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Your Name (required) <br />';
    echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Email (required) <br />';
    echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Subject (required) <br />';
    echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Message (required) <br />';
    echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Send"/></p>';
    echo '</form>';
}
                html_form_code();

                
            ?>
        </div>
    </div>
</div>
<?php 
    endwhile;
    endif;
?>    

 <?php get_footer(); ?>

 <!-- https://premium.wpmudev.org/blog/how-to-build-your-own-wordpress-contact-form-and-why/ 

https://catswhocode.com/wordpress-contact-form-without-plugin/

https://medium.com/@stevesohcot/simple-php-contact-form-tutorial-part-1-of-2-6cdb2e383b23

https://stackoverflow.com/questions/39890334/how-to-use-wp-mail-function-in-wordpress

https://stackoverflow.com/questions/37184398/how-to-use-the-wordpress-wp-mail-function-on-an-external-php-using-advanced-e

https://developer.wordpress.org/reference/functions/wp_mail/

https://www.w3schools.com/php/php_form_complete.asp

https://www.sitepoint.com/build-your-own-wordpress-contact-form-plugin-in-5-minutes/
-->

