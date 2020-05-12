<?php
/*
The Template for the main categories page
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
                                <h1>Categories</h1>
                            </div>
                            <div class="col-sm-6 mr-auto">
                            <?php include 'includes/categories/create-category.php' ?>
                            </div>
                            <div class="col-sm-6 mr-auto">
                            <?php include 'includes/categories/update-category.php'; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
                <?php include 'includes/categories/view-categories.php'; ?>
                <?php include 'includes/categories/delete-category.php'; ?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
