<?php
/*
The Template for creating a user
includes create user function
*/
global $connection;
if (isset($_POST['create_user'])) {
    $create_user = $_POST['create_user'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($user_image_temp, "../images/$post_image");

    //Nice Looking Query
    $query = "INSERT INTO users ";
    $query .= "(user_name, ";
    $query .= "user_email, ";
    $query .= "user_firstname, ";
    $query .= "user_lastname, ";
    $query .= "user_password, ";
    $query .= "user_role, ";
    $query .= "user_image) ";

    $query .= "VALUES('{$user_name}', ";
    $query .= "'{$user_email}', ";
    $query .= "'{$user_firstname}', ";
    $query .= "'{$user_lastname}', ";
    $query .= "'{$user_password}', ";
    $query .= "'{$user_role}', ";
    $query .= "'{$user_image}') ";

    $create_user_query = mysqli_query($connection, $query);
    sql_error_check($create_user_query);
    echo '<div class="alert alert-success">User Created: <a class="text-white" href="users.php">View Users</a></div>';

}
?>

<div class="card">
  <div class="card-body">
    <h2>Create A New User</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_name">Username</label>
            <input type="text" class="form-control" name="user_name">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" name="user_email">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password">
          </div>
        </div>
      <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_role">Select Role</label><br>
            <select class="form-control" name="user_role">
            <option value="Administrator">Administrator</option>
            <option value="Editor">Editor</option>
            <option value="Subscriber">Subscriber</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_image"><span class="btn btn-success">Profile Image</span></label>
            <input type="file" class="form-control-file" name="user_image" id="postImage">
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="create_user">Create User</button>
    </form>
  </div>
</div><!-- end card -->
