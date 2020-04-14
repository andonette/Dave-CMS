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
                <div class='h1'>12</div>
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
                <div class='h1'>23</div>
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
                <div class='h1'>12</div>
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
                <div class='h1'>13</div>
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
  </div>
</div>
<?php include 'includes/footer.php'; ?>
