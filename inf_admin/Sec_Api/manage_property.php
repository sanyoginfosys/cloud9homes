<?php

session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('../base/functions.php');
	if(Check_UserPermission('Manage Property', 'user_view', $_SESSION['INFCRM_UserID'])){
		TABLE_Manage_Property();
	}	else 	{
		header('location: '.ERROR_404);
	}
}	else 	{
	header('location: '.ERROR_404);
}

?>