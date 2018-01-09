<?php
require_once 'app/init.php';
if (Auth::guest()) redirect_to(App::url());
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

	  <script src="<?php echo asset_url('js/vendor/jquery-1.11.1.min.js') ?>"></script>
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
    <h1>Profile</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">Profile</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module login">
  <div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-3 sidebar-left">
			<div class="widget member-card">
				<div class="member-card-header">
					<a href="#" class="member-card-avatar"><img src="<?php echo $user->avatar; ?>" alt="" /></a>
					<h3><?php echo $user->firstName." ".$user->lastName; ?></h3>
					<p><i class="fa fa-envelope icon"></i> <?php echo $user->email; ?></p>
				</div>
				<div class="member-card-content">
					<img class="hex" src="images/hexagon.png" alt="" />
					<ul>
						<li class="active"><a href="user-profile.html"><i class="fa fa-user icon"></i>Profile</a></li>
						<li><a href="user-my-properties.html"><i class="fa fa-home icon"></i>My Properties</a></li>
						<li><a href="user-favorite-properties.html"><i class="fa fa-heart icon"></i>Favorited Properties</a></li>
						<li><a href="submit-property-step1.php"><i class="fa fa-plus icon"></i>Submit Property</a></li>
						<li><a href="#"><i class="fa fa-reply icon"></i>Logout</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-lg-9 col-md-9">
			
				<div class="row">

		<?php
		$user = User::find(Auth::user()->id);
		?>
		<link href="<?php echo asset_url('css/vendor/imgpicker.css') ?>" rel="stylesheet">
		

		<form action="settingsProfile" method="POST" class="ajax-form">
	
			<div class="avatar-container form-group">

		<label><?php _e('main.avatar') ?></label>
				<div class="clearfix">
					<div class="pull-left" style="width:150px; height:150px; float:left">
						<img src="<?php echo $user->avatar ?>" class="avatar-image img-thumbnail" style="width:130px; margin-left: 15px;">
					</div>
					<div class="pull-left" style="margin-left: 10px;float:left">
						<?php $avatarType = @$user->usermeta['avatar_type']; ?>
						<select name="avatar_type" class="form-control" style="margin-bottom: 10px;">
							<option value="" <?php echo $avatarType == '' ? 'selected' : '' ?>><?php _e('main.default') ?></option>
							<option value="image" <?php echo $avatarType == 'image' ? 'selected' : '' ?>><?php _e('main.uploaded') ?></option>

							<?php foreach (Config::get('auth.providers', array()) as $key => $provider) {
								if (!empty($user->usermeta["{$key}_id"])) {
									echo '<option value="'.$key.'" '.($avatarType == $key ? 'selected' : '').'>'.$provider.'</option>';
								}
							} ?>
						</select>
						<div class="btn btn-primary btn-sm ip-upload"><?php _e('main.upload') ?> <input type="file" name="file" class="ip-file"></div>
						<button type="button" class="btn btn-primary btn-sm ip-webcam"><?php _e('main.webcam') ?></button>
					</div>
				</div>

				<div class="alert ip-alert"></div>
				<div class="ip-info"><?php _e('main.crop_info') ?></div>
				<div class="ip-preview"></div>
				<div class="ip-rotate">
					<button type="button" class="btn btn-default ip-rotate-ccw" title="Rotate counter-clockwise"><span class="icon-ccw"></span></button>
					<button type="button" class="btn btn-default ip-rotate-cw" title="Rotate clockwise"><span class="icon-cw"></span></button>
				</div>
				<div class="ip-progress">
					<div class="text"><?php _e('main.uploading') ?></div>
					<div class="progress progress-striped active"><div class="progress-bar"></div></div>
				</div>
				<div class="ip-actions">
					<button type="button" class="btn btn-sm btn-success ip-save"><?php _e('main.save_image') ?></button>
					<button type="button" class="btn btn-sm btn-primary ip-capture"><?php _e('main.capture') ?></button>
					<button type="button" class="btn btn-sm btn-default ip-cancel"><?php _e('main.cancel') ?></button>
				</div>
			</div>
			</div>

			<?php if (UserFields::has('first_name') && UserFields::has('last_name')): ?>
				<div class="form-block">
			        <label for="display_name"><?php _e('main.display_name') ?></label>
			        <select name="display_name" id="display_name" class="border">
						<?php if (!empty($user->first_name)): ?>
			        		<option <?php echo $user->display_name == $user->first_name ? 'selected' : '' ?>><?php echo $user->first_name ?></option>
			        	<?php endif ?>
						
			        	<?php if (Config::get('auth.require_username')): ?>
							<option <?php echo $user->display_name == $user->username ? 'selected' : '' ?>><?php echo $user->username ?></option>
						<?php endif ?>

			        	<?php if (!empty($user->last_name)): ?>
			        		<option <?php echo $user->display_name == $user->last_name ? 'selected' : '' ?>><?php echo $user->last_name ?></option>
			        	<?php endif ?>
			        	
			        	<?php if (!empty($user->first_name) && !empty($user->last_name)): ?>
			        		<option <?php echo $user->display_name == "$user->first_name $user->last_name" ? 'selected' : '' ?>><?php echo "$user->first_name $user->last_name" ?></option>
			        		<option <?php echo $user->display_name == "$user->last_name $user->first_name" ? 'selected' : '' ?>><?php echo "$user->last_name $user->first_name" ?></option>
			        	<?php endif ?>
			        </select>
			    </div>
			<?php endif ?>

		    <?php echo UserFields::setData($user->usermeta)->build('user') ?>

            <div class="form-group">
				<button type="submit" name="submit" class="button button-icon"><i class="fa fa-check"></i><?php _e('main.save_changes') ?></button>
		    </div>
				</div>
				</div>
		</form>

		<script src="<?php echo asset_url('js/vendor/jquery.Jcrop.min.js') ?>"></script>
		<script src="<?php echo asset_url('js/vendor/jquery.imgpicker.js') ?>"></script>
		<script> 
			$(function() {
				$('.avatar-container').imgPicker({
					url: '<?php echo App::url("ajax.php?action=avatar") ?>',
					messages: <?php echo json_encode(trans('imgpicker.js')) ?>,
					aspectRatio: 1,
					cropSuccess: function(img) {
						$('.avatar-image').attr('src', img.url + '?'+new Date().getTime());
						this.container.find('select').val('image');
					}
				});

				EasyLogin.generateDisplayName();
			}); 
		</script>
		
		

					

				</div><!-- end row -->
							

	
				
		
		</div><!-- end col -->
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

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>