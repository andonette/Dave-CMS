<?php
/*
The Template for the main comments page
*/
include 'includes/header.php';
?>
    <div class="content">
      <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-12">
                                 <h1>Comments</h1>
                             </div>
                             <div class="col-sm-6 mr-auto">

                             </div>
                             <div class="col-sm-6 mr-auto">

                             </div>
                         </div>
                     </div>
                 </div><!-- end card -->
                <?php include 'includes/comments/view-comments-filtered.php'; ?>
                <?php approve_comment(); ?>
                <?php unapprove_comment(); ?>
                <?php delete_comment(); ?>
                 <!-- end Card -->
             </div>
         </div>
      </div>
    </div>
<?php include 'includes/footer.php'; ?>
