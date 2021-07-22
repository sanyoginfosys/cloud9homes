<?php 
include_once('../base/functions.php');

$name = $_POST['name'];
$address = $_POST['address'];
$location = $_POST['location'];
$phoneNo = $_POST['phoneNo'];
$email_id = $_POST['email'];
$inquiry_for = $_POST['inquiry_for'];
$var_date = $_POST['lead_date'];
$status = $_POST['status'];
$type_of_lead = $_POST['type_of_lead'];

$uniqueid = $_POST['uniqueid'];


MODAL_Edit_Upload_lead_Data($name,$address,$location,$phoneNo,$email_id,$inquiry_for,$var_date,$status,$type_of_lead,$uniqueid);

?>