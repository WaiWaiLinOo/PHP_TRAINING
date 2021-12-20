<?php
if ($error) {
    header('location: ../index.php?error=file');
    exit();
}
if (isset($_POST["submit"])) {
    $foldername = $_POST['foldername'];
    $structure = dirname(__FILE__) . DIRECTORY_SEPARATOR . $foldername;
    if (!mkdir($structure, 0777, true)) {
        header('location: ../index.php?error=type');
    }
    $target_dir = "$structure/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
}
if (file_exists($target_file)) {
    $uploadOk = 0;
    header('location: ../index.php?error=type');
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
    header('location: ../index.php?error=type');
}
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $uploadOk = 0;
    header('location: ../index.php?error=type');
}
if ($uploadOk == 0) {
    header('location: ../index.php?error=type');
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header('location: ../index.php');
    } else {
        header('location: ../index.php?error=type');
    }
}
