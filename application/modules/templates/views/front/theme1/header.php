<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AGS Forsikring  - Skademeldingsskjema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="<?php echo STATIC_FRONT_CSS?>settings.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_FRONT_CSS?>layers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_FRONT_CSS?>/navigation.css">
   <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>font-awesome.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>linearicon.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>flaticon.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>magnific-popup.css">
    <link rel="stylesheet" href="<?php echo STATIC_FRONT_CSS?>style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .imgs{
            height: 50px;
        }
        
        body {
            position: static !important; /* Override position */
            min-height: auto !important; /* Override min-height */
            top: auto !important; /* Override top */
        }
                /* Dropdown button style */
        .language-dropdown {
            float: right; /* Aligns the dropdown to the right */
            position: relative; /* Needed for absolute positioning of the dropdown content */
        }

        .dropbtn {
            background-color: transparent; /* Makes the background transparent */
            color: white; /* Text color */
            padding: 10px;
            font-size: 16px;
            border: none; /* Removes border */
            cursor: pointer; /* Changes cursor to pointer */
            display: flex; /* Allows flex alignment */
            align-items: center; /* Aligns items vertically centered */
        }

        /* Selected flag */
        #selected-flag {
            width: 25px; /* Width of the flag */
            height: 25px; /* Height should match width for a round shape */
            margin-right: 10px; /* Space between flag and text */
            border-radius: 50%; /* Makes the flag round */
            object-fit: cover; /* Ensures flag image covers the area */
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none; /* Hidden by default */
            position: absolute; /* Positioned relative to the parent */
            background-color: #f9f9f9; /* Background color of dropdown */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); /* Shadow effect */
            z-index: 1; /* Ensures dropdown appears above other elements */
            border-radius: 5px; /* Slightly rounded corners for dropdown */
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black; /* Text color */
            padding: 12px 12px; /* Padding around the link */
            text-decoration: none; /* Removes underline from links */
            display: flex; /* Allows flex alignment */
            align-items: center; /* Aligns items vertically centered */
        }

        /* Link hover effect */
        .dropdown-content a:hover {
            background-color: #f1f1f1; /* Background color on hover */
            border-radius: 5px;
        }

        /* Flag icon style */
        .dropdown-content img {
            width: 25px; /* Width of the flag in dropdown */
            height: 25px; /* Height should match width for a round shape */
            border-radius: 50%; /* Makes the flag round */
        }

        /* Show the dropdown menu on button click */
        .language-dropdown:hover .dropdown-content,
        .language-dropdown .dropbtn:focus + .dropdown-content {
            display: block; /* Shows dropdown when hovering or focused */
        }

        .VIpgJd-ZVi9od-ORHb-OEVmcd {
            display: none; // add !important if required 
        }



    </style>
</head>

<header class="header-area">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-info">
                        <ul class="info-list">
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:484 04 100">484 04 100</a>
                            </li>
                            <li><i class="fa fa-envelope"></i>
                                <a href="mailto:post@agsforsikring.no">post@agsforsikring.no</a>
                            </li>
                            <li><i class="fa fa-map-marker"></i>Henrik Ibsens gate 90,0255 Oslo
                            </li>
                        </ul>
                        


                    </div><!-- end header-top-info -->
                </div><!-- end col-lg-6 -->

                <div class="col-lg-6">
                    <div class="language-dropdown" id="language-dropdown" style="display:none">
                        <button class="dropbtn">
                            <img id="selected-flag" src="<?php echo STATIC_FRONT_IMAGE; ?>no.jpg" alt="Selected Language" />
                        </button>
                        <div class="dropdown-content">
                            <a href="#" id="norwegian-option" onclick="translatePage('no', '<?php echo STATIC_FRONT_IMAGE; ?>flag.jpg')">
                                <img src="<?php echo STATIC_FRONT_IMAGE; ?>no.jpg" alt="Norwegian" />
                            </a>
                            <a href="#" id="english-option" style="display: none;" onclick="translatePage('en', '<?php echo STATIC_FRONT_IMAGE; ?>no.jpg')">
                                <img src="<?php echo STATIC_FRONT_IMAGE; ?>flag.jpg" alt="English" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-info header-login-info">
                        <!-- <ul class="info-list">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        </ul> -->
                    </div><!-- end header-top-info -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end header-top -->
    <div class="header-menu-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="<?php echo BASE_URL ?>"> <img src="<?php echo STATIC_FRONT_IMAGE?>logo_ags.png" alt="logo" class="imgs"></a>
                    </div><!-- end logo -->
                </div><!-- end col-lg-3-->
                <div class="col-lg-9 main-menu-wrapper">
                    <div class="main-menu-content">
                        <nav>
                            <ul>
                                <li>
                                    <a href="<?php echo BASE_URL ?>">HJEM</a>
                                   
                                </li>
                                <li>
                                    <a >SEGMENTER <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu-item">
                                        <li><a href="<?php echo BASE_URL.'kunst'; ?>">KUNST</a></li>
                                        <li><a href="<?php echo BASE_URL.'enerji'; ?>">ENERGY</a></li>
                                        <li><a href="<?php echo BASE_URL.'sport' ?>">SPORT</a></li>
                                        <!--<li>-->
                                        <!--    <a href="<?php echo BASE_URL.'ma' ?>">M&A </a>-->
                                           
                                        <!--</li>-->
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL.'kontakt' ?>">KONTAKT OSS</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL.'om_ags' ?>">OM AGS</a>
                                </li>
                                
                             
                            
                            </ul>
                        </nav>
                       <!-- end logo-right-button -->
                    </div><!-- end main-menu-content -->
                </div><!-- end col-lg-9 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end header-menu-wrapper -->
    <div class="side-nav-container">
        <div class="humburger-menu">
            <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
        </div><!-- end humburger-menu -->
        <div class="side-menu-wrap">
            <ul class="side-menu-ul">
                <li class="sidenav__item">
                    <a href="<?php echo BASE_URL ?>">HJEM</a>
                </li>
                <li class="sidenav__item">
                    <a >SEGMENTER</a>
                    <span class="menu-plus-icon"></span>
                    <ul class="side-sub-menu">
                        <li><a href="<?php echo BASE_URL.'kunst'; ?>">KUNST</a></li>
                        <li><a href="<?php echo BASE_URL.'enerji'; ?>">ENERGY</a></li>
                        <li><a href="<?php echo BASE_URL.'sport' ?>">SPORT</a></li>
                        <!--<li><a href="<?php echo BASE_URL.'ma' ?>">M&A</a></li>-->
                    </ul>
                </li>
                <li class="sidenav__item">
                    <a href="<?php echo BASE_URL.'kontakt' ?>">KONTAKT OSS</a>
                </li>
                <li class="sidenav__item">
                    <a href="<?php echo BASE_URL.'om_ags' ?>">OM AGS</a>
                </li>
            </ul>
        </div><!-- end side-menu-wrap -->
    </div><!-- end side-nav-container -->
</header>