<?php
ob_start();
//create an array for the database
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'davecms';

//convert values to uppercase
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$urlroot = define('URLROOT', 'http://localhost:8888/Dave-CMS');
$approot = define('APPROOT', dirname(dirname(__FILE__)));

//connect to database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    die('failed to connect');
} else {
    //echo 'connected';
}

//check for errors in mysql connection
function sql_error_check($result)
{
    global $connection;
    if (!$result) {
        die('query failed' . mysqli_error($connection));
    }
}
