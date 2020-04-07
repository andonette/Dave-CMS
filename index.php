<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>
            <?php
            //query the database, select everything from the posts table
            $query = "SELECT * FROM posts";
            $select_all_posts_query = mysqli_query($connection, $query);
            //create variables from the columns in the post table.
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_author_image = $row['post_author_image'];
                ?>
                <div class="card card-blog card-plain blog-horizontal">

                    <div class="card-image">
                        <a href="javascript:;">
                            <img class="img rounded" src="images/<?php echo $post_image; ?>.jpg" />
                        </a>


                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="#"><?php echo $post_title; ?></a>
                            </h3>
                            <p class="card-description">
                                <?php echo $post_content; ?>
                                <a href="javascript:;"> Read More </a>
                            </p>
                            <div class="author">
                                <img src="images/<?php echo $post_image; ?>.jpg" alt="<?php echo $post_image; ?>" class="avatar img-raised">
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