<?php
// add includes and database here
?>

<?php
//checks if the user is admin
if (isset($_SESSION['role_as']) && $_SESSION['role_as'] == 'admin') {
?>




    <!-- page heading -->
    <h2>Welcome Back to Admin, <small><?php echo $_SESSION['user_name']; ?> </small></h2>




<?php
    //if user is not admin then this error message will show
} else {
    echo  "<p class='text-danger'>Sorry, you do not have access to this area. <a href='articles.php?source=index'>Click here to go home.</a></p>";
}
?>