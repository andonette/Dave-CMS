<?php
/*
The Template for updating a category
included from the admin category page
when edit button is selected
*/
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
        header("Location: categories.php");
        if (!$update_category) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}
update_category();

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
?>
