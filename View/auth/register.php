<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/style/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <?php include '../layouts/header.php' ?>
    <div class="container">
        <div class="row mg-b-10">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <h3 class="tx-color-01 txt-center mg-t-30">Want to create new Account?</h3>
                <p class="mg-t-20 txt-center">Enter your email and password to create new account, we will send you an email to verify your account.</p>
                <hr>
            </div>
            <div class="col-md-5"></div>
        </div>
        <div class="row mg-b-100">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <form action="../../Model/Auth/RegisterController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Email Address<span class="tx-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Please input your email here." required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span class="tx-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Please input your password here." required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation<span class="tx-danger">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Please confirm your password here." required>
                    </div>
                    <div class="form-group mg-t-50">
                        <button class="btn btn-warning btn-block" name="register_user" id="register_user" >Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
    <?php include '../layouts/footer.php' ?>


