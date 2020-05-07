<?php
/*
The Template for viewing users
*/
?>
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Avatar</th>
                <th class="text-right">Actions</th>
            </thead>
            <tbody>
                <?php display_users(); ?>
                <?php delete_user(); ?>
                <?php //approve_comment(); ?>
                <?php //unapprove_comment(); ?>
            </tbody>
        </table>
    </div>
</div><!-- end card -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete-link").on('click', function(){
            var id = $(this).attr("rel");
            var deleteUrl = "users.php?delete=" + id + " ";
            $(".modal-delete-link").attr("href", deleteUrl);
            $("#confirmDelete").modal('show');
        });
    });
</script>
