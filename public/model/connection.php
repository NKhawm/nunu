<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "Nu_Nu";

global $con; // needed to be used on all pages
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);



if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect!");
}

// else {
//     echo "<script>alert('connection sucessful')</script>";
// }
