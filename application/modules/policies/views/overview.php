<main>
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                <h1 class="color-theme-1">Oversikt</h1>
                <div class="separator mb-5"></div>
                </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                            <table class=" table-bordered border-theme1 table table-responsive">
                                <thead class="border-theme1 background-theme1">
                                    <tr>
                                        <th>polise</th>
                                        <th>periode</th>
                                        <th>Forsikringsselskapet</th>
                                        <th>Kontrakts-ID</th>
                                        <th>AGS-policynummer</th>
                                        <th>Kommisjon</th>
                                        <th>Egenandel</th>
                                        <th>Valuta</th>
                                        <th>RIB</th>
                                        <th>Profit comission</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <?php 
                                $federation="";
                                    foreach($policies as $key => $value): 
                                    if($federation!=$value['title']){
                                    ?>
                                <thead class=" border-theme1 ">
                                    <tr>
                                        <th colspan="10" style="text-align: center;"><?php echo $value['title'] ?></th>
                                    </tr>
                                </thead>
                                    <?php }
                                    $federation=$value['title']; ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-muted"><?php echo $value['policy_title']; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo "(".date("d/m/Y", strtotime($value['start_date']))." - ".date("d/m/Y", strtotime($value['end_date'])).")"; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['name'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['contract_id'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['ags_policy_no'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['comission'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['deductible'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['currency'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['rib'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['profit_comission'] ?></p>
                                        </td>
                                        <td>
                                        <?php
                                                $publish_class = ' table_action_publish';
                                                $publis_title = 'Set Un-Publish';
                                                $icon = '<i class="iconsminds-to-top-2"></i>';
                                                $iconbgclass = '  green c-btn';
                                                if ($value['status'] != 1) {
                                                $publish_class = ' table_action_unpublish';
                                                $publis_title = 'Set Publish';
                                                $icon = '<i class="iconsminds-to-bottom"></i>';
                                                $iconbgclass = '  default c-btn';
                                                }
                                                echo anchor("javascript:;",$icon, array('class' => 'action_publish' . $publish_class . $iconbgclass, 
                                                'title' => $publis_title,'rel' =>  $value['id'], 'status' => $value['status']));
                                                ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo ADMIN_BASE_URL.'policies/edit_policy/'.$value['id']; ?>"><i style="cursor:pointer;" class="iconsminds-file-edit"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <p>
                                Total politikk i systemet: <?php echo $total_policies; ?>
                                <br>
                                Totale policyperioder i systemet: <?php echo $total_periods; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
     $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
            event.preventDefault();
            var id = $(this).attr('rel');
            var status = $(this).attr('status');
             $.ajax({
                type: 'post',
                url: "<?= ADMIN_BASE_URL ?>policies/change_status",
                data: {'id': id, 'status': status},
                async: false,
                success: function(result) {
                    if($('#'+id).hasClass('default')==true)
                    {
                        $('#'+id).addClass('green');
                        $('#'+id).removeClass('default');
                        $('#'+id).find('i.fa-long-arrow-down').removeClass('fa-long-arrow-down').addClass('fa-long-arrow-up');
                    }else{
                        $('#'+id).addClass('default');
                        $('#'+id).removeClass('green');
                        $('#'+id).find('i.fa-long-arrow-up').removeClass('fa-long-arrow-up').addClass('fa-long-arrow-down');
                    }
                    location.reload();
                    toastr.success('Status Changed Successfully');
                }
            });
           
        });
</script>