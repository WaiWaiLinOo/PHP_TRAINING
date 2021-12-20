<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 6</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container border border-primary mt-5">
        <h1 class="text-center mt-3">Image uploaded form</h1>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                Cannot upload file!
            </div>
        <?php endif ?>
        <div class="m-4">
            <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" class="form-control mb-3" id="fileToUpload">
                <input type="text" class="form-control mb-3" name="foldername" placeholder="Enter Your folder name">
                <input type="submit" class="btn btn-outline-primary" name="submit" value="Create Folder and upload image">
            </form>
        </div>
    </div>
</body>

</html>