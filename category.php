<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>
            <?php
            if (isset($_GET['category'])) {
                global $connection;
                $get_category = $_GET['category'];
                //query the database, select everything from the posts table
                if (is_admin($_SESSION['username'])) {
                    $stmt1 = mysqli_prepare(
                        $connection,
                        "SELECT posts.post_id, posts.post_title, posts.post_author_id, posts.post_date, posts.post_image,
                        posts.post_content, users.user_id, users.user_firstname, users.user_lastname, users.user_image
                        FROM posts LEFT JOIN users ON posts.post_author_id = users.user_id WHERE post_category_id = ?"
                    );
                } else {
                    $stmt2 = mysqli_prepare(
                        $connection,
                        "SELECT posts.post_id, posts.post_title, posts.post_author_id, posts.post_date, posts.post_image,
                        posts.post_content, users.user_id, users.user_firstname, users.user_lastname, users.user_image
                        FROM posts LEFT JOIN users ON posts.post_author_id = users.user_id WHERE post_category_id = ? AND post_status = ?"
                    );
                    $published = "Published";
                }
                if (isset($stmt1)) {
                    mysqli_stmt_bind_param($stmt1, "i", $get_category);
                    mysqli_stmt_execute($stmt1);
                    mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content, $user_id, $user_firstname, $user_lastname, $user_image);
                    $stmt = $stmt1;
                } else {
                    mysqli_stmt_bind_param($stmt2, "is", $get_category, $published);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content, $user_id, $user_firstname, $user_lastname, $user_image);
                    $stmt = $stmt2;
                }
                $fullname = $user_firstname . " " . $user_lastname;

                $format_date = date_create($post_date);
                if (mysqli_stmt_num_rows($stmt) === 0) {
                    echo '<h2>No Posts To Show</h2>';
                    echo "<a class='btn btn-primary' href='index.php'>Back To Posts</a>";
                } else {
                    //echo "<p>we found count posts</p>";// code...
                }

                //create variables from the columns in the post table.
                while (mysqli_stmt_fetch($stmt)) {
                    include 'includes/post-loop-template.php';
                }
                mysqli_stmt_close($stmt);
            } ?>
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
