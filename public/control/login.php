



<?php
session_start();

include('connection.php');
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

                    header("Location:home.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>
    <div class="box">
        <form action="" method="post">
            <div>
                <?php
                echo $error;
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
    </div>

</body>

</html>