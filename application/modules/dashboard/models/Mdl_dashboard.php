<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_dashboard extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	function getPremiumsFederation($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where = '', $and_where = '', $having = '')
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select, false);
        $this->db->from("premiums");
        $this->db->join("federations","premiums.federation_id=federations.id","left");
        if (!empty($group_by))
            $this->db->group_by($group_by);
        if (!empty($cols))
            $this->db->where($cols);
        if (!empty($or_where))
            $this->db->where($or_where);
        if (!empty($and_where))
            $this->db->where($and_where);
        if (!empty($having))
            $this->db->having($having);
        if ($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get();
        return $query;
    }
	function getPremiumPolicies($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where = '', $and_where = '', $having = '')
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select, false);
        $this->db->from("premiums");
        $this->db->join("federations","premiums.federation_id=federations.id","left");
        $this->db->join("policy_period","premiums.period_id=policy_period.id","left");
        $this->db->join("policies","policy_period.policy_id=policies.id","left");
        if (!empty($group_by))
            $this->db->group_by($group_by);
        if (!empty($cols))
            $this->db->where($cols);
        if (!empty($or_where))
            $this->db->where($or_where);
        if (!empty($and_where))
            $this->db->where($and_where);
        if (!empty($having))
            $this->db->having($having);
        if ($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get();
        return $query;
    }
    
	function getPendingClaimsFromDb($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having)
    {
        if(!isset($page_number) || $page_number<1 || $page_number=='')
       $page_number=1;
        if(!isset($limit) || $limit<1 || $limit=='')
       $limit=0;
        $offset = ((int)$page_number - 1) *$limit;
        $this->db->select($select, false);
        $this->db->from("logs");
        $this->db->join("claims","logs.claim_id=claims.id","left");
        $this->db->order_by($order_by);
        if (!empty($group_by))
            $this->db->group_by($group_by);
        if (!empty($cols))
            $this->db->where($cols);
        if (!empty($or_where))
            $this->db->where($or_where);
        //$this->db->where('(date_time NOT BETWEEN DATE_SUB(now(), INTERVAL 6 MONTH) AND now())',NULL, FALSE);
        if (!empty($and_where))
            $this->db->where($and_where);
        if (!empty($having))
            $this->db->having($having);
        if ($limit != 0)
            $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }
}