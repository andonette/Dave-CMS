<?php
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
?>
<form class="form" action="" method="post">
    <?php create_category(); ?>
    <label for="cat_title">Add Category</label>
    <div class="input-group">
        <input type="text" class="form-control mt-2"
        placeholder="search" name="cat_title">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"
            name="add_category">Add</button>
        </div>
    </div>
</form>
