<?php

session_start();
if(isset($_SESSION['INFCRM_UserID'])){
	session_unset($_SESSION['INFCRM_UserID']);
}
session_destroy();
header('location: login.php');