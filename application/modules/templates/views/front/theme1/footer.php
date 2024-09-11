
<style>
    #cookieConsent {
    position: fixed;
    bottom: 20px;
    left: 20px;
    right: 20px;
    background-color: #f1f1f1;
    padding: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    display: none;
    z-index: 10000;
}

.cookie-popup {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cookie-popup p {
    margin: 0;
    font-size: 14px;
}

.cookie-popup a {
    color: #007bff;
    text-decoration: none;
}

.cookie-popup a:hover {
    text-decoration: underline;
}

#acceptCookies, #declineCookies {
    background-color: #900604;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-right: 15px;
}

#acceptCookies:hover ,#declineCookies:hover {
    background-color: #b40b09;
}
</style>
<section class="footer-area">
    <div class="container">
        <div class="box-icons">
            <div class="box-one"></div>
            <div class="box-two"></div>
            <div class="box-three"></div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-shared">
                    <ul class="footer-address-links">
                        <li><a href="tel:906 18 401"><i class="fa fa-phone"></i>Skadesenter: 906 18 401</a></li>
                        <li><a href="tel:484 04 100"><i class="fa fa-phone"></i>Administrasjon: 484 04 100</a></li>
                        <li>
                            <a href="mailto:post@agsforsikring.no" class="mail">
                                <i class="fa fa-envelope"></i> post@agsforsikring.no
                            </a>
                        </li>
                        <li><a ><i class="fa fa-map-marker"></i>Henrik Ibsens gate 90,

<br>0255 Oslo</a></li>
                    </ul>
                </div><!-- end footer-shared -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4">
                <div class="footer-shared footer-widget">
                    <h3 class="footer-title">SEGMENTER</h3>
                    <ul class="footer-link company-link">
                        <li><a href="<?php echo BASE_URL.'kunst'; ?>">Kunst</a></li>
                        <li><a href="<?php echo BASE_URL.'sport' ?>">Sport og idrettsarrangementer</a></li>
                        <li><a href="<?php echo BASE_URL.'enerji'; ?>">Energy, on- og off-shore</a></li>
                        <!--<li><a href="<?php echo BASE_URL.'ma' ?>">M&A-forsikring</a></li>-->
                    </ul>
                </div><!-- end footer-shared -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4">
                <div class="footer-shared footer-widget2">
                    <h3 class="footer-title">Need Help?</h3>
                    <ul class="footer-link company-link">
                        <li><a href="<?php echo BASE_URL.'kontakt' ?>">KONTAKT OSS</a></li>
                    </ul>
                </div><!-- end footer-shared -->
            </div><!-- end col-lg-3 -->
            <!-- <div class="col-lg-3">
                <div class="footer-shared footer-widget3">
                    <h3 class="footer-title">get in touch.</h3>
                    <div class="contact-form-action">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="message-control form-control" name="message" placeholder="Write Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button class="theme-button" type="submit">
                                            send us message <i class="fa fa-angle-right btn-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-content text-center">
                    
                    </p>
                </div><!-- end copyright-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row-->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
          END FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- Template JS Files -->
<script src="<?php echo STATIC_FRONT_JS ?>jquery.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>popper.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>bootstrap.min.js"></script>
<script src="<?php  echo STATIC_FRONT_JS ?>owl.carousel.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>chart.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>result-chart.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>waypoint.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>jquery.counterup.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>jquery.magnific-popup.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>isotope-3.0.6.min.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>jquery-nice-select.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>smooth-scrolling.js"></script>
<script src="<?php echo STATIC_FRONT_JS ?>main.js"></script>


<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php ECHO STATIC_FRONT_JS?>revolution.extension.video.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_FRONT_JS?>rev-slider-script.js"></script>




<div id="cookieConsent">
    <div class="cookie-popup">
        <p>
            This website uses cookies to ensure you get the best experience on our website. 
            <!-- <a href="/privacy-policy" target="_blank">Learn more</a>. -->
        </p>
        <div class="row">
            <button id="acceptCookies">Accept</button>
            <button id="declineCookies">Don't Accept</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Check if the cookie consent has already been given
    if (!getCookie("cookieConsent")) {
        document.getElementById("cookieConsent").style.display = "block";
    }

    // Set the cookie consent when the button is clicked
    document.getElementById("acceptCookies").addEventListener("click", function() {
        setCookie("cookieConsent", "true", 365);
        document.getElementById("cookieConsent").style.display = "none";
    });

    document.getElementById("declineCookies").addEventListener("click", function() {
        setCookie("cookieConsent", "false", 365);
        document.getElementById("cookieConsent").style.display = "none";
    });
});

// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

// Function to get a cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
</script>
<!-- Slider Revolution core JavaScript files -->
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/minzel/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Nov 2020 11:44:31 GMT -->
</html>