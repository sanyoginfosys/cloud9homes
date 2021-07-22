<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
	include_once('base/functions.php');
	$submitted_form = 0;
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Download Form'); ?>
<body>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
	
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class="subtitle-margin second-color"></h5>
					<h1 class="second-color">Download & Submit Form</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<form name="offer-from" action="download-forms.php" method="POST" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h3 class="title-negative-margin">Download Form<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="panel-group panel-apartment" id="accordion" role="tablist" aria-multiselectable="true">
							 <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
										<span>Enquiry Form - Rental</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="jfont"></i></div>
									</a>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<i class="fa fa-cloud-download" aria-hidden="true"></i> <a href="uploads/documents/enquiry_form_rental.Pdf">Download Form</a>
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<span>Application for Tenancy</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="jfont"></i></div>
									</a>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<i class="fa fa-cloud-download" aria-hidden="true"></i> <a href="uploads/documents/application_for_tenancy.Pdf">Download Form</a>
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<span>Management Inspection Report</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="jfont"></i></div>
									</a>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<i class="fa fa-cloud-download" aria-hidden="true"></i> <a href="uploads/documents/management_inspection_report.Pdf">Download Form</a>
									</div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										<span>100 Points Check List</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="jfont"></i></div>
									</a>
								</div>
								<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<i class="fa fa-cloud-download" aria-hidden="true"></i> <a href="uploads/documents/100_points_check_list.Pdf">Download Form</a>
									</div>
								</div>
							  </div>
							  <!-- <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									<a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
										<span>Collapsible Group Item #4</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="jfont"></i></div>
									</a>
								</div>
								<div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapseFour" aria-expanded="true" style="">
									<div class="panel-body">
										<img src="images/sidebar-featured1.jpg" alt="" class="p-image">If you’re looking for a home then pop in and see us or Contact Us. We do market all our properties on the big property websites and our own site but we may have  new on our books that you could see first before we start our marketing and you don’t want to miss out on your perfect home! If you sell your home with us and use our partner company for either a survey or to arrange your mortgage then we will reduce our fees by 0.5%.
									</div>
								</div>
							  </div> -->
							</div>
						</div>				
					</div>
					<div class="col-xs-12 col-md-6 margin-top-xs-60 margin-top-sm-60">
						<h3 class="title-negative-margin">Video<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="panel-group panel-apartment" id="accordion" role="tablist" aria-multiselectable="true">
							 <div class="panel panel-default">
							 	<div class="panel-heading" role="tab" id="headingOne1">
									<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1" class="collapsed">
										<span>How to fill form?</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="jfont"></i></div>
									</a>
								</div>
								<div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										Video coming soon!
									</div>
								</div>
							 </div>
							</div>
						</div>
						<!-- <div class="dark-col margin-top-60">
							<input id="geocomplete" name="geocomplete" type="text" class="input-full main-input" placeholder="Localization" />
							<p class="negative-margin bold-indent">Drag the marker to property position<p>
							<div id="submit-property-map" class="submit-property-map"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly" />
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly" />
								</div>
							</div>
						</div> -->
					</div>


				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php
								if(isset($_POST['name'],$_POST['email'])){	
									if(guest_document_form_UPLOAD($_POST['name'],$_POST['mobile'],$_POST['email'],$_POST['formtype'],$_FILES['formupload']) == "success"){
										echo '<div class="success-box margin-top-30">
													<p>Your form has been submitted successfully!</p>
													<div class="small-triangle"></div>
													<div class="small-icon"><i class="jfont"></i></div>
												</div><br /><center><a href="download-forms.php">Submit Another</a></center>';
										$submitted_form = 1;
									}
								}
							?>
						</div>
					</div>
				</div>
<!-- Form Section -->
				<?php

				if($submitted_form != 1){
					echo '<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<h3 class="title-negative-margin margin-top-60">Upload Form<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="name" type="text" class="input-full main-input" placeholder="Full Name" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="mobile" type="text" class="input-full main-input" placeholder="Mobile Number" required/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="email" type="text" class="input-full main-input" placeholder="Email" required/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<select name="formtype" class="bootstrap-select" title="Which form you\'re uploading?" required style="padding-left: 30px;" data-live-search="true">
										<option>Enquiry Form - Rental</option>
										<option>Application for Tenancy</option>
										<option>Management Inspection Report</option>
										<option>100 Points Check List</option>
									</select>
								</div>
							</div>
						</div>				
					</div>
				</div>
				</div>
					<!-- <div class="col-xs-12 margin-top-60">
						<h3 class="title-negative-margin">gallery<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
					</div> -->
					<div class="col-xs-12">
						<input id="file-upload2" name="formupload[]" type="file" required>
					</div>
					<div class="col-xs-12">
						<div class="center-button-cont margin-top-60">
							<!-- <a href="#" class="button-primary button-shadow" name="submitbtn">
								<span>submit property</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
							</a> -->
							<button class="button-primary button-shadow" name="submitbtn1">
								<span>submit form</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
							</button>
						</div>
					</div>
				</div>';
				}



				?>
				
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