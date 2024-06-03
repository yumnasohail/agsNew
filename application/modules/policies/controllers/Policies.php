<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use mikehaertl\wkhtmlto\Pdf;
class Policies extends MX_Controller
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
        $federation=$this->uri->segment(4);
        $data['news'] = $this->_get('id desc',$federation);
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function pc_og_rib() {
        $data['pc_og_rib'] = Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>0), "id desc","pc_rib","*","","")->result_array();
        $data['view_file'] = 'pc_og_rib_list';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function slips(){
        $data['news'] = Modules::run('federations/_get','id desc',array("del_status"=>"0"));
        $data['view_file'] = 'fed_list';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function slip_creation(){
        $f_id=$this->uri->segment(4);
        $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$f_id), "id desc","federations","name,title","","")->row_array();
        $data['name']=$res['name'];
        $data['f_name']=$res['name'];
        $data['view_file'] = 'slip_creation/'.strtolower($res['title']);
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
    
    
    function edit_policy(){
        $id=$this->uri->segment(4);
        $data['result']=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$id), "id desc","policy_period","*","","")->row_array();
        $data['update_id'] = $id;
        $data['view_file'] = 'edit_policy';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function edit_pc_og_rib(){
        $id=$this->uri->segment(4);
        $data['policies']=Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>"0"), "id desc","policies","id,policy_title","","")->result_array();
        $data['res']=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$id), "id desc","pc_rib","*","","")->row_array();
        $data['policy_periods']=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$res['policy_id']), "id desc","policy_period","id,start_date,end_date,contract_id","","")->row_array();

        $data['update_id'] = $id;
        $data['view_file'] = 'create_pc_og_rib';
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
    
    function submit_update_period(){
        $id=$this->input->post('update_id');
        $data['contract_id']=$this->input->post('contract_id');
        $data['ags_policy_no']=$this->input->post('ags_policy_no');
        $data['comission']=$this->input->post('comission');
        $data['deductible']=$this->input->post('deductible');
        $data['currency']=$this->input->post('currency');
        $data['claim_fee']=$this->input->post('claim_fee');
        $data['insured_amt']=$this->input->post('insured_amt');
        $data['rib']=$this->input->post('rib');
        $data['profit_comission']=$this->input->post('profit_comission');
        Modules::run('api/insert_or_update',array("id"=>$id),$data,"policy_period");
        $this->session->set_flashdata('message', 'Policy Updated Successfully');
        redirect(ADMIN_BASE_URL . 'policies/overview');
    }
   

    function create()
    {
        $data['fed']=Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>"0",'status'=>"1"), "id desc","federations","name,id","","")->result_array();
        $data['ins']=Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>"0",'status'=>"1"), "id desc","insurers","name,id","","")->result_array();
        $data['view_file'] = 'create';    
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function new_pc_og_rib(){
        $data['policies']=Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>"0"), "id desc","policies","id,policy_title","","")->result_array();
        $data['view_file'] = 'create_pc_og_rib';    
        $this->load->module('template');
        $this->template->admin($data);
    }
    function get_policy_periods(){
        $policy_id=$this->input->post('id');
        $data['policy_periods']=Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>"0",'policy_id'=>$policy_id), "id desc","policy_period","id,start_date,end_date,contract_id","","")->result_array();
        $this->load->view('policy_periods', $data);
    }
    function period()
    {
        $data['policies']=Modules::run('api/get_specific_table_data',array('del_status'=>"0",'status'=>"1"),"id desc","policy_title,id","policies","","")->result_array();
        $data['ins']=Modules::run('api/_get_specific_table_with_pagination',array('del_status'=>"0",'status'=>"1"), "id desc","insurers","name,id","","")->result_array();
        $data['view_file'] = 'period';    
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function sanction_check(){
        $name=$this->input->post('name');

        $name = str_replace(' ', '%20', $name);
        
		$curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.sanctions.io/search/?name=".$name,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer a209a7c7cbb44305b0d16ade423cced5'
          ),
        ));
        $result = curl_exec($curl);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		if (!empty($result)) {
			$result = json_decode($result);
			if($result->count==0)
			$data['res']="Secure";
			else
			$data['res']="Not secure";
			    
		}else{
		    $data['res']="No result found";
		}
        echo $data['res'];
    }
    function _get_data_of_period() {
        $form_data['policy_id']=$this->input->post('policy_id');
        $form_data['insurer']=$this->input->post('insurer');
        $form_data['start_date']=$this->input->post('start_date');
        $form_data['end_date']=$this->input->post('end_date');
        $form_data['contract_id']=$this->input->post('contract_id');
        $form_data['ags_policy_no']=$this->input->post('ags_policy_no');
        $form_data['comission']=$this->input->post('comission');
        $form_data['deductible']=$this->input->post('deductible');
        $form_data['currency']=$this->input->post('currency');
        $form_data['claim_fee']=$this->input->post('claim_fee');
        $form_data['insured_amt']=$this->input->post('insured_amt');
        $form_data['rib']=$this->input->post('rib');
        $form_data['profit_comission']=$this->input->post('profit_comission');
        
        return $form_data;
    }
    function submit_period() {
        $status=false;
        $message="Manglende data";
        $form_data=$this->_get_data_of_period();
        if(isset($form_data['policy_id']) && !empty($form_data['policy_id'])){
            $data['policy_id']=$form_data['policy_id'];
            if(isset($form_data['insurer'])  && !empty($form_data['insurer'])){
                $data['insurer_id']=$form_data['insurer'];
                if( !empty($form_data['start_date']) && !empty($form_data['end_date'])  && !empty($form_data['contract_id']) && !empty($form_data['ags_policy_no'])
                && !empty($form_data['comission']) && !empty($form_data['deductible']) && !empty($form_data['currency']) && !empty($form_data['claim_fee'] )){
                    $data['start_date']=date("Y-m-d", strtotime($form_data['start_date']));
                    $data['end_date']=date("Y-m-d", strtotime($form_data['end_date']));
                    $data['contract_id']=$form_data['contract_id'];
                    $data['ags_policy_no']=$form_data['ags_policy_no'];
                    $data['comission']=$form_data['comission'];
                    $data['deductible']=$form_data['deductible'];
                    $data['currency']=$form_data['currency'];
                    $data['claim_fee']=$form_data['claim_fee'];
                    $data['insured_amt']=$form_data['insured_amt'];
                    $data['rib']=$form_data['rib'];
                    $data['profit_comission']=$form_data['profit_comission'];
                    $status=true;
                    $message="Vellykket opprettet ny policy";
                }else
                {
                    $message="Fyll ut alle data om policyperioder";
                }
            }else{
                $message="Vennligst velg forsikringsselskapet";
            }
        }else{
            $message="Vennligst velg policy";
        }
        if($status==true)
        {
            Modules::run('api/insert_into_specific_table',$data,"policy_period");
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
        exit;
    }
    function overview()
    {
        $where=array("policies.del_status"=>"0","policy_period.del_status"=>"0");
        $data['policies'] = Modules::run('policies/get_policies_with_period',$where)->result_array();
        $data['total_policies']=Modules::run('api/get_specific_table_data',array('del_status'=>"0",'status'=>"1"),"id desc","id","policies","","")->num_rows();
        $data['total_periods']=Modules::run('api/get_specific_table_data',array('del_status'=>"0",'status'=>"1"),"id desc","id","policy_period","","")->num_rows();
        $data['view_file'] = 'overview';    
        $this->load->module('template');
        $this->template->admin($data);
    }
    function statistics()
    {
        $data['view_file'] = 'statistics';    
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    
    function preview_1(){
        $data['formdata']=$_POST;
        $type=$this->input->post('type');
        define('VENDOR_DIR', APPPATH . 'libraries/wkhtmltopdf/vendor' . DIRECTORY_SEPARATOR);
        require VENDOR_DIR . 'autoload.php';
        $head = $this->load->view('policies/slip/header', $data, true);
        $foot = $this->load->view('policies/slip/footer', '', true);
        $pdf = new Pdf(array('no-outline', // Make Chrome not complain
        'enable-javascript','margin-top' => 35,'margin-right' => 0,'header-html'=>$head,'footer-html'=>$foot, 'margin-bottom' => 20, 'margin-left' => 0, 'page-size' => 'A4' ,'encoding' => 'UTF-8', 'orientation' => 'portrait', 'disable-smart-shrinking'));
        $pdf->binary = WKHTMLTOPDF_FILE_PATH;        
        $html = $this->load->view('policies/slip/slip',$data,true);
        $pdf->addPage($html);
        $pdf->send('Slip.pdf',true);
        $data['view_file'] = 'slip_view';    
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    
    function preview(){
        $type=$this->input->post('type');
        parse_str($_POST['formData'], $formdata);
        $data['formdata']=$formdata;
        define('VENDOR_DIR', APPPATH . 'libraries/wkhtmltopdf/vendor' . DIRECTORY_SEPARATOR);
        require VENDOR_DIR . 'autoload.php';
        $head = $this->load->view('policies/slip/header', $formdata, true);
        $foot = $this->load->view('policies/slip/footer', '', true);
        $pdf = new Pdf(array('no-outline', // Make Chrome not complain
        'enable-javascript','margin-top' => 35,'margin-right' => 0,'header-html'=>$head,'footer-html'=>$foot, 'margin-bottom' => 20, 'margin-left' => 0, 'page-size' => 'A4' ,'encoding' => 'UTF-8', 'orientation' => 'portrait', 'disable-smart-shrinking'));
        $pdf->binary = WKHTMLTOPDF_FILE_PATH;        
        $html = $this->load->view('policies/slip/slip',$data,true);
        $pdf->addPage($html);
        $pdf->render();
        $pdf->output(WKPDF::$PDF_EMBEDDED, 'sample.pdf');
        exit;
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
        $data['title'] = $this->input->post('txtNewsTitle');
        $data['short_desc'] = $this->input->post('txtShortDesc');
        $data['long_desc'] = $this->input->post('txtLongDesc');
        $data['image'] = $this->input->post('hdn_image');
        return $data;
    }
    function _get_data_from_post_form() {
        $form_data['federation']=$this->input->post('federation');
        $form_data['insurer']=$this->input->post('insurer');
        $form_data['name']=$this->input->post('name');
        // $form_data['policy_no']=$this->input->post('policy_no');
        $form_data['period_check']=$this->input->post('period_check');
        $form_data['start_date']=$this->input->post('start_date');
        $form_data['end_date']=$this->input->post('end_date');
        $form_data['contract_id']=$this->input->post('contract_id');
        $form_data['ags_policy_no']=$this->input->post('ags_policy_no');
        $form_data['comission']=$this->input->post('comission');
        $form_data['deductible']=$this->input->post('deductible');
        $form_data['currency']=$this->input->post('currency');
        $form_data['claim_fee']=$this->input->post('claim_fee');
        $form_data['insured_amt']=$this->input->post('insured_amt');
        $form_data['rib']=$this->input->post('rib');
        $form_data['profit_comission']=$this->input->post('profit_comission');
        return $form_data;
    }

    function submit() {
        $status=false;
        $message="Manglende data";
        $form_data=$this->_get_data_from_post_form();
        if(isset($form_data['federation']) && !empty($form_data['federation'])){
            $data['f_id']=$form_data['federation'];
                    if(isset($form_data['name']) && !empty($form_data['name']) && !empty($form_data['name'])){
                        $data['name']=$form_data['name'];
                            if(empty($form_data['period_check'])){
                                if( !empty($form_data['start_date']) && !empty($form_data['end_date'])  && !empty($form_data['contract_id']) && !empty($form_data['ags_policy_no'])
                                && !empty($form_data['comission']) && !empty($form_data['deductible']) && !empty($form_data['currency']) && !empty($form_data['insurer'])   && !empty($form_data['claim_fee'])){
                                    $data_period['start_date']=date("Y-m-d", strtotime($form_data['start_date']));
                                    $data_period['end_date']=date("Y-m-d", strtotime($form_data['end_date']));
                                    $data_period['insurer_id']=$form_data['insurer'];
                                    $data_period['contract_id']=$form_data['contract_id'];
                                    $data_period['ags_policy_no']=$form_data['ags_policy_no'];
                                    $data_period['comission']=$form_data['comission'];
                                    $data_period['deductible']=$form_data['deductible'];
                                    $data_period['currency']=$form_data['currency'];
                                    $data_period['claim_fee']=$form_data['claim_fee'];
                                    $data_period['insured_amt']=$form_data['insured_amt'];
                                    $data_period['rib']=$form_data['rib'];
                                    $data_period['profit_comission']=$form_data['profit_comission'];
                                    
                                    $status=true;
                                    $message="Vellykket opprettet ny policy";
                                }else
                                {
                                    $message="Fyll ut alle data om policyperioder";
                                }
                            }else{
                                $status=true;
                                $message="Vellykket opprettet ny policy";
                            }
                    }else{
                        $message="Vennligst velg navn";
                    }
           
        }else{
            $message="Vennligst velg Velg skjema";
        }
        if($status==true)
        {
            $res=Modules::run('api/get_specific_table_data',array("id"=>$data['f_id']),"id desc","name","federations","","")->row_array();
            $data['policy_title']=$res['name']." - ".$data['name'];
            $data_period['policy_id']=Modules::run('api/insert_into_specific_table',$data,"policies");
            if($form_data['period_check']!="1")
            Modules::run('api/insert_into_specific_table',$data_period,"policy_period");
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
        exit;
    }
    
    function submit_pc_og_rib(){
        $status=false;
        $message="Manglende data";
        $where=array();
        $update_id =$this->input->post('update_id');
        $form_data['policy_id']=$this->input->post('policy_id');
        $form_data['period_id']=$this->input->post('period_id');
        $form_data['pc']=$this->input->post('pc');
        $form_data['rib']=$this->input->post('rib');
        $form_data['date']=date("Y-m-d", strtotime($this->input->post('date')));
        if(isset($form_data['policy_id']) && !empty($form_data['period_id']) && !empty($form_data['date'])){
            $status=true;
            $message="Vellykket lagret data";
        }
          
        if($status==true)
        {
            if($update_id>0){
                Modules::run('api/update_specific_table',array("id"=>$update_id),$form_data,"pc_rib");
            }else{
                Modules::run('api/insert_into_specific_table',$form_data,"pc_rib");
            }

        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
        exit;
    }

    function delete() {
        $delete_id = $this->input->post('id');
        $where['id'] = $delete_id;
        $this->_delete($where);
    }
    
    function delete_pc_og_rib() {
        $delete_id = $this->input->post('id');
        Modules::run('api/insert_or_update',array("id"=>$delete_id),array('del_status'=>'1'),"pc_rib");

    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'post/manage/' . '');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'post/manage/' . '');
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
        $this->load->model('mdl_policies');
        return $this->mdl_policies->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_policies');
        $this->mdl_policies->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_policies');
        $this->mdl_policies->_set_unpublish($arr_col);
    }

    function _get($order_by,$where) {
        $this->load->model('mdl_policies');
        $query = $this->mdl_policies->_get($order_by,$where);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_policies');
        return $this->mdl_policies->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_policies');
        $query = $this->mdl_policies->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_policies');
        return $this->mdl_policies->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_policies');
        $this->mdl_policies->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_policies');
        $this->mdl_policies->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_policies');
        $this->mdl_policies->_delete($arr_col);
    }
    function get_policies_with_period($where)
    {
        $this->load->model('mdl_policies');
        return $this->mdl_policies->get_policies_with_period($where);
    }

 




}