<?php

if(isset($_POST['roleID'])){
	include_once('../base/functions.php');
	Display_Dynamic_New_Role($_POST['roleID']);
}