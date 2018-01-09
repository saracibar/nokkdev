<?php
echo '
	<!-- menu right -->
			<ul class="nav navbar-nav right ">';
			   if (Auth::check()){
				   echo '
				   	<li><a href="buy.php">Buy</a></li>
					<li><a href="sell.php">Sell</a></li>
					<li><a href="messages.php">Messages</a></li>
					<li class="dropdown jmenu">
				  		<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown">'.Auth::user()->display_name.' <img src="'.Auth::user()->avatar.'" class="avatar" style="width:26px; border-radius: 50%;"> <b class="caret"></b></a>
						<ul class="dropdown-menu jmenu" role="menu">
							<li><a class="dropdown-item" href="user.php" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Profile</a></li>
							<li><a class="dropdown-item" href="usersocial.php" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Social</a></li>
						  	<li><a class="dropdown-item" href="userpassword.php" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Security</a></li>
							<li><a class="dropdown-item" href="logout.php" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Logout</a></li>
						</ul>
					</li>
					';
			   }else{
				  echo '
				  	<li><a href="how-works.php">How NOKK works</a></li>
					<li><a href="login.php">Log in</a></li>
					<li><a class="btn btn-default" href="signup.php">Sign up</a></li>
				  '; 
			   }
		echo '</ul>
	<!-- end menu right -->';
?>