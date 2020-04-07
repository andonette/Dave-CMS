<?php include 'includes/admin-header.php'; ?>
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
                                <form class="form" action="" method="post">
                                    <?php create_category(); ?>
                                    <label for="cat_title">Add Category</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control mt-2"
                                        placeholder="search" name="cat_title">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"
                                            name="add_category">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 mr-auto">
                                <?php update_category(); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th class="text-right">Actions</th>
                            </thead>
                            <tbody>
                                <?php display_categories(); ?>
                                <?php delete_category(); ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end card -->
            </div>
        </div>
    </div>
</div>
<?php include 'includes/admin-footer.php'; ?>
