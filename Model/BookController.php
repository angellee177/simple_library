<?php 

include './../Library/connection.php';

session_start();

if(isset($_POST['save'])) {
    // The path to store the uploaded images
    $target         = __DIR__."/Images/Books/";

    // check file extension
    $file_extension = array('png', 'jpg', 'jpeg');
    // The path to store the uploaded images
    $picture        = $_FILES['books_cover']['name'];
    // Get the file extension
    $x              = explode('.', $picture);
    $extension      = strtolower(end($x));
    // Check images size
    $image_size     = $_FILES['books_cover']['size'];
    $file_tmp       = $_FILES['books_cover']['tmp_name'];

    // Get Others data;
    $title          = $_POST['title'];
    $year           = $_POST['year'];
    $publisher      = $_POST['publisher'];
    $id_author      = $_POST['author'];

    if(in_array($extension, $file_extension) === true) {
        if($image_size < 5242880){
            // Move file to folder Images
            move_uploaded_file($file_tmp, $target . $picture);

            // insert data to DB 
            $query = mysqli_query($connection, "INSERT INTO Books (title, year, publisher, id_author, book_picture) VALUES('$title', '$year', '$publisher', '$id_author', '$picture') ") or die(mysqli_error($connection));
        
            if($query) {
                $_SESSION['message']    = "New Book Successfully added!";
                $_SESSION['msg_type']   = "success";
            } else {
                $_SESSION['message']    = "Sorry, Failed to added New Book.";
                $_SESSION['msg_type']   = "danger"; 
            }
        } else {
            $_SESSION['message']        = "Sorry, Image size is too big.";
            $_SESSION['msg_type']       = "warning";
        }
    } else {
        $_SESSION['message']            = "Sorry, File extension is not allowed.";
        $_SESSION['msg_type']           = "warning";
    }
    
    header("location: ../View/index_book.php");
}


if(isset($_POST['update_book'])) {
    // The path to store the uploaded image
    $target         = __DIR__ . "/Images/Books/";
    
    // Check file extension
    $file_extension = ['png', 'jpg', 'jpeg'];
    // The path to store the uploaded image
    $picture        = $_FILES['books_cover']['name'];
    // Get the file extension
    $x              = explode('.', $picture);
    $extension      = strtolower(end($x));
    // Check Images Size
    $image_size     = $_FILES['books_cover']['size'];
    $file_tmp       = $_FILES['books_cover']['tmp_name'];

    // Get others Data
    $id             = $_POST['id'];
    $title          = $_POST['title'];
    $year           = $_POST['year'];
    $publisher      = $_POST['publisher'];
    $id_author      = $_POST['author'];
    $oldimage       = $_POST['books_oldimage'];

    if(in_array($extension, $file_extension) === true) {
        if($image_size < 5242880) {
            // move file to folder Images;
            move_uploaded_file($file_tmp, $target . $picture);
            unlink($target . $oldimage);
            
            // insert data to table
            $query = mysqli_query($connection, "UPDATE Books SET title = '$title', year = '$year', publisher = '$publisher', id_author = '$id_author', book_picture = '$picture' WHERE id = $id ") or die(mysqli_error($connection));

            if ($query) {
                $_SESSION['message']    = "Book successfully updated!";
                $_SESSION['msg_type']   = "success";
            } else {
                $_SESSION['message']    = "Sorry, Failed to update Book.";
                $_SESSION['msg_type']   = "danger";
            }
        } else {
            $_SESSION['message']    = "Sorry, Image size is too big";
            $_SESSION['msg_type']   = "warning";
        }
    } else {
        $_SESSION['message']    = "Sorry, File extension is not allowed.";
        $_SESSION['msg_type']   = "warning";
    }
    
    header("location: ../View/index_book.php");
}

if(isset($_GET['delete'])) {
    // Get Books ID that we want to delete
    $id            = $_GET['delete'];
    // Get Images path
    $target        = __DIR__ . "/Images/Books/";

    $data          = $connection->query("SELECT book_picture FROM Books WHERE id = $id ") or die($connection->error);
    $result        = $data->fetch_assoc();
    $book_oldimage = $result['book_picture'];
    unlink($target . $book_oldimage);


    $connection->query("DELETE FROM Books WHERE id=$id ") or die ($connection->error);

    // Alert Message
    $_SESSION['message']    = 'Record has been deleted!';
    $_SESSION['msg_type']   = 'danger';

    // Back to Index
    header("location: ../View/index_book.php");
}
