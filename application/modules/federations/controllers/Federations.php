<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Federations extends MX_Controller
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

    function manage() {
        $update_id = $this->uri->segment(5);
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $data['news'] = $this->_get_by_arr_id($where)->row();
        }
        $data['federation_id'] = $update_id;
        $data['view_file'] = 'newsform';
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
            $data['title'] = $row->title;
            $data['status'] = $row->status;
        }
        return $data;
    }
    function get_claim_detail()
    {
        $update_id = $this->input->post('id');
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $data['new'] = $this->_get_by_arr_id($where)->row();
        }
        $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$data['new']->federation), "id desc","federations","title","","")->result_array();
        $data['federation']=$res[0]['title'];
        $data['update_id'] = $update_id;
        $this->load->view($data['federation'],$data);
    }
    function _get_data_from_post() {
        $data['name'] = $this->input->post('name');
        $data['title'] = $this->input->post('title');
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
        redirect(ADMIN_BASE_URL . 'federations');
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
        $this->session->set_flashdata('message', 'Federation published successfully.');
        redirect(ADMIN_BASE_URL . 'federations');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Federation un-published successfully.');
        redirect(ADMIN_BASE_URL . 'federations');
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
        $this->load->model('mdl_federations');
        return $this->mdl_federations->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_federations');
        $this->mdl_federations->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_federations');
        $this->mdl_federations->_set_unpublish($arr_col);
    }

    function _get($order_by,$where) {
        $this->load->model('mdl_federations');
        $query = $this->mdl_federations->_get($order_by,$where);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_federations');
        return $this->mdl_federations->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_federations');
        $query = $this->mdl_federations->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_federations');
        return $this->mdl_federations->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_federations');
        $this->mdl_federations->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_federations');
        $this->mdl_federations->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_federations');
        $this->mdl_federations->_delete($arr_col);
    }

 




}