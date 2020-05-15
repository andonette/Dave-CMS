<?php include 'includes/delete-modal.php'; ?>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete-link").on('click', function(){
            var id = $(this).attr("rel");
            var deleteUrl = "categories.php?delete=" + id + " ";
            $(".modal-delete-link").attr("href", deleteUrl);
            $("#confirmDelete").modal('show');
        });
    });
</script>
