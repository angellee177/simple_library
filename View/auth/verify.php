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
    <?php require_once "../../Model/Auth/ResetPasswordController.php" ?>
    <?php include "../../Helper/response.php" ?>
    <?php include '../layouts/header.php' ?>
    <?php
        require_once '../../Library/connection.php';
        $token   = $_GET['token'];
        $email   = $_GET['email'];
    ?>
        <div class="container-fluid">
            <div class="row mg-t-30">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="../../Model/Auth/RegisterController.php" method="POST">
                        <div class="card no-border mg-30">
                            <div class="card-body">
                                <h5 class="card-title">Verify your account here</h5>
                                <input type="hidden" name="verify_token" value="<?= $token ?>" >
                                <input type="hidden" name="email" value="<?= $email ?>" >
                                <button class="btn btn-danger btn-block" name="verify_account">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    <?php include '../layouts/footer.php' ?>