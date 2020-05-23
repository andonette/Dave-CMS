<?php
/*
1. Link author to user
2. create user image
*/

?>
<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>
            <?php

            if (isset($_GET['p_id'])) {
                $get_post_id = $_GET['p_id'];

                $view_query ="UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $get_post_id";
                mysqli_query($connection, $view_query);
                sql_error_check($view_query);

                //query the database, select everything from the posts table
                if (is_admin($_SESSION['username'])) {
                        $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
                } else {
                        $query = "SELECT * FROM posts WHERE post_id = $get_post_id AND post_status = 'Published'";
                }

                $select_all_posts_query = mysqli_query($connection, $query);
                //create variables from the columns in the post table.
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author_id'];
                    $post_date = date_create($row['post_date']);
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    //$post_author_image = $row['post_author_image'];


                    ?>
                    <div class="card card-blog card-plain blog-horizontal">

                        <div class="card-image">
                            <a href="javascript:;">
                                <img class="img rounded" src="/Dave-CMS/images/posts/<?php echo $post_image; ?>" />
                            </a>


                            <div class="card-body">
                                <h3 class="card-title">
                                    <a href="#"><?php echo $post_title; ?></a>
                                </h3>
                                <p class="card-description">
                                    <?php echo $post_content; ?>
                                </p>
                                <div class="author">
                                    <?php
                                    //gets the database connection
                                    global $connection;
                                    //create mysql query for categories table
                                    $query = "SELECT * FROM users WHERE user_id = $post_author";
                                    //connect to database, and run query
                                    $display_all_categories = mysqli_query($connection, $query);
                                    $row = mysqli_fetch_assoc($display_all_categories);
                                    sql_error_check($display_all_categories);
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_image = $row['user_image'];
                                    $user_fullname = $user_firstname . ' ' . $user_lastname;
                                    ?>
                                    <img src="images/users/<?php echo $user_image; ?>" alt="<?php echo $post_image; ?>" class="avatar img-raised">
                                    <div class="text">
                                        <span class="name">Posted By <a href="author.php?author=<?php echo $post_author; ?>"><?php echo $user_fullname; ?></a> On <?php echo date_format($post_date, 'D dS M Y'); ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
            <div class="card">
                <div class="card-body">
                    <h3>Leave A Comment</h3>
                    <?php comment_form(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input class="form-control" type="text" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="comment_email">

                        </div>
                        <label for="comment_content">Comment</label>
                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        <button type="submit" class="btn btn-primary" name="submit_comment">Submit Comment</button>
                    </form>

                </div>
            </div>
            <ul class="list-unstyled mt-5">
                <?php show_post_comments(); ?>
            </ul>
        </div>
    <?php }
} else {
    header("Location: index.php");
}
?>
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
