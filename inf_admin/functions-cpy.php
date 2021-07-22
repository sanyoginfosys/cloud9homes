<?php

include_once ('db_conn.php');
//include_once ('../siteconfig.php');

function Customer_Details($cfname,$clname,$cbname,$cphone,$cemail,$caddress,$csuburb,$cstate,$cpost,$coption,$cgroup,$cdate,$csdate,$cdamount,$csdamount,$frequency,$cdebit)
{
	echo "hi";
	$conn = create_mysqli();
	$uid = md5(uniqid(rand(), true));
	if($cgroup != "cuc"){
		$cgroup = $cdebit;
	}

	$sql3 = "INSERT INTO `customer_details` (`customer_id`, `first_name`, `last_name`, `business_name`, `mobile`, `email`, `address`, `suburb`, `state`, `post`, `dd_option`, `dd_group`, `dd_date`, `dd_start_date`, `dd_date_amount`, `dd_start_date_amount`, `frequency`,`uniq_id`) VALUES (NULL, '".$cfname."', '".$clname."', '".$cbname."', '".$cphone."', '".$cemail."', '".$caddress."', '".$csuburb."', '".$cstate."', '".$cpost."', '".$coption."', '".$cgroup."', '".$cdate."', '".$csdate."', '".$cdamount."', '".$csdamount."', '".$frequency."', '".$uid."');";

	$sql2 = "SELECT email FROM customer_details WHERE email='$cemail'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		return 0;
	}
	else
	{
		if(mysqli_query($conn, $sql3)){
			return 1;
		} else{
			return 0;
		}
		close_mysqli($conn);

	}
	//file_upload($pic);
}

function Customer_Data($inv){


	$conn = create_conn();
	$sql = "SELECT `customer_id`, `first_name`, `last_name`, `business_name`, `mobile`, `email`, `address`, `suburb`, `state`, `post`, `dd_option`, `dd_group`, `dd_date`, `dd_start_date`, `dd_date_amount`, `dd_start_date_amount`, `frequency`, `uniq_id` FROM `customer_details` WHERE `uniq_id` = '$inv'";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		$farray = array(NULL, $row['first_name'], $row['last_name'], $row['business_name'], $row['mobile'], $row['email'], $row['address'], $row['suburb'], $row['state'], $row['post'], $row['dd_option'], $row['dd_group'], $row['dd_date'], $row['dd_start_date'], $row['dd_date_amount'], $row['dd_start_date_amount'], $row['frequency'], $row['uniq_id']);
		return $farray;
	}	else	{
		close_conn($conn);
		return 0;
	}
	// return 'hi';


	
}

function register_client($firstname,$lastname,$gender,$dob,$phoneNo,$email,$password,$filepath)
{
	$conn = create_conn();
	$sql = "INSERT INTO `user_m` (`password`, `email_id`, `first_name`, `last_name`, `security_id`, `security_pass`, `gender`, `dob`, `phoneNo`, `profile_pic`) VALUES ('".$password."', '".$email."', '".$firstname."', '".$lastname."', NULL, NULL, '".$gender."', '".$dob."', '".$phoneNo."', '".$filepath."');";
	$sql2 = "SELECT email_id FROM user_m WHERE email_id='$email'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		return 0;
	}
	else
	{
		if(mysqli_query($conn, $sql)){

			echo "true";

		} else{
			return 0;
		}
		close_mysqli($conn);
		return 1;
	}
//file_upload($pic);
}

function LOGIN_begin($email, $password){
	$uid = user_email($email, $password);
	if($uid != 0){	
		session_start();
		$_SESSION['INFCRM_UserID'] = $uid;
		header('location: dashboard.php');
	}	else{
		header('location: login.php?error=10');
	}
}

function user_email($email, $password){
	$conn = create_conn();
	$sql = "SELECT user_id FROM user_m WHERE email_id = '$email'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return user_password($row['user_id'], $password);
	}	else	{
		close_conn($conn);
		return 0;
	}
}

function user_password($user_id, $password){
	$conn = create_conn();
	$sql = "SELECT password FROM user_m WHERE user_id = '$user_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0)	{
		$v_pass = $row['password'];
		if ($v_pass == $password)	{
			close_conn($conn);
			return $user_id;
		}	else {
			close_conn($conn);
			return 0;
		}
	}	
}

function User_file_Update($pic_path)
{
	$target_dir = "uploads/";
	$uid_name = md5(uniqid(rand(), true));
	$uid_name .= basename($pic_path["name"]);
	$target_file = $target_dir . $uid_name;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	$check = getimagesize($pic_path["tmp_name"]);

	if($pic_path['name'] !== false) {
	// echo "File is an image - " . $check["mime"] . ".";
	} else {
		//echo "File is not an image.";
		echo $pic_path;
		return 1;
	}

	if ($pic_path['size'] > 2048000) {

		//echo "Sorry, your file is too large.";
		return 2;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		//echo "Sorry, only JPG, JPEG, PNG files are allowed.";
		return 3;
		$uploadOk = 0;
	}

	if (move_uploaded_file($pic_path["tmp_name"], $target_file)) {
		return $target_file;
	} else {
		//echo "Sorry, there was an error uploading your file.";
		return 4;
	}
}


function file_upload($pic_path)
{
	$target_dir = "uploads/";
	$uid_name = md5(uniqid(rand(), true));
	$uid_name .= basename($pic_path["name"]);
	$target_file = $target_dir . $uid_name;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	$check = getimagesize($pic_path["tmp_name"]);

	if($pic_path['name'] !== false) {
	// echo "File is an image - " . $check["mime"] . ".";
	} else {
		echo "File is not an image.";
	}

	if ($pic_path['size'] > (1024000)) {
		echo "Sorry, your file is too large.";
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		echo "Sorry, only JPG, JPEG, PNG files are allowed.";
		$uploadOk = 0;
	}

	if (move_uploaded_file($pic_path["tmp_name"], $target_file)) {
		return $target_file;
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}

function GET_UserPic($userid){
	$conn = create_conn();
	$sql = "SELECT profile_pic FROM user_m WHERE user_id = '$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return $row['profile_pic'];
	}	else	{
		close_conn($conn);
		return 0;
	}
}

function GET_UserName($userid){
	$conn = create_conn();
	$sql = "SELECT first_name, last_name FROM user_m WHERE user_id = '$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return $row['first_name']." ".$row['last_name'];
	}	else	{
		close_conn($conn);
		return 0;
	}
}

function GET_UserEmail($userid){
	$conn = create_conn();
	$sql = "SELECT email_id FROM user_m WHERE user_id = '$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return $row['email_id'];
	}	else	{
		close_conn($conn);
		return 0;
	}
}

function GET_UserPhone($userid){
	$conn = create_conn();
	$sql = "SELECT PhoneNO FROM user_m WHERE user_id = '$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return $row['PhoneNO'];
	}	else	{
		close_conn($conn);
		return 0;
	}
}


function UPDATE_UserProfile_Fname($fname, $userid){
	$conn = create_conn();
	$sql = "UPDATE user_m SET first_name = '$fname' WHERE user_id = $userid";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		header('location: profile.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
	}
}

function UPDATE_UserProfile_lname($lname, $userid){
	$conn = create_conn();
	$sql = "UPDATE user_m SET last_name = '$lname' WHERE user_id = $userid";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		header('location: profile.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
	}
}

function UPDATE_UserProfile_Pnumber($pNumber, $userid){
	$conn = create_conn();
	$sql = "UPDATE user_m SET phoneNo = $pNumber WHERE user_id = $userid";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		header('location: profile.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
	}
}

function UPDATE_UserProfile_Picture($pic, $userid){
	$conn = create_conn();
	$sql = "UPDATE user_m SET profile_pic = '$pic' WHERE user_id = $userid";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		//header('location: profile.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
	}
}


function UPDATE_UserProfile_Password($cpass, $npass, $userid){
	$tempvar = user_password($userid, $cpass);
	if($tempvar == 0){
		header('location: profile.php?error=20');
	}	else 	{
		$conn = create_conn();

		$sql = "UPDATE user_m SET password = '$npass' WHERE user_id = $userid";
		if(mysqli_query($conn,$sql))
		{
			close_mysqli($conn);
			header('location: profile.php?resp=1');
		}
		else
		{
			close_mysqli($conn);
			header('location: profile.php?error=21');
		}
	}
}

function Admin_Role()
{
	echo "<option value=0>Select Role</option>";
	$conn = create_conn();
	$sql = "SELECT user_role_id,user_role_name FROM user_role";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) 
	{
		echo "<option value=".$row['user_role_id'].">".$row['user_role_name']."</option>";
	}
	close_conn($conn);
}

function Insert_Role($name)
{
	$conn = create_conn();
	$sql = "INSERT INTO user_role (user_role_id, user_role_name) VALUES ('', '".$name."')";

	if(mysqli_query($conn,$sql))
	{
		if ($last_id = mysqli_insert_id($conn))
		{		
			$sql1 = "SELECT user_role_pr_id FROM user_role_permission";
			$result = mysqli_query($conn,$sql1);
			while ($row = $result->fetch_assoc()) 
			{
				$sql2 = "INSERT INTO user_role_permission_t (user_role_pr_t_id, user_role_pr_id, user_role_id, user_create, user_update, user_delete, user_view) VALUES (NULL, '".$row['user_role_pr_id']."', '".$last_id."', '0', '0', '0', '0')";
				mysqli_query($conn,$sql2);	
			}	
		}
		close_mysqli($conn);
		header('location: admin.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
		header('location: admin.php?error=21');
	}
}


function Insert_Permission($pname){
	$conn = create_conn();
	$sql = "INSERT INTO user_role_permission (user_role_pr_id, user_role_pr_name) VALUES (NULL, '".$pname."')";

	if(mysqli_query($conn,$sql))
	{
		if ($last_id = mysqli_insert_id($conn))
		{
			$sql1 = "SELECT user_role_id FROM user_role";
			$result = mysqli_query($conn,$sql1);
			while ($row = $result->fetch_assoc()) 
			{
				$sql2 = "INSERT INTO user_role_permission_t (user_role_pr_t_id, user_role_pr_id, user_role_id, user_create, user_update, user_delete, user_view) VALUES (NULL, '".$last_id."', '".$row['user_role_id']."', '0', '0', '0', '0')";
				mysqli_query($conn,$sql2);	
			}	
		}
		close_mysqli($conn);
		header('location: admin.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
		header('location: admin.php?error=22');
	}
}

function Edit_Details($cfname,$clname,$cbname,$cphone,$cemail,$caddress,$csuburb,$cstate,$cpost,$coption,$cgroup,$cdate,$csdate,$cdamount,$csdamount,$frequency,$cdebit)
{
	$conn = create_conn();
	$sql = "SELECT customer_id FROM customer_details";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$cid = $row;
	while ($row = mysqli_fetch($result)) {
		'<form method="POST" action="edit.php">
		<div class="form-group">
		<label for="recipient-name" class="form-control-label">FirstName:</label>
		<input type="number" name="urid" id="urid" value="'.$row['first_name'].'" class="form-control" id="recipient-name">
		</div>
		</form>';
	}
	if($cgroup != "cuc"){
		$cgroup = $cdebit;
	}
	$sql2 = "UPDATE customer_details SET first_name = $cfname, last_name = $clname, business_name = $cbname, mobile = $cphone, email = $cemail, address = $caddress, suburb = $suburb, state = $cstate, post = $cpost, dd_option = $coption, dd_group = $cgroup, dd_date = $cdate, dd_start_date = $csdate, dd_date_amount = $cdamount, dd_start_date_amount = $csdamount, frequency = $frequency WHERE customer_id = $cid";
	if(mysqli_query($conn,$sql2))
	{
		close_mysqli($conn);
		header('location: edit.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
	}
}

function EDITPROD_list_all_Users(){
	$conn = create_conn();

	$sql = "SELECT user_m.user_id, user_role.user_role_name, user_m.first_name,user_m.last_name,user_m.phoneNo,user_m.gender,user_m.email_id,user_m.dob FROM user_m JOIN user_role ON user_role.user_role_id = user_m.user_role_id WHERE user_m.user_id = user_id";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"User_id\":\"".$row['user_id']."\",";
			$str_echo .= "\"First_Name\":\"".$row['first_name']."\",";
			$str_echo .= "\"Last_Name\":\"".$row['last_name']."\",";
			$str_echo .= "\"Email\":\"".$row['email_id']."\",";
			$str_echo .= "\"Role\":\"".$row['user_role_name']."\",";
			$str_echo .= "\"Gender\":\"".$row['gender']."\",";
			$str_echo .= "\"Dob\":\"".$row['dob']."\",";
			$str_echo .= "\"phoneNo\":\"".$row['phoneNo']."\",";
			$str_echo .= "\"Actions\":null";
			$str_echo .= "},\n";
			$count += 1;
//echo $row['id']."";
		}

		echo substr(trim($str_echo), 0, -1);
		echo ']';
	} else {
		close_conn($conn);
		return 0;
	}
}

function EDIT_Customer_Data(){
	$conn = create_conn();
	$sql = "SELECT first_name, last_name, business_name, mobile, email, address, dd_start_date, uniq_id FROM customer_details";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"FirstName\":\"".$row['first_name']."\",";
			$str_echo .= "\"LastName\":\"".$row['last_name']."\",";
			$str_echo .= "\"BusinessName\":\"".$row['business_name']."\",";
			$str_echo .= "\"Mobile\":\"".$row['mobile']."\",";
			$str_echo .= "\"Email\":\"".$row['email']."\",";
			$str_echo .= "\"Address\":\"".$row['address']."\",";
			$str_echo .= "\"StartDate\":\"".$row['dd_start_date']."\",";
			$str_echo .= "\"UniqId\":\"".$row['uniq_id']."\",";
			$str_echo .= "\"Actions\":null";
			$str_echo .= "},\n";
			$count += 1;
//echo $row['id']."";
		}
		echo substr(trim($str_echo), 0, -1);
		echo ']';
	} else {
		close_conn($conn);
		return 0;
	}
}


// function EDIT_Customer_Data(){
// 	$conn = create_conn();
// 	$sql = "SELECT first_name, last_name, business_name, mobile, email, address, dd_start_date, uniq_id FROM customer_details";
// 	$result = $conn->query($sql);
// 	if ($result->num_rows > 0) {
// 		$count = 1;
// 		$str_echo = "[";
// 		while($row = $result->fetch_assoc()) {
// 			$str_echo .= "{\"RecordID\":\"".$count."\",";
// 			$str_echo .= "\"FirstName\":\"".$row['first_name']."\",";
// 			$str_echo .= "\"LastName\":\"".$row['last_name']."\",";
// 			$str_echo .= "\"BusinessName\":\"".$row['business_name']."\",";
// 			$str_echo .= "\"Mobile\":\"".$row['mobile']."\",";
// 			$str_echo .= "\"Email\":\"".$row['email']."\",";
// 			$str_echo .= "\"Address\":\"".$row['address']."\",";
// 			$str_echo .= "\"StartDate\":\"".$row['dd_start_date']."\",";
// 			$str_echo .= "\"UniqId\":\"".$row['uniq_id']."\",";
// 			$str_echo .= "\"Actions\":null";
// 			$str_echo .= "},\n";
// 			$count += 1;
// //echo $row['id']."";
// 		}
// 		$count -= 1;
// 		$str_echo .= substr(trim($str_echo), 0, -1);
// 		$str_echo .= "]";
// 		$str_pre = "{\"meta\":{\"page\":1,\"pages\":1,\"perpage\":-1,\"total\":".$count.",\"sort\":\"asc\",\"field\":\"RecordID\"},\"data\":";
// 		echo $str_pre;
// 		echo $str_echo;
// 		echo "}";
// 	} else {
// 		close_conn($conn);
// 		return 0;
// 	}
// }

function Update_User_Details($urid,$fname,$lname,$email,$pnum){
	$conn = create_conn();
	$uid = $_GET['user_id'];
	$sql = "UPDATE user_m SET first_name = $fname WHERE email_id = $email";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		header('location: manage_user.php');
	}
	else
	{
		close_mysqli($conn);
		echo "error";
	}
}

function update_modal($email)
{
	$conn = create_conn();
	$sql = "SELECT * FROM user_m WHERE email_id = '".$email."'";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch($result)) {
		'<form method="POST" action="manage_user.php" id="createrole">
		<div class="form-group">
		<label for="recipient-name" class="form-control-label">User-Role-Id:</label>
		<input type="number" name="urid" id="urid" value="'.$row['user_role_id'].'" class="form-control" id="recipient-name">
		</div>
		<div class="form-group">
		<label for="recipient-name" class="form-control-label">First Name:</label>
		<input type="text" name="ufname" id="ufname" value="'.$row['first_name'].'" class="form-control" id="recipient-name">
		</div>
		<div class="form-group">
		<label for="recipient-name" class="form-control-label">Last Name:</label>
		<input type="text" name="ulname" id="ulname" value="'.$row['last_name'].'" class="form-control" id="recipient-name">
		</div>
		<div class="form-group">
		<label for="recipient-name" class="form-control-label">Email:</label>
		<input type="Email" name="uemail" id="uemail" value="'.$row['email_id'].'" class="form-control" id="recipient-name">
		</div>
		<div class="form-group">
		<label for="recipient-name" class="form-control-label">Phone:</label>
		<input type="number" name="uphone" id="uphone" value="'.$row['phoneNo'].'" class="form-control" id="recipient-name">
		</div>
		</form>';
	}

}


function MODAL_Upload_User_Role_fetch($uniqueid){
	$conn = create_conn();
	$sql = "SELECT user_role_id, user_role_name FROM user_role WHERE user_role_id = '".$uniqueid."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return $row['user_role_id'];
	}	else	{
		close_conn($conn);
		return 0;
	}
}

function MODAL_edit_customer_detail_fetch($uniqueid){
	$conn = create_conn();
	$sql = "SELECT `customer_id`, `first_name`, `last_name`, `business_name`, `mobile`, `email`, `address`, `suburb`, `state`, `post`, `dd_option`, `dd_group`, `dd_date`, `dd_start_date`, `dd_date_amount`, `dd_start_date_amount`, `frequency`FROM customer_details WHERE uniq_id = '".$uniqueid."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<!--begin::Form-->
			<div class='modal-body' id='updatemodal'>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>First Name </label>
			<div class='col-lg-4'>
			<input type='text' name='cfname' id='cfname' class='form-control' placeholder='Enter first name' value=".$row['first_name'].">
			</div>
			<label class='col-lg-2 col-form-label'>Last Name </label>
			<div class='col-lg-4'>
			<input type='text' name='clname' id='clname' class='form-control' placeholder='Enter last name' value=".$row['last_name'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Business Name </label>
			<div class='col-lg-10'>
			<input type='text' name='cbname' id='cbname' class='form-control' placeholder='Enter buniess name' value=".$row['business_name'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Mobile </label>
			<div class='col-lg-10'>
			<input type='Number' name='cphone' id='cphone' class='form-control' placeholder='Enter mobile number' value=".$row['mobile'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Email </label>
			<div class='col-lg-10'>
			<input type='Email' name='cemail' id='cemail' class='form-control' placeholder='Enter email' value=".$row['email'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Address </label>
			<div class='col-lg-10'>
			<input type='text' name='caddress' id='caddress' class='form-control' placeholder='Enter address' value=".$row['address'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Suburb </label>
			<div class='col-lg-10'>
			<input type='text' name='csuburb' id='csuburb' class='form-control' placeholder='Enter suburb' value=".$row['suburb'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>State </label>
			<div class='col-lg-4'>
			<input type='text' name='cstate' id='cstate' class='form-control' placeholder='Enter state' value=".$row['state'].">
			</div>
			<label class='col-lg-2 col-form-label'>Post </label>
			<div class='col-lg-4'>
			<input type='text' name='cpost' id='cpost' class='form-control' placeholder='Enter post' value=".$row['post'].">
			</div>
			</div>
			</div>
			</div>
			</div>
			<!--end::Form-->
			<div class='kt-portlet'>
			<div class='kt-portlet__head'>
			<div class='kt-portlet__head-label'>
			<span class='kt-portlet__head-icon kt-hidden'>
			<i class='la la-gear'></i>
			</span>
			<h3 class='kt-portlet__head-title'>
			Direct Debit Details
			</h3>
			</div>
			</div>

			<!--begin::Form-->
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Select Option </label>
			<div class='col-lg-6'>
			<div class='kt-radio-inline'>
			<label class='kt-radio kt-radio--solid'>
			<input type='radio'  name='coption' id='coption' checked value='Once'";
			if($row['dd_option'] == 'Once'){ echo 'checked'; };
			echo ">Once
			<span></span>
			</label>
			<label class='kt-radio kt-radio--solid'>
			<input type='radio' name='coption' id='coption' value='Regular'";

			if($row['dd_option'] == 'Regular'){ echo 'checked'; };

			echo ">Regular
			<span></span>
			</label>
			</div>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Date </label>
			<div class='col-lg-4'>
			<input type='Date' name='cdate' id='cdate' class='form-control' placeholder='Enter date' value=".$row['dd_date'].">
			</div>
			<label class='col-lg-2 col-form-label'>Amount </label>
			<div class='col-lg-4'>
			<input type='Number' name='cdamount' id='cdamount' class='form-control' value=".$row['dd_date_amount'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Start Date </label>
			<div class='col-lg-4'>
			<input type='date' name='csdate' id='csdate' class='form-control' placeholder='Enter start date' value=".$row['dd_start_date'].">
			</div>
			<label class='col-lg-2 col-form-label'>Amount </label>
			<div class='col-lg-4'>
			<input type='Number' name='csdamount' id='csdamount' class='form-control' value=".$row['dd_start_date_amount'].">
			</div>

			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Frequency </label>
			<div class='col-lg-10'>
			<input type='text' name='frequency' id='frequency' class='form-control' placeholder='Enter Frequency' value=".$row['frequency'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Group </label>
			<div class='col-lg-6'>
			<div class='kt-radio-inline'>
			<label class='kt-radio kt-radio--solid'>
			<input type='radio' name='cgroup' id='cgroup' value='cuc' "; 
			if($row['dd_group'] == "cuc") { echo "checked"; };

			echo "> Continue untill cancelled
			<span></span>
			</label>
			<label class='kt-radio kt-radio--solid'>
			<input type='radio' name='cgroup' id='cgroup' value='2'"; 

			if($row['dd_group'] != "cuc") { echo "checked"; }

			echo "> Untill
			<span></span>
			</label>
			</div>
			</div>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Debit </label>
			<div class='col-lg-10'>
			<input type='text' name='cdebit' id='cdebit' class='form-control' placeholder='Enter debit' "; 

			if($row['dd_group'] != "cuc") { echo "value=\"".$row['dd_group']."\"";} else { };

			echo ">
			</div>
			</div>
			</div>
			<div class='kt-portlet__foot'>
			<div class='kt-form__actions'>
			<div class='row'>
			<div class='col-lg-9'></div>
			<div class='col-lg-3'>
			<div class='modal-footer'>
			<a class='btn btn-success update-customer-btn' style='color: white;'>Submit</a>
			<a class='btn btn-secondary cancelBtn' style='color: black;'>Cancel</a>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>";
		}
	}
	close_conn($conn);
}

function Add_Customer_Details($cfname,$clname,$cbname,$cphone,$cemail,$caddress,$csuburb,$cstate,$cpost,$coption,$cgroup,$cdate,$csdate,$cdamount,$csdamount,$frequency,$cdebit){
	$conn = create_mysqli();
	$uid = md5(uniqid(rand(), true));
	if($cgroup != "cuc"){
		$cgroup = $cdebit;
	}

	$sql3 = "INSERT INTO `customer_details` (`customer_id`, `first_name`, `last_name`, `business_name`, `mobile`, `email`, `address`, `suburb`, `state`, `post`, `dd_option`, `dd_group`, `dd_date`, `dd_start_date`, `dd_date_amount`, `dd_start_date_amount`, `frequency`,`uniq_id`) VALUES (NULL, '".$cfname."', '".$clname."', '".$cbname."', '".$cphone."', '".$cemail."', '".$caddress."', '".$csuburb."', '".$cstate."', '".$cpost."', '".$coption."', '".$cgroup."', '".$cdate."', '".$csdate."', '".$cdamount."', '".$csdamount."', '".$frequency."', '".$uid."');";

	$sql2 = "SELECT email FROM customer_details WHERE email='$cemail'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		return 0;
	}
	else
	{
		if(mysqli_query($conn, $sql3)){

			return $uid;

		} else{
			return 0;
		}
		close_mysqli($conn);

	}
}

function MODAL_Edit_Upload_Customer_Data($cfname,$clname,$cbname,$cphone,$cemail,$caddress,$csuburb,$cstate,$cpost,$coption,$cgroup,$cdate,$csdate,$cdamount,$csdamount,$frequency,$cdebit, $uniqueid){

	$conn = create_mysqli();

	if($cgroup != "cuc"){
		$cgroup = $cdebit;
	}

	$sql = "UPDATE customer_details SET first_name = '$cfname', last_name = '$clname', business_name = '$cbname', mobile = '$cphone', email = '$cemail', address = '$caddress', suburb = '$csuburb', state = '$cstate', post = '$cpost', dd_option = '$coption', dd_group = '$cgroup', dd_date = '$cdate', dd_start_date = '$csdate', dd_date_amount = '$cdamount', dd_start_date_amount = '$csdamount', frequency = '$frequency' WHERE uniq_id = '$uniqueid'";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}


function Check_UserPermission($permission_name, $permission, $user_id){

	$conn = create_mysqli();

	$sql = "SELECT ".$permission." FROM user_role_permission_t JOIN user_role_permission ON user_role_permission.user_role_pr_id = user_role_permission_t.user_role_pr_id JOIN user_m ON user_m.user_role_id = user_role_permission_t.user_role_id WHERE user_role_permission.user_role_pr_name = '".$permission_name."' AND user_m.user_id = ".$user_id;

	if($result = mysqli_query($conn,$sql))
	{
		$row = mysqli_fetch_assoc($result);
		close_mysqli($conn);
		return $row[$permission];
	}
	else
	{
		close_mysqli($conn);
		return 0;
	}

}

function User_Role_Data(){
	$conn = create_mysqli();

	$sql = "SELECT user_role_id, user_role_name FROM user_role";

	$result = $conn->query($sql);
	$cnt = 0;
	while ($row = $result->fetch_assoc()) 
	{		
		echo "<tr data-row='0' class='kt-datatable__row' style='left: 0px;'>";
		echo "<td data-field='UserPermission' class='kt-datatable__cell'>".$row['user_role_name']."</td>";
		echo "<td data-field='View' class='kt-datatable__cell'><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='edit-cust-btn la la-edit' data-toggle='modal' id='".$row['user_role_id']."'></i></a></td>";
		echo "<td data-field='Action' class='kt-datatable__cell'><a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='delete-cust-btn la la-trash' id='".$row['user_role_id']."'></i></a></td>";
		echo "</tr>";
	}
}

function Manage_Lead_Info(){
	$conn = create_mysqli();
	$sql = "SELECT `lead_no`, `lead_date`, `name`, `address`, `location`, `phoneNo`, `email`, `inquiry_for`, `status`, `type_of_lead`, `user_id` FROM `leads`";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr>
		<td>".$row['lead_no']."</td>
		<td>".$row['lead_date']."</td>
		<td>".$row['name']."</td>
		<td>".$row['address']."</td>
		<td>".$row['location']."</td>
		<td>".$row['phoneNo']."</td>
		<td>".$row['email']."</td>
		<td>".$row['inquiry_for']."</td>
		<td><select class='form-control' id='ldstatus' lead_no='".$row['lead_no']."'>
		<option";if($row['status'] == 'In Progress') echo " selected "; echo " value=1"; echo ">In Progress</option>
		<option";if($row['status'] == 'Quote') echo " selected "; echo " value=2"; echo ">Quote</option>
		<option";if($row['status'] == 'Sample') echo " selected "; echo " value=3"; echo ">Sample</option>
		<option";if($row['status'] == 'Follow Up') echo " selected "; echo " value=4"; echo ">Follow Up</option>
		<option";if($row['status'] == 'Closed') echo " selected "; echo " value=5"; echo ">Closed</option>
		</select></td>
		<td>".$row['type_of_lead']."</td>
		<td>".$row['user_id']."</td>
		<td><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='edit-lead-btn la la-edit' id='".$row['lead_no']."'></i></a>";
		echo "<a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='delete-lead-btn la la-trash' id='".$row['lead_no']."'></i></a></td>
		</tr>";
	} 
}

function Edit_Upload_Lead_Status_Data($status,$lead_no){
	$conn = create_mysqli();
	$sql = "UPDATE leads SET status = '$status' WHERE lead_no = '$lead_no'";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}

function User_Permission(){
	$conn = create_mysqli();

	$sql = "SELECT user_role_pr_name, user_role_pr_id FROM user_role_permission";

	$result = $conn->query($sql);
	$cnt = 0;
	while ($row = $result->fetch_assoc()) 
	{		
		echo "<tr data-row='0' class='kt-datatable__row' style='left: 0px;'>";
		echo "<td data-field='UserPermission' class='kt-datatable__cell'>".$row['user_role_pr_name']."</td>";
		echo "<td data-field='View' class='kt-datatable__cell'><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='edit-per-btn la la-edit' data-toggle='modal' id='".$row['user_role_pr_id']."' ></i></a></td>";
		echo "<td data-field='Action' class='kt-datatable__cell'><a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='delete-user-btn la la-trash' id='".$row['user_role_pr_id']."'></i></a></td>";
		echo "</tr>";
	}
}


function Inser_User_Role_Name($name){
	$conn = create_conn();
	$sql = "INSERT INTO user_role (user_role_id, user_role_name) VALUES ('', '".$name."')";
	$sql3 = "SELECT user_role_name FROM user_role WHERE user_role='$name'";
	$result = mysqli_query($conn, $sql3);
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		return 0;
	}
	else
	{
		if(mysqli_query($conn,$sql))
		{
			if ($last_id = mysqli_insert_id($conn))
			{		
				$sql1 = "SELECT user_role_pr_id FROM user_role_permission";
				$result = mysqli_query($conn,$sql1);
				while ($row = $result->fetch_assoc()) 
				{
					$sql2 = "INSERT INTO user_role_permission_t (user_role_pr_t_id, user_role_pr_id, user_role_id, user_create, user_update, user_delete, user_view) VALUES (NULL, '".$row['user_role_pr_id']."', '".$last_id."', '0', '0', '0', '0')";
					mysqli_query($conn,$sql2);	
				}	
			}
			close_mysqli($conn);
			header('location: manage_role.php');
		}
		else
		{
			close_mysqli($conn);
			echo "error";
			header('location: manage_role.php?error=21');
		}
	}
}

function Insert_User_Permission_Name($pname){
	$conn = create_conn();
	$sql = "INSERT INTO user_role_permission (user_role_pr_id, user_role_pr_name) VALUES (NULL, '".$pname."')";
	$sql3 = "SELECT user_role_pr_name FROM user_role_permission WHERE user_role_pr_name='$pname'";
	$result = mysqli_query($conn, $sql3);
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		header('location: manage_role.php?error=22');
	}
	else
	{
		if(mysqli_query($conn,$sql))
		{
			if ($last_id = mysqli_insert_id($conn))
			{	
				$sql1 = "SELECT user_role_id FROM user_role";
				$result = mysqli_query($conn,$sql1);
				while ($row = $result->fetch_assoc()) 
				{
					$sql2 = "INSERT INTO user_role_permission_t (user_role_pr_t_id, user_role_pr_id, user_role_id, user_create, user_update, user_delete, user_view) VALUES (NULL, '".$last_id."', '".$row['user_role_id']."', '0', '0', '0', '0')";
					mysqli_query($conn,$sql2);	
				}	
			}
			close_mysqli($conn);
			header('location: manage_role.php');
		}
		else
		{
			close_mysqli($conn);
		}
	}
}


function MODAL_Delete_User_Role($urid){
	$conn = create_conn();
	$sql = "DELETE FROM user_role WHERE user_role_id = $urid";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		return 0;
	}
	else
	{
		close_mysqli($conn);
		
		return 1;
	}
}

function MODAL_Delete_User_permission($urid){
	$conn = create_conn();
	$sql = "DELETE FROM user_role_permission WHERE user_role_pr_id = $urid";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		return 0;
	}
	else
	{
		close_mysqli($conn);
		return 1;
	}
}

function MODAL_Update_Upload_User_Role($role_name,$uniqueid){

	$conn = create_mysqli();
	$sql = "UPDATE user_role SET user_role_name = '$role_name' WHERE user_role_id = '$uniqueid'";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}

function MODAL_Update_Upload_User_Permission($user_role_pr_name,$uniqueid){
	$conn = create_mysqli();
	$sql = "UPDATE user_role_permission SET user_role_pr_name = '$user_role_pr_name' WHERE user_role_pr_id = '$uniqueid'";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}

function MODAL_edit_user_detail_fetch($uniqueid){
	session_start();
	$conn = create_conn();

	$sql = "SELECT `user_id`, `user_role_id`, `password`, `email_id`, `first_name`, `last_name`, `security_id`, `security_pass`, `gender`, `dob`, `dateofRegistration`, `phoneNo`, `profile_pic` FROM `user_m` WHERE user_id = '".$uniqueid."'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<!--begin::Form-->
			<div class='modal-body' id='updatemodal'>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>User Picture</label>
			<div class='col-lg-4'>
			<h3 class='kt-portlet__head-title'>
			<center><img src=";
			echo GET_UserPic($row['user_id']); 
			echo " style='height: 100px; width: 100px; border-radius: 50px;';></center>
			</h3>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>First Name </label>
			<div class='col-lg-4'>
			<input type='text' name='cfname' id='cfname' class='form-control' placeholder='Enter first name' value=".$row['first_name'].">
			</div>
			<label class='col-lg-2 col-form-label'>Last Name </label>
			<div class='col-lg-4'>
			<input type='text' name='clname' id='clname' class='form-control' placeholder='Enter last name' value=".$row['last_name'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Mobile </label>
			<div class='col-lg-10'>
			<input type='Number' name='cphone' id='cphone' class='form-control' placeholder='Enter mobile number' value=".$row['phoneNo'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Email </label>
			<div class='col-lg-10'>
			<input type='Email' name='cemail' id='cemail' class='form-control' placeholder='Enter email' value=".$row['email_id'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Gender</label>
			<div class='col-lg-6'>
			<select class='form-control' id='cgender'>
			<option";if($row['gender'] == 'Male') echo " selected "; echo ">Male</option>
			<option";if($row['gender'] == 'Female') echo " selected "; echo ">Female</option>
			<option";if($row['gender'] == 'Other') echo " selected "; echo ">Other</option>
			</select>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Date of birth</label>
			<div class='col-lg-4'>
			<input type='Date' name='cdob' id='cdob' class='form-control' value=".$row['dob'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Date of birth</label>
			<div class='col-lg-4'>
			<div class='input-group date' data-z-index='1100'>
			<input type='text' class='form-control' placeholder='Select date' id='kt_datetimepicker_2_modal' />
			<div class='input-group-append'>
			<span class='input-group-text'>
			<i class='la la-calendar glyphicon-th'></i>
			</span>
			</div>
			</div>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Role</label>
			<div class='col-lg-6'>
			<select class='form-control' id='urole'>";
			Admin_Role_Prnt($row['user_role_id']);
			echo "</select>
			</div>
			</div>
			</div>
			</div>
			
			<div class='kt-form__actions'>
			<div class='row'>
			<div class='col-lg-9'></div>
			<div class='col-lg-3'>
			<div class='modal-footer'>
			<a class='btn btn-success update-user-btn' style='color: white;'>Submit</a>
			<a class='btn btn-secondary cancelBtn' style='color: black;'>Cancel</a>
			</div>
			</div>
			</div>
			</div>

			<!--end::Form-->
			</div>";
		}
	}
	close_conn($conn);
}

function MODAL_Edit_Lead_Detail($uniqueid){

	$conn = create_conn();

	$sql = "SELECT `lead_no`, `lead_date`, `name`, `address`, `location`, `phoneNo`, `email`, `inquiry_for`, `status`, `type_of_lead`, `user_id` FROM `leads` WHERE lead_no = '".$uniqueid."'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<!--begin::Form-->
			<div class='modal-body' id='updatemodal'>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Name </label>
			<div class='col-lg-6'>
			<input type='text' name='ldname' id='ldname' class='form-control' placeholder='Enter name' value='".$row['name']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Address </label>
			<div class='col-lg-10'>
			<input type='text' name='ldaddress' id='ldaddress' class='form-control' placeholder='Enter name' value='".$row['address']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Location </label>
			<div class='col-lg-10'>
			<input type='text' name='ldlocation' id='ldlocation' class='form-control' placeholder='Enter mobile number' value='".$row['location']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Phone No </label>
			<div class='col-lg-10'>
			<input type='Number' name='ldpno' id='ldpno' class='form-control' placeholder='Enter mobile number' value='".$row['phoneNo']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Email </label>
			<div class='col-lg-10'>
			<input type='Email' name='ldemail' id='ldemail' class='form-control' placeholder='Enter email' value='".$row['email']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Inquiry For </label>
			<div class='col-lg-10'>
			<input type='Email' name='ldinquiry' id='ldinquiry' class='form-control' placeholder='Enter email' value='".$row['inquiry_for']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Date </label>
			<div class='col-lg-10'>
			<input type='Date' name='lddate' id='lddate' class='form-control' placeholder='Enter email' value=".$row['lead_date'].">
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Status</label>
			<div class='col-lg-6'>
			<select class='form-control' id='ldstate'>
			<option";if($row['status'] == 'In Progress') echo " selected "; echo ">In Progress</option>
			<option";if($row['status'] == 'Quote') echo " selected "; echo ">Quote</option>
			<option";if($row['status'] == 'Sample') echo " selected "; echo ">Sample</option>
			<option";if($row['status'] == 'Follow Up') echo " selected "; echo ">Follow Up</option>
			<option";if($row['status'] == 'Closed') echo " selected "; echo ">Closed</option>
			</select>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Type Of Lead</label>
			<div class='col-lg-6'>
			<select class='form-control' id='ldtype'>
			<option";if($row['type_of_lead'] == 'Wholeseller') echo " selected "; echo ">Wholeseller</option>
			<option";if($row['type_of_lead'] == 'Retailer') echo " selected "; echo ">Retailer</option>
			<option";if($row['type_of_lead'] == 'Farmer') echo " selected "; echo ">Farmer</option>
			<option";if($row['type_of_lead'] == 'B2B') echo " selected "; echo ">B2B</option>
			</select>
			</div>
			</div>
			</div>
			</div>
			
			<div class='kt-form__actions'>
			<div class='row'>
			<div class='col-lg-9'></div>
			<div class='col-lg-3'>
			<div class='modal-footer'>
			<a class='btn btn-success update-lead-btn' style='color: white;'>Submit</a>
			<a class='btn btn-secondary cancelBtn' style='color: black;'>Cancel</a>
			</div>
			</div>
			</div>
			</div>

			<!--end::Form-->
			</div>";
		}
	}
	close_conn($conn);
}


function Admin_Role_Prnt($role_id)
{
	// echo "<option value=0>Select Role</option>";
	$conn = create_conn();
	$sql = "SELECT user_role_id,user_role_name FROM user_role";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) 
	{
		echo "<option value=".$row['user_role_id'];
		if($row['user_role_id'] == $role_id){
			echo " selected ";
		}
		echo ">".$row['user_role_name']."</option>";
	}
	close_conn($conn);
}

function MODAL_Edit_Upload_user_Data($cuser_role_id,$cfname,$clname,$cphone,$cemail,$cgender,$cdob, $uniqueid){

	$conn = create_mysqli();

	$sql = "UPDATE user_m SET user_role_id = '$cuser_role_id', first_name = '$cfname', last_name = '$clname', phoneNo = '$cphone', email_id = '$cemail', gender = '$cgender', dob = '$cdob' WHERE user_id = '$uniqueid'";

	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}

function MODAL_Edit_Upload_lead_Data($name,$address,$location,$phoneNo,$email_id,$inquiry_for,$var_date,$status,$type_of_lead,$uniqueid){

	$conn = create_mysqli();

	$sql = "UPDATE leads SET name = '$name', address = '$address', location = '$location', phoneNo = '$phoneNo', email = '$email_id', inquiry_for = '$inquiry_for', lead_date = '$var_date', status = '$status', type_of_lead = '$type_of_lead' WHERE lead_no = '$uniqueid'";

	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}

function Admin_Bulk_Role()
{
	$conn = create_conn();
	$sql = "SELECT user_role_id,user_role_name FROM user_role";
	$result = $conn->query($sql);
	echo "<option>Select Role . . . </option>";
	while ($row = $result->fetch_assoc()) 
	{	
		echo "<option id='csrole' value=".$row['user_role_id']; echo "> ".$row['user_role_name']." </option>";
	}
	close_conn($conn);
}

function Display_Dynamic_New_Role($selected_role){
	$conn = create_conn();
	$sql = "SELECT user_role_id,user_role_name FROM user_role";
	$result = $conn->query($sql);
	echo "<label class='col-lg-2 col-form-label'>New Role :</label><div class='col-lg-6'><select class='form-control' id='newrole'>";
	while ($row = $result->fetch_assoc()) 
	{
		if($selected_role != $row['user_role_id']){
			echo "<option id='csrole' value=".$row['user_role_id']; echo "> ".$row['user_role_name']." </option>";	
		}
	}
	echo "</select>";
	echo "</div>";
	close_conn($conn);
}

function Update_Bulk_Role($user_role,$new_user_role){
	$conn = create_mysqli();

	$sql = "UPDATE user_m SET user_role_id = '$new_user_role' WHERE user_role_id = '$user_role'";

	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		echo "1";
	}
	else
	{
		close_mysqli($conn);
		echo "0";
	}
}

function Fetch_Site_Title(){

	$str = '$site_title = \'Simplyfii/\';';
	$searchstart = '$site_title = \'';
	$searchends = '\';';
	$startat = strpos($str, $searchstart) + strlen($searchstart);
	$endsat = strpos($str, $searchends, $startat);
	echo substr($str, $startat, $endsat - $startat);

	$farray = array($startat, $endsat);
	return $farray;
}

function Fetch_Site_URL(){

	$str = '$admin_url = \'http://localhost/simpleffi/\';';
	$searchstart = '$admin_url = \'';
	$searchends = '\';';
	$startat = strpos($str, $searchstart) + strlen($searchstart);
	$endsat = strpos($str, $searchends, $startat);
	echo substr($str, $startat, $endsat - $startat);

}

function Fetch_Setting_Data(){

	$file_path = "siteconfig.php";
	$file_handle = fopen($file_path, 'r');
	$file_upload = "";
	while(!feof($file_handle)){
		$file_upload .= fgetc($file_handle);
	}
	fclose($file_handle);

	$searchstart = '$site_title = \'';
	$searchends = '\';';
	$startat = strpos($file_upload, $searchstart) + strlen($searchstart);
	$endsat = strpos($file_upload, $searchends, $startat);
	$retArray[0] = substr($file_upload, $startat, $endsat - $startat);
	$retArray[0] = str_replace("\\", "", $retArray[0]);

	$searchstart = '$admin_url = \'';
	$searchends = '\';';
	$startat = strpos($file_upload, $searchstart) + strlen($searchstart);
	$endsat = strpos($file_upload, $searchends, $startat);
	$retArray[1] = substr($file_upload, $startat, $endsat - $startat);

	$searchstart = '$favicon = \'';
	$searchends = '\';';
	$startat = strpos($file_upload, $searchstart) + strlen($searchstart);
	$endsat = strpos($file_upload, $searchends, $startat);
	$retArray[2] = substr($file_upload, $startat, $endsat - $startat);

	return $retArray;

}

function Update_Setting($sname,$uname,$fname){
	//$data_to_write_sname = "". $sname;
	$file_path = "siteconfig.php.sample";
	$file_handle = fopen($file_path, 'r'); 
	
	$file_upload = "";
	while (!feof($file_handle)){
		$file_upload .= fgets($file_handle);
	}
	fclose($file_handle);

	$sname = str_replace("'", '\\\'', $sname);

	$file_upload = str_replace('{{SITETITLE}}', $sname ,$file_upload);
	$file_upload = str_replace('{{HOMEURL}}', $uname ,$file_upload);
	$file_upload = str_replace('{{FAVICON}}',$fname ,$file_upload);

	$file_path = "siteconfig.php";

	$file = fopen($file_path, 'w');
	fwrite($file, $file_upload);
	fclose($file);
}
//Function goes here ...
?>