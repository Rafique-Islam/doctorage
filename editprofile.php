<?php 
    $title = 'Update Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if (!isset($_GET['id']))
    {
        include 'include/errormessage.php';
        header("Location: adminPanel.php");
    }
    else
    {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    

?>
<br>
    <h1 class="text-center">Update Record </h1>
    
    <form method="post" action="updatesuccess.php">
    <input type="hidden" name="id" value="<?php echo $attendee['id'] ?>" />
    <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" value="<?php echo $attendee['FirstName'] ?>" id="firstname" name="firstname">
    </div>

    <div class="form-group">
            <label for="lastName">Last Name</label>
            <input required type="text" class="form-control" value="<?php echo $attendee['LastName'] ?>" id="lastName" name="lastName">
    </div>

    <div class="form-group">
            <label for="address">Address</label>
            <input class="form-control" id="address" value="<?php echo $attendee['Address'] ?>" name="address">
    </div>

    <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value= "<?php echo $r['GenerId'] ?>"><?php echo $r['GenderName'];  ?></option>
                <?php }?>                
            </select>
    </div>

    <br>

    <br/>
    <br>

    <button type="submit" class="btn btn-primary " name="submit1">Update Record</button>
</form>

<?php } ?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
