<?php
/*
Site Index
*/
include 'includes/header.php' ?>
<?php
/*form action */
if (isset($_POST['register'])) {
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if (username_exists($user_name)) {
        echo 'user exists';
    }
    if (email_exists($user_email)) {
        echo 'email exists';
    }
    echo $user_name . '<br>' . $user_email . '<br>' . $user_password;

    $user_name = mysqli_real_escape_string($connection, $user_name);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12 ));


    //Nice Looking Query
    $query = "INSERT INTO users ";
    $query .= "(user_name, ";
    $query .= "user_email, ";
    $query .= "user_password, ";
    $query .= "user_role) ";

    $query .= "VALUES('{$user_name}', ";
    $query .= "'{$user_email}', ";
    $query .= "'{$user_password}', ";
    $query .= "'Subscriber') ";
    echo $query;

    if (!empty($user_name) && !empty($user_password) && !empty($user_email)) {
        $register_query = mysqli_query($connection, $query);
        sql_error_check($register_query);
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
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-sign"></span>
                                    I agree to the
                                    <a href="javascript:void(0)">terms and conditions</a>.
                                </label>
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
