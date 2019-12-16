<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $result = 'servicio2';

?>
<h1>Doctorage</h1>
<br>
    

<br/>
    <div>

    <table class="table">
    <tr>
    <td>
        <img src="images/gallery/<?php echo $result; ?>.jpg">     
    </td>  
    
    </tr>    
  
    </table>

    </div>
    <h6 class="text-left">
    Doctorage is a document cloud storage service which will allow users to upload their documentss to be stored in a cloud storage. Users will be able to upload, delete, edit the
    documents at any given time free of charge. Only the user will be able to view uploaded files. Enjoy and safe and secure way to upload your documents.
    </h6>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
