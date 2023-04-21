<?php
session_start();
include 'configProject.php';
if (!$_SESSION['authorization']) {
    header("Location: $domain_url/admin/");
    exit();
}
?>