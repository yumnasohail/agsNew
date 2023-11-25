<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class General_setting extends MX_Controller {

    function __construct() {
        parent::__construct();
       // Modules::run('site_security/is_login');
       // Modules::run('site_security/has_permission');
    }

    function index() {
        $lang_id = DEFAULT_LANG; // default_lang_id
        $currency_list = array();
        $data['lang_id'] = $lang_id;
        $data['general_settings'] = $this->_get_where(DEFAULT_OUTLET)->row_array();
        $data['view_file'] = 'create';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
   function submit() {
        $update_id = $this->input->post('hdnId');
        $this->load->library('form_validation');
        $data = $this->_get_data_from_post();
        if ($update_id > 0) {
            $where['outlet_id'] = DEFAULT_OUTLET;
            //$row = $this->_get_where($update_id)->row();
            $this->_update($where, $data);
            $itemInfo = $this->_getItemById(DEFAULT_OUTLET);
                    $actual_img_old = FCPATH . ACTUAL_GENERAL_SETTING_IMAGE_PATH . $itemInfo->image;
            if (isset($_FILES['outlet_fav_icon']['size']) && $_FILES['outlet_fav_icon']['size'] >0 ) {
                 if (file_exists($actual_img_old))
                 unlink($actual_img_old);
                 $this->upload_fav_icon(DEFAULT_OUTLET);
           }
            $this->session->set_flashdata('message', 'General settings updated successfully.');
        } else {
            $id = $this->_insert($data);
            if (isset($_FILES['outlet_fav_icon']['size']) && $_FILES['outlet_fav_icon']['size'] >0 ) 
            $this->upload_fav_icon(DEFAULT_OUTLET);
            $this->session->set_flashdata('message', 'General settings added successfully.');
        }
        redirect(ADMIN_BASE_URL . 'general_setting');
    }

    function get_holidays() {
        $data = $this->_get_holidays();
        return $data;
    }
    
    function upload_fav_icon($nId) {
        $upload_image_file = $_FILES['outlet_fav_icon']['name'];
        $upload_image_file = str_replace(' ', '_', $upload_image_file);
        $file_name =  $upload_image_file;
        $config['upload_path'] = ACTUAL_GENERAL_SETTING_IMAGE_PATH;
        $config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (isset($_FILES['outlet_fav_icon'])) {
            $this->upload->do_upload('outlet_fav_icon');
        }
        $upload_data = $this->upload->data();
        $data = array('image' => $file_name);
        $where['outlet_id'] = DEFAULT_OUTLET;
        $rsItem = $this->_update($where, $data);
        if ($rsItem)
            return true;
        else
            return false;
    }
    /////////////////////////Image Upload//////////////////////////////
    function upload_image($nId) {
        $upload_image_file = $this->input->post('hdn_image');
        $file = pathinfo($upload_image_file);
        $file_extension = "." . $file['extension'];
        $file2 = basename($upload_image_file, $file_extension);
        $file2 = str_replace(' ', '_', $file2);
        if (strpos($file2, ".")) {
            $file2 = str_replace('.', '_', $file2);
        }
        $file_name = 'logo_' . $nId . '_' . $file2 . $file_extension;

        $config['upload_path'] = './uploads/general_setting/actual_images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '20000';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (isset($_FILES['media_file'])) {
            $this->upload->do_upload('media_file');
        }
        $upload_data = $this->upload->data();
        /////////////// Large Image ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 500;
        $config['height'] = 400;
        $config['new_image'] = './uploads/general_setting/large_images';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        /////////////  Medium Size ///////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 400;
        $config['height'] = 400;
        $config['new_image'] = './uploads/general_setting/medium_images';
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        ////////////////////// Small Size ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 142;
        $config['height'] = 50;
        $config['new_image'] = './uploads/general_setting/small_images';
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        $data = array('image' => $file_name);
        $where['id'] = $nId;
        $rsSetting = $this->_update($where, $data);
        if ($rsSetting)
            return true;
        else
            return false;
    }

    //////////////////  HELPER FUNCTION /////////////////////////
    function _getItemById($id) {
        $this->load->model('mdl_general_setting');
        return $this->mdl_general_setting->_getItemById($id);
    }

    function _get_data_from_post() {
        $data['slogan'] = $this->input->post('slogan');
        $data['footer_text'] = $this->input->post('footer_text');
        $data['promotion_text'] = $this->input->post('promotion_text');
        $data['promotion_heading'] = $this->input->post('promotion_heading');
        $data['address'] = $this->input->post('address');
        $data['phone'] = $this->input->post('phone');
        $data['b_email'] = $this->input->post('b_email');
        $data['email'] = $this->input->post('email');
        $data['facebook'] = $this->input->post('facebook');
        $data['instagram'] = $this->input->post('instagram');
        $data['youtube'] = $this->input->post('youtube');
        $data['currency'] = $this->input->post('currency');
        $data['contact_text'] = $this->input->post('contact_text');
        $data['outlet_id'] = DEFAULT_OUTLET;
        
        return $data;
    }

    function _get_data_from_db() {
        $row = $this->_get_by_arr_id()->row();
        $data['id'] = $row->id;
        $data['slogan'] =  $row->slogan;
        $data['footer_text'] =  $row->footer_text;
        $data['promotion_text'] =  $row->promotion_text;
        $data['promotion_heading'] =  $row->promotion_heading;
        $data['address'] =  $row->address;
        $data['b_email'] =  $row->b_email;
        $data['phone'] =  $row->phone;
        $data['facebook'] = $row->facebook;
        $data['instagram'] = $row->instagram;
        $data['youtube'] = $row->youtube;
        $data['email'] = $row->email;
        $data['currency'] = $row->currency;
        $data['image'] = $row->image;
        $data['contact_text'] = $row->contact_text;


        return $data;
    }

    function update_theme() {
        $url = $this->input->post('uri');
        $rest = substr($url, -5, 1);
        $data['theme'] = $rest;
        $this->_update_setting($data);
    }

    function get_theme() {
        $query = $this->_get_theme()->result_array();
        $theme_arr = $query[0];

        $theme_name = $theme_arr['theme'];
        echo $theme_name;
    }

    function _get_records_by_lang_id($limit, $offset, $arr_col, $order_by) {
        $this->load->model('mdl_general_setting');
        return $this->mdl_general_setting->_get_records_by_lang_id($limit, $offset, $arr_col, $order_by);
    }

    function _get_records($arr_col) {
        $this->load->model('mdl_general_setting');
        return $this->mdl_general_setting->_get_records($arr_col);
    }

    function _get_by_arr_id() {
        $this->load->model('mdl_general_setting');
        return $this->mdl_general_setting->_get_by_arr_id();
    }

    function _get($where, $order_by) {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->get($where, $order_by);
        return $query;
    }

    function _get_theme() {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->get_theme();
        return $query;
    }

    function _get_where($id) {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->get_where($id);
        return $query;
    }

    function _get_where_custom($col, $value) {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->get_where_custom($col, $value);
        return $query;
    }

    function _get_where_custom_join_outlet($col, $outlet_id) {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->get_where_custom_join_outlet($col, $outlet_id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_general_setting');
        return $this->mdl_general_setting->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_general_setting');
        $this->mdl_general_setting->_update($arr_col, $data);
    }

    function _update_setting($data) {
        $this->load->model('mdl_general_setting');
        $this->mdl_general_setting->_update_setting($data);
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->_custom_query($mysql_query);
        return $query;
    }

    function _get_holidays() {
        $this->load->model('mdl_general_setting');
        $query = $this->mdl_general_setting->_get_holidays();
        return $query;
    }

}
