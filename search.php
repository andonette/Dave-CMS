<?php include 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="title">Search Results</h1>
            <?php
            // if submit  button is pressed
            if (isset($_POST['submit'])) {
                // store the contents of the search form into a variable called search
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);
                if (!$search_query) {
                    die('Query Failed' . mysqli_error($connection));
                }
                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo '<h3>Try again, we found no results for "' . $search . '"</h3>';

                } else {
                    echo '<h3>Good going, we found the following results for "' . $search . '":</h3>';
                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_author_image = $row['post_author_image'];
                        ?>
                        <div class="card card-blog card-plain blog-horizontal">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="#"><?php echo $post_title; ?></a>
                                    </h3>
                                    <p class="card-description">
                                        By <?php echo $post_author; ?> On <?php echo $post_date; ?>
                                        <a href="javascript:;"> Read More </a>
                                    </p>
                                </div>
                            </div>
                        <?php
                    }
                }
            }

            ?>


        </div>


        <div class="col-sm-4">
            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <form class="form" action="search.php" method="post">
                    <div class="input-group">

                        <input type="text" class="form-control mt-1" placeholder="search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="submit">Search</button>
                        </div>
                    </div>
                </form>
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
