<?php
// Count Stuff.
function count_rows($table){
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

function count_draft($table, $row, $status){
  global $connection;
  $query = 'SELECT * FROM ' . $table . ' WHERE ' . $row .  ' = ' . $status;
  $select = mysqli_query($connection, $query);
  $count = mysqli_num_rows($select);
  return $count;
}
//echo $user_count;
$draft_post_count = count_draft('posts', 'post_status','"Draft"');
$admin_user_count = count_draft('users', 'user_role','"Administrator"');
$admin_subscriber_count = count_draft('users', 'user_role','"Subscriber"');
$draft_comment_count = count_draft('comments', 'comment_status','"unapproved"');

//Post functions


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
