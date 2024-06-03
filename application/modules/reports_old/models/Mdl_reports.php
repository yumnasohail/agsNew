<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_reports extends CI_Model {

    function __construct() {
        parent::__construct();
    }

   
   function get_data_of_reports($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $offset=($page_number-1)*$limit;
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
    function get_federation_policies($cols, $order_by,$group_by,$table,$select)
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
    function get_data_of_reports_with_transactions($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        $offset=($page_number-1)*$limit;
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
}