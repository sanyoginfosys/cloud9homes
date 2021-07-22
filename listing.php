<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
	if(isset($_GET['page'])){$propertyDetails = GetAvailablePropertyFiltered($_GET['page'],$_GET);}
	else{$propertyDetails = GetAvailablePropertyFiltered(1,$_GET);}
	$totalProperties = GetTotalPropertyCount($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Listings'); ?>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php Infraveo_Homepage_DynamicSuburb_List(); ?>

	<script type="text/javascript">
		$(document).ready(function(){
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
					Infraveo_Custom_Slider_MinMax('#slider-range-price1', 0, 10000000);
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
					Infraveo_Custom_Slider_MinMax('#slider-range-price2', 0, 10000000);
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
					Infraveo_Custom_Slider_MinMax('#slider-range-price3', 0, 10000000);
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
					Infraveo_Custom_Slider_MinMax('#slider-range-price4', 0, 10000000);
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
					Infraveo_Custom_Slider_MinMax('#slider-range-price5', 0, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area5', 0, 5000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
				}
		    });

		    $('#sidebar-transaction').on('change',function(){
				if($('#sidebar-transaction').find(":selected").text() == "For Rent"){
					// $('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price-sidebar', 0, 2000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area5', 0, 5000);
					$('#property-type-select-sidebar').html('<option>Apartments</option><option>Houses</option><option>Town Houses</option><option>Units</option>');
					$('#property-type-select-sidebar').selectpicker("refresh");
				}	else 	{
					// $('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price-sidebar', 0, 10000000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area5', 0, 5000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-bathrooms1', 0, 10);
					$('#property-type-select-sidebar').html('<option>Apartments</option><option>Houses</option><option>Town Houses</option><option>Lands</option><option>Units</option>');
					$('#property-type-select-sidebar').selectpicker("refresh");

				}
		    });

		    $('#property-type-select-sidebar').on('change',function(){
		    	if($('#property-type-select-sidebar').find(":selected").text() == "Lands"){
		    		$('#bedroom-div-slider-sidebar').css({"display":"none"});
		    		$('#bathroom-div-slider-sidebar').css({"display":"none"});
		    	}	else 	{
		    		$('#bedroom-div-slider-sidebar').css({"display":""});
		    		$('#bathroom-div-slider-sidebar').css({"display":""});
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
		
	<section class="adv-search-section no-padding" style="background:url(images/slides/slider_bg.jpg);background-size:cover">
		<div id="offers-map"></div>
		<form id="form_apartments" method="GET">
			<input type="text" name="frm" hidden="true" value="frm_apt" form="form_apartments">
		</form>
		<form id="form_houses" method="GET">
			<input type="text" name="frm" hidden="true" value="frm_hs" form="form_houses">
		</form>
		<form id="form_commercials" method="GET">
			<input type="text" name="frm" hidden="true" value="frm_ths" form="form_commercials">
		</form>
		<form id="form_lands" method="GET">
			<input type="text" name="frm" hidden="true" value="frm_lds"  form="form_lands">
		</form>
		<form id="form_units" method="GET">
			<input type="text" name="frm" hidden="true" value="frm_uts" form="form_units">
		</form>
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

	<section class="section-light section-top-shadow">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-md-push-0">
						<div class="row">
							<div class="col-xs-12 col-lg-6">
								<!-- <h5 class="subtitle-margin">houses for rent, toongabbie, nsw</h5> -->
								<h1><?php echo $totalProperties; ?> estate found<span class="special-color">.</span></h1>
							</div>
							<div class="col-xs-12 col-lg-6">											
								<div class="view-icons-container">
									<a class="view-box view-box-active"><img src="images/grid-icon.png" alt="" /></a>
									<!-- <a class="view-box" href="#"><img src="images/list-icon.png" alt="" /></a> -->
								</div>
								<div class="order-by-container">
									<form id="form_order_by" action="" method="GET">
										<?php
										foreach ($_GET as $key => $value){
											if ($key!="sort"){echo "<input type='text' name='$key' id='$key' value='$value' hidden>";}
										}
										?>
										<select onchange="this.form.submit()" name="sort" class="bootstrap-select" title="Order By:">
											<option value='price_asc' <?php if(isset($_GET['sort'])){if($_GET['sort']=="price_asc"){echo 'selected';}}else{echo 'selected';} ?>>Price low to high</option>
											<option <?php if(isset($_GET['sort'])){if($_GET['sort']=="price_desc"){echo 'selected';}} ?> value='price_desc'>Price high to low</option>
											<option <?php if(isset($_GET['sort'])){if($_GET['sort']=="area_asc"){echo 'selected';}} ?> value='area_asc'>Area low to high</option>
											<option <?php if(isset($_GET['sort'])){if($_GET['sort']=="area_desc"){echo 'selected';}} ?> value='area_desc'>Area high to low</option>
										</select>
									</form>
								</div>	
							</div>							
							<div class="col-xs-12">
								<div class="title-separator-primary"></div>
							</div>
						</div> 
						<div class="row grid-offer-row">
							<?php
							echo'<div class="row" style="padding:10px;">'; 
							#if(isset($_GET['page'])){$i = ($_GET['page']-1)*9;}
							#else{$i=0;}
							$i = 0;
							if($propertyDetails == 0){
								$prop_cnt = 0;
							}
							else{$prop_cnt = count($propertyDetails);}
							if($prop_cnt != 0){
								for($i; $i<$prop_cnt; $i++){
								if($i != 0){
									if(!is_float($i/4)){
										echo'</div><div class="row" style="padding:10px;">';
									}
								}
								else{echo'</div><div class="row" style="padding:10px;">';}
								echo '<div class="col-xs-12 col-sm-3 col-lg-3 grid-offer-col">
									<div class="grid-offer">
										<div class="grid-offer-front">
											<div class="grid-offer-photo" style="max-width:auto;min-height:200px;max-height:200px;">
												<img style="min-height:inherit;max-height:inherit;max-width:auto;" src="'.HOME_URL.$propertyDetails[$i]['image_path'].'" alt="" />
												<div class="type-container">
													<div class="estate-type">'.$propertyDetails[$i]['property_type'].'</div>
													<div class="transaction-type">'.$propertyDetails[$i]['transaction'].'</div>
												</div>
											</div>
											<div class="grid-offer-text">
												<i class="fa fa-map-marker grid-offer-localization"></i>
												<div class="grid-offer-h4">
													<h4 class="grid-offer-title" style="min-height:40px;">'.$propertyDetails[$i]['address'].'</h4>
												</div>
												<p>'.$propertyDetails[$i]['home_promo_text'].'</p>
											</div>
											<div class="price-grid-cont">
												<div class="grid-price-label pull-left">Price:</div>
												<div class="grid-price pull-right">
													$'.$propertyDetails[$i]['price'];
								if($propertyDetails[$i]['transaction'] == 'For Rent' OR $propertyDetails[$i]['transaction'] == 'Rented'){
															echo ' /week';
														}
							echo '</div>
												<div class="clearfix"></div>
											</div>
											<div class="grid-offer-params">
												<div class="grid-area">
													<img src="images/area-icon.png" alt="" />'.$propertyDetails[$i]['area'].' m<sup>2</sup>
												</div>
												<div class="grid-rooms">
													<img src="images/rooms-icon.png" alt="" />'.$propertyDetails[$i]['bedrooms'].'
												</div>
												<div class="grid-baths">
													<img src="images/bathrooms-icon.png" alt="" />'.$propertyDetails[$i]['bathrooms'].'
												</div>							
											</div>	
										</div>
										<div class="grid-offer-back">
											<div id="grid-map'.$i.'" class="grid-offer-map"></div>
											<div class="button">	
												<a href="property/'.$propertyDetails[$i]['slug'].'" class="button-primary">
													<span>read more</span>
													<div class="button-triangle"></div>
													<div class="button-triangle2"></div>
													<div class="button-icon"><i class="fa fa-search"></i></div>
												</a>
											</div>
										</div>
									</div>
								</div>';
													}
								}
								echo'</div>';
							?>
							
						
						</div>
						<div class="offer-pagination margin-top-30">
							<?php
							if(isset($_GET['page'])){ADMIN_postedJobs_pagination($_GET['page'],12,$_GET);} 
							else{ADMIN_postedJobs_pagination(1,12,$_GET);}
							?>
							<!-- <a href="#" class="prev"><i class="jfont">&#xe800;</i></a><a class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#" class="next"><i class="jfont">&#xe802;</i></a> -->
							<div class="clearfix"></div>
						</div>
				</div>
				<!-- <div class="col-xs-12 col-md-3 col-md-pull-9">
					<div class="sidebar-left">
						<h3 class="sidebar-title">FILTER<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
						<div class="sidebar-select-cont">
							<select name="transaction1-sidebar" id="sidebar-transaction" class="bootstrap-select" title="Transaction:">
								<option>For Sale</option>
								<option>For Rent</option>
								<option>Any</option>
							</select>
							<select name="transaction99" id="property-type-select-sidebar" class="bootstrap-select" title="Property Type:">
								<option>Apartments</option>
								<option>Houses</option>
								<option>Town Houses</option>
								<option>Lands</option>
								<option>Units</option>
							</select>
							
							<select name="conuntry1" class="bootstrap-select" title="States:" data-live-search="true" id="xstatex6">
								<option value="NT">The Northern Territory (NT)</option>
								<option value="NSW">New South Wales (NSW)</option>
								<option value="QLD">Queensland (Qld)</option>
								<option value="SA">South Australia (SA)</option>
								<option value="TAS">Tasmania (Tas)</option>
								<option value="ACT">The Australian Capital Territory (ACT)</option>
								<option value="VIC">Victoria (Vic)</option>
								<option value="WA">Western Australia (WA)</option>
							</select>
							<div class="btn-group bootstrap-select loader-icon-top-suburb" style="display: none;">
								<div class="btn dropdown-toggle btn-default">
									<img src="images/loading-icon.gif" class=" bootstrap-select" style="position: relative;  bottom: 0;  right: 0;  margin: auto; height: 30px; width: 30px;" />
								</div>
							</div>
							<select name="city1" class="bootstrap-select" title="Suburb:" data-live-search="true" id="dyn_suburb6">
								<option value="" disabled="disabled">Suburb:</option>
								<option value="" disabled="disabled">Please select a state first</option>
							</select>					
						</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-price-sidebar-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-price-sidebar" data-min="100000" data-max="10000000" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-area-sidebar-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-area-sidebar" data-min="0" data-max="5000" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont" id="bedroom-div-slider-sidebar">	
								<label for="slider-range-bedrooms-sidebar-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms-sidebar" data-min="1" data-max="10" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont" id="bathroom-div-slider-sidebar">	
								<label for="slider-range-bathrooms-sidebar-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms-sidebar" data-min="1" data-max="10" class="slider-range"></div>
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
				</div> -->
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
	
<!-- Script  -->
	<?php print_script(); ?>
	<script type="text/javascript">
		
		google.maps.event.addDomListener(window, 'load', init);
		function init() {		
			var locations = [
			<?php
			for($i=0; $i<count($propertyDetails); $i++){
				echo '['.$propertyDetails[$i]['latitude'].','.$propertyDetails[$i]['longitude'].', "'.HOME_URL.'images/pin-house.png", "'.HOME_URL.'property/'.$propertyDetails[$i]['slug'].'", "'.HOME_URL.$propertyDetails[$i]['image_path'].'", "'.$propertyDetails[$i]['address'].'", "$'.$propertyDetails[$i]['price'];
						if($propertyDetails[$i]['transaction'] == 'For Rent' OR $propertyDetails[$i]['transaction'] == 'Rented'){
													echo ' /week';
												}
					echo '"]';
				if($i != (count($propertyDetails)-1)){echo ','."\xA";}
			}
			?>

			];
			offersMapInit("offers-map",locations);
			<?php
			for($i=0; $i<count($propertyDetails); $i++){
				echo'mapInit('.$propertyDetails[$i]['latitude'].','.$propertyDetails[$i]['longitude'].',"grid-map'.$i.'","'.HOME_URL.'images/pin-house.png", false);'."\xA";
			}
			?>

		}
	</script>

	</body>
</html>