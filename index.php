<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Latest Blogposts</h1>
            <?php
            $query = "SELECT * FROM posts";
            $select_all_posts_query = mysqli_query($connection, $query);
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
                <?php
            }
            ?>
        </div>


        <div class="col-sm-4">
            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
