<!DOCTYPE html>
<html>

<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="php/create.php" method="post">
            <h4 class="display-4 text-center">Create.</h4>
            <hr><br>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="year">Enter Year</label>
                <input type="name" class="form-control" id="year" name="year" value="<?php if (isset($_GET['year']))
                                                                                            echo ($_GET['year']); ?>" placeholder="Enter your year">
            </div>
            <div class="form-group">
                <label for="age">Enter age</label>
                <input type="name" class="form-control" id="age" name="age" value="<?php if (isset($_GET['age']))
                                                                                            echo ($_GET['age']); ?>" placeholder="Enter your age">
            </div>
           <button type="submit" class="btn btn-primary" name="create">Create</button>
            <a href="index.php" class="link-primary">View</a>
        </form>
    </div>
</body>

</html>