<?php
/*
The Template for updating a post
included from the admin post page
when update post is selected
*/

//update post button appends p_id to the post and the ID Number
// test to see if the url has a p_id,
//and then assign that to a variable called $url_post_id;
if (isset($_GET['p_id'])) {
    $url_post_id = $_GET['p_id'];
}
global $connection;
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
update_post_form();
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
                <select class="form-control" name="post_cat_id">
                    <?php
                    //displays the categories in the update form
                    global $connection;
                    $query = "SELECT * FROM categories";
                    $display_all_categories_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($display_all_categories_query)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        if ($cat_id == $post_category_id) {
                            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                        } else {
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
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
                    <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
                    <?php
                    if ($post_status == 'Published') {
                        echo '<option value="Draft">Make Draft</option>';
                    } else {
                        echo '<option value="Published">Publish</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <img src="../images/posts/<?php echo $post_image; ?>" alt="" style="max-width: 200px;">
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
                <textarea name="post_content" id="editor" value="<?php echo $post_content; ?>"></textarea>
                <script>
                ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
                </script>
            </div>
            <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
        </form>
    </div>
</div><!-- end card -->
