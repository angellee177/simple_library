<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/style/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Reset Password</title>
</head>
<body>
    <?php require_once "../../Model/Auth/RegisterController.php" ?>
    <?php include "../../Helper/response.php" ?>
    <?php include '../layouts/header.php' ?>
        <div class="container">
            <div class="row mg-b-10">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <h4>Want to resent verification email? </h4>
                    <p>Input your email below, we will send you an email to verify your account.</p>
                    <form action="../../Model/Auth/RegisterController.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Email Address<span class="tx-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Please input your email here." required>
                        </div>
                        <div class="form-group mg-t-50">
                            <button class="btn btn-danger btn-block" name="resend_verification" id="resend_verification" >Send Verification Email</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    <?php include '../layouts/footer.php' ?>