<?php

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
delete_comment();
