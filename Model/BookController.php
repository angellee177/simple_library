<?php 

include './../Library/connection.php';

session_start();

if(isset($_POST['save'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $id_author = $_POST['author'];

    // insert data to table
    mysqli_query($connection, "INSERT INTO Books (title, year, publisher, id_author) VALUES('$title', '$year', '$publisher', '$id_author') ");

    $_SESSION['message']    = "New Book has been added";
    $_SESSION['msg_type']   = "success";
    
    header("location: ../View/index.php");
}


if(isset($_POST['update_book'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $id_author = $_POST['author'];

    // insert data to table
    mysqli_query($connection, "UPDATE Books SET title = '$title', year = '$year', publisher = '$publisher', id_author = '$id_author' WHERE id = $id ") or die(mysqli_error($connection));

    $_SESSION['message']    = "Success Edit Books";
    $_SESSION['msg_type']   = "warning";
    
    header("location: ../View/index.php");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    print_r($id);

    mysqli_query($connection, "DELETE FROM Books WHERE id=$id ");

    // Alert Message
    $_SESSION['message']    = 'Record has been deleted!';
    $_SESSION['msg_type']   = 'danger';

    // Back to Index
    header("location: ../View/index.php");
}
