<?php
define('ROOT', dirname(__DIR__));
//error_reporting(E_ALL);
//ini_set('display_startup_errors', 1);
//ini_set('display_errors', '1');
include 'configProject.php';
include 'views/header.php';
include 'sidebar.php';
$user_id = $_GET['user_id'];

#Зміна користувача
if (isset($_POST['update'])) {
    $connect->query("UPDATE `users` SET `first_name` = '?s', `last_name` = '?s', `user_email` = '?s', `user_login` = '?s'
      WHERE user_id = '?i'", $_POST['first_name'], $_POST['last_name'], $_POST['user_email'], $_POST['user_login'], $user_id);
    echo '<div id="notice">Зміни збережено</div>';
}

if (isset($_POST['user_password'])) {
    $connect->query("UPDATE `users` SET `user_password` = '?s' WHERE user_id = '?i'", md5($_POST['user_password']), $user_id);
}

$userInfo = $connect->query("SELECT * FROM users WHERE `user_id` = '?i'", $user_id);
$user = $userInfo -> fetch_assoc();

?>

<?php include 'views/userSettingsView' . $phpExt; ?>