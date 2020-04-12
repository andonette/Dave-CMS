<?php
/*
The Template for creating a post
includes create post function
*/
?>
<?php create_post(); ?>
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
        <select class="" name="post_category">
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
      </div>
      <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
      </div>

      <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select class="" name="post_status">
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
        <textarea rows="10" class="form-control" name="post_content"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="create_post">Create Post</button>
    </form>
  </div>
</div><!-- end card -->
