<?php
session_start();
	if(isset($_SESSION['INFCRM_UserID'])) {
		include_once('../base/functions.php');
		if(Check_UserPermission('Manage Testimonials', 'user_update', $_SESSION['INFCRM_UserID'])){
			MODAL_EDIT_Testimonial_Approval($_GET['testimonial_id'],$_GET['status']);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
?>