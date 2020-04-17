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
                        </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-4">

                                <form class="" action="" method="post">
                                  <div class="form-group">
                                    <select class="form-control" name="">
                                      <option value="">Select Options</option>
                                      <option value="">Publish</option>
                                      <option value="">Draft</option>
                                      <option value="">Delete</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                      <button type="submit" name="apply" class="btn btn-primary">Apply</button>
                                  </div>


                                </form>

                            </div>
                            <div class="col-sm-8 text-right">
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
