<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/style/css/style.css">
</head>
<body>
    <?php include '../layouts/header.php' ?>
    <?php 
        require_once '../../Library/connection.php';
        $id           = $_GET['detail'];
        $get_author   = mysqli_query($connection, "SELECT * FROM Authors WHERE id='$id' ") or die(mysqli_error($connection));
        while($author_detail = $get_author->fetch_assoc()) :
    ?>
    <div class="container">
        <div class="row" style="margin-top: 40px">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <h4>Author Detail</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <img class="sizes" src="<?php echo "../../Model/Images/Authors/". $author_detail['picture']; ?>" alt="">
            </div>
            <div class="col-md-3">
                <p style="float: left">Author Name: <?= $author_detail['fullname'] ?></p>
                <p style="float: left">Living Address: <?= $author_detail['living_address'] ?></p>
                <p style="float: left">Phone Number: <?= $author_detail['phone_number'] ?></p>
                <p style="float: left">Education: <?= $author_detail['education'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <a href="../author/edit_author.php?edit=<?= $author_detail['id']; ?>" class="btn btn-info">Edit</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
            <a href="../index_author.php" class="btn btn-primary">Back to Author List</a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php include '../layouts/footer.php' ?>