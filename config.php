<?php
$host_name = 'host';
$database = 'db';
$user_name = 'user';
$password = 'pass';

$con = new mysqli($host_name, $user_name, $password, $database);
if ($con->connect_error) {
    die('Spiacente, si è verificato un problema');
}
?>
