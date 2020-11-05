<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Relation Database</title>
    <link rel="stylesheet" href="../Assets/style/css/style.css">
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
    <div class="container">
        <h2>Basic Relation Database</h2>
        <br>
        <div class="row">
            <div class="col-md-3">
                <a href="./index_book.php">Back to Index</a>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-md-3">
                <a href="./author/add_author.php">Add new Author</a>
            </div>
        </div>
        <br>
        <br>
        <h3>Author List</h3>
        <hr>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Education</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once '../Library/connection.php';
                    $no = 1;
                    $data = mysqli_query($connection, "SELECT * FROM Authors ORDER BY Authors.fullname ASC") or 
                            die($connection->error);

                    if($data->num_rows) {
                        while($author = $data->fetch_assoc()) :
                ?>
                    <tr>
                        <td><?php echo $no++                    ?></td>
                        <td>
                            <a href="./author/author_profile.php?detail=<?= $author['id']; ?>">
                                <?php echo $author['fullname'];         ?>
                            </a>
                        </td>
                        <td><?php echo $author['living_address'];      ?></td>
                        <td><?php echo $author['phone_number']; ?></td>
                        <td><?php echo $author['education'];    ?></td>
                        <td>
                            <a href="./author/edit_author.php?edit=<?php echo $author['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="../Model/AuthorController.php?delete=<?php echo $author['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                        endwhile;
                    } else {
                ?>
                    <tr>
                        <td>There is no Data on your database</td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include "./layouts/footer.php" ?>