<?php
session_start();
//$_SESSION;

include("/public/model/connection.php");
 include("../control/function.php");?>

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
<style>
       .error {color:red;} 
        </style>
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
 <nav class=" p-2 xl:p-5 bg-[#353434] shadow xl:flex xl:items-center xl:justify-between w-full ">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-[Poppins] cursor-pointer text-white">
            <a href="home.html"><img class="h-10 xl:h-12 inline"
              src="../images/logo.png"></a>
           
          </span>
    
          <span class=" text-4xl xl:text-5xl cursor-pointer mx-2 lg:hidden block">
            <span class="iconify text-[#00adb6]" onclick="Menu(this)" data-icon="fa6-solid:burger"></span>
            <!-- <ion-icon name="menu" onclick="Menu(this)"></ion-icon> -->
          </span>
        </div>
    
        <ul class=" bg-black -mt-4 lg:bg-[#353434] xl:flex xl:items-center   xl:z-auto xl:static absolute text-white w-full left-0 xl:w-auto xl:py-0 py-4 xl:pl-0 pl-7 xl:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500  ">
          <li class="mx-4 my-1 xl:my-0">
            <a href="#" class="md:text-sm hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="home">
              </ion-icon>Home (အိမ်)</a>
            
          </li>

          <li class="mx-4 my-1 xl:my-0">
            <a href="#" class="  md:text-sm hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="receipt">
              </ion-icon>Recipes (ချက်ပြုတ်နည်းများ)</a>
          </li>

          <li class="mx-4 my-1 xl:my-0">
            <a href="#" class="md:text-sm hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="videocam">
              </ion-icon>Videos (ဗီဒီယိုများ)</a>
          </li>

          <li class="mx-4 my-1 xl:my-0">
            <a href="#" class="md:text-sm hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="reader">
              </ion-icon>Blogs (ဘလော့ဂ်များ)</a>
          </li>

          <li class="mx-4 mt-1 mb-3 xl:my-0">
            <a href="#" class="md:text-sm hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="chatbubbles">
              </ion-icon>Contact (ဆက်သွယ်ရန်)</a>
          </li>
    
          <button class=" bg-[#27b4ae] md:text-sm text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-4 hover:bg-[#ffafd7] hover:text-black rounded-full "> <a href="#"></a>
            Register
          </button>
          <button class="bg-[#27b4ae] md:text-sm text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-4 hover:bg-[#ffafd7] hover:text-black rounded-full "> <a href="#"></a>
            Log in
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
   

    <h1 class="text-center">Signup</h1>
    <!-- <div class="box">
        <form action="" method="post">
            
            <label for="user_name">Username</label><br>
            <input type="text" name="user_name"><br>
            <span class="error"><?php //echo $nameErr; ?></span>
<br><br>

            <label for="email">Email</label><br>
            <input type="text" name="email"><br>
            <span class="error"><?php //echo $emailErr; ?></span>
<br><br>

            
            <label for="phone number">Phone number</label><br>
            <input type="text" name="phone_number"><br>
            <span class="error"><?php //echo $phoneErr; ?></span>
<br><br>
            
            <label for="age">Age</label><br>
            <input type="number" name="age"><br>
            <span class="error"><?php //echo $ageErr; ?></span>
<br><br>
            
            <label for="password">Password</label><br>
            <input type="password" name="user_password"><br>
            <span class="error"><?php //echo $passwordErr; ?></span>
<br><br>

            <label for="confirm">Confirm Password</label><br>
            <input type="password" name="confirm_password"><br>
            <span class="error"><?php //echo $confirmErr; ?></span>
<br><br>
            <input type="submit" value="Submit" name="submit"><br><br>
            <p>If you are already registered, <a href="login.php"> Log in </a>here.</p>

        </form>
    </div> -->

    <form>
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
  
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
    
</body>
</html>