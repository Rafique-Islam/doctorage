<?php
require 'vendor/autoload.php'; 

if (isset($_POST['submit']))
    {       
        $email = $_POST['email'];
        $url = $_POST['id'];
        
        $recipient = strval($email);

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("omarykamp@yahoo.com", "U-Drive File Storage");
        $email->setSubject("File Share");
        $email->addTo($recipient, " ");
        $email->addContent("text/plain", "Kindly click the link below to  download a file that was shared with you.". 
                           "\n". "\n". $url ."\n". "\n".
                           "Kind Regards,". "\n". "U-Drive File Storage.");
        $email->addContent("text/html", "<strong>and easy to do anywhere, even with PHP</strong>");

        $sendgrid = new \SendGrid('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');

        try {
            $response = $sendgrid->send($email);
            echo '<h1 class="text-center text-success">Email sent successfully!</h1>';
             
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
?>