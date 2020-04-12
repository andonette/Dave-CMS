<?php
/*
The Template for updating a post
included from the admin post page
when update post is selected
*/

//Gets the database connection.
global $connection;
//update post button appends p_id to the post and the ID Number
// test to see if the url has a p_id,
//and then assign that to a variable called $url_post_id;
if (isset($_GET['p_id'])) {
  $url_post_id = $_GET['p_id'];
}
//query the post by its selected id, which is displayed in the url
$query = "SELECT * FROM posts WHERE post_id = $url_post_id";
//assign to a new variable
$select_post_by_id = mysqli_query($connection, $query);
//loop through rows and get the data
//so we can display it in the update form
while ($row = mysqli_fetch_assoc($select_post_by_id)) {
  $post_title = $row['post_title'];
  $post_content = $row['post_content'];
  $post_author = $row['post_author'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_tags = $row['post_tags'];
  $post_image = $row['post_image'];
}
//Functionality for the update form.
//Get the form data on submit
if (isset($_POST['update_post'])) {
  $post_title = $_POST['post_title'];
  $post_content = $_POST['post_content'];
  $post_author = $_POST['post_author'];
  $post_category_id = $_POST['post_cat_id'];
  $post_status = $_POST['post_status'];
  $post_tags = $_POST['post_tags'];
  $post_image = $_FILES['post_image']['name'];
  $post_image_temp = $_FILES['post_image']['tmp_name'];

  // this gets the image and moves it
  //don't really understand how this works at the minute
  move_uploaded_file($post_image_temp, "../images/posts/$post_image");

  // this  prevents the post image from showing empty
  // when the form is updated
  if (empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = $url_post_id";
    $select_image = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_image)) {
      $post_image = $row['post_image'];
    }
  }

  //Nice Looking Query
  $query = "UPDATE posts SET ";
  $query .= "post_title = '{$post_title}', ";
  $query .= "post_category_id = {$post_category_id}, ";
  $query .= "post_author = '{$post_author}', ";
  $query .= "post_date = now(), ";
  $query .= "post_status = '{$post_status}', ";
  $query .= "post_content = '{$post_content}', ";
  $query .= "post_image = '{$post_image}', ";
  $query .= "post_tags = '{$post_tags}' ";
  $query .= "WHERE post_id = {$url_post_id}";

  $update_post = mysqli_query($connection, $query);
  sql_error_check($update_post);
}
?>

<div class="card">
  <div class="card-body">
    <h2>Edit Your Post</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
      </div>
      <div class="form-group">
        <label for="post_cat_id">Category</label>
        <br>
        <select class="" name="post_cat_id">
          <?php
          //displays the categories in the update form
          $query = "SELECT * FROM categories";
          $display_all_categories_query = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($display_all_categories_query)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
      </div>

      <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select class="" name="post_status">
          <option value='Published'>Published</option>
          <option value='Draft'>Draft</option>
        </select>
      </div>

      <div class="form-group">
        <img src="../images/<?php echo $post_image; ?>" alt="" style="max-width: 200px;">
      </div>
      <div class="form-group">
        <label for="post_image"><span class="btn btn-info">Replace Image</span></label>
        <input type="file" class="form-control-file" name="post_image" id="postImage">
      </div>
      <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
      </div>
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea rows="10" class="form-control" name="post_content"><?php echo $post_content; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
    </form>
  </div>
</div><!-- end card -->
