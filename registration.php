<?php
/*
Site Index
*/
include 'includes/header.php' ?>
<?php
/*form action */
if (isset($_POST['register'])) {
    echo 'talking';
    $user_name = trim($_POST['username']);
    $user_email = trim($_POST['email']);
    $user_password = trim($_POST['password']);

    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if (strlen($user_name) < 6 ) {
     $error['username'] = 'Username should be at least 6 characters';
    }
    if ($user_name == '') {
     $error['username'] = 'Username cannot be empty';
    }
    if (username_exists($user_name)) {
     $error['username'] = 'User already exists, try again';
    }
    if ($user_email == '') {
     $error['email'] = 'email cannot be empty';
    }
    if (email_exists($user_name)) {
     $error['email'] = 'email already exists, try again <a href="index.php">Please Login</a>';
    }
    if (strlen($user_password) < 8 ) {
     $error['email'] = 'Password must be 8 characters or more';
    }

    foreach ($error as $key => $value) {
        if (empty($value)) {
            unset($error[$key]);
            //register_user($user_name, $user_email, $user_password);
            //login_user($user_name, $user_password);
        }
    }
    if (empty($error)) {
        register_user($user_name, $user_email, $user_password);
    } else {
        echo $error['username'] . '<br>';
        echo $error['email'] . '<br>';
        echo $error['password'] . '<br>'; 
    }



}
?>
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
                            <h4 class="card-title">Register</h4>
                        </div>
                        <div class="card-body">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" placeholder="Email" class="form-control" name="email">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="register" value="Register" class="btn btn-info btn-round btn-lg">Register</button>
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

<?php include 'includes/footer.php' ?>
