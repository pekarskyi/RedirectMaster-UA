<?php
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include 'views/header.php';
include 'sidebar.php';

// Создаем пользователя

if (isset($_POST['user_create'])) {
    $connect->query("INSERT INTO `users` SET `first_name` = '?s', `last_name` = '?s',
        `user_email` = '?s', `user_login` = '?s', `user_password` = '?s'", $_POST['first_name'], $_POST['last_name'], $_POST['user_email'], $_POST['user_login'], md5($_POST['user_password']));
}

// Делаем вывод пользователей
$query = $connect->query("SELECT * FROM `users`");
//создаем пустой массив, в который будем записывать пользователей
$cats = array();
//Проверяем, если запрос вернул false, то проходим в цикле по всем элементам и добавляем их в массив $posts
if ($query) {
    while (($row = $query -> fetch_assoc()) !== null){
        $cats[] = $row;
    }
}

?>

<?php include 'views/usersView' . $phpExt; ?>