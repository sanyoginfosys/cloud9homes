<?php
session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('siteconfig.php');
	include_once('base/functions.php');
	if(Check_UserPermission('Manage Property', 'user_delete', $_SESSION['INFCRM_UserID'])){
		TABLE_Permanent_DELETE_Property($_GET['property_id']);
	}	else 	{ echo 'You don\'t have permission for this action.'; }
}	else  {
    header('location: dashboard.php');
}