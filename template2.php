<?php
require_once 'app/init.php';

if (Auth::guest()) redirect_to(App::url());

?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Nokk">
  <meta name="author" content="">
  <title>Nokk</title>	
  <meta name="csrf-token" content="<?php echo csrf_token() ?>">
  <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="global/css/bootstrap.min.css">
  <link rel="stylesheet" href="global/css/bootstrap-extend.min.css">
  	<link rel="stylesheet" href="assets/css/site.min.css">
    <!-- Mio -->
  <link href="assets/skins/nokk.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link rel="stylesheet" href="global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
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


  <div class="menux">
    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right menuderecha">
			
			
			<?php if (Auth::check()): ?>

			<li class="nav-item dropdown ">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown">
								<?php echo Auth::user()->display_name ?>
								<img src="<?php echo Auth::user()->avatar ?>" class="avatar"> <b class="caret"></b></a>
							<div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="usersocial.php" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Social</a>
              <a class="dropdown-item" href="userpassword.php" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Password</a>
              <a class="dropdown-item" href="usersettings.php" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
              <div class="dropdown-divider" role="presentation"></div>
              <a class="dropdown-item" href="logout.php" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
            </div>
			</li>
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">Help</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">Contact</a>
						</li>
		          		<li class="nav-item">
							<a class="nav-link" href="signup.php">Sign up</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Sign in</a>
						</li>	          		
					<?php endif; ?>		
        </ul>
    </div>
   
	<div class="caca">
	
		<?php
		$user = User::find(Auth::user()->id);
		?>
		<link href="<?php echo asset_url('css/vendor/imgpicker.css') ?>" rel="stylesheet">
		
		<h3 class="page-header"><?php echo _e('main.profile') ?></h3>

		<form action="settingsProfile" method="POST" class="ajax-form">
			<div class="avatar-container form-group">
				<label><?php _e('main.avatar') ?></label>

				<div class="clearfix">
					<div class="pull-left" style="width:150px; height:150px; float:left">
						<a href="<?php echo $user->avatar ?>" target="_blank"><img src="<?php echo $user->avatar ?>" class="avatar-image img-thumbnail"></a>
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

			<?php if (UserFields::has('first_name') && UserFields::has('last_name')): ?>
				<div class="form-group">
			        <label for="display_name"><?php _e('main.display_name') ?></label>
			        <select name="display_name" id="display_name" class="form-control">
			        	<?php if (Config::get('auth.require_username')): ?>
							<option <?php echo $user->display_name == $user->username ? 'selected' : '' ?>><?php echo $user->username ?></option>
						<?php endif ?>

			        	<?php if (!empty($user->first_name)): ?>
			        		<option <?php echo $user->display_name == $user->first_name ? 'selected' : '' ?>><?php echo $user->first_name ?></option>
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
		    	<button type="submit" name="submit" class="btn btn-primary"><?php _e('main.save_changes') ?></button>
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
		
		
	</div>

  
	

  <!-- Core  -->
  <script src="global/vendor/tether/tether.js"></script>
  <script src="global/vendor/bootstrap/bootstrap.js"></script>
  <!-- Plugins -->

</body>
</html>