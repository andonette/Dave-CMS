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
                <?php delete_comment(); ?>
                <?php approve_comment(); ?>
                <?php unapprove_comment(); ?>
            </tbody>
        </table>
    </div>
</div><!-- end card -->
