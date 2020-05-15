<?php

//Post functions

<<<<<<< HEAD
            $comment_count_query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
            $comment_query = mysqli_query($connection, $comment_count_query);
            $row = mysqli_fetch_array($comment_query);
            $comment_id = $row['comment_post_id'];
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
            echo '<a rel="'.$post_id.'" href="javascript:void(0)" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
            <i class="fal fa-trash-alt pt-2"></i></a>';
            echo '</td>';
            echo '</tr>';
        }
    }
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
=======
>>>>>>> a06707b63eff2110b173ba275ff89545ca4b3566

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

//Users functions

// users online
function onlineUsers(){
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

            if ($count == NULL) {
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
function delete_user()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];
        $query = 'DELETE FROM users WHERE user_id = ' . $the_user_id;
        $delete_user = mysqli_query($connection, $query);
        header("Location: users.php");
        if (!$delete_user) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}
<<<<<<< HEAD

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

function category_nav()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        ?>
        <li class="nav-item">
            <a class="nav-link" href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
        </li>
        <?php
    }
}

function show_update()
{
    if (isset($_SESSION['user_role'])) {
        if (isset($_GET['p_id'])) {
            $post_edit_id = $_GET['p_id'];
            echo "<li class='nav-item'><a class='nav-link' href='admin/posts.php?source=update_post&p_id={$post_edit_id}'>Edit Post</a></li>";
        }
    }
}
// Count Stuff.
function count_rows($table)
{
    global $connection;
    $query = 'SELECT * FROM ' . $table;
    $select = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select);
    return $count;
}
$post_count = count_rows('posts');
$user_count = count_rows('users');
$comment_count = count_rows('categories');
$category_count = count_rows('comments');
//echo $user_count;

function comment_form()
{
    global $connection;
    //if submit comment button is clicked
    //get all the values from the form
    if (isset($_POST['submit_comment'])) {
        $get_post_id = $_GET['p_id'];
        $submit_comment_form = $_POST['submit_comment'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
            //create a query from the post valyes
            $query = "INSERT INTO comments (comment_post_id, comment_author,
                comment_email, comment_content, comment_status, comment_date) ";
                $query .= "VALUES ($get_post_id, '{$comment_author}', '{$comment_email}',
                '{$comment_content}', 'unapproved', now())";

                $comment_form_query = mysqli_query($connection, $query);
        } else {
            echo '<script>alert("Comment cannot be empty")</script>';
        }
    }
}
function show_post_comments()
{
    global $connection;
    global $get_post_id;
    //this gets the post id from the comment
    //and displays comments with a status of approved
    $query = "SELECT * FROM comments WHERE comment_post_id = {$get_post_id} ";
    $query .= "AND comment_status = 'approved' ";
    $query .= "ORDER BY comment_id DESC";
    $display_all_comments = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_comments)) {
        $comment_date = $row['comment_date'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        ?>
        <li class="media mb-3">
            <img class="mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">Posted By <?php echo $comment_author; ?> On <?php echo $comment_date; ?>  </h5>
                <?php echo $comment_content; ?>
            </div>
        </li>
    <?php }
}
=======
>>>>>>> a06707b63eff2110b173ba275ff89545ca4b3566
