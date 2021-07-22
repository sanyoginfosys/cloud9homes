<?php

include_once ('db_conn.php');
//include_once ('../siteconfig.php');

function Customer_Details($cfname,$clname,$cbname,$cphone,$cemail,$caddress,$csuburb,$cstate,$cpost,$coption,$cgroup,$cdate,$csdate,$cdamount,$csdamount,$frequency,$cdebit)
{
	// echo "hi";
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

function register_client($firstname,$lastname,$gender,$dob,$phoneNo,$email,$password,$cpassword,$filepath)
{
	$conn = create_conn();
	$sql = "INSERT INTO `user_m` (`password`, `email_id`, `first_name`, `last_name`, `security_id`, `security_pass`, `gender`, `dob`, `phoneNo`, `profile_pic`) VALUES ('".$password."', '".$email."', '".$firstname."', '".$lastname."', NULL, NULL, '".$gender."', '".$dob."', '".$phoneNo."', '".$filepath."');";
	$sql2 = "SELECT email_id FROM user_m WHERE email_id='$email'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		return 2;
	}
	elseif($password != $cpassword){
        return 3;
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


function file_upload_pics($pic_path)
{
	$target_dir = "uploads/";
	$uid_name = md5(uniqid(rand(), true));
	$uid_name .= basename($pic_path["name"]);
	$target_file = $target_dir . $uid_name;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

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

function GET_User_Lead_Name($userid){
	$conn = create_conn();
	$sql = "SELECT name FROM leads WHERE user_id = '$userid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		return $row['name'];
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
	$sql2 = "UPDATE customer_details SET first_name = $cfname, last_name = $clname, business_name = $cbname, mobile = $cphone, email = $cemail, address = $caddress, suburb = $csuburb, state = $cstate, post = $cpost, dd_option = $coption, dd_group = $cgroup, dd_date = $cdate, dd_start_date = $csdate, dd_date_amount = $cdamount, dd_start_date_amount = $csdamount, frequency = $frequency WHERE customer_id = $cid";
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

function TABLE_Manage_Lead_Property(){
	$conn = create_conn();
	$sql = "SELECT property_id, property_type, transaction, name, phoneno, longitude, latitude, price, area, timestamp FROM lead_property_details";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"property_id\":\"".$row['property_id']."\",";
			$str_echo .= "\"property_type\":\"".$row['property_type']."\",";
			$str_echo .= "\"transaction\":\"".$row['transaction']."\",";
			$str_echo .= "\"name\":\"".$row['name']."\",";
			$str_echo .= "\"phoneno\":\"".$row['phoneno']."\",";
			$str_echo .= "\"longitude\":\"".$row['longitude']."\",";
			$str_echo .= "\"latitude\":\"".$row['latitude']."\",";
			$str_echo .= "\"price\":\"".$row['price']."\",";
			$str_echo .= "\"area\":\"".$row['area']."\",";
			$str_echo .= "\"timestamp\":\"".$row['timestamp']."\",";
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

function TABLE_Manage_Property(){
	//session_start();
	$conn = create_conn();
	$sql = "SELECT property_id, property_type, transaction, name, phoneno, longitude, latitude, price, area, timestamp, is_live FROM approved_property_details";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"property_id\":\"".$row['property_id']."\",";
			$str_echo .= "\"property_type\":\"".$row['property_type']."\",";
			$str_echo .= "\"transaction\":\"".$row['transaction']."\",";
			$str_echo .= "\"name\":\"".$row['name']."\",";
			$str_echo .= "\"phoneno\":\"".$row['phoneno']."\",";
			$str_echo .= "\"longitude\":\"".$row['longitude']."\",";
			$str_echo .= "\"latitude\":\"".$row['latitude']."\",";
			$str_echo .= "\"price\":\"".$row['price']."\",";
			$str_echo .= "\"area\":\"".$row['area']."\",";
			$str_echo .= "\"is_live\":\"".$row['is_live']."\",";
			$str_echo .= "\"timestamp\":\"".$row['timestamp']."\",";
			$str_echo .= "\"update_permission\":\"".Check_UserPermission('Manage Property', 'user_update', $_SESSION['INFCRM_UserID'])."\",";
			$str_echo .= "\"delete_permission\":\"".Check_UserPermission('Manage Property', 'user_delete', $_SESSION['INFCRM_UserID'])."\",";
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

function TABLE_Manage_Advertise(){
	//session_start();
	$conn = create_conn();
	$sql = "SELECT `advertise_id`, `advertise_name`, `image_url`, `advertise_status`, `timestamp` FROM `advertise_image_t` ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"advertise_id\":\"".$row['advertise_id']."\",";
			$str_echo .= "\"advertise_name\":\"".$row['advertise_name']."\",";
			$str_echo .= "\"advertise_status\":\"".$row['advertise_status']."\",";
			$str_echo .= "\"timestamp\":\"".$row['timestamp']."\",";
			$str_echo .= "\"update_permission\":\"".Check_UserPermission('Manage Property', 'user_update', $_SESSION['INFCRM_UserID'])."\",";
			$str_echo .= "\"delete_permission\":\"".Check_UserPermission('Manage Property', 'user_delete', $_SESSION['INFCRM_UserID'])."\",";
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

function TABLE_Manage_Service_Request(){
	$conn = create_conn();
	$sql = "SELECT request_id, person_name, last_name, phone_no, email_id, property_type, Free_Property_Valuation, Property_Mortgage_Health_Check, Rental_Property_Inspection, Free_Rental_Appraisal, communicationMethod, longitude, latitude, timestamp FROM request_service_leads";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"request_id\":\"".$row['request_id']."\",";
			$str_echo .= "\"person_name\":\"".$row['person_name']."\",";
			$str_echo .= "\"last_name\":\"".$row['last_name']."\",";
			$str_echo .= "\"phone_no\":\"".$row['phone_no']."\",";
			$str_echo .= "\"email_id\":\"".$row['email_id']."\",";
			$str_echo .= "\"property_type\":\"".$row['property_type']."\",";
			$str_echo .= "\"Free_Property_Valuation\":\"".$row['Free_Property_Valuation']."\",";
			$str_echo .= "\"Property_Mortgage_Health_Check\":\"".$row['Property_Mortgage_Health_Check']."\",";
			$str_echo .= "\"Rental_Property_Inspection\":\"".$row['Rental_Property_Inspection']."\",";
			$str_echo .= "\"Free_Rental_Appraisal\":\"".$row['Free_Rental_Appraisal']."\",";
			$str_echo .= "\"communicationMethod\":\"".$row['communicationMethod']."\",";
			$str_echo .= "\"longitude\":\"".$row['longitude']."\",";
			$str_echo .= "\"latitude\":\"".$row['latitude']."\",";
			$str_echo .= "\"timestamp\":\"".$row['timestamp']."\",";
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

function TABLE_APPROVE_Lead_Property($property_id){
	$conn = create_conn();

	$sql = "SELECT slug, address FROM lead_property_details WHERE property_id = $property_id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row['address'] == NULL OR $row['address'] == ''){
		header('location: manage_lead_property.php?error=10'); //No Address, Will create error in creating SLUG
		return 0;
	}	else 	{
		//$propertySlug = Property_GenerateSlug($row['address']);
		$propertySlug = $row['slug'];
	}

	$sql = "INSERT INTO approved_property_details SELECT * FROM lead_property_details WHERE property_id = $property_id";
	$result = $conn->query($sql);

	$sql = "INSERT INTO approved_property_images SELECT * FROM `lead_property_images` WHERE lead_property_id = $property_id";
	$result = $conn->query($sql);

	// $sql = "UPDATE approved_property_details SET slug = '$propertySlug' WHERE property_id = $property_id";
	// $result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_lead_property.php?success='.$propertySlug);
}

function TABLE_permanent_DELETE_Property($property_id){
	$conn = create_conn();

	$sql = "DELETE from approved_property_details WHERE property_id = $property_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_property.php');
}

function TABLE_permanent_DELETE_Advertise($advertise_id){
	$conn = create_conn();

	$sql = "DELETE FROM `advertise_image_t` WHERE advertise_id = $advertise_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_advertise.php');
}

function TABLE_permanent_DELETE_LeadProperty($property_id){
	$conn = create_conn();

	$sql = "DELETE from lead_property_details WHERE property_id = $property_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_lead_property.php');
}

function TABLE_DELETE_Property($property_id){
	$conn = create_conn();

	$sql = "UPDATE approved_property_details SET is_live = 0 WHERE property_id = $property_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_property.php');
}

function TABLE_DELETE_Advertise($advertise_id){
	$conn = create_conn();

	$sql = "UPDATE `advertise_image_t` SET `advertise_status`= 0 WHERE advertise_id = $advertise_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_advertise.php');
}

function TABLE_LIVE_Property($property_id){
	$conn = create_conn();

	$sql = "UPDATE approved_property_details SET is_live = 1 WHERE property_id = $property_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_property.php');
}

function TABLE_LIVE_Advertise($advertise_id){
	$conn = create_conn();

	$sql = "UPDATE `advertise_image_t` SET `advertise_status`= 1 WHERE advertise_id = $advertise_id";
	$result = $conn->query($sql);

	close_conn($conn);

	header('location: manage_advertise.php');
}

function TABLE_Manage_Testimonials(){
	$conn = create_conn();
	$sql = "SELECT testimonials_id, user_name, timestamp, approved FROM clients_testimonials";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"testimonials_id\":\"".$row['testimonials_id']."\",";
			$str_echo .= "\"user_name\":\"".$row['user_name']."\",";
			$str_echo .= "\"timestamp\":\"".$row['timestamp']."\",";
			$str_echo .= "\"approved\":\"".$row['approved']."\",";
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

function TABLE_Manage_Guest_Documents(){
	$conn = create_conn();
	$sql = "SELECT lead_guest_document_details.guest_doc_id, lead_guest_document_details.guest_name, lead_guest_document_details.guest_mobile, lead_guest_document_details.guest_email, lead_guest_document_details.guest_form_type, lead_guest_document_details.timestamp, lead_guest_documents_path.guest_document_path FROM lead_guest_document_details JOIN lead_guest_documents_path ON lead_guest_document_details.guest_doc_id = lead_guest_documents_path.guest_doc_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$count = 1;
		echo '[';
		$str_echo = "";
		while($row = $result->fetch_assoc()) {
			$str_echo .= "{\"guest_doc_id\":\"".$row['guest_doc_id']."\",";
			$str_echo .= "\"guest_name\":\"".$row['guest_name']."\",";
			$str_echo .= "\"guest_mobile\":\"".$row['guest_mobile']."\",";
			$str_echo .= "\"guest_email\":\"".$row['guest_email']."\",";
			$str_echo .= "\"guest_form_type\":\"".$row['guest_form_type']."\",";
			$str_echo .= "\"timestamp\":\"".$row['timestamp']."\",";
			$str_echo .= "\"guest_document_path\":\"".'../'.$row['guest_document_path']."\",";
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

function MODAL_VIEW_Lead_Property($uniqueid){
	$conn = create_conn();
	$sql = "SELECT `property_id`,`property_type`,`name`,`phoneno`,`emailid`,`transaction`,`price`,`area`,`bedrooms`,`bathrooms`,`description`,`air_conditioning`,`Internet`,`cable_tv`,`balcony`,`roof_terrace`,`terrace`,`lift`,`garage`,`security`,`high_standard`,`city_centre`,`furniture`,`another_options`,`longitude`,`latitude`,`timestamp` FROM lead_property_details WHERE property_id = '".$uniqueid."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<!--begin::Form-->
			<div class='modal-body' id='updatemodal'>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Property Type </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cfname' id='cfname' class='form-control' placeholder='Enter first name' value='".$row['property_type']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Transaction </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='clname' id='clname' class='form-control' value='".$row['transaction']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Customer Name </label>
			<div class='col-lg-10'>
			<input type='text' disabled name='cbname' id='cbname' class='form-control' placeholder='Enter buniess name' value='".$row['name']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Phone No </label>
			<div class='col-lg-10'>
			<input type='text' disabled name='cphone' id='cphone' class='form-control' placeholder='Enter mobile number' value='".$row['phoneno']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Email ID</label>
			<div class='col-lg-10'>
			<input type='text' disabled name='cemail' id='cemail' class='form-control' placeholder='Enter email' value='".$row['emailid']."'>
			</div>
			</div>
			
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Description</label>
			<div class='col-lg-10'>
			<textarea disabled class='form-control'>".$row['description']."</textarea>
			</div>
			</div>

			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Price </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cstate' id='cstate' class='form-control' placeholder='Enter state' value='".$row['price']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Area </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cpost' id='cpost' class='form-control' placeholder='Enter post' value='".$row['area']."'>
			</div>
			</div>

			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Bedrooms </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cstate' id='cstate' class='form-control' placeholder='Enter state' value='".$row['bedrooms']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Bathrooms </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cpost' id='cpost' class='form-control' placeholder='Enter post' value='".$row['bathrooms']."'>
			</div>
			</div>

			<div class='form-group row'>
			<br />
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['air_conditioning']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Air Conditioning'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['Internet']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Internet'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['cable_tv']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Cable TV'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['balcony']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Balcony'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['roof_terrace']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Roof Terrace'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['terrace']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Terrace'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['lift']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Lift'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['garage']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Garage'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['security']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Security'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['high_standard']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='High Standard'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['city_centre']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='City Center'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['furniture']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Furniture'>
			</div>

			</div>
			";
			if($row['another_options'] != ""){
				echo "<div class='form-group row'><b>Other Features:</b><br/>
				<textarea disabled class='form-control'>".$row['another_options']."</textarea>
			</div>";}
			echo "
			<div class='form-group row'>

			<iframe height='170px' width='100%' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q=".$row['latitude'].','.$row['longitude']."&hl=es;z=17&amp;output=embed' > </iframe>
			</div>

			<div class='form-group row'>".MODAL_VIEW_Lead_Property_IMAGES($uniqueid)."</div>

			</div>
			</div>
			</div>
			<!--end::Form-->
			



			";
		}
	}
	close_conn($conn);
}

function MODAL_VIEW_Property($uniqueid){
	$conn = create_conn();
	$sql = "SELECT `property_id`,`property_type`,`name`,`phoneno`,`emailid`,`transaction`,`price`,`area`,`bedrooms`,`bathrooms`,`description`,`air_conditioning`,`Internet`,`cable_tv`,`balcony`,`roof_terrace`,`terrace`,`lift`,`garage`,`security`,`high_standard`,`city_centre`,`furniture`,`another_options`,`longitude`,`latitude`,`timestamp` FROM approved_property_details WHERE property_id = '".$uniqueid."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<!--begin::Form-->
			<div class='modal-body' id='updatemodal'>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Property Type </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cfname' id='cfname' class='form-control' placeholder='Enter first name' value='".$row['property_type']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Transaction </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='clname' id='clname' class='form-control' value='".$row['transaction']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Customer Name </label>
			<div class='col-lg-10'>
			<input type='text' disabled name='cbname' id='cbname' class='form-control' placeholder='Enter buniess name' value='".$row['name']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Phone No </label>
			<div class='col-lg-10'>
			<input type='text' disabled name='cphone' id='cphone' class='form-control' placeholder='Enter mobile number' value='".$row['phoneno']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Email ID</label>
			<div class='col-lg-10'>
			<input type='text' disabled name='cemail' id='cemail' class='form-control' placeholder='Enter email' value='".$row['emailid']."'>
			</div>
			</div>
			
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Description</label>
			<div class='col-lg-10'>
			<textarea disabled class='form-control'>".$row['description']."</textarea>
			</div>
			</div>

			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Price </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cstate' id='cstate' class='form-control' placeholder='Enter state' value='".$row['price']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Area </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cpost' id='cpost' class='form-control' placeholder='Enter post' value='".$row['area']."'>
			</div>
			</div>

			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Bedrooms </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cstate' id='cstate' class='form-control' placeholder='Enter state' value='".$row['bedrooms']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Bathrooms </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='cpost' id='cpost' class='form-control' placeholder='Enter post' value='".$row['bathrooms']."'>
			</div>
			</div>

			<div class='form-group row'>
			<br />
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['air_conditioning']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Air Conditioning'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['Internet']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Internet'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['cable_tv']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Cable TV'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['balcony']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Balcony'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['roof_terrace']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Roof Terrace'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['terrace']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Terrace'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['lift']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Lift'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['garage']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Garage'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['security']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Security'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['high_standard']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='High Standard'>
			</div>
			
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['city_centre']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='City Center'>
			</div>

			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['furniture']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='Furniture'>
			</div>

			</div>
			";
			if($row['another_options'] != ""){
				echo "<div class='form-group row'><b>Other Features:</b><br/>
				<textarea disabled class='form-control'>".$row['another_options']."</textarea>
			</div>";}
			echo "
			<div class='form-group row'>

			<iframe height='170px' width='100%' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q=".$row['latitude'].','.$row['longitude']."&hl=es;z=17&amp;output=embed' > </iframe>
			</div>

			<div class='form-group row'>".MODAL_VIEW_Property_IMAGES($uniqueid)."</div>

			</div>
			</div>
			</div>
			<!--end::Form-->
			



			";
		}
	}
	close_conn($conn);
}

function MODAL_VIEW_Advertise($uniqueid){
	$conn = create_conn();
	$sql = "SELECT `advertise_id`, `advertise_name`, `image_url`, `advertise_status`, `timestamp` FROM `advertise_image_t` WHERE advertise_id = '".$uniqueid."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<!--begin::Form-->
			<div class='modal-body' id='updatemodal'>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Advertise ID </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='aid' id='aid' class='form-control' placeholder='Enter first name' value='".$row['advertise_id']."'>
			</div>
			<label class='col-lg-2 col-form-label'>Advertise Name </label>
			<div class='col-lg-4'>
			<input type='text' disabled name='aname' id='aname' class='form-control' value='".$row['advertise_name']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Advertise Image </label>
			<div class='col-lg-4'>
			<img src='../".$row['image_url']."' style='max-width:100%;'>
			</div>
			<div class='col-lg-4'>
			<input type='text' style='background-color: ";if($row['advertise_status']==0)echo'red';else echo'green'; echo "; color: white;' disabled class='form-control' value='";if($row['advertise_status']==0){echo 'Not Live';}else{echo 'Live';} echo"'>
			<input type='text' disabled name='timestamp' id='timestamp' class='form-control' value='".$row['timestamp']."'>
			</div>
			</div>
			</div>
			</div>
			</div>
			<!--end::Form-->
			";
		}
	}
	close_conn($conn);
}

function MODAL_EDIT_Testimonial_Visibility($uniqueid){
	$conn = create_conn();
	$sql = "SELECT clients_testimonials.testimonials_id, clients_testimonials.user_name, clients_testimonials.user_description, clients_testimonials.timestamp, clients_testimonials.approved, clients_testimonials_images.pic_path FROM clients_testimonials JOIN clients_testimonials_images ON clients_testimonials.testimonials_id = clients_testimonials_images.ct_testimonial_id WHERE clients_testimonials.testimonials_id = '".$uniqueid."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<div class='kt-portlet'>
                    <div class='kt-portlet__body'>
                        <div class='kt-portlet__head-label'>
                            <h3 class='kt-portlet__head-title'>
                                <center><img src='../".$row['pic_path']."' style='height: 100px; width: 100px; border-radius: 50px; ' ;=''></center>
                            </h3>
                        </div>
                    </div>
                    <div class='kt-portlet__head'>
                        <div class='kt-portlet__head-label' style='width: 100%'>
                            <h3 class='kt-portlet__head-title' style='width: 100%; text-align: center;'>
                                ".$row['user_name']."
                            </h3>
                        </div>
                    </div>
                    <div class='kt-portlet__body'>
                        <textarea class='form-control' rows='6' disabled>".$row['user_description']."</textarea>
                    </div>
                </div>

                <div style='text-align: center; margin-bottom: 5px;'>
                	";
                	if($row['approved']==0){
                		echo "<a class='btn button btn-success btn-elevate btn-pill btn-elevate-air' style='color: white;' href='Sec_Api/edit-testimonial-approval.php?testimonial_id=".$row['testimonials_id']."&status=1'>Approve</a>";
                	}	else 	{
                		echo "<a class='btn button btn-danger btn-elevate btn-pill btn-elevate-air' style='color: white;' href='Sec_Api/edit-testimonial-approval.php?testimonial_id=".$row['testimonials_id']."&status=0'>Reject</a>";
                	}
           	echo"</div>";
		}
	}
	close_conn($conn);
}

function MODAL_VIEW_Lead_Property_IMAGES($property_id){
	$conn = create_conn();
	$sql = "SELECT `img_path` FROM lead_property_images WHERE lead_property_id = '".$property_id."'";
	$result = $conn->query($sql);
	$return_path = '';
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$return_path .= '<img class="kt-widget7__img" width="31%" style="margin: 5px;" src="../'.$row['img_path'].'" alt="">';
		}
	}
	return $return_path;
}

function MODAL_VIEW_Property_IMAGES($property_id){
	$conn = create_conn();
	$sql = "SELECT `img_path` FROM approved_property_images WHERE property_id = '".$property_id."'";
	$result = $conn->query($sql);
	$return_path = '';
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$return_path .= '<img class="kt-widget7__img" width="31%" style="margin: 5px;" src="../'.$row['img_path'].'" alt="">';
		}
	}
	return $return_path;
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

function Add_Leads_Details($lname,$laddress,$llocation,$lphone,$lemail,$linquiry,$lstatus,$ltype,$user_id){
	$conn = create_mysqli();
	$sql = "INSERT INTO `leads` (`name`, `address`, `location`, `phoneNo`, `email`, `inquiry_for`, `status`, `type_of_lead`, `user_id`) VALUES ('".$lname."', '".$laddress."', '".$llocation."', '".$lphone."', '".$lemail."','".$linquiry."', '".$lstatus."', '".$ltype."', '".$user_id."');";

	if(mysqli_query($conn, $sql)){
		return 1;

	} else{

		return 0;
	}
	close_mysqli($conn);
}


function MODAL_Edit_Upload_Customer_Data($cfname,$clname,$cbname,$cphone,$cemail,$caddress,$csuburb,$cstate,$cpost,$coption,$cgroup,$cdate,$csdate,$cdamount,$csdamount,$frequency,$cdebit, $uniqueid){

	$conn = create_mysqli();

	if($cgroup != "cuc"){
		$cgroup = $cdebit;
	}
	echo $cdebit;					
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
		echo "<td data-field='View' class='kt-datatable__cell'><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='";
			if(Check_UserPermission('Manage Role', 'user_update', $_SESSION['INFCRM_UserID'])){
				echo "edit-cust-btn";
			}
			echo " la la-edit' data-toggle='modal' id='".$row['user_role_id']."' disabled></i></a></td>";
		echo "<td data-field='Action' class='kt-datatable__cell'><a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='";
			if(Check_UserPermission('Manage Role', 'user_delete', $_SESSION['INFCRM_UserID'])){
				echo "delete-cust-btn";
			}
			echo " la la-trash' id='".$row['user_role_id']."' disabled></i></a></td>";
		echo "</tr>";
	}
}

function Get_Lead_Details(){
	$conn = create_mysqli();

	$sql = "SELECT `lead_no`, `lead_date`, `name`, `address`, `location`, `phoneNo`, `email`, `inquiry_for`, `status`, `type_of_lead`, `user_id` FROM `leads`";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "
			<div class='col-lg-4'>
			<div class='kt-portlet kt-portlet--skin-solid kt-bg-danger'>
			<div class='kt-portlet__head kt-portlet__head--noborder'>
			<div class='kt-portlet__head-label'>
			<span class='kt-portlet__head-icon'>
			<i class='flaticon2-graphic'></i>
			</span>
			<h3 class='kt-portlet__head-title'>
			".$row['name']."
			</h3>
			</div>
			<div class='kt-portlet__head-toolbar'>
			<div class='kt-portlet__head-actions'>
			<a href='https://api.whatsapp.com/send?phone=91".$row['phoneNo']."' class='btn btn-outline-light btn-sm btn-icon btn-icon-md'>
			<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 54 54' width='25px' height='25px'>
			<path style='line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal' d='M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z' font-weight='400' font-family='sans-serif' white-space='normal' overflow='visible'/>
			</svg>
			</a>

			<a href='tel:".$row['phoneNo']."' class='btn btn-outline-light btn-sm btn-icon btn-icon-md'>
			<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='24px' height='24px' viewBox='0 0 24 24' version='1.1' class='kt-svg-icon'>
			<g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
			<rect id='bound' x='0' y='0' width='24' height='24'/>
			<path d='M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z' id='Path-76' fill='#000000'/>
			<path d='M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z' id='Combined-Shape' fill='#000000' fill-rule='nonzero' opacity='0.3'/>
			</g>
			</svg>
			</a>

			<a href='#' class='btn btn-default btn-sm btn-icon btn-icon-md' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
			<i class='flaticon-more-1'></i>
			</a>
			<div class='dropdown-menu dropdown-menu-right'>
			<ul class='kt-nav'>
			<li class='kt-nav__item'>
			<a href='#' class='kt-nav__link'>
			<i class='";
			if(Check_UserPermission('Manage Lead Display', 'user_update', $_SESSION['INFCRM_UserID'])){
			echo "edit-lead-l-btn"; 
			}
			echo " la la-edit' id='".$row['lead_no']."' disabled>
			<span class='kt-nav__link-text'>Edit Details</span>
			</i>
			</a>
			</li>
			<li class='kt-nav__item'>
			<a href='#' class='kt-nav__link'>
			<i class='";
			if(Check_UserPermission('Manage Lead Display', 'user_delete', $_SESSION['INFCRM_UserID'])){
			echo "delete-lead-l-btn"; 
			}
			echo " la la-trash' id='".$row['lead_no']."' disabled></i>
			<span class='kt-nav__link-text'>Delete</span>
			</a>
			</li>
			</ul>
			</div>
			</div>
			</div>
			</div>
			<div class='kt-portlet__body'>
			<div class='kt-form__section kt-form__section--first'>
			<table class='table table-striped- table-hover table-checkable'>
			<thead>
			<tr style='color:white;'>
			<div class='col-md-6'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Name : </b></label>
			</th>
			</div>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['name']." </label>
			</th>
			</div>
			</tr>
			<tr  style='color:white;'>
			<div class='col-md-6'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Address : </b></label>
			</th>
			</div>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['address']." </label>
			</th>
			</tr>
			<tr  style='color:white;'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Location : </b></label>
			</th>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['location']." </label>
			</th>
			</tr>
			<tr  style='color:white;'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Phone No : </b></label>
			</th>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['phoneNo']." </label>
			</th>
			</tr>
			<tr  style='color:white;'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Email : </b></label>
			</th>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['email']." </label>
			</th>
			</tr>
			<tr  style='color:white;'>
			<th>
			<label class='col-lg-25 col-form-label'><b>Inquiry For : </b></label>
			</th>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['inquiry_for']." </label>
			</th>
			</tr>
			<tr  style='color:white;'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Status : </b></label>
			</th>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['status']." </label>
			</th>
			</tr>
			<tr  style='color:white;'>
			<th>
			<label class='col-lg-20 col-form-label'><b>Type Of Lead : </b></label>
			</th>
			<th>
			<label class='col-lg-20 col-form-label'> ".$row['type_of_lead']." </label>
			</th>
			</tr>
			</thead>
			</table>
			</div>
			</div>
			</div>
			</div>";
		}
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
		<td><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='"; 
		if(Check_UserPermission('Manage Lead', 'user_update', $_SESSION['INFCRM_UserID'])){
			echo "edit-lead-btn";
		}
		echo " la la-edit' id='".$row['lead_no']."' disabled></i></a>";
		echo  "<a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='";
		if(Check_UserPermission('Manage Lead', 'user_delete', $_SESSION['INFCRM_UserID'])){
		echo "delete-lead-btn";
		}
		echo " la la-trash' id='".$row['lead_no']."'></i></a></td>
		</tr>";
	} 
}

function Display_Lead_Details(){
	$conn = create_mysqli();
	$sql = "SELECT `lead_no`, `lead_date`, `name`, `address`, `location`, `phoneNo`, `email`, `inquiry_for`, `status`, `type_of_lead`, `user_id` FROM `leads`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>
			<td>".$row['name']."</td>
			<td>".$row['address']."</td>
			<td>".$row['location']."</td>
			<td>".$row['phoneNo']."</td>
			<td>".$row['email']."</td>
			<td>".$row['inquiry_for']."</td>
			<td>".$row['status']."</td>
			<td>".$row['type_of_lead']."</td>
			<td><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='edit-lead-l-btn la la-edit' id='".$row['lead_no']."'></i></a>";
			echo "<a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='delete-lead-l-btn la la-trash' id='".$row['lead_no']."'></i></a></td>
			</tr>";
		}
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

function MODAL_EDIT_Testimonial_Approval($testimonials_id, $status){
	$conn = create_mysqli();
	$sql = "UPDATE clients_testimonials SET approved = $status WHERE testimonials_id = '$testimonials_id'";
	if(mysqli_query($conn,$sql))
	{
		close_mysqli($conn);
		return 1;
	}
	else
	{
		close_mysqli($conn);
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
		echo "<td data-field='View' class='kt-datatable__cell'><a title='Edit details' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='";
			if(Check_UserPermission('Manage Role', 'user_update', $_SESSION['INFCRM_UserID'])){
				echo "edit-per-btn";
			}
			echo " la la-edit' data-toggle='modal' id='".$row['user_role_pr_id']."' disabled></i></a></td>";
		echo "<td data-field='Action' class='kt-datatable__cell'><a title='Delete' class='btn btn-sm btn-clean btn-icon btn-icon-md'><i class='";
			if(Check_UserPermission('Manage Role', 'user_delete', $_SESSION['INFCRM_UserID'])){
				echo "delete-user-btn";
			}
			echo " la la-trash' id='".$row['user_role_pr_id']."' disabled></i></a></td>";
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

function MODAL_Delete_Manage_Lead($urid){
	$conn = create_conn();
	$sql = "DELETE FROM leads WHERE lead_no = $urid";
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
			<form  class='kt-form' method='POST' action='manage_lead.php' name='edit_leads_frm' id='edit_leads_frm'>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Name </label>
			<div class='col-lg-6'>
			<input type='text' name='ldname' id='ldname' class='form-control' placeholder='Enter name' value='".$row['name']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Address </label>
			<div class='col-lg-10'>
			<input type='text' name='ldaddress' id='ldaddress' class='form-control' placeholder='Enter address' value='".$row['address']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Location </label>
			<div class='col-lg-10'>
			<input type='text' name='ldlocation' id='ldlocation' class='form-control' placeholder='Enter location' value='".$row['location']."'>
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
			<input type='Email' name='ldinquiry' id='ldinquiry' class='form-control' placeholder='Enter Inquiry' value='".$row['inquiry_for']."'>
			</div>
			</div>
			<div class='form-group row'>
			<label class='col-lg-2 col-form-label'>Date </label>
			<div class='col-lg-10'>
			<input type='Date' name='lddate' id='lddate' class='form-control' placeholder='Enter date' value=".$row['lead_date'].">
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
			</form>
			<div class='kt-form__actions'>
			<div class='row'>
			<div class='col-lg-9'></div>
			<div class='col-lg-3'>
			<div class='modal-footer'>
			<a class='btn btn-success update-lead-btn' form='edit_leads_frm' style='color: white;'>Submit</a>
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

function Property_GenerateSlug($string, $wordLimit = 0){
    $separator = '-';
    if($wordLimit != 0){
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }
    $quoteSeparator = preg_quote($separator, '#');
    $trans = array(
        '&.+?;'                    => '',
        '[^\w\d _-]'            => '',
        '\s+'                    => $separator,
        '('.$quoteSeparator.')+'=> $separator
    );
    $string = strip_tags($string);
    foreach ($trans as $key => $val){
        $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
    }
    $string = strtolower($string);
    return trim(trim($string, $separator));
}

function Manage_Property_Edit($property_id){
	$conn = create_conn();
	$sql = "SELECT * FROM approved_property_details WHERE property_id = $property_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	}
	close_mysqli($conn);
	return $row;
}

function Manage_Property_Image_Edit($property_id){
	$img = array();
	$conn = create_conn();
	$sql = "SELECT img_path FROM approved_property_images WHERE property_id = $property_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			array_push($img,$row['img_path']);
		}
	}
	//$row['count'] = $result->num_rows;
	close_mysqli($conn);
	return $img;
}

function Property_Details_UPDATE($propertytype,$transaction,$price,$area,$bedrooms,$bathroms,$message,$cc1,$cc2,$cc3,$cc4,$cc5,$cc6,$cc7,$cc8,$cc9,$cc10,$cc11,$cc12,$cc13,$cc14,$name, $phoneno, $emailid, $property_address, $property_id,$files){
	for($i=1; $i<=12; $i++){
		$f = 'cc'.$i;
		if(${$f} == "on")
			${$f} = 1;
		else
			${$f} = 0;
	}
	
	$conn = create_mysqli();
	// $promoText = Shorter_Text($message, 127);
	// $generatedSlug = Property_GenerateSlug($property_address);
	$sql = "UPDATE approved_property_details SET property_type = '$propertytype', transaction = '$transaction', price = '$price', area = '$area', bedrooms = '$bedrooms', bathrooms = '$bathroms', description = '$message', air_conditioning = $cc1, Internet = $cc2, cable_tv = $cc3, balcony = $cc4, roof_terrace = $cc5, terrace = $cc6, lift = $cc7, garage = $cc8, security = $cc9, high_standard = $cc10, city_centre = $cc11, furniture = $cc12, another_options = '$cc14', name = '$name', phoneno = '$phoneno', emailid = '$emailid', address = '$property_address' WHERE property_id = $property_id";

	if(mysqli_query($conn, $sql)){
		$lastid = mysqli_insert_id($conn);
		if($files != NULL){
			//echo "init";
			lead_property_images_file_UPLOAD($property_id,$files);
		}
		close_mysqli($conn);
		return 1;
	} else{
		close_mysqli($conn);
		return 0;
	}
	
}

function lead_property_images_file_UPLOAD($propertyid,$files){
	$pic_path = $files["new_pics"];
	// var_dump($pic_path);
	$img_path = array();
	for($i=0; $i<count($files["new_pics"]["name"]); $i++){

		$target_dir = "uploads/lead-property-images/";
		$uid_name = md5(uniqid(rand(), true));
		//$uid_name .= basename($pic_path["name"][$i]);
		$target_file = $target_dir . $uid_name . "." . strtolower(pathinfo($pic_path["name"][$i],PATHINFO_EXTENSION));
		$imageFileType = $pic_path["type"][$i];
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		$check = getimagesize($pic_path["tmp_name"][$i]);
		if($pic_path['name'][$i] !== false) {
		// echo "File is an image - " . $check["mime"] . ".";
		} else {
			// echo "File is not an image.";
			return 1;
		}
		if ($pic_path['size'][$i] > 2048000) {
			// echo "Sorry, your file is too large.";
			return 2;
		}
		//var_dump($target_file);
		if($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg") {
			// echo "Sorry, only JPG, JPEG, PNG files are allowed.";
			return 3;
			$uploadOk = 0;
		}
		if (move_uploaded_file($pic_path["tmp_name"][$i], "../".$target_file)) {
			$img_path[$i] = $target_file;
		} else {
			// echo "Sorry, there was an error uploading your file.";
			return 4;
		}
	}
	lead_property_images_update_db($propertyid, $img_path);
}

function lead_property_images_update_db($propertyid, $img_array){
	$conn = create_mysqli();
	for($i=0; $i<count($img_array); $i++){
		$sql = "INSERT INTO `approved_property_images` (`property_id`, `img_path`) VALUES ('$propertyid','$img_array[$i]');";
		//var_dump($sql);
		if(mysqli_query($conn, $sql)){
		} 
		else{
			return 0;
		}
	}
	close_mysqli($conn);
}

function removePropertyImage($getData){
	$conn = create_mysqli();
	$img = $getData['img'];
	$sql = "DELETE FROM approved_property_images WHERE img_path LIKE '$img'";
	if(mysqli_query($conn, $sql)){
		close_mysqli($conn);
		header('location: ../manage_property.php?property='.$getData['property']);
	}
	close_mysqli($conn);
}

function addAdvertise($postData,$fileData){
	$conn = create_mysqli();
	$pic_path = $fileData['advertise_image'];
	///var_dump($pic_path);
	$i = 0;
	$target_dir = "images/ads/";
	$uid_name = md5(uniqid(rand(), true));
	//$uid_name .= basename($pic_path["name"][$i]);
	$target_file = $target_dir . $uid_name . "." . strtolower(pathinfo($pic_path["name"][$i],PATHINFO_EXTENSION));
	$imageFileType = $pic_path["type"][$i];
	// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	$check = getimagesize($pic_path["tmp_name"][$i]);
	if($pic_path['name'][$i] == false) {
	   
		echo "File is not an image.";
		return 1;
	}
	if ($pic_path['size'][$i] > 2048000) {
		echo "Sorry, your file is too large.";
		return 2;
	}
	//var_dump($target_file);
	if($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg") {
		echo "Sorry, only JPG, JPEG, PNG files are allowed.";
		return 3;
		$uploadOk = 0;
	}
	if (move_uploaded_file($pic_path["tmp_name"][$i], "../../".$target_file)) {
		$img_path[$i] = $target_file;
	} else {
		echo "Sorry, there was an error uploading your file.";
		return 4;
	}
	$sql = "INSERT INTO `advertise_image_t`(`advertise_name`, `image_url`, `advertise_status`) VALUES ('".$postData['advertise_name']."','$img_path[$i]',0)";
	//echo $sql;
	if(mysqli_query($conn, $sql)){
		close_mysqli($conn);
		return 0;
	}
	else{
		return 5;
	}
}
//Function goes here ...
?>