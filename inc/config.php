<?php
use Krugozor\Database\Mysql\Mysql as Mysql;
include(ROOT . '/admin/MySQLlib/dbAccess.php');
include(ROOT . '/admin/MySQLlib/Mysql.php');
include(ROOT . '/admin/MySQLlib/Statement.php');
include(ROOT . '/admin/MySQLlib/Exception.php');


$connect = Mysql::create($db_host, $db_user, $db_password)->setDatabaseName($database)->setCharset("utf8");

$user_id = isset($_SESSION['authorization']) ? $_SESSION['authorization'] : '';
//$user_id = $_SESSION['authorization'];

$users = $connect -> query("SELECT * FROM `users` WHERE `user_id` = '?s'", $user_id);
$row = $users -> fetch_assoc();

//php 7.4
$user_id = isset($row['user_id']) ? $row['user_id'] : '';
$user_email = isset($row['user_email']) ? $row['user_email'] : '';
$first_name = isset($row['first_name']) ? $row['first_name'] : '';
$last_name = isset($row['last_name']) ? $row['last_name'] : '';

//php 7.3
//$user_id = $row['user_id'];
//$user_email = $row['user_email'];
//$first_name = $row['first_name'];
//$last_name = $row['last_name'];

// settings
$settings_query = $connect -> query("SELECT * FROM `settings` WHERE `id` = '1'");
$settings = $settings_query -> fetch_assoc();
$domain_redirect = $settings['domain_redirect'];
$head_footer_color = $settings['head_footer_color'];
$sidebar_color = $settings['sidebar_color'];

// Домен у вигляді mysite.com
$domain = "mysite.com";

// Повна адреса сайту, без слешу, у вигляді https://mysite.com
$domain_url = "https://mysite.com";

?>