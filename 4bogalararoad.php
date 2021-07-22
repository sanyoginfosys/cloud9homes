<?php
	include_once('siteconfig.php');
	include_once('includes/frontend_incl.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php print_head('Detail'); ?>
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

		    $('#sidebar-transaction').on('change',function(){
				if($('#sidebar-transaction').find(":selected").text() == "For Rent"){
					// $('#lands_tab_li').css({"display": "none"});
					Infraveo_Custom_Slider_MinMax('#slider-range-price-sidebar', 0, 2000);
					// Infraveo_Custom_Slider_MinMax('#slider-range-area5', 0, 5000);
					$('#property-type-select-sidebar').html('<option>Apartments</option><option>Houses</option><option>Town Houses</option><option>Units</option>');
					$('#property-type-select-sidebar').selectpicker("refresh");
				}	else 	{
					// $('#lands_tab_li').css({"display": ""});
					Infraveo_Custom_Slider_MinMax('#slider-range-price-sidebar', 100000, 10000000);
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
	</script>
	<?php Infraveo_Custom_Slider_MinMax(); ?>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<?php print_nav(); ?>
  			
    <section class="section-dark no-padding">
		<!-- Slider main container -->
		<div id="swiper-gallery" class="swiper-container">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">


				<!-- Slides -->
				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image1.jpg" data-sub-html="<strong>this is a caption 1</strong><br/>Second line of the caption"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated fadeInUp gallery-slide-desc-1">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">house for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>			
						</div>
					</div>	
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image2.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-2">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>	
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image3.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-3">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image4.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-4">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image5.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-5">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image6.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-6">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image7.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-7">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image8.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-8">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image9.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-9">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" data-background="images/4bogalararoad/image10.jpg"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated gallery-slide-desc-10">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">House for rent</h5>
											<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										$470 /week
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>
						</div>
					</div>
				</div>

			</div>
			
			<div class="slide-buttons slide-buttons-center">
				<a href="#" class="navigation-box navigation-box-next slide-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
				<div id="slide-more-cont"></div>
				<a href="#" class="navigation-box navigation-box-prev slide-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
			</div>
			
		</div>	
    </section>

	<section class="thumbs-slider section-both-shadow">
		<div class="container">
			<div class="row">
				<div class="col-xs-1">
					<a href="#" class="thumb-box thumb-prev pull-left"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
				</div>
				<div class="col-xs-10">
					<!-- Slider main container -->
					<div id="swiper-thumbs" class="swiper-container">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images1.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images2.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images3.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images4.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images5.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images6.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images7.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images8.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images9.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/4bogalararoad/images10.jpg" alt="">
							</div>
						<!-- 	<div class="swiper-slide">
								<img class="slide-thumb" src="images/slides/m11.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/slides/m12.jpg" alt="">
							</div>
							<div class="swiper-slide">
								<img class="slide-thumb" src="images/slides/m13.jpg" alt="">
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-xs-1">
					<a href="#" class="thumb-box thumb-next pull-right"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
				</div>
			</div>
		</div>
	</section>

	<section class="section-light no-bottom-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9">
					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-8">
							<div class="details-image pull-left hidden-xs">
								<i class="fa fa-home"></i>
							</div>
							<div class="details-title pull-left">
								<h5 class="subtitle-margin">house for rent</h5>
								<h3>4 Bogalara Road, Old Toongabbie, NSW 2146<span class="special-color">.</span></h3>
							</div>
							<div class="clearfix"></div>	
							<div class="title-separator-primary"></div>
							<p class="details-desc"><br/>
Spacious Large Family Home.... <br/>Convenient Location !!!</br>

Phone Enquiry Property ID: 3489<br/><br/>

This is well presented family home you will be pleasantly surprised with the generous size of the rooms and has a lot to offer. Situated in an ultra-convenient location with good size block of 607 sqm and minutes to schools, shops and bus transport. </p>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4">
							<div class="details-parameters-price">$470 /week</div>
							<div class="details-parameters">
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Property Type</div>
									<div class="details-parameters-val">House</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Bedrooms</div>
									<div class="details-parameters-val">3</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Bathrooms</div>
									<div class="details-parameters-val">1</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Area</div>
									<div class="details-parameters-val">607m<sup>2</sup></div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Price /m<sup>2</sup></div>
									<div class="details-parameters-val">$1</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Carport Spaces</div>
									<div class="details-parameters-val">1</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Garage Spaces</div>
									<div class="details-parameters-val">1</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont details-parameters-cont-last">
									<div class="details-parameters-name">Open Car Spaces</div>
									<div class="details-parameters-val">1</div>
									<div class="clearfix"></div>	
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-top-45">
						<div class="col-xs-6 col-sm-12">
							<ul class="details-ticks">
								<li><i class="jfont">&#xe815;</i>Immaculate interiors featuring spacious living and dining</li>
								<li><i class="jfont">&#xe815;</i>Plentiful natural light throughout and spacious Sun room with leafy outlook</li>
								<li><i class="jfont">&#xe815;</i>Three generous size bedrooms and all with built-in-robes</li>
								<li><i class="jfont">&#xe815;</i>Modern kitchen with gas cooking, plenty of cupboards and breakfast bar</li>
								<li><i class="jfont">&#xe815;</i>Gas Heater Connection</li>
								<li><i class="jfont">&#xe815;</i>Fans in all three bedrooms</li>
								<li><i class="jfont">&#xe815;</i>Large Internal laundry</li>
								<li><i class="jfont">&#xe815;</i>Down lights</li>
								<li><i class="jfont">&#xe815;</i>High Ceiling</li>
								<li><i class="jfont">&#xe815;</i>Beautiful renovated bathroom with SPA</li>
								<li><i class="jfont">&#xe815;</i>Hot water system</li>
								<li><i class="jfont">&#xe815;</i>3 Split Air-conditioning</li>
								<li><i class="jfont">&#xe815;</i>Lock up Garage & Carport</li>
								<li><i class="jfont">&#xe815;</i>Huge Backyard with shaded BBQ and kids play area</li>
							</ul>
						</div>
						<!-- <div class="col-xs-6 col-sm-4">
							<ul class="details-ticks">
								<li><i class="jfont">&#xe815;</i>Garage</li>
								<li><i class="jfont">&#xe815;</i>Lift</li>
								<li><i class="jfont">&#xe815;</i>High standard</li>
								<li><i class="jfont">&#xe815;</i>City Centre</li>
							</ul>
						
						</div>
						<div class="col-xs-6 col-sm-4">
							<ul class="details-ticks">
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
							</ul>
						</div> -->
					</div>
					<div class="row margin-top-45">
						<div class="col-xs-12 apartment-tabs">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab-map" aria-controls="tab-map" role="tab" data-toggle="tab">
										<span>Map</span>
										<div class="button-triangle2"></div>
									</a>
								</li>
								<li role="presentation">
									<a href="#tab-street-view" aria-controls="tab-street-view" role="tab" data-toggle="tab">
										<span>Street view</span>
										<div class="button-triangle2"></div>
									</a>
								</li>
							</ul>
								<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="tab-map">
									<div id="estate-map" class="details-map"></div>
								</div>
								<div role="tabpanel" class="tab-pane" id="tab-street-view">
									<div id="estate-street-view" class="details-map"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row margin-top-60">
						<div class="col-xs-12">
							<h3 class="title-negative-margin">contact the agent<span class="special-color">.</span></h3>
							<div class="title-separator-primary"></div>
						</div>
					</div>
					<div class="row margin-top-60">
						<div class="col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
							<h5 class="subtitle-margin">manager</h5>
							<h3 class="title-negative-margin">Satyajit Chauhan<span class="special-color">.</span></h3>
							<a href="agent-right-sidebar.html" class="agent-photo">
								<img src="images/agent3.jpg" alt="" class="img-responsive" />
							</a> 
						</div>
						<div class="col-xs-12 col-sm-9">
							<div class="agent-social-bar">
								<div class="pull-left">
									<span class="agent-icon-circle">
										<i class="fa fa-phone"></i>
									</span>
									<span class="agent-bar-text">0426990799, 02905633785</span>
								</div>
								<div class="pull-left">
									<span class="agent-icon-circle">
										<i class="fa fa-envelope fa-sm"></i>
									</span>
									<span class="agent-bar-text">info@cloud9homes.com</span>
								</div>
								<div class="pull-right">
									<div class="pull-right">
										<a class="agent-icon-circle" href="https://www.facebook.com/cloud9homes.com.au/">
											<i class="fa fa-facebook"></i>
										</a>
									</div>
									<div class="pull-right">
										<a class="agent-icon-circle icon-margin" href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</div>
									<div class="pull-right">
										<a class="agent-icon-circle icon-margin" href="#">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
									<div class="pull-right">
										<a class="agent-icon-circle icon-margin" href="#">
											<i class="fa fa-skype"></i>
										</a>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<form name="contact-from" action="#">
								<input name="name" type="text" class="input-short main-input" placeholder="Your name" />
								<input name="phone" type="text" class="input-short pull-right main-input" placeholder="Your phone" />
								<input name="mail" type="email" class="input-full main-input" placeholder="Your email" />
								<textarea name="message" class="input-full agent-textarea main-input" placeholder="Your question"></textarea>
								<div class="form-submit-cont">
									<a href="#" class="button-primary pull-right">
										<span>send</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="fa fa-paper-plane"></i></div>
									</a>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div> -->
					
					<!-- <div class="row margin-top-90">
						<div class="col-xs-12 col-sm-9">
							<h5 class="subtitle-margin">hot</h5>
									<h1>new listings<span class="special-color">.</span></h1>
						</div>
						<div class="col-xs-12 col-sm-3">
							<a href="#" class="navigation-box navigation-box-next" id="short-offers-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
							<a href="#" class="navigation-box navigation-box-prev" id="short-offers-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
						</div>
						<div class="col-xs-12">
							<div class="title-separator-primary"></div>
						</div>
					</div>
					
					<div class="short-offers-container">
						<div class="owl-carousel" id="short-offers-owl">
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
					</div> -->
					<div class="margin-top-45"></div>
				</div>
				<div class="col-xs-12 col-md-3">
					<div class="sidebar">
						<h3 class="sidebar-title">filter<span class="special-color">.</span></h3>
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
						<!-- <div class="sidebar-title-cont">
							<h4 class="sidebar-title">featured offers<span class="special-color">.</span></h4>
							<div class="title-separator-primary"></div>
						</div>
						<div class="sidebar-featured-cont">
							<div class="sidebar-featured">
								<a class="sidebar-featured-image" href="estate-details-right-sidebar.html">
									<img src="images/sidebar-featured1.jpg" alt="" />
									<div class="sidebar-featured-type">
										<div class="sidebar-featured-estate">A</div>
										<div class="sidebar-featured-transaction">S</div>
									</div>
								</a>
								<div class="sidebar-featured-title"><a href="estate-details-right-sidebar.html">Fort Collins, Colorado 80523, USA</a></div>
								<div class="sidebar-featured-price">$ 320 000</div>
								<div class="clearfix"></div>						
							</div>
							<div class="sidebar-featured">
								<a class="sidebar-featured-image" href="estate-details-right-sidebar.html">
									<img src="images/sidebar-featured2.jpg" alt="" />
									<div class="sidebar-featured-type">
										<div class="sidebar-featured-estate">A</div>
										<div class="sidebar-featured-transaction">S</div>
									</div>
								</a>
								<div class="sidebar-featured-title"><a href="estate-details-right-sidebar.html">West Fourth Street, New York 10003, USA</a></div>
								<div class="sidebar-featured-price">$ 350 000</div>
								<div class="clearfix"></div>						
							</div>
							<div class="sidebar-featured">
								<a class="sidebar-featured-image" href="estate-details-right-sidebar.html">
									<img src="images/sidebar-featured3.jpg" alt="" />
									<div class="sidebar-featured-type">
										<div class="sidebar-featured-estate">A</div>
										<div class="sidebar-featured-transaction">S</div>
									</div>
								</a>
								<div class="sidebar-featured-title"><a href="estate-details-right-sidebar.html">E. Elwood St. Phoenix, AZ 85034, USA</a></div>
								<div class="sidebar-featured-price">$ 410 000</div>
								<div class="clearfix"></div>					
							</div>
						</div>
						<div class="sidebar-title-cont">
							<h4 class="sidebar-title">latest news<span class="special-color">.</span></h4>
							<div class="title-separator-primary"></div>
						</div>
						<div class="sidebar-blog-cont">
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog1.jpg" alt="" class="sidebar-blog-image" /></a>
								<div class="sidebar-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="sidebar-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog2.jpg" alt="" class="sidebar-blog-image" /></a>
								<div class="sidebar-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="sidebar-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog3.jpg" alt="" class="sidebar-blog-image" /></a>
								<div class="sidebar-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="sidebar-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
						</div> -->
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

<!-- Script  -->
	<?php print_script();print_mapjs_for_viewdetail(); ?>
	
	</body>
</html>