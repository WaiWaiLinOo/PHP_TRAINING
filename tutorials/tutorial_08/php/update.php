<?php

if (isset($_GET['id'])) {
    include "db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: read.php");
    }
} else if (isset($_POST['update'])) {
    include "../db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $phnumber = validate($_POST['phnumber']);
    $address = validate($_POST['address']);
    $id = validate($_POST['id']);
    if (empty($fname)) {
        header("Location: ../update.php?id=$id&error=First name is required");
    } else if (empty($lname)) {
        header("Location: ../update.php?id=$id&error=Last name is required");
    } else if (empty($email)) {
        header("Location: ../update.php?id=$id&error=Email is required");
    } else if (empty($phnumber)) {
        header("Location: ../update.php?id=$id&error=Phnumber is required");
    } else if (empty($address)) {
        header("Location: ../update.php?id=$id&error=Address is required");
    } else {
        $sql = "UPDATE users
               SET fname='$fname', lname='$lname', email='$email', phnumber='$phnumber', address='$address'
               WHERE id=$id ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../read.php?success=successfully updated");
        } else {
            header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: read.php");
}
