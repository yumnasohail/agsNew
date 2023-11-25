 <?php   $federation=$this->uri->segment(3);   ?>
 <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="color-theme-1">Adressebok</h1>
                    <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL . 'addressbook/create'; ?>">&nbsp;&nbsp;&nbsp; + Add</a>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="data-table data-table-feature table table-bordered border-theme1">
                                <thead class="bg-th background-theme1">
                                <tr class="bg-col">
                                <th class="sr">Ref.</th>
                                <th>Navn</th>
                                <th>Adresse</th>
                                <th>Postnr/sted</th>
                                <th>Kontonr.</th>
                                <th class="" style="width:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handling</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $i = 0;
                                        if (isset($news)) {
                                            foreach ($news->result() as
                                                    $new) {
                                                $i++;
                                                $set_publish_url = ADMIN_BASE_URL . 'addressbook/set_publish/' . $new->id;
                                                $set_unpublish_url = ADMIN_BASE_URL . 'addressbook/set_unpublish/' . $new->id ;
                                                $edit_url = ADMIN_BASE_URL . 'addressbook/create/'. $new->id ;
                                                $delete_url = ADMIN_BASE_URL . 'addressbook/delete/' . $new->id;
                                                ?>
                                                <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                                <td width='2%'><?php echo $i;?></td>
                                                <td><?php echo $new->name;  ?></td>
                                                <td><?php echo $new->address;  ?></td>
                                                <td><?php echo $new->postal_code." / ".$new->place;  ?></td>
                                                <td><?php echo $new->account_no;  ?></td>
                                                <td class="table_action">
                                                <?php
                                                $publish_class = ' table_action_publish';
                                                $publis_title = 'Set Un-Publish';
                                                $icon = '<i class="iconsminds-to-top-2"></i>';
                                                $iconbgclass = '  green c-btn';
                                                if ($new->status != 1) {
                                                $publish_class = ' table_action_unpublish';
                                                $publis_title = 'Set Publish';
                                                $icon = '<i class="iconsminds-to-bottom"></i>';
                                                $iconbgclass = '  default c-btn';
                                                }
                                                echo anchor("javascript:;",$icon, array('class' => 'action_publish' . $publish_class . $iconbgclass, 
                                                'title' => $publis_title,'rel' => $new->id,'id' => $new->id, 'status' => $new->status));

                                                echo anchor($edit_url, '<i class="iconsminds-file-edit"></i>', array('class' => 'action_edit  blue c-btn','title' => 'Edit Dekningskategori'));

                                                echo anchor('"javascript:;"', '<i class="iconsminds-close"></i>', array('class' => 'delete_record  red c-btn', 'rel' => $new->id, 'title' => 'Delete Dekningskategori'));
                                                ?>
                                                </td>
                                            </tr>
                                            <?php } ?>    
                                        <?php } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script type="text/javascript">




$(document).ready(function(){

    /*//////////////////////// code for detail //////////////////////////*/

            $(document).on("click", ".view_details", function(event){
            event.preventDefault();
            var id = $(this).attr('rel');
            //alert(id); return false;
              $.ajax({
                    type: 'post',
                    url: "<?php echo ADMIN_BASE_URL?>addressbook/get_claim_detail",
                    data: {'id': id},
                    async: false,
                    success: function(test_body) {
                    var test_desc = test_body;
                    $('#myModal').modal('show')
                    $("#myModal .modal-body").html(test_desc);
                    }
                });
            });

    /*///////////////////////// end for code detail //////////////////////////////*/

          $(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
                var id = $(this).attr('rel');
                e.preventDefault();
              swal({
                title : "Are you sure to delete the selected addressbook?",
                text : "You will not be able to recover this addressbook!",
                type : "warning",
                showCancelButton : true,
                confirmButtonColor : "#DD6B55",
                confirmButtonText : "Yes, delete it!",
                closeOnConfirm : false
              },
                function () {
                    
                       $.ajax({
                            type: 'post',
                            url: "<?php echo ADMIN_BASE_URL?>addressbook/delete",
                            data: {'id': id},
                            async: false,
                            success: function() {
                            location.reload();
                            }
                        });
                swal("Deleted!", "addressbook has been deleted.", "success");
              });

            });

       
    /*///////////////////////////////// START STATUS  ///////////////////////////////////*/
        
        $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
            event.preventDefault();
            var id = $(this).attr('rel');
            var status = $(this).attr('status');
             $.ajax({
                type: 'post',
                url: "<?= ADMIN_BASE_URL ?>addressbook/change_status",
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
    /*///////////////////////////////// END STATUS  ///////////////////////////////////*/

});

$(document).ready(function() {
        $("#news_file").change(function() {
            var img = $(this).val();
            var replaced_val = img.replace("C:\\fakepath\\", '');
            $('#hdn_image').val(replaced_val);
        });
    });
</script>

