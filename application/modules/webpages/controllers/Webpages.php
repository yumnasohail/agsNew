<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webpages extends MX_Controller{
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}

	function index() {
		$where['parent_id'] = 0;
		$data['query'] = $this->_get_records($where, 'id desc');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}
	
	function load_listing() {
		$where['parent_id'] = 0;
		$data['query'] = $this->_get_records($where, 'id desc');
		$this->load->view('listing', $data);      
	}
	
	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['webpage'] = $this->_get_data_from_db($update_id);
		} else {
			$data['webpage'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		for ($i = 1; $i <= 30; $i++) {
			$resultRank[$i] = $i;
		}
		$arr_type = $this->_get_enum('type');
		$data['type'] = $arr_type;
		$arr_app_type = $this->_get_enum('app_type');
		$data['app_type'] = $arr_app_type;
		$data['rank'] = $resultRank;
		$this->load->module('template');
		$this->template->admin($data);
	}

	function detail() {	
		$update_id = $this->input->post('id');
		$data['detail'] = $this->_get_data_from_db($update_id);
		$this->load->view('detail', $data);
	}

	function submit() {
			$update_id = $this->input->post('update_id');
			$data = $this->_get_data_from_post();
			if ($update_id != 0) {
				$check_slug = $this->check_slug_edit($data['url_slug'], $update_id);
				if ($check_slug == 1) {
					$this->session->set_flashdata('message', 'Page Url already extis.');
				} else {
					$where['id'] = $update_id;
					$this->_update($where, $data);
					$this->_update_icon($update_id);
					$this->session->set_flashdata('message', 'Page updated successfully.');
				}
			}
			if ($update_id == 0) {
				$check_slug = $this->check_slug($data['url_slug']);
				if ($check_slug == 1) {
					$this->session->set_flashdata('message', 'Page Url already extis.');
				} else {
					$row_id = $this->_insert($data);
					$this->_save_icon($row_id);
					$this->session->set_flashdata('message', 'Page saved successfully.');
				}
			}
			redirect(ADMIN_BASE_URL.'webpages');
	}

	function check_slug($url_slug) {
		$check = $this->_get_by_url_slug($url_slug);
		if ($check > 0)
			return true;
		else
			return false;
	}
	
	function check_slug_edit($url_slug, $id) {
		$check = $this->_get_by_url_slug_edit($url_slug, $id);
		if ($check > 0)
			return true;
		else
			return false;
	}

	function manage_sub_pages() {
		$parent_id = $this->uri->segment(4);
		$name = $this->uri->segment(5);
		$whereParent['id'] = $parent_id;
		$where['parent_id'] = $parent_id;
		$this->load->library('pagination');
		$segment = intval($this->uri->segment(6));
		$config['base_url'] = ADMIN_BASE_URL . 'webpages/manage_sub_pages/' . $parent_id ;
		$config['total_rows'] = $this->_count_where_sub_pages($where, 'page_title asc');
		$config['per_page'] = LIMIT;
		$config['uri_segment'] = 6;
		$config['full_tag_open'] = '<ul class="pagination genral">';
		$config['num_links'] = NUM_LINKS;
		$config['full_tag_close'] = '</ul>';
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		$data['query'] = $this->_get_sub_pages($where, 'page_rank asc');		
		$data['record'] = $this->_get_records($where,'id desc');
		$query = $this->_get_by_arr_id($whereParent, 'id desc');
		$data['ParentPageDetails'] = $query->row_array();
		$data['view_file'] = 'manage_sub_pages';
		$this->load->module('template');
		$this->template->admin($data);
	}
	
	function create_sub_page() {
		$is_edit = 0;
		$parent_id = $this->uri->segment(4);
		$where['parent_id'] = $parent_id;
		$whereParent['id'] = $parent_id;
		$self_id = $this->uri->segment(5);
		$data['page_title'] = $self_id;
		$data['query'] = $this->_get_sub_pages($where, 'page_rank asc');
		$data['record'] = $this->_get_records($where, 'id desc');
		$query = $this->_get_by_arr_id($whereParent, 'id desc');		
		$data['ParentPageDetails'] = $query->row_array();
		$data['ParentId'] = $parent_id;
		if ($self_id > 0) {
			$data['webpage'] = $this->_get_data_from_db($self_id);			
		} else {
			$data['webpage'] = $this->_get_data_from_post();
		}
		$data['parent_id'] = $parent_id;
		$data['update_id'] = $self_id;
		$data['view_file'] = 'create_sub_page';
		for ($i = 1; $i <= 30; $i++) {
			$resultRank[$i] = $i;
		}
		$data['rank'] = $resultRank;
		$this->load->module('template');
		$this->template->admin($data);
	}

	function submit_sub_page(){
		$update_id = 0;
			$update_id = $this->uri->segment(5);
			$data = $this->_get_data_from_post();
			if ($update_id && $update_id != 0) {
				$where['id'] = $update_id;
				$this->_update($where, $data);
				$this->_update_icon($update_id);
			}
			if ($update_id  == 0) {
				$row_id =$this->_insert($data);
				$this->_save_icon($row_id);
				$this->session->set_flashdata('message', 'Page successfully saved');
			}
		$data['parent_id'] = $this->uri->segment(4);
		redirect(ADMIN_BASE_URL . 'webpages/manage_sub_pages/'.$data['parent_id'] );
	}
	
	function change_status_sub_pages() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else
			$status = 1;
		$data = array('is_publish' => $status);
		$status = $this->_update_id($id, $data);
		echo $status;
	}
	
	function check_page_title(){
		$page_title = $this->input->post('page_title');
		$id = $this->input->post('id');
		$str_where = 'page_title = "'.$page_title.'"';
		if ($id != '') $str_where .= ' and id != '.$id;
			$str_query = ' Select * from webpages where '.$str_where;
		$result = $this->_custom_query($str_query)->num_rows();
		if($result > 0)
			echo true;
		else
			echo false;
	}
	
	function check_page_url(){
		$url_slug = $this->input->post('url_slug');
		$id = $this->input->post('id');
		$str_where = 'url_slug = "'.$url_slug.'"';
		if ($id != '') $str_where .= ' and id != '.$id;
			$str_query = ' Select * from webpages where '.$str_where;
		$result = $this->_custom_query($str_query)->num_rows();
		if($result > 0)
			echo true;
		else
			echo false;
	}
	
	function delete() {
		$page_id = $this->input->post('id');
		$where_sub_pages['parent_id'] = $page_id; 
		$result = $this->_delete($where_sub_pages);
		$where_main_page['id'] = $page_id; 
		$result = $this->_delete($where_main_page);
	}
	
		function delete_sub_pages() {
		$id = $this->input->post('id');
		$page_id = $this->input->post('pid');
		$where_sub_pages['parent_id'] = $page_id; 
		$result = $this->_delete($where_sub_pages);
		$where_main_page['id'] = $id; 
		$result = $this->_delete($where_main_page);
	}
	
	function set_home_page() {
		$update_id = $this->input->post('id');
		$where['id'] = $update_id;
		$this->_set_home($where);
	}
	
	function change_top_panel_pages() {
		$update_id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$where['id'] = $update_id;
			$this->_remove_toppanel($where);
			echo "ok";
			exit;
		}else{
			$where['id'] = $update_id;
			$where2['show_in_toppanel'] = 1;
			$where2['page_type_id'] = 1;
			$where3['is_publish'] = 1;
			$this->load->model('mdl_webpages');
			$this->_show_toppanel($where);
			echo "ok";
			exit;
			$record = $this->_get_by_arr_id($where2);
			$record2 = $this->mdl_webpages->_get_static_published_pages($where3);
			$total_records = $record2->num_rows + $record->num_rows;
			if ($total_records < 10) {
			$this->_show_toppanel($where);
			echo "ok";
			exit;
			} else {
			echo "warning";
			exit;           
			}
			redirect(ADMIN_BASE_URL . 'webpages');
		}
	}
	
	function show_toppanel(){
		$update_id = $this->input->post('id');
		$status = $this->input->post('status');
		echo $id . '......./' . $status;
		exit;
		$where['id'] = $update_id;
		$where2['show_in_toppanel'] = 1;
		$where2['page_type_id'] = 1;
		$record = $this->_get_by_arr_id($where2);
		$where3['is_publish'] = 1;
		$this->load->model('mdl_webpages');
		$record2 = $this->mdl_webpages->_get_static_published_pages($where3);
		$total_records = $record2->num_rows + $record->num_rows;
		if ($total_records < 6) {
			$this->_show_toppanel($where);
			$this->session->set_flashdata('message', 'Page showed in top-panel successfully.');
		} else {
			$this->session->set_flashdata('warning', 'More than 6 pages cannot be showed for top-panel.');
		}
		redirect(ADMIN_BASE_URL . 'webpages');
	}

	function change_footer_panel_pages() {      
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else
			$status = 1;
		$data = array('show_in_footer' => $status);
		$status = $this->_update_id($id, $data);
		echo 'ok';
	}

	function set_publish() {
		$update_id = $this->uri->segment(4);
		$where['id'] = $update_id;
		$where2['show_in_toppanel'] = 1;
		$where2['page_type_id'] = 1;
		$record = $this->_get_by_arr_id($where2);
		$where3['is_publish'] = 1;
		$this->load->model('mdl_webpages');
		$record2 = $this->mdl_webpages->_get_static_published_pages($where3);
		$total_records = $record2->num_rows + $record->num_rows;
		if ($total_records < 6) {
			$this->_set_publish($where);
			$this->session->set_flashdata('message', 'Page published successfully.');
		} else {
			$this->session->set_flashdata('warning', 'More than 6 pages cannot be published for top-panel.');
		}
		redirect(ADMIN_BASE_URL . 'webpages');
	}
	
	function set_unpublish() {
		$update_id = $this->uri->segment(4);
		$where['id'] = $update_id;
		$this->_set_unpublish($where);
		$this->session->set_flashdata('message', 'Page un-published successfully.');
		redirect(ADMIN_BASE_URL . 'webpages');
	}


	function _get_data_from_db($update_id) {
		$where['id'] = $update_id;
		$query = $this->_get_by_arr_id($where);
		foreach ($query->result() as $row) {
			$data['page_title'] = $row->page_title;
			$data['meta_description'] = $row->meta_description;
			$data['page_content'] = $row->page_content;
			$data['page_rank'] = $row->page_rank;
			$data['is_publish'] = $row->is_publish;
			$data['url_slug'] = $row->url_slug;
			$data['show_in_toppanel'] = $row->show_in_toppanel;
			$data['show_in_footer'] = $row->show_in_footer;
			$data['is_publish'] = $row->is_publish;
			$data['app_type'] = $row->app_type;
			$data['type'] = $row->type;
			$data['icon'] = $row->icon;
			$data['image'] = $row->image;
			$data['short_desc'] = $row->short_description;
			$data['meta_title'] = $row->meta_title;
			$data['meta_keywords'] = $row->meta_keywords;
		}
		return $data;
	}
	
	function _get_data_from_post() {
		$data['page_title'] = $this->input->post('txtPageTitle');
		$data['meta_title'] = $this->input->post('meta_title');
		$page_url = $this->input->post('txtPageUrl');
		$page_title = $this->input->post('txtPageTitle');
		if (empty($page_url)) {
			$url_slug = $page_title;
			$url_slug = url_title($url_slug, '-', true);
		} else {
			$url_slug = $page_url;
			$url_slug = url_title($url_slug, '-', true);
		}
		$data['url_slug'] = $url_slug;
		$data['meta_description'] = $this->input->post('txtMetaDesc');
		$data['meta_keywords'] = $this->input->post('meta_keywords');
		$data['page_content'] = $this->input->post('txtPageCont');
		$data['page_rank'] = $this->input->post('lstRank');
		$data['parent_id'] = "0";
		$data['outlet_id'] = '0';
		$data['page_type_id'] = 1;
		$data['is_publish'] = 1;
		//$data['app_type'] = $this->input->post('app_type');
		$data['short_description'] = $this->input->post('short_desc');
		// $data['icon'] = $this->input->post('icon');
		$parent_id=$this->input->post('hdnParentId');
		if(!empty($parent_id))
		$data['parent_id'] = $parent_id;
		
		return $data;
	}
	
	function _get_data_from_translate_post() {
		$data['id'] = $this->input->post('hdnId');
		$data['page_title'] = $this->input->post('txtPageTitle');
		$page_url = $this->input->post('txtPageUrl');
		$page_title = $this->input->post('txtPageTitle');
		if (empty($page_url)) {
			$url_slug = $page_title;
			$url_slug = url_title($url_slug, '-', true);
		} else {
			$url_slug = $page_url;
			$url_slug = url_title($url_slug, '-', true);
		}
		$data['url_slug'] = $url_slug;
		$data['meta_keywords'] = $this->input->post('txtMetaKW');
		$data['meta_description'] = $this->input->post('txtMetaDesc');
		$data['page_content'] = $this->input->post('txtPageCont');
		$data['page_rank'] = $this->input->post('lstRank');
		$data['parent_id'] = $this->input->post('hdnParentId');
		$data['page_type_id'] = 1;
		return $data;
	}
	
	function _get_data_from_post_multi() {
		$data['id'] = $this->input->post('chkId');
		$data['btn_publish'] = $this->input->post('btnPublish');
		$data['btn_unpublish'] = $this->input->post('btnUnPublish');
		$data['btn_delete'] = $this->input->post('btnDelete');
		return $data;
	}
	
	function _get_data_from_post_search() {
		$data['page_title'] = $this->input->post('txtSearch');
		return $data;
	}
	
	function translate() {
		$update_id = $this->uri->segment(4);
		$query = Modules::run('lang/_get_lang_record_by_id', $translate_lang_id);
		foreach ($query->result() as $lang) {
		$result[$lang->id] = $lang->lang_name;
	}
		$data['languages'] = $result;
		if (!isset($lang_id) || !is_numeric($lang_id)) {
			$lang_id = DEFAULT_LANG; // default_lang_id
			$data['lang_id'] = $lang_id;
		} else {
			$data['lang_id'] = $lang->id;
		}
		if (is_numeric($update_id) && is_numeric($lang_id)) {
		$data['webpage'] = $this->_get_data_from_db($update_id, $lang_id);
		} else {
			$data['webpage'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'page_translate_form';
		$this->load->module('template');
		$this->template->admin($data);
	}
	
	function translate_submit() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtPageTitle', 'Page Title', 'required|xss_clean');
		$this->form_validation->set_rules('txtMetaKW', 'Meta Keywords', 'required|xss_clean');
		$this->form_validation->set_rules('txtMetaDesc', 'Meta Description', 'required|xss_clean');
		$this->form_validation->set_rules('txtPageCont', 'Page Contents', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$update_id = $this->uri->segment(4);
			$data = $this->_get_data_from_translate_post();
			if (is_numeric($update_id)) {
				$this->_insert($data);
				$this->session->set_flashdata('message', 'Page translated successfully.');
			}
		redirect(ADMIN_BASE_URL . 'webpages');
		}
	}

	function _update_icon($id){
		$old_file = $this->_get_by_arr_id(['id' => $id])->row('image');
		$old_file = ACTUAL_WEBPAGES_IMAGE_PATH.$old_file;
		if (isset($_FILES['news_file']['name']) && $_FILES['news_file']['name'] != '') {
			if(file_exists($old_file)){
				unlink($old_file);
			}
			$this->_save_icon($id);
		}
		
	}




	function _save_icon($nId) {
        $upload_image_file = $_FILES['news_file']['name'];
        $upload_image_file = str_replace(' ', '_', $upload_image_file);
        $file_name = 'icon_' . $nId . '_' . $upload_image_file;
        $config['upload_path'] = ACTUAL_WEBPAGES_IMAGE_PATH;
        $config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $f = '';
        if (isset($_FILES['news_file'])) {
            $f = $this->upload->do_upload('news_file');
        }
        
        $upload_data = $this->upload->data();
        $data = array('image' => $config['file_name']);
        $where['id'] = $nId;
        $rsItem = $this->_update($where, $data);
        // var_dump($f);
        // echo "<br>".BASE_URL.ACTUAL_WEBPAGES_IMAGE_PATH.$file_name;
        // exit;
        if ($rsItem)
            return true;
        else
            return false;
    }
	
	function change_status() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else
			$status = 1;
		$data = array('is_publish' => $status);
		$status = $this->_update_id($id, $data);
		echo $status;
	}

	function _get_about_us($url_slug){
	$this->load->model('mdl_webpages');
	return $this->mdl_webpages->_get_about_us($url_slug);  
	}
	

	function _get_menu_pages($outlet_id){
	$this->load->model('mdl_webpages');
	return $this->mdl_webpages->_get_menu_pages($outlet_id)->result_array();  
	}
	
	function _get_records_by_lang_id($limit, $offset, $arr_col, $order_by) {
	$this->load->model('mdl_webpages');
	return $this->mdl_webpages->_get_records_by_lang_id($limit, $offset, $arr_col, $order_by);
	}
	
	function _get_sub_pages($arr_col, $order_by) {
	$this->load->model('mdl_webpages');
	return $this->mdl_webpages->_get_sub_pages($arr_col, $order_by);
	}
	
	function _get_by_arr_id($arr_col) {
	$this->load->model('mdl_webpages');
	return $this->mdl_webpages->_get_by_arr_id($arr_col);
	}
	
	function _get($order_by) {
	$this->load->model('mdl_webpages');
	$query = $this->mdl_webpages->get($order_by);
	return $query;
	}
	
	function _get_toppanel_pages($parent_id = 0, $is_app=0) {
		$this->load->model('mdl_webpages');
		if ($parent_id == 0){
			$where['parent_id'] = 0;
			$where['show_in_toppanel'] = 1;
		}else 
			$where['parent_id > '] = '0 ';
		if ($is_app > 0)
			$where['is_app'] = '1';
		$where['is_publish'] = 1;
		//$where['outlet_id'] = DEFAULT_OUTLET;
		$query = $this->mdl_webpages->_get_toppanel_pages($where, 'page_rank asc');
		//print_r($query->result_array());echo "string";exit();
		return $query;
	}
	
	function _get_footerpanel_pages() {
		$this->load->model('mdl_webpages');
		$where['parent_id'] = 0;
		$where['show_in_footer'] = 1;
		$where['is_publish'] = 1;
		//$where['outlet_id'] = DEFAULT_OUTLET;
		$query = $this->mdl_webpages->_get_footerpanel_pages($where, 'page_rank asc');
		return $query;
	}
	
	function _get_page_content_by_url_slug($url_slug) {
		$this->load->model('mdl_webpages');
		$where['url_slug'] = $url_slug;
	//	$where['outlet_id'] = DEFAULT_OUTLET;
		$query = $this->mdl_webpages->_get_page_content_by_url_slug($where, 'page_rank asc');
		return $query;
	}
	
	function _get_home_page_contents($arr_col) {
		$this->load->model('mdl_webpages');
		$query = $this->mdl_webpages->_get_home_page_contents($arr_col);
		return $query;
	}
	
	function _get_records($arr_col, $order_by) {
		$this->load->model('mdl_webpages');
		return $this->mdl_webpages->_get_records($arr_col, $order_by);
	}
	
	function _get_with_limit($limit, $offset, $order_by) {
		$this->load->model('mdl_webpages');
		$query = $this->mdl_webpages->get_with_limit($limit, $offset, $order_by);
		return $query;
	}
	
	function _get_where($id, $is_static) {
		$this->load->model('mdl_webpages');
		$query = $this->mdl_webpages->get_where($id, $is_static);
		return $query;
	}
	
	function _get_where_custom($col, $value) {
		$this->load->model('mdl_webpages');
		$query = $this->mdl_webpages->get_where_custom($col, $value);
		return $query;
	}
	
	function _insert($data) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_insert($data);
	}
	
	function _update($arr_col, $data) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_update($arr_col, $data);
	}
	
	function _update_id($id, $data) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_update_id($id, $data);
	}
	
	function _delete($arr_col) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_delete($arr_col);
	}
	
	function _set_home($arr_col) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_set_home($arr_col);
	}
	
	function _set_publish($arr_col) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_set_publish($arr_col);
	}
	
	function _set_unpublish($arr_col) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_set_unpublish($arr_col);
	}

	function _show_toppanel($arr_col) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_show_toppanel($arr_col);
	}
	
	function _remove_toppanel($arr_col) {
		$this->load->model('mdl_webpages');
		$this->mdl_webpages->_remove_toppanel($arr_col);
	}
	
	function _search_page($strSearch, $limit, $segment, $where, $order) {
		$this->load->model('mdl_webpages');
		return $this->mdl_webpages->_search_page($strSearch, $limit, $segment, $where, $order);
	}
	
	function _count_where($column, $value) {
		$this->load->model('mdl_webpages');
		$count = $this->mdl_webpages->count_where($column, $value);
		return $count;
	}
	
	function _count_where_sub_pages($column, $order) {
		$this->load->model('mdl_webpages');
		$count = $this->mdl_webpages->_count_where_sub_pages($column, $order);
		return $count;
	}
	
	function _count_where_search($strSearch, $column) {
		$this->load->model('mdl_webpages');
		$count = $this->mdl_webpages->_count_where_search($strSearch, $column);
		return $count;
	}
	
	function _get_by_url_slug($url_slug) {
		$this->load->model('mdl_webpages');
		$check = $this->mdl_webpages->_get_by_url_slug($url_slug);
		return $check;
	}
	
	function _get_by_url_slug_edit($url_slug, $id) {
		$this->load->model('mdl_webpages');
		$check = $this->mdl_webpages->_get_by_url_slug_edit($url_slug, $id);
		return $check;
	}
	
	function _get_max() {
		$this->load->model('mdl_webpages');
		$max_id = $this->mdl_webpages->get_max();
		return $max_id;
	}
	
	function _custom_query($mysql_query) {
		$this->load->model('mdl_webpages');
		$query = $this->mdl_webpages->_custom_query($mysql_query);
		return $query;
	}

	function _get_enum($field){
        $type = $this->db->query( "SHOW COLUMNS FROM webpages WHERE Field = '{$field}'" )->row( 0 )->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $records = array();
        if(isset($matches[1]) && !empty($matches[1])) {
	        $enum = explode("','", $matches[1]);
	        foreach ($enum as $value) {
	            $records[$value] = $value;
	        }
        }
        return $records;
    }
	
}