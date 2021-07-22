<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
	include_once('base/functions.php');
	$submitted = 0;
	if(isset($_POST['person_name'],$_POST['phoneno'])){	
		// echo $_POST['propertytype'].",".$_POST['transaction'].",".$_POST['price'].",".$_POST['area'].",".$_POST['bedrooms'].",".$_POST['bathrooms'].",".$_POST['message'].",".$_POST['cc1'].",".$_POST['cc2'].",".$_POST['cc3'];
		$submitted = request_a_service_form_submit($_POST['cc1'],$_POST['cc2'],$_POST['cc3'],$_POST['cc4'],$_POST['c5'],$_POST['cc6'],$_POST['lng'],$_POST['lat'],$_POST['person_name'],$_POST['phoneno'],$_POST['emailid'],$_POST['person_last_name'],$_POST['property_type']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Request a Service'); ?>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php Infraveo_Homepage_DynamicSuburb_List(); ?>

	<script type="text/javascript">
		$(document).ready(function(){
		    $("form").submit(function(){
				 if ($('input:checkbox').filter(':checked').length < 1){
				    alert("Please select atleast 1 service");
				 	return false;
				 }
				 if($('#lat_id').val().length == 0){
				 	alert("Please pin the map to your property location");
				 	return false;
				 }
		    });
		});
	</script>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
	
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<!-- <h5 class="subtitle-margin second-color">request a service</h5> -->
					<h1 class="second-color">request a service</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<form name="offer-from" action="request-service.php" method="POST" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<?php if($submitted == 1)	{ ?>
					<div class="success-box">
						<p>Your request has been submitted successfully!</p>
						<div class="small-triangle"></div>
						<div class="small-icon"><i class="jfont"></i></div>
					</div>
					<br /><br />
				<?php } ?>

					<div class="col-xs-12 col-md-6">
						<h3 class="title-negative-margin">Service details<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="person_name" type="text" class="input-full main-input" placeholder="First Name" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="person_last_name" type="text" class="input-full main-input" placeholder="Last Name" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<select name="property_type" class="bootstrap-select" title="Property Type" required>
										<option>Apartment</option>
										<option>House</option>
										<option>Town House</option>
										<option>Unit</option>
										<option>Land</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="phoneno" type="text" class="input-full main-input" placeholder="Phone No." required/>
								</div>
								<div class="col-xs-12 col-sm-12 margin-top-15 margin-top-xs-0">
									<input name="emailid" type="email" class="input-full main-input" placeholder="Email ID" required/>
								</div>
								
							</div>
							<br />
							<!-- <textarea name="message" class="input-full main-input property-textarea" placeholder="Description" required></textarea> -->
							<div class="row">
								<h6 style="margin-left: 15px;">Select the Services</h6>
								<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 margin-top-15">
									<input type="checkbox" id="c1" name="cc1" class="main-checkbox" />
									<label for="c1"><span></span>Free Property Valuation</label><br/>
									<input type="checkbox" id="c2" name="cc2" class="main-checkbox" />
									<label for="c2"><span></span>Property & Mortgage Health Check</label><br/>
									<input type="checkbox" id="c3" name="cc3" class="main-checkbox" />
									<label for="c3"><span></span>Rental Property Inspection</label><br/>
									<input type="checkbox" id="c4" name="cc4" class="main-checkbox" />
									<label for="c4"><span></span>Free Rental Appraisal</label><br/>
								</div>
							</div>
							<div class="row">
								<h6 style="margin-left: 15px;">Preferred Communication Method</h6>
								<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 margin-top-15">
									<select name="c5" class="bootstrap-select" required>
										<option selected="selected">Call</option>
										<option>Email</option>
									</select>
								</div>
							</div>
						</div>				
					</div>
					<div class="col-xs-12 col-md-6 margin-top-xs-60 margin-top-sm-60">
						<h3 class="title-negative-margin">Property Address<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<input id="geocomplete" name="geocomplete" type="text" class="input-full main-input" placeholder="Localization" required/>
							<p class="negative-margin bold-indent">Drag the marker to property position<p>
							<div id="submit-property-map" class="submit-property-map"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lng" id="long_id" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lat" id="lat_id" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly" required/>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12">
						<div class="center-button-cont margin-top-60">
							<!-- <a href="#" class="button-primary button-shadow" name="submitbtn">
								<span>submit property</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
							</a> -->
							<button class="button-primary button-shadow" name="submitbtn1" id="submitbtn1">
								<span>Submit Request</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
		
    <!-- footer -->
    <?php print_footer(); ?>
</div>	

<!-- Move to top button -->
	<?php move2top(); ?>

<!-- Login modal -->
	<?php print_login_modal();?>

<!-- jQuery  -->
    <?php print_script(); ?>

	</body>
</html>