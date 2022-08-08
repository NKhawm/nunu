<?php
session_start();
include('../../public/model/connection.php');
include('../../function.php');
global $con;

$nameErr = $emailErr = $ageErr = $passwordErr = "";

if (isset($_POST['submit']))
{
    
    //username
    $username = $_POST['name']; 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username) && empty($username))
    {
      $nameErr = "Only letter and white space allowed.";
    
    }


     // email
     $email = $_POST['email'];
     if (!filter_var($email, FILTER_VALIDATE_EMAIL))
     {
         $emailErr = "A valid email is required.";
     }


    //age
    $age= $_POST['age'];
    if($age < 13)
    {
        $ageErr = "You have to be at least 13 years old to register.";
    }

    //password
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@',$password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $passwordErr= "Password should be at least 8 charater at lenght <br>. 
                   should contain at least one lower case <br>  at least
                   one upper case <br>  at least one number <br> at least one spcial character."
                   ; 
    
}

   if(empty($name) && empty($email) && empty($age) && empty($password))
   {
       $nameErr="Field can not be empty!";
       $emailErr="Field can not be empty!";
       $ageErr="Field can not be empty!";
       $passwordErr="Field can not be empty!";
   }
     
   
    //save to databa
    if(!$nameErr && !$emailErr && !$ageErr && !$passwordErr && !$confirmErr)  {
   
        $user_id = random_num(8);
         $query = "INSERT INTO users (user_id,user_name,email_address,age,password) 
         VALUES ('$user_id','$username','$email','$age','$password')";
         //echo $query;
         mysqli_query($con,$query);
         header('location:displayusers.php');
      
           }
          	


           
        }   ?>


<?php include('../../public/view/header.php');?>
  
       <!-- body -->
  <body class="font-serif bg-[url('../../public/images/bg1.jpg')]">
  <style>.error {color:red;} </style>


<!-- nav bar -->
  <nav class="navbar navbar-expand-lg bg-[#353434] ">
  <div class="container-fluid">
    <a class="navbar-brand " href="../../member/user_home.php"><img class="h-10 lg:h-12 xl:h-14 " src="../../admin/update_content/recipes/images/logo.png" alt="logo"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

                 

                  <li class="nav-item">
                    <a class="nav-link active text-light text-lg" aria-current="page" href="#">All Users</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light text-lg" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Add Contents
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Add New Recipes</a></li>
                      <li><a class="dropdown-item" href="#">Add New Blog</a></li>
            
                    </ul>
                  </li>


                  


                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                 if (isset($_SESSION['user_type']) && $_SESSION['user_type'] =='admin') {
                  ?><p class="text-xl text-light border px-3 py-1 rounded-md inline" href="#"><?php echo "Hello," .$_SESSION['user_name']; ?></p><?php
                  }?>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../adminportal.php">Dashboard</a></li>
                      
                      <li><a class="dropdown-item" href="../logout.php">Log out</a></li>
            
                    </ul>
                  </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-4xl text-center mt-24 ">New User Details</h1>
  <div class="container max-w-[500px]  text-center border-2 p-6 mt-6">
      
  <form method="post">
  <div class="form-group text-xl">
    <label for="name">User Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name">
    <span class="error"><?php if(isset($nameErr)){ echo $nameErr;}?></span>
  </div>

  <div class="form-group text-xl">
    <label for="department">Email Adress</label>
    <input type="text" class="form-control"  name="email">
    <span class="error"><?php if(isset($emailErr)){ echo $emailErr;}?></span>
  </div>
  
  <div class="form-group text-xl">
    <label for="phone">Age</label>
    <input type="text" class="form-control" placeholder="Age" name="age">
    <span class="error"><?php if(isset($ageErr)){ echo $ageErr;}?></span>
  </div>

  <div class="form-group text-xl">
    <label for="phone">Password</label>
    <input type="text" class="form-control" placeholder="Password" name="password">
    <span class="error"><?php if(isset($passwordErr)){ echo $passwordErr;}?></span>
  </div>

  <div class="form-group text-xl">
    <label for="phone">User Type</label>
    <select  class="form-control" name="user_type">
        <option value="Select User Type">Select User Type</option>
        <option value="user">user</option>
        <option value="admin">admin</option>
</select>
  </div>
  
  
  <button type="submit" class="btn  bg-info mt-6 text-xl" name="submit">Submit</button>
</form>
</div>

   </body>
</html>