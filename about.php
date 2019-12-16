<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $result = 'concentrate';

?>
<br>
    <h6 class="text-left">Here at Doctorage we aim to create a safe and secure way to upload and store documents free of charge to everyone. We know digital documents can
    get lost, deleted or corrupted. Here at Doctorage, you do not have to worry about that happening to your documents and you can access them anywhere anytime as long
    as you have access to the intenet on both PC and mobile phones. Storage full on your device? At Doctorage we have created a space for unlimited storage for your 
    documents. We aim to make life easier for people everywhere.
    </h6>

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

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
