<?php

if (isset($_POST['create'])) {
    include "../connection.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $year = validate($_POST['year']);
    $age = validate($_POST['age']);
    $user_data = 'year=' . $year . '&age=' . $age;
    if (empty($year)) {
        header("Location: ../index.php?error= Year is required&$user_data");
    } else if (empty($age)) {
        header("Location: ../index.php?error= Age is required&$user_data");
    } else {
        $sql = "INSERT INTO users(year,age) 
               VALUES('$year','$age')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location: ../index.php?success=successfully created");
        } else {
            header("Location: ../create.php?error=unknown error occurred&$user_data");
        }
    }
}
