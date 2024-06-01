<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_reports extends CI_Model {

    function __construct() {
        parent::__construct();
    }

   
   function get_data_of_reports($cols, $order_by,$group_by='',$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->join("process_claim","claims.id=process_claim.claim_id","LEFT");
        $this->db->join("federations","claims.federation=federations.id","LEFT");
        $this->db->join("policy_period","policy_period.id=process_claim.period_id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        $this->db->join("claim_status","process_claim.status=claim_status.id","LEFT");
       
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_data_of_reports_bdx($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->join("federations","premiums.federation_id=federations.id","LEFT");
        $this->db->join("policy_period","policy_period.id=premiums.period_id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        $this->db->join("policies","policy_period.policy_id=policies.id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function _get_specific_table_with_pagination_bdx_check($cols, $order_by,$table,$select,$page_number,$limit){
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join("policies","policy_period.policy_id=policies.id","LEFT");
        if(!empty($cols))
        $this->db->where($cols);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_federation_policies($cols, $order_by,$group_by='',$table,$select)
    {
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->join("policy_period","$table.id=policy_period.policy_id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($cols))
            $this->db->where($cols);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_data_of_reports_with_transactions($cols, $order_by,$group_by='',$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->join("process_claim","claims.id=process_claim.claim_id","LEFT");
        $this->db->join("federations","claims.federation=federations.id","LEFT");
        $this->db->join("policy_period","policy_period.id=process_claim.period_id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        $this->db->join("claim_status","process_claim.status=claim_status.id","LEFT");
        $this->db->join("transaction","process_claim.claim_id=transaction.claim_id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_period_amount($cols, $order_by,$group_by='',$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
       // $this->db->join("process_claim","claims.id=process_claim.claim_id","LEFT");
        $this->db->join("transaction","process_claim.claim_id=transaction.claim_id","LEFT");
        // $this->db->join("claim_reservations","process_claim.claim_id=claim_reservations.claim_id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_period_amount_reserve($cols, $order_by,$group_by='',$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
       // $this->db->join("process_claim","claims.id=process_claim.claim_id","LEFT");
         $this->db->join("claim_reservations","process_claim.claim_id=claim_reservations.claim_id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    function get_policies_detail($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
      //  $this->db->join("process_claim","policy_period.id=process_claim.period_id","LEFT");
        $this->db->join("policies","policy_period.policy_id=policies.id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        $this->db->join("federations","policies.f_id=federations.id","LEFT");
      //  $this->db->join("transaction","process_claim.claim_id=transaction.claim_id","LEFT");
      //  $this->db->join("claim_reservations","process_claim.claim_id=claim_reservations.claim_id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    
    
     function get_policies_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
      //  $this->db->join("process_claim","policy_period.id=process_claim.period_id","LEFT");
        $this->db->join("policies","policy_period.policy_id=policies.id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        $this->db->join("federations","policies.f_id=federations.id","LEFT");
      //  $this->db->join("transaction","process_claim.claim_id=transaction.claim_id","LEFT");
      //  $this->db->join("claim_reservations","process_claim.claim_id=claim_reservations.claim_id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    
    function get_policy_wise_premiums($cols, $order_by,$table,$select,$page_number,$limit){
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join("policy_period","premiums.period_id=policy_period.id","LEFT");
        $this->db->join("policies","policy_period.policy_id=policies.id","LEFT");
        if(!empty($cols))
        $this->db->where($cols);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }
    
    function get_policies_premiums_detail($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->join("policy_period","policy_period.id=premiums.period_id","LEFT");
        $this->db->join("policies","policy_period.policy_id=policies.id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        $this->db->join("federations","policies.f_id=federations.id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }

}