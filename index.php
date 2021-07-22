<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
	include_once('siteconfig.php');
	include_once('base/functions.php');
	include_once('includes/frontend_incl.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Home'); $advertise_list = getAdvertiseList();?>
<style>
	.navbar, .main-menu-cont, .navbar_gradient{
		background-color: white !important;
	}
	/* padding-bottom and top for image */
	.mfp-no-margins img.mfp-img {
		padding: 0;
	}
	/* position of shadow behind the image */
	.mfp-no-margins .mfp-figure:after {
		top: 0;
		bottom: 0;
	}
	/* padding for main container */
	.mfp-no-margins .mfp-container {
		padding: 0;
	}


	/* 

	for zoom animation 
	uncomment this part if you haven't added this code anywhere else

	*/
	

	.mfp-with-zoom .mfp-container,
	.mfp-with-zoom.mfp-bg {
		opacity: 0;
		-webkit-transition: all 0.3s ease-out; 
		-moz-transition: all 0.3s ease-out; 
		-o-transition: all 0.3s ease-out; 
		transition: all 0.3s ease-out;
	}

	.mfp-with-zoom.mfp-ready .mfp-container {
			opacity: 1;
	}
	.mfp-with-zoom.mfp-ready.mfp-bg {
			opacity: 0.8;
	}

	.mfp-with-zoom.mfp-removing .mfp-container, 
	.mfp-with-zoom.mfp-removing.mfp-bg {
		opacity: 0;
	}
	
</style>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php Infraveo_Homepage_DynamicSuburb_List(); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#dyn_suburb1").on("change",function(){
				// alert('Please wait while we fetch your data');
			});
		});


		$(document).ready(function(){

			//DEVELOPMENT TESTING BEGIN
			
			//DEVELOPMENT TESTING END

			$('#features_row_id').on('click', function(){
				window.location.href='request-service.php';
			});
			//Apartment
			$('#apartment_select_option').on('change',function(){
				if($('#apartment_select_option').find(":selected").text() == "For Rent"){
					$('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price1', 0, 2000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area1', 0, 1000);
					Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 1, 10);
				}	else 	{
					$('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price1', 100000, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area1', 0, 1500);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
				}
		    });
		    //House
		    $('#apartment_select_option2').on('change',function(){
				if($('#apartment_select_option2').find(":selected").text() == "For Rent"){
					$('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price2', 0, 2000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area2', 0, 5000);
				}	else 	{
					$('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price2', 100000, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area2', 0, 5000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
				}
		    });
		    //Town House
		    $('#apartment_select_option3').on('change',function(){
				if($('#apartment_select_option3').find(":selected").text() == "For Rent"){
					$('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price3', 0, 2000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area3', 0, 5000);
				}	else 	{
					$('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price3', 100000, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area3', 0, 5000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
				}
		    });
		    //Lands
		    $('#apartment_select_option4').on('change',function(){
				if($('#apartment_select_option4').find(":selected").text() == "For Rent"){
					$('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price4', 0, 300000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area4', 0, 5000);
				}	else 	{
					$('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price4', 100000, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area4', 0, 5000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
				}
		    });
		    //Units
		    $('#apartment_select_option5').on('change',function(){
				if($('#apartment_select_option5').find(":selected").text() == "For Rent"){
					$('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price5', 0, 2000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area5', 0, 5000);
				}	else 	{
					$('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price5', 100000, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area5', 0, 5000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
				}
			});
		});
		function formSubmit(){
			//alert($("#apartments_tab_li").hasClass("active"));
			if($("#apartments_tab_li").hasClass("active")){
				document.getElementById('form_apartments').submit();
			}
			else if($("#houses_tab_li").hasClass("active")){
				document.getElementById('form_houses').submit();
			}
			else if($("#town_houses_tab_li").hasClass("active")){
				document.getElementById('form_commercials').submit();
			}
			else if($("#lands_tab_li").hasClass("active")){
				document.getElementById('form_lands').submit();
			}
			else if($("#units_tab_li").hasClass("active")){
				document.getElementById('form_units').submit();
			}
			//document.getElementById('form_apartments').submit();
		}
	</script>
	<?php Infraveo_Custom_Slider_MinMax(); ?>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
	
    <section class="no-padding adv-search-section">
		<form id="form_apartments" method="GET" action="listing.php">
			<input type="text" name="frm" hidden="true" value="frm_apt" form="form_apartments">
		</form>
		<form id="form_houses" method="GET" action="listing.php">
			<input type="text" name="frm" hidden="true" value="frm_hs" form="form_houses">
		</form>
		<form id="form_commercials" method="GET" action="listing.php">
			<input type="text" name="frm" hidden="true" value="frm_ths" form="form_commercials">
		</form>
		<form id="form_lands" method="GET" action="listing.php">
			<input type="text" name="frm" hidden="true" value="frm_lds"  form="form_lands">
		</form>
		<form id="form_units" method="GET" action="listing.php">
			<input type="text" name="frm" hidden="true" value="frm_uts" form="form_units">
		</form>
		<!-- Slider main container -->
    	<div style="padding: 0px; margin-left: 0px; margin-right: 0px;">
    		<div class="swiper-slide">
				<div class="slide-bg swiper-lazy" data-background="images/slides/2.jpg"></div>
    			<div class="video-slider" style="margin-bottom: -10px;">
                    <video poster="images/slides/2.jpg" preload="auto" loop autoplay muted style="width: 100%;
                        height: 100%;">
                             <source src='images/slides/final_2.mp4' type='video/mp4'  />
                        </video>
                </div>
            </div>
        </div>

		<!-- Add -->
		<form class="adv-search-form" id="list_filter_form" method="GET">
			<div class="adv-search-cont">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-lg-11 adv-search-icons">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs adv-search-tabs" role="tablist">
								<li role="presentation" class="active" data-toggle="tooltip" data-placement="top" title="apartments" id="apartments_tab_li"><a href="#apartments" aria-controls="apartments" role="tab" data-toggle="tab" id="adv-search-tab1"><i class="fa fa-building"></i></a></li>
								<li role="presentation" data-toggle="tooltip" data-placement="top" title="houses" id="houses_tab_li"><a href="#houses" aria-controls="houses" role="tab" data-toggle="tab" id="adv-search-tab2"><i class="fa fa-home"></i></a></li>
								<li role="presentation" data-toggle="tooltip" data-placement="top" title="Town House" id="town_houses_tab_li"><a href="#commercials" aria-controls="commercials" role="tab" data-toggle="tab" id="adv-search-tab3"><i class="fa fa-university"></i></a></li>
								<li role="presentation" data-toggle="tooltip" data-placement="top" title="lands" id="lands_tab_li"><a href="#lands" aria-controls="lands" role="tab" data-toggle="tab" id="adv-search-tab4"><i class="fa fa-tree"></i></a></li>
								<li role="presentation" data-toggle="tooltip" data-placement="top" title="Units" id="units_tab_li"><a href="#units_tab" aria-controls="units_tab" role="tab" data-toggle="tab" id="adv-search-tab4"><i class="fa fa-flag-o"></i></a></li>
							</ul>
						</div>
						<div class="col-lg-1 visible-lg">
							<a id="adv-search-hide" href="#"><i class="jfont">&#xe801;</i></a>
						</div>
					</div>
				</div>
				<div class="container">
			<div class="row tab-content">
				<div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade in active" id="apartments">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="transaction1" class="bootstrap-select" title="Transaction:" id="apartment_select_option" form="form_apartments">
								<option>For Sale</option>
								<option>For Rent</option>
								<option>Any</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="country1" class="bootstrap-select" title="States:" data-live-search="true" id="xstatex1" form="form_apartments">
								<option value="NT">The Northern Territory (NT)</option>
								<option value="NSW">New South Wales (NSW)</option>
								<option value="QLD">Queensland (Qld)</option>
								<option value="SA">South Australia (SA)</option>
								<option value="TAS">Tasmania (Tas)</option>
								<option value="ACT">The Australian Capital Territory (ACT)</option>
								<option value="VIC">Victoria (Vic)</option>
								<option value="WA">Western Australia (WA)</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<!-- <div class="btn-group bootstrap-select loader-icon-top-suburb" style="display: none;">
								<div class="btn dropdown-toggle btn-default">
									<img src="images/loading-icon.gif" class=" bootstrap-select" style="position: relative;  bottom: 0;  right: 0;  margin: auto; height: 30px; width: 30px;" />
								</div>
							</div> -->
							<!-- <select name="city1" class="bootstrap-select dyn_suburb1" data-live-search="true" id="dyn_suburb1" form="form_apartments">
								<option value="" selected>Suburb:</option>
								<option value="" disabled="disabled">Please select a state first</option>
							</select> -->
							<input type="text" name="typeahead" class="bootstrap-select typeahead tt-query input-full main-input" autocomplete="off" placeholder="Please Select a State First" id="dyn_suburb1" form="form_apartments" readonly>
						</div>
						<!-- <div class="col-xs-12 col-sm-6 col-lg-3">
							<select name="location1" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div> -->
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-price1-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price1-value" name="slider-range-price1-value" readonly class="adv-search-amount" form="form_apartments">
								<div class="clearfix"></div>
								<div id="slider-range-price1" data-min="0" data-max="10000000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-area1-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area1-value" name="slider-range-area1-value" readonly class="adv-search-amount" form="form_apartments">
								<div class="clearfix"></div>
								<div id="slider-range-area1" data-min="0" data-max="5000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bedrooms1-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms1-value" name="slider-range-bedrooms1-value" readonly class="adv-search-amount" form="form_apartments">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms1" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bathrooms1-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms1-value" name="slider-range-bathrooms1-value" readonly class="adv-search-amount" form="form_apartments">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms1" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="houses">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="transaction2" class="bootstrap-select" title="Transaction:" id="apartment_select_option2" form="form_houses">
								<option>For Sale</option>
								<option>For Rent</option>
								<option>Any</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="country1" class="bootstrap-select" title="States:" data-live-search="true" id="xstatex2" form="form_houses">
								<option value="NT">The Northern Territory (NT)</option>
								<option value="NSW">New South Wales (NSW)</option>
								<option value="QLD">Queensland (Qld)</option>
								<option value="SA">South Australia (SA)</option>
								<option value="TAS">Tasmania (Tas)</option>
								<option value="ACT">The Australian Capital Territory (ACT)</option>
								<option value="VIC">Victoria (Vic)</option>
								<option value="WA">Western Australia (WA)</option>
							</select>
						</div>

						<div class="col-xs-12 col-sm-6 col-lg-4">
							<!-- <div class="btn-group bootstrap-select loader-icon-top-suburb" style="display: none;">
								<div class="btn dropdown-toggle btn-default">
									<img src="images/loading-icon.gif" class=" bootstrap-select" style="position: relative;  bottom: 0;  right: 0;  margin: auto; height: 30px; width: 30px;" />
								</div>
							</div>
							<select name="city1" class="bootstrap-select dyn_suburb1" data-live-search="true" id="dyn_suburb2" form="form_houses">
								<option value="" selected>Suburb:</option>
								<option value="" disabled="disabled">Please select a state first</option>
							</select> -->
							<input type="text" name="typeahead" class="bootstrap-select typeahead tt-query input-full main-input" autocomplete="off" placeholder="Please Select a State First" id="dyn_suburb2" form="form_houses" readonly>
						</div>
						<!-- <div class="col-xs-12 col-sm-6 col-lg-3">
							<select name="location2" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div> -->
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-price2-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price2-value" name="slider-range-price2-value" readonly class="adv-search-amount" form="form_houses">
								<div class="clearfix"></div>
								<div id="slider-range-price2" data-min="0" data-max="10000000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-area2-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area2-value" name="slider-range-area2-value" readonly class="adv-search-amount" form="form_houses">
								<div class="clearfix"></div>
								<div id="slider-range-area2" data-min="0" data-max="5000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bedrooms2-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms2-value" name="slider-range-bedrooms2-value" readonly class="adv-search-amount" form="form_houses">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms2" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bathrooms2-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms2-value" name="slider-range-bathrooms2-value" readonly class="adv-search-amount" form="form_houses">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms2" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="commercials">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="transaction3" class="bootstrap-select" title="Transaction:" id="apartment_select_option3" form="form_commercials">
								<option>For Sale</option>
								<option>For Rent</option>
								<option>Any</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="country1" class="bootstrap-select" title="States:" data-live-search="true" id="xstatex3" form="form_commercials">
								<option value="NT">The Northern Territory (NT)</option>
								<option value="NSW">New South Wales (NSW)</option>
								<option value="QLD">Queensland (Qld)</option>
								<option value="SA">South Australia (SA)</option>
								<option value="TAS">Tasmania (Tas)</option>
								<option value="ACT">The Australian Capital Territory (ACT)</option>
								<option value="VIC">Victoria (Vic)</option>
								<option value="WA">Western Australia (WA)</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<!-- <div class="btn-group bootstrap-select loader-icon-top-suburb" style="display: none;">
								<div class="btn dropdown-toggle btn-default">
									<img src="images/loading-icon.gif" class=" bootstrap-select" style="position: relative;  bottom: 0;  right: 0;  margin: auto; height: 30px; width: 30px;" />
								</div>
							</div>
							<select name="city1" class="bootstrap-select dyn_suburb1" data-live-search="true" id="dyn_suburb3" form="form_commercials">
								<option value="" selected>Suburb:</option>
								<option value="" disabled="disabled">Please select a state first</option>
							</select> -->
							<input type="text" name="typeahead" class="bootstrap-select typeahead tt-query input-full main-input" autocomplete="off" placeholder="Please Select a State First" id="dyn_suburb3" form="form_commercials" readonly>
						</div>
						<!-- <div class="col-xs-12 col-sm-6 col-lg-3">
							<select name="location3" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div> -->
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-price3-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price3-value" name="slider-range-price3-value" readonly class="adv-search-amount" form="form_commercials">
								<div class="clearfix"></div>
								<div id="slider-range-price3" data-min="0" data-max="10000000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-area3-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area3-value" name="slider-range-area3-value" readonly class="adv-search-amount" form="form_commercials">
								<div class="clearfix"></div>
								<div id="slider-range-area3" data-min="0" data-max="5000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bedrooms3-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms3-value" name="slider-range-bedrooms3-value" readonly class="adv-search-amount" form="form_commercials">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms3" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bathrooms3-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms3-value" name="slider-range-bathrooms3-value" readonly class="adv-search-amount" form="form_commercials">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms3" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="lands">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="transaction4" class="bootstrap-select" title="Transaction:" id="apartment_select_option4" form="form_lands">
								<option>For Sale</option>
								<option>For Rent</option>
								<option>Any</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="country1" class="bootstrap-select" title="States:" data-live-search="true" id="xstatex4" form="form_lands">
								<option value="NT">The Northern Territory (NT)</option>
								<option value="NSW">New South Wales (NSW)</option>
								<option value="QLD">Queensland (Qld)</option>
								<option value="SA">South Australia (SA)</option>
								<option value="TAS">Tasmania (Tas)</option>
								<option value="ACT">The Australian Capital Territory (ACT)</option>
								<option value="VIC">Victoria (Vic)</option>
								<option value="WA">Western Australia (WA)</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<!-- <div class="btn-group bootstrap-select loader-icon-top-suburb" style="display: none;">
								<div class="btn dropdown-toggle btn-default">
									<img src="images/loading-icon.gif" class=" bootstrap-select" style="position: relative;  bottom: 0;  right: 0;  margin: auto; height: 30px; width: 30px;" />
								</div>
							</div>
							<select name="city1" class="bootstrap-select dyn_suburb1" data-live-search="true" id="dyn_suburb4" form="form_lands">
								<option value="" selected>Suburb:</option>
								<option value="" disabled="disabled">Please select a state first</option>
							</select> -->
							<input type="text" name="typeahead" class="bootstrap-select typeahead tt-query input-full main-input" autocomplete="off" placeholder="Please Select a State First" id="dyn_suburb4" form="form_lands" readonly>
						</div>
						<!-- <div class="col-xs-12 col-sm-6 col-lg-3">
							<select name="location4" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div> -->
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-price4-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price4-value" name="slider-range-price4-value" readonly class="adv-search-amount" form="form_lands">
								<div class="clearfix"></div>
								<div id="slider-range-price4" data-min="0" data-max="10000000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-area4-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area4-value" name="slider-range-area4-value" readonly class="adv-search-amount" form="form_lands">
								<div class="clearfix"></div>
								<div id="slider-range-area4" data-min="0" data-max="5000" class="slider-range"></div>
							</div>
						</div>
					</div>
					
				</div>
				<div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade" id="units_tab">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="transaction5" class="bootstrap-select" title="Transaction:" id="apartment_select_option5" form="form_units">
								<option>For Sale</option>
								<option>For Rent</option>
								<option>Any</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<select name="country1" class="bootstrap-select" title="States:" data-live-search="true" id="xstatex5" form="form_units">
								<option value="NT">The Northern Territory (NT)</option>
								<option value="NSW">New South Wales (NSW)</option>
								<option value="QLD">Queensland (Qld)</option>
								<option value="SA">South Australia (SA)</option>
								<option value="TAS">Tasmania (Tas)</option>
								<option value="ACT">The Australian Capital Territory (ACT)</option>
								<option value="VIC">Victoria (Vic)</option>
								<option value="WA">Western Australia (WA)</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<!-- <div class="btn-group bootstrap-select loader-icon-top-suburb" style="display: none;">
								<div class="btn dropdown-toggle btn-default">
									<img src="images/loading-icon.gif" class=" bootstrap-select" style="position: relative;  bottom: 0;  right: 0;  margin: auto; height: 30px; width: 30px;" />
								</div>
							</div>
							<select name="city1" class="bootstrap-select dyn_suburb1" data-live-search="true" id="dyn_suburb5" form="form_units">
								<option value="" selected>Suburb:</option>
								<option value="" disabled="disabled">Please select a state first</option>
							</select> -->
							<input type="text" name="typeahead" class="bootstrap-select typeahead tt-query input-full main-input" autocomplete="off" placeholder="Please Select a State First" id="dyn_suburb5" form="form_units" readonly>
						</div>
						<!-- <div class="col-xs-12 col-sm-6 col-lg-3">
							<select name="location4" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div> -->
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-price5-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price5-value" name="slider-range-price5-value" readonly class="adv-search-amount" form="form_units">
								<div class="clearfix"></div>
								<div id="slider-range-price5" data-min="0" data-max="10000000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-area5-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area5-value" name="slider-range-area5-value" readonly class="adv-search-amount" form="form_units">
								<div class="clearfix"></div>
								<div id="slider-range-area5" data-min="0" data-max="5000" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bedrooms5-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms5-value" name="slider-range-bedrooms5-value" readonly class="adv-search-amount" form="form_units">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms5" data-min="0" data-max="10" class="slider-range"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="adv-search-range-cont">	
								<label for="slider-range-bathrooms5-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms5-value" name="slider-range-bathrooms5-value" readonly class="adv-search-amount" form="form_units">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms5" data-min="0" data-max="4" class="slider-range"></div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-3 col-md-offset-6 col-lg-offset-9 adv-search-button-cont">
							<a href="javascript:{}" onclick="formSubmit();" class="button-primary pull-right">
								<span>search</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</form>
    </section>
	
    <section class="section-light bottom-padding-45 section-both-shadow">
		<div class="container">
			<div class="row" id="features_row_id">
				<div class="col-sm-6 col-lg-3">
					<div class="feature wow fadeInRight" id="feature4">
						<div class="feature-icon center-block"><i class="fa fa-money"></i></div>
						<div class="feature-text">
							<h5 class="subtitle-margin">FREE PROPERTY</h5>
							<h3>VALUATION<span class="special-color">.</span></h3>
							<div class="title-separator center-block feature-separator"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p> -->
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="feature wow fadeInLeft" id="feature1">
						<div class="feature-icon center-block"><i class="fa fa-medkit"></i></div>
						<div class="feature-text">
							<h5 class="subtitle-margin">PROPERTY & MORTGAGE</h5>
							<h3>HEALTH CHECK<span class="special-color">.</span></h3>
							<div class="title-separator center-block feature-separator"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p> -->
						</div>
					</div>
				</div>			
				<div class="col-sm-6 col-lg-3">
					<div class="feature wow fadeInUp" id="feature2">
						<div class="feature-icon center-block"><i class="fa fa-search"></i></div>
						<div class="feature-text">
							<h5 class="subtitle-margin">RENTAL PROPERTY</h5>
							<h3>INSPECTION<span class="special-color">.</span></h3>
							<div class="title-separator center-block feature-separator"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p> -->
						</div>
					</div>
				</div>			
				<div class="col-sm-6 col-lg-3">
					<div class="feature wow fadeInUp" id="feature3">
						<div class="feature-icon center-block"><i class="fa fa-building"></i></div>
						<div class="feature-text">
							<h5 class="subtitle-margin">FREE RENTAL</h5>
							<h3>APPRAISAL<span class="special-color">.</span></h3>
							<div class="title-separator center-block feature-separator"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p> -->
						</div>
					</div>
				</div>			
				
			</div>
		</div>
    </section>
    <?php if($advertise_list != 0){ 
		if(count($advertise_list) == 1)
		{
			echo "<section>
			<div class='container text-center'>
				<div class='row' style='padding:20px;'>
					<div class='col-xs-12'>
						<h1 class='second-color'>Latest Offer</h1>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-4 col-sm-12'></div>
					<div class='col-lg-4 col-sm-12'>
						<a class='image-popup-no-margins' href='".$advertise_list[0]['image_url']."'>
							<img height='100%' width='100%' src='".$advertise_list[0]['image_url']."' style='padding:20px;'>
						</a>
					</div>
					<div class='col-lg-4 col-sm-12'></div>
				</div>
			</div>
		</section>";}
		else if(count($advertise_list) == 2)
		{
			echo "<section>
			<div class='container text-center'>
				<div class='row' style='padding:20px;'>
					<div class='col-xs-12'>
						<h1 class='second-color'>Latest Offer</h1>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-2 col-sm-12'></div>
					<div class='col-lg-4 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[0]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[0]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-4 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[1]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[1]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-2 col-sm-12'></div>
				</div>
			</div>
		</section>";}
		else if(count($advertise_list) == 3)
		{
			echo "<section>
			<div class='container text-center'>
				<div class='row' style='padding:20px;'>
					<div class='col-xs-12'>
						<h1 class='second-color'>Latest Offer</h1>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-4 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[0]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[0]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-4 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[1]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[1]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-4 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[2]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[2]['image_url']."' style='padding:20px;'>
					</a>
					</div>
				</div>
			</div>
		</section>";}
		else if(count($advertise_list) == 4)
		{
			echo "<section>
			<div class='container text-center'>
				<div class='row' style='padding:20px;'>
					<div class='col-xs-12'>
						<h1 class='second-color'>Latest Offer</h1>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-3 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[0]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[0]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-3 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[1]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[1]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-3 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[2]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[2]['image_url']."' style='padding:20px;'>
					</a>
					</div>
					<div class='col-lg-3 col-sm-12'>
					<a class='image-popup-no-margins' href='".$advertise_list[3]['image_url']."'>
						<img height='100%' width='100%' src='".$advertise_list[3]['image_url']."' style='padding:20px;'>
					</a>
					</div>
				</div>
			</div>
		</section>";}
		}
		?>
    <section class="featured-offers parallax">
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-9">
					<h5 class="subtitle-margin second-color">highly recommended</h5>
							<h1 class="second-color">CURRENT LISTING<span class="special-color">.</span></h1>
				</div>
				<div class="col-xs-12 col-sm-3">
					<a href="#" class="navigation-box navigation-box-next" id="featured-offers-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
					<a href="#" class="navigation-box navigation-box-prev" id="featured-offers-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>								
				</div>
				<div class="col-xs-12">
					<div class="title-separator-secondary"></div>
				</div>
			</div>
		</div>
		<div class="featured-offers-container">
			<div class="owl-carousel" id="featured-offers-owl">

				<?php $propertyDetails = GetAvailablePropertyIndexPage(8);
				//count($propertyDetails);
				for($i=0; $i<count($propertyDetails); $i++){
				echo'<div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo" style="min-height:250px;max-height:250px;">
							<img style="min-height:inherit;max-height:inherit;min-width: -webkit-fill-available;" src="'.HOME_URL.$propertyDetails[$i]['image_path'].'" alt="" />
							<div class="type-container">
								<div class="estate-type">'.$propertyDetails[$i]['transaction'].'</div>
								<!-- <div class="transaction-type">Rent</div> -->
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title" style="min-height:34px;">'.$propertyDetails[$i]['address'].'</h4>
							<p>'.$propertyDetails[$i]['home_promo_text'].'</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />'.$propertyDetails[$i]['area'].' m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />'.$propertyDetails[$i]['bedrooms'].'
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />'.$propertyDetails[$i]['bathrooms'].'
							</div>							
						</div>
						<div class="featured-price">
							$'.$propertyDetails[$i]['price'];
							if($propertyDetails[$i]['transaction'] == 'For Rent' OR $propertyDetails[$i]['transaction'] == 'Rented'){
														echo ' /week';
													}
						echo '</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map'.$i.'" class="featured-offer-map"></div>
						<div class="button">	
							<a href="property/'.$propertyDetails[$i]['slug'].'" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>	
				</div>';
				}
				?>

			<!-- 	<div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo">
							<img src="images/featured-offer2.jpg" alt="" />
							<div class="type-container">
								<div class="estate-type">apartment</div>
								<div class="transaction-type">sale</div>
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title">West Fourth Street, New York 10003, USA</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />70m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />4
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />1
							</div>							
						</div>
						<div class="featured-price">
							$ 350 000
						</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map2" class="featured-offer-map"></div>
							<div class="button">	
							<a href="estate-details-right-sidebar.html" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div> -->

				<!-- <div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo">
							<img src="images/featured-offer3.jpg" alt="" />
							<div class="type-container">
								<div class="estate-type">house</div>
								<div class="transaction-type">sale</div>
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title">500 E. Elwood St. Phoenix, AZ 85034, USA</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />250m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />7
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />3
							</div>							
						</div>
						<div class="featured-price">
							$ 650 000
						</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map3" class="featured-offer-map"></div>
							<div class="button">	
							<a href="estate-details-right-sidebar.html" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div>

				<div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo">
							<img src="images/featured-offer4.jpg" alt="" />
							<div class="type-container">
								<div class="estate-type">apartment</div>
								<div class="transaction-type">sale</div>
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title">N. Willamette Blvd., Portland, OR 97203-5798, USA</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />40m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />2
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />1
							</div>							
						</div>
						<div class="featured-price">
							$ 299 000
						</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map4" class="featured-offer-map"></div>
							<div class="button">	
							<a href="estate-details-right-sidebar.html" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div>

				<div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo">
							<img src="images/featured-offer5.jpg" alt="" />
							<div class="type-container">
								<div class="estate-type">apartment</div>
								<div class="transaction-type">sale</div>
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title">One Brookings Drive St. Louis, Missouri 63130-4899, USA</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />80m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />3
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />1
							</div>							
						</div>
						<div class="featured-price">
							$ 390 000
						</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map5" class="featured-offer-map"></div>
							<div class="button">	
							<a href="estate-details-right-sidebar.html" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div>

				<div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo">
							<img src="images/featured-offer6.jpg" alt="" />
							<div class="type-container">
								<div class="estate-type">apartment</div>
								<div class="transaction-type">sale</div>
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title">One Neumann Drive Aston, Philadelphia 19014-1298, USA</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />54m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />3
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />1
							</div>							
						</div>
						<div class="featured-price">
							$ 320 000
						</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map6" class="featured-offer-map"></div>
							<div class="button">	
							<a href="estate-details-right-sidebar.html" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div>

				<div class="featured-offer-col">
					<div class="featured-offer-front">
						<div class="featured-offer-photo">
							<img src="images/featured-offer7.jpg" alt="" />
							<div class="type-container">
								<div class="estate-type">house</div>
								<div class="transaction-type">sale</div>
							</div>
						</div>
						<div class="featured-offer-text">
							<h4 class="featured-offer-title">200 South Dr, Fort Collins, Colorado 80523, USA</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="featured-offer-params">
							<div class="featured-area">
								<img src="images/area-icon.png" alt="" />54m<sup>2</sup>
							</div>
							<div class="featured-rooms">
								<img src="images/rooms-icon.png" alt="" />3
							</div>
							<div class="featured-baths">
								<img src="images/bathrooms-icon.png" alt="" />1
							</div>							
						</div>
						<div class="featured-price">
							$ 320 000
						</div>
					</div>
					<div class="featured-offer-back">
						<div id="featured-map7" class="featured-offer-map"></div>
							<div class="button">	
							<a href="estate-details-right-sidebar.html" class="button-primary">
								<span>read more</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
					</div>
				</div>  -->
			</div>
		</div>
    </section>
	
	<section class="section-light top-padding-45 bottom-padding-45">
		<div class="container">
			<div class="row count-container">
				<div class="col-xs-6 col-lg-3">
					<div class="number" id="number1">
						<div class="number-img">	
							<i class="fa fa-building"></i>
						</div>
						<span class="number-label text-color2">APARTMENTS</span>
						<span class="number-big text-color3 count" data-from="0" data-to="130" data-speed="2000"></span>
					</div>
				</div>
				<div class="col-xs-6 col-lg-3 number_border">
					<div class="number" id="number2">
						<div class="number-img">	
							<i class="fa fa-home"></i>	
						</div>			
						<span class="number-label text-color2">HOUSES</span>
						<span class="number-big text-color3 count" data-from="0" data-to="107" data-speed="2000"></span>
					</div>
				</div>
				<div class="col-xs-6 col-lg-3 number_border3">
					<div class="number" id="number3">
						<div class="number-img">	
							<i class="fa fa-industry"></i>
						</div>
						<span class="number-label text-color2">COMMERCIAL</span>
						<span class="number-big text-color3 count" data-from="0" data-to="149" data-speed="2000"></span>
					</div>
				</div>
				<div class="col-xs-6 col-lg-3 number_border">
					<div class="number" id="number4">
						<div class="number-img">
							<i class="fa fa-tree"></i>
						</div>
						<span class="number-label text-color2">LAND</span>
						<span class="number-big text-color3 count" data-from="0" data-to="25" data-speed="2000"></span>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<?php $testimonial_visible = CheckNoOfTestimonials();
	if($testimonial_visible == 0) {} else { ?>
	<section class="testimonials parallax">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-9">
					<h5 class="subtitle-margin second-color">recommendations</h5>
							<h1 class="second-color">our clients say<span class="special-color">.</span></h1>
				</div>
				<div class="col-xs-12 col-sm-3">
					<a href="#" class="navigation-box navigation-box-next" id="testimonials-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
					<a href="#" class="navigation-box navigation-box-prev" id="testimonials-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
				</div>
				<div class="col-xs-12">
					<div class="title-separator-secondary"></div>
				</div>
			</div>
		</div>

			<div class="container margin-top-90">
				<div class="row">
					<div class="col-xs-12 owl-carousel" id="testimonials-owl">
						<?php PrintTestimonials(); ?>
					</div>

				</div>
				<br /> <br /> <center>
				<button  class="button-primary button-shadow " onclick="window.location.href = 'client-testimonials.php';" name="submitbtn1" id="submitbtn12222">
						<span>Write a testimonial</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
					</button>
				</center>
			</div>
	</section>
	<?php } ?>
	<!-- <section class="section-light bottom-padding-45 section-top-shadow">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-9">
					<h5 class="subtitle-margin">hot</h5>
							<h1>new listings<span class="special-color">.</span></h1>
				</div>
				<div class="col-xs-12 col-sm-3">
					<a href="#" class="navigation-box navigation-box-next" id="grid-offers-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
					<a href="#" class="navigation-box navigation-box-prev" id="grid-offers-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
				</div>
				<div class="col-xs-12">
					<div class="title-separator-primary"></div>
				</div>
			</div>
		</div>
		<div class="grid-offers-container">
			<div class="owl-carousel" id="grid-offers-owl">
				<div class="grid-offer-col">
					<div class="grid-offer">
						<div class="grid-offer-front">				
							<div class="grid-offer-photo">
								<img src="images/grid-offer1.jpg" alt="" />
								<div class="type-container">
									<div class="estate-type">apartment</div>
									<div class="transaction-type">sale</div>
								</div>
							</div>
							<div class="grid-offer-text">
								<i class="fa fa-map-marker grid-offer-localization"></i>
								<div class="grid-offer-h4"><h4 class="grid-offer-title">34 Fort Collins, Colorado 80523, USA</h4></div>
								<div class="clearfix"></div>
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
								<div class="clearfix"></div>
							</div>
							<div class="price-grid-cont">
								<div class="grid-price-label pull-left">Price:</div>
								<div class="grid-price pull-right">
									$ 320 000
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="grid-offer-params">
								<div class="grid-area">
									<img src="images/area-icon.png" alt="" />54m<sup>2</sup>
								</div>
								<div class="grid-rooms">
									<img src="images/rooms-icon.png" alt="" />3
								</div>
								<div class="grid-baths">
									<img src="images/bathrooms-icon.png" alt="" />1
								</div>							
							</div>	
							
						</div>
						<div class="grid-offer-back">
							<div id="grid-map1" class="grid-offer-map"></div>
							<div class="button">	
								<a href="estate-details-right-sidebar.html" class="button-primary">
									<span>read more</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-search"></i></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-offer-col">
					<div class="grid-offer">
						<div class="grid-offer-front">
							<div class="grid-offer-photo">
								<img src="images/grid-offer2.jpg" alt="" />
								<div class="type-container">
									<div class="estate-type">apartment</div>
									<div class="transaction-type">sale</div>
								</div>
							</div>
							<div class="grid-offer-text">
								<i class="fa fa-map-marker grid-offer-localization"></i>
								<div class="grid-offer-h4"><h4 class="grid-offer-title">West Fourth Street, New York 10003, USA</h4></div>
								<div class="clearfix"></div>
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
								<div class="clearfix"></div>
							</div>
							<div class="price-grid-cont">
								<div class="grid-price-label pull-left">Price:</div>
								<div class="grid-price pull-right">
									$ 299 000
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="grid-offer-params">
								<div class="grid-area">
									<img src="images/area-icon.png" alt="" />48m<sup>2</sup>
								</div>
								<div class="grid-rooms">
									<img src="images/rooms-icon.png" alt="" />2
								</div>
								<div class="grid-baths">
									<img src="images/bathrooms-icon.png" alt="" />1
								</div>							
							</div>	
						</div>
						<div class="grid-offer-back">
							<div id="grid-map2" class="grid-offer-map"></div>
							<div class="button">	
								<a href="estate-details-right-sidebar.html" class="button-primary">
									<span>read more</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-search"></i></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-offer-col">
					<div class="grid-offer">
						<div class="grid-offer-front">
							<div class="grid-offer-photo">
								<img src="images/grid-offer3.jpg" alt="" />
								<div class="type-container">
									<div class="estate-type">apartment</div>
									<div class="transaction-type">sale</div>
								</div>
							</div>
							<div class="grid-offer-text">
								<i class="fa fa-map-marker grid-offer-localization"></i>
								<div class="grid-offer-h4"><h4 class="grid-offer-title">E. Elwood St. Phoenix, AZ 85034, USA</h4></div>
								<div class="clearfix"></div>
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
								<div class="clearfix"></div>
							</div>
							<div class="price-grid-cont">
								<div class="grid-price-label pull-left">Price:</div>
								<div class="grid-price pull-right">
									$ 400 000
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="grid-offer-params">
								<div class="grid-area">
									<img src="images/area-icon.png" alt="" />93m<sup>2</sup>
								</div>
								<div class="grid-rooms">
									<img src="images/rooms-icon.png" alt="" />4
								</div>
								<div class="grid-baths">
									<img src="images/bathrooms-icon.png" alt="" />2
								</div>							
							</div>	
						</div>
						<div class="grid-offer-back">
							<div id="grid-map3" class="grid-offer-map"></div>
							<div class="button">	
								<a href="estate-details-right-sidebar.html" class="button-primary">
									<span>read more</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-search"></i></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-offer-col">
					<div class="grid-offer">
						<div class="grid-offer-front">
							<div class="grid-offer-photo">
								<img src="images/grid-offer4.jpg" alt="" />
								<div class="type-container">
									<div class="estate-type">house</div>
									<div class="transaction-type">sale</div>
								</div>
							</div>
							<div class="grid-offer-text">
								<i class="fa fa-map-marker grid-offer-localization"></i>
								<div class="grid-offer-h4"><h4 class="grid-offer-title">N. Willamette Blvd., Portland, OR 97203, USA</h4></div>
								<div class="clearfix"></div>
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
								<div class="clearfix"></div>
							</div>
							<div class="price-grid-cont">
								<div class="grid-price-label pull-left">Price:</div>
								<div class="grid-price pull-right">
									$ 800 000
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="grid-offer-params">
								<div class="grid-area">
									<img src="images/area-icon.png" alt="" />300m<sup>2</sup>
								</div>
								<div class="grid-rooms">
									<img src="images/rooms-icon.png" alt="" />8
								</div>
								<div class="grid-baths">
									<img src="images/bathrooms-icon.png" alt="" />3
								</div>							
							</div>	
						</div>
						<div class="grid-offer-back">
							<div id="grid-map4" class="grid-offer-map"></div>
							<div class="button">	
								<a href="estate-details-right-sidebar.html" class="button-primary">
									<span>read more</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-search"></i></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-offer-col">
					<div class="grid-offer">
						<div class="grid-offer-front">
							<div class="grid-offer-photo">
								<img src="images/grid-offer5.jpg" alt="" />
								<div class="type-container">
									<div class="estate-type">apartment</div>
									<div class="transaction-type">sale</div>
								</div>
							</div>
							<div class="grid-offer-text">
								<i class="fa fa-map-marker grid-offer-localization"></i>
								<div class="grid-offer-h4"><h4 class="grid-offer-title">One Brookings Drive St. Louis, Missouri 63130, USA</h4></div>
								<div class="clearfix"></div>
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
								<div class="clearfix"></div>
							</div>
							<div class="price-grid-cont">
								<div class="grid-price-label pull-left">Price:</div>
								<div class="grid-price pull-right">
									$ 320 000
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="grid-offer-params">
								<div class="grid-area">
									<img src="images/area-icon.png" alt="" />50m<sup>2</sup>
								</div>
								<div class="grid-rooms">
									<img src="images/rooms-icon.png" alt="" />2
								</div>
								<div class="grid-baths">
									<img src="images/bathrooms-icon.png" alt="" />1
								</div>							
							</div>	
						</div>
						<div class="grid-offer-back">
							<div id="grid-map5" class="grid-offer-map"></div>
							<div class="button">	
								<a href="estate-details-right-sidebar.html" class="button-primary">
									<span>read more</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-search"></i></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-offer-col">
					<div class="grid-offer">
						<div class="grid-offer-front">
							<div class="grid-offer-photo">
								<img src="images/grid-offer7.jpg" alt="" />
								<div class="type-container">
									<div class="estate-type">house</div>
									<div class="transaction-type">sale</div>
								</div>
							</div>
							<div class="grid-offer-text">
								<i class="fa fa-map-marker grid-offer-localization"></i>
								<div class="grid-offer-h4"><h4 class="grid-offer-title">One Neumann Drive Aston, Philadelphia 19014, USA</h4></div>
								<div class="clearfix"></div>
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
								<div class="clearfix"></div>
							</div>
							<div class="price-grid-cont">
								<div class="grid-price-label pull-left">Price:</div>
								<div class="grid-price pull-right">
									$ 500 000
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="grid-offer-params">
								<div class="grid-area">
									<img src="images/area-icon.png" alt="" />210m<sup>2</sup>
								</div>
								<div class="grid-rooms">
									<img src="images/rooms-icon.png" alt="" />6
								</div>
								<div class="grid-baths">
									<img src="images/bathrooms-icon.png" alt="" />2
								</div>							
							</div>	
						</div>
						<div class="grid-offer-back">
							<div id="grid-map6" class="grid-offer-map"></div>
							<div class="button">	
								<a href="estate-details-right-sidebar.html" class="button-primary">
									<span>read more</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-search"></i></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->	

<!-- Footer		 -->
	<?php print_footer(); ?>   
</div>	

<!-- Move to top button -->
	<?php move2top(); ?>

<!-- Login, Register, Forget Password -->
	<?php print_login_modal();?>

<!-- Script -->
	<?php print_script(); ?>

	<!-- google maps initialization -->
		<script type="text/javascript">
			google.maps.event.addDomListener(window, 'load', init);
			function init() {
				<?php for($i=0; $i<count($propertyDetails); $i++){
					echo 'mapInit('.$propertyDetails[$i]['latitude'].','.$propertyDetails[$i]['longitude'].',"featured-map'.$i.'","'.HOME_URL.'images/pin-house.png", false);';
				}
				?>

			}
		</script>
		<script>
			$(document).ready(function() {

				$('.image-popup-no-margins').magnificPopup({
					type: 'image',
					closeOnContentClick: true,
					closeBtnInside: false,
					fixedContentPos: true,
					mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
					image: {
						verticalFit: true
					},
					zoom: {
						enabled: true,
						duration: 300 // don't foget to change the duration also in CSS
					}
				});

			});
		</script>
	</body>
</html>