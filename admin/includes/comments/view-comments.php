<?php
/*
The Template for diaplaying comments
includes functionality to display, approve and unapprove
*/
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
?>
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>ID</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>Posted On</th>
                <th>Date</th>
                <th class="text-right">Actions</th>
            </thead>
            <tbody>
                <?php display_comments(); ?>
            </tbody>
        </table>
    </div>
</div><!-- end card -->
