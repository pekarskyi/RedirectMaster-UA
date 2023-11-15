<?php

include("session.php");
include 'configProject.php';
include("../inc/config.php");

?>

<!DOCTYPE html>
<html lang="uk">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo $domain_url; ?>/images/link.png" type="image/png">
    <title>Редирект-Майстер – Панель управління</title>
    <link rel="stylesheet" href="<?php echo $domain_url; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $domain_url; ?>/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/images/link-svgrepo-com.svg">

    <script src="<?php echo $domain_url; ?>/js/jquery-3.4.1.min.js"></script>

    <script src="<?php echo $domain_url; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $domain_url; ?>/js/system.js"></script>
</head>

<style>
  .bg-default { background-color: <?php echo $head_footer_color; ?>; }
  .bg-sidebar { background-color: <?php echo $sidebar_color; ?>; }
</style>

<body>

<div class="container-fluid bg-default border-bottom">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="<?php echo $domain_url; ?>/admin/dashboard"><?php echo $first_name.' '.$last_name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo $domain_url; ?>/admin/dashboard">Головна</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo $domain_url; ?>/admin/users">Користувачі</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo $domain_url; ?>/admin/settings">Налаштування</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo $domain_url; ?>/admin/system">Про систему</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo $domain_url; ?>/admin/logout"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>
</div>
</div>

<div class="container my-5 bg-white">

