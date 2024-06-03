<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_godkjen extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function get_specific_table_data_where_groupby_claims($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
            $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
            $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select,false);
        $this->db->from($table);
        $this->db->join("claims","claims.id=$table.claim_id","LEFT");
        $this->db->join("federations","claims.federation=federations.id","LEFT");
        $this->db->join("process_claim","claims.id=process_claim.claim_id","LEFT");
        $this->db->join("policy_period","policy_period.id=process_claim.period_id","LEFT");
        $this->db->join("insurers","policy_period.insurer_id=insurers.id","LEFT");
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($cols))
            $this->db->where($cols);
        if(!empty($or_where))
            $this->db->where($or_where);
        if(!empty($and_where))
            $this->db->where($and_where);
        if(!empty($having))
            $this->db->having($having);
        if($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get();
        return $query;
    }

}