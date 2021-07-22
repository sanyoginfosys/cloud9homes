<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
	include_once('base/functions.php');
	if(isset($_POST['propertytype'],$_POST['transaction'])){	
		// echo $_POST['propertytype'].",".$_POST['transaction'].",".$_POST['price'].",".$_POST['area'].",".$_POST['bedrooms'].",".$_POST['bathrooms'].",".$_POST['message'].",".$_POST['cc1'].",".$_POST['cc2'].",".$_POST['cc3'];
		lead_property_details_UPLOAD($_POST['propertytype'],$_POST['transaction'],$_POST['price'],$_POST['area'],$_POST['bedrooms'],$_POST['bathrooms'],$_POST['message'],$_POST['cc1'],$_POST['cc2'],$_POST['cc3'],$_POST['cc4'],$_POST['cc5'],$_POST['cc6'],$_POST['cc7'],$_POST['cc8'],$_POST['cc9'],$_POST['cc10'],$_POST['cc11'],$_POST['cc12'],$_POST['cc13'],$_POST['cc14'],$_POST['cc15'],$_POST['cc16'],$_POST['cc17'],$_POST['cc18'],$_POST['lng'],$_POST['lat'],$_FILES['mimages[]']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Submit Property'); ?>
<body>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
	
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class="subtitle-margin second-color">add listing</h5>
					<h1 class="second-color">Rent | Sale</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<form name="offer-from" action="submit-property.php" method="POST" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h3 class="title-negative-margin">Download Form<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
								
								<div class="col-xs-12 col-sm-6">
									<select name="propertytype" class="bootstrap-select" title="Property type:" required>
										<option>Apartment</option>
										<option>House</option>
										<option>Commercial</option>
										<option>Land</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-xs-15">
									<select name="transaction" class="bootstrap-select" title="Transaction:" required>
										<option>For sale</option>
										<option>For rent</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="price" type="text" class="input-full main-input" placeholder="Price" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="area" type="text" class="input-full main-input" placeholder="Area" required/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="bedrooms" type="text" class="input-full main-input" placeholder="Bedrooms" required/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="bathrooms" type="text" class="input-full main-input" placeholder="Bathrooms" required/>
								</div>
							</div>
							<textarea name="message" class="input-full main-input property-textarea" placeholder="Description" required></textarea>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c1" name="cc1" class="main-checkbox" />
									<label for="c1"><span></span>Air Conditioning</label><br/>
									<input type="checkbox" id="c2" name="cc2" class="main-checkbox" />
									<label for="c2"><span></span>Internet</label><br/>
									<input type="checkbox" id="c3" name="cc3" class="main-checkbox" />
									<label for="c3"><span></span>Cable TV</label><br/>
									<input type="checkbox" id="c4" name="cc4" class="main-checkbox" />
									<label for="c4"><span></span>Balcony</label><br/>
									<input type="checkbox" id="c5" name="cc5" class="main-checkbox" />
									<label for="c5"><span></span>Roof Terrace</label><br/>
									<input type="checkbox" id="c6" name="cc6" class="main-checkbox" />
									<label for="c6"><span></span>Terrace</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c7" name="cc7" class="main-checkbox" />
									<label for="c7"><span></span>Lift</label><br/>
									<input type="checkbox" id="c8" name="cc8" class="main-checkbox" />
									<label for="c8"><span></span>Garage</label><br/>
									<input type="checkbox" id="c9" name="cc9" class="main-checkbox" />
									<label for="c9"><span></span>Security</label><br/>
									<input type="checkbox" id="c10" name="cc10" class="main-checkbox" />
									<label for="c10"><span></span>High Standard</label><br/>
									<input type="checkbox" id="c11" name="cc11" class="main-checkbox" />
									<label for="c11"><span></span>City Centre</label><br/>
									<input type="checkbox" id="c12" name="cc12" class="main-checkbox" />
									<label for="c12"><span></span>Furniture</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c13" name="cc13" class="main-checkbox" />
									<label for="c13"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c14" name="cc14" class="main-checkbox" />
									<label for="c14"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c15" name="cc15" class="main-checkbox" />
									<label for="c15"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c16" name="cc16" class="main-checkbox" />
									<label for="c16"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c17" name="cc17" class="main-checkbox" />
									<label for="c17"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c18" name="cc18" class="main-checkbox" />
									<label for="c18"><span></span>Another Option</label>
								</div>
							</div>
						</div>				
					</div>
					<div class="col-xs-12 col-md-6 margin-top-xs-60 margin-top-sm-60">
						<h3 class="title-negative-margin">Video<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<input id="geocomplete" name="geocomplete" type="text" class="input-full main-input" placeholder="Localization" required/>
							<p class="negative-margin bold-indent">Drag the marker to property position<p>
							<div id="submit-property-map" class="submit-property-map"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly" required/>
								</div>
							</div>
						</div>
					</div>




					<div class="col-xs-12 col-md-6">
						<h3 class="title-negative-margin">Download Form<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
								
								<div class="col-xs-12 col-sm-6">
									<select name="propertytype" class="bootstrap-select" title="Property type:" required>
										<option>Apartment</option>
										<option>House</option>
										<option>Commercial</option>
										<option>Land</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-xs-15">
									<select name="transaction" class="bootstrap-select" title="Transaction:" required>
										<option>For sale</option>
										<option>For rent</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="price" type="text" class="input-full main-input" placeholder="Price" required/>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="area" type="text" class="input-full main-input" placeholder="Area" required/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="bedrooms" type="text" class="input-full main-input" placeholder="Bedrooms" required/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="bathrooms" type="text" class="input-full main-input" placeholder="Bathrooms" required/>
								</div>
							</div>
							<textarea name="message" class="input-full main-input property-textarea" placeholder="Description" required></textarea>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c1" name="cc1" class="main-checkbox" />
									<label for="c1"><span></span>Air Conditioning</label><br/>
									<input type="checkbox" id="c2" name="cc2" class="main-checkbox" />
									<label for="c2"><span></span>Internet</label><br/>
									<input type="checkbox" id="c3" name="cc3" class="main-checkbox" />
									<label for="c3"><span></span>Cable TV</label><br/>
									<input type="checkbox" id="c4" name="cc4" class="main-checkbox" />
									<label for="c4"><span></span>Balcony</label><br/>
									<input type="checkbox" id="c5" name="cc5" class="main-checkbox" />
									<label for="c5"><span></span>Roof Terrace</label><br/>
									<input type="checkbox" id="c6" name="cc6" class="main-checkbox" />
									<label for="c6"><span></span>Terrace</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c7" name="cc7" class="main-checkbox" />
									<label for="c7"><span></span>Lift</label><br/>
									<input type="checkbox" id="c8" name="cc8" class="main-checkbox" />
									<label for="c8"><span></span>Garage</label><br/>
									<input type="checkbox" id="c9" name="cc9" class="main-checkbox" />
									<label for="c9"><span></span>Security</label><br/>
									<input type="checkbox" id="c10" name="cc10" class="main-checkbox" />
									<label for="c10"><span></span>High Standard</label><br/>
									<input type="checkbox" id="c11" name="cc11" class="main-checkbox" />
									<label for="c11"><span></span>City Centre</label><br/>
									<input type="checkbox" id="c12" name="cc12" class="main-checkbox" />
									<label for="c12"><span></span>Furniture</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c13" name="cc13" class="main-checkbox" />
									<label for="c13"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c14" name="cc14" class="main-checkbox" />
									<label for="c14"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c15" name="cc15" class="main-checkbox" />
									<label for="c15"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c16" name="cc16" class="main-checkbox" />
									<label for="c16"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c17" name="cc17" class="main-checkbox" />
									<label for="c17"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c18" name="cc18" class="main-checkbox" />
									<label for="c18"><span></span>Another Option</label>
								</div>
							</div>
						</div>				
					</div>





					
					<div class="col-xs-12 margin-top-60">
						<h3 class="title-negative-margin">gallery<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
					</div>
					<div class="col-xs-12 margin-top-60">
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
							<button class="button-primary button-shadow" name="submitbtn1">
								<span>submit property</span>
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