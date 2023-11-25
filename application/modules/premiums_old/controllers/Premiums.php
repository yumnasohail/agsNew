<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Premiums extends MX_Controller
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
        $where=array("policies.del_status"=>"0","policy_period.del_status"=>"0");
        $policies = Modules::run('policies/get_policies_with_period',$where)->result_array();
        foreach($policies as $key => $value)
        {
            $policies[$key]['premiums']=Modules::run('api/get_specific_table_data',array("federation_id"=>$value['f_id'],"period_id"=>$value['id'],"status"=>"1"),"id asc","*","premiums","","")->result_array();
        }
        $data['policies']=$policies;
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function translate() {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id)) {
            $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newstranslateform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    function save_premium()
    {
        $data['federation_id']=$this->input->post('federation_id');
        $data['period_id']=$this->input->post('period_id');
        $data['dato']=$this->input->post('dato');
        $data['dato']=date("Y-m-d", strtotime($data['dato']));
        $data['paid']=$this->input->post('paid');
        $data['recieved']=$this->input->post('recieved');
        $data['comission']=$this->input->post('comission');
        $data['total_insurances']=$this->input->post('total_insurances');
        $id=$this->input->post('premium_id');
         Modules::run('api/insert_or_update',array("id"=>$id),$data,"premiums");
       //  Modules::run('api/insert_into_specific_table',$data,"premiums");
        echo "1";
    }
    function create() {
        $update_id = $this->uri->segment(4);
        
        if (is_numeric($update_id) && $update_id != 0) {
            $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    function _get_data_from_db($update_id) {
        $where['id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as $row) {
            $data['name'] = $row->name;
            $data['address'] = $row->address;
            $data['syndicate_number'] = $row->syndicate_number;
            $data['status'] = $row->status;
        }
        return $data;
    }
    function _get_data_from_post() {
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['syndicate_number'] = $this->input->post('syndicate_number');
        return $data;
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $this->_update($where, $data);
            $this->session->set_flashdata('message', 'Federation'.' '.DATA_UPDATED);										
            $this->session->set_flashdata('status', 'success');
        }
        if (is_numeric($update_id) && $update_id == 0) {
            $id = $this->_insert($data);
            $this->session->set_flashdata('message', 'Federation'.' '.DATA_SAVED);										
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'insurers');
    }

    function delete() {
        $delete_id = $this->input->post('id');
        $where['id'] = $delete_id;
        $this->_update($where, array("del_status"=>"1"));
        //$this->_delete($where);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'insurers');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'insurers');
    }


    function change_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        $data = array('status' => $status);
        $status = $this->_update_id($id, $data);
        echo $status;
    }

    function detail() {
        $update_id = $this->input->post('id');
        $data['post'] = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $this->load->view('detail', $data);
    }

	
    function _getItemById($id) {
        $this->load->model('mdl_premiums');
        return $this->mdl_premiums->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_premiums');
        $this->mdl_premiums->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_premiums');
        $this->mdl_premiums->_set_unpublish($arr_col);
    }

    function _get($order_by,$where) {
        $this->load->model('mdl_premiums');
        $query = $this->mdl_premiums->_get($order_by,$where);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_premiums');
        return $this->mdl_premiums->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_premiums');
        $query = $this->mdl_premiums->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_premiums');
        return $this->mdl_premiums->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_premiums');
        $this->mdl_premiums->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_premiums');
        $this->mdl_premiums->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_premiums');
        $this->mdl_premiums->_delete($arr_col);
    }

 




}