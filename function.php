<?php


function check_login($con)
{
    if (isset($_SESSION['user_id'])) 
    {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) 

        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        } 
    }
    // redirect to login
    echo "<script>alert('Hi, Welcome')</script>";
    //header("Location:login.php");
    //die;
}

// function check_role()
// {
//     //redirects to the right page depending on the users role.  
//     if ($_SESSION['user_type'] == 2) {
//         header("Location: ../admin.php"); //redirected to admin page
//     } else {
//         header("Location:../../home1.php"); //redirected to articles page
//     }
// }

function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {

        $text .= rand(0, 9);
    }
    return $text;
}
// function esc($word)
// {
//     return addslashes($word);
// }
// 
