<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    //$results = $crud->getSpecialties();
?>
<br>
    <h1 class="text-center">Contact Us </h1>
    
    <form method="post" action="success.php">
    <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="form-group">
            <label for="lastName">Last Name</label>
            <input required type="text" class="form-control" id="lastName" name="lastName">
    </div>

    <div class="form-group">
        <label for="email">Your Email Address</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="phone">Your Contact Number</label>
        <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="tresc_area">Brief Summary of Concerns/Query/Inquiry</label>  
        <br/>      
        <textarea class="form-control" id="tresc_area" name="tresc_area" aria-describedby="phoneHelp" cols="155" rows="5" > </textarea>        
    </div>

    <button type="submit" class="btn btn-primary btn-block" name="submit">Send Email</button>
</form>

<br>
<br>
<?php require_once 'includes/footer.php'; ?>
