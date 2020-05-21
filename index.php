<?php
/*
Site Index
*/
include 'includes/header.php'
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>

            <?php

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }
            $posts_per_page = 2;
            if ($page == "" || $page == 1) {
                $page_counter = 0;
            } else {
                $page_counter = ($page * $posts_per_page) - $posts_per_page;
                echo 'i am another page <br>';
            }

            if (is_admin($_SESSION['username'])) {
                $query = "SELECT * FROM posts";
            } else {
                $query = "SELECT * FROM posts WHERE post_status = 'published'";
            }

            //query the database, select everything from the posts table
            $count_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($count_query);
            $pages_count = ceil($count / $posts_per_page);
            echo $count;


            if (is_admin($_SESSION['username'])) {
                $query = "SELECT * FROM posts LIMIT $page_counter, $posts_per_page";
            } else {
                $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_counter, $posts_per_page";
            }

            //echo 'we have some posts';

            $select_all_posts_query = mysqli_query($connection, $query);
            //create variables from the columns in the post table.
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author_id'];
                $post_date = date_create($row['post_date']);
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                include 'includes/post-loop-template.php';

                if ($pages_count >= 2) {
                    echo 1;
                } else {
                    echo 0;
                }
            } ?>
            <!-- End Card -->
            <?php if ($pages_count >= 2) : ?>
                <?php include 'includes/pagination.php'; ?>
            <?php endif; ?>
        </div>
        <!-- End Column -->
        <div class="col-sm-4">
            <?php include 'includes/sidebar.php' ?>
        </div>
        <!-- End Column -->
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->
<?php include 'includes/footer.php' ?>
