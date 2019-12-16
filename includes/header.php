<?php
  include_once 'includes/session.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />

    <title>Doctorage <?php echo $title ?></title>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Doctorage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
      
        <a class="nav-item nav-link active" href="about.php">About Us <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="contact.php">Contact Us</a>   

        <?php 
          if (!isset($_SESSION['id']))
          {
            ?>
                        
          <?php } else { ?>
            <a class="nav-item nav-link" href="uploadFiles.php">File Upload <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="uploadedfiles.php">Uploaded File(s) <span class="sr-only">(current)</span></a>
          <?php } ?>


          <?php 
          if (isset($_SESSION['id']) && $_SESSION['username'] == 'admin')
          {
            ?>
                <a class="nav-item nav-link" href="adminPanel.php">Admin Panel <span class="sr-only">(current)</span></a>
          <?php } else { ?>
            
          <?php } ?>
        </div>

        <div class="navbar-nav ml-auto">

        <?php 
          if (!isset($_SESSION['id']))
          {
            ?>
            <a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
          <?php } else { ?>
            <a class="nav-item nav-link" href="#"><span> Hello <?php echo $_SESSION['username'] ?> ! </span> <span class="sr-only">(cuurent)</span></a>
            <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>            
          <?php } ?>          
        </div>
    </div>
</nav>
<br>