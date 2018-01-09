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
require_once 'dbapi.php';
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
    <div class="col-lg-8 col-lg-offset-2">

    <form class="multi-page-form"  id="form10-5"  method="post" action="p.php" >
		

      <div class="center">
        <div class="form-nav">
          <div class="form-nav-item completed"><span>1</span><br/> Basic Info</div>
          <div class="form-nav-item completed"><span>2</span><br/> Description &amp; price</div>
          <div class="form-nav-item completed"><span>3</span><br/> Additional info</div>
          <div class="form-nav-item current"><span>4</span><br/> Photographs</div>
          <div class="form-nav-item"><span>5</span><br/> Preview listing</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="multi-page-form-content">

        <table class="property-submit-title">
          <tr>
            <td><span class="property-submit-num">3</span></td>
            <td>
              <h4>Description and price</h4>
              <p>Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
            </td>
          </tr>
        </table>



        <h5>Amenities</h5>

        <div class="form-block amenities-list">
			<?php 
			foreach($amenities as $key => $name) {
				if($amenities[$key][4]==1){
					echo '<label><input type="checkbox" name="amenities[]" value="'.$amenities[$key][3].'" />'.$amenities[$key][1].'</label>
					';
				}
			}
			?>
        </div>

        <h5>Property specifics</h5>

        <div class="row">
          <div class="col-md-4">
            <div class="form-block">
              <label>Year built</label>
              <input class="border" type="text" id="propyear" name="propyear" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-block">
              <label>Land size (Sqm)</label>
              <input class="border" type="text" id="propsize" name="propsize" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-block">
              <label>Property size (Sqm)</label>
              <input class="border" type="text" id="propfloorspace" name="propfloorspace" />
            </div>
          </div>
        </div>

        <h5>Representative details</h5>

        <div class="form-block">
            <label>What do you want displayed for the agent info?</label>
            <input type="radio" name="agent_display" id="agent_display_agent" value="agent" checked/>Existing Agent<br/>
            <input type="radio" name="agent_display" id="agent_display_custom" value="custom" />Custom<br/>
            <input type="radio" name="agent_display" id="agent_display_author" value="author" />Your Profile Info<br/>
            <input type="radio" name="agent_display" id="agent_display_none" value="none" />None<br/>
        </div><br/>

        <div class="form-block form-block-agent-options form-block-select-agent border">
            <label for="agent_select">Select Agent</label>
            <select name="agent_select" class="border">
                <option value="">
                <option value="John Doe">John Doe</option>
                <option value="Sarah Parker">Sarah Parker</option>
                <option value="Cassandra Smith">Cassandra Smith</option>
                <option value="Jim Sparks">Jim Sparks</option>
            </select>
        </div>

        <div class="form-block form-block-agent-options form-block-custom-agent show-none">
            <label>Custom Owner/Agent Details</label>
            <input class="border" type="text" name="agent_custom_name" placeholder="Name" />
            <input class="border" type="text" name="agent_custom_email" placeholder="Email" />
            <input class="border" type="text" name="agent_custom_phone" placeholder="Phone" />
            <input class="border" type="text" name="agent_custom_url" placeholder="Website" />
        </div>
		  
		  <input name="formid" id="formid" type="hidden" value="10">
		  <input name="step" id="step" type="hidden" value="5">


        <div class="clear"></div>
		<a class="btn-progress-back link-icon va-container va-container-v pull-left text-gray link--accessibility-outline botback" href="submit-property-step4.php"><span class="iconback hide-sm"></span><span class="va-middle textbotback"><h5 class="text-normal"><span>Back</span></h5></span></a>
		  
		  <button type="submit" form="form10-5" class="button button-icon right form-next nextbtn"><i class="fa fa-angle-right"></i> Next</button>
		  

        
        <div class="clear"></div>

      </div><!-- end basic info -->

    </form>

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