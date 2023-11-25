<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logs extends MX_Controller
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
        $federation=$this->uri->segment('4');
        $data['logs']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('federations.title'=>$federation),"logs.id desc","","logs","claims.id as claim_no,claims.a_name,claims.a_surname,logs.performed_by,logs.message,logs.type,logs.date_time,logs.id,logs.description","","","","","")->result_array();
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
     function log_detail()
     {
         $id=$this->input->post('id');
         $detail=Modules::run('api/get_specific_table_data',array('id'=>$id),'id',"description","logs",'','')->row();
         echo $detail->description;

     }

    function get_specific_table_data_where_groupby_claims($cols, $order_by,$group_by='',$table,$select,$page_number,$limit,$or_where,$and_where,$having){
        $this->load->model('mdl_logs');
        $query = $this->mdl_logs->get_specific_table_data_where_groupby_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having='');
        return $query;
}
 




}