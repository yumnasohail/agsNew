
			
			
			<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AGS Forsikring - Cloud Insurance </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?=STATIC_ADMIN_FONT?>iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_FONT?>simple-line-icons/css/simple-line-icons.css" />

    <!-- <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>timepicker.css" /> -->
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/fullcalendar.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/select2.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/glide.core.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/nouislider.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>main.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>toastr.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>custom.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>sweetalert.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/dropzone.min.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_CSS?>vendor/cropper.min.css" />
    <script src="<?=STATIC_ADMIN_JS?>vendor/jquery-3.3.1.min.js"></script>
    <script src="<?=STATIC_ADMIN_JS?>vendor/bootstrap.bundle.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>-->
    <script src="<?=STATIC_ADMIN_JS?>sweetalert.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

    
    
</head>
<style>
    #myModal_log img
    {
        display:none;
    }
</style>
<?php
$curr_url = $this->uri->segment(2);
$secon_curr_url = $this->uri->segment(3);
$active="active";
?>
<script>
        function url(){
         var styling_url='<?php echo STATIC_ADMIN_CSS ?>';
         return styling_url;
        }
</script>

<!-- show-spinner -->
<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>
            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
        </div>


        <a class="navbar-logo" href="<?php echo ADMIN_BASE_URL.'dashboard'; ?>">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <div class="dropdown d-inline-block d-none mr-3">
                    <div class="search " id="policySearchBar">
                        <input placeholder="Search..." class="policySearchBarInput">
                        <span class="search-icon">
                            <i class="simple-icon-magnifier"></i>
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right mt-3 policySearchBarDropDown" id="policySearchBarDropDown" style="overflow-y: scroll;">
                    </div>
                </div>
                <div class="d-none d-md-inline-block align-text-bottom mr-3 btn-claim-count hide" data-toggle="tooltip" data-placement="left" title="Nye krav" >
                    <span class="count-claim">0</span>
                     <i class="simple-icon-docs"></i>
                </div>

                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                    <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                         data-toggle="tooltip" data-placement="left" title="Dark Mode">
                        <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                        <label class="custom-switch-btn" for="switchDark"></label>
                    </div>
                </div>

                <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="<?php echo ADMIN_BASE_URL.'email' ?>" class="icon-menu-item">
                            <i class="iconsminds-equalizer d-block"></i>
                            <span>Settings</span>
                        </a>

                        <a href="<?php echo ADMIN_BASE_URL.'users' ?>" class="icon-menu-item">
                            <i class="iconsminds-male-female d-block"></i>
                            <span>Users</span>
                        </a>

                        <a href="<?php echo ADMIN_BASE_URL.'policies/overview' ?>" class="icon-menu-item">
                            <i class="iconsminds-puzzle d-block"></i>
                            <span>Policies</span>
                        </a>

                        <a href="<?php echo ADMIN_BASE_URL.'policies/slips' ?>" class="icon-menu-item">
                            <i class="iconsminds-bar-chart-4 d-block"></i>
                            <span>Contract Slips</span>
                        </a>
                        
                        <a href="<?php echo ADMIN_BASE_URL.'dashboard/getPendingClaims' ?>" class="icon-menu-item">
                            <i class="iconsminds-synchronize-2 d-block"></i>
                            <span>Close Inactive Claims</span>
                        </a>
                        
                        

                    </div>
                </div>

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>
	        <?php
				$data = $this->session->userdata('route_user_data');
				$profile_image = OUTLET_USER_DEFAULT_IMAGE; 
				if(isset($data['user_image']) && !empty($data['user_image'])) 
					$profile_image = $data['user_image'];
				$profile_image = Modules::run('api/image_path_with_default',ACTUAL_OUTLET_USER_IMAGE_PATH,$profile_image,STATIC_FRONT_IMAGE,OUTLET_USER_DEFAULT_IMAGE);
				$profile_name = "";
				if(isset($data['user_name']) && !empty($data['user_name']))
					$profile_name = ucwords($data['user_name']);
			?>
            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <!--<span class="name"><?php echo $profile_name; ?></span>-->
                    <span>
                        <img alt="Profile Picture" src="<?=$profile_image?>" />
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="#">Account</a>
                    <a class="dropdown-item" href="<?=ADMIN_BASE_URL.'logout'?>">Log out</a>
                </div>
            </div>
        </div>
    </nav>
    
    
    
    
    
 