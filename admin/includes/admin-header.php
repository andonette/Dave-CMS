<?php ob_start(); ?>
<?php include '../includes/db.php'; ?>
<?php include 'admin-functions.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--  Fonts and icons  -->
      <!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
<script src="https://kit.fontawesome.com/84146e01c9.js" crossorigin="anonymous"></script>

    <!-- Black Dashboard CSS -->
    <link href="css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  </head>
  <body>
<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href="#" class="simple-text logo-mini">
        Dave
      </a>

      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
       Dave
      </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <i class="fa fa-star"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Posts >
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="admin-posts.php">View Posts</a>
           <a class="dropdown-item" href="admin-posts.php?source=create_post">Add New Post</a>
         </div>
       </li>
          <li>
            <a href="admin-categories.php">
              <i class="tim-icons icon-pin"></i>
              <p>Categories</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="tim-icons icon-bell-55"></i>
              <p>Users</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="tim-icons icon-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Admin</p>
            </a>
          </li>
          <li>
            <a href="../">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Front End</p>
            </a>
          </li>

        </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">

          <a class="navbar-brand" href="#pablo">Dashboard</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="tim-icons icon-bell-55"></i>  Notifications
              </a>
            </li>
             <!-- your navbar here -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
