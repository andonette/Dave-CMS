<?php
if (isset($_POST['create_post'])) {
    $create_post = $_POST['create_post'];
    $post_title = $_POST['post_title'];
    $post_cat_id = $_POST['post_cat_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_POST['post_image'];
    $post_image_temp = $_POST['post_image_temp'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = $_POST['post_date'];
    $post_comment_count = $_POST['post_comment_count'];
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
    <label for="post_cat_id">Post Category ID</label>
        <input type="text" class="form-control" name="post_cat_id">
  </div>
  <div class="form-group">
    <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
  </div>
  <div class="form-group">
    <label for="post_image">Post Image</label>
        <input type="text" class="form-control" name="post_image">
  </div>
  <div class="form-group">
    <label for="post_image_temp">Post Image Temp</label>
        <input type="text" class="form-control" name="post_image_temp">
  </div>
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
  </div>
  <div class="form-group">
    <label for="post_content">Post $post_content</label>
        <input type="text" class="form-control" name="post_content">
  </div>
  <div class="form-group">
    <label for="post_date">Post Date</label>
        <input type="text" class="form-control" name="post_date">
  </div>
  <div class="form-group">
    <label for="post_comment_count">Post Comment Count</label>
        <input type="text" class="form-control" name="post_comment_count">
  </div>

  <button type="submit" class="btn btn-primary" name="create_post">Create Post</button>
</form>
    </div>
</div><!-- end card -->
