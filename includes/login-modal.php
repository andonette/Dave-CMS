
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="card card-login">
             <form class="form" action="includes/login.php" method="post">
              <div class="card-header">
                  <img class="card-img" src="images/square1.png" alt="Card image">
                  <h4 class="card-title">Login</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
              </div>
              <div class="card-body">
                <div class="input-group input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fal fa-user"></i></span>
                  </div>
                  <input type="passsword" class="form-control" placeholder="username" name="username" name="password">
                </div>
                <div class="input-group input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fal fa-lock"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="password">
                </div>
              </div>
              <div class="card-footer">
                  <button class="btn btn-success btn-round" type="submit"
                  name="login">Login</button>
              </div>
              <br>
              <div class="pull-left ml-3 mb-3">
                  <h6><a href="registration.php" class="link footer-link">Register</a></h6>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- <div class="card">
    <div class="card-body">
        <h4>Log In</h4>
        <form class="form" action="includes/login.php" method="post">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
            <div class="input-group">
                <button class="btn btn-default" type="submit"
                name="login">Login</button>
            </div>
        </form>
    </div>
</div>
 -->
