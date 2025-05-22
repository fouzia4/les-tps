<?php
session_start();


$valid_username = "admin";
$valid_password = "password123";


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


if ($username === $valid_username && $password === $valid_password) {
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    
  
    header('Location: welcome.php');
    exit;
} else {
  
    header('Location: login.html?error=1');
    exit;
}
?>