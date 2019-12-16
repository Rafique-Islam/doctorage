<?php 
    $title = 'file share';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if (!isset($_GET['id']))
    {
        include 'include/errormessage.php';
        //echo "<h1 class='text-danger'>Please check details and try again</h1>";
    }
    else
    {
        $file = $_GET["id"];

        $site_url = 'http://'.$_SERVER['HTTP_HOST'].'/Udrive'.'/'.'download.php?id='.$file;
    
?>
<br>

<form method="post" action="emailsuccess.php">
<input type="hidden" name="id" value="<?php echo $site_url ?>" />
<div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<!-- <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" value="<?php echo $site_url ?>" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div> -->

<button type="submit" class="btn btn-primary " name="submit">Send Mail</button>
</form>
    <?php } ?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>

