<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Error - 404'); ?>
<body>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
		
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class="subtitle-margin second-color">ERROR 404</h5>
					<h1 class="second-color">Page not found</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>	
    </section>
	
	<section class="section-light section-top-shadow">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="huge-header">404<span class="special-color">.</span></h1>
					<h1 class="error-subtitle text-color4">Page not found</h1>
					
					<p class="margin-top-105 centered-text">The page you are looking for might have been removed, had its address changed, or become temporarily unavailable.</p>
					<p class="centered-text">Go to our <strong><a href="<?php echo HOME_URL; ?>">HOME</a></strong> or return to the <strong><a href="javascript:history.back()">PREVIOUS PAGE</a></strong></p>
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
	
	</body>
</html>