<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/


// User Constants
////////////////// ADMIN ///////////////  http://punjabitikka.no/
define('CURRENT_DOMAIN', $_SERVER['HTTP_HOST']);

$strHost = $_SERVER['SERVER_NAME'];
$strHost = preg_replace('/www./', '', $strHost, 1);
$folder =  substr($_SERVER['HTTP_HOST'], 0, (strpos($_SERVER['HTTP_HOST'], '.')));

if (empty($folder) )
	$folder = 'agsNew';

if (strpos($_SERVER['HTTP_HOST'], '.') > 0 && $_SERVER['HTTP_HOST'] != '192.168.2.50')
{
	$localname='';
}
else
	$localname='agsNew/';
print_r($strHost);exit;
$prefix = 'http';
if ($strHost == 'agsasa.azurewebsites.net' || $strHost == 'agsasa.com' )
	$prefix = 'https';
if($strHost=='localhost')
	define('WKHTMLTOPDF_FILE_PATH', APPPATH.'libraries/wkhtmltopdf/localhost/bin/wkhtmltopdf.exe');
else
	define('WKHTMLTOPDF_FILE_PATH', APPPATH.'libraries/wkhtmltopdf/live/bin/wkhtmltopdf');
define('WKHTMLTOPDF_BASE_URL', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'uploads/htmltopdf/');
define('BASE_URL', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname);
define('BASE_URL_FRONT', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname);
define('IMAGE_BASE_URL', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'uploads/');
define('CAPTCHA_BASE_URL', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'captcha/');
define('ADMIN_BASE_URL', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'admin/');
define('STATIC_ADMIN_CSS', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/admin/theme1/css/');
define('STATIC_ADMIN_JS', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/admin/theme1/js/');
define('STATIC_ADMIN_FONT', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/admin/theme1/fonts/');
define('STATIC_ADMIN_IMAGE', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/admin/theme1/images/');
define('STATIC_FRONT_OUTLET_CSS', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/front/'.$folder.'/css/');
define('STATIC_FRONT_CSS', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/front/theme1/css/');
define('STATIC_FRONT_JS', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/front/theme1/js/');
define('STATIC_FRONT_IMAGE', $prefix.'://'.$_SERVER['HTTP_HOST'].'/'.$localname.'static/front/theme1/images/');

define('API_KEY', "3ec00dddc00e1dec3115457b0e317c9fb1c34db2");
define('API_CONTENT_TYPE', "Content-Type:application/x-www-form-urlencoded");
define('API_DATETIME', "dateTime:123");
define('API_URL', "url:123");
define('API_HEADER_KEY', "key:cacf66b2b2ef2b102d340a51db35fb0e05bf1584");

define('FIREBASE_API_LINK', './application/modules/api/views/');
define('FIRE_BASE_API_KEY', "AAAAihFTZv0:APA91bFE_6U2s4Qg-94XONFTeOFFwE33-x8P4gsUjfeWgfzjcG-0mdgMg0kD1VzQYQwxMBybhTPaM4jNz7a2cDomAQLLJZSKbLgkDY9mCpedtKRIVD4_txc2KHgHMBNwfBphIJJ_4z1s");


///// verification email configuration ////
define('VERIFY_EMAIL_POST', 465);
define('VERIFY_EMAIL_USER', "verification@flexfit.hwtapps.com");
define('VERIFY_EMAIL_PASS', "6vAUVHNTh-M[");
define('VERIFY_EMAIL_HOST', 'ssl://flexfit.hwtapps.com');



define('OUTLET_USER_DEFAULT_IMAGE', 'user.png');
define('ACTUAL_OUTLET_USER_IMAGE_PATH', 'uploads/outlet_user/actual_images/');
define('LARGE_OUTLET_USER_IMAGE_PATH',  'uploads/outlet_user/large_images/');
define('MEDIUM_OUTLET_USER_IMAGE_PATH', 'uploads/outlet_user/medium_images/');
define('SMALL_OUTLET_USER_IMAGE_PATH', 'uploads/outlet_user/small_images/');

define('ACTUAL_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/actual_images/');
define('LARGE_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/large_images/');
define('MEDIUM_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/medium_images/');
define('SMALL_OUTLET_TYPE_IMAGE_PATH', 'uploads/outlet_type/small_images/');


define('ACTUAL_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/actual_images/');
define('LARGE_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/large_images/');
define('MEDIUM_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/medium_images/');
define('SMALL_GENERAL_SETTING_IMAGE_PATH', 'uploads/general_setting/small_images/');


define('DEFAULT_PAGE', 'defaultpage.jpg');
define('DEFAULT_WEBPAGES', 'user11.png');
define('ACTUAL_WEBPAGES_IMAGE_PATH', 'uploads/webpages/actual_images/');
define('LARGE_WEBPAGES_IMAGE_PATH', 'uploads/webpages/large_images/');
define('MEDIUM_WEBPAGES_IMAGE_PATH', 'uploads/webpages/medium_images/');
define('SMALL_WEBPAGES_IMAGE_PATH', 'uploads/webpages/small_images/');


define('APP_IMAGES_PATH', 'uploads/app_images/');/*
define('ACTUAL_WEBPAGES_IMAGE_PATH', 'uploads/web_pages/actual_images/');*/
define('ACTUAL_BANNER_IMAGE_PATH', 'uploads/web_pages/actual_images/');


define('OUTLET_DEFAULT_IMAGE', 'logo_default_dark.png');
define('ACTUAL_OUTLET_IMAGE_PATH', 'uploads/outlet/actual_images/');
define('LARGE_OUTLET_IMAGE_PATH', 'uploads/outlet/large_images/');
define('MEDIUM_OUTLET_IMAGE_PATH', 'uploads/outlet/medium_images/');
define('SMALL_OUTLET_IMAGE_PATH', 'uploads/outlet/small_images/');

define('DATA_SAVED', 'saved successfully');
define('DATA_UPDATED', 'updated successfully');




define('CSS_FILES', FCPATH.'static/front/theme1\css/');
define('IMAGE_BASE_URL_ITEMS', FCPATH.'uploads/items/');
define('THEMES_BASE_URL', FCPATH.'static/front/');
define('TEMPLATES_BASE_URL', FCPATH.'application/modules/');

//****PRODUCT TYPE****//
define('SHOW',1);
define('HIDDEN',2);
define('VERIFICATION_CODE_TIMER','+10 minutes');
define('PRIMARY_CHANGE_DURATION','-2 months');

//****Form Validations****//
define('TEXT_BOX_RANGE', 100);
define('TEXT_AREA_RANGE',255);

////////////////// Pagination constants ///////////////
define('LIMIT',10);
define('NUM_LINKS',10);
define('OUTLET', $_SERVER['HTTP_HOST']);

////////////////// BOOKING STATUS CONSTANTS ///////////////
define('INVOICE_OR_BOOKING_SAVED', 1);
define('PAYMENT_COMPLETED', 2);
define('ORDER_CANCELLED', 3);
define('FREE_SERVICE', 4);
define('UNCOMPLETED', 0);
define('BOOKING_CANCELLED', 3);
////////////////// BOOKING STATUS CONSTANTS ///////////////


// ORDER TYPE /////
define('TAKE_IN',1);
define('TAKE_OUT',2);
define('DELIVERY',3);

//****ORDER STATUS****//
define('OS_CONFIRM', 1);
define('OS_IN_PROCESS', 2);
define('OS_DELIVERED', 3);

//****PAYMENT STATUS****//
define('PS_IN_COMPLETE', 0);
define('PS_COMPLETE', 1);


////////////////// BOOKING REMINDER CONSTANTS ///////////////
define('REMINDER_MIN', 1);
define('REMINDER_HR', 2);
define('REMINDER_DAY', 3);
define('REMINDER_MONTH', 4);

////////////////// METRICS ///////////////
define('WEIGHT', 1);
define('VOLUME', 2);
define('PORTION', 3);
define('LENGTH', 4);
define('PERSON', 5);
define('BRAND', 6);
define('OTHER', 7);

define('PM_CASH', 1);
define('PM_CARD', 2);

/******************************/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/* End of file constants.php */

/* Location: ./application/config/constants.php */