






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AGS Forsikring - Cloud Insurance - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?=STATIC_ADMIN_FONT?>iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?=STATIC_ADMIN_FONT?>simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?= STATIC_ADMIN_CSS ?>vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= STATIC_ADMIN_CSS ?>vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?= STATIC_ADMIN_CSS ?>vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="<?= STATIC_ADMIN_CSS ?>main.css" />    
    <link rel="stylesheet" href="<?= STATIC_ADMIN_CSS ?>custom.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

</head>
<script>
        function url(){
         var styling_url='<?php echo STATIC_ADMIN_CSS ?>';
         return styling_url;
        }
</script>
<body class="background no-footer show-spinner">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">AGS</p>

                            <p class="white mb-0">
                                Please use your credentials to login.
                                <br>If you are not a member, please
                                <a href="#" class="white">register</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="<?php echo ADMIN_BASE_URL; ?>">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4">Login</h6>
                            <?php
    							$attributes = array('autocomplete' => 'off', 'id' => 'login');
    							echo form_open(ADMIN_BASE_URL . 'login/submit_login', $attributes);
							?>
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control"  type="text" name="username"/>
                                    <span>Username</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" name="password" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="<?= STATIC_ADMIN_JS ?>vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= STATIC_ADMIN_JS ?>vendor/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= STATIC_ADMIN_JS ?>dore.script.js"></script>
    <script src="<?= STATIC_ADMIN_JS ?>scripts.js"></script>
</body>

</html>