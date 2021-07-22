<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
	include_once('base/functions.php');
	$submitted = 0;
	if(isset($_POST['cc1'],$_POST['cc2'])){	
		// echo $_POST['propertytype'].",".$_POST['transaction'].",".$_POST['price'].",".$_POST['area'].",".$_POST['bedrooms'].",".$_POST['bathrooms'].",".$_POST['message'].",".$_POST['cc1'].",".$_POST['cc2'].",".$_POST['cc3'];
		$submitted = client_testimonial_UPLOAD($_POST['cc1'],$_POST['cc2']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Client Testimonial'); ?>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php Infraveo_Homepage_DynamicSuburb_List(); ?>

	
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
	
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<!-- <h5 class="subtitle-margin second-color">request a service</h5> -->
					<h1 class="second-color">Client Testimonial</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<form name="offer-from" action="client-testimonials.php" method="POST" enctype="multipart/form-data" id="ct_form_id">
			<div class="container">
				<div class="row">
					<?php if($submitted == 1)	{ ?>
					<div class="success-box">
						<p>Your testimonial has been submitted successfully!</p>
						<div class="small-triangle"></div>
						<div class="small-icon"><i class="jfont"></i></div>
					</div>
					<br /><br />
				<?php } ?>

					<div class="col-xs-12 col-md-6 col-md-offset-3">
						<h3 class="title-negative-margin">Write your review<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
								<div class="col-xs-12 col-sm-12 margin-top-15">
									<input name="cc1" type="text" class="input-full main-input" placeholder="Full Name" required/>
								</div>
							</div>
							
							<!-- <textarea name="message" class="input-full main-input property-textarea" placeholder="Description" required></textarea> -->
							<textarea name="cc2" class="input-full main-input property-textarea" placeholder="Description" required="required"></textarea>
							

						</div>				
					</div>



					<div class="col-xs-12 col-md-6 col-md-offset-3">
						<br /><br />
						<h3 class="title-negative-margin">Profile Picture<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
							<br /><br />
						<input id="file-upload" name="mimages[]" type="file" multiple required>
								
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