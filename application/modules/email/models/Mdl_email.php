<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_email extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "email";
        return $table;
    }

  

    function _get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query;
    }

    function _update($arr_col, $data) {
        $table = $this->get_table();
        $this->db->where($arr_col);
        $this->db->update($table, $data);
    }

}