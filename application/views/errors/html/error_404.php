<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AGS</title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- revolution slider css -->
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_FRONT_CSS?>css/settings.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800&amp;display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>font-awesome.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>linearicon.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>flaticon.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>magnific-popup.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>style.css">
</head>
<body>
<!-- start per-loader -->
<div class="loader-container">
    <div class="loader-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<!-- end per-loader -->

<!-- ================================
    START ERROR AREA
================================= -->
<section class="error-area text-center">
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <span class="error-circle"></span>
    <div class="error-actions">
        <div class="error-logo">
            <a href="<?php echo BASE_URL ?>"><img src="<?php echo STATIC_FRONT_IMAGE?>logo_ags.png" alt="logo"></a>
        </div>
        <ul>
            <li><a href="<?php echo BASE_URL ?>">Back to Home</a></li>
        </ul>
    </div><!-- end error-actions -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="error-content">
                    <img src="<?php echo STATIC_FRONT_IMAGE?>404-img3.gif" alt="error image">
                    <div class="sec-heading">
                        <h3 class="sec__title">Oops! Page not found.</h3>
                        <p class="sec__desc">
                            The page you are looking for might have been removed,
                            had its name changed, or is temporarily unavailable.
                            
                        </p>
                    </div>
                    <div class="or-box">
                        <span></span>
                    </div>
                    <div class="go-back">
                        <a href="<?php echo BASE_URL ?>" class="theme-button">
                            <i class="fa fa-angle-double-left btn-icon"></i> back to home
                        </a>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="copy-right">
                    <!-- <p class="copy__desc">© Copyright Minzel 2019. Made with <i class="fa fa-heart-o"></i> by
                        <a href="https://themeforest.net/user/techydevs/portfolio">Techydevs.</a>
                    </p> -->
                    <!-- <ul class="condition-links">
                        <li><a href="#">home</a></li>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">service</a></li>
                        <li><a href="#">contact</a></li>
                    </ul> -->
                </div><!-- end copy-right -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end error-area -->
<!-- ================================
    END ERROR AREA
================================= -->


<!-- start back-to-top -->
<div id="back-to-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<script src="<?php echo STATIC_FRONT_JS?>jquery.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>popper.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>bootstrap.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>owl.carousel.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>waypoint.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>jquery.counterup.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>jquery.magnific-popup.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>isotope-3.0.6.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>jquery-nice-select.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>smooth-scrolling.js"></script>
<script src="<?php echo STATIC_FRONT_JS?>main.js"></script>
</body>
</html>