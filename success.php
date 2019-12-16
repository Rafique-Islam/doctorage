<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if (isset($_POST['submit']))
    {
        $date = date('Y-m-d H:i:s');
        $orig_file = $_FILES['file']['tmp_name'];
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = $target_dir . basename($_FILES["file"]["name"]);
        $fileMoved = move_uploaded_file($orig_file, $destination);

        if ($fileMoved)
        {
            $isSuccess = $crud->RecordFileUpload(basename($_FILES["file"]["name"]), $_SESSION['id'], $date, $destination, 'false');

            if ($isSuccess)
            {
                echo '<h1 class="text-center text-success">File uploaded successfully!</h1>';
            }
            else
            {            
                echo '<h1 class="text-center text-danger">File was uploaded but had trouble committing to our database. Please try agian</h1>';
            }
        }
        else
        {            
            echo '<h1 class="text-center text-danger">There was an error with your Upload. Please try agian</h1>';
        }
    }
?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>