<?php
function display_categories()
{
    global $connection;
    //query the category table
    $query = "SELECT * FROM categories";
    $display_all_categories_query = mysqli_query($connection, $query);
    //add results to a table
    while ($row = mysqli_fetch_assoc($display_all_categories_query)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo '<tr>';
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo '<td class="text-right">';
        echo '<a href ="categories.php?update=' . $cat_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-edit pt-2"></i></a>';
        echo '<a href ="categories.php?delete=' . $cat_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';
        //echo '</td>';
        echo '</tr>';
    }
}

?>
<div class="card">
    <div class="card-body">
      <table class="table">
          <thead>
              <th>ID</th>
              <th>Category Title</th>
              <th class="text-right">Actions</th>
          </thead>
          <tbody>
              <?php display_categories(); ?>
          </tbody>
      </table>
    </div>
</div><!-- end card -->
