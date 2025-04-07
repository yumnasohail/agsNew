<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Cache-Control: no-store, no-cache, must-revalidate, proxy-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
class Front_end extends MX_Controller {
protected $data = '';

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url', 'language']);

		// Check if the language session is already set
		if (!$this->session->userdata('site_lang')) {
			// First time: Set to default language
			$this->session->set_userdata('site_lang', 'norwegian');
		}

		// Now use the session value
		$lang = $this->session->userdata('site_lang');

		// Load the appropriate language file
		$this->lang->load($lang . '_lang', $lang);
	}
	
	public function switch($lang = 'norwegian') {
        $allowed = ['english', 'norwegian'];
        if (!in_array($lang, $allowed)) {
            $lang = 'norwegian';
        }

        $this->session->set_userdata('site_lang', $lang);
        redirect($this->agent->referrer() ?? base_url());
    }

	function index() {
        $this->load->module('templates');
	    $data['view_file'] = 'home';
	    $this->templates->front($data);
	}
	function kunst() {
        $this->load->module('templates');
	    $data['view_file'] = 'kunst';
	    $this->templates->front($data);
	}
	function enerji() {
        $this->load->module('templates');
	    $data['view_file'] = 'enerji';
	    $this->templates->front($data);
	}
	function sport() {
        $this->load->module('templates');
	    $data['view_file'] = 'sport';
	    $this->templates->front($data);
	}
	function ma() {
        $this->load->module('templates');
	    $data['view_file'] = 'ma';
	    $this->templates->front($data);
	}
	function kontakt() {
        $this->load->module('templates');
	    $data['view_file'] = 'kontakt';
	    $this->templates->front($data);
	}
	function om_ags() {
        $this->load->module('templates');
	    $data['view_file'] = 'om_ags';
	    $this->templates->front($data);
	}
	function privacy_policy() {
        $this->load->module('templates');
	    $data['view_file'] = 'privacy_policy';
	    $this->templates->front($data);
	}
}

