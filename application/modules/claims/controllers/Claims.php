<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Claims extends MX_Controller
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
        $federationWithSpaces = urldecode($federation); // Replace %20 with space
        $federationNoSpaces = str_replace(' ', '', $federationWithSpaces); // Remove spaces
        $data["searchId"] = urldecode(isset($_GET['search']) && !empty($_GET['search']) ? Modules::run('api/encryptor','decrypt', $_GET['search']) : "");
        $data['news'] = $this->_get('id desc', $federationWithSpaces, $federationNoSpaces);
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


    function post_form_data()
	{
		parse_str($_POST['data'], $formdata);
		$data['c_name']="";
		if(!empty($formdata['name']))
			$data['c_name']= $formdata['name'];
		$data['c_contact']="";
		if(!empty($formdata['contact']))
			$data['c_contact']= $formdata['contact'];
		$data['c_address']="";
		if(!empty($formdata['address']))
			$data['c_address']= $formdata['address'];
		$data['c_code']="";
		if(!empty($formdata['code']))
			$data['c_code']= $formdata['code'];
		$data['c_phone']="";
		if(!empty($formdata['phone']))
			$data['c_phone']= $formdata['phone'];
		$data['circuit']="";
		if(!empty($formdata['circuit']))
			$data['circuit']= $formdata['circuit'];
		$data['a_name']="";
		if(!empty($formdata['a_name']))
			$data['a_name']= $formdata['a_name'];
		$data['license']="";
		if(!empty($formdata['license']))
			$data['license']= $formdata['license'];
		$data['a_birth']="";
		if(!empty($formdata['a_birth']))
			$data['a_birth']= $formdata['a_birth'];
		$data['a_surname']="";
		if(!empty($formdata['a_surname']))
			$data['a_surname']=$formdata['a_surname'];
		$data['a_sportsno']="";
		if(!empty($formdata['a_sportsno']))
			$data['a_sportsno']= $formdata['a_sportsno'];
		$data['a_address']="";
		if(!empty($formdata['a_address']))
			$data['a_address']=$formdata['a_address'];
		$data['a_code']="";
		if(!empty($formdata['a_code']))
			$data['a_code']= $formdata['a_code'];
		$data['a_member_no']="";
		if(!empty($formdata['a_member_no']))
			$data['a_member_no']= $formdata['a_member_no'];
		$data['a_phone']="";
		if(!empty($formdata['a_phone']))
			$data['a_phone']= $formdata['a_phone'];
		$data['a_guardian']="";
		if(!empty($formdata['a_guardian']))
			$data['a_guardian']= $formdata['a_guardian'];
		$data['a_telephone']="";
		if(!empty($formdata['telephone']))
			$data['a_telephone']= $formdata['telephone'];
		$data['a_epost']="";
		if(!empty($formdata['e_post']))
			$data['a_epost']= $formdata['e_post'];
		$data['a_mobile_tel']="";
		if(!empty($formdata['mobile_tel']))
			$data['a_mobile_tel']= $formdata['mobile_tel'];
		$data['injury_reason']="";
		if(!empty($formdata['injury_reason']))
			$data['injury_reason']= $formdata['injury_reason'];
		$data['damage_desc']="";
		if(!empty($formdata['damage_desc']))
			$data['damage_desc']= $formdata['damage_desc'];
		$data['damage_part']="";
		if(!empty($formdata['damage_part']))
			$data['damage_part']=$formdata['damage_part'];
		$data['jumping_feild']="";
		if(!empty($formdata['jumping_feild']))
			$data['jumping_feild']=$formdata['jumping_feild'];
		$data['sport']="";
		if(!empty($formdata['sport']))
			$data['sport']= $formdata['sport'];
		$data['sento_nlf_hps']="";
		if(!empty($formdata['sento_nlf_hps']))
			$data['sento_nlf_hps']= $formdata['sento_nlf_hps'];
		$data['sentto_shf']="";
		if(!empty($formdata['sentto_shf']))
			$data['sentto_shf']= $formdata['sentto_shf'];
		$data['place_of_damage']="";
		if(!empty($formdata['place_of_damage']))
			$data['place_of_damage']= $formdata['place_of_damage'];
		$data['where_acc_occur']="";
		if(!empty($formdata['where_acc_occur']))
			$data['where_acc_occur']= $formdata['where_acc_occur'];
		$data['season']="";
		if(!empty($formdata['season']))
			$data['season']= $formdata['season'];
		$data['damage_date']="";
		if(!empty($formdata['damage_date']))
			$data['damage_date']=$formdata['damage_date'];
		$data['damage_time']="";
		if(!empty($formdata['damage_time']))
			$data['damage_time']=$formdata['damage_time'];
		$data['basis']="";
		if(!empty($formdata['basis']))
			$data['basis']=$formdata['basis'];
		$data['match_with']="";
		if(!empty($formdata['match_with']))
			$data['match_with']= $formdata['match_with'];
		$data['leg_protector_used']="";
		if(!empty($formdata['leg_protector_used']))
			$data['leg_protector_used']= $formdata['leg_protector_used'];
		$data['insurance_under']="";
		if(!empty($formdata['insurance_under']))
			$data['insurance_under']= $formdata['insurance_under'];
		$data['claim_paidto']="";
		if(!empty($formdata['claim_paidto']))
			$data['claim_paidto']= $formdata['claim_paidto'];
		$data['bank_account_no']="";
		if(!empty($formdata['bank_account_no']))
			$data['bank_account_no']=$formdata['bank_account_no'];
		$data['bic_code']="";
		if(!empty($formdata['bic_code']))
			$data['bic_code']=$formdata['bic_code'];
		$data['other_insurance']="";
		if(!empty($formdata['other_insurance']))
			$data['other_insurance']= $formdata['other_insurance'];
		$data['permission']="";
		if(!empty($formdata['permission']))
			$data['permission']= $formdata['permission'];
		$data['self']="";
		if(!empty($formdata['self']))
			$data['self']=$formdata['self'];
		$data['federation']=$this->input->post('federation');
        $data['claim_datetime']=date('Y-m-d H:i:s');
        $data['id']= $formdata['c_id'];
		return $data;
	}

	function update_claim()
	{
        $data=$this->post_form_data();
		$federations=Modules::run('api/get_specific_table_data',array('title'=>$data['federation'],"status"=>"1","del_status"=>"0"),'id',"id","federations",'','')->row();
		$data['federation']=$federations->id;
        Modules::run('api/insert_or_update',array("id"=>$data['id']),$data,"claims");
		exit;
    }
    function searchPolicyNumber() {
        $search = $this->input->post('search');
        $claimData = "";
        if(!empty($search)) {
            $claims = $this->getClaimsWithFederation(array("claims.del_status"=>"0", "federations.del_status"=>"0"), "federations.id asc", "claims.id", "claims.id,claims.a_name as claimName,a_surname, federations.title as fedTitle", "1", "0", "(claims.id LIKE '%".$search."%')", "", "")->result_array();
            if(!empty($claims)) {
                foreach($claims as $item):
                    $claimName = (isset($item["claimName"]) && !empty($item["claimName"]) ? $item["claimName"] : "")." ".(isset($item["a_surname"]) && !empty($item["a_surname"]) ? $item["a_surname"]." - " : "");;
                    $fedTitle = (isset($item["fedTitle"]) && !empty($item["fedTitle"]) ? $item["fedTitle"] : "");
                    $id = (isset($item["id"]) && !empty($item["id"]) ? "(".$item["id"].")" : "");
                    $searchId = (!empty($item["id"]) ? $item["id"]  : "");
                    if(!empty($claimName) || !empty($fedTitle) || !empty($id)) {
                        $claimData .= '<a class="dropdown-item" href="'.(!empty($fedTitle) ? ADMIN_BASE_URL.'claims/list/'.$fedTitle.(!empty($id) ? "?search=".Modules::run('api/encryptor','encrypt',$searchId) : "") : '#').'">'.$claimName.$fedTitle.$id.'</a>';
                    }
                endforeach;
            }
        }
        if(empty($claimData))
            $claimData = '<div class="dropdown-item">No matching records found</div>';
        echo $claimData;
    }

   function process_claim()
    {
       // print_r($_POST);exit;
        $session=$this->session->userdata('route_user_data');
        $check="0";
        $status=false;
        parse_str($_POST['data'], $formdata);
        $formdata['d_text']=$this->input->post('d_text');
        $formdata['s_text']=$this->input->post('s_text');
        $data['claim_id']=$this->input->post('claim_id');
		if(!empty($formdata['status']) && $formdata['status']!="Plukke ut" ){
            $data['status']= $formdata['status'];
            if($data['status']!="3"){
                if(!empty($formdata['body_part'])){
                    $data['body_part']= $formdata['body_part'];
                    if(!empty($formdata['damage_type'])){
                        $data['damage_type']= $formdata['damage_type'];
                        if(!empty($formdata['side'])){
                            $data['side']= $formdata['side'];
                            if(!empty($formdata['insurance_type'])){
                                if(!empty($formdata['total'])){
                                    $check="1";
                                }
                                else
                                $message="Velg Reservasjon";
                            }
                            else
                            $message="Velg Forsikret nedenfor";
                        }
                        else
                        $message="Velg side";
                    }
                    else
                    $message="Velg Skadetype";
                }
                else
                $message="Velg Kroppsdel";
            }
            else
            {
                if(!empty($formdata['rejection_type'])){
                    $data['rejection_type']= $formdata['rejection_type'];
                    if(!empty($formdata['body_part'])){
                        $data['body_part']= $formdata['body_part'];
                        if(!empty($formdata['damage_type'])){
                            $data['damage_type']= $formdata['damage_type'];
                            if(!empty($formdata['side'])){
                                $data['side']= $formdata['side'];
                                $check="1";
                            }
                            else
                            $message="Velg side";
                        }
                        else
                        $message="Velg Skadetype";
                    }
                    else
                    $message="Velg Kroppsdel";
                }
                else
                $message="Velg Avvisning Type";
            }
        }
        else
            $message="Velg status";
        if($check=="1")
        {
            $data['period_id']=$formdata['period_id'];
            $c_fee=Modules::run('api/get_specific_table_data',array('id'=>$data['period_id']),'id desc',"claim_fee","policy_period",'','')->row_array();
            $data['claim_fee']=$c_fee['claim_fee'];
            if(isset($formdata['total']) && !empty($formdata['total']))
                $data['total']=$formdata['total'];
            $data['deductible']="";
            if(isset($formdata['deductible']) && !empty($formdata['deductible']))
                $data['deductible']=$formdata['deductible'];
            $data['regress']="";
            if(isset($formdata['regress']) &&  !empty($formdata['regress']))
                $data['regress']=$formdata['regress'];
            $data['email_insurer']="0";
            if(  isset($formdata['email_insurer']) && !empty($formdata['email_insurer']))
                $data['email_insurer']="1";
            $data['email_ihs']="0";
            if( isset($formdata['email_ihs']) && !empty($formdata['email_ihs']))
                $data['email_ihs']="1";
                $data['underwriter']="0";
            if(  isset($formdata['underwriter']) && !empty($formdata['underwriter']))
                $data['underwriter']="1";
                $data['close_case_inactivity']="0";
            if( isset($formdata['close_case_inactivity']) && !empty($formdata['close_case_inactivity']))
                $data['close_case_inactivity']="1";
                $status=true;
                $message="lagret";
                $old_data=Modules::run('api/get_specific_table_data',array('claim_id'=>$data['claim_id']),'id desc',"*","process_claim",'','')->row_array();
                if(empty($old_data)){
                    $data['process_datetime']=date('Y-m-d H:i:s');
                    $note['user_id']=$session['user_id'];
                    $note['note_date']=date('Y-m-d H:i:s');
                    $note['description']="Kontrollert mot gjeldende polise";
                    $note['claim_id']=$data['claim_id'];
                    Modules::run('api/insert_into_specific_table',$note,'notes');
                }
                Modules::run('api/insert_or_update',array("claim_id"=>$data['claim_id']),$data,"process_claim");
                $where['id'] = $data['claim_id'];
                $claim_data = $this->_get_by_arr_id($where)->row();
                $mail=Modules::run('api/get_specific_table_data',array('f_id'=>$claim_data->federation),'id desc',"username as smtp_username,password as smtp_password,host as smtp_host,port as smtp_port","maler",'','')->row_array();

                $this->load->library('email');
                if(empty($mail)){
                    $mail_Out=Modules::run('api/get_specific_table_data',array('id'=>DEFAULT_OUTLET),'id desc',"smtp_username,smtp_password,smtp_host,smtp_port","outlet",'','')->row_array();
                    $port = $mail_Out['smtp_port'];
                    $user = $mail_Out['smtp_username'];
                    $pass = $mail_Out['smtp_password'];
                    $host = $mail_Out['smtp_host']; 
                    $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => $host,
                    'smtp_port' => $port,
                    'smtp_user' =>  $user,
                    'smtp_pass' =>  $pass,
                    'mailtype'  => 'html', 
                    'starttls'  => true,
                    'newline'   => "\r\n"
                    );
                }else
                {
                    $port = $mail['smtp_port'];
                    $user = $mail['smtp_username'];
                    $pass = $mail['smtp_password'];
                    $host = $mail['smtp_host'];
                    $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => $host,
                    'smtp_port' => $port,
                    'smtp_user' =>  "affinity.no",
                    'smtp_pass' =>  $pass,
                    'smtp_crypto'=>'tls',
                    'mailtype'  => 'html', 
                    'starttls'  => true,
                    'wordwrap'  => true,
                    'charset'  => 'utf-8',
                    'newline'   => "\r\n"
                    );
                }
                    $mailtitle="AGS Forsikring AS";
                     
                if(isset($formdata['approve_email_claimant']) &&  $formdata['approve_email_claimant']=="on")
                {
                    $mail_data['claim_id']=$data['claim_id'];
                    $mail_data['mail']['email']=$formdata['s_text'];
                
                    $this->email->initialize($config);
                    $this->email->from($user, $formdata['s_sendername']);
                    $this->email->to($claim_data->a_epost);
                //	$this->email->to("yumnasohail04@gmail.com");
                    $this->email->subject($formdata['s_subject']);
                    $messages=$this->load->view('front/mail_format',$mail_data,TRUE);
                    $this->email->message($messages);
                    $this->email->send();
                    // if ($this->email->send()) {
                    //     echo "Email has been sent successfully.";
                    // } else {
                    //     echo "Failed to send the email.";
                    //     echo $this->email->print_debugger();
                    // }
                    Modules::run('api/insert_into_specific_table',array("claim_id"=>$data['claim_id'],"performed_by"=>$session['user_id'],"type"=>"3","description"=>$messages,"message"=>"Godkjent e-post sendt","date_time"=>date('Y-m-d H:i:s')),'logs');

                }
                if(isset($formdata['decline_email_claimant']) &&  $formdata['decline_email_claimant']=="on")
                {
                    $mail_data['claim_id']=$data['claim_id'];
                    $mail_data['mail']['email']=$formdata['d_text'];
                    $this->email->initialize($config);
                    $this->email->from($user, $formdata['d_sendername']);
                    $this->email->to($claim_data->a_epost);
                //	$this->email->to("yumnasohail04@gmail.com");
                    $this->email->subject($formdata['d_subject']);
                    $messages=$this->load->view('front/mail_format',$mail_data,TRUE);
                    $this->email->message($messages);
                    $this->email->send();
                    Modules::run('api/insert_into_specific_table',array("claim_id"=>$data['claim_id'],"performed_by"=>$session['user_id'],"type"=>"3","description"=>$messages,"message"=>"Avvist e-post sendt","date_time"=>date('Y-m-d H:i:s')),'logs');

                }
                
                if($data['email_ihs']=="1"){
                    if($data['status']=="1"){
                        $mail_data['claim_id']=$data['claim_id'];
                        $mail_data['mail']['email']=$formdata['s_text'];
                    
                        $this->email->initialize($config);
                        $this->email->from($user, $mailtitle);
                       // $this->email->to("yumnasohail04@gmail.com");
                        $this->email->to("skade@idrettshelse.no");
                        $this->email->subject($formdata['s_subject']);
                        $messages=$this->load->view('front/mail_format',$mail_data,TRUE);
                        $this->email->message($messages);
                        $this->email->send();
                        Modules::run('api/insert_into_specific_table',array("claim_id"=>$data['claim_id'],"performed_by"=>$session['user_id'],"type"=>"3","description"=>$messages,"message"=>"E-post sendt til IHS","date_time"=>date('Y-m-d H:i:s')),'logs');

                    } 
                    else
                    {
                        $mail_data['claim_id']=$data['claim_id'];
                        $mail_data['mail']['email']=$formdata['d_text'];
                    
                        $this->email->initialize($config);
                        $this->email->from($user, $mailtitle);
                        //$this->email->to("yumnasohail04@gmail.com");
                        $this->email->to("skade@idrettshelse.no");
                        $this->email->subject($formdata['d_subject']);
                        $messages=$this->load->view('front/mail_format',$mail_data,TRUE);
                        $this->email->message($messages);
                        $this->email->send();
                        Modules::run('api/insert_into_specific_table',array("claim_id"=>$data['claim_id'],"performed_by"=>$session['user_id'],"type"=>"3","description"=>$messages,"message"=>"E-post sendt til IHS","date_time"=>date('Y-m-d H:i:s')),'logs');

                    }
                }
            //    print_r($messages);exit;
                if(isset($formdata['insurance_type'])){
                    $total=count($formdata['insurance_type']);
                    if($total>0){
                        $total_res=0;
                        for($a=0;$a<$total;$a++)
                        {
                            $attr_data['claim_id']=$data['claim_id'];
                            $attr_data['coverage_cat']=$formdata['insurance_type'][$a];
                            $amount_res=$formdata['reservation'.$formdata['insurance_type'][$a]];
                            $attr_data['amount']=$amount_res;
                            $total_res=(int)$attr_data['amount']+$total_res;
                            $new=1;
                            $check=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$data['claim_id'],"coverage_cat"=>$formdata['insurance_type'][$a]),'id desc',"claim_reservations","amount",'','')->row_array();
                            if(!empty($check)){
                                if($check['amount']==$amount_res)
                                    $new=0;
                            }else{
                                $check['amount']=0;
                            }
                            Modules::run('api/insert_or_update',array("claim_id"=>$data['claim_id'],"coverage_cat"=>$formdata['insurance_type'][$a]),$attr_data,"claim_reservations");
                            $code=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$formdata['insurance_type'][$a]),'id desc',"coverage_category","code,id,name",'','')->row();
                            $amount=$amount_res;
                            
                            $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$data['claim_id'],"type"=>"Reservasjon[".$code->code."]"), "id desc","transaction","belop","","")->row_array();
                            if(!empty($res)){
                                if($check['amount']!=$amount_res){
                                 // print_r($amount_res."_____".$check['amount']);
                                    $amount=abs($amount_res)-abs($check['amount']);
                                    $b_res=$res['belop'];
                                    if($check['amount']!=$amount_res)
                                        Modules::run('api/insert_into_specific_table',array("claim_id"=>$data['claim_id'],"performed_by"=>$session['user_id'],"type"=>"4","message"=>"Oppdaterte $code->name reservasjon med kr $amount (gir ny reservasjon $amount_res)","date_time"=>date('Y-m-d H:i:s')),'logs');
                                }
                            }
                            //print_r("amount:".$amount);
                            $arr_attribute['claim_id']=$data['claim_id'];
                            $arr_attribute['belop']=$amount;
                            $arr_attribute['dato']=date('Y-m-d');
                            $arr_attribute['coverage_cat']=$code->id;
                            $arr_attribute['time']=date('H:i:s');
                            $arr_attribute['type']="Reservasjon[".$code->code."]";
                            $arr_attribute['user']=$session['user_id'];
                            if($new==1){
                                Modules::run('api/insert_into_specific_table',$arr_attribute,'transaction');
                            }
                        }
                        if($total_res>200000)
                        {
                            $this->load->library('email');
                            $port1 = 465;
                            $user1 = "reminder@agsasa.com";
                            $pass1 = "isaF3nAv-OaA";
                            $host1 = 'ssl://mail.agsasa.com';  
                            $config1 = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => $host1,
                            'smtp_port' => $port1,
                            'smtp_user' =>  $user1,
                            'smtp_pass' =>  $pass1,
                            'mailtype'  => 'html', 
                            'starttls'  => true,
                            'newline'   => "\r\n"
                            );
                            $this->email->initialize($config1);
                            $this->email->from($user1, "AGS Forsikring AS");
                            $this->email->to("lpm@agsforsikring.no");
                        	$this->email->cc("yumnasohail04@gmail.com");
                            $this->email->subject("System auto email on Reserve Registration");
                            $this->email->message("A reserve above 200.000 NOK/SEK has been registered in the system on claim# ".$data['claim_id']);
                            $this->email->send();

                        }
                    }
                }
                if($data['status']=="1")
                    $claim_stat="Godkjent";
                if($data['status']=="2"){
                    $claim_stat="Avsluttet";
                    $t_date=date('Y-m-d H:i:s');
                    Modules::run('api/insert_or_update',array("claim_id"=>$data['claim_id']),array("closing_date"=>$t_date),"process_claim");
                }
                if($data['status']=="3"){
                    $claim_stat="Avslått";
                    if(isset($formdata['rejection_type']) && $formdata['rejection_type']=="2")
                    {
                        $claim_stat="Avslått, Avventer";
                    }else{
                        $t_date=date('Y-m-d H:i:s');
                        Modules::run('api/insert_or_update',array("claim_id"=>$data['claim_id']),array("date_denied"=>$t_date,"closing_date"=>$t_date),"process_claim");
                    }
                }
                if($data['status']!=$old_data['status']){
                    Modules::run('api/insert_into_specific_table',array("claim_id"=>$data['claim_id'],"performed_by"=>$session['user_id'],"type"=>"1","message"=>"Processed form - $claim_stat","date_time"=>date('Y-m-d H:i:s')),'logs');
                }
                Modules::run('api/insert_or_update',array("id"=>$data['claim_id']),array("claim_stat"=>$claim_stat),"claims");  
        }
        
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
    }
    
    function get_period_deductible()
    {
        $period_id=$this->input->post('period_id');
        $deduct=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$period_id), "id desc","policy_period","deductible","","")->row();
        echo  $deduct->deductible;

    }
    
    function manage() {
        $update_id = $this->uri->segment(5);
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $data['news'] = $this->_get_by_arr_id($where)->row();
        }
        $data['status']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1"), "id asc","claim_status","name,id","","")->result_array();
        $data['reject_status']=Modules::run('api/_get_specific_table_with_pagination',array(), "id asc","rejections","title,id","","")->result_array();
        $data['body_parts']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1"), "id asc","body_parts","part,id","","")->result_array();
        $data['damage_type']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1"), "id asc","damage_type","type,id","","")->result_array();
        $data['category']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1"), "id asc","coverage_category","name,id","","")->result_array();
        $where=array("policies.del_status"=>"0","policy_period.del_status"=>"0","policies.f_id"=>$data['news']->federation);
        $data['policies'] = Modules::run('policies/get_policies_with_period',$where)->result_array();
        $data['processed_data']=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$update_id), "id desc","process_claim","*","","")->row();
        $data['coverage_cat']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1", "del_status"=>"0"), "id asc","coverage_cat","*","","")->result_array();
        $data['federation_id'] = $data['news']->federation;
        $data['addressbook']=Modules::run('claims/get_federation_addressbook',array('f_id'=>$data['federation_id'],'status'=>"1", "del_status"=>"0"), "federations_address","addressbook.id,name")->result_array();
        $data['payment_category']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1"),"id desc", "payment_category","*","","")->result_array();
        $data['recepient_category']=Modules::run('api/_get_specific_table_with_pagination',array('status'=>"1"), "id desc","recepient_category","*","","")->result_array();
        $data['transactions']=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$update_id), "id asc","transaction","*","","")->result_array();
        $data['per_cat']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('claim_id'=>$update_id,"trans"=>"0"), "id asc",'coverage_cat',"transaction","coverage_cat,SUM(belop) as belop","","","","","")->result_array();
        $data['note']=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$update_id), "id asc","notes","*","","")->result_array();
        $data['fed']=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$data['federation_id']), "id asc","federations","title","","")->row();
        $data['maler']=Modules::run('api/get_specific_table_data',array('f_id'=>$data['federation_id']),'id desc',"name","maler",'','')->row_array();
        $data['logs']=Modules::run('api/get_specific_table_data',array('claim_id'=>$update_id),'id desc',"performed_by,message,type,date_time,description,id","logs",'','')->result_array();
        $data['claim_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    function add_transactions()
    {
        
        $new_amt="0";
        $session=$this->session->userdata('route_user_data');
        $formdata=$this->input->post('data');
        parse_str($formdata, $formdata);
        $claim_id=$this->input->post('claim_id');
        $news = Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$claim_id), "id desc","process_claim","period_id","","")->row();
        $clm=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$news->period_id), "id desc","policy_period","currency","","")->row_array();
        $currency=$clm['currency'];
        $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$formdata['coverage_category']), "id desc","coverage_category","code","","")->row_array();
        $cr=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$claim_id,"coverage_cat"=>$formdata['coverage_category']), "id desc","claim_reservations","amount","","")->row_array();
        
     //   if()
        
        if($formdata['t_deduct']<($formdata['amount']+$formdata['t_deduct'])){
            if($cr['amount']>=$formdata['amount'] && $cr['amount']!=0){
                if(isset($formdata['reduce_reservation']))
                if($formdata['reduce_reservation']=="on")
                {
                    $pc=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$claim_id), "id desc","process_claim","total","","")->row_array();
                    $new_amt=$cr['amount']-($formdata['amount']);
                    Modules::run('api/insert_or_update',array("claim_id"=>$claim_id,"coverage_cat"=>$formdata['coverage_category']),array("amount"=>$new_amt),"claim_reservations");  
                    $new_amt=$pc['total']-$formdata['amount'];
                    Modules::run('api/insert_or_update',array("claim_id"=>$claim_id),array("total"=>$new_amt),"process_claim"); 
                }
                if(!empty($formdata['a_name']))
                    $trans_data['a_name']=$formdata['a_name']?? '';
                if(!empty($formdata['a_address']))
                    $trans_data['a_address']=$formdata['a_address']?? '';
                if(!empty($formdata['a_account']))
                    $trans_data['a_account']=$formdata['a_account']?? '';
                if(!empty($formdata['a_postalcode']))
                    $trans_data['a_postalcode']=$formdata['a_postalcode']?? '';
                if(!empty($formdata['a_place']))
                    $trans_data['a_place']=$formdata['a_place']?? '';
                $trans_data['claim_id']=$claim_id;
                $trans_data['recepient']=$formdata['recepient'][0]?? '';
                $trans_data['payment']=$formdata['payment'][0] ?? '';
                if($trans_data['payment']==2)
                    $currency=$formdata['pay_currency'];
                $trans_data['international_currency']=$currency;
                $trans_data['coverage_cat']=$formdata['coverage_category']?? '';
                $trans_data['addressbook']=$formdata['addressbook']?? '';
                if($formdata['addressbook']=="claimant")
                    $trans_data['addressbook']="0";
                $trans_data['description']=$formdata['description']?? '';
                $trans_data['belop']=$formdata['amount']?? '';
                $trans_data['message']=$formdata['message']?? '';
                $trans_data['type']="Utbetaling[".$res['code']."]";
                $trans_data['dato']=date('Y-m-d');
                $trans_data['time']=date('H:i:s');
                $trans_data['trans']="0";
                $trans_data['user']=$session['user_id'];
                $trans_data['due_date']=date('Y-m-d',strtotime ($formdata['due_date']));
                $trans_data['kid']=$formdata['kid']?? '';
                $trans_data['deduct']=0;
                if($formdata['t_deduct']>0)
                    $trans_data['deduct']=$formdata['t_deduct'];
                $trans_data['send']="0";
                if(isset($formdata['claimnt_mail']))
                if($formdata['claimnt_mail']=="on")
                {
                    $trans_data['send']="1";
                }
                $sanction=$this->sanction_check($trans_data['a_name']);
                $trans_data['sanction_result']=$sanction['res'];
                $trans_data['sanction_detail']=$sanction['description'];
                $id=Modules::run('api/insert_into_specific_table',$trans_data,"transaction");  
                $log_amount=$formdata['amount'];
                Modules::run('api/insert_into_specific_table',array("claim_id"=>$claim_id,"performed_by"=>$session['user_id'],"type"=>"2","message"=>" New payment: $currency $log_amount","date_time"=>date('Y-m-d H:i:s')),'logs');
                $status=true;
                $message="Transaksjonen lagt til";

                $ta_belop= $formdata['ta_belop']?? '';
                $ta_coverage_cat= $formdata['ta_coverage_cat']?? '';
                $ta_paidto= $formdata['ta_paidto']?? '';
                $ta_dato= $formdata['ta_dato']?? '';
                $total=count($ta_belop);
                if(isset($ta_belop) && !empty($ta_belop)){
                    for ($i=0; $i <$total; $i++) {
                        $arr_attribute['claim_id']=$claim_id;
                        $arr_attribute['belop']=$ta_belop[$i];
                        $arr_attribute['dato']=date('Y-m-d',strtotime ($ta_dato[$i]));
                        $arr_attribute['paidto']=$ta_paidto[$i];
                        $arr_attribute['coverage_category']=$ta_coverage_cat[$i];
                        $arr_attribute['time']=date('H:i:s');
                        $arr_attribute['t_id']=$id;
                        Modules::run('api/insert_into_specific_table',$arr_attribute,'sub_amounts');
                    }
                }
            }else
            {
                $status=FALSE;
                $message="Det reserverte beløpet er ikke nok til å gjennomføre denne transaksjonen. vennligst øk reservasjonsbeløpet først.";
            }
        }else
        {
            $status=FALSE;
            $message="Angi transaksjonsbeløpet som er større enn egenandelen.";
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);


    }
    
    function sanction_check($name){
		$name = str_replace(' ', '%20', $name);
		$curl = curl_init();

        curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.sanctions.io/search/?min_score=0.88&country=NO,SE&data_source=CFSP&name=".$name,
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
                  CURLOPT_CAINFO => $_SERVER['DOCUMENT_ROOT'] . '/cacert.pem', 
                ));

        
        $result = curl_exec($curl);
		if (curl_errno($curl)) {
			echo 'Error:' . curl_error($curl);
		}
		curl_close($curl);
        $data['description']=$result;
		if (!empty($result)) {
			$result = json_decode($result);
			if($result->count==0)
			$data['res']="Secure";
			else
			$data['res']="Not secure";
			    
		}else{
		    $data['res']="No result found";
		}
        return $data;
    }
    function note()
    {
        $status=TRUE;
        $message="Notatet er lagret";
        $formdata=$this->input->post('form_data');
        parse_str($formdata, $formdata);
        $session=$this->session->userdata('route_user_data');
        $data['user_id']=$session['user_id'];
        $data['note_date']=date('Y-m-d H:i:s');
        $data['description']=$formdata['note_desc'];
        $data['claim_id']=$formdata['claim_id'];
        if(!empty($data['description']) &&  !empty($data['claim_id'])){
            Modules::run('api/insert_into_specific_table',$data,'notes');
        }else
        {
            $status=FALSE;
            $message="Det oppstod en feil under lagring av notatet";
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
    }
    function delete_note()
    {
        $status=TRUE;
        $message="Merknaden er slettet";
        $id=$this->input->post('id');
        if(!empty($id)){
            Modules::run('api/delete_from_specific_table',array("id"=>$id),'notes');
        }else
        {
            $status=FALSE;
            $message="Det oppstod en feil under sletting av notatet";
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
    }
    function transaction_detail()
    {
        $id=$this->input->post('id');
        $data['post']=Modules::run('claims/get_transaction_detail',array("transaction.id"=>$id),"","","transaction.*,federations.name,","transaction")->row_array();
        $this->load->view('detail',$data);
    }
    function get_claim_detail()
    {
        $update_id = $this->input->post('id');
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $data['new'] = $this->_get_by_arr_id($where)->row();
        }
        
        $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$data['new']->federation), "id desc","federations","title,federation_slug","","")->result_array();
        $data['federation']=$res[0]['federation_slug'];
        $data['editable']="0";
        $data['update_id'] = $update_id;
        $this->load->view(strtolower($data['federation']),$data);
    }

    function get_editable_detail()
    {
        $update_id = $this->input->post('id');
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $data['new'] = $this->_get_by_arr_id($where)->row();
        }
        $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$data['new']->federation), "id desc","federations","title,federation_slug","","")->result_array();
        $data['federation']=$res[0]['federation_slug'];
        $data['editable']="1";
        $data['update_id'] = $update_id;
        $this->load->view(strtolower($data['federation']),$data);
    }

    function _get_data_from_post() {
        $data['title'] = $this->input->post('txtNewsTitle');
        $data['short_desc'] = $this->input->post('txtShortDesc');
        $data['long_desc'] = $this->input->post('txtLongDesc');
        $data['image'] = $this->input->post('hdn_image');
        return $data;
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $this->_update($where, $data);
            $this->session->set_flashdata('message', 'Post'.' '.DATA_UPDATED);										
            $this->session->set_flashdata('status', 'success');
        }
        if (is_numeric($update_id) && $update_id == 0) {
            $id = $this->_insert($data);
            $this->session->set_flashdata('message', 'Post'.' '.DATA_SAVED);										
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'post');
    }
    function payment_check() {
        $check_id = $this->input->post('id');
        $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$check_id,'type'=>'Utbetaling[m]'), "id desc","transaction","id","","")->num_rows();
        echo $res;

    }

    function delete() {
        $delete_id = $this->input->post('id');
        $where['id'] = $delete_id;
       // $this->_delete($where);
        Modules::run('api/insert_or_update',array("id"=>$delete_id),array("del_status"=>1),"claims");
        Modules::run('api/delete_from_specific_table',array("claim_id"=>$delete_id),'claim_reservations');
        Modules::run('api/delete_from_specific_table',array("claim_id"=>$delete_id),'process_claim');

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
    function get_addressbook_detail()
    {
        $a_id=$this->input->post('a_id');
        $claim_id=$this->input->post('claim_id');
        if(is_numeric($a_id) && !empty($a_id))
        {
            $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$a_id), "id desc","addressbook","*",1,0)->row_array();
        }else if(!empty($a_id))
        {
            $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$claim_id), "id desc","claims","a_address as address,a_code as postal_code, a_phone as place,bank_account_no as account_no,CONCAT(a_name, ' ', a_surname) AS name, ",1,0)->row_array();
        }
        echo "<article lang=''><name>".$res['name']."</name><address>".$res['address']."</address>
              <postal_code>".$res['postal_code']."</postal_code><place>".$res['place']."</place>
              <account_no>".$res['account_no']."</account_no></article>";
 
    }

    function detail() {
        $update_id = $this->input->post('id');
        $data['post'] = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $this->load->view('detail', $data);
    }

	
    function _getItemById($id) {
        $this->load->model('mdl_claims');
        return $this->mdl_claims->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_claims');
        $this->mdl_claims->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_claims');
        $this->mdl_claims->_set_unpublish($arr_col);
    }

    function _get($order_by,$federationWithSpaces, $federationNoSpaces){
        $this->load->model('mdl_claims');
        $query = $this->mdl_claims->_get($order_by,$federationWithSpaces, $federationNoSpaces);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_claims');
        return $this->mdl_claims->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_claims');
        $query = $this->mdl_claims->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_claims');
        return $this->mdl_claims->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_claims');
        $this->mdl_claims->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_claims');
        $this->mdl_claims->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_claims');
        $this->mdl_claims->_delete($arr_col);
    }
    function get_federation_addressbook($where, $table,$select)
    {
        $this->load->model('mdl_claims');
        return $query=$this->mdl_claims->get_federation_addressbook($where, $table,$select);
    }
    function get_transaction_detail($where,$order_by,$group_by,$select,$table)
    {
        $this->load->model('mdl_claims');
        return $query=$this->mdl_claims->get_transaction_detail($where,$order_by,$group_by,$select,$table);
    }
   function getClaimsWithFederation($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having)
    {
        $this->load->model('mdl_claims');
        $query = $this->mdl_claims->getClaimsWithFederation($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having);
        return $query;
    }




}