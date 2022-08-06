<?php
session_start();
include('../public/model/connection.php');
global $con; //database connection
include('../public/view/header.php');
?>


  <!-- body -->
  <body class="font-serif bg-[url('../public/images/bg1.jpg')]">


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
                    <a class="nav-link active text-light text-lg border-b-4 border-white" aria-current="page" href="all_users/displayusers.php">All Users</a>
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
<!-- section -->
<section>
      <h2 class="text-4xl text-center mx-auto mt-6">Welcome to your admin panel</h2>
      
     
   </section>
   <hr>

   <!-- footer -->
   <footer class="w-full bg-[#27b4ae] h-24 ">
    

        <p class=" text-center align-middle mx-auto text-sm">Own and Created by Niang Khawm Huai.</p>
   
</footer>

    
</body>
</html>