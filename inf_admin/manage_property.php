<?php
session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('siteconfig.php');
	include_once('base/functions.php');
if(Check_UserPermission('Manage Property', 'user_view', $_SESSION['INFCRM_UserID'])){
	if(isset($_POST['propertytype'],$_POST['transaction'],$_FILES)){
		if(Check_UserPermission('Manage Property', 'user_update', $_SESSION['INFCRM_UserID'])){
			if($_FILES["new_pics"]["name"][0]!=""){
				Property_Details_UPDATE($_POST['propertytype'],$_POST['transaction'],$_POST['price'],$_POST['area'],$_POST['bedrooms'],$_POST['bathrooms'],str_replace('\'', '\\\'', $_POST['message']),$_POST['cc1'],$_POST['cc2'],$_POST['cc3'],$_POST['cc4'],$_POST['cc5'],$_POST['cc6'],$_POST['cc7'],$_POST['cc8'],$_POST['cc9'],$_POST['cc10'],$_POST['cc11'],$_POST['cc12'],$_POST['cc13'],$_POST['cc14'],$_POST['person_name'],$_POST['phoneno'],$_POST['emailid'],$_POST['property-address'], $_POST['property_id'],$_FILES);
			}
			else{
				Property_Details_UPDATE($_POST['propertytype'],$_POST['transaction'],$_POST['price'],$_POST['area'],$_POST['bedrooms'],$_POST['bathrooms'],str_replace('\'', '\\\'', $_POST['message']),$_POST['cc1'],$_POST['cc2'],$_POST['cc3'],$_POST['cc4'],$_POST['cc5'],$_POST['cc6'],$_POST['cc7'],$_POST['cc8'],$_POST['cc9'],$_POST['cc10'],$_POST['cc11'],$_POST['cc12'],$_POST['cc13'],$_POST['cc14'],$_POST['person_name'],$_POST['phoneno'],$_POST['emailid'],$_POST['property-address'], $_POST['property_id'],NULL);
			}
			
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Property | <?php echo SITE_TITLE; ?></title>
	<?php include_once('includes/header.php'); ?>
	<link rel="stylesheet" type="text/css" href="assets/vendors/custom/vendors/flaticon2/font/flaticon2.ttf">
	<link rel="stylesheet" type="text/css" href="assets/vendors/custom/vendors/flaticon2/font/flaticon2.woff">
	<style>
		.container {
  position: relative;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
}

.container:hover .overlay {
  opacity: 1;
}

.icon {
  color: white;
  font-size: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.fa-trash:hover {
  color: red;
}
	</style>
</head>
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subhepader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->

	<?php include_once('includes/header-mobile.php'); ?>

	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<?php include_once ('includes/aside.php'); ?>
		</div>
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
			<?php
			if(isset($_GET['error'])){
				if ($_GET['error'] == 10) {
					?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Oops, Error occured! No Address Found for the Property.</div>
					</div>
					<?php
				}
				if ($_GET['error'] == 22342423) {
					?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Please fill the details first.</div>
					</div>
					<?php
				}
			}
			if(isset($_GET['success'])){
				?>
				<div class="alert alert-success" role="alert">
					<div class="alert-text">Property is live now!<br /><br />View Now : <a href="<?php echo HOME_URL.'property/'.$_GET['success']; ?>"><?php echo HOME_URL.'property/'.$_GET['success']; ?></a></div>
				</div>
				<?php
			}
			?>
			<?php include_once ('includes/subheader.php'); ?>
			<?php if(isset($_GET['property'])){ $property = $_GET['property']?>
				<?php $propertyDetails = Manage_Property_Edit($_GET['property']);$propertyImages = Manage_Property_Image_Edit($_GET['property']); ?>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">	
					<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						<form class="kt-form kt-form--label-right" action="manage_property.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="property_id" value="<?php echo $propertyDetails['property_id']; ?>">
							<div class="kt-portlet__body">
								<div class="form-group row">
									<div class="col-lg-4">
										<label>Full Name:</label>
										<input name="person_name" type="text" class="form-control" value="<?php if(isset($propertyDetails['name'])){echo $propertyDetails['name'];} ?>">
									</div>
									<div class="col-lg-4">
										<label class="">Phone No.:</label>
										<input name="phoneno" type="text" class="form-control" value="<?php if(isset($propertyDetails['phoneno'])){echo $propertyDetails['phoneno'];} ?>">
									</div>
									<div class="col-lg-4">
										<label>Email:</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mail-bulk"></i></span></div>
											<input name="emailid" type="email" class="form-control" value="<?php if(isset($propertyDetails['emailid'])){echo $propertyDetails['emailid'];} ?>">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
										<label class="">Property Type:</label>
										<input name="propertytype" type="text" class="form-control" value="<?php if(isset($propertyDetails['property_type'])){echo $propertyDetails['property_type'];} ?>">
									</div>
									<div class="col-lg-6">
										<label class="">Transaction:</label>
										<input name="transaction" type="text" class="form-control" value="<?php if(isset($propertyDetails['transaction'])){echo $propertyDetails['transaction'];} ?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-3">
										<label>Price:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input name="price" type="text" class="form-control" value="<?php if(isset($propertyDetails['price'])){echo $propertyDetails['price'];} ?>">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-money-check-alt"></i></span></span>
										</div>
									</div>
									<div class="col-lg-3">
										<label class="">Area:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input name="area" type="text" class="form-control" value="<?php if(isset($propertyDetails['area'])){echo $propertyDetails['area'];} ?>">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-chart-area"></i></span></span>
										</div>
									</div>
									<div class="col-lg-3">
										<label class="">Bedrooms:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input name="bedrooms" type="text" class="form-control" value="<?php if(isset($propertyDetails['bedrooms'])){echo $propertyDetails['bedrooms'];} ?>">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-bed"></i></span></span>
										</div>
									</div>
									<div class="col-lg-3">
										<label class="">Bathrooms:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input name="bathrooms" type="text" class="form-control" value="<?php if(isset($propertyDetails['bathrooms'])){echo $propertyDetails['bathrooms'];} ?>" >
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-bath"></i></span></span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Images:</label>
										<?php
											echo "<div class=\"row col-lg-12\">";
											for($i=0;$i<count($propertyImages);$i++){
												if(!is_float($i/4)){echo "</div>";echo "<div class=\"row col-lg-12\">";}
												echo "<div class=\"container col-lg-3\">
												<img src=\"$homeurl$propertyImages[$i]\" alt=\"Avatar\" class=\"image\" style=\"width:100%;\">
												<div class=\"overlay\">
												<a href=\"Sec_Api/removePropertyImage.php?img=$propertyImages[$i]&property=$property\" class=\"icon\" title=\"Remove Photo\">
												<i class=\"fa fa-trash\"></i>
												</a>
												</div>
												</div>";
											}
											echo "</div>";
										?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-2" style="text-align:left !important;">Add New Image:</label>
									<div class="custom-file col-lg-10">
										<input class="custom-file-input" name="new_pics[]" id="new_pics" type="file" multiple style="text-align:left !important;">
										<label class="custom-file-label" for="customFile" style="left:10px;right:10px;text-align:left !important;">Choose file</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Description:</label>
										<textarea name="message" class="form-control property-description" rows="4"><?php if(isset($propertyDetails['description'])){echo $propertyDetails['description'];} ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Address:</label>
										<input type="text" name="property-address" class="form-control property-address" rows="4" value="<?php if(isset($propertyDetails['address'])){echo $propertyDetails['address'];} ?>"></input>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-4">
										<label class="kt-checkbox">
											<input name="cc1" type="checkbox" <?php if($propertyDetails['air_conditioning'] == 1){echo "checked='checked'";}?> > Air Conditioning
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc2" type="checkbox" <?php if($propertyDetails['Internet'] == 1){echo "checked='checked'";}?> > Internet
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc3" type="checkbox" <?php if($propertyDetails['cable_tv'] == 1){echo "checked='checked'";}?> > Cable TV
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc4" type="checkbox" <?php if($propertyDetails['balcony'] == 1){echo "checked='checked'";}?> > Balcony
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc5" type="checkbox" <?php if($propertyDetails['roof_terrace'] == 1){echo "checked='checked'";}?> > Roof Terrace
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc6" type="checkbox" <?php if($propertyDetails['terrace'] == 1){echo "checked='checked'";}?> > Terrace
											<span></span>
										</label>
									</div>
									<div class="col-lg-4">
										<label class="kt-checkbox">
											<input name="cc7" type="checkbox" <?php if($propertyDetails['lift'] == 1){echo "checked='checked'";}?> > Lift
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc8" type="checkbox" <?php if($propertyDetails['garage'] == 1){echo "checked='checked'";}?> > Garage
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc9" type="checkbox" <?php if($propertyDetails['security'] == 1){echo "checked='checked'";}?> > Security
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc10" type="checkbox" <?php if($propertyDetails['high_standard'] == 1){echo "checked='checked'";}?> > High Standard
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc11" type="checkbox" <?php if($propertyDetails['city_centre'] == 1){echo "checked='checked'";}?> > City Centre
											<span></span>
										</label>
										<br />
										<label class="kt-checkbox">
											<input name="cc12" type="checkbox" <?php if($propertyDetails['furniture'] == 1){echo "checked='checked'";}?> > Furniture
											<span></span>
										</label>
									</div>
									<div class="col-lg-4">
										<label class="kt-checkbox">
											<input id="c13" name="cc13" type="checkbox" <?php if($propertyDetails['another_options'] != NULL){echo "checked='checked'";}?> > Another Option
											<span></span>
										</label>
										<br />
										<textarea name="cc14" class="form-control property-textarea" placeholder="Write features separated by commas" rows="4" id="cc14" style="display: ;"></textarea>
									</div>
								</div>
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-4"></div>
										<div class="col-lg-8">
											<button type="submit" class="btn btn-primary">Update</button>
											<a href="manage_property" class="btn btn-secondary">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php include_once ('includes/footer-greet.php'); ?>
				</div>
			<?php } else { ?>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
					
					<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						
						<div class="kt-portlet kt-portlet--mobile">
							<div class="kt-portlet__head kt-portlet__head--lg">
								<div class="kt-portlet__head-label">
									<span class="kt-portlet__head-icon">
										<i class="kt-font-brand flaticon-buildings"></i>
									</span>
									<h3 class="kt-portlet__head-title">
										Property
									</h3>
								</div>
							</div>
							<div class="kt-portlet__body">

								<!--begin: Search Form -->
								<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
									<div class="row align-items-center">
										<div class="col-md-12 order-2 order-xl-1">
											<div class="row align-items-center">
												<div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
													<div class="kt-input-icon kt-input-icon--left">
														<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
														<span class="kt-input-icon__icon kt-input-icon__icon--left">
															<span><i class="la la-search"></i></span>
														</span>
													</div>
												</div>
												<div class="col-md-2"></div>
												<!-- <div class="col-md-4">
													<div style="margin-left: 25px;">
														
														<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_5"><i class="flaticon2-plus"></i> Add Customer
														</button> 
													</div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
							</div>
							<div class="kt-portlet__body kt-portlet__body--fit">
								<!--begin: Datatable -->
								<div class="kt-datatable" id="local_data"></div>
								<!--end: Datatable -->
							</div>
						</div>
					</div>
					<?php include_once ('includes/footer-greet.php'); ?>
				</div>
		<?php } ?>
		</div>
	</div>
	<!-- end:: Page -->
	<?php include 'includes/footer.php'?>
	<?php if(isset($_GET['property'])) {} else { ?>
		<script src="tables/js/manage_property.js" type="text/javascript"></script>
	<?php } ?>
	<script src="//maps.google.com/maps/api/js?key=AIzaSyAPU1ttZ3TXHVdP98xt-cAcUgBQkTV8LrA" type="text/javascript"></script>
	<script src="assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
	<!-- <script src="assets/app/custom/general/crud/metronic-datatable/base/data-local.js" type="text/javascript"></script> -->
</body>
</html>

<div id='modal-4' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog modal-lg' role='document'>
		<div class='modal-content'>
			<div class='kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor'>
				<div class='kt-content  kt-grid__item kt-grid__item--fluid' id='kt_content'>
					<div class='kt-portlet'>
						<div class='kt-portlet__head'>
							<div class='kt-portlet__head-label'>
								<div class='modal-header'>
									<h3 class='kt-portlet__head-title'>
										Property Details
									</h3>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
									</button>
								</div>
							</div>
						</div>
						<div id="uniqueid_mod" style="display: none;"></div>
						<div id="edit_modal_base"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(Check_UserPermission('Manage Property', 'user_view', $_SESSION['INFCRM_UserID'])){ ?>
<script type="text/javascript">	
	$(document).on('click', '.edit-cust-btn', function(){
		var uniqueid = $(this).attr('id');
		$('#uniqueid_mod').attr('value',uniqueid);
		$.ajax({
			url:"Sec_Api/view_property.php",
			method:"post",
			data:{uniqueid:uniqueid},
			success:function(data){
				$('#edit_modal_base').html(data);
				$('#modal-4').modal('show');
			}
		});
	})
</script>
<?php } ?>

<script type="text/javascript">
	$(document).on('click', '.cancelBtn', function(){
		$('#modal-4').modal('hide');
	});

	jQuery(document).ready(function() {
		LoadTable();
	});
</script>


<?php } else   {
    header('location: login.php');
} } else   {
    header('location: login.php');
} ?>