<?php include 'includes/admin-header.php'; ?>
    <div class="content">
      <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h1>Comments</h1>
                     </div>
                 </div>
                 <!-- end Card -->
                 <div class="card">
                     <div class="card-body">
                         <table class="table">
                             <thead>
                                 <th>ID</th>
                                 <th>Post ID</th>
                                 <th>Date</th>
                                 <th>Author</th>
                                 <th>Email</th>
                                 <th>Comment</th>
                                 <th>Status</th>
                                 <th class="text-right">Actions</th>
                             </thead>
                             <tbody>
                                 <?php display_comments(); ?>
                             </tbody>
                         </table>
                     </div>
                 </div><!-- end card -->

             </div>
         </div>
      </div>
    </div>
<?php include 'includes/admin-footer.php'; ?>
