<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
/////////////// ADMIN PAGES ////////////////
	$route['default_controller'] = 'front_end';
	$route['admin/login/submit_login'] = "login/submit_login";
	$route['admin'] = "login";
	$route['admin/logout'] = "login/logout";
	$route['admin/azureCallBack'] = "login/callback";
	$route['table_list']= "api/table_list";
	$folder="front/";
	$route['curling']=$folder."curling";
	$route['nrl']=$folder."nrl";
	$route['tsff']=$folder."tsff";
	$route['naif']=$folder."naif";
	$route['judo']=$folder."judo";
	$route['nlf-f']=$folder."nlf_f";
	$route['nvf']=$folder."nvf";
	$route['nlf-hps']=$folder."nlf_hps";
	$route['ssff']=$folder."ssff";
	$route['sff']=$folder."sff";
	$route['styrkeloft']=$folder."styrkeloft";
	$route['suksess']=$folder."success_page";
	$route['kunst']="front_end/kunst";
	$route['enerji']="front_end/enerji";
	$route['privacy_policy']="front_end/privacy_policy";
	$route['sport']="front_end/sport";
// 	$route['ma']="front_end/ma";
	$route['kontakt']="front_end/kontakt";
	$route['om_ags']="front_end/om_ags";
	$route['switch/(:any)'] = 'front_end/language/switch/$1';

	$route['oppdater/(.+)/(.+)']=$folder."oppdater";
	$route['admin/(.+)'] = "$1/$1";
	
	
	$strHost = $_SERVER['SERVER_NAME'];
	$strHost = preg_replace('/www./', '', $strHost, 1);
	$route['([a-zA-Z-]+)'] = $folder."page/$1";
	$route['404_override'] = '';
	

	

	
