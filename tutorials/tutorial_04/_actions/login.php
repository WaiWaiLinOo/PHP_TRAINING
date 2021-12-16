<?php
session_start();
$name = $_POST['name'];
$password = $_POST['password'];
if ($name === 'wailinoo' and $password === '123') {
  $_SESSION['user'] = ['username' => 'wailinoo'];
  header('location: ../profile.php');
} else {
  header('location: ../index.php?incorrect=1');
}
