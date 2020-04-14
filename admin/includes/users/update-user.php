<?php
/*
The Template for updating a user
*/
//Gets the database connection.
global $connection;
//update post button appends p_id to the post and the ID Number
// test to see if the url has a p_id,
//and then assign that to a variable called $url_post_id;
if (isset($_GET['u_id'])) {
  $url_user_id = $_GET['u_id'];
}
//query the post by its selected id, which is displayed in the url
$query = "SELECT * FROM users WHERE user_id = $url_user_id";
echo $query;
//assign to a new variable
$select_user_by_id = mysqli_query($connection, $query);
//loop through rows and get the data
//so we can display it in the update form
while ($row = mysqli_fetch_assoc($select_user_by_id)) {
  $user_name = $row['user_name'];
  $user_email = $row['user_email'];
  $user_firstname = $row['user_firstname'];
  $user_lastname = $row['user_lastname'];
  $user_role = $row['user_role'];
  $user_password = $row['user_password'];
  $user_image = $row['user_image'];
}
//Functionality for the update form.
//Get the form data on submit
if (isset($_POST['update_user'])) {
  $user_name = $_POST['user_name'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  $user_role = $_POST['user_role'];
  $user_password = $_POST['user_password'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_temp = $_FILES['user_image']['tmp_name'];

  // this gets the image and moves it
  //don't really understand how this works at the minute
  move_uploaded_file($user_image_temp, "../images/users/$user_image");

  // this  prevents the post image from showing empty
  // when the form is updated
  if (empty($user_image)) {
    $query = "SELECT * FROM users WHERE user_id = $url_user_id";
    $select_image = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_image)) {
      $user_image = $row['user_image'];
    }
  }

  //Nice Looking Query
  $query = "UPDATE users SET ";
  $query .= "user_name = '{$user_name}', ";
  $query .= "user_email = '{$user_email}', ";
  $query .= "user_firstname = '{$user_firstname}', ";
  $query .= "user_lastname = '{$user_lastname}', ";
  $query .= "user_role = '{$user_role}', ";
  $query .= "user_password = '{$user_password}', ";
  $query .= "user_image = '{$user_image} ' ";
  $query .= "WHERE user_id = {$url_user_id}";

  $update_user = mysqli_query($connection, $query);
  //echo $query;
  sql_error_check($update_user);
}
?>
<div class="card">
  <div class="card-body">
    <h2>Edit User</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_name">Username</label>
            <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="user_role">Select Role</label><br>
            <select class="" name="user_role">
              <?php
              $default_state = $user_role;
              ?>
              <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
              <option value="Administrator">Administrator</option>
              <option value="Editor">Editor</option>
              <option value="Subscriber">Subscriber</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <img src="../images/users/<?php echo $user_image; ?>" alt="" style="max-width: 200px;">
          </div>
          <div class="form-group">
            <label for="user_image"><span class="btn btn-info">Replace Image</span></label>
            <input type="file" class="form-control-file" name="user_image" id="postImage">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="update_user">Update User</button>
    </form>
  </div>
</div><!-- end card -->
