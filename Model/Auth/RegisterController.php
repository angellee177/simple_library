<?php 

include '../../Library/connection.php';

session_start();

// Sign Up User
if(isset($_POST['register_user'])) {
    echo $_POST['email'];
    echo $_POST['password'];
    echo $_POST['password_confirmation'];
    
}