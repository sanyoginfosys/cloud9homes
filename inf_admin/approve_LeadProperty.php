<?php
session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('siteconfig.php');
	include_once('base/functions.php');
	if(Check_UserPermission('Manage Lead Property', 'user_update', $_SESSION['INFCRM_UserID'])){
		TABLE_APPROVE_Lead_Property($_GET['property_id']);
	}
}