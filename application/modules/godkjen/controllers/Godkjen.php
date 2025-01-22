<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Godkjen extends MX_Controller
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
        $data['trans']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('trans_status'=>"pending","trans"=>"0"),"id desc","transaction.claim_id","transaction","transaction.*, SUM(transaction.belop) as belop_sum, insurers.name as insurer_title,federations.name as federation_title,transaction.a_name,claims.damage_date,claims.damage_time,claims.insurance_under","","","","","")->result_array();
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function transaction_status()
    {
        $trans_id=$this->input->post('id');
        $status=$this->input->post('stat');
        Modules::run('api/update_specific_table',array("id"=> $trans_id),array("trans_status"=>$status),"transaction");
    }
    
    function approve()
    {
        $session=$this->session->userdata('route_user_data');
        $trans=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('trans_status'=>"pending","trans"=>"0"),"id desc","","transaction","id,claim_id,belop","","","","","")->result_array();
        foreach($trans as $key => $value){
            $belop= $value['belop'];
            Modules::run('api/insert_into_specific_table',array("claim_id"=>$value['claim_id'],"trans_id"=>$value['id'],"performed_by"=>$session['user_id'],"type"=>"2","message"=>"Godkjente utbetaling -$belop","date_time"=>date('Y-m-d H:i:s')),'logs');
        }
        Modules::run('api/update_specific_table',array("trans_status"=> "pending","trans"=>"0"),array("trans_status"=>"approved","approve_user"=>$session['user_id'],"approve_datetime"=>date('Y-m-d H:i:s')),"transaction");
        redirect(ADMIN_BASE_URL.'godkjen');
    }
    
    function betalingsfil()
    {
        $data['trans']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.id","transaction","transaction.*, SUM(transaction.belop) as belop_sum, insurers.name as insurer_title,federations.name as federation_title,claims.a_name,policy_period.currency,claims.a_surname,claims.damage_date,claims.damage_time,claims.insurance_under,claims.bank_account_no","","","","","")->result_array();
        $data['total']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.trans_status","transaction","SUM(transaction.belop) as belop_sum","","","","","")->row_array();
        $data['insurer']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","insurers.id","transaction","transaction.id,insurers.name as insurer_title,SUM(transaction.belop) as belop_sum","","","","","")->result_array();
        $data['fed_count']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","federations.id","transaction","transaction.id","","","","","")->num_rows();
        $data['claim_count']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.claim_id","transaction","transaction.id","","","","","")->num_rows();
        $data['pay_count']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.id","transaction","transaction.id","","","","","")->num_rows();
        $data['insurer_count']=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","insurers.id","transaction","transaction.id","","","","","")->num_rows();
        $data['view_file'] = 'betalingsfil';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function generate_payment_file()
    {
        $session=$this->session->userdata('route_user_data');
        $trans=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.id","transaction","transaction.id,transaction.claim_id,policy_period.currency, SUM(transaction.belop) as belop_sum,claims.a_name,claims.a_surname,claims.bank_account_no,claims.a_address,claims.a_code,claims.a_phone,insurers.account_no,transaction.addressbook,transaction.message,transaction.kid,transaction.a_name as tname,transaction.a_address as taddress,transaction.a_account as taccount,transaction.a_postalcode as tcode,transaction.a_place as tplace,transaction.payment,transaction.international_currency","","","","","")->result_array();
        $from=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.id","transaction","transaction.dato","","","","","")->row_array();
        $to=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.id","transaction","transaction.dato","","","","","")->row_array();
        $total=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.trans_status","transaction","SUM(transaction.belop) as belop_sum","","","","","")->row_array();
        $fed_count=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","federations.id","transaction","transaction.id","","","","","")->num_rows();
        $claim_count=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.claim_id","transaction","transaction.id","","","","","")->num_rows();
        $pay_count=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","transaction.id","transaction","transaction.id","","","","","")->num_rows();
        $insurer_count=Modules::run('godkjen/get_specific_table_data_where_groupby_claims',array('transaction.trans_status'=>"approved","transaction.trans"=>"0"),"transaction.id desc","insurers.id","transaction","transaction.id","","","","","")->num_rows();
        $paymentid=Modules::run('api/insert_into_specific_table',array("payment_count"=>$pay_count,"performed_by"=>$session['user_id'],"insurer_count"=>$insurer_count,"form_count"=>$fed_count,"claim_count"=>$claim_count,"belop"=>$total['belop_sum'],"period_from"=>$from['dato'],"period_to"=>$to['dato'],"datetime"=>date('Y-m-d H:i:s')),'payment_files');
        foreach($trans as $key => $value)
        {
            if($value['payment']==2)
                $curr=$value['international_currency'];
            else
                $curr=$value['currency'];
            Modules::run('api/insert_into_specific_table',array("claim_id"=>$value['claim_id'],"trans_id"=>$value['id'],"payment_id"=>$paymentid),'payment_detail');
            Modules::run('api/insert_into_specific_table',array("claim_id"=>$value['claim_id'],"trans_id"=>$value['id'],"performed_by"=>$session['user_id'],"type"=>"2","message"=>" Overførte utbetaling (betalingsfil): -".$curr." ".$value['belop_sum'],"date_time"=>date('Y-m-d H:i:s')),'logs');
            Modules::run('api/update_specific_table',array("id"=>$value['id']),array("trans_status"=>"transferred"),"transaction");
        }
        $txt="";
        foreach($trans as $key => $value)
        {
            $acc_no=$value['taccount'];
            $acc_no=str_replace(".", "", $acc_no);
            $insurer_acc_no=$value['account_no'];
            $insurer_acc_no=str_replace(".", "", $insurer_acc_no);
            $amount=$value['belop_sum'];
            $address=$value['taddress'];
            $code=$value['tcode'];
            $place=$value['tplace'];
            $date=date('dmY');
            if($value['payment']==2)
                $currency=$value['international_currency'];
            else
                $currency=$value['currency'];
            $name=$value['tname'];
            $t_id=$value['id'];
            $ags_message=$value['message'];
            $client_message=$value['kid'];
            if(!empty($value['addressbook']) && $value['addressbook']>0)
            {
              $acc=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$value['addressbook']),"id desc","","addressbook","account_no","","","","","")->row_array();
              $acc_no=$acc['account_no'];
            }
            if($currency=="NOK" || $currency=="kr"){
                if(!empty($client_message) && $client_message>0 ){
                     $txt.='"CMNI","'.$insurer_acc_no.'","'.$acc_no.'","'.$amount.'","'.$date.'","'.$currency.'","F","R","","","","","","","","'.$name.'","'.$address.'","'.$code.'","'.$place.'","'.$ags_message.'","","","","'.$client_message.'","","","Money Transferred through AGS ","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","'.$paymentid.'","AT",';
                }else{ 
                     $txt.='"CMNI","'.$insurer_acc_no.'","'.$acc_no.'","'.$amount.'","'.$date.'","'.$currency.'","F","U","","","","","","","","'.$name.'","'.$address.'","'.$code.'","'.$place.'","'.$ags_message.'","","","","","","","Money Transferred through AGS - '.$client_message.' ","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","'.$paymentid.'","AT",';
                }
            }else{
                $txt.='"CMUONO","'.$insurer_acc_no.'","'.$acc_no.'","'.$currency.'","'.$amount.'","'.$currency.'","","1","'.$name.'","'.$address.'","'.$code.'","'.$place.'","","","","","1","Money Transferred through AGS - '.$client_message.'","","","","'.$ags_message.'","","","","","","","","","","","","","","","","","'.$t_id.'","","","","","","","","","","","","DABADKKK","","","DK",';
            }
            $txt.="\n";
            
        }
        // header("Content-Type: text/plain");
        // header("Content-Disposition: attachment; filename=AGS_Danske_Bank_".$paymentid.".txt");
        // header("Cache-Control: must-revalidate");
        // header('Pragma: no-cache');
        // header('Expires: 0');
        // header("Connection: close");
        // $file=fopen('php://output','test');
        // echo $txt;
        Modules::run('api/update_specific_table',array("id"=>$paymentid),array("bank_format"=>$txt),"payment_files");
        echo "<article lang=''><text>".$txt."</text><id>".$paymentid."</id></article>";
    }
    function send_email()
    {
        $session=$this->session->userdata('route_user_data');
        $id=$this->input->post('id');
        $claims=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('payment_id'=>$id),"id desc","","payment_detail","claim_id","","","","","")->result_array();
        $mail=Modules::run('api/get_specific_table_data',array('id'=>DEFAULT_OUTLET),'id desc',"smtp_username,smtp_password,smtp_host,smtp_port","outlet",'','')->row_array();
        $this->load->library('email');
        if(empty($mail)){
            $port = 465;
            $user = "info@ags.hwryk.com";
            $pass = "Dz#Eg.pxdN3s";
			$host = 'ssl://ags.hwryk.com';  
		}else
		{
			$port = $mail['smtp_port'];
            $user = $mail['smtp_username'];
            $pass = $mail['smtp_password'];
			$host = $mail['smtp_host'];  
		}
            $mailtitle="AGS Forsikring AS";
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
            $this->email->initialize($config);
        foreach($claims as $key => $value)
        {
            $mail=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$value['claim_id']),"id desc","","claims","a_epost","","","","","")->row_array();
            Modules::run('api/insert_into_specific_table',array("claim_id"=>$value['claim_id'],"trans_id"=>$value['id'],"performed_by"=>$session['user_id'],"type"=>"3","message"=>"Sendte e-post om overførte utbetalinger","date_time"=>date('Y-m-d H:i:s')),'logs');
            $this->email->from($user, $maler['name']);
		    $this->email->to($mail['a_epost']);
			$this->email->subject($mailtitle." - Betaling overført");
			$message=$this->load->view('mail_format',"",TRUE);
            $this->email->message($message);
			$this->email->send();
        }
        Modules::run('api/update_specific_table',array("id"=> $id),array("mail_sent"=>"1"),"payment_files");
        echo "<article lang=''><text>E-post sendt</text></article>";
    }
    function overview()
    {
        $data['payments']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array(),"id desc","","payment_files","*","","","","","")->result_array();
        $data['view_file'] = 'overview';
        $this->load->module('template');
        $this->template->admin($data);
    }
    function downloadfile()
    {
        $id=$this->input->post('id');
        $text=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('id'=>$id),"id desc","","payment_files","bank_format","","","","","")->row_array();
        // header("Content-Type: text/plain");
        // header("Content-Disposition: attachment; filename=AGS_Danske_Bank_".$id.".txt");
        // header("Cache-Control: must-revalidate");
        // header('Pragma: no-cache');
        // header('Expires: 0');
        // header("Connection: close");
        // $file=fopen('php://output','test');
         echo "<article lang=''><text>".$text['bank_format']."</text></article>";
    }

    function get_specific_table_data_where_groupby_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having){
        $this->load->model('mdl_godkjen');
        $query = $this->mdl_godkjen->get_specific_table_data_where_groupby_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having='');
        return $query;
    }
 




}