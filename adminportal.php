<?php
session_start();
include('../model/connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <title>Crud Operation Display</title>
</head>
<body>
    <div class="container">
      <h2>My Profile</h2>
   
<!-- Table -->
<table class="table table-info">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Email Adress</th>
      <th scope="col">Phone</th>
      <th scope="col">age</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
   <tbody>

   <?php
   $sql= "SELECT * FROM users" ;
   $result = mysqli_query($con,$sql);
   if($result)
   {
     while($row=mysqli_fetch_assoc($result))
     {
         $id=$row['id'];
         $name=$row['user_name'];
         $email=$row['email_address'];
         $phone=$row['phone_no'];
         $age=$row['age'];
         $password=$row['password'];
         echo '
         <tr>
         <th scope="row">'.$id.'</th>
         <td>'.$name.'</td>
         <td>'.$email.'</td>
         <td>'.$phone.'</td>
         <td>'.$age.'</td>
         <td>'.$password.'</td>
         
         <td>
     <button class="btn btn-primary"><a class="text-light" href="update.php?updateid='.$id.'"><span class="iconify" data-icon="carbon:edit"></span></a></button>
     <button class ="btn btn-danger"><a class="text-light" href="delete.php?deleteid='.$id.'"><span class="iconify" data-icon="fluent:delete-dismiss-24-regular"></span></a></button>

 </td>
       </tr>';
     }
        

   }
   ?>
 
   </tbody>

   </table>
   </div>
    
</body>
</html>