<?php

include("public/model/connection.php");
session_start();

if(isset($_POST['submit']))
{
$email = $_POST['user_name'];
$password =$_POST['user_password'];

$login_query= "SELECT * FROM users WHERE email_address='$email' AND password= '$password' LIMIT 1";
$login_query_run = mysqli_query($con, $login_query);
$row=mysqli_fetch_assoc($login_query_run);

if($row["role_as"]== "user")

{
    $_SESSION["user_name"]=$username;
    
    header("Location:home.php");
}

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

?>