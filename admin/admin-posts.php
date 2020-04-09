<?php include 'includes/admin-header.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1>Posts</h1>
                                <a href="admin-posts.php?source=create_post" class="btn btn-primary">Create New Post</a>
                                <a href="admin-posts.php" class="btn btn-success">View All Posts</a>
                            </div>
                            <div class="col-sm-6 mr-auto">

                            </div>
                            <div class="col-sm-6 mr-auto">

                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }
                switch ($source) {
                    case 'create_post':
                        include 'includes/posts/create-posts.php';
                        break;
                    case 'update_post':
                        include 'includes/posts/update-posts.php';
                        break;
                    default:
                        include 'includes/posts/view-posts.php';
                        break;
                }
                ?>
                <?php delete_posts(); ?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/admin-footer.php'; ?>
