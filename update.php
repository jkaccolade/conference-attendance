<?php
$title = 'Update';
require_once 'Includes/header.php'; 
require_once 'db/conn.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $specialty = $_POST['specialty'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
  
    //To insert the info into the database and check if the operation returns true or false
    $isSuccess = $crud -> updateAttendeeDetails($id,$fname, $lname, $dob, $email, $contact, $specialty);

    if ($isSuccess) {
        header("Location: viewrecords.php");
    }else{
        include "includes/errormessage.php";
    }
}else {
    include "includes/errormessage.php";
}
?>