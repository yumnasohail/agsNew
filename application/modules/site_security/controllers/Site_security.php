<?php 
/*************************************************
Created By: Imran Haider
Dated: 01-01-2014
version: 1.0
*************************************************/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_security extends MX_Controller
{

function __construct() {
parent::__construct();
}

function make_hash($password){

	$secure_pword = $this->more_secure($password);
	
	return $secure_pword;
}

function more_secure($password){
	$new_password = sha1($password .= 'a*B-c{}@dd#7383');
	return $new_password;
}


function add_station(){
	$station_id = $this->uri->segment(3);
	$new_password = 'aB-c121dd73d'.$station_id.'d83';
	echo $new_password;
}

function get_station(){
	$station_id = $this->uri->segment(3);
	$station_id = str_replace('aB-c121dd73d','', $station_id);
	$station_id = str_replace('d83','', $station_id);
	echo $station_id;
}

function is_login(){
	$curr_controller = $this->router->fetch_class();
	if($curr_controller != 'front' && $curr_controller != 'front_v2' && $curr_controller != 'api' && $curr_controller != 'front_mixmat' && $curr_controller != 'facebook'){
		$data = $this->session->userdata('route_user_data');
		if(!is_array($data)){
			redirect(ADMIN_BASE_URL);
		}
	}
}

function has_permission($outlet_id = ''){
	if($outlet_id == '')
	{
		if (defined('DEFAULT_CHILD_OUTLET'))   $outlet_id = DEFAULT_CHILD_OUTLET;
	    else  $outlet_id = DEFAULT_OUTLET;	
	}
	$file = ACTUAL_BANNER_IMAGE_PATH."debug_text.txt";  // for error testing

	$user_data = $this->session->userdata('route_user_data');
	$curr_controller = $this->router->fetch_class();
	//print '<br> controller ===>>'.$curr_controller;exit;
	$action = $this->router->fetch_method();
	file_put_contents ($file, "\n\n  =================".date('Y-m-d H:i:s')."================== \n\n ".$action, FILE_APPEND);
	file_put_contents ($file, "\n\n -1-action-".$action, FILE_APPEND);
    $role_id = 0;
	if (isset($user_data['role_id']) && !empty($user_data['role_id']))
		$role_id = $user_data['role_id'];
	if (($user_data['role'] != 'portal admin') && $curr_controller != 'front'  && $curr_controller != 'front_v2' && $curr_controller != 'front_mixmat' && $action != 'set_outlet_session'  && $curr_controller != 'api' && $curr_controller != 'facebook' ) {
		
		if($curr_controller != "dashboard"){
			$permission = Modules:: run('permission/has_permission',$role_id,$outlet_id,$curr_controller,$action);
			
			//using the FILE_APPEND flag to append the content.
			file_put_contents ($file, "\n\n ------------site security->HAS Petmission------------permission-".$permission, FILE_APPEND);
			if ($permission == false) {
				if ($this->input->is_ajax_request()) { 
					echo 'no_permission';
					//file_put_contents ($file, "\n\n -2-", FILE_APPEND);
					exit;
				} 
				//file_put_contents ($file, "\n\n -3-", FILE_APPEND);
				    $this->session->set_flashdata('message', 'Sorry'.' '. "You don\'t have permission!");										
		            $this->session->set_flashdata('status', 'danger');
					redirect(ADMIN_BASE_URL.'dashboard');
			}
		}
	}
	file_put_contents ($file, "\n\n -4-  end function", FILE_APPEND);
}

function check_has_permission($controller, $action){
	$outlet_id = DEFAULT_OUTLET;
	$user_data = $this->session->userdata('route_user_data');
	$role_id = $user_data['outlets_n_roles'][$outlet_id];
	if (($user_data['role'] != 'portal admin')) {
		if($controller != "dashboard"){
			$permission = Modules:: run('permission/has_permission', $role_id, $outlet_id, $controller, $action);
			if($permission)
				return 1;
			else
				return 0;
		}
	}else
		return 1;
}

function get_random_chars($leng = 32){
	
	$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ0123456789%#*(}[)@!^&";
	srand((double)microtime()*1000000);
	$i = 0;
	$code = '' ;
	while ($i <= $leng) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$code = $code . $tmp;
		$i++;
	}
	return $code;
}

function generate_serial($length){
    
        $len=$length;
        $base='123456789';
        $max=strlen($base)-1;
        $rand_num='';
        mt_srand((double)microtime()*1000000);
        while (strlen($rand_num)<$len+1)
        $rand_num.=$base(mt_rand(0,$max));
        
        $this->db->select("e_num");
        $this->db->from('employee');
        $this->db->where("e_num = '$rand_num'");
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            $query->free_result();
			$this->generate_serial(3);
			// This is where I want to run again this same function to generate a new serial
            // $this->generate_serial($lenght); (I tried it but it doesn't seem to work this way!)
        }
        else
        {
            return $rand_num;
        }
    
    }
function get_encrypt_code($leng = 7){
	
	$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ0123456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$code = '' ;
	while ($i <= $leng) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$code = $code . $tmp;
		$i++;
	}
	return sha1($code);
}


function get_captcha()
{
	$this->load->library('antispam');
	$this->load->helper('captcha');
	$rnd_char = $this->get_random_chars();
	$vals = array(
			//'word'         	=> $rndNumber,
			'img_path'     	=> './captcha/',
			'img_url'     	=> BASE_URL.'captcha/',
			'font_path'     => './fonts/',
			'img_width'     => '180',
			'img_height'	=> '30',
			'expiration' 	=> '60',
			'font_name'		=> 'MYRIADPRO-SEMIBOLD.ttf',
			'font_size'		=> 	17,
			'char_set' 		=>  $rnd_char, //"ABCDEFGHJKLMNPQRSTUVWXYZ2345689",
			'char_length' 	=>	6,
			'char_color' 	=>  "#373737",//"#880000,#008800,#000088,#888800,#880088,#008888,#000000",
			'line_count'	=>	0,		
			'line_color'	=>  "#DD6666,#66DD66,#6666DD,#DDDD66,#DD66DD,#66DDDD,#666666",
			'bg_color'		=>	'#FFFFFF',	
		);
		
		
		$cap = $this->antispam->get_antispam_image($vals);
		$code = $this->antispam->get_code();
		//print'<pre>';print_r($code );
		//print'<pre>';print_r($vals );
		//exit;
		//$cap = create_captcha($vals);
		$captcha = $cap['image'];
		return $captcha.'::'.$code; 
}
}