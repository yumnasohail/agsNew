<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maler extends MX_Controller
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

        $federation=$this->uri->segment(4);
        $fed_id = Modules::run('api/get_specific_table_data',array("title"=>$federation),'id',"id","federations",'','')->row_array();
        $data['news'] = Modules::run('api/get_specific_table_data',array("f_id"=>$fed_id['id']),'id',"*","maler",'','')->row_array();
        $data['f_id']=$fed_id['id'];
         
              
        // $data['news'] = $this->_get_where($update_id)->row_array();

        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }

   
   
    function _get_data_from_db($update_id) {
        $where['id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as $row) {
            $data['name'] = $row->name;
            $data['email'] = $row->email;
            $data['e-post'] = $row->e-post;
            $data['subject'] = $row->subject;
            $data['federation'] = $row->federation;
            $data['username'] = $row->username;
            $data['password'] = $row->password;
            $data['host'] = $row->host;
            $data['port'] = $row->port;
            $data['email_one'] = $row->email_one;
            $data['subject_one'] = $row->subject_one;
            $data['email_two'] = $row->email_two;
            $data['subject_two'] = $row->subject_two;
            $data['email_three'] = $row->email_three;
            $data['subject_three'] = $row->subject_three;
            $data['email_four'] = $row->email_four;
            $data['subject_four'] = $row->subject_four;
        }
        return $data;
    }
    
    function _get_data_from_post() {
        $data['email_one'] = $this->input->post('email_one');
        $data['subject_one'] = $this->input->post('subject_one');
        $data['email_two'] = $this->input->post('email_two');
        $data['subject_two'] = $this->input->post('subject_two');
        $data['email_three'] = $this->input->post('email_three');
        $data['subject_three'] = $this->input->post('subject_three');
        $data['email_four'] = $this->input->post('email_four');
        $data['subject_four'] = $this->input->post('subject_four');
        $data['name'] = $this->input->post('name');
        $data['e-post'] = $this->input->post('e-post');
        $data['email'] = $this->input->post('email');
        $data['subject'] = $this->input->post('subject');;
        $data['f_id'] = $this->input->post('f_id');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['host'] = $this->input->post('host');;
        $data['port'] = $this->input->post('port');
     
        return $data;
    }

  

    function submit() {
        $f_id=$this->input->post('f_id');
        $updates = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if ( is_numeric($f_id) && $f_id != 0) {
            $where['f_id'] = $f_id;
            Modules::run('api/insert_or_update',$where,$data,"maler");
            $this->session->set_flashdata('message', 'Addressbook'.' '.DATA_UPDATED);										
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'maler/list/'.$updates);
    }


  



    

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_maler');
        return $this->mdl_maler->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_maler');
        $query = $this->mdl_maler->_get_where($id);
        return $query;
    }

  

    function _update($arr_col, $data) {
        $this->load->model('mdl_maler');
        $this->mdl_maler->_update($arr_col, $data);
    }

  
    

 

    // function get_specific_table_data($where,$order_by,$select,$table_name,$page_number,$limit) {
    //     $this->load->model('mdl_maler');
    //     return $this->mdl_maler->get_specific_table_data($where,$order_by,$select,$table_name,$page_number,$limit);
    // }


}