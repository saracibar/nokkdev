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

Database::initialize();

if(isset($_REQUEST["qs"])){ $qs = $_REQUEST["qs"]; } else { $qs = 0; }
if(isset($_REQUEST["qt"])){ $qt = $_REQUEST["qt"]; } else { $qt = 0; }
if(isset($_REQUEST["qp"])){ $qp = $_REQUEST["qp"]; } else { $qp = 0; }
if(isset($_REQUEST["qb"])){ $qb = $_REQUEST["qb"]; } else { $qb = 0; }
if(isset($_REQUEST["qo"])){ $qo = $_REQUEST["qo"]; } else { $qo = 0; }
if(isset($_REQUEST["qa"])){ $qa = $_REQUEST["qa"]; } else { $qa = 0; }
if(isset($_REQUEST["ql"])){ $ql = $_REQUEST["ql"]; } else { $ql = 0; }

			//search,type,price,beds,order,ascdesc,limit
$properties = selectProp($qs,$qt,$qp,$qb,$qo,$qa,$ql);

if (is_array($properties)){
	if (count($properties)==1){
	$amount = "1 propertie found";
	}
	if (count($properties)>1){
		$amount = count($properties)." properties found";
	}
}else{
	$amount = "No properties found";
}

//print_r($p);
$close = Database::$conn->close();	

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOKK | Properties Grid</title>
		<meta name="csrf-token" content="<?php echo csrf_token() ?>">
  <!-- CSS file links -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="css/nouislider.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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


<section class="filters">
  <div class="container">
    <form action="/properties.php" method="post">

      <div class="row">

          <div class="form-block border">
            <label for="" class="sr-only">Search</label>
            <input type="text" class="border" name="qs" id="qs" value="Search">
          </div>

          <div class="form-block border">
            <label for="qt" class="sr-only">Type</label>
            <select id="qt" name="qt">
              <option value="0">Property type</option>
              <?php 
					foreach($ptypes as $key => $ptype) {
							echo '<option value="'.$key.'">'.$ptype.'</option>
							';
					}
					?>
            </select>
          </div>

          <div class="form-block border">
            <label for="qp" class="sr-only">Price</label>
            <select id="qp" name="qp">
              <option>Price</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <div class="form-block border">
            <label for="qb" class="sr-only">Beds</label>
            <select id="qb" name="qb">
              <option>Beds</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <div class="form-block">
            <button type="submit" class="button">Search</button>
          </div>

          <div class="form-block border">
            <a href="#">Save to profile</a>
          </div>

      </div>
    </form>
  </div>
</section>

<section class="module filter-add">
  <div class="container">
  
	<div class="property-listing-header">
		<span class="property-count left"><?php echo $amount; ?></span>
		<form action="#" method="get" class="right">
			<select name="sort_by" onchange="this.form.submit();">
				<option value="date_desc">New to Old</option>
				<option value="date_asc">Old to New</option>
				<option value="price_desc">Price (High to Low)</option>
				<option value="price_asc">Price (Low to High)</option>
			</select>
		</form>
		<div class="property-layout-toggle right">
			<a href="property-listing-grid.html" class="property-layout-toggle-item active"><i class="fa fa-th-large"></i></a>
			<a href="property-listing-row.html" class="property-layout-toggle-item"><i class="fa fa-bars"></i></a>
		</div>
		<div class="clear"></div>
	</div><!-- end property listing header -->
    
    <div class="row">
		
		
		<?PHP
		/*
		$caca= array("1","2","3","4","5","6","7","8","9","10");
		$counter = 0;
		foreach($caca as $key => $s) {
			echo $s;
			$counter++;	
			 if($counter % 3 == 0) {
				echo '<br>';
			}
		}
		*/

			if (is_array($properties)){
				$counter = 0;
				foreach($properties as $key => $p) {
					if($p['bedrooms']>1){ $beds = "s"; } else { $beds = ""; }

					$bathrooms = $p['bathrooms']/10;
					if($p['bathrooms']>10){ $baths = "s"; } else { $baths = ""; }

					$price = formatMoney($p['price'], true);
					echo '
					<div class="col-lg-4 col-md-4">
					  <div class="property shadow-hover">
						<a href="/property.php?pid='.$p['id'].'" class="property-img">
						  <div class="img-fade"></div>
						  <div class="property-tag button status">For Sale???</div>
						  <div class="property-price">$'.$price.'</div>
						  <div class="property-color-bar"></div>
						  <img src="files/thumb/'.$p['cover'].'" alt="" />
						</a>
						<div class="property-content">
						  <div class="property-title">
						  <h4><a href="/property.php?pid='.$p['id'].'">'.$p['headline'].'</a></h4>
							<p class="property-address"><i class="fa fa-map-marker icon"></i> '.$p['name'].', '.$p['suburb'].', '.$p['state'].'</p>
						  </div>
						  <table class="property-details">
							<tr>
							  <td><i class="fa fa-bed"></i> '.$p['bedrooms'].' Bed'.$beds.'</td>
							  <td><i class="fa fa-tint"></i> '.$bathrooms.' Bath'.$baths.'</td>
							  <td><i class="fa fa-expand"></i> '.$p['propertysize'].' Sq Ft</td>
							</tr>
						  </table>
						</div>
						<div class="property-footer">
						  <span class="left"><i class="fa fa-calendar-o icon"></i> '.$p['timeago'].'</span>
						  <span class="right">
							<a href="#"><i class="fa fa-heart-o icon"></i></a>
							<a href="#"><i class="fa fa-share-alt"></i></a>
						  </span>
						  <div class="clear"></div>
						</div>
					  </div>
					</div>
					';
					$counter++;
					if($counter % 3 == 0) {
						echo '
						</div>
						<div class="row">
						';
					}
				}
			}
		
		?>
		
	</div><!-- end row -->
	
	<div class="pagination">
        <div class="center">
            <ul>
              <li><a href="#" class="button small grey"><i class="fa fa-angle-left"></i></a></li>
              <li class="current"><a href="#" class="button small grey">1</a></li>
              <li><a href="#" class="button small grey">2</a></li>
              <li><a href="#" class="button small grey">3</a></li>
              <li><a href="#" class="button small grey"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

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
<script src="js/global.js"></script>


</body>
</html>