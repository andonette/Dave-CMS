<?php
/*
The Template for the admin global header
*/
include '../includes/config.php';
include 'functions.php';
session_start();
ob_start();

//this is just checking if the user is an administrator
if (!isset($_SESSION['user_role'])) {
  if ($_SESSION['user_role'] !== 'Administrator') {
    //if not they can't access the admin page
    header("Location: ../index.php");
  }
}
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
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/84146e01c9.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Black Dashboard CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
    <link href="css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/scripts.js" type="text/javascript"></script>

</head>
<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
        <div class="logo">
            <a href="index.php" class="simple-text">
                <img src="../images/dave.png" alt="" class="img-fluid pr-5">
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
          <!--       <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fal fa-pencil-alt"></i>
                  <p>Posts</p>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="posts.php">View Posts</a>
                  <a class="dropdown-item" href="posts.php?source=create_post">Add New Post</a>
              </div>
          </li> -->
                <li>
                    <a href="posts.php">
                        <i class="fal fa-pencil-alt"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li>
                    <a href="categories.php">
                        <i class="fal fa-folder-open"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li>
                    <a href="comments.php">
                        <i class="fal fa-comment-smile"></i>
                        <p>Comments</p>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="fal fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <i class="fal fa-user-circle"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    <a href="./tables.html">
                        <i class="fal fa-cog"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li>
                    <a href="../">
                        <i class="fal fa-desktop"></i>
                        <p>Blog</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">

      <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
   <div class="container-fluid">
     <div class="navbar-wrapper">
       <div class="navbar-toggle d-inline">
         <button type="button" class="navbar-toggler">
           <span class="navbar-toggler-bar bar1"></span>
           <span class="navbar-toggler-bar bar2"></span>
           <span class="navbar-toggler-bar bar3"></span>
         </button>
       </div>
       <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
     </div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-bar navbar-kebab"></span>
       <span class="navbar-toggler-bar navbar-kebab"></span>
       <span class="navbar-toggler-bar navbar-kebab"></span>
     </button>
     <div class="collapse navbar-collapse" id="navigation">
       <ul class="navbar-nav ml-auto">
         <li class="search-bar input-group">
           <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
             <span class="d-lg-none d-md-block">Search</span>
           </button>
         </li>
         <li class="dropdown nav-item">
           <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
             <div class="notification d-none d-lg-block d-xl-block"></div>
             <i class="tim-icons icon-sound-wave"></i>
             <p class="d-lg-none">
               Notifications
             </p>
           </a>
           <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
             <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
             <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
             <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
             <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
             <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
           </ul>
         </li>
         <li class="dropdown nav-item">
           <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
             <div class="photo">
               <img src="https://placekitten.com/300/300" alt="Profile Photo">
             </div>
             <b class="caret d-none d-lg-block d-xl-block"></b>
             <p class="d-lg-none">
               Log out
             </p>
           </a>
           <ul class="dropdown-menu dropdown-navbar">
             <li class="nav-link"><a href="profile.php" class="nav-item dropdown-item">Profile</a></li>
             <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
             <li class="dropdown-divider"></li>
             <li class="nav-link"><a href="../includes/logout.php" class="nav-item dropdown-item">Log out</a></li>
           </ul>
         </li>
         <li class="separator d-lg-none"></li>
       </ul>
     </div>
   </div>
 </nav>
 <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <i class="tim-icons icon-simple-remove"></i>
         </button>
       </div>
     </div>
   </div>
 </div>
 <!-- End Navbar -->
