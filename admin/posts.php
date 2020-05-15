<?php
/*
The Template for the posts page
*/
include 'includes/header.php';
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1>Posts</h1>
                                <a href="posts.php?source=create_post" class="btn btn-primary">Create New Post</a>
                                <a href="posts.php" class="btn btn-success">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
                <?php switch_post_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
