<?php
/*
The Template for creating a post
includes create post function
*/
create_post();
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
                    <?php cat_option_select(); ?>
                </select>
                <br>
                <label for="post_author_id">Post Author</label><br>
                <select class="form-control" name="post_author_id">
                    <?php user_option_select(); ?>
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
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
                </script>
            </div>
            <button type="submit" class="btn btn-primary" name="create_post">Create Post</button>
        </form>
    </div>
</div><!-- end card -->
