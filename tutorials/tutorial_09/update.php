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
            <h4 class="display-4 text-center">Update Page</h4>
            <hr><br>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="fname">First name</label>
                <input type="name" class="form-control" id="fname" name="fname" value="<?= $row['fname'] ?>">
            </div>
            <div class="form-group">
                <label for="lname">Last name</label>
                <input type="name" class="form-control" id="lname" name="lname" value="<?= $row['lname'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
            </div>
            <div class="form-group">
                <label for="phnumber">Ph.no</label>
                <input type="num" class="form-control" id="phnumber" name="phnumber" value="<?= $row['phnumber'] ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="name" class="form-control" id="address" name="address" value="<?= $row['address'] ?>">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="name" class="form-control" id="year" name="year" value="<?= $row['year'] ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="name" class="form-control" id="age" name="age" value="<?= $row['age'] ?>">
            </div>
            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="index.php" class="link-primary">View</a>
        </form>
    </div>
</body>

</html>