<?php
/*
Site Header
*/
include 'includes/config.php';
include 'functions.php';
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dave CMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/84146e01c9.js" crossorigin="anonymous"></script>

    <!-- BLK• CSS -->
    <link type="text/css" href="css/blk-design-system.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">Dave</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php category_nav(); ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="registration.php">Register</a>
                    </li>
                    <?php show_update(); ?>
                </ul>
            </div>
        </div>
    </nav>
