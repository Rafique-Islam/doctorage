<?php 
require_once 'db/conn.php';

if (isset($_POST['submit1']))
    {
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastName'];
        $address = $_POST['address'];        
        $gender = $_POST['gender'];

        $result = $crud->editAttendee($id, $fname, $lname, $address, $gender);

        if ($result)
        {
            header("Location: adminPanel.php");
        }
        else
        {
            include 'include/errormessage.php';
        }
    }
    else
    {
        include 'include/errormessage.php';
    }


?>