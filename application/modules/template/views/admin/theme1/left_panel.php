
<?php
$outlet_id=DEFAULT_OUTLET;
$curr_url = $this->uri->segment(2);
$first_curr_url = $this->uri->segment(3);
$secon_curr_url = $this->uri->segment(4);
$active="active";

?>
<div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'dashboard');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'dashboard'){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'dashboard'; ?>">
                            <i class="iconsminds-line-chart-1"></i>Dashboard
                            <span></span>
                        </a>
                    </li>
                      <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'policies');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'policies' || $curr_url =='reports' || $curr_url =='insurers' || $curr_url =='coverage_category' || $curr_url =='federations'){echo $active;} ?>">
                        <a href="#administrator">
                            <i class="iconsminds-administrator"></i>Administrasjon
                        </a>
                    </li>
                    <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'godkjen');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if( $curr_url =='premiums'  ||  $curr_url =='addressbook' || $curr_url =='godkjen'){echo $active;} ?>">
                        <a href="#economy">
                            <i class="iconsminds-bar-chart-4"></i>Okonomi
                        </a>
                    </li>
                    <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'claims');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'claims' || $curr_url =='maler' || $curr_url =='logs'){echo $active;} ?>">
                        <a href="#ui">
                            <i class="iconsminds-folder-open"></i>Skadeskjema
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="ui">
                    <?php foreach($federations as $key => $value):?>
                    <li>
                        <a  data-toggle="collapse" data-target="#collapseForms<?php echo $key ?>" 
                            aria-controls="collapseForms<?php echo $key ?>" class="rotate-arrow-icon  collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block" style="width: 75%;"><?php echo $value['title'] ?>
                            <span class="color-theme-1" style="float:right;">
                                <?php 
                                $res=Modules::run('api/_get_specific_table_with_pagination',array('federation'=>$value['id'],'claim_stat'=>'Ikke behandlet',"del_status"=>0), 'id desc','claims','id',1,1000)->num_rows();
                                    if($res>0)
                                        echo "(".$res.")"; 
                                ?>
                                </span>
                            </span>
                        </a>
                        <div id="collapseForms<?php echo $key ?>" class="collapse <?php if( $secon_curr_url==$value['title']){echo "show";} ?>">
                            <ul class="list-unstyled inner-level-menu">
                            <?php 
                                    if ($user_data['role'] != 'portal admin')
                                        $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'claims');
                                    else  
                                        $permission = true;
                                    if ($permission){
                                ?>
                                <li class="<?php if($curr_url == 'claims' && $secon_curr_url==$value['title']){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'claims/list/'.$value['title']; ?>">
                                        <i class="iconsminds-check"></i> <span class="d-inline-block">Skadesaker
                                        </span>
                                    </a>
                                </li>
                                <li class="<?php if($curr_url == 'logs' && $secon_curr_url==$value['title']){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'logs/list/'.$value['title']; ?>">
                                        <i class="iconsminds-receipt-4"></i> <span class="d-inline-block">Logg</span>
                                    </a>
                                </li>
                                <li class="<?php if($curr_url == 'maler' && $secon_curr_url==$value['title']){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'maler/list/'.$value['title']; ?>">
                                        <i class="iconsminds-gear"></i> <span class="d-inline-block">innstillnger</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php endforeach; ?>   

                </ul>
                <ul class="list-unstyled" data-link="administrator">
                    
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'reports');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'reports' ){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'reports'; ?>">
                            <i class="iconsminds-pie-chart-3"></i> <span class="d-inline-block">Generer rapport</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'insurers');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'insurers' ){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'insurers'; ?>">
                            <i class="iconsminds-security-block"></i> <span class="d-inline-block">Forsikringsselskaper</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'coverage_category');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'coverage_category' ){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'coverage_category'; ?>">
                            <i class="iconsminds-align-justify-all"></i> <span class="d-inline-block">Dekningskategori</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'federations');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'federations' ){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'federations'; ?>">
                            <i class="iconsminds-post-office"></i> <span class="d-inline-block">Federasjoner</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms1" 
                            aria-controls="collapseForms1" class="rotate-arrow-icon opacity-50 collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Poliser</span>
                        </a>
                        <div id="collapseForms1" class="collapse <?php if( $curr_url=="policies"){echo "show";} ?>">
                            <ul class="list-unstyled inner-level-menu">
                            <?php 
                                    if ($user_data['role'] != 'portal admin')
                                        $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'policies');
                                    else  
                                        $permission = true;
                                    if ($permission){
                                ?>
                                <li class="<?php if($curr_url == 'policies' && $first_curr_url=="overview"){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'policies/overview'; ?>">
                                        <i class="iconsminds-preview"></i> <span class="d-inline-block">Oversikt</span>
                                    </a>
                                </li>
                                <!--<li class="<?php if($curr_url == 'policies' && $first_curr_url=="statistics"){echo $active;} ?>">-->
                                <!--    <a href="<?php echo ADMIN_BASE_URL.'policies/statistics'; ?>">-->
                                <!--        <i class="iconsminds-statistic"></i> <span class="d-inline-block">Statistikk</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <li class="<?php if($curr_url == 'policies' && $first_curr_url=="create"){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'policies/create'; ?>">
                                        <i class="iconsminds-letter-open"></i> <span class="d-inline-block">Ny Polise</span>
                                    </a>
                                </li>
                                <li class="<?php if($curr_url == 'policies' && $first_curr_url=="period"){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'policies/period'; ?>">
                                        <i class="iconsminds-clock-forward"></i> <span class="d-inline-block">Ny Slip and Polise <br>Info</span>
                                    </a>
                                </li>
                                <li class="<?php if($curr_url == 'policies' && $first_curr_url=="pc_og_rib"){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'policies/pc_og_rib'; ?>">
                                        <i class="iconsminds-letter-open"></i> <span class="d-inline-block">PC og RIB per policy</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>

                </ul>
                <ul class="list-unstyled" data-link="economy">
                    
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'godkjen');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'godkjen' && $first_curr_url == '' ){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'godkjen'; ?>">
                            <i class="iconsminds-box-full"></i> <span class="d-inline-block">Godkjenn</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php 
                        if ($user_data['role'] != 'portal admin')
                            $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'premiums');
                        else  
                            $permission = true;
                        if ($permission){
                    ?>
                    <li class="<?php if($curr_url == 'premiums' ){echo $active;} ?>">
                        <a href="<?php echo ADMIN_BASE_URL.'premiums'; ?>">
                            <i class="iconsminds-diamond"></i> <span class="d-inline-block">Forsikringspremie</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms1" 
                            aria-controls="collapseForms1" class="rotate-arrow-icon opacity-50 collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Adressebok</span>
                        </a>
                        <div id="collapseForms1" class="collapse <?php if( $curr_url=="addressbook"){echo "show";} ?>">
                            <ul class="list-unstyled inner-level-menu">
                            <?php 
                                    if ($user_data['role'] != 'portal admin')
                                        $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'addressbook');
                                    else  
                                        $permission = true;
                                    if ($permission){
                                ?>
                                <li class="<?php if($curr_url == 'addressbook' && $first_curr_url=="list"){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'addressbook/list'; ?>">
                                        <i class="iconsminds-preview"></i> <span class="d-inline-block">Oversikt</span>
                                    </a>
                                </li>
                                <li class="<?php if($curr_url == 'addressbook' && $first_curr_url=="create"){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'addressbook/create'; ?>">
                                        <i class="iconsminds-download-1"></i> <span class="d-inline-block">Ny Kontakt</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms2" 
                            aria-controls="collapseForms2" class="rotate-arrow-icon opacity-50 collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Betalingsfiler</span>
                        </a>
                        <div id="collapseForms2" class="collapse <?php if( $curr_url=="godkjen"){echo "show";} ?>">
                            <ul class="list-unstyled inner-level-menu">
                            <?php 
                                    if ($user_data['role'] != 'portal admin')
                                        $permission = Modules:: run('permission/has_control_permission',$role_id,$outlet_id,'godkjen');
                                    else  
                                        $permission = true;
                                    if ($permission){
                                ?>
                                <li class="<?php if($curr_url == 'godkjen' && $first_curr_url == 'overview' ){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'godkjen/overview'; ?>">
                                        <i class="iconsminds-preview"></i> <span class="d-inline-block">Oversikt</span>
                                    </a>
                                </li>
                                <li class="<?php if($curr_url == 'godkjen' && $first_curr_url == 'betalingsfil' ){echo $active;} ?>">
                                    <a href="<?php echo ADMIN_BASE_URL.'godkjen/betalingsfil'; ?>">
                                        <i class="iconsminds-download-1"></i> <span class="d-inline-block">Ny Betalingsfil</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>

                </ul>


            </div>
        </div>
    </div>