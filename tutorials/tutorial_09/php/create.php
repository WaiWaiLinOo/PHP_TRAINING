<?php

if (isset($_POST['create'])) {
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
    $year = validate($_POST['year']);
    $age = validate($_POST['age']);
    $user_data = 'fname=' . $fname . '&lname=' . $lname . '&email=' . $email . '&phnumber=' . $phnumber . '&address=' . $address . '&year=' . $year . '&age=' . $age;
    if (empty($fname)) {
        header("Location: ../create.php?error= First name is required&$user_data");
    } else if (empty($lname)) {
        header("Location: ../create.php?error= Last name is required&$user_data");
    } else if (empty($email)) {
        header("Location: ../create.php?error= Email is required&$user_data");
    } else if (empty($phnumber)) {
        header("Location: ../create.php?error= Phnumber is required&$user_data");
    } else if (empty($address)) {
        header("Location: ../create.php?error= Address is required&$user_data");
    } else if (empty($year)) {
        header("Location: ../create.php?error= Year is required&$user_data");
    } else if (empty($age)) {
        header("Location: ../create.php?error= Age is required&$user_data");
    } else {
        $sql = "INSERT INTO users(fname, lname, email, phnumber, address,year,age) 
               VALUES('$fname','$lname', '$email','$phnumber','$address','$year','$age')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../index.php?success=successfully created");
        } else {
            header("Location: ../create.php?error=unknown error occurred&$user_data");
        }
    }
}
