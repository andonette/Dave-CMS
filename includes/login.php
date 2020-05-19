<?php
session_start();
include 'config.php';
include '../admin/functions.php';
//start a session


//if the login form is filled in, do one of a couple of things.
if (isset($_POST['login'])) {
    echo '1';
    $username = $_POST['username'];
    $password = $_POST['password'];

login_user($username, $password);
}
