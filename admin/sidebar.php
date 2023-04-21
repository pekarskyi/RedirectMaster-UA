<?php
include 'configProject.php';
// Код удаления пользователя
if (isset($_POST['delete_user'])) {
    if ($_POST['delete_user'] != '1') {
        $result = $connect -> query("DELETE FROM users WHERE user_id = '?s'", $_POST['delete_user']);
    }
}
// Код удаления редиректа
if (isset($_POST['delete_link_id'])) {
    $result = $connect -> query("DELETE FROM links WHERE link_id = '?i'", $_POST['delete_link_id']);
    $result2 = $connect -> query("DELETE FROM visits WHERE link_id = '?i'", $_POST['delete_link_id']);
}
// Код добавления проекта
if (isset($_POST['project_send'])) {
    $connect -> query("INSERT INTO `project` SET `project_name` = '?s'", $_POST['project_name']);
}

$project_query = $connect -> query("SELECT * FROM `project` ORDER BY project_id DESC");

//Проверяем, если запрос вернул false, то проходим в цикле по всем элементам и добавляем их в массив $posts
if ($project_query) {
    while (($project_row = $project_query -> fetch_assoc()) !== null){
        $project_info[] = $project_row;
    }
}
?>

<?php include 'views/projectsSidebar' . $phpExt; ?>
