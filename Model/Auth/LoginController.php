<?php

$host    = "localhost";
$usrname = "root";
$pwd     = "";
$dbname  = "project_RDBMS1";

try{
    // Procedural Style
    // $link = mysqli_connect("localhost", "root", "", "project_RDBMS1");
    // OOP style
    $connection = new mysqli($host, $usrname, $pwd, $dbname);
}catch(Exception $e) {
    echo "Connection to Database error : " . $e->getMessage();
}

session_start();

// Sign In User
if(isset($_POST['login_user'])) {
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $errors    = [];

    $result = $connection->query("SELECT * FROM Users WHERE email = '$email' LIMIT 1 ") or die($connection->error);
    
    if(mysqli_num_rows($result) === 1) {
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])) {
            $_SESSION['login']   = true;
            $_SESSION['name']    = $user['fullname'];
            $_SESSION['role']    = $user['role'];
            $_SESSION['message'] = "Yeayy! welcome back to Trovey.";
            $_SESSION['msg_type']    = "success";

            header('location: ../../View/landing/index.php');
            exit();
        } else {
            $errors['login_fail'] = "Sorry, Your password is wrong Please try again!";
        }

    } else {
        $errors['login_fail'] = "Sorry, Your email doesn't exist in our database.";
    }

    if( count($errors) > 0 ) {
        $_SESSION['message']     = $errors['login_fail'];
        $_SESSION['msg_type']    = "danger";

        header('location: ../../View/auth/login.php');
    }
}


