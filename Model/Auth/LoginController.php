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


// Sign In User
if(isset($_POST['login_user'])) {
    echo "masuk loh";
}


