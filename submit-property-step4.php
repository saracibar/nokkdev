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

    <form class="multi-page-form"  id="form10-4"  method="post" action="p.php" >
		

      <div class="center">
        <div class="form-nav">
          <div class="form-nav-item completed"><span>1</span><br/> Basic Info</div>
          <div class="form-nav-item completed"><span>2</span><br/> Description &amp; price</div>
          <div class="form-nav-item current"><span>3</span><br/> Additional info</div>
          <div class="form-nav-item"><span>4</span><br/> Photographs</div>
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



        <h5>Property title</h5>

        <div class="row">
          <div class="col-md-8">
            <div class="form-block">
              <p>Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              <label class="hidden">Price</label>
              <input class="border required" type="text" id="proptitle" name="proptitle" />
            </div>
          </div>
        </div>

        <h5>Property description</h5>

        <div class="form-block">
          <p>Highlight the best parts of your home and get buyers excited about things they can't always see in pictures. Is your backyard amazing for kids? Do you have the original moldings?</p>
          <label class="hidden">Description</label>
          <textarea class="border required" type="text" id="propdesc" name="propdesc"></textarea>
        </div>

        <h5>Price</h5>
        
        <div class="row">
          <div class="col-md-8">
            <div class="form-block">
              <p>How much are you hoping to sell your property for?</p>
              <label class="hidden">Price</label>
              <input class="border required" type="text" name="propprice" id="propprice" />
              <p>Not sure? <a href="#">Get a valuation</a>.</p>
            </div>
          </div>
        </div>
		  
		  <input name="formid" id="formid" type="hidden" value="10">
		  <input name="step" id="step" type="hidden" value="4">

        <div class="clear"></div>
		<a class="btn-progress-back link-icon va-container va-container-v pull-left text-gray link--accessibility-outline botback" href="submit-property-step3.phpp"><span class="iconback hide-sm"></span><span class="va-middle textbotback"><h5 class="text-normal"><span>Back</span></h5></span></a>
		  
		  <button type="submit" form="form10-4" class="button button-icon right form-next nextbtn"><i class="fa fa-angle-right"></i> Next</button>
		  

        
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