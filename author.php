<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>

            <?php

            if (isset($_GET['author'])) {
                $get_author = $_GET['author'];
            }
            //query the database, select everything from the posts table
            $query = "SELECT * FROM posts WHERE post_author_id = $get_author";
            $select_all_posts_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($select_all_posts_query);
            if ($count !== 0) {
                echo "<p>we found $count posts</p>";// code...
            } else {
                echo '<h2>No Posts To Show</h2>';
                echo "<a class='btn btn-success' href='index.php'>Back To Posts</a>";
            }
            //create variables from the columns in the post table.
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author_id'];
                $post_date = date_create($row['post_date']);
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                //$post_author_image = $row['post_author_image'];
                //$date_formatted = date_create($post_date);
                include 'includes/post-loop-template.php';
                }
                ?>
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
