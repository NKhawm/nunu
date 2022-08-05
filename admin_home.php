<?php
session_start();
include('public/model/connection.php');
global $con;
//database connection

?>

<?php
//checks if the user is admin
if (isset($_SESSION['user_type']) && $_SESSION['user_id'] !=='admin') {





  
    echo  "<p class='text-danger'>Sorry, you do not have access to this area. <a href='member/user_home.php'>Click here to go home.</a></p>";
    




    //if user is not admin then this error message will show
} else {
    ?>
    <h2>Welcome Back to Admin, <small><?php echo $_SESSION['user_name']; ?> </small></h2>
    <?php

    
}
?>