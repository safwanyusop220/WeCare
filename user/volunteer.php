<!DOCTYPE html>
<html>
	<head>
    	<title>Giolocation Tag</title>
    </head>
    <body>


			<!-- This is my google map API KEY. Please Replace Your API KEY -->
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-FuKFMW-k_rXWwHOz2cmoRvO4SpNoWNQ&callback=initMap"
  type="text/javascript"></script>
			<!-- End API KEY -->
			
			<!-- Start JavaScript -->
			<script type="text/javascript" >
			window.onload = getLocation;
			/* Here we will check the browser supports the Geolocation API; if exists, then we will display the location */
			var geo = navigator.geolocation;
			function getLocation() {
			if( geo ) {
			geo.getCurrentPosition( displayLocation );
			} else {
			alert( "Oops, Geolocation API is not supported" );
			}
			}
			/* This function displays the latitude and longitude when the browser has a location. */
			function displayLocation( position ) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			
			var div = document.getElementById( 'location' );
			div.innerHTML = "You are at Latitude: " + latitude + ", Longitude: " + longitude;
			// Call showMap function once we've updated other div's on the page
			displayMap( position.coords );
			}
			// Global Variable that will hold Google Map
			var map;
			/*This method is used to display Google Map. */
			function displayMap( coords ) {
			var googleLatAndLong = new google.maps.LatLng( coords.latitude, coords.longitude );
			
			var mapOptions = {
			zoom: 10,
			center: googleLatAndLong,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			};
			
			var mapDiv = document.getElementById( 'map' );
			map = new google.maps.Map( mapDiv, mapOptions );
			}
			</script>
			 <style type="text/css">
				#location {margin-bottom: 30px;} #map {width: 100%;  height: 300px;}
			 </style>
			<div class="row" align="center">
				<h2> HTML5 Geolocation - This is Your Location  </h2><br>
				
				<div id="location">
				You are Latitude value : _________, Longitude value : _________
				</div>
				
				<div id="map" > </div>
			</div>
        
    </body>
</html>