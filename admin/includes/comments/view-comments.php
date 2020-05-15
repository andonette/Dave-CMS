<?php
/*
The Template for diaplaying comments
includes functionality to display, approve and unapprove
*/
//categories Functions
include 'includes/delete-modal.php';
?>
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>ID</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>Posted On</th>
                <th>Date</th>
                <th class="text-right">Actions</th>
            </thead>
            <tbody>
                <?php display_comments(); ?>
            </tbody>
        </table>
    </div>
</div><!-- end card -->

<script type="text/javascript">
    $(document).ready(function(){
        $(".delete-link").on('click', function(){
            var id = $(this).attr("rel");
            var deleteUrl = "comments.php?delete=" + id + " ";
            $(".modal-delete-link").attr("href", deleteUrl);
            $("#confirmDelete").modal('show');
        });
    });
</script>
