<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//include_once APPPATH . 'modules/outlet/controllers/outlet.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// // Include PHPMailer files
// require_once APPPATH . 'third_party\PHPMailer\src\Exception.php';
// require_once APPPATH . 'third_party\PHPMailer\src\PHPMailer.php';
// require_once APPPATH . 'third_party\PHPMailer\src\SMTP.php';


class Api extends MX_Controller {

    protected $data = '';

    function __construct() {
        $this->lang->load('english', 'english');
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        // $this->db2 = $this->load->database('old_db', TRUE);
    }

    function mailerFunction(){
        // $mail_dta=Modules::run('api/get_specific_table_data',array('f_id'=>7),'id desc',"username as smtp_username,password as smtp_password,host as smtp_host,port as smtp_port","maler",'','')->row_array();
        // $mail = new PHPMailer(true);

        // try {
        //     if(empty($mail_dta)){
        //         $mail_Out=Modules::run('api/get_specific_table_data',array('id'=>DEFAULT_OUTLET),'id desc',"smtp_username,smtp_password,smtp_host,smtp_port","outlet",'','')->row_array();
        //         $port = $mail_Out['smtp_port'];
        //         $user = $mail_Out['smtp_username'];
        //         $pass = $mail_Out['smtp_password'];
        //         $host = $mail_Out['smtp_host']; 
        //         //Server settings
        //         $mail->isSMTP();
        //         $mail->Host = $host;  // Your SMTP host
        //         $mail->SMTPAuth = true;
        //         $mail->Username = $user;// Your SMTP username
        //         $mail->Password = $pass; // Your SMTP password
        //         $mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `ssl` also accepted
        //         $mail->Port = $port; // TCP port to connect to
        //         $mail->SMTPDebug = 3; // Enable SMTP debugging
        //         $mail->Debugoutput = 'html'; // Show debug output in HTML
        //     }else{
        //         $port = $mail_dta['smtp_port'];
        //         $user = $mail_dta['smtp_username'];
        //         $pass = $mail_dta['smtp_password'];
        //         $host = $mail_dta['smtp_host'];
        //         $mail->isSMTP();
        //         $mail->Host = $host; // Your SMTP host
        //         $mail->SMTPAuth = true;
        //         $mail->Username = $user; // Your SMTP username
        //         $mail->Password = $pass; // Your SMTP password
        //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
        //         $mail->Port = $port; // TCP port to connect to
        //         $mail->SMTPDebug = 3; // Enable SMTP debugging
        //         $mail->Debugoutput = 'html'; // Show debug output in HTML

        //     }


        //     //Recipients
        //     $mail->setFrom($user, "test");
        //     $mail->addAddress('yumnasohail04@gmail.com');

        //     //Content
        //     $mail->isHTML(true); // Set email format to HTML
        //     $mail->Subject = 'Email Test';
        //     $mail->Body    = 'Testing PHPMailer with CodeIgniter.';

        //     if(!$mail->send()) {
        //         echo 'Message could not be sent.';
        //         echo 'Mailer Error: ' . $mail->ErrorInfo;
        //     } else {
        //         echo 'Message has been sent';
        //     }
        // } catch (Exception $e) {
        //     echo "Failed to send the email. Mailer Error: {$mail->ErrorInfo}";
        // }



         $mail=Modules::run('api/get_specific_table_data',array('f_id'=>7),'id desc',"username as smtp_username,password as smtp_password,host as smtp_host,port as smtp_port","maler",'','')->row_array();
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
             'protocol' => 'mail',
             'smtp_host' => $host,
             'smtp_port' => $port,
             'smtp_user' =>  $user,
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
                
                    $this->email->initialize($config);
                    $this->email->from($user, "test");
                	$this->email->to("yumnasohail04@gmail.com");
                    $this->email->subject("test mail");
                    $this->email->message("Test message");
                    if ($this->email->send()) {
                        echo 'Email sent successfully';
                    } else {
                        echo 'Failed to send the email.';
                        echo $this->email->print_debugger();  // Debugging: Outputs errors
                    }
    }

    function sanction_check_test(){
        $name="ASV Assistance";
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
            //CURLOPT_CAINFO => 'D:\wamp64\www\agsNew\cacert.pem', 
             CURLOPT_CAINFO => $_SERVER['DOCUMENT_ROOT'] . '/cacert.pem', 
          ));

  
        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        curl_close($curl);
        print_r($result);exit;
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
    
    
    public function settlemet_cron_job(){
        $this->load->library('email');
        $port = 465;
        $user = "reminder@agsasa.com";
        $pass = "isaF3nAv-OaA";
        $host = 'ssl://mail.agsasa.com';  
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
        $mailtitle="AGS Forsikring AS";
         
        $this->email->initialize($config);
        $this->email->from($user, "AGS Forsikring AS");
    	$this->email->to("lpm@agsforsikring.no");
        $this->email->subject("Reminder Email");
        $this->email->message("Remember to send out settlemet (avregning) request to all Sport clients");
        $this->email->send();
    } 
    
    public function cron_job(){
        $this->load->library('email');
        $port = 465;
        $user = "reminder@agsasa.com";
        $pass = "isaF3nAv-OaA";
        $host = 'ssl://mail.agsasa.com';  
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
        $mailtitle="AGS Forsikring AS";
         
        $this->email->initialize($config);
        $this->email->from($user, "AGS Forsikring AS");
    	$this->email->to("lpm@agsforsikring.no");
        $this->email->subject("Reminder Email");
        $this->email->message("Remember to include RIB (RP) for all clients in Paid April Bdx renewing into this year-se Slip first");
        $this->email->send();
    }
    
    // function set_period_id()
    // {
    //     $this->db2->where("form_id!=","1");
    //     $this->db2->where("form_id!=","101");
    //     $case=$this->db2->get('claim_handling')->result_array();
    //     foreach($case as $key => $value)
    //     {
    //             $data['claim_id']=$value['reference_id'];
    //             $data['period_id']=0;
    //             if(!empty($value['policy_period_id']) || $value['policy_period_id']!=0 ){
    //                $period_id=$value['policy_period_id'];
    //                 $this->db2->where("policy_period_id",$period_id);
    //                 $p_old=$this->db2->get('policy_periods')->row();
    //                 if(!empty($p_old->policy_period_reference_id))
    //                     $result= Modules::run('api/_get_specific_table_with_pagination',array("start_date"=>$p_old->policy_period_datestart,"end_date"=>$p_old->policy_period_dateend,"contract_id"=>$p_old->contract_id_sportscover,"ags_policy_no"=>$p_old->policy_period_reference_id),"id desc","policy_period","id","","")->row();
    //                 else
    //                     $result= Modules::run('api/_get_specific_table_with_pagination',array("start_date"=>$p_old->policy_period_datestart,"end_date"=>$p_old->policy_period_dateend,"contract_id"=>$p_old->contract_id_sportscover),"id desc","policy_period","id","","")->row();
    //                 $data['period_id']=$result->id; 
    //                 if(!empty($data['period_id']))
    //                 $this->update_specific_table(array("claim_id"=>$data['claim_id']),array("period_id"=>$data['period_id']),"process_claim");
    //             }
    //     }   
        
    
    // }
    function encryptor($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'groc';
        $secret_iv = 'groc123';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    
    // function payments_declined()
    // {
    //     $this->db2->where("form_id!=","1");
    //     $this->db2->where("form_id!=","101");
    //     $case=$this->db2->get('transactions')->result_array();
    //     foreach($case as $key => $value)
    //     {
    //         $id=$value['transaction_id'];
    //         $trans_status=$value['payment_status'];
    //         if($trans_status=="DELETED" || $trans_status=="DECLINED"  || $trans_status=="HOLD")
    //         {
    //             $trans=$this->_get_specific_table_with_pagination(array("id"=>$id),"id","transaction","*",'','')->row_array();
    //             if(!empty($trans))
    //             {
    //                  $this->insert_or_update(array("id"=>$id),array("trans_status"=>"declined"),"transaction");
    //             }

    //         }
           
    //     }
    // }
    
       function claim_zeros()
    {
        $res= Modules::run('api/_get_specific_table_with_pagination',array("total"=>"0"),"id desc","process_claim","claim_id","","")->result_array();
        foreach($res as $key => $value)
        {
                $med=$inv=0;
                $case= $this->get_specific_table_with_pagination_where_groupby(array("claim_id"=>$value['claim_id']), "id desc","coverage_cat,trans","transaction","sum(belop) as belop,trans,coverage_cat,dato,time","","","","","")->result_array();
                foreach($case as $keys => $val)
                {
                    if($val['coverage_cat']=="1" && $val['trans']=="1")
                    {
                        $med=$med+$val['belop'];
                    }else if($val['coverage_cat']=="1" && $val['trans']=="0")
                    {
                         $med=$med-$val['belop'];
                    }
                    else if($val['coverage_cat']=="4" && $val['trans']=="0")
                    {
                        $inv=$inv-$val['belop'];
                    }
                    else if($val['coverage_cat']=="4" && $val['trans']=="1")
                    {
                        $inv=$inv+$val['belop'];
                    }


                }
                    $arr_attribute['claim_id']=$value['claim_id'];
                    $arr_attribute['dato']=$val['dato'];
                    $arr_attribute['time']=$val['time'];
                    $arr_attribute['user']=13;
                    $arr_attribute['trans']=1;
                    if($med>0)
                    {
                        $arr_attribute['belop']="-".$med;
                        $arr_attribute['type']="Reservasjon[m]";
                        $arr_attribute['coverage_cat']="1";
                    } 
                    else if($inv>0)
                    {
                        $arr_attribute['belop']="-".$inv;
                        $arr_attribute['type']="Reservasjon[i]";
                        $arr_attribute['coverage_cat']="4";
                    }
                    Modules::run('api/insert_into_specific_table',$arr_attribute,'transaction');
            
        }
        

    }
    //  function multi1()
    // {
    //     $this->db2->where("form_id","102");
    //     $trans=$this->db2->get('reference_ids')->result_array();
    //     foreach($trans as $keys => $val)
    //     {
         
    //         $this->db2->where("reference_id",$val['reference_id']);
    //         $value=$this->db2->get('form_entries_multi1')->row_array();
    //         $data['federation']="8";
    //          $split = explode(" ",$value['skade_dato']);
    //          $date = $split[0];
    //          $time = $split[1];
    //         if(isset($value['reference_id']) && !empty($value['reference_id']))
    //             $data['id']=$value['reference_id'];
                
    //         if(isset($value['klubb_navn']) && !empty($value['klubb_navn']))
    //             $data['c_name']=$value['klubb_navn'];
                
    //         if(isset($value['klubb_kontaktperson']) && !empty($value['klubb_kontaktperson']))
    //             $data['c_contact']=$value['klubb_kontaktperson'];
                
    //         if(isset($value['klubb_adresse']) && !empty($value['klubb_adresse']))
    //             $data['c_address']=$value['klubb_adresse'];
                
    //         if(isset($value['klubb_postnr']) && !empty($value['klubb_postnr']))
    //             $data['c_code']=$value['klubb_postnr'];
                
    //         if(isset($value['klubb_poststed']) && !empty($value['klubb_poststed']))
    //             $data['c_phone']=$value['klubb_poststed'];
                
    //         if(isset($value['klubb_krets']) && !empty($value['klubb_krets']))
    //             $data['circuit']=$value['klubb_krets'];
                
    //         if(isset($value['spiller_fornavn']) && !empty($value['spiller_fornavn']))
    //             $data['a_name']=$value['spiller_fornavn'];
                
    //         if(isset($value['spiller_lisens']) && !empty($value['spiller_lisens']))
    //             $data['license']=$value['spiller_lisens'];
                
    //         if(isset($value['spiller_fodselsnr']) && !empty($value['spiller_fodselsnr']))
    //             $data['a_birth']=$value['spiller_fodselsnr'];
                
    //         if(isset($value['spiller_etternavn']) && !empty($value['spiller_etternavn']))
    //             $data['a_surname']=$value['spiller_etternavn'];
                
    //         // if(isset($value['reference_id']) && !empty($value['reference_id']))
    //         //     $data['a_member_no']=$value['reference_id'];
                
    //         if(isset($value['spiller_idrettsnr']) && !empty($value['spiller_idrettsnr']))
    //             $data['a_sportsno']=$value['spiller_idrettsnr'];
                
    //         if(isset($value['spiller_adresse']) && !empty($value['spiller_adresse']))
    //             $data['a_address']=$value['spiller_adresse'];
                
    //         if(isset($value['spiller_postnr']) && !empty($value['spiller_postnr']))
    //             $data['a_code']=$value['spiller_postnr'];
                
    //         if(isset($value['spiller_poststed']) && !empty($value['spiller_poststed']))
    //             $data['a_phone']=$value['spiller_poststed'];
                
    //         if(isset($value['spiller_foresatt_navn']) && !empty($value['spiller_foresatt_navn']))
    //             $data['a_guardian']=$value['spiller_foresatt_navn'];
                
    //         if(isset($value['spiller_telefon']) && !empty($value['spiller_telefon']))
    //             $data['a_telephone']=$value['spiller_telefon'];
                
    //         if(isset($value['spiller_epost']) && !empty($value['spiller_epost']))
    //             $data['a_epost']=$value['spiller_epost'];
                
    //         if(isset($value['spiller_mobiltelefon']) && !empty($value['spiller_mobiltelefon']))
    //             $data['a_mobile_tel']=$value['spiller_mobiltelefon'];
                
    //         if(isset($value['skade_hvordan']) && !empty($value['skade_hvordan']))
    //             $data['injury_reason']=$value['skade_hvordan'];
                
    //         if($data['federation']=="6")    
    //             if(isset($value['skade_meldtnlf']) && !empty($value['skade_meldtnlf']))
    //                 $data['sento_nlf_hps']=$value['skade_meldtnlf'];
            
    //         if($data['federation']=="7")
    //             if(isset($value['skade_meldtnlf']) && !empty($value['skade_meldtnlf']))
    //                 $data['sentto_shf']=$value['skade_meldtnlf'];
                
    //         if(isset($value['skade_beskrivelse']) && !empty($value['skade_beskrivelse']))
    //             $data['damage_desc']=$value['skade_beskrivelse'];
                
    //         if(isset($value['skade_skadested']) && !empty($value['skade_skadested']))
    //             $data['damage_part']=$value['skade_skadested'];
                
    //         if(isset($value['	skade_hoppfelt']) && !empty($value['	skade_hoppfelt']))
    //             $data['jumping_feild']=$value['	skade_hoppfelt'];
                
    //         if(isset($value['valgt_idrett']) && !empty($value['valgt_idrett']))
    //             $data['sport']=$value['valgt_idrett'];
                
    //         if(isset($value['skade_naar']) && !empty($value['skade_naar']))
    //             $data['place_of_damage']=$value['skade_naar'];
                
    //         if(isset($value['skade_hvor']) && !empty($value['skade_hvor']))
    //             $data['where_acc_occur']=$value['skade_hvor'];
                
    //         if(isset($value['skade_sesong']) && !empty($value['skade_sesong']))
    //             $data['season']=$value['skade_sesong'];
                
    //             $data['damage_date']=$date;
    //             $data['damage_time']=$time;
                
    //         if(isset($value['skade_underlag']) && !empty($value['skade_underlag']))
    //             $data['basis']=$value['skade_underlag'];
                
    //         if(isset($value['skade_kamptrening']) && !empty($value['skade_kamptrening']))
    //             $data['match_with']=$value['skade_kamptrening'];
                
    //         if(isset($value['skade_leggbeskyttere']) && !empty($value['skade_leggbeskyttere']))
    //             $data['leg_protector_used']=$value['skade_leggbeskyttere'];
                
    //         if(isset($value['forsikring_under']) && !empty($value['forsikring_under']))
    //             $data['insurance_under']=$value['forsikring_under'];
                
    //         if(isset($value['forsirking_utbetales']) && !empty($value['forsirking_utbetales']))
    //             $data['claim_paidto']=$value['forsirking_utbetales'];
                
    //         if(isset($value['forsikring_kontonr']) && !empty($value['forsikring_kontonr']))
    //             $data['bank_account_no']=$value['forsikring_kontonr'];
                
    //         if(isset($value['forsikring_kontonr_bic']) && !empty($value['forsikring_kontonr_bic']))
    //             $data['bic_code']=$value['forsikring_kontonr_bic'];
                
    //         if(isset($value['forsikring_annen']) && !empty($value['forsikring_annen']))
    //         {
    //             if($value['forsikring_annen']=="0")
    //             $data['other_insurance']="Ikke ulykkesforsikret ved annen forsikring";
    //             else
    //             $data['other_insurance']="Ulykkesforsikret ogs책 ved annen forsikring";
    //         }
                
    //             $data['permission']="Ja";
    //             $data['self']="Jai";
                
    //         if(isset($value['entry_lastusersubmit']) && !empty($value['entry_lastusersubmit']))
    //             $data['claim_datetime']=$value['entry_lastusersubmit'];
    //             $data['status']="1";
    //             $data['del_status']="0";
    //             if($value['entry_status_code']=="1")
    //                 $data['claim_stat']="Godkjent";
    //             else if($value['entry_status_code']=="20")
    //                 $data['claim_stat']="Avsl책tt";
    //             else if($value['entry_status_code']=="25")
    //                 $data['claim_stat']="Avsl책tt, Avventer";
    //             else if($value['entry_status_code']=="30" || $value['entry_status_code']=="31")
    //                 $data['claim_stat']="Ikke behandlet";
    //             else if($value['entry_status_code']=="26")
    //                 $data['claim_stat']="Avsluttet";
    //             else
    //                 $data['claim_stat']="Ikke behandlet";
    //             $this->insert_into_specific_table($data,"claims");
            
    //     }

    // }
 
    
      function all_claims(){
        // $case=$this->db2->get('form_entries_skiforbundet')->result_array();
        foreach($case as $key => $value)
        {
            
            $data['federation']="14";
             $split = explode(" ",$value['skade_dato']);
             $date = $split[0];
             $time = $split[1];
            if(isset($value['reference_id']) && !empty($value['reference_id']))
                $data['id']=$value['reference_id'];
                
            if(isset($value['klubb_navn']) && !empty($value['klubb_navn']))
                $data['c_name']=$value['klubb_navn'];
                
            if(isset($value['klubb_kontaktperson']) && !empty($value['klubb_kontaktperson']))
                $data['c_contact']=$value['klubb_kontaktperson'];
                
            if(isset($value['klubb_adresse']) && !empty($value['klubb_adresse']))
                $data['c_address']=$value['klubb_adresse'];
                
            if(isset($value['klubb_postnr']) && !empty($value['klubb_postnr']))
                $data['c_code']=$value['klubb_postnr'];
                
            if(isset($value['klubb_poststed']) && !empty($value['klubb_poststed']))
                $data['c_phone']=$value['klubb_poststed'];
                
            if(isset($value['klubb_krets']) && !empty($value['klubb_krets']))
                $data['circuit']=$value['klubb_krets'];
                
            if(isset($value['spiller_fornavn']) && !empty($value['spiller_fornavn']))
                $data['a_name']=$value['spiller_fornavn'];
                
            if(isset($value['spiller_lisens']) && !empty($value['spiller_lisens']))
                $data['license']=$value['spiller_lisens'];
                
            if(isset($value['spiller_fodselsnr']) && !empty($value['spiller_fodselsnr']))
                $data['a_birth']=$value['spiller_fodselsnr'];
                
            if(isset($value['spiller_etternavn']) && !empty($value['spiller_etternavn']))
                $data['a_surname']=$value['spiller_etternavn'];
                
            // if(isset($value['reference_id']) && !empty($value['reference_id']))
            //     $data['a_member_no']=$value['reference_id'];
                
            if(isset($value['spiller_idrettsnr']) && !empty($value['spiller_idrettsnr']))
                $data['a_sportsno']=$value['spiller_idrettsnr'];
                
            if(isset($value['spiller_adresse']) && !empty($value['spiller_adresse']))
                $data['a_address']=$value['spiller_adresse'];
                
            if(isset($value['spiller_postnr']) && !empty($value['spiller_postnr']))
                $data['a_code']=$value['spiller_postnr'];
                
            if(isset($value['spiller_poststed']) && !empty($value['spiller_poststed']))
                $data['a_phone']=$value['spiller_poststed'];
                
            if(isset($value['spiller_foresatt_navn']) && !empty($value['spiller_foresatt_navn']))
                $data['a_guardian']=$value['spiller_foresatt_navn'];
                
            if(isset($value['spiller_telefon']) && !empty($value['spiller_telefon']))
                $data['a_telephone']=$value['spiller_telefon'];
                
            if(isset($value['spiller_epost']) && !empty($value['spiller_epost']))
                $data['a_epost']=$value['spiller_epost'];
                
            if(isset($value['spiller_mobiltelefon']) && !empty($value['spiller_mobiltelefon']))
                $data['a_mobile_tel']=$value['spiller_mobiltelefon'];
                
            if(isset($value['skade_hvordan']) && !empty($value['skade_hvordan']))
                $data['injury_reason']=$value['skade_hvordan'];
                
            if($data['federation']=="6")    
                if(isset($value['skade_meldtnlf']) && !empty($value['skade_meldtnlf']))
                    $data['sento_nlf_hps']=$value['skade_meldtnlf'];
            
            if($data['federation']=="7")
                if(isset($value['skade_meldtnlf']) && !empty($value['skade_meldtnlf']))
                    $data['sentto_shf']=$value['skade_meldtnlf'];
                
            if(isset($value['skade_beskrivelse']) && !empty($value['skade_beskrivelse']))
                $data['damage_desc']=$value['skade_beskrivelse'];
                
            if(isset($value['skade_skadested']) && !empty($value['skade_skadested']))
                $data['damage_part']=$value['skade_skadested'];
                
            if(isset($value['	skade_hoppfelt']) && !empty($value['	skade_hoppfelt']))
                $data['jumping_feild']=$value['	skade_hoppfelt'];
                
            if(isset($value['valgt_idrett']) && !empty($value['valgt_idrett']))
                $data['sport']=$value['valgt_idrett'];
                
            if(isset($value['skade_naar']) && !empty($value['skade_naar']))
                $data['place_of_damage']=$value['skade_naar'];
                
            if(isset($value['skade_hvor']) && !empty($value['skade_hvor']))
                $data['where_acc_occur']=$value['skade_hvor'];
                
            if(isset($value['skade_sesong']) && !empty($value['skade_sesong']))
                $data['season']=$value['skade_sesong'];
                
                $data['damage_date']=$date;
                $data['damage_time']=$time;
                
            if(isset($value['skade_underlag']) && !empty($value['skade_underlag']))
                $data['basis']=$value['skade_underlag'];
                
            if(isset($value['skade_kamptrening']) && !empty($value['skade_kamptrening']))
                $data['match_with']=$value['skade_kamptrening'];
                
            if(isset($value['skade_leggbeskyttere']) && !empty($value['skade_leggbeskyttere']))
                $data['leg_protector_used']=$value['skade_leggbeskyttere'];
                
            if(isset($value['forsikring_under']) && !empty($value['forsikring_under']))
                $data['insurance_under']=$value['forsikring_under'];
                
            if(isset($value['forsirking_utbetales']) && !empty($value['forsirking_utbetales']))
                $data['claim_paidto']=$value['forsirking_utbetales'];
                
            if(isset($value['forsikring_kontonr']) && !empty($value['forsikring_kontonr']))
                $data['bank_account_no']=$value['forsikring_kontonr'];
                
            if(isset($value['forsikring_kontonr_bic']) && !empty($value['forsikring_kontonr_bic']))
                $data['bic_code']=$value['forsikring_kontonr_bic'];
                
            if(isset($value['forsikring_annen']) && !empty($value['forsikring_annen']))
            {
                if($value['forsikring_annen']=="0")
                $data['other_insurance']="Ikke ulykkesforsikret ved annen forsikring";
                else
                $data['other_insurance']="Ulykkesforsikret ogs책 ved annen forsikring";
            }
                
                $data['permission']="Ja";
                $data['self']="Jai";
                
            if(isset($value['entry_lastusersubmit']) && !empty($value['entry_lastusersubmit']))
                $data['claim_datetime']=$value['entry_lastusersubmit'];
                $data['status']="1";
                $data['del_status']="0";
                if($value['entry_status_code']=="1")
                    $data['claim_stat']="Godkjent";
                else if($value['entry_status_code']=="20")
                    $data['claim_stat']="Avsl책tt";
                else if($value['entry_status_code']=="25")
                    $data['claim_stat']="Avsl책tt, Avventer";
                else if($value['entry_status_code']=="30" || $value['entry_status_code']=="31")
                    $data['claim_stat']="Ikke behandlet";
                else if($value['entry_status_code']=="26")
                    $data['claim_stat']="Avsluttet";
                else
                    $data['claim_stat']="Ikke behandlet";
                $this->insert_into_specific_table($data,"claims");
        }	
    }
    
    //  function payment_files()
    // {
    //     $this->db2->where("form_id!=","1");
    //     $this->db2->where("form_id!=","101");
    //     $case=$this->db2->get('transactions')->result_array();
    //     foreach($case as $key => $value)
    //     {
    //         $data['claim_count']=$value['number_of_claims'];
    //         $data['form_count']=$value['number_of_forms'];
    //         $data['insurer_count']=$value['number_of_insurers'];
    //         $data['payment_count']=$value['number_of_transactions'];
    //         $data['belop']=$value['amount_total'];
    //         $data['period_from']=$value['date_added_firsttransaction'];
    //         $data['period_to']=$value['date_added_lasttransaction'];
    //         $data['datetime']=$value['date_generated'];
    //         $data['performed_by']="1";
    //         $data['mail_sent']=$value['mails_sent'];
    //         $this->insert_into_specific_table($data,"payment_files");
    //     }
    // }
    
    
    function table_list()
    {
        $tables=$this->db->list_tables();
        foreach($tables as $key=>$value)
        {
            $columns=$this->db->list_fields($value);
            foreach($columns as $k =>$val)
            {
                $primary = $this->db->query("SHOW KEYS FROM $value WHERE Key_name = 'PRIMARY'")->result_array();
                $primary[0]['Column_name'] = (isset($primary[0]['Column_name']) && !empty($primary[0]['Column_name']) ? $primary[0]['Column_name'] : ''); 
                if($primary[0]['Column_name'] != $val)
                {   
                    if($val!="range" && $val !="right"){
                    $type = $this->db->query("SHOW FIELDS FROM $value where Field ='$val'")->result_array();
                    if($type[0]['Default']==""){
                        $type = $type[0]['Type'];
                        $this->db->query("ALTER TABLE $value MODIFY $val $type  NULL");
                    }
                    }
                //  $this->db->set($val, null);
                // $this->db->update($value);
                }
            }
        }
    }
    function image_path_with_default($image_path,$image_name,$default_path,$default_name) {
        $path= $default_path.$default_name;
        if(isset($image_name) && !empty($image_name)) {
            $mystring = 'abc';
            $findme   = 'https://';
            $findme2   = 'http://';
            $pos = strpos($image_name, $findme);
            $pos2 = strpos($image_name, $findme2);
            if (is_numeric($pos) || is_numeric($pos2)){
                if(file_exists($image_name))
                    $path = $image_name;
            }
            else
              if(file_exists($image_path.$image_name))
                $path = $image_path.$image_name;
        }
        $path=BASE_URL.$path;
        $path= str_replace(BASE_URL.BASE_URL, BASE_URL, $path);
        $path= str_replace(BASE_URL.BASE_URL.BASE_URL, BASE_URL, $path);
        return $path;
    }
    function upload_dynamic_image($actual,$large,$medium,$small,$nId,$input_name,$image_field,$image_id_fild,$table) {
        $upload_image_file = $_FILES[$input_name]['name'];
        $extension = pathinfo($upload_image_file, PATHINFO_EXTENSION);
        $upload_image_file = str_replace(' ', '_', $upload_image_file);
        $upload_image_file = str_replace($extension, '', $upload_image_file);
        $upload_image_file = str_replace('.', '_', $upload_image_file);
        $file_name = 'custom_image_'.substr(md5(uniqid(rand(), true)), 8, 8). $nId . '_' . $upload_image_file;
        $file_name = strtolower(str_replace(['  ', '/','-','--','---','----', '_', '__'], '-',$file_name));
        $file_name = $file_name.'.'.$extension;
        $config['upload_path'] = $actual;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|PDF|pdf';
        $config['max_size'] = '2000000000000';
        $config['max_width'] = '2000000000000000';
        $config['max_height'] = '200000000000000';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (isset($_FILES[$input_name])) {
            $this->upload->do_upload($input_name);
        }
        $upload_data = $this->upload->data();

        /////////////// Large Image ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 500;
        $config['height'] = 400;
        $config['new_image'] = $large;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        /////////////  Medium Size /////////////////// 
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 300;
        $config['height'] = 200;
        $config['new_image'] = $medium;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        ////////////////////// Small Size ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 100;
        $config['height'] = 100;
        $config['new_image'] =$small;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        unset($data);unset($where);
        $data = array($image_field => $file_name);
        $where[$image_id_fild] = $nId;
        $this->insert_or_update_specific_image($where,$data,$table,$table.$image_id_fild);
    }
    function delete_images_by_name($actual_path,$large_path,$medium_path,$small_pathm,$name) {
        if (file_exists($actual_path.$name))
            unlink($actual_path.$name);
        if (file_exists($large_path.$name))
            unlink($large_path.$name);
        if (file_exists($medium_path.$name))
            unlink($medium_path.$name);
        if (file_exists($small_pathm.$name))
            unlink($small_pathm.$name);
    }

    function string_length($first,$limit,$default_text,$second) {
        if(!isset($default_text))
            $default_text="";
        if(!isset($first))
            $first="";
        if(!isset($second))
            $second="";
        $string=$default_text;
        if(!empty($first))
            $string=$first;
        if(!empty($second))
            $string=$first." ".$second;
        if(strlen($string) > $limit)
            $string= substr($string,0,$limit)."...";
        return $string;
    }

    function get_session_fields($session_name,$field){
        $return_field="";
        if(isset($this->session->userdata[$session_name][$field]) && !empty($this->session->userdata[$session_name][$field]))
            $return_field=$this->session->userdata[$session_name][$field];
        return $return_field;
    }
    function insert_or_delete($where,$data,$table){
        $this->load->model('mdl_api');
        return $this->load->mdl_api->insert_or_delete($where,$data,$table);

    }
    function insert_or_update($where,$data,$table){
        $this->load->model('mdl_api');
        return $this->load->mdl_api->insert_or_update($where,$data,$table);
    }
    function insert_into_specific_table($data,$table){
        $this->load->model('mdl_api');
        return $this->load->mdl_api->_insert_into_specific_table($data,$table);
    }
    function delete_from_specific_table($where,$table) {
        $this->load->model('mdl_api');
        return $this->load->mdl_api->delete_from_specific_table($where,$table);

    }
    function insert_or_update_specific_image($where,$data,$table,$index){
        $this->load->model('mdl_api');
        return $this->mdl_api->insert_or_update_specific_image($where,$data,$table,$index);
    }
    function update_specific_table($where,$data,$table){
        $this->load->model('mdl_api');
        return $this->mdl_api->update_specific_table($where,$data,$table);
    }
    function _get_specific_table_with_pagination($cols, $order_by,$table,$select,$page_number,$limit){
        $this->load->model('mdl_api');
        $query = $this->mdl_api->_get_specific_table_with_pagination($cols, $order_by,$table,$select,$page_number,$limit);
        return $query;
    }
    function get_specific_table_data($where,$order,$select,$table_name,$page_number,$limit) {
        $this->load->model('mdl_api');
        return $this->mdl_api->get_specific_table_data($where,$order,$select,$table_name,$page_number,$limit);
    }
    function get_specific_table_with_pagination_where_groupby($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having){
            $this->load->model('mdl_api');
        $query = $this->mdl_api->get_specific_table_with_pagination_where_groupby($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having='');
        return $query;
    }
 
}