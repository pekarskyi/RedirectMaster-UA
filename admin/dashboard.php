<?php
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include "views/header" . $phpExt;
include 'sidebar' . $phpExt;

// Добавляем редирект в базу
if (isset($_POST['send'])) {
    #ищем дубль
    $find_double = $connect -> query("SELECT * FROM `links` WHERE `url_name` = '?s'", $_POST['url_name']);
    $info_d = $find_double->fetch_assoc();
    if(count((array) $info_d) > 0 AND $_POST['url_name'] != ''){
        echo '<div id="notice">Редирект із такою URL-адресою вже існує</div>';
    }
    else{
        #если нет, то добавляем в базу
        $connect -> query("INSERT INTO `links` SET `link_url` = '?s',`project_id` = '?i',`url_name` = '?s',`comments` = '?s'",
        $_POST['link_url'], $_POST['project_id'], $_POST['url_name'], $_POST['comments']);
        echo '<div id="notice">Редирект успішно створено</div>';
    }
}
// Делаем вывод редиректов

$query = $connect->query("SELECT * FROM `links` ORDER BY link_id DESC LIMIT 15");
//создаем пустой массив, в который будем записывать посты
$cats = array();
//Проверяем, если запрос вернул false, то проходим в цикле по всем элементам и добавляем их в массив $posts
if ($query) {
    while (($data = $query -> fetch_assoc()) !== null){
        $cats[] = $data;
    }
}

// Статистика
$projects_number = $connect -> query("SELECT COUNT(1) FROM project");
$num_projects = $projects_number -> fetch_row();

$links_number = $connect -> query("SELECT COUNT(1) FROM links");
$num_links = $links_number -> fetch_row();

$visits_number = $connect -> query("SELECT COUNT(1) FROM visits");
$num_visits = $visits_number -> fetch_row();
?>

<?php include 'views/dashboardView' . $phpExt; ?>