<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/style/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Library System</title>
</head>
<body>
    <?php require_once '../../Model/AuthorController.php' ?>
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
    <?php include "../layouts/header.php" ?>
        <div class="container-fluid">
            <div class="row" style="padding-top : 30px">
                <?php require_once '../../Library/connection.php';
                        $no     = 1;
                        $data   = mysqli_query($connection, "SELECT * FROM Books ORDER BY Books.id ASC") or
                                    die($connection->error);
                    
                        while($book = $data->fetch_assoc()) :
                ?>
                <div class="card no-border col-md-3 mg-30">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book['title'] ?></h5>
                        <p class="card-text"><?= substr($book['description'] , 0, 100);?></p>
                        <a href="#" class="btn btn-danger">See more details</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
       
        </div>
    <?php include "../layouts/footer.php" ?>