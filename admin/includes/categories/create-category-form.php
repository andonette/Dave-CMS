<?php
/*
The Template for diaplaying categories
includes functionality to create, edit and delete
*/
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
