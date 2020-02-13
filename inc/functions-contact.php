<?php

    $name = (isset($_POST['name']));
    $email = (isset($_POST['email']));
    $subject = (isset($_POST['subject']));
    $message = (isset($_POST['message']));
    $to = "johanborg81@hotmail.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers = "From:<$email> \r\n";

function ciy_contact_form(){
    if(isset($_POST['submit'])){
        if(mail($to, $subject,$message,$headers)){
            echo "Thanks for your email.";
        } else {
            echo "Failed to send your email";
        }
    }
}

$nameErr = $emailErr = $subjectErr = "";
$name = $email = $subject = $message = "";
function ciy_wm3_php_form(){
    

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
}

// Subscriber form
function ciy_subscriber_form(){
    if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['kv_submit_subscription'])){
        if(filter_var($_POST['subscriber_email'], FILTER_VALIDATE_EMAIL)){
            $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
            $subject = sprintf(__('New Subscription on %s', 'kvc'), $blogname);
            $to = get_option('admin_email');
            $headers = 'From: '. sprintf(__('%s Admin', 'kvc'), $blogname) .' <No-reply@'.$_SERVER['SERVER_NAME'] .'>' . PHP_EOL;

            $message = sprintf(__('Hi ,', 'kvc')) . PHP_EOL . PHP_EOL;
            $message .= sprintf(__('You have a new subscription on your %s website.', 'kvc'), $blogname) . PHP_EOL . PHP_EOL;
            $message .= __('Email Details', 'kvc') . PHP_EOL;
            $message .= __('--------------') . PHP_EOL;
            $message .= __('User E-mail: ', 'kvc') . stripslashes($_POST['subscriber_email']) . PHP_EOL;
            $message .= __('Regards,', 'kvc') . PHP_EOL . PHP_EOL;
            $message .= sprintf(__('Your %s Team', 'kvc'), $blogname) . PHP_EOL;
            $message .= trailingslashit(get_option('home')) . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;

            if(wp_mail($to, $subject, $message, $headers)){
                echo 'Your e-mail (' . $_POST['subscriber_email'] . ') has been added to our mailing list!';
            } else {
                echo 'There was a problem with your e-mail (' . $_POST['subscriber_email'] . ')';
            }
        } else {
            echo 'There was a problem with your e-mail (' . $_POST['subscriber_email'] . ')';
        }
    }
}

// https://www.kvcodes.com/2016/02/simple-subscribe-form-wordpress/


