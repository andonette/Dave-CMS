<?php
function delete_category()
{
    global $connection;
    if (isset($_GET['delete'])) {
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
delete_category();
