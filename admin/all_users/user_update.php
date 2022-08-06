<?php
session_start();
include('../../public/model/connection.php');
global $con;

$id=$_GET['updateid'];
$sql1="SELECT * FROM users WHERE id=$id LIMIT 1";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($result1);
$name1=$row1['user_name'];
$email1=$row1['email_address'];
$age1=$row1['age'];
$password1=$row1['password'];
$usertype1=$row1['user_type'];


if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $age=$_POST['age'];
  $password=$_POST['password'];
  $usertype=$_POST['user_type'];
  
  $sql="UPDATE users SET id=$id, user_name='$name',email_address='$email',age='$age',password='$password',
        user_type='$usertype'
         WHERE id=$id";
        
        $result = mysqli_query($con,$sql);
        if($result)
        {
          
          header('Location:displayusers.php');
        }
              else
        {
          die(mysqli_error($con));
        }
}
include('../../public/view/header.php');
?>

   <!-- body -->
   <body class="font-serif bg-[url('../../public/images/bg1.jpg')]">
  <style>.error {color:red;} </style>


<!-- nav bar -->
  <nav class="navbar navbar-expand-lg bg-[#353434] ">
  <div class="container-fluid">
    <a class="navbar-brand " href="#"><img class="h-10 lg:h-12 xl:h-14 " src="../public/images/logo.png" alt="logo"></a>

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
                      
                      <li><a class="dropdown-item" href="../logout.php">Log out</a></li>
            
                    </ul>
                  </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-4xl text-center mt-24 ">Update User Detail</h1>
  <div class="container max-w-[500px]  text-center border-2 p-6 mt-6">
      
  <form method="post">
  <div class="form-group">
    <label for="name">User Name</label>
    <input type="text" class="form-control"
    name="name" value= <?php echo$name1;?>>
    
  </div>

  <div class="form-group">
    <label for="department">Email Adress</label>
    <input type="text" class="form-control" 
     name="email" value= <?php echo$email1;?>>
    
  </div>
  
  <div class="form-group">
    <label for="phone">Age</label>
    <input type="text" class="form-control" 
     name="age" value= <?php echo$age1;?> >
      </div>

  <div class="form-group">
    <label for="phone">Password</label>
    <input type="text" class="form-control" 
     name="password" value= <?php echo$password1;?>>
    
  </div>

  <div class="form-group">
    <label for="phone">User Type</label>
    <select  class="form-control" name="user_type" value= <?php echo$usertype1;?>>
        <option value="Select User Type">Select User Type</option>
        <option value="user">user</option>
        <option value="admin">admin</option>
</select>
  </div>
  
  
  <button type="submit" class="btn  bg-info mt-6" name="submit">Submit</button>
</form>
</div>

   </body>
</html>