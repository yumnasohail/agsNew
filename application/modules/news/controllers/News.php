<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
Modules::run('site_security/has_permission');

}

    function index() {
        $this->list();
    }

    function list() {
        $data['news'] = $this->_get('id desc',array("del_status"=>"0"));
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function translate() {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id)) {
            $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newstranslateform';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function manage() {
        $update_id = $this->uri->segment(5);
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $data['news'] = $this->_get_by_arr_id($where)->row();
        }
        $data['federation_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    function create() {
        $update_id = $this->uri->segment(4);
        
        if (is_numeric($update_id) && $update_id != 0) {
            $data['news'] = $this->_get_data_from_db($update_id);
        } else {
            $data['news'] = $this->_get_data_from_post();
        }
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    function _get_data_from_db($update_id) {
        $where['id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as $row) {
            $data['title'] = $row->title;
            $data['url_slug'] = $row->url_slug;
            $data['author'] = $row->author;
            $data['date'] = $row->date;
            $data['short_desc'] = $row->short_desc;
            $data['long_desc'] = $row->long_desc;
            $data['image'] = $row->image;
            $data['status'] = $row->status;
        }
        return $data;
    }
   
    function _get_data_from_post() {
        $data['title'] = $this->input->post('title');
        $data['date'] = $this->input->post('date');
        $data['author'] = $this->input->post('author');
        $data['short_desc'] = $this->input->post('short_desc');
        $data['long_desc'] = $this->input->post('long_desc');
        $slug = strtolower($data['title']);
        $slug = preg_replace('/[^a-z0-9]+/', '_', $slug);
        $slug = trim($slug, '_');
        $data['url_slug'] = $slug;
        return $data;
    }

    function submit() {
        $update_id = $this->uri->segment(4);
        $data = $this->_get_data_from_post();
        if (is_numeric($update_id) && $update_id != 0) {
            $where['id'] = $update_id;
            $this->_update($where, $data);
            $this->_update_image($update_id);
            $this->session->set_flashdata('message', 'News'.' '.DATA_UPDATED);										
            $this->session->set_flashdata('status', 'success');
        }
        if (is_numeric($update_id) && $update_id == 0) {
            $id = $this->_insert($data);
            $this->_save_image($id);
            $this->session->set_flashdata('message', 'News'.' '.DATA_SAVED);										
            $this->session->set_flashdata('status', 'success');
        }
        redirect(ADMIN_BASE_URL . 'news');
    }

    function _update_image($id){
		$old_file = $this->_get_by_arr_id(['id' => $id])->row('image');
		$old_file = UPLOAD_FRONT_NEWS.$old_file;
		if (isset($_FILES['news_file']['name']) && $_FILES['news_file']['name'] != '') {
			if(file_exists($old_file)){
				unlink($old_file);
			}
			$this->_save_image($id);
		}
	}

    function _save_image($nId) {
        if (isset($_FILES['news_file']) && $_FILES['news_file']['error'] == 0) {
            $upload_image_file = $_FILES['news_file']['name'];
            $upload_image_file = str_replace(' ', '_', $upload_image_file);
    
            $file_name = 'icon_' . $nId . '_' . $upload_image_file;
    
            $config['upload_path'] = FCPATH . 'uploads/news/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 20000;
            $config['file_name']     = $file_name;
    
            $this->load->library('upload');
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('news_file')) {
                $upload_data = $this->upload->data();
                $data = array('image' => $upload_data['file_name']); // ✅ use actual saved filename
                $where['id'] = $nId;
                return $this->_update($where, $data);
            } else {
                echo $this->upload->display_errors('<div class="error">', '</div>');
                return false;
            }
        }
        return false;
    }
    

    function delete() {
        $delete_id = $this->input->post('id');
        $where['id'] = $delete_id;
        $this->_update($where, array("del_status"=>"1"));
        //$this->_delete($where);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'News published successfully.');
        redirect(ADMIN_BASE_URL . 'news');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'News un-published successfully.');
        redirect(ADMIN_BASE_URL . 'news');
    }


    function change_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        $data = array('status' => $status);
        $status = $this->_update_id($id, $data);
        echo $status;
    }

    function detail() {
        $update_id = $this->input->post('id');
        $data['post'] = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $this->load->view('detail', $data);
    }

	
    function _getItemById($id) {
        $this->load->model('mdl_news');
        return $this->mdl_news->_getItemById($id);
    }

    function _set_publish($arr_col) {
        $this->load->model('mdl_news');
        $this->mdl_news->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_news');
        $this->mdl_news->_set_unpublish($arr_col);
    }

    function _get($order_by,$where) {
        $this->load->model('mdl_news');
        $query = $this->mdl_news->_get($order_by,$where);
        return $query;
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_news');
        return $this->mdl_news->_get_by_arr_id($arr_col);
    }
    function _get_where($id) {
        $this->load->model('mdl_news');
        $query = $this->mdl_news->_get_where($id);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_news');
        return $this->mdl_news->_insert($data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_news');
        $this->mdl_news->_update($arr_col, $data);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_news');
        $this->mdl_news->_update_id($id, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_news');
        $this->mdl_news->_delete($arr_col);
    }

 




}