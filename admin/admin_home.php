<?php
session_start();
include('../public/model/connection.php');
global $con; //database connection

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Joan&family=Montserrat:wght@200&family=Noto+Sans&display=swap" rel="stylesheet"> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Admin Portal</title>
  </head>
  <body class="font-serif bg-[url('../public/images/bg1.jpg')]">
  <nav class="navbar navbar-expand-lg bg-[#353434]">
  <div class="container-fluid">
    <a class="navbar-brand" href="../member/user_home.php"><img class="h-10 lg:h-12 xl:h-14 " src="../public/images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-light" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#">Users</a>
        </li>
       
         
        <li class="nav-item dropdown">
          <a class="nav-link  text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          
          Add Content
         
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Add Content to Recipes</a></li>
           
            <li><a class="dropdown-item" href="#">Add Content to Blogs</a></li>
          </ul>
              
        <li class="nav-item dropdown">
          <a class="nav-link  text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Setting 
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="adminportal.php">Dashboard</a></li>
           
            <li><a class="dropdown-item" href="../logout.php">Log out</a></li>
          </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php

//checks if the user is admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] !=='admin') {
  ?>
  <h2>Sorry <small><?php echo $_SESSION['user_name']; ?> </small> you donot have acess to this page.  <a href='../member/user_home.php'>Click here to go home.</a></h2>
  <?php
    
//if user is not admin then this error message will show
} else {
    ?>
    <h2>Welcome Back  "<?php echo $_SESSION['user_name']; ?>" to admin home.</h2>
    <p> Go to your admin portal <a href="../admin/adminportal.php"> [here]</a></p>
    <?php

    
}?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
