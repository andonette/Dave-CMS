<?php
/*
Site Index
*/
include 'includes/header.php'
?>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <h1 class="title">Latest Blogposts</h1>
      <?php

      if (isset($_GET['page'])) {
          $page_num = $_GET['page'];
      } else {
          $page_num = "";
      }

      if ($page_num == "" || $page_num == 1) {
          $page_num_1 = 0;
      } else {
         $page_num_1 = ($page_num *5 - 5);
      }

      //query the database, select everything from the posts table
      $query = "SELECT * FROM posts WHERE post_status = 'published'";
      $count_query = mysqli_query($connection, $query);
          $count = mysqli_num_rows($count_query);
          $pages_count = ceil($count / 3);

      //query the database, select everything from the posts table
      $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_num_1, 5";
      $select_all_posts_query = mysqli_query($connection, $query);

      //create variables from the columns in the post table.
      while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author_id'];
        $post_date = date_create($row['post_date']);
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        //$post_author_image = $row['post_author_image'];
        ?>
        <div class="card card-blog card-plain blog-horizontal mb-3">
          <div class="card-image">
            <a href="post.php?p_id=<?php echo $post_id; ?>">
              <img class="img rounded" src="images/posts/<?php echo $post_image; ?>" />
            </a>
            <div class="card-body">
              <h3 class="card-title">
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
              </h3>
              <p class="card-description">
                <?php echo substr($post_content, 0, 300); ?>...<br>

                <a class="btn btn-danger mt-3" href="post.php?p_id=<?php echo $post_id; ?>">Read More...</a>
              </p>
              <div class="author">
                    <?php
                    //gets the database connection
                    global $connection;
                    //create mysql query for categories table
                    $query = "SELECT * FROM users WHERE user_id = $post_author";
                    //connect to database, and run query
                    $display_all_categories = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($display_all_categories);
                    sql_error_check($display_all_categories);
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_image = $row['user_image'];
                    $user_fullname = $user_firstname . ' ' . $user_lastname;
                    ?>
                <img src="images/users/<?php echo $user_image; ?>" alt="<?php echo $post_image; ?>" class="avatar img-raised">
                <div class="text">
                  <span class="name">Posted By <?php echo $user_fullname; ?> On <?php echo date_format($post_date, 'D dS M Y'); ?></span>

                </div>
              </div>
            </div>
          </div>

      </div>
        <!-- End Card -->
      <?php } ?>
      <?php if ($pages_count >= 2): ?>
        <?php include 'includes/pagination.php'; ?>
        <?php endif; ?>
    </div>
    <!-- End Column -->
    <div class="col-sm-4">

        <?php include 'includes/sidebar.php' ?>


    </div>
    <!-- End Column -->
  </div>
  <!-- End Row -->
</div>
<!-- End Container -->
<?php include 'includes/footer.php' ?>
