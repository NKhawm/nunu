<?php
session_start();
include("public/model/connection.php");
global $con;
include("function.php");
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
<body class="font-serif bg-[url('public/images/bg1.jpg')]">
  <!-- style -->
<style>.error {color:red;} </style>
<?php

 $nameErr = $emailErr = $ageErr = $passwordErr = $confirmErr = "";

if (isset($_POST['submit']))
{
    
    //username
    $username = $_POST['user_name']; 
    if(empty($username))
    {
      $nameErr = "A valid user name is required.";  
    
    }


     // email
     $email = $_POST['email'];
     if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i" ,$email) && empty($email))
     {
         $emailErr = "A valid email is required.";
     }


    //age
    $age= $_POST['age'];
    if($age < 13 && empty($age))
    {
        $ageErr = "You have to be at least 13 years old to register.";
    }

    //password
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
     //confirm password
    $confirmpwd = $_POST['confirm_password'];
    if ($password !== $confirmpwd)
{
      $confirmErr = "Password must match.";
    }
   
    //save to databa
    if(!$nameErr && !$emailErr && !$ageErr && !$passwordErr && !$confirmErr)  {
   
        $user_id = random_num(8);
         $query = "INSERT INTO users (user_id,user_name,email_address,age,password) 
         VALUES ('$user_id','$username','$email','$age','$password')";
         //echo $query;
         mysqli_query($con,$query);
         header('location: login.php');
      
           }
          	


           
        }       
?>
<!-- Nav bar -->
<nav class=" p-1 lg:p-2  bg-[#353434] shadow lg:flex lg:items-center lg:justify-between w-full ">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-[Poppins] cursor-pointer text-white">
            <a href="home.php"><img class="h-10 lg:h-12 xl:h-14 "
              src="public/images/logo.png"></a>
           
          </span>
    
          <span class=" text-4xl xl:text-5xl cursor-pointer mx-2 lg:hidden lg:block">
            <span class="iconify text-[#00adb6]" onclick="Menu(this)" data-icon="fa6-solid:burger"></span>
            <!-- <ion-icon name="menu" onclick="Menu(this)"></ion-icon> -->
          </span>
        </div>
    
        <ul class=" text-white bg-black -mt-4 lg:bg-[#353434] lg:flex lg:items-center   lg:z-auto lg:static absolute text-white w-full left-0 lg:w-auto lg:py-0 py-4 lg:pl-0 pl-7 lg:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500  ">
          <li class="mx-2 my-1 lg:my-0">
            <a href="home.php" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="home">
              </ion-icon>Home (အိမ်)</a>
            
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="recipes.php" class="  md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="receipt">
              </ion-icon>Recipes (ချက်ပြုတ်နည်းများ)</a>
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="#" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="videocam">
              </ion-icon>Videos (ဗီဒီယိုများ)</a>
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="#" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="reader">
              </ion-icon>Blogs (ဘလော့ဂ်များ)</a>
          </li>

          <li class="mx-2 mt-1 mb-3 lg:my-0">
            <a href="#" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="chatbubbles">
              </ion-icon>Contact (ဆက်သွယ်ရန်)</a>
          </li>
    
          <a href="signup.php"> <button class=" bg-[#27b4ae] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "> 
            Register
          </button></a>
          <a href="login.php"><button class="bg-[#27b4ae] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full ">
            Log in
          </button></a>
   
        </ul>
      </nav>
    
    
      <script>
        function Menu(e){
          let list = document.querySelector('ul');
          e.name === 'menu' ? (e.name = "close",
          list.classList.add('top-[80px]') , 
          list.classList.add('opacity-100')) :( e.name = "menu" ,
          list.classList.remove('top-[80px]'),
          list.classList.remove('opacity-100'))
        }
      </script>
   
<h1 class="text-xl text-center my-4 text-black">Register</h1>
<div class="border-2 p-6 mx-6 md:w-[500px] h-auto md:mx-auto bg-[#353434] text-light">


    <form class="text-center" action="" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="username">User Name</label>
      <input type="text" class="form-control" id="inputusername" placeholder="Username" name="user_name">
      <span class="error"><?php if(isset($nameErr)){ echo $nameErr;}?></span>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email">
      <span class="error"><?php if(isset($emailErr)){ echo $emailErr;}?></span>
    </div>
  
  <div class="form-group">
    <label for="inputAge">Age</label>
    <input type="number" class="form-control" id="inputAge" placeholder="Age" name="age">
    <span class="error"><?php if(isset($ageErr)){ echo $ageErr;}?></span>
  </div>

 
    <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPwd" placeholder="Password" name="user_password">
    <span class="error"><?php if(isset($passwordErr)){ echo $passwordErr;}?></span>
  </div>
  <div class="form-group">
    <label for="inputConfirm">Confirm Password</label>
    <input type="password" class="form-control" id="inputConfirm" placeholder="Confirm Password" name="confirm_password">
    <span class="error"><?php if(isset($confirmErr)){ echo $confirmErr;}?></span>
  </div>

  <!-- <div class="form-group">
  <select class="form-select form-select-lg mb-3 text-dark w-full h-9 rounded-sm mt-4" aria-label=".form-select-lg example"name="user_type">
  <option selected>User Type</option>
  <option value="1">user</option>
  <option value="2">admin</option>
</select>
</div> -->

  <!-- <div class="form-group">
  <label for="file">Profile Pic</label><br>
            <input type="file" name="image"><br>
            <span class="error"><?php //echo $fileErr; ?></span>
  </div>  -->

  
  
  <button type="submit" class="btn btn-primary bg-info border-none " name="submit">Sign up</button>
</form>
<br>
<p class="text-center" >Already have an account with us? <a  class="text-warning p-2 rounded-xl"href="login.php">Sign in</a> here.</p>
</div>
<!-- footer -->
<?php
include("public/view/footer.php");

?>
    
