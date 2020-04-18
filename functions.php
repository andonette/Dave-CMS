<?php
/* front end functions
*/
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
            //update the comment count by 1 on the relevant post
            $get_post_id = $_GET['p_id'];
            $query = "UPDATE posts SET post_comment_count = post_comment_count +1 ";
            $query .= "WHERE post_id = $get_post_id ";
            $update_comment_count = mysqli_query($connection, $query);
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
