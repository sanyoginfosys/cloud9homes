<?php

session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('../base/functions.php');
	if(Check_UserPermission('Manage Property', 'user_update', $_SESSION['INFCRM_UserID'])){
		removePropertyImage($_GET);
	}	else 	{
		header('location: '.ERROR_404);
	}
}	else 	{
	header('location: '.ERROR_404);
}

?>