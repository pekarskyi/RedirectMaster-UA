<?php
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include 'views/header' . $phpExt;
include 'sidebar' . $phpExt;

$link_id = $_GET['link_id'];

if (isset($_POST['update'])) {
    $connect->query("UPDATE `links` SET `link_url` = '?s', `project_id` = '?i', `comments` = '?s'
          WHERE link_id = '?i'", $_POST['link_url'], $_POST['project_id'], $_POST['comments'], $link_id);

    echo '<div id="notice">Зміни збережено</div>';
}

// Код статистики по редиректу
  if (isset($_POST['reset_link'])) {
    $connect->query("DELETE FROM visits WHERE link_id = '?i'", $link_id);
    $connect->query("UPDATE links SET link_visit = '0' WHERE link_id = '?i'", $link_id);
}

$linkInfo = $connect->query("SELECT * FROM links WHERE `link_id` = '?i'", $link_id);
$link = $linkInfo -> fetch_assoc();

?>

<?php include 'views/linkEditView' . $phpExt; ?>
