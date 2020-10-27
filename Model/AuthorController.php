<?php

include './../Library/connection.php';

session_start();

$id         = 0;
$fullname   = '';
$address    = '';
$phone      = '';
$educations = '';

if(isset($_POST['save_author'])) {
    // The path to store the uploaded image
    $target = __DIR__."/Images/";

    // check file extension
    $file_extension = array('png', 'jpg', 'jpeg');
    // The path to store the uploaded image
    $picture    = $_FILES['upload_image']['name'];
    // get the file extension
    $x          = explode('.', $picture);
    $extension  = strtolower(end($x));
    // check images size
    $image_size = $_FILES['upload_image']['size'];
    $file_tmp   = $_FILES['upload_image']['tmp_name'];

    // get others data
    $name       = $_POST['name'];
    $address    = $_POST['address'];
    $phone      = $_POST['phone_number'];
    $educations = $_POST['education'];

    if(in_array($extension, $file_extension) === true){
        if($image_size < 1044070){			
            // move file to folder Images;
            move_uploaded_file($file_tmp, $target .$picture);

            // insert data to DB
            $query = mysqli_query($connection, "INSERT INTO Authors (fullname, living_address, phone_number, education, picture) VALUES('$name', '$address', '$phone', '$educations', '$picture') ") or die(mysqli_error($connection));
            
            if($query){
                $_SESSION['message']    = "New Author has been added";
                $_SESSION['msg_type']   = "success";
            }else{
                $_SESSION['message']    = "Failed to upload images";
                $_SESSION['msg_type']   = "danger";
            }
        }else{
            $_SESSION['message']    = "Images Size too big";
            $_SESSION['msg_type']   = "warning";
        }
    }else{
        $_SESSION['message']    = "File extension is not allowed";
        $_SESSION['msg_type']   = "warning";
    }

    
    // header("location: ../View/index_author.php");
}

if(isset($_POST['update_author'])) {
    // The path to store the uploaded image
    $target = __DIR__."/Images/";

    // check file extension
    $file_extension = array('png', 'jpg', 'jpeg');
    // The path to store the uploaded image
    $picture    = $_FILES['upload_image']['name'];
    // get the file extension
    $x          = explode('.', $picture);
    $extension  = strtolower(end($x));
    // check images size
    $image_size = $_FILES['upload_image']['size'];
    $file_tmp   = $_FILES['upload_image']['tmp_name'];

    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $address    = $_POST['address'];
    $phone      = $_POST['phone_number'];
    $educations = $_POST['education'];

    if(in_array($extension, $file_extension) === true){
        if($image_size < 1044070){
            try{
                // move file to folder Images;
                move_uploaded_file($file_tmp, $target . $picture);

                // Update data to table
                $query = mysqli_query($connection, "UPDATE Authors SET fullname = '$name', living_address = '$address', phone_number = '$phone', education = '$educations', picture = '$picture' WHERE id = $id ") or die(mysqli_error($connection));
                
                $_SESSION['message']    = "New Author has been added";
                $_SESSION['msg_type']   = "success";

            }catch(Exception $e){
                $_SESSION['message']    = "Failed to update data" . $e->getMessage();
                $_SESSION['msg_type']   = "danger";
            }
        }else{
            $_SESSION['message']    = "Images Size too big";
            $_SESSION['msg_type']   = "warning";
        }
    }else{
        // Alert messages
        $_SESSION['message']  = 'File extension is not allowed';
        $_SESSION['msg_type'] = 'warning';
    }


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
