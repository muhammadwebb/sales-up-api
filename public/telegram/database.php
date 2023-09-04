<?php
$host = 'localhost';
$username = 'sales_up_izt';
$password = 'OUBsVqEgQSdrfEO5';
$database = 'sales_up_izt';
global $db;
$db = mysqli_connect($host, $username, $password, $database);
if(!$db){
    die("error");
}
