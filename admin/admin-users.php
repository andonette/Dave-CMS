<?php include 'includes/admin-header.php'; ?>
    <div class="content">
      <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h1>Users</h1>
                                 <a href="admin-users.php?source=create_user" class="btn btn-primary">Create New User</a>
                                 <a href="admin-users.php" class="btn btn-success">View All Users</a>
                             </div>
                             <div class="col-sm-6 mr-auto">

                             </div>
                             <div class="col-sm-6 mr-auto">

                             </div>
                         </div>
                     </div>
                 </div><!-- end card -->
                 <?php switch_user_content(); ?>
                 <!-- end Card -->

             </div>
         </div>
      </div>
    </div>
<?php include 'includes/admin-footer.php'; ?>
