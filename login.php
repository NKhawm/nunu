<?php
session_start();
include('public/model/connection.php');
global $con;
include('function.php');
//$error="";
// if(isset($_POST['submit']))
// {
//   $name=$_POST['user_name'];
//   $password=$_POST['user_password'];

//   $query = "SELECT * FROM users WHERE user_name= '".$name."' AND password='".$password."' AND user_type ";
//   $result=mysqli_query($con,$query);

//   if($result)
//   {
//     while($row=mysqli_fetch_array($result))
//     {
//       echo "Hi ya";
//     }
//     if(mysqli_num_rows($result)>0)
//     {
//       echo "hey";
//     }
//   }

// }

//----------------------------mmmm-----------------------------

// if ($_SERVER['REQUEST_METHOD'] == "POST")
// {
//   $name=$_POST['user_name'];
//   $password=$_POST['user_password'];
  
//     //read form database
//     $query="SELECT * FROM users WHERE user_name='".$name."' AND password='".$password."' AND user_type='' limit 1";
    
//     $result=mysqli_query($con, $query);

//     if($result && mysqli_num_rows($result) > 0)
//     {
//       $user_data = mysqli_fetch_assoc($result);

//       if($user_data['password'] === $password  && $user_data['user_type'] === 'user' )
//       {
//         $_SESSION['user_id'] = $user_data['user_id'];
//         $_SESSION['user_type']=$user_data['user_type'];
//         header('location:member/user_home.php');
//         die;
//       }
     
//        else if($user_data['password'] === $password && $user_data['user_type'] === 'admin')
//       {
//         $_SESSION['user_id'] = $user_data['user_id'];
//         $_SESSION['user_type']=$user_data['user_type'];
//         header('location:adminportal.php');
//         die; 
//       }
     
//       else
//       {
//         $error = "username or password incorrect.";
//       }
//     }
  

  
//}
 

//----------------iiii-----------------------------

$message="";
if (isset($_POST['submit'])) {

  global $con;
  $username = $_POST['user_name'];
  $password = $_POST['user_password'];
  $usertype = $_POST ['user_type'];
  
  //print_r($_POST);


  $query = "SELECT * FROM users WHERE user_name = '{$username}'" . " AND password = '{$password}' AND user_type = '{$usertype}' limit 1"; // checks both username and password in one go
  $result = mysqli_query($con, $query);

  // check if it exists then validation after 
  if($result)
  {
  if (mysqli_num_rows($result) > 0) {
     header("location:admin/admin_home.php"); //this is the correct path to home page ../view/home.php

    //assign sessions here
    while ($row = mysqli_fetch_array($result))
     {
      $_SESSION['user_name'] = $username;
      $_SESSION['id'] = $row['user_id'];
      $_SESSION['user_type'] = $row['user_type']; //to check if they are admin or a normal user
    }
    $message =  "login successful";
  } else if (!empty($username) && !empty($password)) {
    $message = "User name or password incorrect.";
  }
}
}

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <title>Login</title>
</head>


<body class="font-serif bg-[url('../images/bg1.jpg')]">

<!-- error style -->
<style>.error {color:red;} </style>


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
            <a href="mailto:nunu.kitchen2020@gmail.com" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="chatbubbles">
              </ion-icon>Contact (ဆက်သွယ်ရန်)</a>
          </li>
    
          <button class=" bg-[#27b4ae] w-[fit] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a href="signup.php"> 
        Register</a>
</button>
      <button class="bg-[#27b4ae]  md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a href="login.php">
        Log in </a>
</button> 
   
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


<h1 class="text-xl text-center my-4">Login</h1>

<div class="border-2 p-6 mx-6 md:w-[500px] md:mx-auto text-light bg-[#353434]">
  
  <form class="text-center" method="post" enctype="multipart/form-data" action="">
  <span class="error"><?php  echo $message?></span>

    <div class="mb-3">
      <label for="username" class="form-label">User Name</label>
      <input type="text" class="form-control" id="inputUsername" name="user_name">
      
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="user_password">
      
    </div>
    <label for="exampleInputPassword1" class="form-label">User Type</label>
    <select class="form-select w-full h-9 text-dark rounded-sm " aria-label="Default select example" name="user_type">
    <option value="user">Select user type</option> 
    <option value="user">user</option>
      <option value="admin">admin</option>
 
</select>
<br><br>
    
    <button type="submit" class="btn btn-primary btn btn-primary bg-info border-none" name="submit">Submit</button>
  </form>
  <br>
  <p class="text-center">Don't have an account with us? <a class="text-warning p-2 rounded-xl" href="signup.php">Register</a> here.</p>
</div>
<?php
include("public/view/footer.php");

?>

