 <?php   $federation=$this->uri->segment(3);   ?>
 <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="color-theme-1">Skadesaker</h1>
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
                                <th>Klubb</th>
                                <th>Brukerendring</th>
                                <th>status</th>
                                <th class="" style="width:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Snarveier</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $i = 0;
                                        if (isset($news)) {
                                            foreach ($news->result() as
                                                    $new) {
                                                $i++;
                                                $set_publish_url = ADMIN_BASE_URL . 'claims/set_publish/' . $new->id;
                                                $set_unpublish_url = ADMIN_BASE_URL . 'claims/set_unpublish/' . $new->id ;
                                                $edit_url = ADMIN_BASE_URL . 'claims/manage/'.$federation.'/' . $new->id ;
                                                $delete_url = ADMIN_BASE_URL . 'claims/delete/' . $new->id;
                                                ?>
                                                <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                                <td width='2%'><?php echo $new->id;?></td>
                                                <td><?php echo $new->c_contact;  ?></td>
                                                <td><?php echo $new->federation_title; ?></td>
                                                <td><?php echo $new->claim_datetime   ?></td>
                                                <td style="<?php if($new->claim_stat=='Ikke behandlet'){ echo "background-color:rgb(254 255 214)";}elseif($new->claim_stat=='Godkjent') { echo "color:green"; }else if($new->claim_stat=='Avslatt'){ echo "color:red;";} ?>"><?php echo $new->claim_stat;   ?></td>
                                                <td class="table_action">
                                                <a class=" yellow c-btn view_details" rel="<?=$new->id?>"><i class="iconsminds-receipt-4"  title="See Detail"></i></a>
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

                                                echo anchor($edit_url, '<i class="iconsminds-file-edit"></i>', array('class' => 'action_edit  blue c-btn','title' => 'Edit claims'));

                                                echo anchor('"javascript:;"', '<i class="iconsminds-close"></i>', array('class' => 'delete_record  red c-btn', 'rel' => $new->id, 'title' => 'Delete claims'));
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
                    url: "<?php echo ADMIN_BASE_URL?>claims/get_claim_detail",
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
                title : "Are you sure to delete the selected claims?",
                text : "You will not be able to recover this claims!",
                type : "warning",
                showCancelButton : true,
                confirmButtonColor : "#DD6B55",
                confirmButtonText : "Yes, delete it!",
                closeOnConfirm : false
              },
                function () {
                    
                       $.ajax({
                            type: 'post',
                            url: "<?php echo ADMIN_BASE_URL?>claims/delete",
                            data: {'id': id},
                            async: false,
                            success: function() {
                            location.reload();
                            }
                        });
                swal("Deleted!", "claims has been deleted.", "success");
              });

            });

       
    /*///////////////////////////////// START STATUS  ///////////////////////////////////*/
        
        $(document).off("click",".action_publish").on("click",".action_publish", function(event) {
            event.preventDefault();
            var id = $(this).attr('rel');
            var status = $(this).attr('status');
             $.ajax({
                type: 'post',
                url: "<?= ADMIN_BASE_URL ?>claims/change_status",
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
                    $("#listing").load('<?php ADMIN_BASE_URL?>claims/manage');
                    toastr.success('Status Changed Successfully');
                }
            });
            if (status == 1) {
                $(this).removeClass('table_action_publish');
                $(this).addClass('table_action_unpublish');
                $(this).attr('title', 'Set Publish');
                $(this).attr('status', '0');
            } else {
                $(this).removeClass('table_action_unpublish');
                $(this).addClass('table_action_publish');
                $(this).attr('title', 'Set Un-Publish');
                $(this).attr('status', '1');
            }
           
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

