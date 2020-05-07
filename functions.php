<?php
/* front end functions
*/

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
