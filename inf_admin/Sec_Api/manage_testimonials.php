<?php

session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('../base/functions.php');
	if(Check_UserPermission('Manage Testimonials', 'user_view', $_SESSION['INFCRM_UserID'])){
		TABLE_Manage_Testimonials();
	}	else 	{
		header('location: '.ERROR_404);
	}
}	else 	{
	header('location: '.ERROR_404);
}

?>