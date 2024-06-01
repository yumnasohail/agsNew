<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
Modules::run('site_security/has_permission');

}

    function index() {
        $this->list();
    }

    function list() 
    {
        $data['fed']=Modules::run('api/_get_specific_table_with_pagination',array("del_status"=>"0"),'id desc',"federations","name,id",'','')->result_array();
        $data['insurers']=Modules::run('api/_get_specific_table_with_pagination',array("del_status"=>"0"),'id desc',"insurers","name,id",'','')->result_array();
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function fed_policy()
    {
        $id=$this->input->post('id');
        $where=array("policies.del_status"=>"0","policy_period.del_status"=>"0","policies.f_id"=>$id);
        $data['policies'] = Modules::run('policies/get_policies_with_period',$where)->result_array();
        echo $this->load->view('policy',$data,TRUE);
    }
    function report_result()
    {
        parse_str($_POST['data'], $formdata);
        $data=array();
        $or_where=array();
        $where=array();
        switch($formdata['report'])
        {
            case "1":
                $data['result']=array();
                $where="`claims`.`claim_stat` != 'Ikke behandlet' AND ";
                if(!empty($formdata['federation']) && isset($formdata['federation'])){
                    $fed=$formdata['federation'];
                    $where.="`claims`.`federation` = '$fed' AND ";
                }
                if(!empty($formdata['policy']) && isset($formdata['policy'])){
                    $policy=$formdata['policy'];
                    $where.="`process_claim`.`period_id` = '$policy' AND ";
                }
                if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                    $start=$formdata['start_date'];
                    $where.="`claims`.`claim_datetime` >= '$start' AND ";
                }
                if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`claims`.`claim_datetime` <= '$end' AND ";
                }  
                $or_where="(";
                if($formdata['godkjent']=="on" && isset($formdata['godkjent']))
                    $or_where.="`claims`.`claim_stat` = 'Godkjent' OR ";
                if($formdata['avslatt']=="on" && isset($formdata['avslatt']))
                    $or_where.="`claims`.`claim_stat` = 'Avslått' OR ";
                if($formdata['update']=="on" && isset($formdata['update']))
                    $or_where.="`claims`.`claim_stat` = 'Avslått, Avventer' OR ";
                if($formdata['apen']=="on" && isset($formdata['apen']))
                    $or_where.="`process_claim`.`status` = '1' OR ";
                if($formdata['avsluttet']=="on" && isset($formdata['avsluttet']))
                    $or_where.="`process_claim`.`status` = '2' OR ";
                if($formdata['avvist']=="on" && isset($formdata['avvist']))
                    $or_where.="`process_claim`.`status` = '3' OR ";
                $or_where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $or_where);
                $or_where.=")";
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $data['result']=$this->get_data_of_reports($where,"claims.id desc","","claims","claims.id,policy_period.contract_id,policy_period.ags_policy_no,CONCAT(claims.damage_date,' ',
                claims.damage_time) AS report_datetime,claims.claim_datetime,process_claim.process_datetime,CONCAT(claims.a_name,' ',claims.a_surname) AS claimant_name,claims.a_birth,claims.a_phone as district,claims.c_name,claims.a_sportsno,
                claims.insurance_under,process_claim.body_part,process_claim.side,process_claim.damage_type,claims.sport,claims.place_of_damage,claims.season,claim_status.name as stat_name,process_claim.closing_date,
                process_claim.date_denied","","",$or_where,"","")->result_array();
                echo $this->load->view('table',$data,TRUE);
            break;
            case "2":
                if(!empty($formdata['start_date']) && isset($formdata['start_date']))
                    $s_start=$formdata['start_date'];
                if(!empty($formdata['end_date']) && isset($formdata['end_date']))
                    $s_end=$formdata['end_date'];
                $data['result']=array();
                $where="`claims`.`claim_stat` != 'Ikke behandlet' AND ";
                if(!empty($formdata['federation']) && isset($formdata['federation'])){
                    $fed=$formdata['federation'];
                    $where.="`claims`.`federation` = '$fed' AND ";
                    $slot=Modules::run('reports/get_federation_policies',array("f_id"=>$fed),'policies.id desc',"","policies","MIN(start_date) as start_date,MAX(end_date) as end_date")->row_array();
                    $end      = new DateTime($slot['end_date']);
                    $start    = new DateTime($slot['start_date']);
                    if(!empty($s_end) && !empty($s_start))
                    {
                        $end= new DateTime($s_end);
                        $start= new DateTime($s_start);
                    }
                    $start->modify('first day of this month');
                    $end->modify('first day of next month');
                    $interval = DateInterval::createFromDateString('1 month');
                    $period   = new DatePeriod($start, $interval, $end);
                }
                if(!empty($formdata['policy']) && isset($formdata['policy'])){
                    $policy=$formdata['policy'];
                    $where.="`process_claim`.`period_id` = '$policy' AND ";
                    $slot=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$policy),'id desc',"policy_period","start_date,end_date",'','')->row_array();
                    $end      = new DateTime($slot['end_date']);
                    $start    = new DateTime($slot['start_date']);
                    if(!empty($s_end) && !empty($s_start))
                    {
                        $end= new DateTime($s_end);
                        $start= new DateTime($s_start);
                    }
                    $start->modify('first day of this month');
                    $end->modify('first day of next month');
                    $interval = DateInterval::createFromDateString('1 month');
                    $period   = new DatePeriod($start, $interval, $end);
                    
                }
                foreach ($period as $dt) {
                    $col=$where;
                    $s_date=$dt->format("Y-m-d");
                    $col.="`transaction`.`dato` >= '$s_date' AND ";
                    $e_date=$dt->format("Y-m-t");
                    $col.="`transaction`.`dato` <= '$e_date' AND ";
                    $col= preg_replace('/\W\w+\s*(\W*)$/', '$1', $col);
                    $result=$this->get_data_of_reports_with_transactions($col,"claims.id desc","transaction.claim_id","claims","policy_period.start_date as date, COUNT(transaction.claim_id) as claims, SUM(CASE WHEN trans ='1' THEN belop ELSE 0 END) as paid","","","","","")->row_array();
                    $temp[]=$result;
                }
                $data['result']=$temp;
                echo $this->load->view('table1',$data,TRUE);
            break;
            default: 
                $data['result']=array();
        }
    }
    
    function get_data_of_reports($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_data_of_reports($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }
    function get_federation_policies($cols, $order_by,$group_by,$table,$select)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_federation_policies($cols, $order_by,$group_by,$table,$select);
        return $query;
    }
    
    function get_data_of_reports_with_transactions($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_data_of_reports_with_transactions($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }


 




}