<?php 
/*************************************************
Created By: Imran Haider
Dated: 01-01-2014
version: 1.0
*************************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller{

	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
	}

	function index(){
		$data['tot']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array(),"id desc","","claims","id","","","","","")->num_rows();
		$data['pending']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_stat"=>"Avslått, Avventer"),"id desc","","claims","id","","","","","")->num_rows();
		$data['pendings']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_stat"=>"Ikke behandlet"),"id desc","","claims","id","","","","","")->num_rows();
		$data['approved']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('claim_stat'=>"Godkjent"),"id desc","","claims","id","","","","","")->num_rows();
        $data['finished']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('claim_stat'=>"Avsluttet"),"id desc","","claims","id","","","","","")->num_rows();
        $data['rejected']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array('claim_stat'=>"Avvist"),"id desc","","claims","id","","","","","")->num_rows();
		$data['fd']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array(),"id asc","","federations","id,name,icon,title","","","","","")->result_array();
		$data['fd']=Modules::run('api/get_specific_table_with_pagination_where_groupby',array(),"id asc","","federations","id,name,icon,title","","","","","")->result_array();
		for($a=0;$a<7;$a++)
		{
			$date=date("Y-m-d", strtotime(date("Y-m-d") . "-".$a." days"));
			$graph['count'][]=Modules::run('api/get_specific_table_with_pagination_where_groupby',array("claim_datetime >= "=>$date." 00:00:00","claim_datetime <= "=>$date." 23:59:59"),"id asc","","claims","id","","","","","")->num_rows();
			$graph['date'][]=$date;
		}
		$data['graph']=$graph;
		$data['view_file'] = 'home';
		$this->load->module('template');
		$this->template->admin($data);
	} 
		function searchIncome()
	{
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		$data = array();
		$colums = array(array('title'=>"serial #","data"=>"serialNo"),array('title'=>"Federation Name","data"=>"federationName"),array('title'=>"Policy Name","data"=>"policyName"));
		if (!empty($startDate) && $this->validateDate($startDate, "Y") && !empty($endDate) && $this->validateDate($endDate, "Y")) {
			$tempStart = ($startDate <= $endDate ? $startDate : $endDate);
			$endDate = ($endDate >= $startDate ? $endDate : $startDate);
			$startDate = $tempStart;
			$federation = $this->getPremiumsFederation(array(), "premiums.id desc", "premiums.federation_id", "premiums.id as preId,premiums.federation_id as federationId,federations.name as federationName", "1", "0", "(premiums.dato BETWEEN '".$startDate."-01-01' AND '".$endDate."-12-31')", "", "")->result_array();
			if(!empty($federation)) {
				$counter = 1;
				foreach($federation as $item):
					if(isset($item["federationId"]) && !empty($item["federationId"])) {
						$policies = $this->getPremiumPolicies(array("premiums.federation_id"=>$item["federationId"]), "policies.name asc", "policies.id", "policies.id as policyId, policies.name as policyName,policies.policy_title as policyTitle", "1", "0", "(premiums.dato BETWEEN '".$startDate."-01-01' AND '".$endDate."-12-31')", "", "")->result_array();
						if(!empty($policies)) {
							foreach($policies as $po):
								$begin = new DateTime($startDate . "-01-01");
								$end   = new DateTime($endDate . "-01-01");
								if(isset($po["policyId"] ) && !empty($po["policyId"] )) {
									$currentRow = array("serialNo"=>$counter, "federationName"=> ($item["federationName"] ?? ""), "policyName"=>($po["policyName"] ?? ""));
									$totalAmount = 0;
									for ($i = $begin; $i <= $end; $i->modify('+1 year')) {
										$amount = $this->getPremiumPolicies(array("premiums.federation_id"=>$item["federationId"],"policies.id"=>$po["policyId"]), "premiums.id asc", "premiums.id", "sum(paid) as amount", "1", "1", "(premiums.dato BETWEEN '".$i->format('Y')."-01-01' AND '".$i->format('Y')."-12-31')", "", "")->row_array();
										$amount = (isset($amount["amount"]) && !empty($amount["amount"]) ? $amount["amount"] : 0);
										$currentRow[$i->format('Y')] = $amount;
										$totalAmount += $amount;
									}
									if($totalAmount > 0) {
										$currentRow["totalAmount"] = $totalAmount;
										$data[] = $currentRow;
										$counter++;
									}
								}
							endforeach;
						}
					}
				endforeach;
			}
			$begin = new DateTime($startDate . "-01-01");
			$end   = new DateTime($endDate . "-01-01");
			for ($i = $begin; $i <= $end; $i->modify('+1 year')) {
				$colums[] = array('title'=>$i->format('Y'),"data"=>$i->format('Y'));
			}
		}
		$colums[] = array('title'=>"Total Amount","data"=>"totalAmount");
		$records= array('data' => $data, 'columns' =>$colums);
		echo json_encode($records);
	}
    function getPendingClaims() {
		$last_valid_date=date('Y-m-d', strtotime("-6 month"))." 23:59:59";
		$logs = $this->getPendingClaimsFromDb(array(), "claims.id asc", "claims.id", "logs.claim_id as claimId,MAX(logs.date_time) as date_time, DATE_SUB(now(), INTERVAL 6 MONTH) as last", "1", "0", "(logs.date_time <'$last_valid_date' AND del_status = '0'  )", "", "")->result_array();
		// $notExist = '';
		// if(isset($currentLogs) && !empty($currentLogs)) {
		// 	foreach($currentLogs as $item):
		// 		if(isset($item["claimId"]) && !empty($item["claimId"])) {
		// 			$notExist = (!empty($notExist) ? $notExist.' AND logs.claim_id !="'.$item["claimId"].'"' : 'logs.claim_id !="'.$item["claimId"].'"');
		// 		}
		// 	endforeach;
		// }
		// $notExist = (!empty($notExist) ? '((date_time < DATE_SUB(now(), INTERVAL 6 MONTH) AND del_status = "0" AND trim(coalesce(logs.claim_id, "")) <> "") AND '.$notExist.')': 'date_time < (DATE_SUB(now(), INTERVAL 6 MONTH) AND del_status = "0" AND trim(coalesce(logs.claim_id, "")) <> "")');
		// $logs = $this->getPendingClaimsFromDb(array(), "claims.id asc", "logs.claim_id", "logs.claim_id as claimId,MAX(logs.date_time) as date_time, DATE_SUB(now(), INTERVAL 6 MONTH) as last", "1", "0", $notExist, "", "")->result_array();
		
		// echo "current logs<br>";
		// print_r($currentLogs);
		// echo "<br><br><br><br><br><br>last logs<br>";
		if(!empty($logs)) {
			$i=0;
			$coverageCategories = Modules::run('api/get_specific_table_with_pagination_where_groupby', array(), "id desc", "id", "coverage_category", "id,name as catName, code as catCode", "1","0","","","")->result_array();
			foreach($logs as $item):
				$status = Modules::run('api/get_specific_table_with_pagination_where_groupby', array('claim_id'=>$item["claimId"]), "id desc", "id", "process_claim", "status,close_case_inactivity", "1","0","","","")->row_array();
				if($status['status']==1){
					if($status['close_case_inactivity']==1){
						if(isset($item["claimId"]) && !empty($item["claimId"])) {
							$claimReservation = Modules::run('api/get_specific_table_with_pagination_where_groupby', array("claim_id" => $item["claimId"]), "id desc", "id", "claim_reservations", "id as reserveId,coverage_cat as coverageCat,amount as reserveAmount", "1","0","","","")->result_array();

							if(isset($claimReservation) && !empty($claimReservation)) {
								foreach($claimReservation as $cr):
									// echo"<br><br>inner";
									// print_r($cr);
									$cr["reserveAmount"] = (isset($cr["reserveAmount"]) && !empty($cr["reserveAmount"]) ? $cr["reserveAmount"] : 0);
									// if(isset($cr["reserveAmount"]) && !empty($cr["reserveAmount"])) {
										$type = "Reservasjon";
										$coverageCat = ($cr["coverageCat"] ?? 0);
										$searchKey = array_search($coverageCat, array_column($coverageCategories, 'id'));
										$logMessage = "Oppdaterte ";
										if (is_numeric($searchKey)) {
											$type .= "[".($claimReservation[$searchKey]["catCode"] ?? "m")."]";
											$logMessage .= ($claimReservation[$searchKey]["catName"] ?? "Medisinsk");
										}
										else {
											$type .= "[m]";
											$logMessage .= "Medisinsk";
										}
										$session = $this->session->userdata('route_user_data');

										Modules::run('api/update_specific_table',array("claim_id"=>$item["claimId"]), array("status"=>"2"), 'process_claim');
										if($cr["reserveAmount"]>0){
											$logMessage .= " reservasjon med kr -".$cr["reserveAmount"]." (gir ny reservasjon 0)";
											Modules::run('api/insert_into_specific_table', array("claim_id"=>$item["claimId"],"coverage_cat"=>$coverageCat, "user"=>'13',"type"=>$type,"belop"=>'-'.$cr["reserveAmount"],"send"=>"0","trans"=>"1","trans_status"=>"pending",'dato'=>date('Y-m-d'),"time"=>date('H:i:s')), 'transaction');
											Modules::run('api/update_specific_table',array("id"=>($cr["reserveId"])), array("amount"=>"0"), 'claim_reservations');
											Modules::run('api/insert_into_specific_table', array("claim_id"=>$item["claimId"],"performed_by"=> "13", "message"=> $logMessage,"type"=> "4"), 'logs');
										}
									// }
								endforeach;
							}
						}

					}

				}
			endforeach;
		}
											redirect(ADMIN_BASE_URL . 'dashboard');
	}
	function validateDate($date, $format = 'Y-m-d')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) === $date;
	}
	function getPremiumsFederation($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having)
	{
		$this->load->model('mdl_dashboard');
		$query = $this->mdl_dashboard->getPremiumsFederation($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having = '');
		return $query;
	}
	function getPremiumPolicies($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having)
	{
		$this->load->model('mdl_dashboard');
		$query = $this->mdl_dashboard->getPremiumPolicies($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having = '');
		return $query;
	}
	function getPendingClaimsFromDb($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having)
	{
		$this->load->model('mdl_dashboard');
		$query = $this->mdl_dashboard->getPendingClaimsFromDb($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having);
		return $query;
	}
}