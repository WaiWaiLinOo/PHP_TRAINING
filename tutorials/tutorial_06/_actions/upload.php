<?php
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];
if ($error) {
    header('location: ../index.php?error=file');
    exit();
}
if (isset($_POST['submit']) && $_POST['submit']) {
    $foldername = $_POST['foldername'];
    $structure = dirname(__FILE__) . DIRECTORY_SEPARATOR . $foldername;
    if (!mkdir($structure, 0777, true)) {
        header('location: ../index.php?error=type');
    } elseif ($type === "image/jpeg" or $type === "image/png") {
        move_uploaded_file($tmp, "$structure/profile.jpg");
        header('location: ../index.php');
    } else {
        header('location: ../index.php?error=type');
    }
}
