<?php 
/*************************************************
Created By: Tahir Mehmood
Dated: 28-09-2016
*************************************************/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Templates extends MX_Controller 
{

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url', 'language']);

		// Check if the language session is already set
		if (!$this->session->userdata('site_lang')) {
			// First time: Set to default language
			$this->session->set_userdata('site_lang', 'norwegian');
		}

		// Now use the session value
		$lang = $this->session->userdata('site_lang');

		// Load the appropriate language file
		$this->lang->load($lang . '_lang', $lang);
	}


	
	function index(){
		$this->load->view('theme1');
	}

	function front($data){

		$this->load->view('front/theme1/front',$data);
	}
	function front2($data){

		$this->load->view('front/theme1/front2',$data);
	}

	function get_outlets(){
		$outlets = array();
		$user_data = $this->session->userdata('route_user_data');
		if($user_data['role_id'] == '5' || $user_data['role'] == 'portal admin'){
			$result = Modules::run('outlet/get_outlets_array');
		
			foreach($result as $key => $name){
				$outlets[$key]['id'] = $key;
				$outlets[$key]['name'] = $name;
			}
		}else{
			$result = Modules::run('roles_outlet/_get_where_custom', 'emp_id', $user_data['user_id']);
			foreach($result->result() as $key => $row){
				$outlet = Modules::run('outlet/_get_where',$row->outlet_id)->row();
				$outlets[$key]['id'] = $outlet->id;
				$outlets[$key]['name'] = $outlet->name;
			}
			
		}
		$data['all_outlet_id']=Modules::run('outlet/_get_all_details_admin','id asc')->result_array();
		$data['outlet_id'] = DEFAULT_OUTLET;
		$data['outlets'] = $outlets;
		return $data;
	}
	
	function footer($data)
	{
		$this->load->view('common/footer', $data);
	}
	

}
