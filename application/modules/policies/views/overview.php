<style>
    input{
        border:1px solid #b9b5b5;
    }
</style>
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
                                        <th></th>
                                        <th>polise</th>
                                        <th>periode</th>
                                        <th>Forsikringsselskapet</th>
                                        <th>Kontrakts-ID</th>
                                        <th>AGS-policynummer</th>
                                        <th>Kommisjon</th>
                                        <th>Egenandel</th>
                                        <th>Valuta</th>
                                        <th>RIB</th>
                                        <th>RIB Comment</th>
                                        <th>Profit comission</th>
                                        <th>PC Comment</th>
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
                                    <tr id="policy-row-<?php echo $value['id']; ?>">
                                        <td>
                                            <input type="checkbox" data-name="policy_check"  value="<?php echo $value['policy_check']; ?>" <?php if($value['policy_check']==1) echo "checked"; ?> class="policy_check" data-id="<?php echo $value['id']; ?>">
                                        </td>
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
                                            <input type="text" data-name="rib_comment" data-id="<?php echo  $value['id']; ?>" class="rib_comment" value="<?php echo  $value['rib_comment']; ?>" >
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['profit_comission'] ?></p>
                                        </td>
                                        <td>
                                        <input type="text" data-name="pc_comment" data-id="<?php echo  $value['id']; ?>" class="pc_comment" value="<?php echo  $value['pc_comment']; ?>" >
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

            $(document).ready(function () {
                // Handle checkbox changes
                $('.policy_check').on('change', function () {
                    let isChecked = $(this).is(':checked') ? 1 : 0; // Checkbox value: 1 for checked, 0 for unchecked
                    let id = $(this).data('id'); // Get the associated ID
                    let name = $(this).data('name');
                    // Call saveData only if the checkbox value changes
                    saveData(id, isChecked, null, null,name);
                });

                // Handle rib_comment input changes
                $('.rib_comment').each(function () {
                    $(this).data('prevValue', $(this).val()); // Store the initial value
                }).on('blur', function () {
                    let ribComment = $(this).val(); // Get the current value
                    let prevValue = $(this).data('prevValue'); // Get the previous value
                    let id = $(this).data('id'); // Get the associated ID
                    let name = $(this).data('name');
                    if (ribComment !== prevValue) { // Call saveData only if the value changes
                        $(this).data('prevValue', ribComment); // Update the stored value
                        saveData(id, null, ribComment, null,name);
                    }
                });

                // Handle pc_comment input changes
                $('.pc_comment').each(function () {
                    $(this).data('prevValue', $(this).val()); // Store the initial value
                }).on('blur', function () {
                    let pcComment = $(this).val(); // Get the current value
                    let prevValue = $(this).data('prevValue'); // Get the previous value
                    let id = $(this).data('id'); // Get the associated ID
                    let name = $(this).data('name');
                    if (pcComment !== prevValue) { // Call saveData only if the value changes
                        $(this).data('prevValue', pcComment); // Update the stored value
                        saveData(id, null, null, pcComment,name);
                    }
                });

                // Save data function
                function saveData(id, isChecked = null, ribComment = null, pcComment = null,name) {
                    $.ajax({
                        url: "<?= ADMIN_BASE_URL ?>policies/save_policy_data",
                        method: 'POST',
                        data: {
                            id: id,
                            policy_check: isChecked,
                            rib_comment: ribComment,
                            pc_comment: pcComment,
                            name: name,
                        },
                        success: function (response) {
                            // Assuming response is in JSON format
                            const result = JSON.parse(response);
                            if (result.success) {
                                toastr.success(result.message);

                                const policyRow = $(`#policy-row-${id}`); // Assuming each policy row has an ID like `policy-row-{id}`
                                if (isChecked !== null) {
                                    policyRow.find('.policy_check').prop('checked', isChecked);
                                }
                                if (ribComment !== null) {
                                    policyRow.find('.rib_comment').val(ribComment);
                                }
                                if (pcComment !== null) {
                                    policyRow.find('.pc_comment').val(pcComment);
                                }
                            } else {
                                toastr.error(result.message);
                            }
                        },
                        error: function (xhr) {
                            toastr.error('An error occurred while saving data.');
                        }
                    });
                }
            });

</script>