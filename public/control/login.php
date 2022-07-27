



<?php
session_start();

include('../model/connection.php');
include('function.php');

$error = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   


    $username = $_POST['user_name'];
    $password = $_POST['user_password'];

    if (!empty($username) && !empty($password)) {

        //read from database

        $query = "SELECT * FROM users WHERE user_name = '$username' limit 1";

        $result = mysqli_query($con, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];

                    header("Location:../view/home.php");
                    die;
                }
            } else {
                $error = "Incorrect username or password";
            }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Login</title>
</head>

<body class="font-serif bg-[url('../images/bg1.jpg')]">
    <?php
    include("../view/header.php");
    ?>

    <h1 class="text-xl text-center my-4">Login</h1>
    <div class="border-2 p-6 mx-6 md:w-[500px] md:mx-auto">
    <!-- <div class="box">
        <form action="" method="post">
            <div>
                <?php
                //echo $error;
                ?>
            </div>
            <label for="user_name">Username</label><br>
            <input type="text" placeholder="Enter your username" name="user_name"><br>

            <br><br>
            <label for="user_name">Password</label><br>
            <input type="password" placeholder="Enter your password" name="user_password">

            <br><br>
            <input type="submit" value="login"><br><br>
            <p>Don't have an account with us?<a href="signup.php"> Signup </a>here.</p>

        </form>
    </div> -->
    <form class="text-center" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control" id="inputUsername" >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary btn btn-primary bg-info border-none" name="submit">Submit</button>
</form>
<div>
<?php
                echo $error;
                ?>
</div>
<br>
<p class="text-center" >Already have an account with us? <a  class="text-white p-2 rounded-xl"href="signup.php">Register</a> here.</p>
</div>
<?php
include("../view/footer.php");

?>

</body>

</html>