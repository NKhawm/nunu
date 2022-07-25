<?php
session_start();

if(isset($SESSION['user_id']))
{
    unset($SESSION['user_id']);
}
header("Location:login.php");
die;

