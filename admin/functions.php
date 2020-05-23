<?php
//for using post requests
function request($method){
    return $_SERVER['REQUEST_METHOD'] == mb_strtoupper($method);
}
//check if the user is an admin and if not return them to the front end
function check_admin(){
    //this is just checking if the user is an administrator
    if (!isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] !== 'Administrator' || $_SESSION['user_role'] !== 'Subscriber') {
            //if not they can't access the admin page
            redirect('index.php');
        }
    }
}
//check if user is an admin
function is_admin($username = '') {
    global $connection;
    $query = "SELECT user_role FROM users WHERE user_name = '$username'";
    $result = mysqli_query($connection, $query);
    sql_error_check($result);

    $row = mysqli_fetch_array($result);
    if ($row['user_role'] == 'Administrator') {
        return true;
    } else {
        return false;
    }
}
// check if the username exists
function username_exists($username) {
    global $connection;
    $query = "SELECT user_name FROM users WHERE user_name = '$username'";
    $result = mysqli_query($connection, $query);
    sql_error_check($result);
    if (mysqli_num_rows($result) > 0 ) {
        return true;
    } else {
        return false;
    }
}
//check if the email exists
function email_exists($email) {
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    sql_error_check($result);
    if (mysqli_num_rows($result) > 0 ) {
        return true;
    } else {
        return false;
    }
}
//simple redirect to location
function redirect($location) {
    return header("Location: " . $location);
}
//login functionality
function login_user($db_user_name, $db_user_password) {
    global $connection;
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //first, store the results in a couple of temp variables
    //called username and password

    //then sanitise the strings, so no one puts bad stuff in..
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    //testing to see if these exist in the database
    $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    sql_error_check($select_user_query);

    // if they do exist, then get all the info out of the tables
    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_user_name = $row['user_name'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }

    // if the username and password match, create variables for the session
    if (password_verify($password, $db_user_password)) {
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        //and head on over to the admin area
        hredirect('admin');
    } else {
        //otherwise stay on the front end
        redirect('index');
    }
}
function register_user($user_name, $user_email, $user_password) {
    global $connection;
    if (username_exists($user_name)) {
    }
    if (email_exists($user_email)) {
    }
    echo $user_name . '<br>' . $user_email . '<br>' . $user_password;

    $user_name = mysqli_real_escape_string($connection, $user_name);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12 ));

    //Nice Looking Query
    $query = "INSERT INTO users ";
    $query .= "(user_name, ";
    $query .= "user_email, ";
    $query .= "user_password, ";
    $query .= "user_role) ";

    $query .= "VALUES('{$user_name}', ";
    $query .= "'{$user_email}', ";
    $query .= "'{$user_password}', ";
    $query .= "'Subscriber') ";

    if (!empty($user_name) && !empty($user_password) && !empty($user_email)) {
        $register_query = mysqli_query($connection, $query);
        sql_error_check($register_query);
    }
}
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
    $query = "SELECT posts.post_id, posts.post_title, posts.post_date, posts.post_category_id, posts.post_status, posts.post_image, ";
    $query .= "posts.post_content, posts.post_author_id, posts.post_tags, posts.post_comment_count, posts.post_views_count, ";
    $query .= "users.user_name, ";
    $query .= "categories.cat_title, ";
    $query .= "comments.comment_post_id ";
    $query .= "FROM posts ";
    $query .= "LEFT JOIN categories ON posts.post_category_id = categories.cat_id ";
    $query .= "LEFT JOIN users ON posts.post_author_id = users.user_id ";
    $query .= "LEFT JOIN comments ON posts.post_comment_count = comments.comment_id ORDER BY post_id DESC";
    //echo $query;
    //$query = "SELECT * FROM posts";
    $display_all_posts = mysqli_query($connection, $query);
    sql_error_check($display_all_posts);
    while ($row = mysqli_fetch_assoc($display_all_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_author_id = $row['post_author_id'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_tags = $row['post_tags'];
        $post_image = $row['post_image'];
        $post_views_count = $row['post_views_count'];
        $user_name = $row['user_name'];
        $cat_title = $row['cat_title'];
        $comment_id = $row['comment_post_id'];
        //$comment_count = comment_id = $row['comment_post_id'];

        echo '<tr>';
        ?>
        <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value ="<?php echo $post_id; ?>"></td>
        <?php
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-fluid' src='../images/posts/{$post_image}' alt='' style='max-width:100px;'/></td>";
        echo "<td>{$post_tags}</td>";

        $comment_count_query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
        $comment_query = mysqli_query($connection, $comment_count_query);
        //$row = mysqli_fetch_array($comment_query);
        $comment_count = mysqli_num_rows($comment_query);
        //echo $comment_count;

        echo "<td><a href='comments-filtered.php?id=$comment_id'class='text-dark'>{$comment_count}</a></td>";

        echo "<td>{$post_views_count}</td>";
        echo '<td class="text-right" style="min-width: 200px;">';
        echo '<a href ="../post.php?p_id=' . $post_id . '"
        class="btn btn-warning btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-eye pt-2"></i></a>';
        echo '<a href ="posts.php?source=update_post&p_id=' . $post_id . '"
        class="btn btn-success btn-sm btn-round btn-icon mr-2">
        <i class="fal fa-edit pt-2"></i></a>';
        ?>
        <form method="post" class="d-inline">
            <input type="hidden" value="<?php echo $post_id ?>" name="post_id">
            <button type="submit" name="delete" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
                <i class="fal fa-trash-alt pt-2"></i>
            </button>
        </form>
        <?php
        //echo '<a rel="'.$post_id.'" href="javascript:void(0)" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
        //<i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';

    }
}
function update_post_form()
{
    global $connection;
    if (isset($_GET['p_id'])) {
        $url_post_id = $_GET['p_id'];
    }
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
        $query .= "post_author = '{$post_author_id}', ";
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
    if (isset($_POST['delete'])) {
        $the_post_id = $_POST['post_id'];
        $query = 'DELETE FROM posts WHERE post_id = ' . $the_post_id;
        $delete_post = mysqli_query($connection, $query);
        redirect('posts.php');
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
                redirect('posts.php');
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
                    sql_error_check($create_post_query);
                }
                redirect('posts.php');
                sql_error_check($update_status);
                break;
                case 'Draft':
                global $connection;
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $checkBoxValue";
                $update_status = mysqli_query($connection, $query);
                redirect('posts.php');
                sql_error_check($update_status);
                break;
                case 'delete':
                global $connection;
                $query = "DELETE FROM posts WHERE post_id = $checkBoxValue" ;
                $delete_post = mysqli_query($connection, $query);
                redirect('posts.php');
                sql_error_check($delete_post);
                break;
                case 'reset':
                global $connection;
                $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $checkBoxValue";
                $update_status = mysqli_query($connection, $query);
                redirect('posts.php');
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
        echo '<a rel="'.$comment_id.'" href="javascript:void(0)" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
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


            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
            echo "<td>{$comment_date}</td>";
            echo '<td class="text-right" style="min-width: 130px">';
            echo '<a href ="comments.php?approve=' . $comment_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-thumbs-up pt-2"></i></a>';
            echo '<a href ="comments.php?unapprove=' . $comment_id . '"
            class="btn btn-warning btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-thumbs-down pt-2"></i></a>';
            echo '<a rel="'.$comment_id.'" href="javascript:void(0)" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
            <i class="fal fa-trash-alt pt-2"></i></a>';
            echo '</td>';
            echo '</tr>';
        }
    }
}

function approve_comment()
{
    global $connection;
    if (isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = 'UPDATE comments SET comment_status = "approved" WHERE comment_id =' . $the_comment_id;
        $approve_category = mysqli_query($connection, $query);
        redirect('comments.php');
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
        redirect('comments.php');
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
        redirect('comments.php');
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
        echo '<a rel="'.$user_id.'" href="javascript:void(0)" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
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
                redirect('users.php');
                sql_error_check($delete_user);
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
        echo '<a rel="'.$cat_id.'" href="javascript:void(0)" class="btn btn-danger btn-sm btn-round btn-icon delete-link">
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
        redirect('categories.php');
        sql_error_check($update_category);
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
            sql_error_check($update_categories_query);
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
                $delete_category = mysqli_query($connection, $query);
                redirect('categories.php');
                sql_error_check($delete_category);
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
function row_count($table)
{
    global $connection;
    $query = 'SELECT * FROM ' . $table;
    $select = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select);
    return $count;
}
$post_count = row_count('posts');
$user_count = row_count('users');
$comment_count = row_count('categories');
$category_count = row_count('comments');
$draft_post_count = count_draft('posts', 'post_status', 'Draft');
$draft_comment_count = count_draft('comments', 'comment_status', 'approved');
$admin_user_count = count_draft('users', 'user_role', 'Administrator');
$admin_subscriber_count = count_draft('users', 'user_role', 'Subscriber');
//echo $user_count;

function count_draft($table, $column, $status){
    global $connection;
    $query = "SELECT * FROM $table WHERE $column = '$status'";
    $select = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select);
    return $count;
}

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
            $comment_date = date_create($row['comment_date']);
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            ?>
            <li class="media mb-3">

                <div class="media-body">
                    <h5 class="mt-0 mb-1">Posted By <?php echo $comment_author; ?> On <?php echo date_format($comment_date, 'M dS Y'); ?>  </h5>
                    <?php echo $comment_content; ?>
                </div>
            </li>
        <?php }
    }
