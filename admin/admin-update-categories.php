<form class="form" action="" method="post">
    <label for="cat_title">Update Category</label>
    <div class="input-group">
        <?php
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
        ?>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" name="update_category">Update</button>
        </div>
    </div>
</form>
