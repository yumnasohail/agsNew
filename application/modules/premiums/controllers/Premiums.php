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
        $this->federations();
    }
    
    function federations()
    {
        $data['news'] = Modules::run('federations/_get','id desc',array("del_status"=>"0"));
        $data['totals']=Modules::run('api/get_specific_table_data',array(),"id asc","SUM(paid) as paid,SUM(total_insurances) as total_insurances,SUM(recieved) as recieved","premiums","","")->row_array();
        $data['view_file'] = 'federations';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function policy_periods()
    {
        $data['federation_id']=$federation_id = $this->uri->segment(4);
        $data['federation']=Modules::run('api/get_specific_table_data',array("id"=>$federation_id),"id desc","title","federations","","")->row_array();
        $where=array("policies.del_status"=>"0","policy_period.del_status"=>"0","policies.f_id"=>$federation_id);
        $news = Modules::run('policies/get_policies_with_period',$where)->result_array();
        $sum_premiums=$sum_deductible=$sum_reserve=$sum_paid=0;
        foreach($news as $key =>$value):
            $period_amt=Modules::run('reports/get_period_amount',array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim","SUM(CASE WHEN trans_status = 'transferred' THEN belop END ) paid, SUM(CASE WHEN trans = '1'  THEN belop END ) reserve,SUM(process_claim.deductible) as deductible",1,'',"","","")->row();
            $paid=Modules::run('api/get_specific_table_data',array("period_id"=>$value['id']),"id asc","SUM(CASE WHEN status = '1' THEN paid END ) paid","premiums","","")->row();
            $news[$key]['glr']=0;
            if($paid->paid>0)
                $news[$key]['glr']=round((($period_amt->paid+$period_amt->reserve+$period_amt->deductible)/$paid->paid)*100);
            $sum_paid=$sum_paid+$period_amt->paid;
            $sum_reserve=$sum_reserve+$period_amt->reserve;
            $sum_deductible=$sum_deductible+$period_amt->deductible;
            $sum_premiums=$sum_premiums+$paid->paid;
        endforeach;

        $data['totals']=Modules::run('api/get_specific_table_data',array("federation_id"=>$federation_id),"id asc","SUM(paid) as paid,SUM(total_insurances) as total_insurances,SUM(recieved) as recieved","premiums","","")->row_array();
       // CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN
        $data['nlr']=0;
        if($data['totals']['recieved']>0)
            $data['nlr']=round((($sum_paid+$sum_reserve+$sum_deductible)/$data['totals']['recieved'])*100);
        $data['glr']=0;
        if($sum_premiums>0)
            $data['glr']=round((($sum_paid+$sum_reserve+$sum_deductible)/$sum_premiums)*100);
        $data['news']=$news;
        $data['view_file'] = 'policy_periods';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function list() {
        $where=array("policies.del_status"=>"0","policy_period.del_status"=>"0");
        $policies = Modules::run('policies/get_policies_with_period',$where)->result_array();
        foreach($policies as $key => $value)
        {
            $policies[$key]['premiums']=Modules::run('api/get_specific_table_data',array("federation_id"=>$value['f_id'],"period_id"=>$value['id']),"id asc","*","premiums","","")->result_array();
        }
        $data['policies']=$policies;
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function premium_list()
    {
        $data['period_id']=$period_id = $this->uri->segment(5);
        $data['federation_id']=$federation_id = $this->uri->segment(4);
        $data['fed']=Modules::run('api/get_specific_table_data',array("id"=>$federation_id),"id desc","title","federations","","")->row_array();
        $data['period']=Modules::run('api/get_specific_table_data',array("id"=>$period_id),"id asc","*","policy_period","","")->row_array();
        $res=Modules::run('api/get_specific_table_data',array("id"=>$data['period']['policy_id']),"id asc","policy_title","policies","","")->row_array();
        $data['ttl_name']=$res['policy_title'];
        $data['premiums']=Modules::run('api/get_specific_table_data',array("federation_id"=>$federation_id,"period_id"=>$period_id),"id asc","*","premiums","","")->result_array();
        $data['totals']=Modules::run('api/get_specific_table_data',array("federation_id"=>$federation_id,"period_id"=>$period_id),"id asc","SUM(paid) as paid,SUM(total_insurances) as total_insurances,SUM(recieved) as recieved","premiums","","")->row_array();
        $data['view_file'] = 'premiums';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    
       function delete_premium()
    {
        $status=TRUE;
        $message="Premien er slettet";
        $id=$this->input->post('id');
        if(!empty($id)){
            Modules::run('api/delete_from_specific_table',array("id"=>$id),'premiums');
        }else
        {
            $status=FALSE;
            $message="Det oppsto en feil under sletting av premien";
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
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
        $data['note']=$this->input->post('note');
        $data['auto_cal']=$this->input->post('checkbox');
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