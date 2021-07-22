<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('My Profile'); ?>
<body>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
		
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class="subtitle-margin second-color">dashboard</h5>
					<h1 class="second-color">my account</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9 col-md-push-3">
					<div class="row">
						<div class="col-xs-12">
							<h5 class="subtitle-margin">edit</h5>
							<h1>Profile<span class="special-color">.</span></h1>
							<div class="title-separator-primary"></div>
						</div>
					</div>	
					<form name="agent-from" action="#" enctype="multipart/form-data">
					<div class="row margin-top-60">
						<div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-3 col-md-4">	
							<div class="agent-photos">
								<img src="images/agent3.jpg" id="agent-profile-photo" class="img-responsive" alt="" />
								<div class="change-photo">
									<i class="fa fa-pencil fa-lg"></i>
									<input type="file" name="agent-photo" id="agent-photo" />
								</div>
								<input type="text" disabled="disabled" id="agent-file-name" class="main-input" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-8">
							<div class="labelled-input">
								<label for="first-name">First name</label><input id="first-name" name="first-name" type="text" class="input-full main-input" placeholder="" value="Timothy"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input">
								<label for="last-name">Last name</label><input id="last-name" name="last-name" type="text" class="input-full main-input" placeholder="" value="Johnson"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input">
								<label for="email">Email</label><input id="email" name="email" type="email" class="input-full main-input" placeholder="" value="agent@somedomain.tld"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input">
								<label for="phone">Phone</label><input id="phone" name="phone" type="tel" class="input-full main-input" placeholder="" value="123-456-789"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input last">
								<label for="address">Address</label><input id="address" name="address" type="text" class="input-full main-input" placeholder="" value="Some address here"/>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="row margin-top-15">
						<div class="col-xs-12">
							<div class="labelled-textarea">
								<label for="description">Description</label>
								<textarea id="description" name="description" class="input-full main-input">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
							</div>
						</div>
					</div>
					<div class="row margin-top-30">
						<div class="col-xs-12 col-lg-6">
							<div class="labelled-input-short">
								<label for="facebook">
									<span class="label-icon-circle pull-left">
										<i class="fa fa-facebook"></i>
									</span>
									Facebook
								</label>
								<input id="facebook" name="facebook" type="text" class="input-full main-input" placeholder="" value="http://facebook.url"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input-short">
								<label for="gplus">
									<span class="label-icon-circle pull-left">
										<i class="fa fa-google-plus"></i>
									</span>
									Google +
								</label>
								<input id="gplus" name="gplus" type="text" class="input-full main-input" placeholder="" value="http://gplus.url"/>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-6">
							<div class="labelled-input-short">
								<label for="twitter">
									<span class="label-icon-circle pull-left">
										<i class="fa fa-twitter"></i>
									</span>
									Twitter
								</label>
								<input id="twitter" name="twitter" type="text" class="input-full main-input" placeholder="" value="http://twitter.url"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input-short">
								<label for="skype">
									<span class="label-icon-circle pull-left">
										<i class="fa fa-skype"></i>
									</span>
									Skype
								</label>
								<input id="skype" name="skype" type="text" class="input-full main-input" placeholder="" value="Skype_name"/>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="row margin-top-30">
						<div class="col-xs-12">
							<div class="info-box">
								<p>Fill this fields only if you want to change your password</p>
								<div class="small-triangle"></div>
								<div class="small-icon"><i class="fa fa-info fa-lg"></i></div>
							</div>
						</div>
					</div>
					<div class="row margin-top-15">
						<div class="col-xs-12 col-lg-6">
							<div class="labelled-input-short">
								<label for="first-name">New Password</label>
								<input id="password" name="password" type="password" class="input-full main-input" placeholder="" value=""/>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-6">
							<div class="labelled-input-short">
								<label for="first-name">Repeat Password</label>
								<input id="repeat-password" name="repeat-password" type="password" class="input-full main-input" placeholder="" value=""/>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="row margin-top-15">
						<div class="col-xs-12">
							<div class="center-button-cont center-button-cont-border">
								<a href="#" class="button-primary button-shadow">
									<span>save</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-lg fa-floppy-o"></i></div>
								</a>
							</div>
						</div>
					</div>
					</form>
					<div class="row margin-top-60"></div>
				</div>			
				<div class="col-xs-12 col-md-3 col-md-pull-9">
					<div class="sidebar-left">
						<h3 class="sidebar-title">Welcome back<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
						<div class="profile-info margin-top-60">
							<div class="profile-info-title negative-margin">Timothy Johnson</div>
							<img src="images/comment-photo2.jpg" alt="" class="pull-left" />
							<div class="profile-info-text pull-left">
								<p class="subtitle-margin">Agent</p>
								<p class="">42 Estates</p>
								
								<a href="#" class="logout-link margin-top-30"><i class="fa fa-lg fa-sign-out"></i>Logout</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="center-button-cont margin-top-30">
							<a href="my-offers.html" class="button-primary button-shadow button-full">
								<span>My offers</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-th-list"></i></div>
							</a>
						</div>
						<div class="center-button-cont margin-top-15">
							<a href="my-profile.html" class="button-primary button-shadow button-full">
								<span>My profile</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-user"></i></div>
							</a>
						</div>
						<div class="center-button-cont margin-top-15">
							<a href="submit-property.html" class="button-alternative button-shadow button-full">
								<span>add property</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="jfont fa-lg">&#xe804;</i></div>
							</a>
						</div>
					
					
						<h3 class="sidebar-title margin-top-60">Your offers<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
						<div class="sidebar-select-cont">
							<select name="transaction1" class="bootstrap-select" title="Transaction:" multiple>
								<option>For sale</option>
								<option>For rent</option>
							</select>
							<select name="conuntry1" class="bootstrap-select" title="Country:" multiple data-actions-box="true">
								<option>United States</option>
								<option>Canada</option>
								<option>Mexico</option>
							</select>
							<select name="city1" class="bootstrap-select" title="City:" multiple data-actions-box="true">
								<option>New York</option>
								<option>Los Angeles</option>
								<option>Chicago</option>
								<option>Houston</option>
								<option>Philadelphia</option>
								<option>Phoenix</option>
								<option>Washington</option>
								<option>Salt Lake Cty</option>
								<option>Detroit</option>
								<option>Boston</option>
							</select>					
							<select name="location1" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-price-sidebar-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-price-sidebar" data-min="0" data-max="300000" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-area-sidebar-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-area-sidebar" data-min="0" data-max="180" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-bedrooms-sidebar-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms-sidebar" data-min="1" data-max="10" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-bathrooms-sidebar-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms-sidebar" data-min="1" data-max="4" class="slider-range"></div>
							</div>
						<div class="sidebar-search-button-cont">
							<a href="#" class="button-primary">
								<span>search</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
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

<!-- Login modal -->
	<?php print_login_modal();?>

<!-- jQuery  -->
    <?php print_script(); ?>

	</body>
</html>