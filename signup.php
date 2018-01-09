<!-- J -->
<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('display_errors', 'On');
require_once 'app/init.php';

if (isset($_POST['submit']) && csrf_filter()) {
    Register::signup($_POST);

    if (Register::passes()) {
        if (Config::get('auth.email_activation')) {
            redirect_to('signup.php', array('signup_complete' => true));
        } else {
            Auth::login($_POST['email'], $_POST['pass1']);

            $redirect = Config::get('auth.login_redirect');
            redirect_to($redirect != '' ? $redirect : App::url());
        }
    }
}
/**/
?>
<!-- J! -->
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOKK1 | Sign up</title>

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

<section class="subheader">
  <div class="container">
    <h1>Sign up</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Sign up</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module login">
  <div class="container">

    <div class="row">
      <div class="col-lg-4 col-lg-offset-4"> 
        <p>Already have an account? <strong><a href="login.php">Log in here.</a></strong></p>
		  <?php if (Session::has('signup_complete')): Session::deleteFlash(); ?>
				<h3><?php _e('main.check_email') ?></h3>
				<?php _e('main.activation_check_email') ?>
			<?php else: ?>
		  <?php
		  	////////// DIV DISPLAYING MESSAGES WHEN THE SIGN-UP FAILS
		  	if (Register::fails()) {
				echo '<div class="signin-failed"><ul>';
				foreach (Register::errors()->all('<li>:message</li>') as $error) {
				   echo $error;
				}
				echo '</ul></div>';
			}
		  ?>
		  
        <form method="post" action="" class="login-form">
			<?php csrf_input() ?>
			<?php if (Config::get('auth.require_username')): ?>
				<div class="form-block">
			       <label for="signup-username"><?php _e('main.username') ?></label>
			        <input type="text" name="username" id="signup-username" class="form-control border">
			    </div>
			<?php endif ?>
			
			
			
				<div class="form-block">
			        <label for="signup-email"><?php _e('main.email') ?></label>
			        <input type="text" name="email" id="signup-email border" class="form-control">
			    </div>

			    <div class="form-block">
			        <label for="signup-pass1"><?php _e('main.password') ?></label>
			        <input type="password" name="pass1" id="signup-pass1" class="form-control border" autocomplete="off" value="">
			    </div>

			    <div class="form-block">
			        <label for="signup-pass2"><?php _e('main.password_confirmation') ?></label>
			        <input type="password" name="pass2" id="signup-pass2" class="form-control border" autocomplete="off">
			    </div>
			    <?php echo UserFields::build('signup') ?>
				<?php if (Config::get('auth.captcha')): ?>
					<p>
						<?php display_captcha(); ?>
					</p>
				<?php endif ?>
				<div class="form-group">
					<button type="submit" name="submit" class="button button-icon"><i class="fa fa-angle-right"></i><?php _e('main.signup') ?></button>
				</div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
			<?php if (count(Config::get('auth.providers'))): ?>
		            <span class="help-block"><?php _e('main.login_with2') ?></span>
		            <div class="social-connect clearfix">
		            	<?php foreach (Config::get('auth.providers') as $key => $provider): ?>
		            		<a href="oauth.php?provider=<?php echo $key ?>" class="btn btn-tagged social-<?php echo $key; if($key == "google"){ echo "-plus"; } ?> connect <?php echo $key ?>" title="<?php _e("main.connect_with_{$key}") ?>" ><span class="btn-tag"><i class="icon bd-<?php echo $key; if($key == "google"){ echo "-plus"; } ?>" aria-hidden="true"></i></span><?php echo $provider ?></a>
		            	<?php endforeach ?>
		            </div>
		        <?php endif ?>
        </form>
		  <?php endif ?>
      </div>
    </div><!-- end row -->

  </div>
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
<script src="assets/html5lightbox/html5lightbox.js"></script> <!-- lightbox -->
<script src="js/global.js"></script>


</body>
</html>