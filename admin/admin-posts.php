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
                    case 20:
                        echo '20';
                        break;
                    case 30:
                        echo '30';
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
