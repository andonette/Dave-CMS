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
    if ($page == "" || $page == 1) {
        $page_1 = 0;
    } else {
        $page_1 = ($page * 5) - 5;
    }
        $query = "SELECT * FROM posts";
        //query the database, select everything from the posts table
        $count_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($count_query);
        $pages_count = floor($count / 3);
        echo '<h1>';
        echo $pages_count;
        echo '</h1>';
        if ($count < 1) {
            echo '<h2>No Posts To Show</h2>';
        }
        $query = "SELECT * FROM posts LIMIT $page_1, 5";

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
        }
        ?>
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
