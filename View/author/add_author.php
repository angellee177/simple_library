<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Library System</title>
</head>
<body>
    <div class="container">
        <h2>Simple Library System With Basic PHP</h2>
        <br>
        <a href="../index_author.php">Back</a>
        <br>
        <br>
        <h3>Add new Author</h3>
        <hr>
        <div class="row justify-content-center">
            <form action="../../Model/AuthorController.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="upload_images">Author Images<span class="tx-danger">*</span></label>
                    <input type="file" name="upload_image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Name<span class="tx-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Author Name here" required>
                </div>
                <div class="form-group">
                    <label for="address">Address<span class="tx-danger">*</span></label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Author Address here" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number<span class="tx-danger">*</span></label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Enter Author Phone Number here" required>
                </div>
                <div class="form-group">
                    <label for="education">Education<span class="tx-danger">*</span></label>
                    <input type="text" name="education" class="form-control" placeholder="Enter Author Education here" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="save_author">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>