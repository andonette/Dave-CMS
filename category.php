<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>
            <?php

            if (isset($_GET['category'])) {
                $get_category = $_GET['category'];
            //query the database, select everything from the posts table
            if (is_admin($_SESSION['username'])) {
                echo 'hi admin';
                $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ?");
            } else {
                $stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ?");
                $published = "Published";
            }
            if (isset($stmt1)) {
                echo 'stmt1';
                mysqli_stmt_bind_param($stmt1, "i", $post_category_id);
                mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                $stmt = $stmt1;
            } else {
                mysqli_stmt_bind_param($stmt2, "is", $post_category_id);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                $stmt = $stmt2;
            }

            if (mysqli_stmt_num_rows($stmt) === 0) {
                echo '<h2>No Posts To Show</h2>';
                echo "<a class='btn btn-primary' href='index.php'>Back To Posts</a>";
            } else {
                echo "<p>we found $count posts</p>";// code...
            }

            //create variables from the columns in the post table.
            while(mysqli_stmt_fetch($stmt1)){
                echo 'hi';
                include 'includes/post-loop-template.php';
            } } ?>
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
