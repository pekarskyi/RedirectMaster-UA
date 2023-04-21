<?php
session_start();
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include '../inc/config' . $phpExt;

if (isset($_POST['email']) AND isset($_POST['password'])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $result = $connect -> query("SELECT * FROM users WHERE user_email='?s' AND user_password='?s'", $user_email, md5($user_password));
    $count = $result -> fetch_assoc();

    if (count((array) $count) > 0) {
        $_SESSION['authorization'] = $count['user_id'];
    }else{
        echo '<div id="notice">Невірний логін або пароль</div>';

    }
}

if(isset($_SESSION['authorization'])) {
    header("Location: /admin/dashboard");
}
else{
    require 'views/authHead' . $phpExt;
    require 'views/authForm' . $phpExt;
}
?>