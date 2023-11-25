<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front extends MX_Controller {
protected $data = '';
	function __construct() {
	    parent::__construct();
	    $this->load->library("pagination");
	    $this->load->helper("url");

	}
	function index() {
        $this->load->module('template');
	    $data['view_file'] = 'home_page';
	    $this->template->front($data);
	}


	function curling() {
	    $data['page_title']="Curlingforbundet";
        $this->load->module('template');
	    $data['view_file'] = 'curling';
	    $this->template->front($data);
	}

	function tsff() {
	    $data['page_title']="TSFF";
        $this->load->module('template');
	    $data['view_file'] = 'tsff';
	    $this->template->front($data);
	}
    
    function nvf()
    {
        $data['page_title']="Norges Vektløfterforbund";
        $this->load->module('template');
	    $data['view_file'] = 'nvf';
	    $this->template->front($data);
    }
	function naif() {
	    $data['page_title']="Norges Amerikanske Idretters Forbund";
        $this->load->module('template');
	    $data['view_file'] = 'naif';
	    $this->template->front($data);
	}

	function judo() {
	    $data['page_title']="Judoforbundet";
        $this->load->module('template');
	    $data['view_file'] = 'judo';
	    $this->template->front($data);
	}

	function nlf_f() {
	    $data['page_title']="NLF / Fallskjerm";
        $this->load->module('template');
	    $data['view_file'] = 'nlf_f';
	    $this->template->front($data);
	}

	function nlf_hps() {
	    $data['page_title']="NLF/HPS ";
        $this->load->module('template');
	    $data['view_file'] = 'nlf_hps';
	    $this->template->front($data);
	}

	function ssff() {
	    $data['page_title']="Svenska Skärmflygforbundet";
        $this->load->module('template');
	    $data['view_file'] = 'ssff';
	    $this->template->front($data);
	}
	function sff() {
	    $data['page_title']="SFF / Fallskjerm";
        $this->load->module('template');
	    $data['view_file'] = 'sff';
	    $this->template->front($data);
	}

	function styrkeloft() {
	    $data['page_title']="Styrkeløft";
        $this->load->module('template');
	    $data['view_file'] = 'styrkeloft';
	    $this->template->front($data);
	}

	function oppdater() {
		$federation=$this->uri->segment(2);
		$claim_id=$this->uri->segment(3);
		$data['claim_id']=$claim_id;
		$page=Modules::run('api/_get_specific_table_with_pagination',array('title'=>$federation), "id asc","federations","name","","")->row_array();
		$data['page_title']=$page['name'];
		$federation = str_replace("-", "_", $federation);
		$data['new']=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$claim_id), "id asc","claims","*","","")->row();
        $this->load->module('template');
	    $data['view_file'] = $federation;
	    $this->template->front($data);
	}

	function verify_code()
	{
		$code=$this->input->post('code');
		$claim_id=$this->input->post('claim_id');
		$status=TRUE;
        $message="Verified";
		$code=json_decode($code);
		$code=$code[0];
		if(!empty($code))
		{
			$check=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$claim_id,'code'=>$code), "id asc","claims","code","","")->num_rows();
			if($check>0)
			{
				$status=TRUE;
            	$message="Verified";
			}else{
				$status=FALSE;
            	$message="Wrong Verification code";
			}
		}
		else{
            $status=FALSE;
            $message="Please enter verification code";
        }
        $array=array("status"=>$status,"message"=>$message);
        header('Content-Type: application/json');
        echo json_encode($array);
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
		return $data;
	}

	function submit_claim()
	{
		parse_str($_POST['data'], $formdata);
		$data=$this->post_form_data();
		$fed_title=$data['federation'];
		$desired_length = 8; 
		$unique = uniqid();
		$data['code'] = substr($unique, 0, $desired_length);
		if(empty($formdata['claim_id'])){
			$federations=Modules::run('api/get_specific_table_data',array('title'=>$data['federation'],"status"=>"1","del_status"=>"0"),'id',"id","federations",'','')->row();
			$data['federation']=$federations->id;
			$claim_id=Modules::run('api/insert_into_specific_table',$data,"claims");
			$maler=Modules::run('api/get_specific_table_data',array('f_id'=>$data['federation']),'id desc',"subject,email,name","maler",'','')->row_array();
			Modules::run('api/insert_into_specific_table',array("type"=>"3","message"=>"Skjema sendt inn av bruker","claim_id"=>$claim_id,"date_time"=>date('Y-m-d H:i:s')),"logs");
		}else
		{
			$data['federation']=$formdata['federation_id'];
 			$data['claim_stat']="Ikke behandlet";
			$claim_id=$formdata['claim_id'];
			Modules::run('api/insert_or_update',array("id"=>$claim_id),$data,"claims");		
			$maler=Modules::run('api/get_specific_table_data',array('f_id'=>$data['federation']),'id desc',"subject_four as subject,email_four as email,name","maler",'','')->row_array();
			Modules::run('api/insert_into_specific_table',array("type"=>"3","message"=>"Skjema sendt inn av brukeren","claim_id"=>$claim_id,"date_time"=>date('Y-m-d H:i:s')),"logs");
			$federations=Modules::run('api/get_specific_table_data',array('id'=>$data['federation'],"status"=>"1","del_status"=>"0"),'id',"title,id","federations",'','')->row();
			$fed_title=strtolower($federations->title);
		}
		
	    $mail=Modules::run('api/get_specific_table_data',array('f_id'=>$federations->id),'id desc',"username as smtp_username,password as smtp_password,host as smtp_host,port as smtp_port","maler",'','')->row_array();

        if(isset($mail['smtp_port']) && !empty($mail['smtp_username']) && isset($mail['smtp_password']) && !empty($mail['smtp_port']) && isset($mail['smtp_username']) && !empty($mail['smtp_password']) && isset($mail['smtp_host']) && !empty($mail['smtp_host']))
		{
		    $port = $mail['smtp_port'];
            $user = $mail['smtp_username'];
            $pass = $mail['smtp_password'];
			$host = $mail['smtp_host']; 
			$config = Array(
            'protocol' => 'mail',
            'smtp_host' => $host,
            'smtp_port' => $port,
            'smtp_user' =>  $user,
            'smtp_pass' =>  $pass,
            'mailtype'  => 'html', 
            'starttls'  => true,
            'newline'   => "\r\n"
            ); 
		}
		else
		{
		    $mail=Modules::run('api/get_specific_table_data',array('id'=>DEFAULT_OUTLET),'id desc',"smtp_username,smtp_password,smtp_host,smtp_port","outlet",'','')->row_array();
		    $port = $mail['smtp_port'];
            $user = $mail['smtp_username'];
            $pass = $mail['smtp_password'];
			$host = $mail['smtp_host']; 
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
		}      
		$mail_data['claim_id']=$claim_id;
		$mail_data['mail']=$maler;
		$mail_data['name']=$data['a_name'];
		$mail_data['surname']=$data['a_surname'];
		$this->load->library('email');

            $mailtitle="AGS Forsikring AS";
            
            $this->email->initialize($config);
            $this->email->from($user, $maler['name']);
		    $this->email->to($data['a_epost']);
		  //	$this->email->to("yumnasohail04@gmail.com");
			$this->email->subject($maler['subject']." [AGS_".$claim_id."]");
			$message=$this->load->view('mail_format',$mail_data,TRUE);
			$message = str_replace("[name]", $data['a_name']." ".$data['a_surname'], $message);
			$message = str_replace("[reference_id]", $claim_id, $message);
			$message = str_replace("[claim_form_link]", BASE_URL.$fed_title, $message);
            $this->email->message($message);
			$this->email->send();
			
		exit;
	}
	function success_page()
	{
	    $data['page_title']="Skadeskjemaet er sendt inn";
		$data['message_header']="Skadeskjemaet er sendt inn!";
		$data['message_desc']="Skadeskjemaet er sendt inn, og du vil bli kontaktet sa snart vi har behandlet saken.Du skal innen kort tid motta en epost fra oss som bekrefter din melding om skade. Vennligst sjekk om denne er mottatt i din innboks eller som spam. Har du ikke mottatt noen epost fra oss kan dette skyldes at din epost være feil skrevet i skademeldingsskjema";
		$this->load->module('template');
	    $data['view_file'] = 'success_page';
	    $this->template->front($data);
	}

}