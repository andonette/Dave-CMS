<?php
/*
The Template for updating a user
*/
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
      <div class="col-md-4 col-sm-12">
          <div class="form-group">
            <label for="user_role">Select Role</label><br>
            <select class="" name="user_role">
            <option value="Administrator">Administrator</option>
            <option value="Editor">Editor</option>
            <option value="Subscriber">Subscriber</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password">
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
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
