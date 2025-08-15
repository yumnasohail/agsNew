<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(['session', 'user_agent']);
        $this->load->helper('url');
    }

    public function switch($lang = 'norwegian') {
        $allowed = ['english', 'norwegian','danish','swedish'];
        if (!in_array($lang, $allowed)) {
            $lang = 'norwegian';
        }

        $this->session->set_userdata('site_lang', $lang);
        redirect($this->agent->referrer() ?? base_url());
    }
}
