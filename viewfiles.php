<?php 
    $title = 'View Record';
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
        $requestedFile = $_GET['id'];
        $file = file_get_contents($requestedFile, FILE_USE_INCLUDE_PATH);

        // $current = "John Smith\n";
        
        // file_show_contents($requestedFile);
        //echo $file;

        //exit();
        // $id = $_GET['id'];
        // $result = $crud->getAttendeeDetails($id);
    
?>
<br>

<form enctype="multipart/form-data">
<input id="upload" type=file   accept="text/html" name="files[]" size=30>
</form>

<textarea class="form-control" rows=35 cols=120 id="ms_word_filtered_html"></textarea>

<script>
function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // use the 1st file from the list
    f = files[0];

    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {

          jQuery( '#ms_word_filtered_html' ).val( e.target.result );
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsText(f);
  }

  document.getElementById('upload').addEventListener('change', handleFileSelect, false);
</script>


    <?php } ?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>