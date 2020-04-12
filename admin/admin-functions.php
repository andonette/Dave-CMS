<?php

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
        echo '<a href ="admin-categories.php?update=' . $cat_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-edit pt-2"></i></a>';
        echo '<a href ="admin-categories.php?delete=' . $cat_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';
        //echo '</td>';
        echo '</tr>';
    }
}

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

function update_category()
{
    global $connection;
    if (isset($_GET['update'])) {
        include 'includes/categories/update-categories.php';
    }
    if (isset($_GET['update'])) {
        $cat_id = $_GET['update'];
    }
    if (isset($_POST['update_category'])) {
        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = '" . $the_cat_title . "' WHERE cat_id = '". $cat_id ."' ";
        $update_category = mysqli_query($connection, $query);
        header("Location: admin-categories.php");
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
        $the_cat_id = $_GET['delete'];
        echo "WORKING";
        $query = 'DELETE FROM categories WHERE cat_id = ' . $the_cat_id;
        echo $query;
        $delete_category = mysqli_query($connection, $query);
        header("Location: admin-categories.php");
        if (!$delete_category) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}

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
            include 'includes/posts/create-posts.php';
            break;
        case 'update_post':
            include 'includes/posts/update-posts.php';
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
        header("Location: admin-posts.php");
        if (!$delete_post) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}

//categories Functions
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
        echo '<a href ="admin-comments.php?approve=' . $comment_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-thumbs-up pt-2"></i></a>';
        echo '<a href ="admin-comments.php?unapprove=' . $comment_id . '"
            class="btn btn-warning btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-thumbs-down pt-2"></i></a>';
        echo '<a href ="admin-comments.php?delete=' . $comment_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}

function delete_comment()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = 'DELETE FROM comments WHERE comment_id = ' . $the_comment_id;
        $delete_category = mysqli_query($connection, $query);
        header("Location: admin-comments.php");
        sql_error_check($delete_category);
    }
}

function unapprove_comment()
{
    global $connection;
    if (isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = 'UPDATE comments SET comment_status = "unapproved" WHERE comment_id =' . $the_comment_id;
        $unapprove_category = mysqli_query($connection, $query);
        header("Location: admin-comments.php");
        sql_error_check($unapprove_category);
    }
}
function approve_comment()
{
    global $connection;
    if (isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = 'UPDATE comments SET comment_status = "approved" WHERE comment_id =' . $the_comment_id;
        $approve_category = mysqli_query($connection, $query);
        header("Location: admin-comments.php");
        sql_error_check($approve_category);
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
function delete_user()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];
        $query = 'DELETE FROM users WHERE user_id = ' . $the_user_id;
        $delete_user = mysqli_query($connection, $query);
        header("Location: admin-users.php");
        if (!$delete_user) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}
