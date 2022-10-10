<?php
$title = 'Update';
require_once 'Includes/header.php'; 
require_once 'db/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isSuccess = $crud -> deleteAttendee($id);
    if ($isSuccess) {
        header("Location: viewrecords.php");
    }else{
        echo 'error';
    }
}else{
    echo 'error';
}
?>