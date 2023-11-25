<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class insurers extends MX_Controller
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
        $data['news'] = $this->_get('id desc',array("del_status"=>"0"));
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
            $data['account_no'] = $row->account_no;
            $data['status'] = $row->status;
        }
        return $data;
    }
    function _get_data_from_post() {
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['syndicate_number'] = $this->input->post('syndicate_number');
        $data['account_no'] = $this->input->post('account_no');
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
        $this->load->model('mdl_insurers');
        return $this->mdl_insurers->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_insurers');
        $this->mdl_insurers->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_insurers');
        $this->mdl_insurers->_set_unpublish($arr_col);
    }

    function _get($order_by,$where) {
        $this->load->model('mdl_insurers');
        $query = $this->mdl_insurers->_get($order_by,$where);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_insurers');
        return $this->mdl_insurers->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_insurers');
        $query = $this->mdl_insurers->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_insurers');
        return $this->mdl_insurers->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_insurers');
        $this->mdl_insurers->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_insurers');
        $this->mdl_insurers->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_insurers');
        $this->mdl_insurers->_delete($arr_col);
    }

 




}