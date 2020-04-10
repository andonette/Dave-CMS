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

                //query the database, select everything from the posts table
                $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
                $select_all_posts_query = mysqli_query($connection, $query);
                //create variables from the columns in the post table.
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_author_image = $row['post_author_image'];
                }

                ?>
                <div class="card card-blog card-plain blog-horizontal">

                    <div class="card-image">
                        <a href="javascript:;">
                            <img class="img rounded" src="images/<?php echo $post_image; ?>" />
                        </a>


                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="#"><?php echo $post_title; ?></a>
                            </h3>
                            <p class="card-description">
                                <?php echo $post_content; ?>
                            </p>
                            <div class="author">
                                <img src="images/<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>"
                                class="avatar img-raised">
                                <div class="text">
                                    <span class="name"><?php echo $post_title; ?></span>
                                    <div class="meta"><?php echo $post_date; ?></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <h3>Leave A Comment</h3>
                    <?php
                    if (isset($_POST['submit_comment'])) {
                        $get_post_id = $_GET['p_id'];
                        $submit_comment_form = $_POST['submit_comment'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        $query = "INSERT INTO comments (comment_post_id, comment_author,
                            comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES ($get_post_id, '{$comment_author}', '{$comment_email}',
                        '{$comment_content}', 'unapproved', now())";

                        $comment_form_query = mysqli_query($connection, $query);
                    }
                    ?>
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
            <ul class="list-unstyled">
                <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = {$get_post_id} ";
                $query .= "AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC";
                $display_all_comments = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($display_all_comments)) {
                    $comment_date = $row['comment_date'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    ?>
                    <li class="media mb-3">
                        <img class="mr-3" src="..." alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Posted By <?php echo $comment_author; ?> On <?php echo $comment_date; ?>  </h5>
                            <?php echo $comment_content; ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
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
