<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Relation Database</title>
    <link rel="stylesheet" href="../Assets/style/css/style.css">
    <link rel="stylesheet" href="../Assets/style/css/all.min.css">
    <link rel="stylesheet" href="../Assets/style/css/ionicons.min.css">
    <link rel="stylesheet" href="../Assets/style/css/dashforge.css">
    <link rel="stylesheet" href="../Assets/style/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="../Assets/style/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../Assets/style/css/toastr.min.css">
    <link rel="stylesheet" href="../Assets/style/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Assets/style/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../Assets/style/css/custom.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php require_once '../Model/AuthorController.php' ?>
    <?php
        if(isset($_SESSION['message'])) :
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
    </div>
    <?php endif; ?>
    <?php include "./layouts/header.php" ?>
        <div class="container-fluid">
            <?php require_once '../Library/connection.php';
                    $no     = 1;
                    $data   = mysqli_query($connection, "SELECT * FROM Books ORDER BY Books.id ASC") or
                                die($connection->error);
                
                    while($book = $data->fetch_assoc()) :
            ?>
            <div class="row" style="padding-top : 30px">
                <div class="col-sm-2"></div>
                <div class="col-sm-2 col-xs-12 contents-item">
                    <div class="row">
                        <div class="masonry-item col-sm-6 col-xs-12">
                            <div class="image-box image-hover bg-black text-center">
                                <div class="image">
                                    <a href="#">
                                        <img src="<?php echo "../Model/Images/Books/" . $book['book_picture']; ?>" class="wd-100p ht-auto" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card no-border col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"><?= $book['title'] ?></h5>
                                <p class="card-text"><?= substr($book['description'] , 0, 100);?></p>
                                <a href="#" class="btn btn-danger">See more details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php include "./layouts/footer.php" ?>