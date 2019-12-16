<?php 
    $title = 'View Record';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if (!isset($_SESSION['id']))
    {
        //include 'include/errormessage.php';
        echo "<h1 class='text-danger'>Please check details and try again</h1>";
    }
    else
    {
        $id = $_SESSION['id'];
        $result = $crud->getAdminDetails($id);
        $results = $crud->getSubscribersDetails($_SESSION['id']);
    
?>
<br>
<h3 class="text-center">Administrator Profile </h3>
<br>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $result['FirstName'] . ' ' . $result['LastName']; ?>     
    </h5>

    <p class="card-text">
        Email Address: <?php echo $result['EmailAddress']; ?> 
    </p>

    <p class="card-text">
        Physical Address: <?php echo $result['Address']; ?> 
    </p>

    <p class="card-text">
        Selected Gender: <?php echo $result['GenderName']; ?> 
    </p>
  </div>
  </div>
<br>    
    <a href="editprofile.php?id=<?php echo $result['id']?>" class="btn btn-warning">Edit Profile</a>

<br>
<hr>
<h3 class="text-center">Subscribers Profile </h3>
<hr>

<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Physical Address</th>
        <!-- <th>Contact number</th>
        <th>File Path</th> -->
        <th>Actions</th>
    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $r['id']?></td>
            <td><?php echo $r['FirstName']?></td>
            <td><?php echo $r['LastName']?></td>           
            <td><?php echo $r['EmailAddress']?></td>
            <td><?php echo $r['Address']?></td>
            <td>
                <a href="editprofile.php?id=<?php echo $r['id']?>" class="btn btn-primary">Edit Profile</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" 
                href="deleteUser.php?id=<?php echo $r['id']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php } ?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>