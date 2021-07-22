<?php

function print_nav(){
	echo '<header class="navbar_gradient">
		<div class="top-bar-wrapper" style="background-color:#3797dd;">
			<div class="container top-bar">
				<div class="row">
					<div class="col-xs-5 col-sm-8" style="color:white;">
						<div class="top-mail pull-left hidden-xs">
							<span class="top-icon-circle">
								<i class="fa fa-envelope fa-sm"></i>
							</span>
							<span class="top-bar-text">info@cloud9homes.com.au</span>
						</div>
						<div class="top-phone pull-left hidden-xxs">
							<span class="top-icon-circle">
								<i class="fa fa-phone"></i>
							</span>
							<span class="top-bar-text">0426990799, 0290563378</span>
						</div>
						<div class="top-localization pull-left hidden-sm hidden-md hidden-xs">
							<span class="top-icon-circle pull-left">
								<i class="fa fa-map-marker"></i>
							</span>
							<span class="top-bar-text">Suite 6, 4A Meridian Place Bella Vista-2153</span>
						</div>
					</div>
					<div class="col-xs-7 col-sm-4">
						<div class="top-social-last pull-right" data-toggle="tooltip" data-placement="bottom" title="Login/Register" style="background-color: white;">
							<a class="top-icon-circle" href="#login-modal" data-toggle="modal" style="border: 1px solid #3797dd;">
								<i class="fa fa-lock"></i>
							</a>
						</div>
						
						<div class="top-social pull-right" style="background-color: #3797dd;">
							<a class="top-icon-circle" href="https://www.facebook.com/cloud9homes.com.au/" style="color: #3797dd;">
								<i class="fa fa-facebook" style="color: white;"></i>
							</a>
						</div>';
						// <div class="top-social pull-right">
						// 	<a class="top-icon-circle" href="#">
						// 		<i class="fa fa-twitter"></i>
						// 	</a>
						// </div>
						// <div class="top-social pull-right">
						// 	<a class="top-icon-circle" href="#">
						// 		<i class="fa fa-google-plus"></i>
						// 	</a>
						// </div>
						// <div class="top-social pull-right">
						// 	<a class="top-icon-circle" href="#">
						// 		<i class="fa fa-skype"></i>
						// 	</a>
						// </div>
					echo '</div>
				</div>
			</div><!-- /.top-bar -->	
		</div><!-- /.Page top-bar-wrapper -->	
		<nav class="navbar main-menu-cont navbar_gradient" style="background-color:white;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar icon-bar1"></span>
						<span class="icon-bar icon-bar2"></span>
						<span class="icon-bar icon-bar3"></span>
					</button>
					<a href="'.HOME_URL.'" title="" class="navbar-brand">
						<img src="'.HOME_URL.'images/logo-darkx2.png" height="45px" width="140px" alt="Cloud9Homes" />
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse navbar_gradient" style="background-color:white !important;">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="'.HOME_URL.'" style="color: #002048;">Home</a></li>
						<li><a href="'.HOME_URL.'listing" style="color: #002048;">Listings</a></li>
						<li><a href="'.HOME_URL.'download-forms" style="color: #002048;">Download Forms</a></li>
						<li><a href="'.HOME_URL.'contact" style="color: #002048;">Contact Us</a></li>
						<li><a href="'.HOME_URL.'submit-property" style="color: #002048;">Submit property</a></li>
					</ul>
				</div>
			</div>
		</nav><!-- /.main-menu-cont -->	
    	</header>';
	
}

?>