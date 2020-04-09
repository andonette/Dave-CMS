<?php update_post(); ?>
<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts";
$select_post_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_post_by_id)) {
    //$post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_image = $row['post_image'];
    $post_comment_count = $row['post_comment_count'];
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
                <label for="post_cat_id">Post Category ID</label>
                <input value="<?php echo $post_category_id; ?>" type="text" class="form-control" name="post_cat_id">
            </div>
            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
            </div>
            <div class="form-group">
                <label for="post_status">Post Status</label>
                <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
            </div>
            <div class="form-group">
                <label for="post_image"><span class="btn">Upload Image</span></label>
                <input value="<?php echo $post_image; ?>" type="file" class="form-control-file" name="post_image" id="postImage">
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
            </div>
            <div class="form-group">
                <label for="post_content">Post Content</label>
                <input value="<?php echo $post_content; ?>" type="text" class="form-control" name="post_content">
            </div>
            <div class="form-group">
                <label for="post_date">Post Date</label>
                <input value="<?php echo $post_date; ?>" type="text" class="form-control" name="post_date">
            </div>
            <div class="form-group">
                <label for="post_comment_count">Post Comment Count</label>
                <input value="<?php echo $post_comment_count; ?>" type="text" class="form-control" name="post_comment_count">
            </div>

            <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
        </form>
    </div>
</div><!-- end card -->
