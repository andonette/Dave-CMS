<?php
//Category Functions
function sql_error_check($result)
{
    global $connection;
    if (!$result) {
        die('query failed' . mysqli_error($connection));
    }
}

function display_categories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $display_all_categories_query = mysqli_query($connection, $query);
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
        $post_comment_count = $row['post_comment_count'];
        
        echo '<tr>';
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
        echo "<td><img class='img-fluid' src='../images/{$post_image}' alt='' style='max-width:100px;'/></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo '<td class="text-right" style="min-width: 100px;">';
        echo '<a href ="admin-posts.php?source=update_post&p_id=' . $post_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-edit pt-2"></i></a>';
        echo '<a href ="admin-posts.php?delete=' . $post_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
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

function create_post()
{
    global $connection;
    if (isset($_POST['create_post'])) {
        $create_post = $_POST['create_post'];

        $post_title = $_POST['post_title'];
        $post_cat_id = $_POST['post_category'];
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

        $create_post_query = mysqli_query($connection, $query);
        sql_error_check($create_post_query);
    }
}
function update_post()
{
//
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
        echo "<td>{$comment_post_id}</td>";
        echo "<td>{$comment_date}</td>";




        echo "<td>{$comment_status}</td>";
        echo '<td class="text-right">';
        echo '<a href ="admin-comments.php?source=update_comment&p_id=' . $comment_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-thumbs-up pt-2"></i></a>';
        echo '<a href ="admin-comments.php?source=update_comment&p_id=' . $comment_id . '"
            class="btn btn-warning btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-thumbs-down pt-2"></i></a>';
        echo '<a href ="admin-comments.php?delete=' . $comment_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';

        echo '</td>';
        echo '</tr>';
    }
}
function switch_comment_content()
{
    if (isset($_GET['source'])) {
        $set_source = $_GET['source'];
    } else {
        $set_source = '';
    }
    switch ($set_source) {
        case 'create_comment':
            include 'includes/comments/create-comments.php';
            break;
        case 'update_comment':
            include 'includes/comments/update-comments.php';
            break;
        default:
            include 'includes/comments/view-comments.php';
            break;
    }
}
