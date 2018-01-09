<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'app/init.php';
if (Auth::guest()) {
	redirect_to(App::url());
}else{
	$userid = auth::user()->id;
}
require_once 'dbapi.php';
require_once 'stepswizard.php';
//print_r($_SESSION);
//print_r($_POST);
if(isset($_SESSION["propid"])){
	$propid = $_SESSION["propid"];

Database::initialize();
$prop = selectPorperty($propid); //array
$headline = getHeadline($prop[0]['headline_id']);
$description = getDescription($prop[0]['description_id']);
$pimages = getPimages($propid); //array
$cover = getPcover($propid);
$type = getTypes($prop[0]['type']);
$amenities = getPamenities($propid); //array
/////////////////////////////
/*	
print_r($prop);
echo "headline: ".$headline." ";
echo "description: ".$description." ";
echo "cover: ".$cover." ";
print_r($pimages);
print_r($amenities);
*/
$close = Database::$conn->close();

}else{
	$propid = 0;
	//DO SOMETHING IF NO SESSION ID ****************************************PENDING
}
//exit();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOKK1 | User Profile</title>
	<meta name="csrf-token" content="<?php echo csrf_token() ?>">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  

  <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="css/nouislider.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	  <link href="css/styledev.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/forms2.css">
  <link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->
  
 
  <!--[if lt IE 9]>
    <script src="global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="global/vendor/media-match/media.match.min.js"></script>
    <script src="global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBccMwsltxA-99aTkEoQzttDTWmuR-tbQg&libraries=places"></script>
<script>
function initialize() {
	  var mapOptions = {
		zoom: 15,
		  styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
		  //styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}],
		center: new google.maps.LatLng(<?php echo $prop[0]['lat']; ?>, <?php echo $prop[0]['lng']; ?>),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	
  	map = new google.maps.Map(document.getElementById('map_canvas'),
    mapOptions);
  
  
  	var cityCircle = new google.maps.Circle({
            strokeColor: '#4fba6f',
            strokeOpacity: 0.8,
            strokeWeight: 4,
            fillColor: '#CCC',
            fillOpacity: 0.45,
            map: map,
            center: new google.maps.LatLng(<?php echo $prop[0]['lat']; ?>, <?php echo $prop[0]['lng']; ?>),
            radius: 400
          });

	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
	<?php $user = User::find(Auth::user()->id); ?>
	
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- logo -->
      <div class="navbar-header">
          <a class="navbar-brand" href="/"><img src="images/logo.png" alt="NOKK" /></a>
      </div>
      <!-- nav toggle -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <!-- main menu -->
      <div class="navbar-collapse collapse">
        <div class="main-menu-wrap">
			<?php require_once 'menuright.php'; ?>	
          <div class="clear"></div>
        </div>
      </div>
	<!-- end main menu -->
    </div>
  </nav>
</header>

<section class="subheader">
  <div class="container">
    <h1>List Property</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">List Property</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module login">
  			<div class="container">
	  
	  			<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
		
      <div class="center">
        <div class="form-nav">
          <div class="form-nav-item completed"><span><i class="fa fa-check"></i></span><br/> Basic Info</div>
          <div class="form-nav-item completed"><span><i class="fa fa-check"></i></span><br/> Description &amp; price</div>
          <div class="form-nav-item completed"><span><i class="fa fa-check"></i></span><br/> Additional info</div>
          <div class="form-nav-item completed"><span><i class="fa fa-check"></i></span><br/> Photographs</div>
          <div class="form-nav-item current"><span>5</span><br/> Preview listing</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="multi-page-form-content">

        <table class="property-submit-title">
          <tr>
            <td><span class="property-submit-num">5</span></td>
            <td>
              <h4>Preview listing</h4>
              <p>Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
            </td>
          </tr>
        </table>

        <div class="preview">

              <div class="property-single-item property-main">
                <div class="property-header">
                  <div class="property-title">
                    <h4><?php echo $headline; ?></h4>
                    <div class="property-price-single right">$<?php echo formatMoney($prop[0]['price'], true); ?> <span>Per Month</span></div>
                    <p class="property-address"><i class="fa fa-map-marker icon"></i> <?php echo $prop[0]['name'].', '.$prop[0]['zip_id']; ?></p>
                    <div class="clear"></div>
                  </div>
                  <div class="property-single-tags">
                    <div class="property-tag button alt featured">Fe;atured</div>
                    <div class="property-tag button status">For Rent</div>
                    <div class="property-type right">Property Type: <a href="#"><?php echo $type; ?></a></div>
                  </div>
                </div>

                <table class="property-details-single">
                  <tr>
                    <td><i class="fa fa-bed"></i> <span><?php echo $prop[0]['bedrooms']; ?></span> Bed<?php if($prop[0]['bedrooms']>1){ echo "s"; } ?></td>
                    <td><i class="fa fa-tint"></i> <span><?php echo $prop[0]['bathrooms']/10; ?></span> Bath<?php if($prop[0]['bathrooms']>10){ echo "s"; } ?></td>
                    <td><i class="fa fa-expand"></i> <span><?php echo $prop[0]['propertysize']; ?></span> Sq Ft</td>
                    <td><i class="fa fa-car"></i> <span><?php echo $prop[0]['parking']; ?></span> Garage</td>
                  </tr>
                </table>

                <div class="property-gallery">
                  <div class="slider-nav slider-nav-property-gallery">
                    <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
                    <span class="slider-next"><i class="fa fa-angle-right"></i></span>
                  </div>
                  <div class="slide-counter"></div>
                  <div class="slider slider-property-gallery">
					  <?php
					  	foreach($pimages as $key => $photo) {
							echo '<div class="slide"><img src="files/'.$photo.'" alt="" /></div>';
						}
					 ?>
                  </div>
                  <div class="slider property-gallery-pager">
					   <?php
					  	foreach($pimages as $key => $photo) {
							echo '<a class="property-gallery-thumb"><img src="files/thumb/'.$photo.'" alt="" /></a>';
						}
					  
					 ?>
                  </div>
                </div>

              </div><!-- end property title and gallery -->

              <div class="widget property-single-item property-description content">
                <h4>
                  <span>Description</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
                  <div class="divider-fade"></div>
                </h4>
                <p><?php echo $description; ?></p>

                <div class="tabs">
                  <ul>
                    <li><a href="#tabs-1"><i class="fa fa-pencil icon"></i>Additional Details</a></li>
                    <li><a href="#tabs-2"><i class="fa fa-crop icon"></i>Floor Plans</a></li>
                    <li><a href="#tabs-3"><i class="fa fa-files-o icon"></i>Attachments</a></li>
                  </ul>
                  <div id="tabs-1" class="ui-tabs-hide">
                    <ul class="additional-details-list">
                      <li>Property ID: <span><?php echo $propid; ?></span></li>
                      <li>Contact: <span>Rent</span></li>
                      <li>Type: <span><?php echo $type; ?></span></li>
                      <li>Year Built: <span><?php echo $prop[0]['year']; ?></span></li>
                      <li>Lot Dimensions: <span><?php echo $prop[0]['landsize']; ?> ft</span></li>
                      <li>Deposit Amount: <span>20%</span></li>
                    </ul>
                  </div>
                  <div id="tabs-2" class="ui-tabs-hide">
                    <a href="#"><img src="images/floor-plan1.jpg" alt="" /></a>
                  </div>
                  <div id="tabs-3" class="ui-tabs-hide">
                    <a href="#"><i class="fa fa-file-o icon"></i> Lease Agreement</a><br/><br/>
                    <a href="#"><i class="fa fa-file-o icon"></i> Brochure</a><br/><br/>
                    <a href="#"><i class="fa fa-file-o icon"></i> Property Details</a>
                  </div>
                </div>
              </div><!-- end description -->

              <div class="widget property-single-item property-amenities">
                <h4>
                  <span>Amenities</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
                  <div class="divider-fade"></div>
                </h4>
                <ul class="amenities-list">
					<?php
					  	foreach($amenities as $key => $amenitie) {
							echo '<li><i class="fa ';
							if($amenitie[2]==1){
								echo 'fa-check';
							}else{
								echo 'fa-close';
							}
							
							echo ' icon"></i> '.$amenitie[0].'</li>';
						}
					 ?>
                </ul>
              </div><!-- end amenities -->

<script>

</script>

              <div class="widget property-single-item property-location">
                <h4>
                  <span>Location</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
                  <div class="divider-fade"></div>
                </h4>

				  <div id="map_canvas" style="height: 400px;"></div>
				  
              </div><!-- end location -->

              <div class="widget property-single-item property-agent">
                <h4>
                  <span>Agent</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
                  <div class="divider-fade"></div>
                </h4>
                <div class="agent">
                  <a href="#" class="agent-img">
                    <div class="img-fade"></div>
                    <div class="button alt agent-tag">68 Properties</div>
                    <img src="images/1197x1350.png" alt="" />
                  </a>
                  <div class="agent-content">
                    <a href="#" class="button button-icon small right"><i class="fa fa-angle-right"></i>Contact Agent</a>
                    <a href="#" class="button button-icon small grey right"><i class="fa fa-angle-right"></i>Agent Details</a>
                    <div class="agent-details">
                      <h4><a href="#">John Doe</a></h4>
                      <p><i class="fa fa-tag icon"></i>Buying Agent</p>
                      <p><i class="fa fa-envelope icon"></i>jdoe@homely.com</p>
                      <p><i class="fa fa-phone icon"></i>(123) 456-6789</p>
                    </div>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                  </div>
                  <div class="clear"></div>
                </div>
              </div><!-- end agent -->

        </div><!-- end preview -->
		
		  
		  <form class="multi-page-form"  id="form10-7"  method="post" action="p.php" >
						<div style="display:none">
							<input name="status" id="status" type="hidden" value="1">
							<input name="formid" id="formid" type="hidden" value="10">
							<input name="step" id="step" type="hidden" value="7">
						</div>
			<div class="center">
			  <a href="user-submit-property-6.html" class="button button-icon small form-prev"><i class="fa fa-angle-left"></i> Previous</a>
			<button type="submit" form="form10-7" class="button button-icon large alt"><i class="fa fa-angle-right"></i> List Property</button>

			</div>
        </form>

        <div class="clear"></div>

      </div><!-- end basic info -->


  </div><!-- end col -->
  </div><!-- end row -->
	 
	  
			</div>
	<!-- END CONTENT -->

</section>


	
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 widget footer-widget">
                <a class="footer-logo" href="index.html"><img src="images/logo-white.png" alt="Homely" /></a>
                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut 
                purus eget nunc ut dignissim cursus at a nisl. Mauris vitae 
                turpis quis eros egestas tempor sit amet a arcu. Duis egestas 
                hendrerit diam.</p>
                <div class="divider"></div>
                <ul class="social-icons circle">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 widget footer-widget from-the-blog">
                <h4><span>From the Blog</span> <img src="images/divider-half.png" alt="" /></h4>
                <ul>
                    <li>
                      <a href="#"><h3>Open House at 123 Smith Drive</h3></a>
                      <p>Vel fermentum ipsum. Quis molestie odio. Interdum et...<br/> <a href="#">Read More</a></p>
                      <div class="clear"></div>
                    </li>
                     <li>
                        <a href="#"><h3>Open House at 123 Smith Drive</h3></a>
                        <p>Vel fermentum ipsum. Quis molestie odio. Interdum et...<br/> <a href="#">Read More</a></p>
                        <div class="clear"></div>
                      </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 widget footer-widget">
                <h4><span>Get In Touch</span> <img src="images/divider-half.png" alt="" /></h4>
                <p>123 Smith Drive<br/>
                Annapolis, MD 21012<br/>
                United States
                </p>
                <p>
                <b class="open-hours">Open Hours</b><br/>
                Mondy - Friday: 9 am - 5 pm<br/>
                Saturday: 9 am - 1pm<br/>
                Sunday: Closed
                </p>
                <p class="footer-phone"><i class="fa fa-phone icon"></i> (123) 456-7890</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 widget footer-widget newsletter">
                <h4><span>Newsletter</span> <img src="images/divider-half.png" alt="" /></h4>
                <p><b>Subscribe to our newsletter!</b> Vel lorem ipsum. Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                <form class="subscribe-form" method="post" action="#">
                    <input type="text" name="email" value="Your email" />
                    <input type="submit" name="submit" value="SEND" class="button small alt" />
                </form>
            </div>
        </div><!-- end row -->
    </div><!-- end footer container -->
</footer>

<div class="bottom-bar">
    <div class="container">
      <div class="row">
          <div class="col-md-6">
            &copy; NOKK 2017.&nbsp;&nbsp;All Rights Reserved
          </div>
          <div class="col-md-6 text-right">
            <a href="#">Terms of service</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Privacy policy</a>
          </div>
    </div>
</div>
		<script src="global/vendor/jquery/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->

<script src="assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="assets/slick-1.6.0/slick.min.js"></script> <!-- slick slider -->
<script src="assets/chosen-1.6.2/chosen.jquery.min.js"></script> <!-- chosen - for select dropdowns -->
<script src="js/isotope.min.js"></script> <!-- isotope-->
<script src="js/wNumb.js"></script> <!-- price formatting -->
<script src="js/nouislider.min.js"></script> <!-- price slider -->
<script src="js/global.js"></script>

</body>
</html>