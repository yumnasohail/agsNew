<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class email extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
Modules::run('site_security/has_permission');

}

    function index() {
        $this->list();
    }

    function list() {

        $data['email']=Modules::run('api/get_specific_table_data',"","id desc","*","email","","")->row_array();
        $data['view_file'] = 'create_email';
        $this->load->module('template');
        $this->template->admin($data);
    }

  
 

    function _get_data_from_post() {
        $data['appr_claim'] = $this->input->post('appr_claim');
        $data['rej_claim'] = $this->input->post('rej_claim');
        $data['close_claim'] = $this->input->post('close_claim');
        $data['updt_claim'] = $this->input->post('updt_claim');
        $data['appr_trans'] = $this->input->post('appr_trans');
        return $data;
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();

       
        	$where['id'] = $update_id;
            $this->_update($where, $data);
            $this->session->set_flashdata('message', 'Federation'.' '.DATA_UPDATED);										
            $this->session->set_flashdata('status', 'success');	
    
        redirect(ADMIN_BASE_URL . 'email');
    }



	
 


    function _get_where($id) {
        $this->load->model('mdl_email');
        $query = $this->mdl_email->_get_where($id);
        return $query;
    }
 

    function _update($arr_col, $data) {
        $this->load->model('mdl_email');
        $this->mdl_email->_update($arr_col, $data);
    }

}