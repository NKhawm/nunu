<?php
session_start();
//$_SESSION;

 include("public/model/connection.php");
 global $con;
 include("function.php");
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

    //user type
    //$user=$_POST['user_type'];

// $image=$_POST['image']['name'];

//     $image_tmp_name = $_FILES['image']['tmp_name'];

//     $image_folder = 'uploaded_img/'.$image;

   
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