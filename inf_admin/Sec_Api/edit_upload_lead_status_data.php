<?php 
include_once('../base/functions.php');

$status = $_POST['status'];
$lead_no = $_POST['lead_no'];

Edit_Upload_Lead_Status_Data($status,$lead_no);

?>