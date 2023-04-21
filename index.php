<?php
define('ROOT', __DIR__);
include (ROOT . '/inc/config.php');

if ($domain_redirect != '') {
    header('Location: ' .$domain_redirect);
}
?>