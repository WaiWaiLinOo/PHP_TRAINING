<?php

include "connection.php";
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($con, $sql);
