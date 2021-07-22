<?php

session_start();

if(isset($_SESSION['inflogin'])){
    header('location: dashboard.php');
}   else    {
    header('location: login.php');
}