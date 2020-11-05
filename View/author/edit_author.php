<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/style/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Library System</title>
</head>
<body>
    <?php include '../layouts/header.php' ?>
    <?php
        require_once '../../Library/connection.php';
        $id   = $_GET['edit'];
        $data = mysqli_query($connection, "SELECT * FROM Authors WHERE id= '$id' ") or die(mysqli_error($connection));
        while($authors = $data->fetch_assoc()) {
    ?>
    <div class="container">
        <h2>Simple Library System With Basic PHP</h2>
        <br>
        <a href="../index_author.php">Back</a>
        <br>
        <br>
        <h3>Edit Author</h3>
        <hr>
        <div class="row justify-content-center">
            <form action="../../Model/AuthorController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="upload_images">Author Images<span class="tx-danger">*</span></label>
                    <input type="hidden" name="oldimage" value="<?= $authors['picture'] ?>">
                    <input type="file"   name="upload_image" class="form-control" value="<?php echo $authors['picture'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">Name<span class="tx-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="<?php echo $authors['fullname'] ?>" placeholder="Enter Author Name here" required>
                </div>
                <div class="form-group">
                    <label for="address">Address<span class="tx-danger">*</span></label>
                    <input type="text" name="address" class="form-control"  value="<?php echo $authors['living_address'] ?>" placeholder="Enter Author Address here" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number<span class="tx-danger">*</span></label>
                    <input type="text" name="phone_number" class="form-control"  value="<?php echo $authors['phone_number'] ?>" placeholder="Enter Author Phone Number here" required>
                </div>
                <div class="form-group">
                    <label for="education">Education<span class="tx-danger">*</span></label>
                    <input type="text" name="education" class="form-control"  value="<?php echo $authors['education'] ?>" placeholder="Enter Author Education here" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" name="update_author"> Update Author</button>
                </div>
            </form>
        </div>
    </div>
    <?php } ?>
    <?php include '../layouts/footer.php' ?>