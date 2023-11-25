<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_policies extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "policies";
        return $table;
    }
	
	function _get_post($ncat = 0, $limit = 0, $segment=1, $order='desc') {
        $table = $this->get_table();
        $this->db->where('cat_id = '.$ncat);
        $this->db->limit($limit, $segment);
        $this->db->order_by($order);
        return $this->db->get($table);
    }
    function _get_by_arr_id($arr_col) {
        $table = $this->get_table();
        $this->db->select('*');
        $this->db->where($arr_col);
        return $this->db->get($table);
    }
    function _get($order_by,$where) {
        $table = $this->get_table();
        $this->db->select('claims.*,federations.title as federation_title');
        $this->db->order_by($order_by);
        $this->db->join('federations','federations.id=claims.federation','LEFT');
        $this->db->where('federations.title',$where);
        $query = $this->db->get($table);
        return $query;
    }
    function get_policies_with_period($where)
    {
        $this->db->select('federations.title,insurers.name,policies.policy_title,policy_period.start_date,policy_period.end_date,policy_period.contract_id,policy_period.ags_policy_no,policy_period.comission,policy_period.deductible,policy_period.currency,policy_period.status,policy_period.id,policy_period.rib,policy_period.profit_comission,policies.f_id');
        $this->db->from('policies');
        $this->db->order_by('federations.id desc, policy_period.start_date asc');
        $this->db->join('policy_period','policies.id=policy_period.policy_id','LEFT');
        $this->db->join('insurers','insurers.id=policy_period.insurer_id','LEFT');
        $this->db->join('federations','federations.id=policies.f_id','LEFT');
        $this->db->where($where);
        $query=$this->db->get();
        return $query;
    }
    function _get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query;
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function _update($arr_col, $data) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        $this->db->update($table, $data);
    }
       function _update_id($id, $data) {
        $table = "policy_period";
        $this->db->where('id',$id);
        $this->db->update($table, $data);
    }

    function _delete($arr_col) {       
        $table = $this->get_table();
        $this->db->where($arr_col);
        $this->db->delete($table);
    }
    function _set_publish($where) {
        $table = $this->get_table();
        $set_publish['status'] = 1;
        $this->db->where($where);
        $this->db->update($table, $set_publish);
    }

    function _set_unpublish($where) {
        $table = $this->get_table();
        $set_un_publish['status'] = 0;
        $this->db->where($where);
        $this->db->update($table, $set_un_publish);
    }

    function _getItemById($id) {
        $table = $this->get_table();
        $this->db->where("( id = '" . $id . "'  )");
        $query = $this->db->get($table);
        return $query->row();
    }

}