<?php
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
            echo "You didn't enter owt";
        } else {
            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUES ('" . $category_name . "')" ;
            echo $query;
            $create_category_query = mysqli_query($connection, $query);
            echo $create_category_query;

            if (!$create_category_query) {
                die('Query Failed' . mysqli_error($connection));
            }
        }
    }
}

function update_category()
{
    global $connection;
    if (isset($_GET['update'])) {
        include 'admin-update-categories.php';
    }
    if (isset($_GET['update'])) {
        $cat_id = $_GET['update'];
        echo $cat_id . '<br>';
    }
    if (isset($_POST['update_category'])) {
        $the_cat_title = $_POST['cat_title'];
        echo "update WORKING";
        echo $the_cat_id;
        $query = "UPDATE categories SET cat_title = '" . $the_cat_title . "' WHERE cat_id = '". $cat_id ."' ";
        echo $query;
        $update_category = mysqli_query($connection, $query);
        //header("Location: admin-categories.php");
    } else {
            echo "update NOT WORKING";
            echo $query;
    }
}

function form_submit_update() {
    global $connection;
    if (isset($_GET['update'])) {
        $cat_id = $_GET['update'];
        $query = "SELECT * FROM categories WHERE cat_id = " . $cat_id;
        $update_categories_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($update_categories_query)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            ?>

            <input type="text" class="form-control mt-2"
            placeholder="search" name="cat_title" value="<?php if (isset($cat_title)) {
                echo $cat_title;
            } ?>">

            <?php
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
    }
}
