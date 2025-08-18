<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(['session', 'user_agent']);
        $this->load->helper('url');
    }

    public function switch($lang = 'norwegian') {
        $allowed = ['english', 'norwegian', 'danish', 'swedish'];
        if (!in_array($lang, $allowed)) {
            $lang = 'norwegian';
        }
    
        $this->session->set_userdata('site_lang', $lang);
    
        // Use referrer if available, else use previous URL from session or fallback to base_url
        $redirect_url = $this->agent->referrer(); // may be null on live server
    
        if (!$redirect_url) {
            // Option 1: Try to get the last visited URL from session
            $redirect_url = $this->session->userdata('last_visited') ?? base_url();
        }
    
        redirect($redirect_url);
    }
}
