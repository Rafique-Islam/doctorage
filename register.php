<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

?>
<br>
    <h1 class="text-center">Doctorage Registeration Form </h1>

    <form method="post" action="registrationsuccess.php">
    <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="form-group">
            <label for="lastName">Last Name</label>
            <input required type="text" class="form-control" id="lastName" name="lastName">
    </div>

    <div class="form-group">
            <label for="address">Address</label>
            <input class="form-control" id="address" name="address">
    </div>

    <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value= "<?php echo $r['GenerId'] ?>"><?php echo $r['GenderName'];  ?></option>
                <?php }?>                
            </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
            <label for="username">User name</label>
            <input required type="text" class="form-control" id="username" name="username">
    </div>

    <div class="form-group">
            <label for="password">Password</label>
            <input required type="text" class="form-control" id="password" name="password" input type="password">
    </div>

    <br>

    <div class="custom-file">
    <td><input type="file" accept="image/*" class="custom-file-input" id="file" name="file">
    <td><label class="custom-file-label"for="file" >Choose File </label></td>
    <small id="emailHelp" class="form-text text-muted">Image upload is optional.</small>
    </div>

    <br/>
    <br>

    <button type="submit" class="btn btn-primary " name="submit">Register</button>
</form>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
