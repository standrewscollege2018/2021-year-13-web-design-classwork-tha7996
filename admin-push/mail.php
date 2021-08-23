<?php

// mail

ini_set('SMTP','localhost');
ini_set('smtp_port',80);

$to      = 'tobyharvie@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);


// the message


 ?>
