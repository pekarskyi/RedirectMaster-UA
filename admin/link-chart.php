<?php
//error_reporting (E_ALL ^ E_NOTICE);
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include 'views/header' . $phpExt;
include 'sidebar' . $phpExt;

$link_id = $_GET['link_id'];

// ПОСТРАНИЧНАЯ НАВИГАЦИЯ
$num = 30;
$page = isset($_POST['page']) ? $_POST['page'] : '';
//$page = $_GET['page'];

// Определяем общее количество постов в базе данных 
$postnumber = $connect -> query("SELECT COUNT(1) FROM visits WHERE link_id = '?i'", $link_id);
$postnumber_result = $postnumber -> fetch_row();
$postcount = $postnumber_result[0];

// Находим общее число страниц 
$total = intval(($postcount - 1) / $num) + 1;
$page = intval($page); 
if(empty($page) or $page < 0) $page = 1; 
if($page > $total) $page = $total; 
// Вычисляем начиная к какого номера 
// следует выводить сообщения 
$start = $page * $num - $num; 

$query = $connect -> query("SELECT * FROM `visits` WHERE link_id = '$link_id' LIMIT $start, $num");
//создаем пустой массив, в который будем записывать посты
$cats = array();
//Проверяем, если запрос вернул false, то проходим в цикле по всем элементам и добавляем их в массив $posts
if ($query) {
    while (($project_row = $query -> fetch_assoc()) !== null){
        $cats[] = $project_row;
    }
}

// Статистика
$link_visits_number = $connect -> query("SELECT COUNT(1) FROM visits WHERE link_id = '?i'", $link_id);
$num_all_visits = $link_visits_number -> fetch_row();

$link_visits_today = $connect -> query("SELECT COUNT(1) FROM visits WHERE DATE(`visit_date`) = CURDATE() AND link_id = '$link_id'");
$num_today_visits = $link_visits_today -> fetch_row();

$visits_seven_days = $connect -> query("SELECT COUNT(1) FROM visits WHERE DATE(`visit_date`) > CURDATE()-INTERVAL 7 DAY AND link_id = '$link_id'");
$num_seven_days = $visits_seven_days -> fetch_row();

$visits_three_days = $connect -> query("SELECT COUNT(1) FROM visits WHERE DATE(`visit_date`) > CURDATE()-INTERVAL 3 DAY AND link_id = '$link_id'");
$num_three_days = $visits_three_days -> fetch_row();

$visits_thirty_days = $connect -> query("SELECT COUNT(1) FROM visits WHERE DATE(`visit_date`) > CURDATE()-INTERVAL 30 DAY AND link_id = '$link_id'");
$num_thirty_days = $visits_thirty_days -> fetch_row();

?>

<?php include 'views/statisticLink' . $phpExt; ?>