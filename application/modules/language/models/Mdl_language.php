<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_language extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "language";
        return $table;
    }
       function _get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }
   
    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
     function _get_by_arr_id($arr_col) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        return $this->db->get($table);
    }
         function _update_id($id, $data) {
        $table = $this->get_table();
        $this->db->where('language_id',$id);
        $this->db->update($table, $data);
    }
     function _update($arr_col, $data) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        $this->db->update($table, $data);
    }
     function _delete($arr_col) {       
        $table = $this->get_table();
        $this->db->where($arr_col);
        $this->db->delete($table);
    }
}