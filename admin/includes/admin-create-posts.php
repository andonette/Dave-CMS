<?php
if (isset($_POST['create_post'])) {
    $create_post = $_POST['create_post'];

    $post_title = $_POST['post_title'];
    $post_cat_id = $_POST['post_cat_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    //Nice Looking Query
    $query = "INSERT INTO posts ";
    $query .= "(post_title, ";
    $query .= "post_date, ";
    $query .= "post_category_id, ";
    $query .= "post_author, ";
    $query .= "post_status, ";
    $query .= "post_content, ";
    $query .= "post_image, ";
    $query .= "post_tags, ";
    $query .= "post_comment_count) ";

    $query .= "VALUES('{$post_title}', ";
    $query .= "now(), ";
    $query .= "{$post_cat_id}, ";
    $query .= "'{$post_author}', ";
    $query .= "'{$post_status}', ";
    $query .= "'{$post_content}', ";
    $query .= "'{$post_image}', ";
    $query .= "'{$post_tags}', ";
    $query .= "'{$post_comment_count}') ";

    echo $query;
    $create_post_query = mysqli_query($connection, $query);
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
                <label for="post_image"><span class="btn">Upload Image</span></label>
                <input type="file" class="form-control-file" name="post_image" id="postImage">
            </div>
            <div class="form-group">
                <label for="post_image_temp">Post Image Temp</label>
                <input type="file" class="form-control-file" name="post_image_temp" id="postImageTemp">
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags">
            </div>
            <div class="form-group">
                <label for="post_content">Post Content</label>
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
