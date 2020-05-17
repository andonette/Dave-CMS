<?php
/*
The Template for the admin global header
*/
include '../includes/config.php';
include 'functions.php';
session_start();
ob_start();

check_admin();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Dave CMS. The Best CMS on The Planet</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--  Fonts and icons  -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/84146e01c9.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/core/jquery.min.js" type="text/javascript"></script>
    <!-- Black Dashboard CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
    <link href="assets/css/black-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="white-content">
    <div class="wrapper">
        <?php include 'side-nav.php' ?>
        <div class="main-panel">
        <?php include 'nav.php' ?>
