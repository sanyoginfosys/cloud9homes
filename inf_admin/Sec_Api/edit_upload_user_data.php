<?php 
include_once('../base/functions.php');

$user_role_id = $_POST['user_role_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phoneNo = $_POST['phoneNo'];
$email_id = $_POST['email_id'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];

$uniqueid = $_POST['uniqueid'];


MODAL_Edit_Upload_user_Data($user_role_id,$first_name,$last_name,$phoneNo,$email_id,$gender,$dob,$uniqueid);

?>