<?php include 'includes/admin-header.php'; ?>
    <div class="content">
      <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h1>Comments</h1>
                                 <a href="admin-comments.php?source=create_comment" class="btn btn-primary">Create New Comment</a>
                                 <a href="admin-comments.php" class="btn btn-success">View All Comments</a>
                             </div>
                             <div class="col-sm-6 mr-auto">

                             </div>
                             <div class="col-sm-6 mr-auto">

                             </div>
                         </div>
                     </div>
                 </div><!-- end card -->
                 <?php switch_comment_content(); ?>
                 <?php delete_comment(); ?>
                 <!-- end Card -->

             </div>
         </div>
      </div>
    </div>
<?php include 'includes/admin-footer.php'; ?>
