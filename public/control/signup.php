<?php
session_start();
//$_SESSION;

 include("/public/model/connection.php");
 include("../control/function.php");
// include("../view/header.php")
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/public/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Joan&family=Montserrat:wght@200&family=Noto+Sans&display=swap" rel="stylesheet"> 
<title>NuNu' Kitchen and Lifestyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script> 
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Signup</title>
   
</head>
<body class="font-serif bg-[url('../images/bg1.jpg')]">
  <!-- style -->
<style>.error {color:red;} </style>
<!-- Nav bar -->
<?php include("../view/header.php");  ?>



<!-- php -->
<?php

$nameErr = $emailErr = $phoneErr = $ageErr = $passwordErr = $confirmErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST")


{ 
    print_r($_POST);
   $username = $_POST['user_name']; 
   if(empty($username))
   {
    $nameErr = "A valid user name is required.";  
   }

   $email = $_POST['email'];
   if(!preg_match("/^[\w\-]+@[\w\]+.[\w\]+$/" ,$email) && empty($email))
   {
       $emailErr = "A valid email is required.";
   }
  
   $phone_no= $_POST['phone_number'];
   if( $phone_no < 11 && empty($phone_no))
   {
       $phoneErr = "Please enter a valid phone number.";
   }
   $age= $_POST['age'];
   if($age < 13 && empty($age))
   {
       $ageErr = "You have to be at least 13 years old to register.";
   }
   $password = $_POST['user_password'];
   if($password < 8 && empty($password))
   {
       $passwordErr = "Password must contain at least 8 charater.";
   }
   if(!preg_match("/[A-Z]/i", $password))
   {
    $passwordErr = "Password must contain at least one capital letter.";
   }
   if(!preg_match("/[0-9]/",$password))
   {
    $passwordErr = "Password must contain at least one number.";
   }
  
  
   $confirmpwd = $_POST['confirm_password'];
   if ($password !== $confirmpwd)
   {
     $confirmErr = "Password must match.";
   }
   
  if(!$nameErr && !$emailErr && !$phoneErr && !$ageErr && !$passwordErr && !$confirmErr)  {
   
  $user_id = random_num(8);
   $query = "INSERT INTO users (user_id,user_name,email_address,phone_no,age,password) 
   VALUES ('$user_id','$username','$email','$phone_no','$age','$password')";
   echo $query;
   mysqli_query($con,$query);



    header("Location:login.php");
    die;
}

}




?>
<h1 class="text-xl text-center my-4">Register</h1>
<div class="border-2 p-6 md:w-1/2 md:mx-auto">


    <form class="text-center" >
  <div class="form-row ">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary bg-info border-none ">Sign up</button>
</form>
<br>
<p class="text-center" >Already have an account with us? <a href="#">Sign in </a> here.</p>
</div>
    
</body>
</html>