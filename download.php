<?php

// header("Content-Type: application/octet-stream");

$file1 = $_GET["id"];
// $path    = 'uploads/';
// $files = scandir($path);

// //$file1 = file_get_contents($file, FILE_USE_INCLUDE_PATH);

// header("Content-Disposition: attachment; filename=" . urlencode($files));   
// header("Content-Type: application/octet-stream");
// header("Content-Type: application/download");
// header("Content-Description: File Transfer");            
// header("Content-Length: " . filesize($files));

// flush(); // this doesn't really matter.
// $fp = fopen($files, "r");

// while (!feof($fp))
// {
//     echo fread($fp, 65536);
//     flush(); // this is essential for large downloads
// } 

// fclose($fp); 



// $dir = 'uploads/';

// // Open a directory, and read its contents
// if (is_dir($dir)){
//   if ($dh = opendir($dir)){
//     while (($file = readdir($dh)) !== false){
//         if ($file == $file1)
//         {
//             echo "filename:" . $file . "<br>";

//             header("Content-Disposition: attachment; filename=" . urlencode($file));   
//             header("Content-Type: application/octet-stream");
//             header("Content-Type: application/download");
//             header("Content-Description: File Transfer");            
//             header("Content-Length: " . filesize($file));

//             flush(); // this doesn't really matter.
//             $fp = fopen($file, "r");

//             while (!feof($fp))
//             {
//                 echo fread($fp, 65536);
//                 flush(); // this is essential for large downloads
//             } 

//             fclose($fp); 

//         }
//     }
//     closedir($dh);
//   }
// }


$file= $_GET["id"];// make sure it should be a correct path
// if (file_exists($file)) {
//       header('Content-Description: File Transfer');
//       header('Content-Type: application/octet-stream');
//       header('Content-Disposition: attachment; filename="' . basename($file) . '"');
//       header('Expires: 0');
//       header('Cache-Control: must-revalidate');
//       header('Pragma: public');
//       header('Content-Length: ' . filesize($file));
//       readfile($file);
//       exit;
//   }

$name= $_GET["id"];

    // header('Content-Description: File Transfer');
    // header('Content-Type: application/force-download');
    // header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    // header('Content-Transfer-Encoding: binary');
    // header('Expires: 0');
    // header('Cache-Control: must-revalidate');
    // header('Pragma: public');
    // header('Content-Length: ' . filesize($name));
    // ob_clean();
    // flush();
    // readfile("uploads/".$name); //showing the path to the server where the file is to be download
    // exit;


    $file_url = 'http://www.myremoteserver.com/file.exe';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($name) . "\""); 
readfile($name); 

?>