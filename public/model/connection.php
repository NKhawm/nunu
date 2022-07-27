<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "Nu_Nu";

if(!$con =mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("Failed to connect!");
}
// else
// {
// echo "<script>alert('connection sucessful')</script>";
// }