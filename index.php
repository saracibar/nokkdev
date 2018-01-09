<?php
require_once 'app/init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOKK | A real estate theme</title>

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

<section class="subheader simple-search">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
      <h1>Find your dream home.</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec risus egestas, vestibulum arcu.</p>
      <form class="simple-search-form">
        <input type="text" placeholder="Enter an address or city..." />
        <input type="submit" value="GO" />
      </form>
    </div>
    </div>

    <a href="property-listing-map.html">Dummy link for now to see search results</a>


  </div><!-- end container -->
</section>

<section class="module services">
  <div class="container">
    <div class="module-header">
      <h2>How NOKK works</h2>
      <img src="images/divider.png" alt="" />
      <p>Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="service-item">
          <i class="fa fa-home"></i>
          <h4>Sell Property</h4>
          <p>Morbi accumsan ipsum velit Nam nec tellus 
          a odio tincidunt auctor a ornare odio sedlon 
          maurisvitae erat consequat auctor</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="service-item shadow-hover">
          <i class="fa fa-group"></i>
          <h4>Expert Agents</h4>
          <p>Morbi accumsan ipsum velit Nam nec tellus 
          a odio tincidunt auctor a ornare odio sedlon 
          maurisvitae erat consequat auctor</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="service-item shadow-hover">
          <i class="fa fa-file-text"></i>
          <h4>Daily Listings</h4>
          <p>Morbi accumsan ipsum velit Nam nec tellus 
          a odio tincidunt auctor a ornare odio sedlon 
          maurisvitae erat consequat auctor</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="module property-categories">
  <div class="container">

    <div class="module-header">
      <h2>Browse Our Most <strong>Popular Categories</strong></h2>
      <img src="images/divider.png" alt="" />
      <p>Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
    </div>

    <div class="row">
      <div class="col-lg-8 col-md-8">
        <a href="#" class="property-cat property-cat-apartments">
          <h3>Studio Apartments</h3>
          <div class="color-bar"></div>
          <span class="button small">234 Properties</span>
        </a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a href="#" class="property-cat property-cat-houses">
          <h3>Family Homes</h3>
          <div class="color-bar"></div>
          <span class="button small">234 Properties</span>
        </a>
      </div>
    </div><!-- end row -->

    <div class="row">
      <div class="col-lg-4 col-md-4">
        <a href="#" class="property-cat property-cat-condos">
          <h3>Condos & Villas</h3>
          <div class="color-bar"></div>
          <span class="button small">234 Properties</span>
        </a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a href="#" class="property-cat property-cat-waterfront">
          <h3>Waterfront Homes</h3>
          <div class="color-bar"></div>
          <span class="button small">234 Properties</span>
        </a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a href="#" class="property-cat property-cat-cozy">
          <h3>Cozy Houses</h3>
          <div class="color-bar"></div>
          <span class="button small">234 Properties</span>
        </a>
      </div>
    </div><!-- end row -->

  </div><!-- end container -->
</section>

<section class="module properties">
  <div class="container">

    <div class="module-header">
      <h2>Recently Added <strong>Properties</strong></h2>
      <img src="images/divider.png" alt="" />
      <p>Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4">
          <div class="property shadow-hover">
            <a href="#" class="property-img">
              <div class="img-fade"></div>
              <div class="property-tag button alt featured">Featured</div>
              <div class="property-tag button status">For Sale</div>
              <div class="property-price">$150,000</div>
              <div class="property-color-bar"></div>
              <img src="images/1837x1206.png" alt="" />
            </a>
            <div class="property-content">
              <div class="property-title">
              <h4><a href="#">Modern Family Home</a></h4>
                <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
              </div>
              <table class="property-details">
                <tr>
                  <td><i class="fa fa-bed"></i> 3 Beds</td>
                  <td><i class="fa fa-tint"></i> 2 Baths</td>
                  <td><i class="fa fa-expand"></i> 25,000 Sq Ft</td>
                </tr>
              </table>
            </div>
            <div class="property-footer">
              <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>
              <span class="right">
                <a href="#"><i class="fa fa-heart-o icon"></i></a>
                <a href="#"><i class="fa fa-share-alt"></i></a>
              </span>
              <div class="clear"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4">
          <div class="property shadow-hover">
            <a href="#" class="property-img">
              <div class="img-fade"></div>
              <div class="property-tag button alt featured">Featured</div>
              <div class="property-tag button status">For Rent</div>
              <div class="property-price">$6,500 <span>Per Month</span></div>
              <div class="property-color-bar"></div>
              <img src="images/1837x1206.png" alt="" />
            </a>
            <div class="property-content">
              <div class="property-title">
              <h4><a href="#">Beautiful Waterfront Condo</a></h4>
                <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
              </div>
              <table class="property-details">
                <tr>
                  <td><i class="fa fa-bed"></i> 3 Beds</td>
                  <td><i class="fa fa-tint"></i> 2 Baths</td>
                  <td><i class="fa fa-expand"></i> 25,000 Sq Ft</td>
                </tr>
              </table>
            </div>
            <div class="property-footer">
              <span class="left"><i class="fa fa-calendar-o icon"></i> 1 week ago</span>
              <span class="right">
                <a href="#"><i class="fa fa-heart-o icon"></i></a>
                <a href="#"><i class="fa fa-share-alt"></i></a>
              </span>
              <div class="clear"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4">
          <div class="property shadow-hover">
            <a href="#" class="property-img">
              <div class="img-fade"></div>
              <div class="property-tag button alt featured">Featured</div>
              <div class="property-tag button status">For Rent</div>
              <div class="property-price">$150,000</div>
              <div class="property-color-bar"></div>
              <img src="images/1837x1206.png" alt="" />
            </a>
            <div class="property-content">
              <div class="property-title">
              <h4><a href="#">Modern Family Home</a></h4>
                <p class="property-address"><i class="fa fa-map-marker icon"></i>123 Smith Dr, Annapolis, MD</p>
              </div>
              <table class="property-details">
                <tr>
                  <td><i class="fa fa-bed"></i> 3 Beds</td>
                  <td><i class="fa fa-tint"></i> 2 Baths</td>
                  <td><i class="fa fa-expand"></i> 25,000 Sq Ft</td>
                </tr>
              </table>
            </div>
            <div class="property-footer">
              <span class="left"><i class="fa fa-calendar-o icon"></i> 2 weeks ago</span>
              <span class="right">
                <a href="#"><i class="fa fa-heart-o icon"></i></a>
                <a href="#"><i class="fa fa-share-alt"></i></a>
              </span>
              <div class="clear"></div>
            </div>
          </div>
        </div>
    </div><!-- end row -->

    <div class="center"><a href="#" class="button button-icon more-properties-btn"><i class="fa fa-angle-right"></i> View More Properties</a></div>

  </div><!-- end container -->
</section>

<section class="module testimonials">

  <div class="container">
    <div class="module-header">
      <h2>Our <strong>Testimonials</strong></h2>
      <img src="images/divider-white.png" alt="" />
      <p>Morbi accumsan ipsum velit nam nec tellus a odiose tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor</p>
    </div>
  </div>

  <div class="slider-nav slider-nav-testimonials">
    <span class="slider-prev"><i class="fa fa-angle-left"></i></span>
    <span class="slider-next"><i class="fa fa-angle-right"></i></span>
  </div>

  <div class="container">
    <div class="slider slider-testimonials">
      <div class="testimonial slide">
        <h3>"Homely helped us sell our house with minimal effort. Their team was efficient and always there to help!"</h3>
        <div class="testimonial-details">
          <img class="testimonial-img" src="images/70x70.png" alt="" />
          <p class="testimonial-name"><strong>John Doe</strong></p>
          <span class="testiomnial-title"><em>CEO at <a href="#">Rype Creative</a></em></span>
        </div>
      </div>
      <div class="testimonial slide">
        <h3>"Homely helped us sell our house with minimal effort. Their team was efficient and always there to help! Homely helped us sell our house with minimal effort. Their team was efficient and always there to help!"</h3>
        <div class="testimonial-details">
          <img class="testimonial-img" src="images/70x70.png" alt="" />
          <p class="testimonial-name"><strong>John Doe</strong></p>
          <span class="testiomnial-title"><em>CEO at <a href="#">Rype Creative</a></em></span>
        </div>
      </div>
    </div><!-- end slider -->
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