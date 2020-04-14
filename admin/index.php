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
                         <h1>Welcome To Your Dashboard  <?php echo $_SESSION['username']; ?></h1>
                     </div>
                 </div>
             </div>
         </div>
      </div>
    </div>
<?php include 'includes/footer.php'; ?>
