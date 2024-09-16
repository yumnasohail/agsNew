<?php 
/*************************************************
Created By: Akabir Abbasi
Dated: 18-08-2015
*************************************************/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// include APPPATH.’/libraries/hybridauth/src/autoload.php’;

// //Import Hybridauth’s namespace
// use Hybridauth\Hybridauth;
class Login extends MX_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->config('azure');

	}
	///////////////////////////////////////////////////////////////////////////////////

	function index(){
		$azure_client_id = $this->config->item('azure_client_id');
        $azure_redirect_uri = $this->config->item('azure_redirect_uri');
		$azure_tenant_id = $this->config->item('azure_tenant_id');
		
        
        // Redirect users to Azure AD login page
        $auth_url = 'https://login.microsoftonline.com/'.$azure_tenant_id.'/oauth2/authorize';
        $auth_url .= "?client_id={$azure_client_id}";
        $auth_url .= "&response_type=code";
        $auth_url .= "&redirect_uri={$azure_redirect_uri}";
        $auth_url .= "&response_mode=query";
        // Add other required parameters

        redirect($auth_url);

		// $data['general_settings']=Modules::run('general_setting/_get_where', DEFAULT_OUTLET)->row_array();
		// $this->load->view('login_form',$data);
	}


	function callback() {

        // Handle callback from Azure AD
        $authorization_code = $this->input->get('code');
		// print_r($authorization_code);exit;

		


		$azure_client_id = $this->config->item('azure_client_id');
        $azure_redirect_uri = $this->config->item('azure_redirect_uri');
		$azure_tenant_id = $this->config->item('azure_tenant_id');
		$azure_client_secret = $this->config->item('azure_client_secret');
		$azure_logout_uri = $this->config->item('azure_logout_uri');

		

		$token_endpoint = 'https://login.microsoftonline.com/'.$azure_tenant_id.'/oauth2/token';
		$redirect_uri = 'https://agsasa.azurewebsites.net/admin/azureCallBack'; // Must match the one registered in Azure AD
		$params = array(
			'grant_type' => 'authorization_code',
			'client_id' => $azure_client_id,
			'client_secret' => $azure_client_secret,
			'redirect_uri' => $azure_redirect_uri,
			'code' => $authorization_code,
			'resource' => 'https://graph.microsoft.com', // Resource identifier for Microsoft Graph API
		);
		$response = $this->http_post($token_endpoint, $params); // Implement http_post function to make HTTP POST request
		if ($response && isset($response['access_token'])) {
			// Step 3: Parse Tokens
			$access_token = $response['access_token'];
			$id_token = $response['id_token'];

			// Decode ID Token to extract user information
			$decoded_id_token = base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $id_token)[1])));
			$id_token_info = json_decode($decoded_id_token, true);
			$user_id = $id_token_info['sub']; // User ID
			$user_email = $id_token_info['email']; // User email
			// Additional profile details can be extracted from $id_token_info

			// Step 4: Retrieve Profile Details from Microsoft Graph API
			$graph_api_url = 'https://graph.microsoft.com/v1.0/me';
			$headers = array(
				'Authorization: Bearer ' . $access_token,
			);
			$graph_response = $this->http_get($graph_api_url, $headers); // Implement http_get function to make HTTP GET request
			if ($graph_response) {
				$user_profile = json_decode($graph_response, true);
				// User profile details are available in $user_profile
				$row = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("email"=>$user_profile['mail']), 'id desc','id','users','id,role_id,user_name,email,outlet_id,device,device_id,last_login','1','1','','','')->row();
				if (empty($row)) {
					$logoutUrl = 'https://login.microsoftonline.com/'.$azure_tenant_id.'/oauth2/v2.0/logout?post_logout_redirect_uri='.$azure_logout_uri;
					redirect($logoutUrl);
				}
				$where['emp_id'] = $row->id;
				$where1['emp_id'] = $row->id;
				$role_id = $row->role_id;
				$result = Modules::run('roles/_get_where',$role_id)->row();
				$data['user_id'] = $row->id;
				$data['role_id'] = $result->id; 
				$data['name'] = $row->user_name;
				$data['user_image'] = $row->user_image;
				$data['role'] = $result->role;
				$data['user_email'] = $row->email;
				$data['user_name'] = $row->user_name;
				$data['outlet_id'] = $row->outlet_id;
				$data['device'] = $row->device;
				$data['device_id'] = $row->device_id;
				$data['last_login'] =  date("d-m-Y h:i:s", strtotime($row->last_login));
				$data['is_supperadmin'] = 1;
				$this->session->set_userdata('route_user_data', $data);
				$user_data = $this->session->userdata('route_user_data');
				redirect(ADMIN_BASE_URL.'dashboard');
			}
		} else {
			// Error handling if tokens are not received
			log_message('error', 'Error receiving Azure AD token: ' . json_encode($response));

			//$logoutUrl = 'https://login.microsoftonline.com/'.$azure_tenant_id.'/oauth2/v2.0/logout?post_logout_redirect_uri='.$azure_logout_uri;
			//redirect($logoutUrl);

		}
    }


	function http_post($url, $data) {
		$ch = curl_init();

		// Set Curl options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		// Execute Curl request
		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	
		if ($http_code >= 200 && $http_code < 300) {
			return json_decode($response, true);
		} else {
			// Handle error
			return false;
		}
	}
	
	function http_get($url, $headers) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
	
		if ($http_code >= 200 && $http_code < 300) {
			return $response;
		} else {
			// Handle error
			return false;
		}
	}
	
	///////////////////////////////////////////////////////////////////////////////////

	function submit_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean|callback_pword_check');
		$username = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE)); 
		$row = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("lower(user_name)"=>$username,"password"=>$password), 'id desc','id','users','id,role_id,user_name,email,outlet_id,device,device_id,last_login','1','1','','','')->row();
		if (empty($row)) {
			redirect(ADMIN_BASE_URL);
			exit();
		}
		$where['emp_id'] = $row->id;
		$where1['emp_id'] = $row->id;
		$role_id = $row->role_id;
		$result = Modules::run('roles/_get_where',$role_id)->row();
		$data['user_id'] = $row->id;
		$data['role_id'] = $result->id; 
		$data['name'] = $row->user_name;
		$data['user_image'] = $row->user_image;
		$data['role'] = $result->role;
		$data['user_email'] = $row->email;
		$data['user_name'] = $row->user_name;
		$data['outlet_id'] = $row->outlet_id;
		$data['device'] = $row->device;
		$data['device_id'] = $row->device_id;
		$data['last_login'] =  date("d-m-Y h:i:s", strtotime($row->last_login));
		$data['is_supperadmin'] = 1;
		$this->session->set_userdata('route_user_data', $data);
		$user_data = $this->session->userdata('route_user_data');
		redirect(ADMIN_BASE_URL.'dashboard');
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function pword_check($txtPassword){
		$password = Modules::run('site_security/make_hash',$txtPassword);
		$username = $this->input->post('txtUserName',TRUE);
		$row = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("lower(user_name)"=>$username,"password"=>$password), 'id desc','id','users','id','1','1','','','')->result_array();
		if (empty($row)){
			$this->form_validation->set_message('pword_check', 'The username or password you have entered is incorrect.');
			return FALSE;
		}else{
			return TRUE;
		}
		
	}
	///////////////////////////////////////////////////////////////////////////////////

	function forgot_password_action(){
		$status = 'error';
		$email = $this->input->post('email');
		
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function email_n_code_check($txtEmail){
		$security_code = $this->input->post('txtCode');
		$rndChar = $this->input->post('hdn_code');
		$query = Modules::run("users/_get_where_custom",'email',$txtEmail);
		$result = $query->row();
		if (!isset($result->email)){
			$this->form_validation->set_message('email_n_code_check', 'This email doesn\'t exist.');
			return FALSE;
		}else if($rndChar != $security_code){
			$this->form_validation->set_message('email_check', 'Incorrect security code.');
			return FALSE;
		}else{
			return true;
		}
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function reset_password(){
		$data['email'] = $this->uri->segment(4);
//		$data['code'] = $this->uri->segment(5);	
		$this->load->view('reset_password', $data);
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function submit_reset_password(){
		$where['email'] = $this->input->post('email');
//		$where['code'] = $this->session->userdata('code');
		$password = $this->input->post('new_password');
		$data['password'] = md5($password);
		$result = Modules::run("users/_update_where_cols", $where, $data);
		echo $result;
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function password_check($txtEmail){
		$new_password = $this->input->post('txtNewPassword');
		$conf_password = $this->input->post('txtConfPassword');
		if($new_password != $conf_password){
			$this->form_validation->set_message('password_check', 'Password doesn\'t match.');
			return FALSE;
		}else{
			return true;
		}
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function success(){
		$data['view_file'] = 'success';
		$this->load->module('template');
		$this->template->admin_login($data);
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function logout(){
		
		$azure_tenant_id = $this->config->item('azure_tenant_id');
		$azure_logout_uri = $this->config->item('azure_logout_uri');
		$this->session->unset_userdata('flaxfit_user_data');
		$this->session->unset_userdata('outlet_data');
		$this->session->unset_userdata('f_station_id');
		$logoutUrl = 'https://login.microsoftonline.com/'.$azure_tenant_id.'/oauth2/v2.0/logout?post_logout_redirect_uri='.$azure_logout_uri;
		redirect($logoutUrl);

		//$this->index();
	}
	///////////////////////////////////////////////////////////////////////////////////
	
}