<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_federations extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "federations";
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
        $this->db->order_by($order_by);
        $this->db->where($where);
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

}