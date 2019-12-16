<?php

//require_once 'includes/auth_check.php';
require_once 'db/conn.php';

if (!$_GET['id'])
{
    echo 'Error';
    //include 'include/errormessage.php';
    header("Location: adminPanel.php");
}
else
{
    $id = $_GET['id'];

    $result = $crud->deleteUser($id);

    if ($result)
    {
        header("Location: adminPanel.php");
    }
    else
    {
        echo 'Error';
        //include 'include/errormessage.php';
    }
}

?>