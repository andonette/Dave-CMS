<?php
/*
The Template for viewing post
includes view and delete posts functionality
*/
function display_posts()
{
    global $connection;
    $query = "SELECT * FROM posts";
    $display_all_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_tags = $row['post_tags'];
        $post_image = $row['post_image'];
        $post_comment_count = $row['post_comment_count'];

        echo '<tr>';
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        
        $query = "SELECT * FROM categories WHERE cat_id = " . $post_category_id;
        $show_cat_name = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($show_cat_name)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
        }

        echo "<td>{$cat_title}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-fluid' src='../images/posts/{$post_image}' alt='' style='max-width:100px;'/></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo '<td class="text-right" style="min-width: 130px;">';
        echo '<a href ="../post.php?p_id=' . $post_id . '"
            class="btn btn-warning btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-eye pt-2"></i></a>';
        echo '<a href ="posts.php?source=update_post&p_id=' . $post_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-edit pt-2"></i></a>';
        echo '<a href ="posts.php?delete=' . $post_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}
?>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Date</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th class="text-right">Actions</th>
            </thead>
            <tbody>
                <?php display_posts(); ?>
                <?php delete_posts(); ?>
            </tbody>
        </table>
    </div>
</div><!-- end card -->
