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
    function selective_columns(){
        $data['id']=$this->input->post('report');
        echo $this->load->view('columns_list',$data,TRUE);
    }
    function tabs_sheet(){
        require_once( APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php');
        require_once( APPPATH . 'third_party/PHPExcel/Classes/PHPExcel/IOFactory.php');
        $objPHPExcel = new PHPExcel();
        $users=Modules::run('api/_get_specific_table_with_pagination',array(),'id desc',"users","first_name,email,last_name",'','')->result_array();
       

        /* Create a first sheet, representing sales data*/
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Name');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Email');
        foreach($users as $key => $value) {
            $i=$key+2;
        	$name=$value['first_name'];
        	$email=$value['email'];
        	$objPHPExcel->getActiveSheet()->setCellValue("A$i",$name);
        	$objPHPExcel->getActiveSheet()->setCellValue("B$i",$email);
        }
        $objPHPExcel->getActiveSheet()->setTitle('Emplyoee profile');
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Salary');
        foreach($users as $key => $value) {
            $i=$key+2;
        	$salary=$value['last_name'];
        	$objPHPExcel->getActiveSheet()->setCellValue("A$i",$salary);
        }
        $objPHPExcel->getActiveSheet()->setTitle('Emplyoee Salary');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="name_of_file.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        
    }
    function report_result()
    {

        parse_str($_POST['data'], $formdata);
        if(!isset($formdata['selective_col'])){
            $formdata['selective_col']="off";
        }
       // print_r($formdata);exit;
        if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
            $formdata['start_date']=date("Y-m-d", strtotime($formdata['start_date']));
        }
        if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
            $formdata['end_date']=date("Y-m-d", strtotime($formdata['end_date']));
        }
        $data=array();
        $or_where=array();
        $where=array();
        switch($formdata['report'])
        {
            case "1":
                $data['result']=array();
                $where="`claims`.`claim_stat` != 'Ikke behandlet'  AND `claims`.`del_status` = '0' AND  `federations`.`status` = '1' AND  `policy_period`.`del_status` = '0'  AND";
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
                 if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
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
                echo $this->load->view('table1',$data,TRUE);
            break;
            case "2":
                $data['result']=array();
                if(!empty($formdata['start_date']) && isset($formdata['start_date']))
                    $s_start=$formdata['start_date'];
                if(!empty($formdata['end_date']) && isset($formdata['end_date']))
                    $s_end=$formdata['end_date'];
                $where="`claims`.`claim_stat` != 'Ikke behandlet' AND `claims`.`del_status` = '0'  AND  `federations`.`status` = '1' AND ";
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
                    $slot=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$policy),'id desc',"policy_period","start_date,end_date",1,100000)->row_array();
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
                    $result=$this->get_data_of_reports_with_transactions($col,"claims.id desc","transaction.claim_id","claims"," COUNT(DISTINCT ( CASE WHEN claims.claim_datetime BETWEEN '$s_date 00:00:00' AND '$e_date 23:59:59' AND federation = $fed THEN claims.id END)) as claims, SUM(CASE WHEN trans = 0 THEN belop END ) paid,  SUM(CASE WHEN trans = 1 THEN belop END ) reserve",1,100000,"","","")->row_array();
                    $result['date']=$s_date;
                    $temp[]=$result;
                }
                $data['result']=$temp;
                $data['columns']=$formdata;
                echo $this->load->view('table2',$data,TRUE);
            break;
             case "3":
                $data['result']=array();
                $where="`claims`.`claim_stat` != 'Ikke behandlet' AND `claims`.`del_status` = '0' AND `federations`.`status` = '1' AND ";
                if(!empty($formdata['federation']) && isset($formdata['federation'])){
                    $fed=$formdata['federation'];
                    $where.="`claims`.`federation` = '$fed' AND   `federations`.`status` = '1' AND ";
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
                $data['af']=$this->get_data_of_reports_with_transactions($where,"claims.id desc","","claims","    COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Knee' THEN claims.id END)) as Knee, SUM(CASE WHEN process_claim.body_part = 'Knee' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Knee_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Ankle' THEN claims.id END)) as Ankle,SUM(CASE WHEN process_claim.body_part = 'Ankle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Ankle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Back' THEN claims.id END)) as Back,SUM(CASE WHEN process_claim.body_part = 'Back' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Back_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Shoulder' THEN claims.id END)) as Shoulder,SUM(CASE WHEN process_claim.body_part = 'Shoulder' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Shoulder_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Neck' THEN claims.id END)) as Neck,SUM(CASE WHEN process_claim.body_part = 'Neck' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Neck_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Foot' THEN claims.id END)) as Foot,SUM(CASE WHEN process_claim.body_part = 'Foot' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Foot_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Clavicle' THEN claims.id END)) as Clavicle,SUM(CASE WHEN process_claim.body_part = 'Clavicle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Clavicle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Dental' THEN claims.id END)) as Dental,SUM(CASE WHEN process_claim.body_part = 'Dental' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Dental_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Fingers' THEN claims.id END)) as Fingers,SUM(CASE WHEN process_claim.body_part = 'Fingers' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Fingers_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Leg' THEN claims.id END)) as Leg,SUM(CASE WHEN process_claim.body_part = 'Leg' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Leg_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Biceps' THEN claims.id END)) as Biceps,SUM(CASE WHEN process_claim.body_part = 'Biceps' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Biceps_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Thumb' THEN claims.id END)) as Thumb,SUM(CASE WHEN process_claim.body_part = 'Thumb' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Thumb_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Achilles' THEN claims.id END)) as Achilles,SUM(CASE WHEN process_claim.body_part = 'Achilles' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Achilles_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Hip' THEN claims.id END)) as Hip,SUM(CASE WHEN process_claim.body_part = 'Hip' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Hip_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Deltoids' THEN claims.id END)) as Deltoids,SUM(CASE WHEN process_claim.body_part = 'Deltoids' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Deltoids_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Other' THEN claims.id END)) as Other,SUM(CASE WHEN process_claim.body_part = 'Other' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Other_amt,
                ","","",$or_where,array("sport"=>"Amerikansk fotball"),"")->row_array();
                $data['cl']=$this->get_data_of_reports_with_transactions($where,"claims.id desc","","claims","    COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Knee' THEN claims.id END)) as Knee, SUM(CASE WHEN process_claim.body_part = 'Knee' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Knee_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Ankle' THEN claims.id END)) as Ankle,SUM(CASE WHEN process_claim.body_part = 'Ankle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Ankle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Back' THEN claims.id END)) as Back,SUM(CASE WHEN process_claim.body_part = 'Back' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Back_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Shoulder' THEN claims.id END)) as Shoulder,SUM(CASE WHEN process_claim.body_part = 'Shoulder' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Shoulder_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Neck' THEN claims.id END)) as Neck,SUM(CASE WHEN process_claim.body_part = 'Neck' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Neck_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Foot' THEN claims.id END)) as Foot,SUM(CASE WHEN process_claim.body_part = 'Foot' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Foot_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Clavicle' THEN claims.id END)) as Clavicle,SUM(CASE WHEN process_claim.body_part = 'Clavicle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Clavicle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Dental' THEN claims.id END)) as Dental,SUM(CASE WHEN process_claim.body_part = 'Dental' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Dental_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Fingers' THEN claims.id END)) as Fingers,SUM(CASE WHEN process_claim.body_part = 'Fingers' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Fingers_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Leg' THEN claims.id END)) as Leg,SUM(CASE WHEN process_claim.body_part = 'Leg' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Leg_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Biceps' THEN claims.id END)) as Biceps,SUM(CASE WHEN process_claim.body_part = 'Biceps' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Biceps_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Thumb' THEN claims.id END)) as Thumb,SUM(CASE WHEN process_claim.body_part = 'Thumb' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Thumb_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Achilles' THEN claims.id END)) as Achilles,SUM(CASE WHEN process_claim.body_part = 'Achilles' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Achilles_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Hip' THEN claims.id END)) as Hip,SUM(CASE WHEN process_claim.body_part = 'Hip' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Hip_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Deltoids' THEN claims.id END)) as Deltoids,SUM(CASE WHEN process_claim.body_part = 'Deltoids' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Deltoids_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Other' THEN claims.id END)) as Other,SUM(CASE WHEN process_claim.body_part = 'Other' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Other_amt,
                ","","",$or_where,array("sport"=>"Cheerleading"),"")->row_array();
                $data['l']=$this->get_data_of_reports_with_transactions($where,"claims.id desc","","claims","    COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Knee' THEN claims.id END)) as Knee, SUM(CASE WHEN process_claim.body_part = 'Knee' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Knee_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Ankle' THEN claims.id END)) as Ankle,SUM(CASE WHEN process_claim.body_part = 'Ankle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Ankle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Back' THEN claims.id END)) as Back,SUM(CASE WHEN process_claim.body_part = 'Back' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Back_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Shoulder' THEN claims.id END)) as Shoulder,SUM(CASE WHEN process_claim.body_part = 'Shoulder' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Shoulder_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Neck' THEN claims.id END)) as Neck,SUM(CASE WHEN process_claim.body_part = 'Neck' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Neck_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Foot' THEN claims.id END)) as Foot,SUM(CASE WHEN process_claim.body_part = 'Foot' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Foot_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Clavicle' THEN claims.id END)) as Clavicle,SUM(CASE WHEN process_claim.body_part = 'Clavicle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Clavicle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Dental' THEN claims.id END)) as Dental,SUM(CASE WHEN process_claim.body_part = 'Dental' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Dental_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Fingers' THEN claims.id END)) as Fingers,SUM(CASE WHEN process_claim.body_part = 'Fingers' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Fingers_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Leg' THEN claims.id END)) as Leg,SUM(CASE WHEN process_claim.body_part = 'Leg' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Leg_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Biceps' THEN claims.id END)) as Biceps,SUM(CASE WHEN process_claim.body_part = 'Biceps' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Biceps_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Thumb' THEN claims.id END)) as Thumb,SUM(CASE WHEN process_claim.body_part = 'Thumb' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Thumb_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Achilles' THEN claims.id END)) as Achilles,SUM(CASE WHEN process_claim.body_part = 'Achilles' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Achilles_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Hip' THEN claims.id END)) as Hip,SUM(CASE WHEN process_claim.body_part = 'Hip' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Hip_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Deltoids' THEN claims.id END)) as Deltoids,SUM(CASE WHEN process_claim.body_part = 'Deltoids' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Deltoids_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Other' THEN claims.id END)) as Other,SUM(CASE WHEN process_claim.body_part = 'Other' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Other_amt,
                ","","",$or_where,array("sport"=>"Lacrosse"),"")->row_array();
                $data['f']=$this->get_data_of_reports_with_transactions($where,"claims.id desc","","claims","    COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Knee' THEN claims.id END)) as Knee, SUM(CASE WHEN process_claim.body_part = 'Knee' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Knee_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Ankle' THEN claims.id END)) as Ankle,SUM(CASE WHEN process_claim.body_part = 'Ankle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Ankle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Back' THEN claims.id END)) as Back,SUM(CASE WHEN process_claim.body_part = 'Back' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Back_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Shoulder' THEN claims.id END)) as Shoulder,SUM(CASE WHEN process_claim.body_part = 'Shoulder' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Shoulder_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Neck' THEN claims.id END)) as Neck,SUM(CASE WHEN process_claim.body_part = 'Neck' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Neck_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Foot' THEN claims.id END)) as Foot,SUM(CASE WHEN process_claim.body_part = 'Foot' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Foot_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Clavicle' THEN claims.id END)) as Clavicle,SUM(CASE WHEN process_claim.body_part = 'Clavicle' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Clavicle_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Dental' THEN claims.id END)) as Dental,SUM(CASE WHEN process_claim.body_part = 'Dental' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Dental_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Fingers' THEN claims.id END)) as Fingers,SUM(CASE WHEN process_claim.body_part = 'Fingers' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Fingers_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Leg' THEN claims.id END)) as Leg,SUM(CASE WHEN process_claim.body_part = 'Leg' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Leg_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Biceps' THEN claims.id END)) as Biceps,SUM(CASE WHEN process_claim.body_part = 'Biceps' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Biceps_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Thumb' THEN claims.id END)) as Thumb,SUM(CASE WHEN process_claim.body_part = 'Thumb' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Thumb_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Achilles' THEN claims.id END)) as Achilles,SUM(CASE WHEN process_claim.body_part = 'Achilles' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Achilles_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Hip' THEN claims.id END)) as Hip,SUM(CASE WHEN process_claim.body_part = 'Hip' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Hip_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Deltoids' THEN claims.id END)) as Deltoids,SUM(CASE WHEN process_claim.body_part = 'Deltoids' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Deltoids_amt,
                COUNT(DISTINCT ( CASE WHEN process_claim.body_part = 'Other' THEN claims.id END)) as Other,SUM(CASE WHEN process_claim.body_part = 'Other' AND transaction.trans_status = 'transferred' THEN transaction.belop END) as Other_amt,
                ","","",$or_where,array("sport"=>"Frisbee"),"")->row_array();
                $data['result']=$result;
                echo $this->load->view('table3',$data,TRUE);
            break;
            case "4":
                if(isset($formdata['with_claim_fee']))
                    $data['with_claim_fee']=1;
                else
                    $data['with_claim_fee']=0;
                $data['result']=array();
                 $where="`federations`.`status` = '1' AND  `policy_period`.`del_status` = '0'  AND";
                // if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                //     $start=$formdata['start_date'];
                //     $where.="`policy_period`.`start_date` >= '$start' AND ";
                // }
                // if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                //     $end=$formdata['end_date'];
                //     $where.="`policy_period`.`end_date` <= '$end' AND ";
                // }  
                 if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $result=$this->get_policies_detail($where,"federations.id desc,policy_period.start_date desc","policy_period.id","policy_period","policy_period.id,policy_period.contract_id,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,insurers.name,federations.name as fed_name",1,10000,"","","")->result_array();
                foreach($result as $keys => $value):
                     $result[$keys]['paid']=0.00;
                     $result[$keys]['reserve']=0.00;
                     $result[$keys]['deduct']=0.00;
                     $result[$keys]['total_insurances']=0.00;
                     $result[$keys]['prem_paid']=0.00;
                     $period_amt=$this->get_period_amount(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim","SUM(CASE WHEN trans_status = 'transferred' THEN belop END ) paid , SUM(claim_fee) as deduct",1,100000000,"","","")->row();
                     $period_res=$this->get_period_amount_reserve(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim",",SUM(claim_reservations.amount) as reserve",1,100000000,"","","")->row();
                     $prem= Modules::run('api/_get_specific_table_with_pagination',array("period_id"=>$value['id']),"id desc","premiums","SUM(total_insurances) as total_insurances, SUM(paid) as paid","","")->row();
                     if(!empty($period_amt->paid))
                     $result[$keys]['paid']=$period_amt->paid;
                     if(!empty($period_res->reserve))
                     $result[$keys]['reserve']=$period_res->reserve;
                     if(!empty($period_amt->deduct))
                     $result[$keys]['deduct']=$period_amt->deduct;
                     if(!empty($prem->total_insurances))
                     $result[$keys]['total_insurances']=$prem->total_insurances;
                     if(!empty($prem->paid))
                     $result[$keys]['prem_paid']=$prem->paid;
                      
                endforeach;
                $data['result']=$result;
                echo $this->load->view('table4',$data,TRUE);
            break;
             case "5":
                 $data['result']=array();
                $where="`claims`.`claim_stat` != 'Ikke behandlet' AND `claims`.`del_status` = '0' AND   `policy_period`.`del_status` = '0'  AND ";
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
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
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
                $data['result']=$this->get_data_of_reports($where,"claims.federation desc","","claims","claims.id,policy_period.contract_id,policy_period.currency,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,insurers.name,
                CONCAT(claims.damage_date,' ',claims.damage_time) AS report_datetime,federations.name as fed_name,claims.claim_datetime,CONCAT(claims.a_name,' ',claims.a_surname) AS claimant_name,claim_status.name as stat_name,process_claim.underwriter,process_claim.process_datetime,process_claim.status as process_stat,process_claim.date_denied,claims.claim_stat","","",$or_where,"","")->result_array();
                $data['end_date']=$formdata['end_date'];
                $data['start_date']=$formdata['start_date'];
                echo $this->load->view('table5',$data,TRUE);
            break;
             case "6":
                 $data['result']=array();
                $where="`claims`.`claim_stat` != 'Ikke behandlet' AND `claims`.`del_status` = '0' AND   `federations`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND ";
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
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                   // $where.="`claims`.`claim_stat` = 'Godkjent' AND ";
                $or_where="(";
                if($formdata['apen']=="on" && isset($formdata['apen']))
                    $or_where.="`process_claim`.`status` = '1' OR ";
                if($formdata['avsluttet']=="on" && isset($formdata['avsluttet']))
                    $or_where.="`process_claim`.`status` = '2' OR ";
                if($formdata['avvist']=="on" && isset($formdata['avvist']))
                    $or_where.="`process_claim`.`status` = '3' OR ";
                $or_where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $or_where);
                $or_where.=")";
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $data['result']=$this->get_data_of_reports($where,"claims.id desc","","claims","claims.id,policy_period.contract_id,policy_period.currency,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,insurers.name,
                CONCAT(claims.damage_date,' ',claims.damage_time) AS report_datetime,claims.c_name,claims.a_sportsno,claims.insurance_under,federations.name as fed_name,claims.claim_datetime,CONCAT(claims.a_name,' ',claims.a_surname) AS claimant_name,claim_status.name as stat_name,process_claim.underwriter,process_claim.process_datetime,process_claim.date_denied","","",$or_where,"","")->result_array();
                echo $this->load->view('table6',$data,TRUE);
            break;
            case "7":
                $data['result']=array();
                $c_start=$formdata['year'].'-'.$formdata['month'].'-01';
                $c_end=date("Y-m-t", strtotime($c_start));
                $formdata['start_date']=$formdata['year'].'-01-01';
                $formdata['end_date']=date("Y-m-t", strtotime($formdata['start_date']));
                $where="`premiums`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND ";
                if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`premiums`.`dato` <= '$c_end' AND ";
                }
                // if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                //     $start=$formdata['start_date'];
                //     $where.="`premiums`.`dato` >= '$c_start' AND ";
                // }
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                    //  $where.="`premiums`.`dato` >= '$c_start' AND ";
                    //  $where.="`premiums`.`dato` <= '$c_end' AND ";
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                // $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND  '$c_end'  THEN premiums.paid END) as paid,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid, SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();
                $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","  ,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid,SUM( CASE WHEN premiums.dato <= '$c_end'  THEN premiums.paid END) as paid_new ,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,premiums.period_id as id,policies.id as policy_id,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();

                foreach($result as $res => $value):
                    $ttl=$com=$ttl_ins=0;
                    $prem= Modules::run('reports/get_policy_wise_premiums',array("federation_id"=>$value['f_id'],"policies.id"=>$value['policy_id'],"period_id"=>$value['id']),"premiums.id desc","premiums","SUM(premiums.paid) as paid,SUM(premiums.total_insurances) as total_insurances,SUM(recieved) as recieved","","")->row_array();
                    if($prem['paid']>0){
                        $result[$res]['paid']=$prem['paid'];
                    }
                endforeach;
                $data['result']=$result;
                $data['end_date']=$c_end;
                $data['start_date']=$c_start;
                $data['year']=$formdata['year'];
                echo $this->load->view('table7',$data,TRUE);
            break;
            case "8":
                $data['result']=array();
                $c_start=$formdata['year'].'-'.$formdata['month'].'-01';
                $c_end=date("Y-m-t", strtotime($c_start));
                $formdata['start_date']=$formdata['year'].'-01-01';
                $formdata['end_date']=date("Y-m-t", strtotime($formdata['start_date']));
                $where="`premiums`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND ";
                if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`premiums`.`dato` <= '$c_end' AND ";
                }
                if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                    $start=$formdata['start_date'];
                    $where.="`premiums`.`dato` >= '$c_start' AND ";
                }
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                
                
                    //  $where.="`premiums`.`dato` >= '$c_start' AND ";
                    //  $where.="`premiums`.`dato` <= '$c_end' AND ";
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","premiums.period_id as period_id,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND  '$c_end'  THEN premiums.paid END) as paid,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid, SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();
                
                foreach($result as $res => $value):
                    $ttl=$com=$ttl_ins=0;
                    $prem= Modules::run('reports/get_policy_wise_premiums',array("federation_id"=>$value['f_id'],"policies.id"=>$value['p_id'],"period_id"=>$value['period_id']),"premiums.id desc","premiums","SUM(premiums.paid) as paid,SUM(premiums.total_insurances) as total_insurances,SUM(recieved) as recieved","","")->row_array();
                    if($prem['paid']>0){
                        $result[$res]['paid']=$prem['paid'];
                    }
                endforeach;
                $data['result']=$result;
                $data['end_date']=$c_end;
                $data['start_date']=$c_start;
                $data['year']=$formdata['year'];
                echo $this->load->view('table8',$data,TRUE);
            break;
            case "9":
                 $data['result']=array();
                 $where="`federations`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND";
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $result=$this->get_policies_claims($where,"federations.id desc,policy_period.start_date desc","policy_period.id","policy_period","policy_period.id,policy_period.contract_id,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,insurers.name,federations.name as fed_name,policy_period.profit_comission,policy_period.currency, policy_period.id as period_id",1,10000,"","","")->result_array();
                foreach($result as $keys => $value):
                     $result[$keys]['paid']=0.00;
                     $result[$keys]['reserve']=0.00;
                     $open_claims= Modules::run('api/_get_specific_table_with_pagination',array("process_claim.period_id"=>$value['id']),"id desc","process_claim","COUNT(CASE WHEN process_claim.status = '1' THEN process_claim.id END) as open_claims,SUM(process_claim.claim_fee) as sum_claim_fee","","")->row();
                     $period_amt=$this->get_period_amount(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim","SUM(CASE WHEN trans_status = 'transferred' THEN belop END ) paid, SUM(CASE WHEN trans_status = 'transferred' AND process_claim.status = '1' THEN belop END ) open_paid",1,'',"","","")->row();
                     $period_res=$this->get_period_amount_reserve(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim",",SUM(claim_reservations.amount) as reserve, SUM(CASE WHEN  process_claim.status = '1' THEN claim_reservations.amount END) as open_reserve ",1,'',"","","")->row();
                     $result[$keys]['open_claims']=$open_claims->open_claims;
                     $result[$keys]['sum_claim_fee']=$open_claims->sum_claim_fee;
                     if(!empty($period_amt->paid))
                     $result[$keys]['paid']=$period_amt->paid;
                     if(!empty($period_res->reserve))
                     $result[$keys]['reserve']=$period_res->reserve;
                     if(!empty($period_amt->open_paid))
                     $result[$keys]['open_paid']=$period_amt->open_paid;
                     if(!empty($period_res->open_reserve))
                     $result[$keys]['open_reserve']=$period_res->open_reserve;
                endforeach;
                $data['result']=$result;
                echo $this->load->view('table9',$data,TRUE);
            break;
            case "10":
                 $data['result']=array();
                 $c_start=$formdata['year'].'-'.$formdata['month'].'-01';
                $c_end=date("Y-m-t", strtotime($c_start));
                 $formdata['start_date']=$formdata['year'].'-01-01';               

                 $formdata['end_date']=date("Y-m-t", strtotime($formdata['start_date']));
                 $where="`federations`.`status` = '1' AND ";
                 $where="`policy_period`.`del_status` = '0' AND  `policy_period`.`del_status` = '0'  AND ";
                 $where="`policies`.`del_status` = '0' AND ";
                if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`premiums`.`dato` <= '$c_end' AND ";
                }
                if(!empty($formdata['federation']) && isset($formdata['federation'])){
                    $fed=$formdata['federation'];
                    $where.="`federations`.`id` = '$fed' AND ";
                }
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                    $start=$formdata['start_date'];
                    $where.="`premiums`.`dato` >= '$c_start' AND ";
                }
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $result=$this->get_policies_premiums_detail($where,"policy_period.start_date desc","policy_period.id","premiums","premiums.id as premium_id,policy_period.id,policies.id as policy_id,policies.f_id,policies.policy_title,policy_period.contract_id,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,federations.name as fed_name,policy_period.currency,MAX(policy_period.start_date) as max_st,MAX(policy_period.end_date) as max_ed",1,"","","","")->result_array();
                $strt=$result[0]['start_date'];
                $end=$result[0]['start_date'];
                foreach($result as $key => $value):
                    $prem= Modules::run('api/_get_specific_table_with_pagination',array("federation_id"=>$value['f_id'],'dato'>=$strt,'dato'<=$end),"id desc","premiums","SUM(paid) as paid","","")->row_array();
                    if($value['start_date']<$strt)
                        $strt=$value['start_date'];
                    if($value['end_date']>$end)
                        $end=$value['end_date'];
                    $result[$key]['paid']=$prem['paid'];
                endforeach;
                $end =date('Y-m-d',strtotime($c_end));
                // print_r($end);exit;
                foreach($result as $res => $value):
                    $ttl=0;
                $skip=false;
                    $amount=$month=array();
                    $check=$strt;
                    for($i=0;$check<=$end;$i++){
                        $m_start=date("Y-m-1", strtotime($check));
                        $m_end=date("Y-m-31", strtotime($check));
                        $prem= Modules::run('reports/get_policy_wise_premiums',array("federation_id"=>$value['f_id'],'dato >= '=>$m_start, 'dato <= '=> $m_end,"policies.id"=>$value['policy_id'],"period_id"=>$value['id']),"premiums.id desc","premiums","SUM(premiums.paid) as paid","","")->row_array();
                        $val=0;
                        if($prem['paid']>0){
                            $val=$prem['paid'];
                            $ttl=$ttl+$val;
                        }
                        $amount[]=$val;
                        $month[]=date("F Y", strtotime($check));
                        
                        if(($formdata['year']."-".$formdata['month'])==(date("Y-m", strtotime($check))))
                           {
                               if($val==0)
                               {
                                   $skip=true;
                               }
                           }
                         $check =date('Y-m-d',strtotime($check." +1 Months"));
                    }
                    $result[$res]['paid']=$ttl;
                    $result[$res]['amount']=$amount;
                    if($skip)
                    {
                        unset($result[$res]);
                    }
                endforeach;
                $data['result']=$result;
                $data['month']=$month;
                $data['rep_year']=$formdata['year'];
                $data['rep_month']=$formdata['month'];
                echo $this->load->view('table10',$data,TRUE);
            break;
            case "11":
                 $data['result']=array();
                 $where="`federations`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND";
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                $result=$this->get_policies_claims($where,"federations.id desc,policy_period.start_date desc","policy_period.id","policy_period","policy_period.id,policy_period.contract_id,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,insurers.name,federations.name as fed_name,policy_period.rib,policy_period.currency, policy_period.id as period_id",1,10000,"","","")->result_array();
                foreach($result as $keys => $value):
                     $result[$keys]['paid']=0.00;
                     $result[$keys]['reserve']=0.00;
                     $period_amt=$this->get_period_amount(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim","SUM(CASE WHEN trans_status = 'transferred' THEN belop END ) paid",1,'',"","","")->row();
                     $period_res=$this->get_period_amount_reserve(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim",",SUM(claim_reservations.amount) as reserve",1,'',"","","")->row();
                     if(!empty($period_amt->paid))
                     $result[$keys]['paid']=$period_amt->paid;
                     if(!empty($period_res->reserve))
                     $result[$keys]['reserve']=$period_res->reserve;
                endforeach;
                $data['result']=$result;
                echo $this->load->view('table11',$data,TRUE);
            break;
              case "12":
                $data['result']=array();
                 $c_start=$formdata['year'].'-m-01';
                $c_end=date("Y-m-t", strtotime($c_start));
                 $c_start=$formdata['start_date']=$formdata['year'].'-01-01';               

                 $c_end=$formdata['end_date']=$formdata['year'].'-12-31';  
                 $where="`federations`.`status` = '1' AND ";
                 $where="`policy_period`.`del_status` = '0' AND  `policy_period`.`del_status` = '0'  AND ";
                 $where="`policies`.`del_status` = '0' AND ";
                // if(!empty($formdata['federation']) && isset($formdata['federation'])){
                //     $fed=$formdata['federation'];
                //     $where.="`federations`.`id` = '$fed' AND ";
                // }
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                    $start=$formdata['start_date'];
                    $where.="`policy_period`.`start_date` >= '$start' AND ";
                }
                 if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`policy_period`.`start_date` <= '$end' AND ";
                }
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);

                // if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                //     $end=$formdata['end_date'];
                //     $where.=" OR ( `policy_period`.`start_date` <= '$end' ";
                //     $where.=" AND  `policy_period`.`start_date` >= '$start' ) ";

                // }
              //  print_r($where);exit;
                $result=$this->get_policies_detail($where,"policy_period.start_date desc","policy_period.id","policy_period","policy_period.id,policies.id as policy_id,policies.f_id,policies.policy_title,policy_period.contract_id,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,federations.name as fed_name,policy_period.currency,MAX(policy_period.start_date) as max_st,MAX(policy_period.end_date) as max_ed",1,10000,"","","")->result_array();
                // $result=$this->get_policies_premiums_detail($where,"policy_period.start_date desc","policy_period.id","premiums","premiums.id as premium_id,policy_period.id,policies.id as policy_id,policies.f_id,policies.policy_title,policy_period.contract_id,policy_period.start_date,policy_period.end_date,policy_period.ags_policy_no,federations.name as fed_name,policy_period.currency,MAX(policy_period.start_date) as max_st,MAX(policy_period.end_date) as max_ed",1,"","","","")->result_array();

                $strt=$result[0]['start_date'];
                $end=$result[0]['end_date'];
                // foreach($result as $key => $value):
                //     $prem= Modules::run('api/_get_specific_table_with_pagination',array("federation_id"=>$value['f_id'],'dato'>=$strt,'dato'<=$end),"id desc","premiums","SUM(paid) as paid,SUM(recieved) as ags_comission","","")->row_array();
                //     if($value['start_date']<$strt)
                //         $strt=$value['start_date'];
                //     if($value['end_date']>$end)
                //         $end=$value['end_date'];
                //     $result[$key]['paid']=$prem['paid'];
                //     $result[$key]['ags_comission']=$prem['ags_comission'];
                    
                    
                // endforeach;
                $end =date('Y-m-d',strtotime($end));
                // print_r($end);exit;
                foreach($result as $res => $value):
                    $ttl=$com=$ttl_ins=0;
                    $skip=false;
                    $amount=$month=array();
                    $check=$c_start;
                    for($i=0;$check<=$end;$i++){
                        $m_start=date("Y-m-01",strtotime($check));
                        $m_end=date("Y-m-t",strtotime($check));
                        $prem= Modules::run('reports/get_policy_wise_premiums',array("federation_id"=>$value['f_id'],'dato >= '=>$m_start, 'dato <= '=> $m_end,"policies.id"=>$value['policy_id'],"period_id"=>$value['id']),"premiums.id desc","premiums","SUM(premiums.paid) as paid,SUM(premiums.total_insurances) as total_insurance,SUM(recieved) as ags_comission","","")->row_array();
                        $val=0;
                        if($prem['paid']>0){
                            $val=$prem['paid'];
                            $ttl=$ttl+$val;
                            $com=$com+$prem['ags_comission'];
                            $ttl_ins=$ttl_ins+$prem['total_insurance'];
                        }
                        $amount[]=$val;
                        
                        $month[]=date("F Y", strtotime($check));
                        
                    
                         $check =date('Y-m-d',strtotime($check." +1 Months"));
                         
                    }
                    $result[$res]['paid']=$ttl;
                    $result[$res]['amount']=$amount;
                    $result[$res]['ags_comission']=$com;
                    $result[$res]['total_insurance']=$ttl_ins;
                    // if($skip)
                    // {
                    //     unset($result[$res]);
                    // }
                endforeach;
                
                $data['result']=$result;
                $data['month']=$month;
                $data['rep_year']=$formdata['year'];
                $data['rep_month']=$formdata['month'];

                echo $this->load->view('table12',$data,TRUE);
            break;
            case "13":
                $data['result']=array();
                $c_start=$formdata['year'].'-'.$formdata['month'].'-01';
                $c_end=date("Y-m-t", strtotime($c_start));
                $formdata['start_date']=$formdata['year'].'-01-01';
                $formdata['end_date']=date("Y-m-t", strtotime($formdata['start_date']));
                $where="`premiums`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND ";
                if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`premiums`.`dato` <= '$c_end' AND ";
                }
                // if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                //     $start=$formdata['start_date'];
                //     $where.="`premiums`.`dato` >= '$c_start' AND ";
                // }
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                    //  $where.="`premiums`.`dato` >= '$c_start' AND ";
                    //  $where.="`premiums`.`dato` <= '$c_end' AND ";
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                // $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND  '$c_end'  THEN premiums.paid END) as paid,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid, SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();
                $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","  ,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid,SUM( CASE WHEN premiums.dato <= '$c_end'  THEN premiums.paid END) as paid_new ,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,premiums.period_id as id,policies.id as policy_id,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();

                foreach($result as $res => $value):
                    $ttl=$com=$ttl_ins=0;
                     $open_claims= Modules::run('api/_get_specific_table_with_pagination',array("process_claim.period_id"=>$value['id']),"id desc","process_claim","COUNT(CASE WHEN process_claim.status = '1' THEN process_claim.id END) as open_claims,SUM(process_claim.claim_fee) as sum_claim_fee","","")->row();
                     $period_amt=$this->get_period_amount(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim","SUM(CASE WHEN trans_status = 'transferred' THEN belop END ) paid, SUM(CASE WHEN trans_status = 'transferred' AND process_claim.status = '1' THEN belop END ) open_paid",1,'',"","","")->row();
                     $period_res=$this->get_period_amount_reserve(array("process_claim.period_id"=>$value['id']),"process_claim.id desc","","process_claim",",SUM(claim_reservations.amount) as reserve, SUM(CASE WHEN  process_claim.status = '1' THEN claim_reservations.amount END) as open_reserve ",1,'',"","","")->row();
                     if(!empty($period_amt->paid))
                     $result[$res]['paid_p']=$period_amt->paid;
                     if(!empty($period_res->reserve))
                     $result[$res]['reserve_r']=$period_res->reserve;
                     $result[$res]['sum_claim_fee']=$open_claims->sum_claim_fee;
                     
                    $prem= Modules::run('reports/get_policy_wise_premiums',array("federation_id"=>$value['f_id'],"policies.id"=>$value['policy_id'],"period_id"=>$value['id']),"premiums.id desc","premiums","SUM(premiums.paid) as paid,SUM(premiums.total_insurances) as total_insurances,SUM(recieved) as recieved_rv","","")->row_array();
                    if($prem['paid']>0){
                        $result[$res]['paid']=$prem['paid'];
                    }
                    $result[$res]['recieved_rv']=$prem['recieved_rv'];
                endforeach;
                $data['result']=$result;
                $data['end_date']=$c_end;
                $data['start_date']=$c_start;
                $data['year']=$formdata['year'];
                echo $this->load->view('table13',$data,TRUE);
            break;
            case "14":
                $data['result']=array();
                $c_start=$formdata['year'].'-'.$formdata['month'].'-01';
                $c_end=date("Y-m-t", strtotime($c_start));
                $formdata['start_date']=$formdata['year'].'-01-01';
                $formdata['end_date']=date("Y-m-t", strtotime($formdata['start_date']));
                $where="`premiums`.`status` = '1' AND   `policy_period`.`del_status` = '0'  AND  `policy_period`.`policy_check` = '1' AND";
                if(!empty($formdata['end_date']) && isset($formdata['end_date'])){
                    $end=$formdata['end_date'];
                    $where.="`premiums`.`dato` <= '$c_end' AND ";
                }
                // if(!empty($formdata['start_date']) && isset($formdata['start_date'])){
                //     $start=$formdata['start_date'];
                //     $where.="`premiums`.`dato` >= '$c_start' AND ";
                // }
                if(!empty($formdata['insurer']) && isset($formdata['insurer'])){
                    $insurer=$formdata['insurer'];
                    $where.="`insurers`.`id` = '$insurer' AND ";
                }
                    //  $where.="`premiums`.`dato` >= '$c_start' AND ";
                    //  $where.="`premiums`.`dato` <= '$c_end' AND ";
                $where= preg_replace('/\W\w+\s*(\W*)$/', '$1', $where);
                // $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND  '$c_end'  THEN premiums.paid END) as paid,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid, SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();
                $result=$this->get_data_of_reports_bdx($where, "policy_period.start_date desc","premiums.period_id","premiums","  ,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.paid END) as c_paid,SUM( CASE WHEN premiums.dato <= '$c_end'  THEN premiums.paid END) as paid_new ,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.recieved END) as recieved ,premiums.comission,SUM( CASE WHEN premiums.dato BETWEEN '$c_start' AND '$c_end'  THEN premiums.total_insurances END) as total_insurances,premiums.period_id as id,policies.id as policy_id,policy_period.contract_id,policy_period.ags_policy_no,policy_period.currency,policy_period.deductible,policy_period.claim_fee,policy_period.start_date,policy_period.end_date,policy_period.insured_amt,insurers.name,federations.name as f_name,federations.id as f_id,policy_period.policy_id as p_id,policies.name as p_name","","","","","")->result_array();

                foreach($result as $res => $value):
                    $ttl=$com=$ttl_ins=0;
                    $prem= Modules::run('reports/get_policy_wise_premiums',array("federation_id"=>$value['f_id'],"policies.id"=>$value['policy_id'],"period_id"=>$value['id']),"premiums.id desc","premiums","SUM(premiums.paid) as paid,SUM(premiums.total_insurances) as total_insurances,SUM(recieved) as recieved,rib","","")->row_array();
                    if($prem['paid']>0){
                        $result[$res]['paid']=$prem['paid'];
                        $result[$res]['rib']= round(round($prem['paid'])*(floatval(str_replace("%",'',$prem['rib']))/100));
                    }
                endforeach;
                $data['result']=$result;
                $data['end_date']=$c_end;
                $data['start_date']=$c_start;
                $data['year']=$formdata['year'];
                echo $this->load->view('table14',$data,TRUE);
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
    function get_data_of_reports_bdx($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_data_of_reports_bdx($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
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
    function get_period_amount($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_period_amount($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }
    function get_period_amount_reserve($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_period_amount_reserve($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }
    
    function get_policies_detail($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_policies_detail($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }
    function get_policies_premiums_detail($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_policies_premiums_detail($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }
    
    function get_policies_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_policies_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having);
        return $query;
    }
     function _get_specific_table_with_pagination_bdx_check($cols, $order_by,$table,$select,$page_number,$limit){
        $this->load->model('mdl_reports');
        $query = $this->mdl_reports->_get_specific_table_with_pagination_bdx_check($cols, $order_by,$table,$select,$page_number,$limit);
        return $query;
    }
    function get_policy_wise_premiums($cols, $order_by,$table,$select,$page_number,$limit){
         $this->load->model('mdl_reports');
        $query = $this->mdl_reports->get_policy_wise_premiums($cols, $order_by,$table,$select,$page_number,$limit);
        return $query;
    }
   

}

