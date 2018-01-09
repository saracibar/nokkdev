<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'app/init.php';
if (Auth::guest()) {
	//echo "no logged";
	redirect_to(App::url());
}


if (Auth::check()) {
	$userid = auth::user()->id;
}
require_once 'stepswizard.php';
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
	  
  <!-- CSS file links -->
<!-- x 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
-->
  <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="css/nouislider.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	  <link href="css/styledev.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/forms.css">
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


	<style type="text/css" media="screen">
		html,body {
			width:100%;
			height: 100%;
		}

	.map_canvas .centerMarker {
	  position: absolute;
	  /*url of the marker*/
	  background: url("pin.png") no-repeat;
	  /*center the marker*/
	  top: 50%;
	  left: 50%;
	  z-index: 1000;
	  /*fix offset when needed*/
	  margin-left: -17px;
	  margin-top: -25px;
	  /*size of the image*/
	  height: 50px;
	  width: 34px;
	  cursor: pointer;
	}
		
	.map_canvas {
	  background: none;
	}

		
    </style>

	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBccMwsltxA-99aTkEoQzttDTWmuR-tbQg&libraries=places"></script>
<script>
function initialize() {
  var mapOptions = {
    zoom: 16,
	  styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
	  //styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}],
    center: new google.maps.LatLng(<?php echo $_SESSION["lat"]; ?>, <?php echo $_SESSION["lng"]; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map_canvas'),
    mapOptions);
  google.maps.event.addListener(map,'center_changed', function() {
    document.getElementById('default_latitude').value = map.getCenter().lat();
    document.getElementById('default_longitude').value = map.getCenter().lng();
  });
  
  var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#000',
            fillOpacity: 0.35,
            map: map,
            center: new google.maps.LatLng(document.getElementById('default_latitude').value = map.getCenter().lat(), document.getElementById('default_longitude').value = map.getCenter().lng()),
            //center: new google.maps.LatLng(52.5498783, 13.425209099999961),
            radius: 400
          });

  
  google.maps.event.addListener(map, 'dragend', function() { 
  
  cityCircle.setCenter(map.getCenter());
  //alert('map dragged');
  } );
  
  

 google.maps.event.addListener(cityCircle, 'mousedown', function(e) {
cityCircle.setVisible(false);
});
  /* 
google.maps.event.addListener(map, 'mouseup', function(e) {

  cityCircle.setVisible(true);
});


 
  $( "body" ).click(function( event ) {
  $( "#map_canvas" ).html( "clicked: " + event.target.nodeName );
});
  
  */    
 google.maps.event.addListener(map, 'mousedown', function(e) {
	 //alert(map.getDiv());
  mouseMoveHandler = google.maps.event.addListener(map, 'mousemove', function(e) {
		
 		cityCircle.setVisible(false);
  }); // End of mousemove lister
  return false;
});

google.maps.event.addListener(map, 'mouseup', function(e) {
  google.maps.event.removeListener(mouseMoveHandler);
  cityCircle.setVisible(true);
});
  

  
  
  
//google.maps.event.addListener(marker, 'dragend', function() { alert('marker dragged'); } );
  
  $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
    //do something onclick
    .click(function() {
      var that = $(this);
      if (!that.data('win')) {
        that.data('win', new google.maps.InfoWindow({
          content: 'this is the center'
        }));
        that.data('win').bindTo('position', map, 'center');
      }
      that.data('win').open(map);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
	<script src="<?php echo asset_url('js/easylogin.js') ?>"></script>
    <script src="<?php echo asset_url('js/main.js') ?>"></script>
    <script>
        EasyLogin.options = {
            ajaxUrl: '<?php echo App::url("ajax.php") ?>',
            lang: <?php echo json_encode(trans('main.js')) ?>,
            debug: <?php echo Config::get('app.debug')?1:0; ?>,
        };
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
		  <div class="col-md-12">
	  <div class="center">
        <div class="form-nav">
          <div class="form-nav-item current"><span>1</span><br/> Basic Info</div>
          <div class="form-nav-item"><span>2</span><br/> Description &amp; price</div>
          <div class="form-nav-item"><span>3</span><br/> Additional info</div>
          <div class="form-nav-item"><span>4</span><br/> Photographs</div>
          <div class="form-nav-item"><span>5</span><br/> Preview listing</div>
          <div class="clear"></div>
        </div>
      		</div>
		</div>
	</div>
	  <div class="multi-page-form-content">
				<div class="row">
						<div class="col-md-12">
						 <table class="property-submit-title">
          <tr>
            <td><span class="property-submit-num">1</span></td>
            <td>
              <h4>Basic Info</h4>
              <p>Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
            </td>
          </tr>
        </table>
					</div>	
				</div>		
					<div class="row formdiv">
							
						<div style="display: none">
						<form id="form10-2" name="form10-2" method="post" action="p.php">
							<input type="text" id="default_latitude" name="default_latitude" placeholder="Latitude"/>
							<input type="text" id="default_longitude" name="default_longitude"  placeholder="Longitude"/>
							<input name="formid" id="formid" type="hidden" value="10"> 
							<input name="step" id="step" type="hidden" value="2"> 
						</form>
					</div>
				   <div class="col-sm" style="height: 500px; width:100%;">
						 

						<div id="map_canvas" class="map_canvas">
						</div>
					</div>
							
						</div>
		  <div class="divider"></div>
		  					<div style="min-height: 60px;">	
									<button type="submit" form="form10-2" class="button button-icon right form-next nextbtn"><i class="fa fa-angle-right"></i> Next</button>
							</div>			 
					</div>
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

</body>
</html>