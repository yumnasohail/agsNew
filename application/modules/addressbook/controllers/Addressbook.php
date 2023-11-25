<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addressbook extends MX_Controller
{

function __construct() {
parent::__construct();
//Modules::run('site_security/is_login');
//Modules::run('site_security/has_permission');

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
            $data['f_address']=Modules::run('api/get_specific_table_data',array("a_id"=>$update_id),'id',"f_id","federations_address",'','')->result_array();
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        $data['fed']=Modules::run('api/get_specific_table_data',array("status"=>"1","del_status"=>"0"),'id',"id,title","federations",'','')->result_array();
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
            $data['postal_code'] = $row->postal_code;
            $data['place'] = $row->place;
            $data['account_no'] = $row->account_no;
        }
        return $data;
    }
    function _get_data_from_post() {
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['postal_code'] = $this->input->post('postal_code');
        $data['place'] = $this->input->post('place');
        $data['account_no'] = $this->input->post('account_no');
        return $data;
    }

    function save_federations($a_id)
    {
        $fed = $this->input->post('fed');
        foreach($fed as $key => $value):
            Modules::run('api/insert_into_specific_table',array("f_id"=>$value,"a_id"=>$a_id),"federations_address");
        endforeach;
        return;
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $this->_update($where, $data);

            $this->session->set_flashdata('message', 'Addressbook'.' '.DATA_UPDATED);										
            $this->session->set_flashdata('status', 'success');
        }
        if (is_numeric($update_id) && $update_id == 0) {
            $update_id = $this->_insert($data);
            $this->session->set_flashdata('message', 'Addressbook'.' '.DATA_SAVED);										
            $this->session->set_flashdata('status', 'success');
        }
        Modules::run('api/delete_from_specific_table',array("a_id"=>$update_id),"federations_address");
        $this->save_federations($update_id);
        redirect(ADMIN_BASE_URL . 'addressbook/list');
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
        $this->session->set_flashdata('message', 'Published successfully.');
        redirect(ADMIN_BASE_URL . 'coverage_category');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Un-published successfully.');
        redirect(ADMIN_BASE_URL . 'coverage_category');
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
        $this->load->model('mdl_addressbook');
        return $this->mdl_addressbook->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_addressbook');
        $this->mdl_addressbook->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_addressbook');
        $this->mdl_addressbook->_set_unpublish($arr_col);
    }

    function _get($order_by,$where) {
        $this->load->model('mdl_addressbook');
        $query = $this->mdl_addressbook->_get($order_by,$where);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_addressbook');
        return $this->mdl_addressbook->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_addressbook');
        $query = $this->mdl_addressbook->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_addressbook');
        return $this->mdl_addressbook->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_addressbook');
        $this->mdl_addressbook->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_addressbook');
        $this->mdl_addressbook->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_addressbook');
        $this->mdl_addressbook->_delete($arr_col);
    }

 

    // function get_specific_table_data($where,$order_by,$select,$table_name,$page_number,$limit) {
    //     $this->load->model('mdl_addressbook');
    //     return $this->mdl_addressbook->get_specific_table_data($where,$order_by,$select,$table_name,$page_number,$limit);
    // }


}