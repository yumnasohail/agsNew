
<style>
    /* #cookieConsent {
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
} */
#cookie-consent-banner{
    display:none;
}

 /* Banner Styling */
.cookie-banner {
    border-radius: 5px;
    position: fixed;
    bottom: 18px;
    left: 1%;
    width: 98%;
    background-color: #f1f1f1;
    color: #333;
    padding: 20px;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cookie-banner p {
    margin: 0;
    flex: 1;
    font-size: 14px;
}


.cookie-buttons button {
    background-color: #900604;
    color: white;
    border: none;
    padding: 5px 5px;
    cursor: pointer;
    width:100%;
    margin-bottom:12px;
    font-size:13px;
}

.cookie-buttons button:hover {
    background-color: #900604;
}

.saveCookie{
    background-color: #ffffff;
    color: #900604;
    border: none;
    padding: 3px 0px;
    cursor: pointer;
    width: 100%;
    margin-bottom: 12px;
    font-size: 14px;
}

/* Cookie Settings Form */
.cookie-settings {
    display: block;
    background-color: #900604;
    padding: 5%;
    color: white;
}
.cookie-settings label {
    font-size: 14px;
    display: block;
}
.col3{
    width: 30%;
    float: right;
}
.col9{
    width: 70%;
    float: left;
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
                        <li><a href="<?php echo BASE_URL.'enerji'; ?>">Energy, On- and Offshore</a></li>
                        <!--<li><a href="<?php echo BASE_URL.'ma' ?>">M&A-forsikring</a></li>-->
                    </ul>
                </div><!-- end footer-shared -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4">
                <div class="footer-shared footer-widget2">
                    <h3 class="footer-title">Need Help?</h3>
                    <ul class="footer-link company-link">
                        <li><a href="<?php echo BASE_URL.'kontakt' ?>">KONTAKT OSS</a></li>
                        <li><a href="<?php echo BASE_URL.'privacy_policy' ?>">PRIVATLIV POLITIKK
                        </a></li>

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




<!-- <div id="cookieConsent">
    <div class="cookie-popup">
        <p>
            This website uses cookies to ensure you get the best experience on our website. 
        </p>
        <div class="row">
            <button id="acceptCookies">Accept</button>
            <button id="declineCookies">Don't Accept</button>
        </div>
    </div>
</div> -->



<div id="cookie-consent-banner" class="cookie-banner">
        <div class="col9">    
            <p>
            We use cookies to ensure proper functionality, gather analytics, and support marketing activities. 
            <br>By clicking <strong>“Accept All”</strong>, you agree to the use of these technologies for all purposes. 
            <br>Alternatively, you can customize your preferences by selecting the relevant checkboxes and clicking <strong>“Save Settings”</strong>.
            </p>
        </div>
        <div class="col3">   
            <div class=" cookie-buttons">
                <button class="col-md-12" id="accept-all-btn" onclick="acceptAllCookies()">Accept All</button>
                <button class="col-md-12" id="cookie-settings-btn" onclick="toggleCookieSettings()">Cookie Settings</button>
            </div>
            <div id="cookie-settings" class=" cookie-settings" style="display: none;">
                <form id="cookie-preferences-form">
                    <label>
                        <input type="checkbox" id="functional-cookies" checked>
                        Functional Cookies
                    </label>
                    <label>
                        <input type="checkbox" id="analytics-cookies" checked>
                        Analytics Cookies
                    </label>
                    <label>
                        <input type="checkbox" id="marketing-cookies" checked>
                        Marketing Cookies
                    </label>
                    <button type="button" class="saveCookie" onclick="saveCookieSettings()">Save Settings</button>
                </form>
            </div>
        </div>
</div>

<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'no', // Set the default page language
        includedLanguages: 'no,en', // Specify the languages available
        autoDisplay: false, // Prevent the popup from showing
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>


function translatePage(language, flagSrc) {
    const currentLang = getCookie('googtrans');
    alert(currentLang)
    alert(language)
    console.log('Language :', language);
    console.log('Current Language Cookie:', currentLang);
    // Determine the domain based on the environment

    // If Norwegian is selected, show the original content without Google Translate
    if (language === 'no') {
        if (currentLang !== '/auto/no') { // Check if already set
            // Set Google Translate cookie to Norwegian
            console.log('Setting Language Cookie to: /auto/no');
            document.cookie = "googtrans=/auto/no; path=/"; // Set domain based on environment
        }
        document.getElementById('selected-flag').src = flagSrc;

        // Show/hide the dropdown options
        document.getElementById('norwegian-option').style.display = 'none';
        document.getElementById('english-option').style.display = 'block';

        // Reload the page to show the original content
        location.reload();
    } else if (language === 'en') {
        if (currentLang !== '/auto/en') { // Check if already set
            console.log('Setting Language Cookie to: /auto/en');
            // Set Google Translate cookie for English
            document.cookie = "googtrans=/auto/en; path=/"; // Set domain based on environment
        }
        document.getElementById('selected-flag').src = flagSrc;

        // Show/hide the dropdown options
        document.getElementById('norwegian-option').style.display = 'block';
        document.getElementById('english-option').style.display = 'none';

        // Reload the page to apply the translation
        location.reload();
    }
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    alert(value)
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Optional: Check for existing cookies on page load
window.onload = function() {
    const lang = getCookie('googtrans');
    if (lang) {
        // Logic to set flags and dropdowns based on existing cookie value
        if (lang === '/auto/no') {
            document.getElementById('selected-flag').src = '<?php echo STATIC_FRONT_IMAGE; ?>no.jpg';
            document.getElementById('norwegian-option').style.display = 'none';
            document.getElementById('english-option').style.display = 'block';
        } else if (lang === '/auto/en'  ) {
            document.getElementById('selected-flag').src = '<?php echo STATIC_FRONT_IMAGE; ?>flag.jpg';
            document.getElementById('norwegian-option').style.display = 'block';
            document.getElementById('english-option').style.display = 'none';
        }
    } else {
        // Default to Norwegian if no cookie is set
        document.getElementById('selected-flag').src = '<?php echo STATIC_FRONT_IMAGE; ?>no.jpg';
        document.getElementById('norwegian-option').style.display = 'none';
        document.getElementById('english-option').style.display = 'block';
    }
};



window.onload = function() {
    checkCookieConsent();
    const lang = getCookie('googtrans');
    if (lang) {
        const selectedLang = lang.split('/')[2]; 
        
        document.getElementById('language-dropdown').style.display = 'block';  

        if (selectedLang === 'no') {
            document.getElementById('selected-flag').src = '<?php echo STATIC_FRONT_IMAGE; ?>no.jpg'; 
            document.getElementById('norwegian-option').style.display = 'none'; 
            document.getElementById('english-option').style.display = 'block'; 
        } else if (selectedLang === 'en') {
            document.getElementById('selected-flag').src = '<?php echo STATIC_FRONT_IMAGE; ?>flag.jpg'; 
            document.getElementById('norwegian-option').style.display = 'block'; 
            document.getElementById('english-option').style.display = 'none';
        }
    } else {
        document.getElementById('language-dropdown').style.display = 'block';  

        document.getElementById('selected-flag').src = '<?php echo STATIC_FRONT_IMAGE; ?>no.jpg';
        document.getElementById('norwegian-option').style.display = 'none'; 
        document.getElementById('english-option').style.display = 'block'; 
    }
};

</script>



<script>

// Function to toggle the cookie settings display
function toggleCookieSettings() {
    var settings = document.getElementById('cookie-settings');
    settings.style.display = settings.style.display === 'none' ? 'block' : 'none';
}

// Function to save selected cookie preferences
function saveCookieSettings() {
    var functional = document.getElementById('functional-cookies').checked ? 'enabled' : 'disabled';
    var analytics = document.getElementById('analytics-cookies').checked ? 'enabled' : 'disabled';
    var marketing = document.getElementById('marketing-cookies').checked ? 'enabled' : 'disabled';

    // Save preferences as cookies
    setCookie('cookieConsentFunctional', functional, 365);
    setCookie('cookieConsentAnalytics', analytics, 365);
    setCookie('cookieConsentMarketing', marketing, 365);

    hideCookieBanner(); // Hide banner after saving settings
}

// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Function to get a cookie value by name
function getCookies(name) {
    var nameEQ = name + "=";
    var cookiesArray = document.cookie.split(';');
    for (var i = 0; i < cookiesArray.length; i++) {
        var cookie = cookiesArray[i].trim();
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}

// Function to hide the cookie banner
function hideCookieBanner() {
    document.getElementById('cookie-consent-banner').style.display = 'none';
}

// Function to check if cookie consent has been given
function checkCookieConsent() {
    var consent = getCookies('cookieConsentFunctional') || getCookies('cookieConsentAnalytics') || getCookies('cookieConsentMarketing');
    if (!consent) {
        // Show the banner if no consent has been given yet
        document.getElementById('cookie-consent-banner').style.display = 'block';
    } else {
        // Hide the banner if consent already given
        hideCookieBanner();
    }
}

// Function to accept all cookies
function acceptAllCookies() {
    setCookie('cookieConsentFunctional', 'enabled', 365);
    setCookie('cookieConsentAnalytics', 'enabled', 365);
    setCookie('cookieConsentMarketing', 'enabled', 365);
    hideCookieBanner(); // Hide banner after accepting all cookies
}





</script>

<!-- Slider Revolution core JavaScript files -->
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/minzel/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Nov 2020 11:44:31 GMT -->
</html>