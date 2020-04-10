<?php ob_start(); ?>
<?php include '../includes/config.php'; ?>
<?php include 'admin-functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <title>Dave CMS. The Best CMS on The Planet</title>
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
        <div class="logo">
            <a href="admin-index.php" class="simple-text">
                <img src="../images/dave.png" alt="" class="img-fluid pr-5">
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fal fa-pencil-alt"></i>
                        <p>Posts</p>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="admin-posts.php">View Posts</a>
                        <a class="dropdown-item" href="admin-posts.php?source=create_post">Add New Post</a>
                    </div>
                </li>
                <li>
                    <a href="admin-categories.php">
                        <i class="fal fa-folder-open"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li>
                    <a href="admin-comments.php">
                        <i class="fal fa-comment-smile"></i>
                        <p>Comments</p>
                    </a>
                </li>
                <li>
                    <a href="./notifications.html">
                        <i class="fal fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="./user.html">
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
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">

                    <a class="navbar-brand" href="#pablo">Welcome To Dave CMS Dashboard: Today's Date Is <?php echo date('d-m-y'); ?></a>
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
