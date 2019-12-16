<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 
    require 'vendor/autoload.php';    

    if (isset($_POST['submit']))
    {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $image = $_POST['file'];

        $result = $crud->getUserByEmailAddress($email);

        if ($result['num'] > 0)
        {
            echo '<h1 class="text-center text-danger">This email address already exist in our database.</h1>';
        }
        else
        {     //$user->getUser($username, $new_password);
            $isSuccess = $user->insertUser($username, $password, $fname, $lname, $email, $gender, $address, $image);

            if ($isSuccess)
            {
                if (empty(!$image))
                {
                    $orig_file = $_FILES[strval($image)]['tmp_name'];
                    $ext = pathinfo($_FILES[strval($image)]['name'], PATHINFO_EXTENSION);
                    $target_dir = 'avatarUploads/';
                    $destination = $target_dir . basename($_FILES[strval($image)]["name"]);
                    $fileMoved = move_uploaded_file($orig_file, $destination);
                }
               
                $recipient = strval($email);

                $email = new \SendGrid\Mail\Mail(); 
                $email->setFrom("omarykamp@yahoo.com", "U-Drive File Storage");
                $email->setSubject("File Share");
                $email->addTo($recipient, " ");
                $email->addContent("text/plain", "Congratulations, you have been successfully registered for U-Drive". 
                                    "\n". "\n".
                                    "Kind Regards,". "\n". "U-Drive File Storage.");
                $email->addContent("text/html", "Congratulations, you have been successfully registered for U-Drive". 
                "\n". "\n".
                "Kind Regards,". "\n". "U-Drive File Storage.");

                $sendgrid = new \SendGrid('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');

                try 
                {
                    $response = $sendgrid->send($email);                        
                } 
                catch (Exception $e) 
                {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
                }

                echo '<h1 class="text-center text-success">Registation for U-Drive has been successful!</h1>';
                header("Location: login.php");
            }
            else
            {
                //include 'include/errormessage.php';
                echo '<h1 class="text-center text-danger">This username already exist in our database. Kindly choose another</h1>';
            }
        
        }
    }
?>
    
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>