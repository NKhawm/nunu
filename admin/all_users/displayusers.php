<?php
session_start();
include('../../public/model/connection.php');
global $con; //database connection
include('../../public/view/header.php');
?>


  <!-- body -->
  <body class="font-serif bg-[url('../../public/images/bg1.jpg')]">


<!-- nav bar -->
  <nav class="navbar navbar-expand-lg bg-[#353434] ">
  <div class="container-fluid">
    <a class="navbar-brand " href="../../member/user_home.php"><img class="h-10 lg:h-12 xl:h-14 " src="../../public/images/logo.png" alt="logo"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

                 

                  <li class="nav-item">
                    <a class="nav-link active text-light text-lg border-b-4 border-white" aria-current="page" href="#">All Users</a>
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
                      
                      <li><a class="dropdown-item" href="../../logout.php">Log out</a></li>
            
                    </ul>
                  </li>
      </ul>
    </div>
  </div>
</nav>
<!-- section -->
<section class="min-h-[80vh]">
      <h2 class="text-4xl text-center mx-auto mt-6">All users</h2>
      <!-- <a href="admin_add.php" class="btn btn-info text-dark ml-[90px] mb-2 " role="button" data-bs-toggle="button"> + add user</a> -->
      <button class="mb-2 ml-[90px] border p-2 btn btn-info rounded-md"><a href="add_new_user.php">+ Add User</a></button>


      <div class="container">
   
<!-- Table -->
<table class="table bg-[#BBCFCB] table-striped ">
  <thead>
    <tr>
      <th scope="col" >User ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Email Adress</th>
      <th scope="col">age</th>
      <th scope="col">Password</th>
      <th scope="col">User Type</th>
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
         $age=$row['age'];
         $password=$row['password'];
         $usertype=$row['user_type'];
         echo '
         <tr>
         <th scope="row">'.$id.'</th>
         <td>'.$name.'</td>
         <td>'.$email.'</td>
         <td>'.$age.'</td>
         <td>'.$password.'</td>
         <td>'.$usertype.'</td>
         
         <td>
     <button class="btn btn-info"><a class="text-dark" href="user_update.php?updateid='.$id.'"><span class="iconify" data-icon="carbon:edit"></span></a></button>
     <button class ="btn btn-danger"><a class="text-dark" href="delete.php?deleteid='.$id.'"><span class="iconify" data-icon="fluent:delete-dismiss-24-regular"></span></a></button>

 </td>
       </tr>';
     }
        

   }
   ?>
 
   </tbody>

   </table>
   </div>
   </section>
   <hr>

   <!-- footer -->
   <footer class="w-full bg-[#27b4ae] h-24 ">
    

        <p class=" text-center align-middle mx-auto text-sm">Own and Created by Niang Khawm Huai.</p>
   
</footer>

    
</body>
</html>