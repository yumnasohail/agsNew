<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_claims extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "claims";
        return $table;
    }
	function get_federation_addressbook($where, $table,$select){
        $this->db->select($select);
        $this->db->join('addressbook','addressbook.id= federations_address.a_id','LEFT');
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query;
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
        $this->db->where('claims.del_status',0);
        $query = $this->db->get($table);
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
        $table = $this->get_table();
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
    function get_transaction_detail($where,$order_by,$group_by,$select,$table)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join('claims','claims.id=transaction.claim_id','LEFT');
        $this->db->join('federations','federations.id=claims.federation','LEFT');
        $this->db->join('process_claim','process_claim.claim_id=transaction.claim_id','LEFT');
        if(!empty($order_by))
            $this->db->order_by($order_by);
        if(!empty($group_by))
            $this->db->group_by($group_by);
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
     function getClaimsWithFederation($cols, $order_by, $group_by, $select, $page_number, $limit, $or_where, $and_where, $having) {
        $offset = ($page_number - 1) * $limit;
        $this->db->select($select, false);
        $this->db->from("claims");
        $this->db->join('federations','federations.id = claims.federation','LEFT');
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
}