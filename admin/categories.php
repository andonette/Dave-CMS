<?php include 'includes/header.php'; ?>
<?php
if (isset($_POST['submit'])) {
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
                             <div class="col-sm-6 mr-auto">
                                 <h1>Categories</h1>
                                 <form class="form" action="" method="post">
                                     <label for="cat_title">Add Category</label>
                                     <div class="input-group">
                                         <input type="text" class="form-control mt-2" placeholder="search" name="cat_title">
                                         <div class="input-group-append">
                                             <button class="btn btn-primary" type="submit" name="submit">Add</button>
                                         </div>
                                     </div>
                                 </form>
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
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo '<tr>';
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo '</tr>';
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
<?php include 'includes/footer.php'; ?>
