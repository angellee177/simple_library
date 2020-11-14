<?php 

// PHPMailer with SMTP
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include         '../../Library/connection.php';
require_once    '../../vendor/autoload.php';


session_start();

// Sign Up User
if(isset($_POST['register_user'])) {
    $fullname               = $_POST['fullname'];
    $email                  = $_POST['email'];
    $created_at             = date('Y-m-d H:i:s', time());
    $token                  = bin2hex(random_bytes(50)); // Generate Unique token
    $errors                 = [];
    $mail                   = new PHPMailer(true);
    $message                = file_get_contents('../../View/emails/verify_account.php'); 
    $message                = str_replace('%fullname%', $fullname, $message); 
    $message                = str_replace('%link%', "http://localhost/simple_library/View/auth/verify.php?token=" . $token . "&email=" . $email, $message); 

    if($_POST['password'] !== $_POST['password_confirmation'])
    {
        $_SESSION['fullname']    = $fullname;
        $_SESSION['email']       = $email;
        $_SESSION['message']     = "Sorry, Your password doesn't match with password confirmation";
        $_SESSION['msg_type']    = "danger";

        header("location: ../../View/auth/register.php");
    } else {
        $password               = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
        $password_confirmation  = password_hash($_POST['password_confirmation'], PASSWORD_DEFAULT);

        $result = $connection->query("SELECT * FROM Users WHERE email = '$email' LIMIT 1 ") or die($connection->error);
     
        if(mysqli_num_rows($result) === 1) {
            $errors['register_fail']  = "Sorry, Your email already Register. Please use another email."; 
        }
    
        if(count($errors) === 0) {
                            
            // send verification email
            $mail->isSMTP();
            $mail->SMTPDebug  = 3;
            $mail->Host       = "smtp.gmail.com";
            $mail->SMTPAuth   = true;
            $mail->Username   = "YOUR_GMAIL_ACCOUNT";                 
            $mail->Password   = "YOUR_EMAIL_PASSWORD";                        
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tsl";                           
            //Set TCP port to connect to
            $mail->Port       = 587; 
            $mail->setFrom( 'angel@quarkspark.com' , 'Angel' );
            $mail->addAddress($email, $fullname);     // Add a recipient
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject    = 'Verify your account';
            // $mail->Body    = $message;
            $mail->Body       = $message;
            $mail->AltBody    = 'This is the body in plain text for non-HTML mail clients';
    
    
            if(!$mail->send()) {
                $_SESSION['message'] = "failed to send email" . $mail->ErrorInfo;
                $_SESSION['msg_type'] = "danger";
            
                header('location:../../View/auth/register.php');
                exit();
            }

            $stmt   = $connection->prepare("INSERT INTO Users SET fullname = ?, email = ?, password = ?, password_confirmation = ?, created_at = ? ") or die($connection->error);
            $stmt->bind_param('sssss', $fullname, $email, $password, $password_confirmation, $created_at);
            $data = $stmt->execute();

            if ($data) {
                $stmt->close();

                $_SESSION['fullname']   = $fullname;
                $_SESSION['email']      = $email;
                $_SESSION['verified']   = false;
                $_SESSION['message']    = 'Account success registered! Please verify your email first.';
                $_SESSION['msg_type']   = 'success';

                // header('location:../../View/auth/register.php');
                echo "<script>window.location.assign('../../View/auth/login.php')</script>";
                exit();
            } else {
                $errors['register_fail'] = "Database error: Could not register user";
            }
        } else {
       
            $_SESSION['message'] = $errors['register_fail'];
            $_SESSION['msg_type'] = "danger";
    
            header('location: ../../View/auth/register.php');
        }
    }
}

// Verify Account
if(isset($_POST['verify_account'])) {
    $token       = $_POST['verify_token'];
    $email       = $_POST['email'];
    $verify_time = date('Y-m-d H:i:s', time());
    
    // find user by Email
    $user  = $connection->query("UPDATE Users SET verify_token = '$token', verify_at = '$verify_time' WHERE email= '$email' LIMIT 1") or die($connection->error);

    if(!$user) {
        $_SESSION['message']  = "Sorry, Failed to verify your account.";
        $_SESSION['msg_type'] = "danger";

        header('location: ../../View/auth/login.php');
    }

    $_SESSION['message']    = 'Successfully Verify your account!';
    $_SESSION['msg_type']   = 'success';

    // Back to Index
    header("location: ../../View/auth/login.php");
}

// Resend Verification Email
if(isset($_POST['resend_verification'])) {
    $email      = $_POST['email'];
    $token      = bin2hex(random_bytes(50)); // Generate Unique token
    $mail       = new PHPMailer(true);
    $errors     = [];

    $result = $connection->query("SELECT * FROM Users WHERE email = '$email' LIMIT 1 ") or die($connection->error);

    if(mysqli_num_rows($result) === 1) {
        $user = $result->fetch_assoc();
       
        $current_year = date ( "Y" );
        $fullname     = $user['fullname'];
        $message      = file_get_contents('../../View/emails/verify_account.php'); 
        $message      = str_replace('%fullname%', $fullname, $message); 
        $message      = str_replace('%link%', "http://localhost/simple_library/View/auth/verify.php?token=" . $token . "&email=" . $email, $message);
        $message      = str_replace('%date%', $current_year, $message);

        // send verification email
        $mail->isSMTP();
        $mail->SMTPDebug  = 3;
        $mail->Host       = "smtp.gmail.com";
        $mail->SMTPAuth   = true;
        $mail->Username   = "YOUR_GMAIL_ACCOUNT";                 
        $mail->Password   = "YOUR_GMAIL_PASSWORD";                        
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tsl";                           
        //Set TCP port to connect to
        $mail->Port       = 587; 
        $mail->setFrom( 'angelriapurnamasari17@gmail.com' , 'Angel' );
        $mail->addAddress($email, "customer1");     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject    = 'Verify your account.';
        $mail->Body       = $message;
        $mail->AltBody    = 'This is the body in plain text for non-HTML mail clients';


        if(!$mail->send()) {
            $_SESSION['message'] = "failed to send email" . $mail->ErrorInfo;
            $_SESSION['msg_type'] = "danger";
        
            header('location:../../View/auth/resend_verify.php');
            exit();
        } else {
            $_SESSION['fullname']   = $fullname;
            $_SESSION['email']      = $email;
            $_SESSION['verified']   = false;
            $_SESSION['message']    = 'Success Resend Verification Email! Please check your inbox.';
            $_SESSION['msg_type']   = 'success';

            // header('location:../../View/auth/register.php');
            echo "<script>window.location.assign('../../View/auth/resend_verify.php')</script>";
            exit();
        }

    } else {
        $errors['verify_fail'] = "Sorry, Your email doesn't exist in our database.";
    }

    if( count($errors) > 0 ) {
        $_SESSION['message']     = $errors['verify_fail'];
        $_SESSION['msg_type']    = "danger";

        header('location: ../../View/auth/resend_verify.php');
    }
}