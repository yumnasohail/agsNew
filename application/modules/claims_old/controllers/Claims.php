<?php 
/*************************************************
Created By: Imran Haider
Dated: 01-01-2014
version: 1.0
*************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Claims extends MX_Controller
{

    function __construct() {
    parent::__construct();
        Modules::run('site_security/is_login');
        Modules::run('site_security/has_permission');
    }

    function index() {
		$data['users_rec'] = $this->_get_where_cols(array('status <>'=>'3'), 'id desc')->result_array();
		$data['view_file'] = 'users_listing';
        $this->load->module('template');
        $this->template->admin($data);
    }


    function create(){	
        $update_id = $this->uri->segment(4);
		if($update_id && $update_id != 0) {
			$data['users'] = $this->_get_data_from_db($update_id);
		}else{
			$data['users'] = $this->_get_data_from_post();
		}
        $data['update_id'] = $update_id; 
        $data['view_file'] = 'users_form';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if ($update_id && $update_id != 0) {
            $where['id'] = $update_id;
            $this->_update($where, $data);
			$this->session->set_flashdata('message', 'User'.' '.DATA_UPDATED);				
            $this->session->set_flashdata('status', 'success');                
        }
        else {
            $data = $this->_get_data_from_post();
            $user_data = $this->session->userdata('route_user_data');
            if(!isset($user_data['user_id']))
                $user_data['user_id'] = 0;
            $data['created_user'] = $user_data['user_id'];
            $id = $this->_insert($data);
          
			$this->session->set_flashdata('message', 'User'.' '.DATA_SAVED);
	        $this->session->set_flashdata('status', 'success');
            $data['users'] = $this->_get()->result_array();
            $data['view_file'] = 'users_listing';
            $this->load->module('template');
            $this->template->admin($data);
        }
        redirect(ADMIN_BASE_URL . 'users');
    }

    function _get_data_from_db($update_id) {
        $where['users.id'] = $update_id;
        $query = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("users.id"=>$update_id), 'id desc','id','users','*','1','0','','','');
        foreach ($query->result() as
                $row) {
            $data['user_name'] = $row->user_name;
            $data['country'] = $row->country;
            $data['first_name'] = $row->first_name;
            $data['last_name'] = $row->last_name;
            $data['phone'] = $row->phone;
            $data['address1'] = $row->address1;
            $data['address2'] = $row->address2;
            $data['city'] = $row->city;
            $data['email'] = $row->email;
            $data['country'] = $row->country;
            $data['state'] = $row->state;
            $data['password'] = $row->password;
			$data['role_id'] = $row->role_id;
			$data['user_image'] = $row->user_image;
			$data['gender'] = $row->gender;
        }
        return $data;
    }
    
    function _get_data_from_post() {
		$data['user_name'] = $this->input->post('user_name');
		$data['country'] = $this->input->post('country');
		$data['state'] = $this->input->post('state');
		$data['city'] = $this->input->post('city');
		$data['address1'] = $this->input->post('address1');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
        $data['first_name'] = $this->input->post('first_name');
        $data['last_name'] = $this->input->post('last_name');
        $data['gender'] = $this->input->post('gender');
        return $data;
    }

    function delete(){
        $id = $this->input->post('id');
        $user_checking = Modules::run('api/_get_specific_table_with_pagination',array("id"=>$id), "id desc","users","user_image","1","1")->result_array();
        if(!empty($user_checking)) {
            Modules::run('api/update_specific_table',array("id"=>$id),array("status"=>'3'),"users")->result_array();
        }
    }


    /////////////// for detail ////////////
    function detail() {
        $update_id = $this->input->post('id');
        $data['users_res'] = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $this->load->view('detail', $data);
    }

////////////////////////////////////////////////
    function _get($order_by='id desc'){
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_get($order_by);
        return $query;
    }

    function _getItemById($id) {
        $this->load->model('mdl_users');
        return $this->mdl_users->_getItemById($id);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_users');
        return $this->mdl_users->_get_by_arr_id($arr_col);
    }


    function _get_where($id){
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_get_where($id);
        return $query;
    }


    function _get_where_cols($cols,$order_by){
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_get_where_cols($cols,$order_by);
        return $query;
    }

    function _get_where_custom($col, $value,$order_by='id asc') {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_get_where_custom($col, $value,$order_by);
        return $query;
    }

    function _insert($data){
        $this->load->model('mdl_users');
        return $this->mdl_users->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_update($arr_col, $data);
    }

    function _update_where_cols($cols, $data){
        $this->load->model('mdl_users');
        return $this->mdl_users->_update_where_cols($cols, $data);
    }




}