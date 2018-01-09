<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'app/init.php';
if (Auth::guest()) {
	//redirect_to(App::url());
	$userid = 0;
}else{
	$userid = auth::user()->id;
}
require_once 'dbapi.php';
require_once 'stepswizard.php';
//print_r($_SESSION);
//print_r($_POST);
if(isset($_REQUEST["pid"])){
	$propid = $_REQUEST["pid"];

Database::initialize();
$prop = selectPorperty($propid); //array
$headline = getHeadline($prop[0]['headline_id']);
$description = getDescription($prop[0]['description_id']);
$description25 = first_words($description, 25);
$pimages = getPimages($propid); //array
$cover = getPcover($propid);
$type = getTypes($prop[0]['type']);
$amenities = getPamenities($propid); //array
$owner_id = $prop[0]['user_id'];
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
	$owner_id = 0;
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOKK | Property Single Full Width</title>
	<meta name="csrf-token" content="<?php echo csrf_token() ?>">
  <!-- CSS file links -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="css/nouislider.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	  <link href="css/styledev.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<body>

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

<section class="subheader subheader-slider property-single-item">
	<div class="property-gallery full-width">
		<div class="slider-wrap">
		
			<div class="slider-nav slider-nav-property-gallery">
			  <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
			  <span class="slider-next"><i class="fa fa-angle-right"></i></span>
			</div>
		
			<div class="property-header property-header-slider">
				<div class="container">
          <div class="slide-counter"></div>
					<div class="property-title">
						<div class="property-price-single right">$<?php echo formatMoney($prop[0]['price'], true); ?></div>
						<h4><?php echo $headline; ?></h4>
						<p class="property-address"><i class="fa fa-map-marker icon"></i><?php echo $prop[0]['name'].', '.$prop[0]['zip_id']; ?></p>
					</div>
					<div class="property-single-tags">
						<div class="property-tag button alt featured">Featured</div>
						<div class="property-type right">Property Type: <a href="#"><?php echo $type; ?></a></div>
					</div>
				</div>
			</div>
		
			<div class="slider slider-property-gallery">
				<?php
					foreach($pimages as $key => $photo) {
							//echo '<div class="slide" id="slide3"><div class="files/'.$photo.'"></div></div>';
							echo '<div class="slide" id="slide'.$key.'" style="background: url(files/'.$photo.') center / cover no-repeat;"><div class="img-fade"></div></div>';
					}
				?>
			</div>

      <div class="container">
        <div class="slider property-gallery-pager">
			<?php
				foreach($pimages as $key => $photo) {
					echo '<a class="property-gallery-thumb"><img src="files/thumb/'.$photo.'" alt="" /></a>';
				}
			?>
         
        </div>
      </div>
			
		</div><!-- end slider wrap -->
	</div><!-- end property gallery -->
</section>

<section class="module">
  <div class="container">
  
	<div class="row">
		<div class="col-lg-8 col-md-8">
		
			<div class="property-single-item property-details">
				<table class="property-details-single">
					<tr>
						<td><i class="fa fa-bed"></i> <span><?php echo $prop[0]['bedrooms']; ?></span> Bed<?php if($prop[0]['bedrooms']>1){ echo "s"; } ?></td>
						<td><i class="fa fa-tint"></i> <span><?php echo $prop[0]['bathrooms']/10; ?></span> Bath<?php if($prop[0]['bathrooms']>10){ echo "s"; } ?></td>
						<td><i class="fa fa-expand"></i> <span><?php echo $prop[0]['propertysize']; ?></span> Sq Ft</td>
						<td><i class="fa fa-car"></i> <span><?php echo $prop[0]['parking']; ?></span> Garage<?php if($prop[0]['parking']>1){ echo "s"; } ?></td>
					</tr>
				</table>
			</div>

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
			          	<li>Contact: <span><?php echo "???????"; ?></span></li>
			          	<li>Type: <span><?php echo $type; ?></span></li>
			          	<li>Year Built: <span><?php echo $prop[0]['year']; ?></span></li>
  						<li>Lot Dimensions: <span><?php echo $prop[0]['landsize']; ?> ft</span></li>
			          	<li>Deposit Amount: <span><?php echo "???????"; ?></span></li>
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

			<div class="widget property-single-item property-location">
				<h4>
					<span>Location</span> <img class="divider-hex" src="images/divider-half.png" alt="" />
					<div class="divider-fade"></div>
				</h4>
				<div id="map-single"></div>
			</div><!-- end location -->

		</div><!-- end col -->
		
		<div class="col-lg-4 col-md-4 sidebar sidebar-property-single">
		
			<div class="widget widget-sidebar advanced-search">
			  <h4>NOKK this property</h4>
			  <div class="widget-content box">
				<p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque.
				</p>
				<p><a href="#" class="button alt large" data-toggle="modal" data-target="#contactSeller">Contact seller</a></p>
				<p><a href="#" class="button button-icon"><i class="fa fa-heart icon"></i>Add to favourites</a></p>

				<!-- Modal -->
				<div class="modal fade" id="contactSeller" tabindex="-1" role="dialog" aria-labelledby="contactSellerLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Modal title</h4>
							</div>
							<div class="modal-body">
								...
							</div>
						</div>
					</div>
				</div>

			  </div><!-- end widget content -->
			</div><!-- end widget -->
		
		</div><!-- end sidebar -->
		
	</div><!-- end row -->

  </div><!-- end container -->
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

<!-- JavaScript file links -->
<script src="js/jquery-3.1.1.min.js"></script>      <!-- Jquery -->
<script src="assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="assets/slick-1.6.0/slick.min.js"></script> <!-- slick slider -->
<script src="assets/chosen-1.6.2/chosen.jquery.min.js"></script> <!-- chosen - for select dropdowns -->
<script src="js/isotope.min.js"></script> <!-- isotope-->
<script src="js/wNumb.js"></script> <!-- price formatting -->
<script src="js/nouislider.min.js"></script> <!-- price slider -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqb3fT3SbMSDMggMEK7fJOIkvamccLrjA&sensor=false"></script>

<script>
//intialize the map
function initialize() {
  var mapOptions = {
    zoom: 13,
    scrollwheel: false,
    center: new google.maps.LatLng(<?php echo $prop[0]['lat']; ?>, <?php echo $prop[0]['lng']; ?>)
  };

var map = new google.maps.Map(document.getElementById('map-single'),
      mapOptions);


// MARKERS
/****************************************************************/

//add a marker1
var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    icon: 'images/pin.png'
});


// INFO BOXES
/****************************************************************/
	
//show info box for marker1
var contentString = '<div class="info-box"><img src="/files/thumb/<?php echo $cover; ?>" class="info-box-img" alt="" /><h4><?php echo $prop[0]['name'].', '.$prop[0]['zip_id']; ?></h4><p><?php echo addslashes(preg_replace( "/\r|\n/", "", $description25 )); ?>[...]</p><a href="property_single.html" class="button small">View Details</a><br/></div>';

var infowindow = new google.maps.InfoWindow({ content: contentString });

google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}

google.maps.event.addDomListener(window, 'load', initialize);	
</script>
	
<script src="js/global.js"></script>


</body>
</html>