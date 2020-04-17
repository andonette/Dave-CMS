<?php
/*
The Template for creating a post
includes create post function
*/
global $connection;
if (isset($_POST['create_post'])) {
  $create_post = $_POST['create_post'];
  $post_title = $_POST['post_title'];
  $post_cat_id = $_POST['post_category'];
  $post_author_id = $_POST['post_author_id'];
  $post_status = $_POST['post_status'];
  $post_image = $_FILES['post_image']['name'];
  $post_image_temp = $_FILES['post_image']['tmp_name'];
  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  $post_date = date('d-m-y');
  //$post_comment_count = 4;

  move_uploaded_file($post_image_temp, "../images/$post_image");

  //Nice Looking Query
  $query = "INSERT INTO posts ";
  $query .= "(post_title, ";
  $query .= "post_date, ";
  $query .= "post_category_id, ";
  $query .= "post_author_id, ";
  $query .= "post_status, ";
  $query .= "post_content, ";
  $query .= "post_image, ";
  $query .= "post_comment_count, ";
  $query .= "post_tags) ";

  $query .= "VALUES('{$post_title}', ";
  $query .= "now(), ";
  $query .= "{$post_cat_id}, ";
  $query .= "{$post_author_id}, ";
  $query .= "'{$post_status}', ";
  $query .= "'{$post_content}', ";
  $query .= "'{$post_image}', ";
  $query .= "0, ";
  $query .= "'{$post_tags}') ";
  //echo $query;
  $create_post_query = mysqli_query($connection, $query);
  sql_error_check($create_post_query);
  echo '<div class="alert alert-success">Post Created: <a class="text-white" href="posts.php">View Posts</a></div>';
}
?>
<div class="card">
  <div class="card-body">
    <h2>Howdy! Let's Create A New Post</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
      </div>
      <div class="form-group">
        <label for="post_category">Post Category</label><br>
        <select class="form-control" name="post_category">
          <?php
          //gets the database connection
          global $connection;
          //create mysql query for categories table
          $query = "SELECT * FROM categories";
          //connect to database, and run query
          $display_all_categories = mysqli_query($connection, $query);
          //loop through all available rows in table and get data
          while ($row = mysqli_fetch_assoc($display_all_categories)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            // echo out data as options in a form dropdown
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
          }
          ?>
        </select>
        <br>
        <label for="post_author_id">Post Author</label><br>
        <select class="form-control" name="post_author_id">
          <?php
          //gets the database connection
          global $connection;
          //create mysql query for users table
          $query = "SELECT * FROM users";
          //connect to database, and run query
          $display_all_users = mysqli_query($connection, $query);
          //loop through all available rows in table and get data
          while ($row = mysqli_fetch_assoc($display_all_users)) {
            $user_name = $row['user_name'];
            $user_id = $row['user_id'];
            // echo out data as options in a form dropdown
            echo "<option value='{$user_id}'>{$user_name}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select class="form-control" name="post_status">
          <option value='Published'>Published</option>
          <option value='Draft'>Draft</option>
        </select>
      </div>

      <div class="form-group">
        <label for="post_image"><span class="btn btn-success">Upload Image</span></label>
        <input type="file" class="form-control-file" name="post_image" id="postImage">
      </div>
      <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
      </div>
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="editor"></textarea>
        <script>
        ClassicEditor
           .create( document.querySelector( '#editor' ) );
        </script>
      </div>
      <button type="submit" class="btn btn-primary" name="create_post">Create Post</button>
    </form>
  </div>
</div><!-- end card -->
