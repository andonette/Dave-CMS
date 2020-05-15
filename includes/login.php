<?php
include 'config.php';
//start a session
session_start();

//if the login form is filled in, do one of a couple of things.
if (isset($_POST['login'])) {
    //first, store the results in a couple of temp variables
    //called username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    //echo $username;
    //echo $password;
    //then sanitise the strings, so no one puts bad stuff in..
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    //testing to see if these exist in the database
    $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    sql_error_check($select_user_query);

    // if they do exist, then get all the info out of the tables
    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_user_name = $row['user_name'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }

    // if the username and password match, create variables for the session
    if (password_verify($password, $db_user_password)) {
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        //and head on over to the admin area
        header("Location: ../admin");
    } else {
        //otherwise stay on the front end
        header("Location: ../index.php");
    }
}
