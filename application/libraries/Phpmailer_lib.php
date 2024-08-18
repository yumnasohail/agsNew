<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Phpmailer_lib {
    public function __construct() {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load() {
        // Load PHPMailer files
        require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';
        require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
        require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';

        // Create PHPMailer object
        $mail = new PHPMailer();
        return $mail;
    }
}
