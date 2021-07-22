<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('My Offers'); ?>
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
							<div class="col-xs-12 col-lg-7">
								<h5 class="subtitle-margin">Your offers</h5>
								<h1>42 estates found<span class="special-color">.</span></h1>
							</div>
							<div class="col-xs-12 col-lg-5">											
								<div class="order-by-container">
									<select name="sort" class="bootstrap-select" title="Order By:">
										<option>Price low to high</option>
										<option>Price high to low</option>
										<option>Area high to low</option>
										<option>Area high to low</option>
									</select>
								</div>	
							</div>							
							<div class="col-xs-12">
								<div class="title-separator-primary"></div>
							</div>
						</div>
						<div class="row list-offer-row">
							<div class="col-xs-12">
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer1.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />54m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />3
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />1
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map1" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">Fort Collins, Colorado 80523, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 320 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 28/11/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 135
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								
								<div class="clearfix"></div>
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer2.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />59m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />3
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />1
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map2" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">West Fourth Street, New York 10003, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 330 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 04/09/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 157
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="clearfix"></div>
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer3.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">house</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />390m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />9
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />4
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map3" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">E. Elwood St. Phoenix, AZ 85034, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 840 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 11/11/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 210
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="clearfix"></div>
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer4.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />80m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />3
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />1
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map4" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">N. Willamette Blvd., Portland, OR 97203, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 380 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 28/11/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 135
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="clearfix"></div>
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer5.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />30m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />1
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />1
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map5" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">One Brookings Drive St. Louis, Missouri 63130, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 310 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 08/10/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 46
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="clearfix"></div>
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer6.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">house</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />350m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />8
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />3
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map6" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">One Neumann Drive Aston, Philadelphia 19014, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 990 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 20/11/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 789
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="clearfix"></div>
								<div class="list-offer">
									<div class="list-offer-left">
										<div class="list-offer-front">
									
											<div class="list-offer-photo">
												<img src="images/grid-offer7.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="list-offer-params">
												<div class="list-area">
													<img src="images/area-icon.png" alt="" />98m<sup>2</sup>
												</div>
												<div class="list-rooms">
													<img src="images/rooms-icon.png" alt="" />4
												</div>
												<div class="list-baths">
													<img src="images/bathrooms-icon.png" alt="" />2
												</div>							
											</div>	
										</div>
										<div class="list-offer-back">
											<div id="list-map7" class="list-offer-map"></div>
										</div>
									</div>
									<div class="list-offer-right">
										<div class="list-offer-text">
											<i class="fa fa-map-marker list-offer-localization hidden-xs"></i>
											<div class="list-offer-h4"><a href="estate-details-right-sidebar.html"><h4 class="list-offer-title">Fort Collins, Colorado 80523, USA</h4></a></div>
											<div class="clearfix"></div>
											<a href="estate-details-right-sidebar.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</a>
											<div class="clearfix"></div>
										</div>
										<div class="profile-list-footer">
											<div class="list-price profile-list-price">
												$ 350 000
											</div>	
											<a href="#" class="profile-list-delete" title="delete offer">
												<i class="fa fa-trash fa-lg"></i>
											</a>	
											<a href="#" class="profile-list-edit" title="delete offer">
												<i class="fa fa-pencil fa-lg"></i>
											</a>	
											<div class="profile-list-info hidden-xs">
											added: 06/11/15
											</div>
											<div class="profile-list-info hidden-xs hidden-sm hidden-md">
											views: 192
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="clearfix"></div>
								
								
							</div>
						</div>
						
						<div class="offer-pagination margin-top-30">
							<a href="#" class="prev"><i class="jfont">&#xe800;</i></a><a class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#" class="next"><i class="jfont">&#xe802;</i></a>
							<div class="clearfix"></div>
						</div>
				</div>			
				<div class="col-xs-12 col-md-3 col-md-pull-9">
					<div class="sidebar-left">
						<h3 class="sidebar-title">Welcome back<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
						<div class="profile-info margin-top-60">
							<div class="profile-info-title negative-margin">Timothy Johnson</div>
							<img src="images/comment-photo1.jpg" alt="" class="pull-left" />
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
    <?php print_script(); print_mapjs_for_myoffer(); ?>
	
	</body>
</html>