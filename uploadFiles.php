<?php 
    $title = 'File Upload';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';       
?>

<h1 class="text-center"><?php echo $title ?></h1>

<form method="post" action="success.php" enctype="multipart/form-data">
<br/>

<div class="custom-file">
    <td><input type="file" accept=".xlsx, .xls, .doc, .docx, .txt, .pdf" class="custom-file-input" id="file" name="file">
    <td><label class="custom-file-label"for="file" >Choose File </label></td>
</div>

<br/>
<br/>
<button type="submit" class="btn btn-primary btn-block" name="submit">Upload File</button>

</form>
<br/>
<br/>
<br/>
<br/>

<?php include_once 'includes/footer.php'?>
