<?php
session_start();
$DB_host = "localhost";
$DB_user = "ubuntu";
$DB_pass = "chronixx";
$DB_name = "appoint";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
include 'dbClass.php';
$user = new DB($DB_con);
?>