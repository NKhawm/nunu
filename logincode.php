<?php
session_start();
include("public/model/connection.php");


if(isset($_POST['submit']))
{
$email = $_POST['user_name'];
$password =$_POST['user_password'];


$login_query= "SELECT * FROM users WHERE email_address='$email' AND password= '$password' AND user_type LIMIT 1";
$login_query_run = mysqli_query($con, $login_query);
$row=mysqli_fetch_assoc($login_query_run);

if(
    $['user_name']=$username;
    $_SESSION['password']=$password;
    $_SESSION['user_type']="user";
    
    header("Location:home.php");


// else if($row["role_as"]== "admin")
// {
//     $_SESSION["user_name"]=$username;
//     //header("Location:admin_home.php");
// }
// else{
//     //header("Location:admin/index.php");
//     //$message= "username or password is incorrect.";
// }



}






// ---------------------------------------****-------------------------------
//  if(isset($_SESSION['auth']))
//  {
//      if(!isset($_SESSION['message'])){
//          $_SESSION['message'] = "You are already logged In";
//      }
//      header("Location: index.php");
//      exit(0);
//  }

// // include('function.php');

// $message = "";
// if (isset($_POST['submit'])) {

//   global $con; // call database - needed every time you want to connect to the database
//   $username = $_POST['user_name'];
//   $password = $_POST['user_password'];
//   print_r($_POST);


//   $query = "SELECT * FROM users WHERE username = '{$username}'" . " AND password = '{$password}' limit 1"; // checks both username and password in one go
//   $result = mysqli_query($con, $query);

//   // check if it exists then validation after 
//   if (mysqli_num_rows($result) > 0) {
//     header("refresh:2; url=adminportal.php"); //this is the correct path to home page ../view/home.php

//     //assign sessions here
//     while ($row = mysqli_fetch_assoc($result)) {
//       $_SESSION['user_name'] = $username;
//       $_SESSION['id'] = $row['user_id'];
//       //$_SESSION['user_role'] = $row['user_role']; to check if they are admin or a normal user
//     }
//     $message =  "login successful";
//   } else if (!empty($username) && !empty($password)) {
//     $message = "Incorrect username or password";
//   }
// }


?>