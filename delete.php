<?php

//require_once 'includes/auth_check.php';
require_once 'db/conn.php';

if (!$_GET['id'])
{
    include 'include/errormessage.php';
    header("Location: uploadedfiles.php");
}
else
{
    $id = $_GET['id'];

    $result = $crud->deleteFile($id, 'true');

    if ($result)
    {
        header("Location: uploadedfiles.php");
    }
    else
    {
        include 'include/errormessage.php';
    }
}

?>