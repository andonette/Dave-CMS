<?php
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
unapprove_comment();
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
approve_comment();
