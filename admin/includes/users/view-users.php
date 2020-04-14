<?php
/*
The Template for viewing users
*/
function display_users()
{
    global $connection;
    $query = "SELECT * FROM users";
    $display_all_users = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($display_all_users)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];

        echo '<tr>';
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_firstname} {$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
          echo "<td><img class='img-fluid' src='../images/users/{$user_image}' alt='' style='max-width:100px;'/></td>";
        echo '<td class="text-right" style="min-width: 130px">';
        echo '<a href ="users.php?source=update_user&u_id=' . $user_id . '"
            class="btn btn-success btn-sm btn-round btn-icon mr-2">
            <i class="fal fa-edit pt-2"></i></a>';
        echo '<a href ="users.php?delete=' . $user_id . '"
            class="btn btn-danger btn-sm btn-round btn-icon">
            <i class="fal fa-trash-alt pt-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
}
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
