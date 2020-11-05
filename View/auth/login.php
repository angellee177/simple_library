<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/style/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php include '../layouts/header.php' ?>
    <div class="container">
        <div class="row mg-b-10">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <h3 class="text-grey txt-center">Hii, Glad to meet you.</h3>
            </div>
            <div class="col-md-5"></div>
        </div>
        <div class="row mg-b-100">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <form action="../../Model/Auth/LoginController.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email Address<span class="tx-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="please input your email here." required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span class="tx-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="please input your password here." required>
                    </div>
                    <div class="form-group mg-t-50">
                        <button class="btn btn-warning btn-block" name="login_user" id="login_user" class="form-control">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
    <?php include '../layouts/footer.php' ?>