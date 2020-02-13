<?php
/**
 * @package ciyguytheme
 */

$name = (isset($_POST['name']));
$email = (isset($_POST['email']));
$subject = (isset($_POST['subject']));
$message = (isset($_POST['message']));
$to = "johanborg81@hotmail.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers = "From:<$email> \r\n";

$nameErr = $emailErr = $subjectErr = "";
$name = $email = $subject = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                $nameErr = "Only letters and white space allowed";
            }
        }
        if(empty($_POST["email"])){
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if email address is well-formed
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format";
            }
        }
        if(empty($_POST["subject"])){
            $subject = "";
        } else {
            $subject = test_input($_POST["subject"]);
        }
        if(empty($_POST["message"])){
            $message = "";
        } else {
            $message = test_input($_POST["message"]);
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST['submit'])){
        if(mail($to, $subject,$message,$headers)){
            echo "Thanks for your email.";
        } else {
            echo "Failed to send your email";
        }
    }

 get_header();?>

<?php if(have_posts()):
    while(have_posts()) : the_post();
?>
<header class="header_image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)";>
   <h2><?php single_post_title(); ?></h2>
</header>

<div class="container_pages">
    <div class="post-description">
        <div class="contact-page">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label for="name">Name: <span>* <?php echo $nameErr; ?></span></label>
                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>">

                <label for="email">Email: <span>* <?php echo $emailErr; ?></span></label>
                <input type="text" id="email" name="email" placeholder="email@you.com" value="<?php echo $email; ?>">
                
                <label for="subject">Subject: <span>* <?php echo $subjectErr; ?></span></label>
                <input type="text" id="subject" name="subject" placeholder="Your Subject Line" value="<?php echo $subject; ?>">
                
                <label for="message">Message: <span>*</span></label>
                <textarea name="message" id="message" placeholder="Write Your Message Here" <?php echo $message;?>></textarea>
                
                <input type="submit" name="submit" value="Send">
            </form>
        </div>
    </div>
</div>
<?php 
    endwhile;
    endif;
?>    
<?php

 get_footer();