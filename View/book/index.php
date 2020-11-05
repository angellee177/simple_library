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
    <?php include '../layouts/header.php' ?>
    <?php require_once '../Model/BookController.php' ?>
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type'] ?> ">
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif?>
    <div class="container">
        <h2>Basic Relation Database</h2>
        <br>
        <a href="../View/author/add_author.php">Add new Author</a>
        <a href="../View/book/add_book.php">Add new Book</a>
        <a href="../View/index_author.php">Author list</a>
        <br>
        <br>
        <h3>Book List</h3>
        <hr>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Publisher</th>
                        <th>Author</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include './../Library/connection.php';

                    $no = 1;
                    $data = $connection->query("SELECT * FROM Authors JOIN Books ON Authors.id =  Books.id_author ORDER BY Books.title ASC") or 
                            die($connection->error);

                    if($data->num_rows) {
                        while($books = $data->fetch_array()) :
                ?>
                    <tr>
                        <td><?php echo $no++                    ?></td>
                        <td><?php echo $books['title'];         ?></td>
                        <td><?php echo $books['year'];      ?></td>
                        <td><?php echo $books['publisher']; ?></td>
                        <td><?php echo $books['fullname'];    ?></td>
                        <td>
                            <a href="../View/book/edit_book.php?edit=<?php echo $books['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="../Model/BookController.php?delete=<?php echo $books['id']; ?>" class="btn btn-danger">Delete</a>
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
        <div class="row justify-content-center">
            <h3>Inner Join</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Publisher</th>
                        <th>Author</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include './../Library/connection.php';

                    $no = 1;
                    $data = $connection->query("SELECT * FROM Authors INNER JOIN Books ON Authors.id =  Books.id_author ORDER BY Books.title ASC") or 
                            die($connection->error);

                    if($data->num_rows) {
                        while($books = $data->fetch_array()) :
                ?>
                    <tr>
                        <td><?php echo $no++                    ?></td>
                        <td><?php echo $books['title'];         ?></td>
                        <td><?php echo $books['year'];      ?></td>
                        <td><?php echo $books['publisher']; ?></td>
                        <td><?php echo $books['fullname'];    ?></td>
                        <td>
                            <a href="../View/book/edit_book.php?edit=<?php echo $books['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="../Model/BookController.php?delete=<?php echo $books['id']; ?>" class="btn btn-danger">Delete</a>
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
    <?php include '../layouts/footer.php' ?>