<?php
/*
The Template for the main page
*/
include 'includes/header.php';
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- echo out the username from the session -->
                        <h1 class="h3">Welcome To The Dashboard  <?php echo $_SESSION['username']; ?></h1>
                        <h2>Users Online: <span class="users-online"></span></h2>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fal fa-file fa-5x"></i>
                            </div>
                            <div class="col-sm-9 text-right">
                                <?php
                                $query = 'SELECT * FROM posts';
                                $select = mysqli_query($connection, $query);
                                $post_count = mysqli_num_rows($select);
                                ?>
                                <div class='h1'><?php echo $post_count; ?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="posts.php">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fal fa-comments fa-5x"></i>
                            </div>
                            <div class="col-sm-9 text-right">
                                <?php
                                $query = 'SELECT * FROM comments';
                                $select = mysqli_query($connection, $query);
                                $comment_count = mysqli_num_rows($select);
                                ?>
                                <div class='h1'><?php echo $comment_count ?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="comments.php">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fal fa-users fa-5x"></i>
                            </div>
                            <div class="col-sm-9 text-right">
                                <?php
                                $query = 'SELECT * FROM users';
                                $select = mysqli_query($connection, $query);
                                $user_count = mysqli_num_rows($select);
                                ?>
                                <div class='h1'><?php echo $user_count; ?></div>
                                <div>Users</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="users.php">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fal fa-list fa-5x"></i>
                            </div>
                            <div class="col-sm-9 text-right">
                                <?php
                                $query = 'SELECT * FROM categories';
                                $select = mysqli_query($connection, $query);
                                $category_count = mysqli_num_rows($select);
                                ?>
                                <div class='h1'><?php echo $category_count; ?></div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="categories.php">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([

                                ['Data', 'Count'],
                                <?php
                                $query = 'SELECT * FROM posts WHERE post_status = "Draft"';
                                $select = mysqli_query($connection, $query);
                                $draft_post_count = mysqli_num_rows($select);

                                $query = 'SELECT * FROM comments WHERE comment_status = "unapproved"';
                                $select = mysqli_query($connection, $query);
                                $draft_comment_count = mysqli_num_rows($select);

                                $query = 'SELECT * FROM users WHERE user_role = "Administrator"';
                                $select = mysqli_query($connection, $query);
                                $admin_user_count = mysqli_num_rows($select);

                                $query = 'SELECT * FROM users WHERE user_role = "Subscriber"';
                                $select = mysqli_query($connection, $query);
                                $admin_subscriber_count = mysqli_num_rows($select);

                                $element_text = ['Active Posts', 'Draft Posts', 'Comments', 'Pending', 'Users', 'Admin', 'Subscribers', 'Categories'];
                                $element_count = [$post_count, $draft_post_count, $comment_count, $draft_comment_count, $user_count,  $admin_user_count, $admin_subscriber_count, $category_count];
                                for ($i=0; $i < 8; $i++) {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                                ?>

                            ]);

                            var options = {
                                backgroundColor: 'transparent',
                                fontName: 'Poppins',
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                        </script>
                        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

<?php include 'includes/footer.php'; ?>
