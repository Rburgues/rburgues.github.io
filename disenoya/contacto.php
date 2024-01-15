<?php

if($_POST) {
    $name = "";
    $email = "";
    $subject = "";
    $message = "";
    $recipient = "rsebaburgues@gmail.com";
    
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['email'])) {
    	$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    if(isset($_POST['subject'])) {
    	$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['message'])) {
    	$message = htmlspecialchars($_POST['message']);
    }
    $recipient = "rsebaburgues@gmail.com";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
    
    if(mail($recipient, $subject, $message, $headers)) {
    	echo "<p>Gracias por contactarnos, $visitor_name. responderemos a tu mensaje en menos de 24hs.</p>";
    } else {
    	echo '<p>El mensaje no se a podido enviar, lo sentimos!</p>';
    }
    
} else {
    echo '<p>Algo salió mal</p>';
}

?>