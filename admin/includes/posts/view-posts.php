<?php
/*
The Template for viewing post
includes view and delete posts functionality
*/
include 'includes/delete-modal.php';
?>
<div class="card">
    <div class="card-body">
        <?php
        // check if we check any checkboxes
        // (the whole table is wrapped in a form
        bulk_edit_posts();
        ?>
        <form class="" action="" method="post">
            <table class="table table-striped">
                <div id="bulkOptionsContainer">
                    <div class="form-group">
                        <select class="form-control" name="bulk_options">
                            <option value="">Select Options</option>
                            <option value="Duplicate">Duplicate</option>
                            <option value="Published">Publish</option>
                            <option value="Draft">Draft</option>
                            <option value="delete">Delete</option>
                            <option value="reset">Reset Views</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button onClick="javascript: return confirm(\'Are you sure you want to delete?\');" type="submit" name="apply" class="btn btn-primary">Apply</button>
                    </div>
                </div>
                <thead>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Views</th>
                    <th class="text-right" style="width: 100px;">Actions</th>
                </thead>
                <tbody>
                    <?php display_posts(); ?>
                    <?php delete_posts(); ?>
                </tbody>
            </table>
        </form>
    </div>
</div><!-- end card -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete-link").on('click', function(){
            var id = $(this).attr("rel");
            var deleteUrl = "posts.php?delete=" + id + " ";
            $(".modal-delete-link").attr("href", deleteUrl);
            $("#confirmDelete").modal('show');
        });
    });
</script>
