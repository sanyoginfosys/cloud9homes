<?php 
include_once('../base/functions.php');
include_once('../base/db_conn.php');

$role_name = $_POST['user_role_pr_name'];
$uniqueid = $_POST['uniqueid'];


MODAL_Update_Upload_User_Permission($role_name, $uniqueid);


?>
