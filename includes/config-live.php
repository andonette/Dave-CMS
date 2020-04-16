<?php
//create an array for the database
$db['db_host'] = 'localhost';
$db['db_user'] = 'fctry000_dave';
$db['db_pass'] = 'F]v[zW5]S6Pu';
$db['db_name'] = 'fctry000_dave';

//convert values to uppercase
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

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
