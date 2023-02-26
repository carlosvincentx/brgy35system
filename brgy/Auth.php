<?php
if(session_status() === PHP_SESSION_NONE)
session_start();
$link = $_SERVER['PHP_SELF'];
if(!strpos($link,'Login.php') && !strpos($link,'Login_verification.php') && !strpos($link,'Registration.php') && !isset($_SESSION['user_login'])){
echo "<script>location.replace('./Login.php');</script>";
}
if(strpos($link,'Login_verification.php') && !isset($_SESSION['otp_verify_user_id'])){
    echo "<script>location.replace('./Login.php');</script>";
}
if(strpos($link,'Login.php') > -1 && isset($_SESSION['user_login'])){
echo "<script>location.replace('./');</script>";
}