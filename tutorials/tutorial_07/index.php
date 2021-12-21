<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_7</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container border border-warning mt-5">
        <h1 class="text-center m-3">Create Your QR code</h1>
        <div class="m-4">
            <form action="#" method="post">
                <input type="text" class="form-control mb-4" name="name" placeholder="Enter your name..." required>
                <input type="text" class="form-control mb-4" name="text" placeholder="Enter your QR text..." required>
                <input type="submit" class="btn btn-outline-warning" name="submit">
            </form>
        </div>
        <?php
        include("phpqrcode/qrlib.php");
        if (isset($_POST['submit'])) {
            $path = 'img/';
            $file = $path . $_POST['name'] . '.png';
            $text = $_POST['text'];
            echo '<center>' . $_POST['name'] . " QR code is here</center>";
        ?>
            <center><img class="img-thumbnail m-3" src='img/<?php echo $_POST['name'] ?>.png'></center>
        <?php
            QRcode::png($text, $file);
        }
        ?>
    </div>
</body>

</html>