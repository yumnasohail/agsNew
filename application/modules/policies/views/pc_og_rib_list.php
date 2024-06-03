<main>
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                <h1 class="color-theme-1">PC og RIB per policy</h1>
                <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL.'policies/new_pc_og_rib/' ?>">&nbsp;&nbsp;&nbsp; + Add</a>
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
                                        <th>Polise</th>
                                        <th>Periode</th>
                                        <th>Kontrakts-ID</th>
                                        <th>RIB</th>
                                        <th>Profit comission</th>
                                        <th>Date</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php 
                                    foreach($pc_og_rib as $key => $value): 
                                    $period = Modules::run('api/_get_specific_table_with_pagination',array('id'=>$value['period_id']), "id desc","policy_period","start_date,end_date,contract_id","","")->row_array();
                                    $policy = Modules::run('api/_get_specific_table_with_pagination',array('id'=>$value['policy_id']), "id desc","policies","policy_title","","")->row_array();

                                    ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-muted"><?php echo $policy['policy_title']; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo "(".date("d/m/Y", strtotime($period['start_date']))." - ".date("d/m/Y", strtotime($period['end_date'])).")"; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $period['contract_id'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['rib'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['pc'] ?></p>
                                        </td>
                                        
                                        <td>
                                            <p class="text-muted"><?php echo date("d/m/Y", strtotime($value['date']));  ?></p>
                                        </td>
                                        
                                        <td>
                                            <a href="<?php echo ADMIN_BASE_URL.'policies/edit_pc_og_rib/'.$value['id']; ?>"><i style="cursor:pointer;" class="iconsminds-file-edit"></i></a>
                                        </td>
                                        <td>
                                            <a class="delete" rel="<?php echo $value['id']; ?>"><i style="cursor:pointer;" class="iconsminds-close"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
     $(document).off("click",".delete").on("click",".delete", function(event) {
            event.preventDefault();
            var id = $(this).attr('rel');
             $.ajax({
                type: 'post',
                url: "<?= ADMIN_BASE_URL ?>policies/delete_pc_og_rib",
                data: {'id': id},
                async: false,
                success: function(result) {
                    location.reload();
                    toastr.success('Deleted Successfully');
                }
            });
           
        });
</script>