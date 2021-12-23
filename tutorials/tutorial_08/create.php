<!DOCTYPE html>
<html>

<head>
    <title>Create Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="php/create.php" method="post">
            <h4 class="display-4 text-center">Create Page</h4>
            <hr><br>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="name" class="form-control" id="fname" name="fname" value="<?php if (isset($_GET['fname'])) echo ($_GET['fname']); ?>" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="name" class="form-control" id="lname" name="lname" value="<?php if (isset($_GET['lname'])) echo ($_GET['lname']); ?>" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_GET['email'])) echo ($_GET['email']); ?>" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phnumber">Ph number</label>
                <input type="num" class="form-control" id="phnumber" name="phnumber" value="<?php if (isset($_GET['phnumber'])) echo ($_GET['phnumber']); ?>" placeholder="Enter phnumber">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="name" class="form-control" id="address" name="address" value="<?php if (isset($_GET['address'])) echo ($_GET['address']); ?>" placeholder="Enter your address">
            </div>
            <button type="submit" class="btn btn-primary" name="create">Create</button>
            <a href="index.php" class="link-primary">View</a>
        </form>
    </div>
</body>

</html>