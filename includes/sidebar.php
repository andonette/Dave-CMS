<?php
/*
Sidebar
*/
?>
<!-- Blog Search Well -->
<div class="card">
    <div class="card-body">
        <h4>Blog Search</h4>
        <form class="form" action="search.php" method="post">
            <div class="input-group">

                <input type="text" class="form-control mt-1" placeholder="search" name="search">
                <div class="input-group-append">
                    <button class="btn btn-ghost-white" type="submit" name="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Blog Categories Well -->
<div class="card">
    <div class="card-body">
        <h4>Blog Categories</h4>
        <ul class="list-unstyled">
            <?php
            $query = "SELECT * FROM categories";
            $select_all_categories_query = mysqli_query($connection, $query) ;
            while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                ?>
                <li>
                    <a class="text-white" href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<!-- /.col-lg-6 -->

<!-- Side Widget Well -->
<div class="card">
    <div class="card-body">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
</div>
