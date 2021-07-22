<?php

function print_script(){
	echo '<!-- jQuery  -->
	    <script type="text/javascript" src="'.HOME_URL.'js/jQuery/jquery.min.js"></script>
		<script type="text/javascript" src="'.HOME_URL.'js/jQuery/jquery-ui.min.js"></script>
			
		<!-- Bootstrap-->
		    <script type="text/javascript" src="'.HOME_URL.'bootstrap/bootstrap.min.js"></script>

		<!-- Google Maps -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPU1ttZ3TXHVdP98xt-cAcUgBQkTV8LrA&amp;libraries=places"></script>
			
		<!-- plugins script -->
			<script type="text/javascript" src="'.HOME_URL.'js/plugins.js"></script>

		<!-- template scripts -->
			<script type="text/javascript" src="'.HOME_URL.'mail/validate.js"></script>
			<script type="text/javascript" src="'.HOME_URL.'js/apartment.js"></script>
			<script type="text/javascript" src="'.HOME_URL.'includes/typeahead.min.js"></script>
			
		<!-- lightbox script -->
			<script src="'.HOME_URL.'includes/jquery.magnific-popup.min.js"></script>';
}

function print_mapjs_for_index(){
	echo '<!-- google maps initialization -->
		<script type="text/javascript">
	            google.maps.event.addDomListener(window, \'load\', init);
				function init() {
					
					//mapInitAddress("narodowa 18 Pruszków","featured-map1","'.HOME_URL.'images/pin-house.png", false);
					
					mapInit(-33.796790,150.965360,"featured-map1","'.HOME_URL.'images/pin-house.png", false);
					mapInit(40.7222,-73.7903,"featured-map2","'.HOME_URL.'images/pin-apartment.png", false);
					mapInit(41.0306,-73.7669,"featured-map3","'.HOME_URL.'images/pin-land.png", false);
					mapInit(41.3006,-72.9440,"featured-map4","'.HOME_URL.'images/pin-commercial.png", false);
					mapInit(42.2418,-74.3626,"featured-map5","'.HOME_URL.'images/pin-house.png", false);
					mapInit(38.8974,-77.0365,"featured-map6","'.HOME_URL.'images/pin-apartment.png", false);
					mapInit(38.7860,-77.0129,"featured-map7","'.HOME_URL.'images/pin-house.png", false);
					
					mapInit(41.2693,-70.0874,"grid-map1","'.HOME_URL.'images/pin-house.png", false);
					mapInit(33.7544,-84.3857,"grid-map2","'.HOME_URL.'images/pin-apartment.png", false);
					mapInit(33.7337,-84.4443,"grid-map3","'.HOME_URL.'images/pin-land.png", false);
					mapInit(33.8588,-84.4858,"grid-map4","'.HOME_URL.'images/pin-commercial.png", false);
					mapInit(34.0254,-84.3560,"grid-map5","'.HOME_URL.'images/pin-apartment.png", false);
					mapInit(40.6128,-73.9976,"grid-map6","'.HOME_URL.'images/pin-house.png", false);
				}
		</script>';
}

function print_mapjs_for_viewdetail(){
	echo '<script type="text/javascript">
            google.maps.event.addDomListener(window, \'load\', init);
			function init() {						
				mapInit(-33.796790,150.965360,"estate-map","'.HOME_URL.'images/pin-house.png", true);
				streetViewInit(-33.796790,150.965360,"estate-street-view");
				
				mapInit(41.2693,-70.0874,"grid-map1","'.HOME_URL.'images/pin-house.png", false);
				mapInit(33.7544,-84.3857,"grid-map2","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(33.7337,-84.4443,"grid-map3","'.HOME_URL.'images/pin-land.png", false);
				mapInit(33.8588,-84.4858,"grid-map4","'.HOME_URL.'images/pin-commercial.png", false);
				mapInit(34.0254,-84.3560,"grid-map5","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(40.6128,-73.9976,"grid-map6","'.HOME_URL.'images/pin-house.png", false);
			}
			</script>';
}

function print_mapjs_for_listing_old(){
	echo '<script type="text/javascript">
            google.maps.event.addDomListener(window, \'load\', init);
			function init() {		
				var locations = [
					[40.6128,-73.9976, "'.HOME_URL.'images/pin-house.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer1.jpg", "Fort Collins, Colorado 80523, USA", "$320 000"],
					[40.7222,-73.7903, "'.HOME_URL.'images/pin-commercial.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer2.jpg", "West Fourth Street, New York 10003, USA", "$350 000"],
					[41.0306,-73.7669, "'.HOME_URL.'images/pin-house.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer3.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$300 000"],
					[41.3006,-72.9440, "'.HOME_URL.'images/pin-apartment.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer4.jpg", "Fort Collins, Colorado 80523, USA", "$410 000"],
					[42.2418,-74.3626, "'.HOME_URL.'images/pin-land.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer5.jpg", "West Fourth Street, New York 10003, USA", "$295 000"],
					[38.8974,-77.0365, "'.HOME_URL.'images/pin-house.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer6.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$390 600"],
					[38.7860,-77.0129, "'.HOME_URL.'images/pin-apartment.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer7.jpg", "Fort Collins, Colorado 80523, USA", "$299 000"],
					[41.2693,-70.0874, "'.HOME_URL.'images/pin-house.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer8.jpg", "Fort Collins, Colorado 80523, USA", "$600 000"],
					[33.7544,-84.3857, "'.HOME_URL.'images/pin-commercial.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer9.jpg", "West Fourth Street, New York 10003, USA", "$350 000"],
					[33.7337,-84.4443, "'.HOME_URL.'images/pin-house.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer10.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$550 000"],
					[33.8588,-84.4858, "'.HOME_URL.'images/pin-land.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer1.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$670 000"],
					[34.0254,-84.3560, "'.HOME_URL.'images/pin-commercial.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer5.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$300 000"],
					[39.6282,-86.1320, "'.HOME_URL.'images/pin-apartment.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer6.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$390 600"],
					[40.5521,-84.5658, "'.HOME_URL.'images/pin-apartment.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer2.jpg", "West Fourth Street, New York 10003, USA", "$350 000"],
					[41.6926,-87.6021, "'.HOME_URL.'images/pin-house.png", "estate-details-right-sidebar.html", "'.HOME_URL.'images/infobox-offer5.jpg", "E. Elwood St. Phoenix, AZ 85034, USA", "$300 000"]
				];
				offersMapInit("offers-map",locations);

				mapInit(41.2693,-70.0874,"grid-map1","'.HOME_URL.'images/pin-house.png", false);
				mapInit(33.7544,-84.3857,"grid-map2","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(33.7337,-84.4443,"grid-map3","'.HOME_URL.'images/pin-land.png", false);
				mapInit(33.8588,-84.4858,"grid-map4","'.HOME_URL.'images/pin-commercial.png", false);
				mapInit(34.0254,-84.3560,"grid-map5","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(40.6128,-73.9976,"grid-map6","'.HOME_URL.'images/pin-house.png", false);
				mapInit(40.6128,-73.7903,"grid-map7","'.HOME_URL.'images/pin-house.png", false);
				mapInit(40.7222,-73.7903,"grid-map8","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(41.0306,-73.7669,"grid-map9","'.HOME_URL.'images/pin-land.png", false);
				mapInit(41.3006,-72.9440,"grid-map10","'.HOME_URL.'images/pin-commercial.png", false);
				mapInit(42.2418,-74.3626,"grid-map11","'.HOME_URL.'images/pin-house.png", false);
				mapInit(38.8974,-77.0365,"grid-map12","'.HOME_URL.'images/pin-apartment.png", false);
			}
	</script>';
}

function print_mapjs_for_listing(){
	echo '<script type="text/javascript">
            google.maps.event.addDomListener(window, \'load\', init);
			function init() {		
				var locations = [
					[-33.796790,150.965360, "'.HOME_URL.'images/pin-house.png", "4bogalararoad.php", "'.HOME_URL.'images/4bogalararoad/image3.jpg", "4 Bogalara Road, Old Toongabbie, NSW 2146", "$470/week"],
					[-33.7333213,150.91864209999994, "'.HOME_URL.'images/pin-house.png", "#", "'.HOME_URL.'images/4bogalararoad/image3.jpg", "99 Tamarind Dr, Acacia Gardens NSW 2763, Australia", "$485/week"],
					[-33.9261166,150.8931193, "'.HOME_URL.'images/blank.png", "#", "", "", ""]
				];
				offersMapInit("offers-map",locations);

				mapInit(-33.796790,150.965360,"grid-map1","'.HOME_URL.'images/pin-house.png", false);
				mapInit(-33.7333213,150.91864209999994,"grid-map2","'.HOME_URL.'images/pin-house.png", false);
				mapInit(-33.9261166,150.8931193,"grid-map2","'.HOME_URL.'images/blank.png", false);
			}
	</script>';
}

function print_mapjs_for_myoffers(){
	echo '<script type="text/javascript">
            google.maps.event.addDomListener(window, \'load\', init);
			function init() {		
				mapInit(41.2693,-70.0874,"list-map1","'.HOME_URL.'images/pin-house.png", false);
				mapInit(33.7544,-84.3857,"list-map2","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(33.7337,-84.4443,"list-map3","'.HOME_URL.'images/pin-land.png", false);
				mapInit(33.8588,-84.4858,"list-map4","'.HOME_URL.'images/pin-commercial.png", false);
				mapInit(34.0254,-84.3560,"list-map5","'.HOME_URL.'images/pin-apartment.png", false);
				mapInit(40.6128,-73.9976,"list-map6","'.HOME_URL.'images/pin-house.png", false);
				mapInit(40.6128,-73.7903,"list-map7","'.HOME_URL.'images/pin-house.png", false);
			}
	</script>';
}
?>