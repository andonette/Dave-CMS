<?php
// users online
function onlineUsers()
{
    // i have no idea how this get request works
    //but it does.
    if (isset($_GET['users_online'])) {
        global $connection;
        if (!$connection) {
            $session = session_id();
            include("../includes/config.php");
            $time = time();
            $time_out_in_seconds = 60;
            $time_out = $time - $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $session_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($session_query);

            if ($count == null) {
                $db_query = "INSERT INTO users_online(session, time) VALUES('$session', $time)";
                mysqli_query($connection, $db_query);
            } else {
                $db_query = "UPDATE users_online SET time = $time WHERE session = '$session'";
                mysqli_query($connection, $db_query);
            }

            $users_online = "SELECT * FROM users_online WHERE time > '$time_out'";
            $users_online_query = mysqli_query($connection, $users_online);

            $count_user = mysqli_num_rows($users_online_query);
            sql_error_check($users_online_query);
            echo $count_user;
        }
    }
}
onlineUsers();

//Post functions
function create_post()
{
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
        //this is going to grab the last id that we created
        $post_id = mysqli_insert_id($connection);
        echo "<div class='alert alert-success'>Post Created: <a class='text-white' href='../post.php?p_id={$post_id}'>View Post</a></div>";
    }
}

function display_posts()
{
    global $connection;
    $query = "SELECT * FROM posts";
    $display_all_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_tags = $row['post_tags'];
        $post_image = $row['post_image'];
        $post_views_count = $row['post_views_count'];

        echo '<tr>';
        ?>
        <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value ="<?php echo $post_id; ?>"></td>
        <?php
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";


        $query = "SELECT * FROM categories WHERE cat_id = " . $post_category_id;
        $show_cat_name = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($show_cat_name)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
        }

        echo "<td>{$cat_title}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-fluid' src='../images/posts/{$post_image}' alt='' style='max-width:100px;'/></td>";
        echo "<td>{$post_tags}</td>";

        $comment_count_query = "SELECT * FROM comments WHERE comment_post_id = " . $post_id;
        $comment_query = mysqli_query($connection, $comment_count_query);
        $row = mysqli_fetch_array($comment_query);
        $comment_id = isset($row['comment_id']);
        $comment_count = mysqli_num_rows($comment_query);

        echo "<td><a href='comments-filtered.php?id=$comment_id'>{$comment_count}</a></td>";

        echo "<td>{$post_views_count}</td>";
        echo '<td class="text-right" style="min-width: 130px;">';
        echo '<a href ="../post.php?p_id=' . $post_id . '"
        class="btn btn-warning btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-eye pt-2"></i></a>';
        echo '<a href ="posts.php?source=update_post&p_id=' . $post_id . '"
        class="btn btn-success btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-edit pt-2"></i></a>';
        echo '<a onClick="javascript: return confirm(\'Are you sure you want to delete?\');" href="posts.php?delete=' . $post_id . '"
        class="btn btn-danger btn-sm btn-round btn-icon">
        <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}

function update_post()
{
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
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
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
                    .create( document.querySelector( '#editor' ) );
                    </script>
                </div>
                <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
            </form>
        </div>
    </div><!-- end card -->
    <?php
}
function update_post_form()
{
    if (isset($_POST['update_post'])) {
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $post_author_id = $_POST['post_author_id'];
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
        //echo $query;
        $update_post = mysqli_query($connection, $query);
        sql_error_check($update_post);
        echo "<div class='alert alert-success'>Post Updated: <a class='text-white' href='../post.php?p_id={$url_post_id}'>View Post</a></div>";
    }
}

function switch_post_content()
{
    if (isset($_GET['source'])) {
        $set_source = $_GET['source'];
    } else {
        $set_source = '';
    }
    switch ($set_source) {
        case 'create_post':
            include 'includes/posts/create-post.php';
            break;
        case 'update_post':
            include 'includes/posts/update-post.php';
            break;
        default:
            include 'includes/posts/view-posts.php';
            break;
    }
}

function delete_posts()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];
        $query = 'DELETE FROM posts WHERE post_id = ' . $the_post_id;
        $delete_post = mysqli_query($connection, $query);
        header("Location: posts.php");
        sql_error_check($delete_post);
    }
}
function bulk_edit_posts()
{
    if (isset($_POST['checkBoxArray'])) {
        // for every checked checkbox
        foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
            // echo $checkBoxValue . ', ';
            // do what we have selected in the dropdown
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                case 'Published':
                    global $connection;
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $checkBoxValue";
                    $update_status = mysqli_query($connection, $query);
                    echo $query;
                    header("Location: posts.php");
                    sql_error_check($update_status);
                    break;
                case 'Duplicate':
                    global $connection;
                    $query = "SELECT * FROM posts WHERE post_id = $checkBoxValue";
                    $update_status = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($update_status)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_author = $row['post_author'];
                        $post_author_id = $row['post_author_id'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_image = $row['post_image'];
                        $post_comment_count = $row['post_comment_count'];

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
                        $query .= "{$post_category_id}, ";
                        $query .= "{$post_author_id}, ";
                        $query .= "'{$post_status}', ";
                        $query .= "'{$post_content}', ";
                        $query .= "'{$post_image}', ";
                        $query .= "0, ";
                        $query .= "'{$post_tags}') ";

                        $create_post_query = mysqli_query($connection, $query);
                        echo $query;
                        sql_error_check($create_post_query);
                    }
                    echo $query;
                    header("Location: posts.php");
                    sql_error_check($update_status);
                    break;
                case 'Draft':
                    global $connection;
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $checkBoxValue";
                    $update_status = mysqli_query($connection, $query);
                    echo $query;
                    header("Location: posts.php");
                    sql_error_check($update_status);
                    break;
                case 'delete':
                    global $connection;
                    $query = "DELETE FROM posts WHERE post_id = $checkBoxValue" ;
                    $delete_post = mysqli_query($connection, $query);
                    echo $query;
                    header("Location: posts.php");
                    sql_error_check($delete_post);
                    break;
                case 'reset':
                    global $connection;
                    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $checkBoxValue";
                    $update_status = mysqli_query($connection, $query);
                    echo $query;
                    header("Location: posts.php");
                    sql_error_check($update_status);
                    break;
                default:
                    // code...
                    break;
            }
        }
    }
}
//Comment Admin functions
function display_comments()
{
    global $connection;
    $query = "SELECT * FROM comments";
    $display_all_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_posts)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_date = $row['comment_date'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];

        echo '<tr>';
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = " . $comment_post_id;
        $show_post_name = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($show_post_name)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
        }

        echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
        echo "<td>{$comment_date}</td>";
        echo '<td class="text-right" style="min-width: 130px">';
        echo '<a href ="comments.php?approve=' . $comment_id . '"
        class="btn btn-success btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-thumbs-up pt-2"></i></a>';
        echo '<a href ="comments.php?unapprove=' . $comment_id . '"
        class="btn btn-warning btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-thumbs-down pt-2"></i></a>';
        echo '<a onClick="javascript: return confirm(\'Are you sure you want to delete?\');" href ="comments.php?delete=' . $comment_id . '"
        class="btn btn-danger btn-sm btn-round btn-icon">
        <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}
function display_comments_filtered()
{
    global $connection;
    $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['id']);
    $display_all_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_posts)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_date = $row['comment_date'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];

        echo '<tr>';
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = " . $comment_post_id;
        $show_post_name = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($show_post_name)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
        }

        echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
        echo "<td>{$comment_date}</td>";
        echo '<td class="text-right" style="min-width: 130px">';
        echo '<a href ="comments.php?approve=' . $comment_id . '"
        class="btn btn-success btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-thumbs-up pt-2"></i></a>';
        echo '<a href ="comments.php?unapprove=' . $comment_id . '"
        class="btn btn-warning btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-thumbs-down pt-2"></i></a>';
        echo '<a onClick="javascript: return confirm(\'Are you sure you want to delete?\');" href ="comments.php?delete=' . $comment_id . '"
        class="btn btn-danger btn-sm btn-round btn-icon">
        <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}

function approve_comment()
{
    global $connection;
    if (isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = 'UPDATE comments SET comment_status = "approved" WHERE comment_id =' . $the_comment_id;
        $approve_category = mysqli_query($connection, $query);
        header("Location: comments.php");
        sql_error_check($approve_category);
    }
}
function unapprove_comment()
{
    global $connection;
    if (isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = 'UPDATE comments SET comment_status = "unapproved" WHERE comment_id =' . $the_comment_id;
        $unapprove_category = mysqli_query($connection, $query);
        header("Location: comments.php");
        sql_error_check($unapprove_category);
    }
}
function delete_comment()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = 'DELETE FROM comments WHERE comment_id = ' . $the_comment_id;
        $delete_category = mysqli_query($connection, $query);
        header("Location: comments.php");
        sql_error_check($delete_category);
    }
}

//Users functions
function switch_user_content()
{
    if (isset($_GET['source'])) {
        $set_source = $_GET['source'];
    } else {
        $set_source = '';
    }
    switch ($set_source) {
        case 'create_user':
            include 'includes/users/create-user.php';
            break;
        case 'update_user':
            include 'includes/users/update-user.php';
            break;
        default:
            include 'includes/users/view-users.php';
            break;
    }
}
function create_user()
{
    global $connection;
    if (isset($_POST['create_user'])) {
        $create_user = $_POST['create_user'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$post_image");

        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12 ));

        //Nice Looking Query
        $query = "INSERT INTO users ";
        $query .= "(user_name, ";
        $query .= "user_email, ";
        $query .= "user_firstname, ";
        $query .= "user_lastname, ";
        $query .= "user_password, ";
        $query .= "user_role, ";
        $query .= "user_image) ";

        $query .= "VALUES('{$user_name}', ";
        $query .= "'{$user_email}', ";
        $query .= "'{$user_firstname}', ";
        $query .= "'{$user_lastname}', ";
        $query .= "'{$user_password}', ";
        $query .= "'{$user_role}', ";
        $query .= "'{$user_image}') ";

        $create_user_query = mysqli_query($connection, $query);
        sql_error_check($create_user_query);
        echo '<div class="alert alert-success">User Created: <a class="text-white" href="users.php">View Users</a></div>';
    }
}
function display_users()
{
    global $connection;
    $query = "SELECT * FROM users";
    $display_all_users = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_users)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];

        echo '<tr>';
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_firstname} {$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><img class='img-fluid' src='../images/users/{$user_image}' alt='' style='max-width:100px;'/></td>";
        echo '<td class="text-right" style="min-width: 130px">';
        echo '<a href ="users.php?source=update_user&u_id=' . $user_id . '"
        class="btn btn-success btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-edit pt-2"></i></a>';
        echo '<a onClick="javascript: return confirm(\'Are you sure you want to delete?\');" href ="users.php?delete=' . $user_id . '"
        class="btn btn-danger btn-sm btn-round btn-icon">
        <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}

function delete_user()
{
    global $connection;
    if (isset($_GET['delete'])) {
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'Administrator') {
                $the_user_id = $_GET['delete'];
                $query = 'DELETE FROM users WHERE user_id = ' . $the_user_id;
                $delete_user = mysqli_query($connection, $query);
                header("Location: users.php");
                if (!$delete_user) {
                    die('Query Failed' . mysqli_error($connection));
                }
            }
        }
    }
}

//Category functions
function create_category()
{
    global $connection;
    if (isset($_POST['add_category'])) {
        $category_name = $_POST['cat_title'];
        if ($category_name == "" || empty($category_name)) {
            echo "Form cannot be blank";
        } else {
            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUES ('" . $category_name . "')" ;
            $create_category_query = mysqli_query($connection, $query);
            sql_error_check($create_category_query);
        }
    }
}
function display_categories()
{
    global $connection;
    //query the category table
    $query = "SELECT * FROM categories";
    $display_all_categories_query = mysqli_query($connection, $query);
    //add results to a table
    while ($row = mysqli_fetch_assoc($display_all_categories_query)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo '<tr>';
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo '<td class="text-right">';
        echo '<a href ="categories.php?update=' . $cat_id . '"
        class="btn btn-success btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-edit pt-2"></i></a>';
        echo '<a onClick="javascript: return confirm(\'Are you sure you want to delete?\');" href ="categories.php?delete=' . $cat_id . '"
        class="btn btn-danger btn-sm btn-round btn-icon">
        <i class="fal fa-trash-alt pt-2"></i></a>';
        //echo '</td>';
        echo '</tr>';
    }
}

function update_category()
{
    global $connection;
    if (isset($_GET['update'])) {
        ?>
        <form class="form" action="" method="post">
            <label for="cat_title">Update Category</label>
            <div class="input-group">
                <?php form_submit_update_category(); ?>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="update_category">Update</button>
                </div>
            </div>
        </form>
        <?php
    }
    if (isset($_GET['update'])) {
        $cat_id = $_GET['update'];
    }
    if (isset($_POST['update_category'])) {
        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = '" . $the_cat_title . "' WHERE cat_id = '". $cat_id ."' ";
        $update_category = mysqli_query($connection, $query);
        header("Location: categories.php");
        if (!$update_category) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}

function form_submit_update_category()
{
    global $connection;
    if (isset($_GET['update'])) {
        $cat_id = $_GET['update'];
        $query = "SELECT * FROM categories WHERE cat_id = " . $cat_id;
        $update_categories_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($update_categories_query)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo '<input type="text" class="form-control mt-2"
            placeholder="search" name="cat_title" value="'.$cat_title.'">';
            if (!$update_categories_query) {
                die('Query Failed' . mysqli_error($connection));
            }
        }
    }
}

function delete_category()
{
    global $connection;
    if (isset($_GET['delete'])) {
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'Administrator') {
                $the_cat_id = $_GET['delete'];
                echo "WORKING";
                $query = 'DELETE FROM categories WHERE cat_id = ' . $the_cat_id;
                echo $query;
                $delete_category = mysqli_query($connection, $query);
                header("Location: categories.php");
                if (!$delete_category) {
                    die('Query Failed' . mysqli_error($connection));
                }
            }
        }
    }
}
//Form functions
function cat_option_select()
{
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
}

function user_option_select()
{
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
}
