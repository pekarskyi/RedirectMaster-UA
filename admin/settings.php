<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');
define('ROOT', dirname(__DIR__));
include 'configProject.php';
include 'views/header' . $phpExt;
// Settings update
if (isset($_POST['update'])) {
    $connect->query("UPDATE `settings` SET `domain_redirect` = '?s', `head_footer_color` = '?s',  `sidebar_color` = '?s'
        WHERE `id` = '1'", $_POST['domain_redirect'], $_POST['head_footer_color'], $_POST['sidebar_color']);
}

// default style
if (isset($_POST['default'])) {

    $bg_default = '#40495f';

    $connect->query("UPDATE `settings` SET `head_footer_color` = '?s',
        `sidebar_color` = '?s' WHERE `id` = '1'", $bg_default, $bg_default);
}

$settings_query = $connect -> query("SELECT * FROM `settings` WHERE `id` = '1'");
$settings = $settings_query -> fetch_assoc();
$domain_redirect = $settings['domain_redirect'];
$head_footer_color = $settings['head_footer_color'];
$sidebar_color = $settings['sidebar_color'];

include 'sidebar' . $phpExt;
?>

<?php include 'views/settingsView' . $phpExt; ?>