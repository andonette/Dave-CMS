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
                // if there are no results echo a message
                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo '<h3>Try again, we found no results for "' . $search . '"</h3>';
                    //if the search box is empty, display a message
                } elseif ($earch = "" || empty($search)) {
                    echo '<h3>Search cannot be empty</h3>';
                } else {
                    //show the results
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
                        <!-- End Card -->
                        <?php
                    }
                }
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
