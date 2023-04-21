<?php
define('ROOT', __DIR__);
include (ROOT . '/inc/config.php');


$link_id = $_GET['link_id'];
$http_referer = $_SERVER['HTTP_REFERER'];
$http_user_agent = $_SERVER['HTTP_USER_AGENT'];

$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;

$linkInfo = $connect->query("SELECT * FROM links WHERE `link_id` = '?s' OR `url_name` = '?s'", $link_id, $link_id);
$link = $linkInfo->fetch_assoc();

$link_id = $link['link_id'];

$connect->query("UPDATE `links` SET `link_visit` = link_visit + 1 WHERE link_id = '?s'", $link_id);

$connect->query("INSERT INTO `visits` SET `http_referer` = '?s', `visit_ip` = '?s',
        `http_user_agent` = '?s', `link_id` = '?s'", $http_referer, $ip, $http_user_agent, $link_id);

$link_url = $link['link_url'];

header('Location: ' .$link_url);

?>