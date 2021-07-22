<?php
$sys_path = $_SERVER["DOCUMENT_ROOT"].'/inf_admin/base/db_conn.php';
include_once($sys_path);

function fetchLocID($postcode,$city,$state){
	$conn = create_mysqli();
	$sql = "SELECT id FROM `infraveo_australia_db` WHERE postcode = '$postcode' AND suburb LIKE \"$city\" AND state LIKE \"$state\"";
	//echo $sql; exit;
	$result = mysqli_query($conn,$sql);
	 
	$row = $result->fetch_assoc();
	return $row['id'];
}

function lead_property_details_UPLOAD($propertytype,$transaction,$add1,$add2,$state,$suburb,$price,$area,$bedrooms,$bathroms,$message,$cc1,$cc2,$cc3,$cc4,$cc5,$cc6,$cc7,$cc8,$cc9,$cc10,$cc11,$cc12,$cc13,$cc14,$cc15,$cc16,$cc17,$cc18,$lng,$lat,$name, $phoneno, $emailid){

	for($i=1; $i<=12; $i++){
		$f = 'cc'.$i;
		if(${$f} == "on")
			${$f} = 1;
		else
			${$f} = 0;
	}
	//echo $suburb;
	list($city,$postcode) = explode(", ",$suburb);
	$property_address = $add1.",".$add2.",".$city.",".$state." - ".$postcode;
	//var_dump($property_address);
	$conn = create_mysqli();
	$loc_id = fetchLocID($postcode,$city,$state);
	$generatedSlug = Property_GenerateSlug($property_address);
	$promoText = Shorter_Text($message, 127);
	$sql = "INSERT INTO `lead_property_details` (`property_id`, `property_type`, `transaction`, `price`, `area`, `bedrooms`, `bathrooms`, `description`, `air_conditioning`, `Internet`, `cable_tv`, `balcony`, `roof_terrace`, `terrace`, `lift`, `garage`, `security`, `high_standard`, `city_centre`, `furniture`, `longitude`, `latitude`, `name`, `phoneno`, `emailid`, `another_options`, `address`, `loc_id`, `slug`, `home_promo_text`) VALUES (NULL,'".$propertytype."','".$transaction."','".$price."','".$area."','".$bedrooms."','".$bathroms."','".$message."','".$cc1."','".$cc2."','".$cc3."','".$cc4."','".$cc5."','".$cc6."','".$cc7."','".$cc8."','".$cc9."','".$cc10."','".$cc11."','".$cc12."','".$lng."','".$lat."','$name','$phoneno','$emailid', '$cc14', '$property_address', $loc_id, '$generatedSlug', '$promoText')";
	//var_dump($sql);
	if(mysqli_query($conn, $sql)){
		
		$lastid = mysqli_insert_id($conn);
		
		lead_property_images_file_UPLOAD($lastid);

		close_mysqli($conn);
		return 1;
	} else{
		close_mysqli($conn);
		return 0;
	}
	
}

function lead_property_images_file_UPLOAD($propertyid){
	$pic_path = $_FILES["mimages"];
	$img_path = array();
	for($i=0; $i<count($_FILES["mimages"]["name"]); $i++){

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
		if (move_uploaded_file($pic_path["tmp_name"][$i], $target_file)) {
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
		$sql = "INSERT INTO `lead_property_images` (`lead_property_id`, `img_path`) VALUES ('$propertyid','$img_array[$i]');";	
		if(mysqli_query($conn, $sql)){
		} 
		else{
			return 0;
		}
	}
	close_mysqli($conn);
}

function guest_document_form_UPLOAD($name, $mobile, $email, $formtype, $form){
	// $conn = create_mysqli();
	// $sql = "INSERT INTO `guest_document_form` () VALUES ('$name','$mobile','$email','$formtype','')";
	// var_dump($_POST);
	$conn = create_mysqli();
	$sql = "INSERT INTO `lead_guest_document_details` (`guest_doc_id`, `guest_name`, `guest_mobile`, `guest_email`, `guest_form_type`) VALUES (NULL,'$name','$mobile','$email','$formtype');";
	
	if(mysqli_query($conn, $sql)){
		$lastid = mysqli_insert_id($conn);
		return guest_document_form_pdf_UPLOAD($lastid);
	} else{
		return 0;
	}
	close_mysqli($conn);
	
}

function guest_document_form_pdf_UPLOAD($document_id){
	// var_dump($_FILES);
	// echo count($_FILES["formupload"]["name"]);
	$file_path = $_FILES["formupload"];
	$final_path = array();
	for($i=0; $i<count($_FILES["formupload"]["name"]); $i++){

		$target_dir = "uploads/guest-document-form/";
		$uid_name = md5(uniqid(rand(), true));
		$uid_name .= basename($file_path["name"][$i]);
		$target_file = $target_dir . $uid_name;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		// $check = getimagesize($file_path["tmp_name"][$i]);
		if($file_path['name'][$i] !== false) {
		// echo "File is an image - " . $check["mime"] . ".";
		} else {
			//echo "File is not an image.";
			return 1;
		}
		if ($file_path['size'][$i] > 10240000) {
			//echo "Sorry, your file is too large.";
			return 2;
		}
		if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "xls") {
			//echo "Sorry, only JPG, JPEG, PNG files are allowed.";
			//doc,pdf,docx,xls
			return 3;
			$uploadOk = 0;
		}
		if (move_uploaded_file($file_path["tmp_name"][$i], $target_file)) {
			$final_path[$i] = $target_file;
		} else {
			//echo "Sorry, there was an error uploading your file.";
			return 4;
		}
	}
	return guest_document_form_pdf_UPLOAD_db($document_id, $final_path);
}

function guest_document_form_pdf_UPLOAD_db($document_id, $file_path){
	$conn = create_mysqli();
	for($i=0; $i<count($file_path); $i++){
		$sql = "INSERT INTO `lead_guest_documents_path` (`guest_doc_id`, `guest_document_path`) VALUES ('$document_id','$file_path[$i]');";	
		if(mysqli_query($conn, $sql)){
			return "success";
		} 
		else{
			return 0;
		}
	}
	close_mysqli($conn);
}

function user_registration_master($firstname, $lastname, $email, $password, $repassword){
	$conn = create_mysqli();
	echo $sql = "INSERT INTO `user_master` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_confirm_password`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$repassword');";	
	if(mysqli_query($conn, $sql)){
	} 
	else{
		return 0;
	}
	close_mysqli($conn);
}

function request_a_service_form_submit($cc1, $cc2, $cc3, $cc4, $cc5, $cc6, $lng, $lat, $person_name, $phone_no, $email_id, $last_name, $property_type){

	for($i=1; $i<=4; $i++){
		$f = 'cc'.$i;
		if(${$f} == "on")
			${$f} = 1;
		else
			${$f} = 0;
	}

	$conn = create_mysqli();
	$sql = "INSERT INTO `request_service_leads` (`request_id`, `person_name`, `phone_no`, `email_id`, `Free_Property_Valuation`, `Property_Mortgage_Health_Check`, `Rental_Property_Inspection`, `Free_Rental_Appraisal`, `communicationMethod`, `longitude`, `latitude`, `last_name`, `property_type`) VALUES (NULL,'$person_name','$phone_no','$email_id','$cc1','$cc2','$cc3','$cc4','$cc5','$lng','$lat','$last_name','$property_type');";
	
	if(mysqli_query($conn, $sql)){
		$lastid = mysqli_insert_id($conn);
		return 1;
	} else{
		return 0;
	}
	close_mysqli($conn);
}


function client_testimonial_UPLOAD($cc1,$cc2){
	
	
	$conn = create_mysqli();
	$sql = "INSERT INTO `clients_testimonials` (`user_name`, `user_description`) VALUES ('$cc1', '$cc2');";
	
	if(mysqli_query($conn, $sql)){
		
		$lastid = mysqli_insert_id($conn);
		client_testimonial_images_file_UPLOAD($lastid);
		close_mysqli($conn);
		return 1;
	} else{
		close_mysqli($conn);
		return 0;
	}
	
}

function client_testimonial_images_file_UPLOAD($testimonial_ID){
	$pic_path = $_FILES["mimages"];
	$img_path = array();
	for($i=0; $i<count($_FILES["mimages"]["name"]); $i++){

		$target_dir = "uploads/client-testimonials/profile/";
		$uid_name = md5(uniqid(rand(), true));
		$uid_name .= basename($pic_path["name"][$i]);
		$target_file = $target_dir . $uid_name;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		$check = getimagesize($pic_path["tmp_name"][$i]);
		if($pic_path['name'][$i] !== false) {
		// echo "File is an image - " . $check["mime"] . ".";
		} else {
			//echo "File is not an image.";
			return 1;
		}
		if ($pic_path['size'][$i] > 2048000) {
			//echo "Sorry, your file is too large.";
			return 2;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			//echo "Sorry, only JPG, JPEG, PNG files are allowed.";
			return 3;
			$uploadOk = 0;
		}
		if (move_uploaded_file($pic_path["tmp_name"][$i], $target_file)) {
			$img_path[$i] = $target_file;
		} else {
			//echo "Sorry, there was an error uploading your file.";
			return 4;
		}
	}
	client_testimonial_images_update_db($testimonial_ID, $img_path);
}

function client_testimonial_images_update_db($testimonial_ID, $img_array){
	$conn = create_mysqli();
	for($i=0; $i<count($img_array); $i++){
		$sql = "INSERT INTO `clients_testimonials_images` (`ct_testimonial_id`, `pic_path`) VALUES ('$testimonial_ID','$img_array[$i]');";	
		if(mysqli_query($conn, $sql)){
		} 
		else{
			return 0;
		}
	}
	close_mysqli($conn);
}

function CheckNoOfTestimonials(){
	$conn = create_conn();
	$sql = "SELECT `testimonials_id` FROM `clients_testimonials` WHERE approved = 1";
	if ($result=mysqli_query($conn,$sql))
	{
		$rowcount=mysqli_num_rows($result);
		mysqli_free_result($result);
	}
	close_mysqli($conn);
	return $rowcount;
}

function PrintTestimonials(){
	$conn = create_conn();
	$sql = "SELECT clients_testimonials.testimonials_id, clients_testimonials.user_name, clients_testimonials.user_description, clients_testimonials.timestamp, clients_testimonials.approved, clients_testimonials_images.pic_path FROM clients_testimonials JOIN clients_testimonials_images ON clients_testimonials.testimonials_id = clients_testimonials_images.ct_testimonial_id WHERE clients_testimonials.approved = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<div class='testimonial'>
				<img width='472px' height='338px' src='".$row['pic_path']."' alt='' class='testimonials-photo' />	
				<div class='testimonials-content'>
					<p class='lead'>".$row['user_name']."</p>
					<p>".$row['user_description']."</p>
					<div class='big-triangle'>							
					</div>
					<div class='big-icon'><i class='fa fa-quote-right fa-lg'></i></div>
				</div>
			</div>";
		}
	}
	close_mysqli($conn);
}

function PropertyPage_GetProperty($given_slug){
	$conn = create_conn();
	$sql = "SELECT * FROM approved_property_details WHERE slug = '$given_slug'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	}
	if($row){
		$sql = "SELECT img_path FROM approved_property_images WHERE property_id = ".$row['property_id'];
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$images_path[] = '';
			$i=0;
			while($row_img = $result->fetch_assoc()) {
				$images_path[$i] = $row_img['img_path'];
				$i++;
			}
		}
		$row['images'] = $images_path;
	}
	close_mysqli($conn);
	if($row){
		return $row;
	}	else 	{
		return 0;
	}
}

function GetTotalPropertyCount($getvalues){
	$conn = create_conn();
	if(isset($getvalues['frm'])){
		if($getvalues['frm'] != '' || $getvalues['frm'] != NULL){
			if($getvalues['frm'] == "frm_apt"){
				$transaction = $getvalues['transaction1'];
				$pricerange = $getvalues['slider-range-price1-value'];
				$arearange = $getvalues['slider-range-area1-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms1-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms1-value'];
				$propertytype = "Apartment";
				
			}
			else if($getvalues['frm'] == "frm_hs"){
				$transaction = $getvalues['transaction2'];
				$pricerange = $getvalues['slider-range-price2-value'];
				$arearange = $getvalues['slider-range-area2-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms2-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms2-value'];
				$propertytype = "House";
				// $country = $getvalues['country1'];
				// $city = $getvalues['city1'];
				// $pricerange = $getvalues['slider-range-price1-value'];
				// $arearange = $getvalues['slider-range-area1-value'];
				// $bedroomrange = $getvalues['slider-range-bedrooms1-value'];
				// $bathroomrange = $getvalues['slider-range-bathrooms1-value'];
				// if(isset($getvalues['sort'])){$sort = $getvalues['sort'];}
				// else{$sort = 'price_asc';}
				// if($sort=='price_asc'){$sort = 'price ASC';}
				// elseif($sort=='price_desc'){$sort = 'price DESC';}
				// elseif($sort=='area_asc'){$sort = 'area ASC';}
				// elseif($sort=='area_desc'){$sort = 'area DESC';}
				// if($city!="" && $city!=NULL){
				// 	list($city,$postcode) = explode("|",$city);
				// 	$loc_id = fetchLocID($postcode,$city,$country);
				// }
				// else{$loc_id="";}
				// list($pricestart,$priceend) = explode(" - ",$pricerange);
				// list($areastart,$areaend) = explode(" - ",$arearange);
				// list($bedroomstart,$bedroomend) = explode(" - ",$bedroomrange);
				// list($bathroomstart,$bathroomend) = explode(" - ",$bathroomrange);
				//var_dump($loc_id);
				// $sql = "SELECT a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction LIKE '%$transaction%'";
				// if($loc_id!="" && $loc_id!=NULL){
				// 	$sql .= "AND a.loc_id = $loc_id";
				// }
				// $sql .= " AND a.price BETWEEN $pricestart AND $priceend AND a.area BETWEEN $areastart AND $areaend AND a.bedrooms BETWEEN $bedroomstart AND $bedroomend AND a.bathrooms BETWEEN $bathroomstart AND $bathroomend ORDER BY a.$sort LIMIT $limit_start,$limit_end";
				//echo $sql;
			}
			else if($getvalues['frm'] == "frm_ths"){
				$transaction = $getvalues['transaction3'];
				$pricerange = $getvalues['slider-range-price3-value'];
				$arearange = $getvalues['slider-range-area3-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms3-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms3-value'];
				$propertytype = "Town House";
				
			}
			else if($getvalues['frm'] == "frm_lds"){
				$transaction = $getvalues['transaction4'];
				$pricerange = $getvalues['slider-range-price4-value'];
				$arearange = $getvalues['slider-range-area4-value'];
				$bedroomrange = "0 - 10";
				$bathroomrange = "0 - 10";
				$propertytype = "Land";
				
			}
			else if($getvalues['frm'] == "frm_uts"){
				$transaction = $getvalues['transaction5'];
				$pricerange = $getvalues['slider-range-price5-value'];
				$arearange = $getvalues['slider-range-area5-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms5-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms5-value'];
				$propertytype = "Unit";
				
			}
			$country = $getvalues['country1'];
			$city = $getvalues['typeahead'];
			if(isset($getvalues['sort'])){$sort = $getvalues['sort'];}
			else{$sort = 'price_asc';}
			if($sort=='price_asc'){$sort = 'price ASC';}
			elseif($sort=='price_desc'){$sort = 'price DESC';}
			elseif($sort=='area_asc'){$sort = 'area ASC';}
			elseif($sort=='area_desc'){$sort = 'area DESC';}
			if($city!="" && $city!=NULL){
				list($city,$postcode) = explode(", ",$city);
				$loc_id = fetchLocID($postcode,$city,$country);
			}
			else{$loc_id="";}
			list($pricestart,$priceend) = explode(" - ",$pricerange);
			list($areastart,$areaend) = explode(" - ",$arearange);
			list($bedroomstart,$bedroomend) = explode(" - ",$bedroomrange);
			list($bathroomstart,$bathroomend) = explode(" - ",$bathroomrange);
			//var_dump($loc_id);
			if($transaction == "Any"){$transaction = "";}
			$sql = "SELECT COUNT(*) FROM approved_property_details AS a WHERE is_live = 1 AND a.property_type='$propertytype' AND a.transaction LIKE '%$transaction%'";
			if($loc_id!="" && $loc_id!=NULL){
				$sql .= "AND a.loc_id = $loc_id";
			}
			$sql .= " AND a.price BETWEEN $pricestart AND $priceend AND a.area BETWEEN $areastart AND $areaend AND a.bedrooms BETWEEN $bedroomstart AND $bedroomend AND a.bathrooms BETWEEN $bathroomstart AND $bathroomend";
			//echo $sql;
		}
	}
	else{
		$sql = "SELECT COUNT(*) FROM `approved_property_details` WHERE is_live = 1";
	}
	$result = $conn->query($sql);
	$count = $result->fetch_assoc();
	return $count['COUNT(*)'];
}

function GetAvailablePropertyFiltered($page_no,$getvalues){
	if($page_no == ""){$page_no = 1;}
	$limit_end = ($page_no*12);
	$limit_start = $limit_end-12;
	$conn = create_conn();
	if(isset($getvalues['sort'])){$sort = $getvalues['sort'];}
	else{$sort = 'price_asc';}
	if($sort=='price_asc'){$sort = 'price END ASC';}
	elseif($sort=='price_desc'){$sort = 'price END DESC';}
	elseif($sort=='area_asc'){$sort = 'area END ASC';}
	elseif($sort=='area_desc'){$sort = 'area END DESC';}
	if(isset($getvalues['frm'])){
		if($getvalues['frm'] != '' || $getvalues['frm'] != NULL){
			if($getvalues['frm'] == "frm_apt"){
				$transaction = $getvalues['transaction1'];
				$pricerange = $getvalues['slider-range-price1-value'];
				$arearange = $getvalues['slider-range-area1-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms1-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms1-value'];
				$propertytype = "Apartment";
				
			}
			else if($getvalues['frm'] == "frm_hs"){
				$transaction = $getvalues['transaction2'];
				$pricerange = $getvalues['slider-range-price2-value'];
				$arearange = $getvalues['slider-range-area2-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms2-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms2-value'];
				$propertytype = "House";
				// $country = $getvalues['country1'];
				// $city = $getvalues['city1'];
				// $pricerange = $getvalues['slider-range-price1-value'];
				// $arearange = $getvalues['slider-range-area1-value'];
				// $bedroomrange = $getvalues['slider-range-bedrooms1-value'];
				// $bathroomrange = $getvalues['slider-range-bathrooms1-value'];
				// if(isset($getvalues['sort'])){$sort = $getvalues['sort'];}
				// else{$sort = 'price_asc';}
				// if($sort=='price_asc'){$sort = 'price ASC';}
				// elseif($sort=='price_desc'){$sort = 'price DESC';}
				// elseif($sort=='area_asc'){$sort = 'area ASC';}
				// elseif($sort=='area_desc'){$sort = 'area DESC';}
				// if($city!="" && $city!=NULL){
				// 	list($city,$postcode) = explode("|",$city);
				// 	$loc_id = fetchLocID($postcode,$city,$country);
				// }
				// else{$loc_id="";}
				// list($pricestart,$priceend) = explode(" - ",$pricerange);
				// list($areastart,$areaend) = explode(" - ",$arearange);
				// list($bedroomstart,$bedroomend) = explode(" - ",$bedroomrange);
				// list($bathroomstart,$bathroomend) = explode(" - ",$bathroomrange);
				//var_dump($loc_id);
				// $sql = "SELECT a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction LIKE '%$transaction%'";
				// if($loc_id!="" && $loc_id!=NULL){
				// 	$sql .= "AND a.loc_id = $loc_id";
				// }
				// $sql .= " AND a.price BETWEEN $pricestart AND $priceend AND a.area BETWEEN $areastart AND $areaend AND a.bedrooms BETWEEN $bedroomstart AND $bedroomend AND a.bathrooms BETWEEN $bathroomstart AND $bathroomend ORDER BY a.$sort LIMIT $limit_start,$limit_end";
				//echo $sql;
			}
			else if($getvalues['frm'] == "frm_ths"){
				$transaction = $getvalues['transaction3'];
				$pricerange = $getvalues['slider-range-price3-value'];
				$arearange = $getvalues['slider-range-area3-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms3-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms3-value'];
				$propertytype = "Town House";
				
			}
			else if($getvalues['frm'] == "frm_lds"){
				$transaction = $getvalues['transaction4'];
				$pricerange = $getvalues['slider-range-price4-value'];
				$arearange = $getvalues['slider-range-area4-value'];
				$bedroomrange = "0 - 10";
				$bathroomrange = "0 - 10";
				$propertytype = "Land";
				
			}
			else if($getvalues['frm'] == "frm_uts"){
				$transaction = $getvalues['transaction5'];
				$pricerange = $getvalues['slider-range-price5-value'];
				$arearange = $getvalues['slider-range-area5-value'];
				$bedroomrange = $getvalues['slider-range-bedrooms5-value'];
				$bathroomrange = $getvalues['slider-range-bathrooms5-value'];
				$propertytype = "Unit";
				
			}
			$country = $getvalues['country1'];
			$city = $getvalues['typeahead'];
			if(isset($getvalues['sort'])){$sort = $getvalues['sort'];}
			else{$sort = 'price_asc';}
			if($sort=='price_asc'){$sort = 'price ASC';}
			elseif($sort=='price_desc'){$sort = 'price DESC';}
			elseif($sort=='area_asc'){$sort = 'area ASC';}
			elseif($sort=='area_desc'){$sort = 'area DESC';}
			if($city!="" && $city!=NULL){
				list($city,$postcode) = explode(", ",$city);
				$loc_id = fetchLocID($postcode,$city,$country);
			}
			else{$loc_id="";}
			list($pricestart,$priceend) = explode(" - ",$pricerange);
			list($areastart,$areaend) = explode(" - ",$arearange);
			list($bedroomstart,$bedroomend) = explode(" - ",$bedroomrange);
			list($bathroomstart,$bathroomend) = explode(" - ",$bathroomrange);
			//var_dump($loc_id);
			if($transaction == "Any"){$transaction = "";}
			$sql = "SELECT a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.property_type='$propertytype' AND a.transaction LIKE '%$transaction%'";
			if($loc_id!="" && $loc_id!=NULL){
				$sql .= "AND a.loc_id = $loc_id";
			}
			$sql .= " AND a.price BETWEEN $pricestart AND $priceend AND a.area BETWEEN $areastart AND $areaend AND a.bedrooms BETWEEN $bedroomstart AND $bedroomend AND a.bathrooms BETWEEN $bathroomstart AND $bathroomend ORDER BY a.$sort LIMIT $limit_start,$limit_end";
			//echo $sql;
		}
	}
	else{
		$sql = "SELECT * FROM (SELECT 1 resultSet, a.is_live, a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction LIKE '%FOR RENT%' OR a.transaction LIKE '%FOR SALE%' UNION SELECT 2 resultSet, a.is_live, a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction NOT LIKE '%FOR RENT%' AND a.transaction NOT LIKE '%FOR SALE%') listingsSorted  WHERE is_live = 1 ORDER BY resultSet, CASE resultSet WHEN 1 THEN $sort, CASE resultSet WHEN 2 THEN $sort LIMIT $limit_start,$limit_end";
		//echo $sql;
	}
	$result = $conn->query($sql);
	$propertyList[] = '';
	$i =  0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//Fetching single image for the Property
			$sql2 = "SELECT img_path FROM approved_property_images WHERE property_id = ".$row['property_id']." LIMIT 1";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				$row2 = $result2->fetch_assoc();
				$row['image_path'] = $row2['img_path'];
			}	else 	{
				$row['image_path'] = '{{DEFAULT_PROPERTY_IMAGE}}';
			}
			$propertyList[$i] = $row;
			$i++;
		}
	}
	close_mysqli($conn);
	if($propertyList[0] != NULL OR $propertyList[0] != ''){
		return $propertyList;
	}	else 	{
		return 0;
	}
}

function GetAvailableProperty($limit = 50){
	$conn = create_conn();
	$sql = "SELECT a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction LIKE '%FOR RENT%' OR a.transaction LIKE '%FOR SALE%' ORDER BY a.price ASC";
	$result = $conn->query($sql);
	$propertyList[] = '';
	$i =  0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($limit <= 0){break;}
			//Fetching single image for the Property
			$sql2 = "SELECT img_path FROM approved_property_images WHERE property_id = ".$row['property_id']." LIMIT 1";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				$row2 = $result2->fetch_assoc();
				$row['image_path'] = $row2['img_path'];
			}	else 	{
				$row['image_path'] = '{{DEFAULT_PROPERTY_IMAGE}}';
			}
			$propertyList[$i] = $row;
			$limit--;
			$i++;
		}
	}
	$sql = "SELECT a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction NOT LIKE '%FOR RENT%' AND a.transaction NOT LIKE '%FOR SALE%' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($limit <= 0){break;}
			//Fetching single image for the Property
			$sql2 = "SELECT img_path FROM approved_property_images WHERE property_id = ".$row['property_id']." LIMIT 1";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				$row2 = $result2->fetch_assoc();
				$row['image_path'] = $row2['img_path'];
			}	else 	{
				$row['image_path'] = '{{DEFAULT_PROPERTY_IMAGE}}';
			}
			$propertyList[$i] = $row;
			$limit--;
			$i++;
		}
	}
	close_mysqli($conn);
	if($propertyList[0] != NULL OR $propertyList[0] != ''){
		return $propertyList;
	}	else 	{
		return 0;
	}
}

function ADMIN_postedJobs_pagination($currentPage, $limit, $getvalues){
	$conn = create_conn();
	if($currentPage == ""){$currentPage=1;}
	$getquery='';
	foreach($getvalues as $key => $value){if($key!='page'){$getquery .= "&$key=$value";}}
	$total_records = GetTotalPropertyCount($getvalues);
    $total_pages = ceil($total_records / $limit);
    if($currentPage == 1){
        $DECREASEpage = 1;
    }    else     {
        $DECREASEpage = $currentPage - 1;
    }
    if($currentPage == $total_pages){
        $INCREASEpage = $total_pages;
    }    else     {
        $INCREASEpage = $currentPage + 1;
	}
	if($total_pages<7){
		for($i=1; $i<=$total_pages; $i++){
			//if($i=0){$i++;}
			if($currentPage == $i){
				echo "<a href='?page=$i$getquery' class='active'>";
			}    else {
				echo "<a href='?page=$i$getquery'>";
			}
			echo $i;
			echo "</a>";
		}
	}
	else{
		if($currentPage<4){
			if($currentPage!=1){
				if($currentPage==3){
					echo "<a href='?page=1$getquery'>1</a>";
					echo "<a href='?page=$DECREASEpage$getquery'>$DECREASEpage</a>";
				}
				else{
					echo "<a href='?page=$DECREASEpage$getquery'>$DECREASEpage</a>";
				}
			}
			echo "<a href='?page=$currentPage$getquery' class='active'>$currentPage</a>";
			echo "<a href='?page=$INCREASEpage$getquery'>$INCREASEpage</a>";
			echo "....<a href='?page=$total_pages$getquery' class='next'>$total_pages</a>";
		}
		else if($currentPage>($total_pages-2)){
			echo "<a href='?page=1$getquery' class='prev'>1</a>....";
			echo "<a href='?page=$DECREASEpage$getquery'>$DECREASEpage</a>";
			echo "<a href='?page=$currentPage$getquery' class='active'>$currentPage</a>";
			if($currentPage!=$total_pages){
				echo "<a href='?page=$INCREASEpage$getquery'>$INCREASEpage</a>";
			}
		}
		else{
			echo "<a href='?page=1$getquery' class='prev'>1</a>....";
			echo "<a href='?page=$DECREASEpage$getquery'>$DECREASEpage</a>";
			echo "<a href='?page=$currentPage$getquery' class='active'>$currentPage</a>";
			echo "<a href='?page=$INCREASEpage$getquery'>$INCREASEpage</a>";
			if($currentPage==$total_pages-2){
				echo "<a href='?page=$total_pages$getquery' class='next'>$total_pages</a>";
			}
			else{
				echo "....<a href='?page=$total_pages$getquery' class='next'>$total_pages</a>";
			}
		}
	}
}

function GetAvailablePropertyIndexPage($limit = 5){
	$conn = create_conn();
	$sql = "SELECT a.property_id, a.slug, a.property_type, a.transaction, a.price, a.area, a.bedrooms, a.bathrooms, a.home_promo_text, a.longitude, a.latitude, a.address FROM approved_property_details AS a WHERE is_live = 1 AND a.transaction LIKE '%FOR RENT%' OR a.transaction LIKE '%FOR SALE%'";
	$result = $conn->query($sql);
	$propertyList[] = '';
	$i =  0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($limit <= 0){break;}
			//Fetching single image for the Property
			$sql2 = "SELECT img_path FROM approved_property_images WHERE property_id = ".$row['property_id']." LIMIT 1";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				$row2 = $result2->fetch_assoc();
				$row['image_path'] = $row2['img_path'];
			}	else 	{
				$row['image_path'] = '{{DEFAULT_PROPERTY_IMAGE}}';
			}
			$propertyList[$i] = $row;
			$limit--;
			$i++;
		}
	}
	close_mysqli($conn);
	if($propertyList[0] != NULL OR $propertyList[0] != ''){
		return $propertyList;
	}	else 	{
		return 0;
	}
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

function Shorter_Text($text, $chars_limit)
{
    if (strlen($text) > $chars_limit)
    {
        $new_text = substr($text, 0, $chars_limit);
        $new_text = trim($new_text);
        return $new_text . "...";
    }
    else
    {
    	return $text;
    }
}

function getAdvertiseList()
{
	$conn = create_conn();
	$sql = "SELECT * FROM `advertise_image_t` WHERE advertise_status = 1 ORDER BY timestamp DESC LIMIT 4";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$i = 0;
		while($row = $result->fetch_assoc()){
			$advertise_list[$i] = $row;
			$i++;
		}
		return $advertise_list;
	}
	else{
		return 0;
	}
}

function sendContactMail($postData){
	$error = '';
	$name = '';
	$email = '';
	$subject = '';
	$message = '';
	function clean_text($string)
	{
		$string = trim($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);
		return $string;
	}
	if(empty($postData["name"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
	}
	else
	{
		$name = clean_text($postData["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
	}
	if(empty($postData["mail"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
	}
	else
	{
		$email = clean_text($postData["mail"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
		}
	}
	if(empty($postData["message"]))
	{
		$error .= '<p><label class="text-danger">Message is required</label></p>';
	}
	else
	{
		$message = clean_text($postData["message"]);
	}
	if($error == '')
	{
		require 'includes/class_phpmailer/class.phpmailer.php';
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.yandex.ru';					//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';							//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'no-reply@cloud9homes.com.au';//Sets SMTP username
		$mail->Password = 'agoeqdzmkgeomqbe';			//Sets SMTP password
		$mail->SMTPSecure = 'ssl';						//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = "no-reply@cloud9homes.com.au";				//Sets the From email address for the message
		$mail->FromName = $postData["name"];			//Sets the From name of the message
		$mail->AddAddress("mohit@infraveo.com");		//Adds a "To" address
		//$mail->AddCC();								//Adds a "Cc" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML				
		$mail->Subject = "Cloud9Homes General Query";	//Sets the Subject of the message
		$mail->Body = $postData["message"]."<br />Mobile No:".$postData['phone'];//An HTML or plain text message body
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$name = '';
			$email = '';
			$subject = '';
			$message = '';
			return 1;
		}
		else
		{
			$name = '';
			$email = '';
			$subject = '';
			$message = '';
			return 0;
		}
	}
}
?>
