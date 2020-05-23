<?php
/*
Site Index
*/
include 'includes/header.php' ?>


<div class="page-header">
    <div class="page-header-image"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 mx-auto">
                <div id="square7" class="square square-7"></div>
                <div id="square8" class="square square-8"></div>
                <div class="card card-register">
                    <form class="" action="" method="post">
                        <div class="card-header">
                            <img class="card-img" src="images/square1.png" alt="Card image">
                            <h4 class="card-title">Login</h4>
                        </div>
                        <div class="card-body">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="on" value="<?php echo isset($user_name) ? $user_name : ''; ?>">
                            </div>
                            <small class="text-muted"><?php echo isset($error['username']) ? $error['username'] : ''; ?></small>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <small class="text-muted"><?php echo isset($error['password']) ? $error['password'] : ''; ?></small>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="register" value="Register" class="btn btn-info btn-round btn-lg">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="register-bg"></div>
    <div id="square1" class="square square-1"></div>
    <div id="square2" class="square square-2"></div>
    <div id="square3" class="square square-3"></div>
    <div id="square4" class="square square-4"></div>
    <div id="square5" class="square square-5"></div>
    <div id="square6" class="square square-6"></div>
</div>
