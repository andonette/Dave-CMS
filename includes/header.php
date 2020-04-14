<?php
/*
Site Header
*/
include 'includes/config.php';
include 'functions.php';
ob_start();
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
    <link href="css/nucleo-icons.css" rel="stylesheet">
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
                    <?php
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row['cat_title'];
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php echo $cat_title; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
