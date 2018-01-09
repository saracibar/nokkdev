<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'app/init.php';
if (Auth::guest()) {
	redirect_to(App::url());
}else{
	$userid = auth::user()->id;
}
require_once 'stepswizard.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Nokk - Add your Property - Step 1: Addresss</title>
	<!-- <link rel="stylesheet" href="global/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/forms.css">
</head>
<body>
  

		<div class="container">
					<div class="row formdiv">
							<div class="col-md-6">
								<div class="map_canvas"></div>
							</div>
						
							<div class="col-md-6">
							<form id="form10-1" name="form10-1" method="post" action="p.php">
							  <fieldset>   
								 <label>Street Address</label>
							  <input id="geocomplete" name="geocomplete" type="text" autocomplete="off" placeholder="e.g. 123 Main St." value="" />

							   <label>Apt, Suite, Bldg. (optional)</label>
								<input type="text" name="apt" autocomplete="off"  placeholder="e.g. Apt #7" value="">

								<label>City</label>
								<input name="locality" type="text" value="">

								<label>State</label><div></div>
								<input name="administrative_area_level_1" type="text" value="">

								 <label>Zip Code</label>
								<input name="postal_code" type="text" value="">

								<div style="display:none">

								<label>Name</label>
								<input name="name" type="text" value="">

								<label>Latitude</label>
								<input name="lat" type="text" value="">

								<label>Longitude</label>
								<input name="lng" type="text" value="">

								<label>Location</label>
								<input name="location" type="text" value="">

								<label>Formatted Address</label>
								<input name="formatted_address" type="text" value="">

								<label>Viewport</label>
								<input name="viewport" type="text" value="">

								<label>Route</label>
								<input name="route" type="text" value="">

								<label>Street Number</label>
								<input name="street_number" type="text" value="">

								<label>Sub Locality</label>
								<input name="sublocality" type="text" value="">

								<label>Country</label>
								<input name="country" type="text" value="">

								<label>Country Code</label>
								<input name="country_short" type="text" value="">

								<label>Place ID</label>
								<input name="place_id" type="text" value="">

								<label>ID</label>
								<input name="id" type="text" value="">

								<label>Reference</label>
								<input name="reference" type="text" value="">

								<label>URL</label>
								<input name="url" type="text" value="">
								</div>
							  </fieldset>
							  <input name="formid" id="formid" type="hidden" value="10"> 
							 <input name="step" id="step" type="hidden" value="1"> 
							</form>
							</div>
					</div>
					<div class="divider d-none d-sm-block" ></div>
							 <div>	
									<!-- 	<button type="submit" form="form10-1"  class="btn btn-primary btn-lg btn-outline-secondary raised">Cancel</button> -->
									<button type="submit" form="form10-1" class="btn btn-primary btn-lg raised float-right nextbtn">Next</button>
							</div>
			</div>
	<!-- END CONTENT -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBccMwsltxA-99aTkEoQzttDTWmuR-tbQg&libraries=places"></script>
	<script src="global/vendor/jquery/jquery.js"></script>
	<script src="/jquery.geocomplete.js"></script>
    <script>
      $(function(){
		  
        $("#geocomplete").geocomplete({
          map: ".map_canvas",
		  mapOptions: {
			  backgroundColor:  "url(bg.jpg)",
			  //styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c8d7d4"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]}]
			  styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
		  },
          details: "form",
          types: ["geocode"],
        }).bind("geocode:result", function(event, result){
		//console.log(result);
		//alert(result["name"]);
		$("#geocomplete").val(result["name"]);
		//$(".map_canvas div:first-child").css("display", "block");
		//$(".map_canvas div:first-child").show();
		$(".map_canvas").css("backgroundImage", "none");
	  });
	  
	});
	$(".map_canvas div:first-child").hide();
    </script>


</body>
</html>