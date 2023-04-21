<?php
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include 'views/header' . $phpExt;

$project_id = $_GET['id'];
# обновление имени проекта
if (isset($_POST['update_name_project'])) {
    $connect -> query("UPDATE `project` SET `project_name` = '?s' WHERE `project_id` = '?i'", $_POST['project_name'], $project_id);
}
# Удаление проекта
if (isset($_POST['delete_project_id'])) {
    $connect -> query("DELETE FROM `project` WHERE `project_id` = '?i'", $_POST['delete_project_id']);
    $project_links_info = $connect -> query("SELECT * FROM `links` WHERE `project_id` = '?i'", $_POST['delete_project_id']);
    if ($project_links_info) {
        while (($link = $project_links_info->fetch_assoc()) !== null) {
            $connect -> query("DELETE FROM `visits` WHERE `link_id` = '?i'", $link['link_id']);
            $links[] = $link;
        }
    }
    $connect -> query("DELETE FROM `links` WHERE `project_id` = '?i'", $_POST['delete_project_id']);
}
include 'sidebar.php';

$project_Info = $connect -> query("SELECT * FROM project WHERE `project_id` = '?i'", $project_id);
$project = $project_Info -> fetch_assoc();
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

$query = $connect -> query("SELECT * FROM `links` WHERE project_id = '?i' ORDER BY link_id DESC", $project_id);
//создаем пустой массив, в который будем записывать посты
$cats = array();
//Проверяем, если запрос вернул false, то проходим в цикле по всем элементам и добавляем их в массив $posts
if ($query) {
    while (($project_row = $query -> fetch_assoc()) !== null){
        $cats[] = $project_row;
    }
}

$links_number = $connect -> query("SELECT COUNT(1) FROM links WHERE `project_id` = '?i'", $project_id);
$num_links = $links_number -> fetch_row();

$visits_number = $connect -> query("SELECT SUM(link_visit) FROM links WHERE `project_id` = '?i'", $project_id);
$num_visits = $visits_number -> fetch_row();

?>

<?php include 'views/projectDetail' . $phpExt; ?>