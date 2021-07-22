<?php 
include_once('../base/functions.php');

$user_role = $_POST['user_role'];
$new_user_role = $_POST['new_user_role'];

Update_Bulk_Role($user_role,$new_user_role);

?>