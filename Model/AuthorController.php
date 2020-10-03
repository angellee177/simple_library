<?php

include './../Library/connection.php';

session_start();

$id         = 0;
$fullname   = '';
$address    = '';
$phone      = '';
$educations = '';

if(isset($_POST['save_author'])) {
    if(isset($_REQUEST['name'])) {
        $name       = $_POST['name'];
    }else{
        $name       = "";
    }
    
    if(isset($_REQUEST['address'])) {
        $address    = $_POST['address'];
    }else{
        $address    = "";
    }
    
    if(isset($_REQUEST['phone_number'])) {
        $phone      = $_POST['phone_number'];
    }else{
        $phone      = "";
    }
    
    if(isset($_REQUEST['phone_number'])) {
        $educations = $_POST['education'];
    }else{
        $educations      = "";
    }


    // Insert data to Table
    mysqli_query($connection, "INSERT INTO Authors (fullname, living_address, phone_number, education) VALUES('$name', '$address', '$phone', '$educations') ") or die(mysqli_error($connection));

    $_SESSION['message']    = "New Author has been added";
    $_SESSION['msg_type']   = "success";
    
    header("location: ../View/index_author.php");
}

if(isset($_POST['update_author'])) {
    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $address    = $_POST['address'];
    $phone      = $_POST['phone_number'];
    $educations = $_POST['education'];

    // Update data to table
    mysqli_query($connection, "UPDATE Authors SET fullname = '$name', living_address = '$address', phone_number = '$phone', education = '$educations' WHERE id = $id ") or die(mysqli_error($connection));

    // Alert messages
    $_SESSION['message']  = 'Record has been updated!';
    $_SESSION['msg_type'] = 'warning';

    // Back to Index  
    header("location: ../View/index_author.php");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    print_r($id);

    mysqli_query($connection, "DELETE FROM Authors WHERE id=$id ");

    // Alert Message
    $_SESSION['message']    = 'Record has been deleted!';
    $_SESSION['msg_type']   = 'danger';

    // Back to Index
    header("location: ../View/index_author.php");
}
