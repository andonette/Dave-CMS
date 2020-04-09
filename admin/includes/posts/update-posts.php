<?php update_post(); ?>
<div class="card">
    <div class="card-body">
        <h2>Edit Your Post</h2>
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
