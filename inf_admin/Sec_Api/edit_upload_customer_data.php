<?php 
include_once('../base/functions.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$business_name = $_POST['business_name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$suburb = $_POST['suburb'];
$state = $_POST['state'];
$post = $_POST['post'];
$dd_option = $_POST['dd_option'];
$dd_group = $_POST['dd_group'];
$dd_date = $_POST['dd_date'];
$dd_start_date = $_POST['dd_start_date'];
$dd_date_amount = $_POST['dd_date_amount'];
$dd_start_date_amount = $_POST['dd_start_date_amount'];
$frequency = $_POST['frequency'];
$c_debit = $_POST['cdebit'];
$uniqueid = $_POST['uniqueid'];


MODAL_Edit_Upload_Customer_Data($first_name,$last_name,$business_name,$mobile,$email,$address,$suburb,$state,$post,$dd_option,$dd_group,$dd_date,$dd_start_date,$dd_date_amount,$dd_start_date_amount,$frequency,$c_debit, $uniqueid);


?>
