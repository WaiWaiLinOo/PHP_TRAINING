<?php include 'php/update.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="php/update.php" method="post">
            <h4 class="display-4 text-center">Update</h4>
            <hr><br>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="year">Enter Year</label>
                <input type="name" class="form-control" id="year" name="year" value="<?= $row['year'] ?>">
            </div>
            <div class="form-group">
                <label for="age">Enter age</label>
                <input type="name" class="form-control" id="age" name="age" value="<?= $row['age'] ?>">
            </div>
           
            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="index.php" class="link-primary">View</a>
        </form>
    </div>
</body>

</html>