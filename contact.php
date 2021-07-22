<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Contact us'); ?>
<body>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
			
    <section class="contact-page-1 no-padding">
		<div id="contact-map1"></div>
			<div class="contact1-cont">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="row contact1">
								<div class="col-sm-12">
									<h5 class="subtitle-margin">get in touch</h5>
									<h1>Contact Us<span class="special-color">.</span></h1>
									<div class="title-separator-primary"></div>
								</div>
								<div class="col-xs-12 col-md-6 margin-top-45">
									<p class="negative-margin"><b>Welcome to the world of Property ….<br/> Welcome to the world of Cloud 9 homes….</b>
<br /><br />
<b>Our Mission</b><br />
“To provide quality, timely and hassle free services to Property Landlords, Property Sellers and Investors”<br />
<br />
<b>Our Vision</b><br />
“To become the top real estate agents and property management company in Australia through pure customer service and satisfaction”<br />
<br />
<b>Key Strengths</b><br />
Cloud 9 homes consist of a team of Professionals with over 10 years’ experience in property each. We aim to provide an exclusive end to end service to our clients, which will enable clients to achieve real time information and control over their investments at their fingertips.
<br /><br />
Our vast and comprehensive network enables us to manage properties anywhere in and around Sydney ,NSW.
<br /><br />
Our aim is to take Property services experience to the next level.</p>
									<!-- <img src="images/contact-image.jpg" alt="" class="pull-left margin-top-45 hidden-md" />
									<address class="contact-info pull-left">
										<span><i class="fa fa-map-marker"></i>00456 Some Address line</span>
										<span><i class="fa fa-envelope fa-sm"></i><a href="#">email@domain.tld</a></span>
										<span><i class="fa fa-phone"></i>01-23456789</span>
										<span><i class="fa fa-globe"></i><a href="#">http://somedmain.tld</a></span>
										<span><i class="fa fa-clock-o"></i>mon-fri: 8:00 - 18:00</span>
										<span class="span-last">sat: 10:00 - 16:00</span>
									</address> -->
								</div>
								<div class="col-xs-12 col-md-6 margin-top-45">
									<form name="contact-form" id="contact-form" action="" method="post">
											<div id="form-result"></div>
											<input name="name" id="name" type="text" class="input-short2 main-input required,all" placeholder="Full Name" />
											<input name="phone" id="phone" type="text" class="input-short2 pull-right main-input required,all" placeholder="Phone No." />
											<input name="mail" id="mail" type="email" class="input-full main-input required,email" placeholder="Email ID" />
											<textarea name="message" id="message" class="input-full contact-textarea main-input required,email" placeholder="Your question"></textarea>
											<div class="form-submit-cont">
												<a href="#" class="button-primary pull-right" id="form-submit">
													<span>send</span>
													<div class="button-triangle"></div>
													<div class="button-triangle2"></div>
													<div class="button-icon"><i class="fa fa-paper-plane"></i></div>
												</a>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </section>
	
<!-- footer -->
    <?php print_footer(); ?>
</div>	

<!-- Move to top button -->
	<?php move2top(); ?>
	

<!-- Login, Register, Forget Password -->
	<?php print_login_modal();?>

<!-- Script -->
	<?php print_script(); ?>

	<script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
			function init() {						
				mapInit(-33.7329501,150.9470522,"contact-map1","images/pin-contact.png", true, true);
			}
	</script>
	
	
	</body>
</html>