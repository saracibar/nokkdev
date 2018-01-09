<!-- menu right -->
			<ul class="nav navbar-nav right ">
			  <?php if (Auth::check()): ?>
				<li><a href="index.html">Buy</a></li>
				<li><a href="user-submit-property-1.html">Sell</a></li>
				<li><a href="#">Messages</a></li>


				<li class="dropdown jmenu">
				  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown">
					<?php echo Auth::user()->display_name ?>
						<img src="<?php echo Auth::user()->avatar ?>" class="avatar" style="width:26px; border-radius: 50%;"> <b class="caret"></b></a>
						<ul class="dropdown-menu " role="menu">
							<li><a class="dropdown-item" href="user.php" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Profile</a></li>
							<li><a class="dropdown-item" href="usersocial.php" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Social</a></li>
						  	<li><a class="dropdown-item" href="userpassword.php" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Security</a></li>
							<li><a class="dropdown-item" href="logout.php" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Logout</a></li>
						</ul>
				</li>
			<?php else: ?>
				<li><a href="how-works.php">How NOKK works</a></li>
				<li><a href="login.php">Log in</a></li>
				<li><a class="btn btn-default" href="signup.php">Sign up</a></li>
			<?php endif; ?>	
          </ul>			
		<!-- end menu right -->