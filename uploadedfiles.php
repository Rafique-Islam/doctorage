<?php 
    $title = 'Uploaded File(s)';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getUerUploadedFiles($_SESSION['id']);
?>
<br>

<table class="table">
    <tr>
        <th>#</th>
        <th>File Name</th>
        <th>Time of Upload</th>
        <!-- <th>Date of Birth</th>
        <th>Email Address</th>
        <th>Contact number</th> -->
        <th>File Path</th>
        <th>Actions</th>
    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $r['FileUploadId']?></td>
            <td><?php echo $r['FileName']?></td>
            <td><?php echo $r['TimeOfUpload']?></td>           
            <td><?php echo $r['FilePath']?></td>
            <td>
                <a href="download.php?id=<?php echo $r['FilePath']?>" class="btn btn-primary">Download</a>
                <a href="fileshare.php?id=<?php echo $r['FilePath']?>" class="btn btn-warning">Share</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" 
                href="delete.php?id=<?php echo $r['FileUploadId']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>