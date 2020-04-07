<?php include 'includes/admin-header.php'; ?>
<?php
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
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1>Categories</h1>
                            </div>
                            <div class="col-sm-6 mr-auto">
                                <form class="form" action="" method="post">
                                    <label for="cat_title">Add Category</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control mt-2"
                                        placeholder="search" name="cat_title">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" name="add_category">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 mr-auto">
                            <?php
                            if (isset($_GET['update'])) {
                                include 'admin-update-categories.php';
                            }
                             ?>
                                        <?php
                                        if (isset($_POST['update_category'])) {
                                            $the_cat_title = $_POST['cat_title'];
                                            echo "update WORKING";
                                            echo $the_cat_id;
                                            $query = "UPDATE categories SET cat_title = '" . $the_cat_title . "' WHERE cat_id = '". $cat_id ."' ";
                                            echo $query;
                                            $update_category = mysqli_query($connection, $query);
                                            header("Location: admin-categories.php");
                                        } else {
                                                echo "update NOT WORKING";
                                                echo $query;
                                        }

                                        ?>

                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th class="text-right">Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM categories";
                                $display_all_categories_query = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($display_all_categories_query)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo '<tr>';
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    ?>
                                    <td class="text-right">
                                        <!-- <a href ="admin-categories.php?view=<?php echo $cat_id; ?>"
                                        class="btn btn-info btn-sm btn-round btn-icon">
                                        <i class="fal fa-eye pt-2"></i> -->
                                    </a>
                                    <a href ="admin-categories.php?update=<?php echo $cat_id; ?>"
                                        class="btn btn-success btn-sm btn-round btn-icon">
                                        <i class="fal fa-edit pt-2"></i>
                                    </a>
                                    <a href ="admin-categories.php?delete=<?php echo $cat_id; ?>"
                                        class="btn btn-danger btn-sm btn-round btn-icon">
                                        <i class="fal fa-trash-alt pt-2"></i>
                                    </a>

                                    <?php
                                    echo '</tr>';
                                }

                                if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    echo "WORKING";
                                    $query = 'DELETE FROM categories WHERE cat_id = ' . $the_cat_id;
                                    echo $query;
                                    $delete_category = mysqli_query($connection, $query);
                                    header("Location: admin-categories.php");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end card -->


            </div>

        </div>

    </div>
</div>
<?php include 'includes/admin-footer.php'; ?>
