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
    <?php
        require_once '../../Library/connection.php';
        $id   = $_GET['edit'];
        $data = mysqli_query($connection, "SELECT * FROM Books WHERE id = '$id' ") or die(mysqli_error($connection));

        while($books = $data->fetch_assoc()) :
    ?>
    <div class="container">
        <h2>Simple Library System With Basic PHP</h2>
        <br>
        <a href="../index.php">Back</a>
        <br>
        <br>
        <h3>Add new Book</h3>
        <hr>
        <div class="row justify-content-center">
            <form action="../../Model/BookController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="upload_books_picture">Books Cover<span class="tx-danger">*</span></label>
                    <input type="hidden" name="books_oldimage" value="<?= $books['book_picture'] ?>">
                    <input type="file"   name="books_cover"    value="<?= $books['book_picture'] ?>"     class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="title">Book Title<span class="tx-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?= $books['title'] ?>" placeholder="Enter Book Title here" required>
                </div>
                <div class="form-group">
                    <label for="year">Publishing Year<span class="tx-danger">*</span></label>
                    <input type="text" name="year" class="form-control" value="<?= $books['year'] ?>" placeholder="Enter Book Publishing Year here" required>
                </div>
                <div class="form-group">
                    <label for="publisher">Publishing Companies<span class="tx-danger">*</span></label>
                    <input type="text" name="publisher" class="form-control" value="<?= $books['publisher'] ?>" placeholder="Enter Book Publishing Companies here " required>
                </div>
                <div class="form-group">
                    <label for="author">Author<span class="tx-danger">*</span></label>
                    <select name="author" id="author">
                        <?php
                            require_once './../../Library/connection.php';
                            $data = $connection->query("SELECT * FROM Authors") or die(mysqli_error($connection)); 

                            while($authors = $data->fetch_assoc()) :
                        ?>
                            <option value="<?= $authors['id'] ?>" ><?= $authors['fullname'] ?> </option>
                        <?php
                            endwhile;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" name="update_book">Save</button>
                </div>
            </form>
        </div>
    </div>
    <?php endwhile; ?>
    <?php include '../layouts/footer.php' ?>