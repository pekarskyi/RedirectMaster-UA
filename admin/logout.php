<?php
    session_start();
    include 'configProject.php';
    unset($_SESSION['authorization']);
    session_destroy();
    header("Location: /admin/");
?>