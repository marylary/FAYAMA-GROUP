<?php

    //Create the SMTP Transport
     $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
     ->setUsername('')
     ->setPassword('') ;


  
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    
    // Create a message
    $message = new Swift_Message();
 
    // Set a "subject"
    $message->setSubject($object);
 
    // Set the "From address"
    $message->setFrom(['MAIL' => 'nom']);
    $message->setBody($body,'text/html');
 
    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
    $message->addTo($receivermail, $receivername);

?>