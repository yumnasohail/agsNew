<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?> - Skademeldingsskjema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?=STATIC_ADMIN_FONT?>iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_FONT?>simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/smart_wizard.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>main.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>custom.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>front.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/dropzone.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/cropper.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/component-custom-switch.min.css" />
    <script src="<?=STATIC_ADMIN_JS?>vendor/jquery-3.3.1.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/bootstrap.bundle.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>-->
    <script src="<?=STATIC_ADMIN_JS?>sweetalert.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    <script>
    function url(){
        var styling_url='<?php echo STATIC_ADMIN_CSS ?>';
        return styling_url;
    }
    </script>
    <script src="<?=STATIC_ADMIN_JS?>scripts.js"></script>
</head>
<body id="app-container" class="menu-default show-spinner" onload="createCaptcha()">
    <nav class="navbar fixed-top">
        <a class="navbar-logo" href="<?php echo BASE_URL ?>" >
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>
    </nav>