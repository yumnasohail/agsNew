
 <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="color-theme-1">Roles</h1>
                    <a style="float:right;" href="<?=ADMIN_BASE_URL?>roles/create"><button type="button" class="btn btn-primary mb-1">Add</button></a>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">  
                        
                        
                        
				 <table  class="data-table data-table-feature table table-bordered border-theme1">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th width='2%'>S.No <i class="fa fa-sort" style="font-size:13px;"></th>
                        <th>Title <i class="fa fa-sort" style="font-size:13px;"></th>
                        <th class="" style="width:200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions</th>
                        </tr>
                        </thead>
                        <tbody class="courser table-body">
                        <?php
                        $i = 0;
                        if (isset($roles)) { foreach ($roles as $row) {
							$i++;
							$edit_url = ADMIN_BASE_URL . 'roles/create/' . $row['id']; 
                            if($row['role'] =='portal admin'){ $i++; continue; }
							?>
							<tr id="Row_<?=$row['id']?>" class="odd gradeX">
							<td class="sr"><?php echo $i;?></td>
							<td><?php echo $row['role']?></td>
							<td nowrap="">
							<?php
                            $permission_url = ADMIN_BASE_URL . 'permission/manage/'.$row['id'].'/'.$row['outlet_id'].'/'.$row['role'];
                            ?>
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="iconsminds-receipt-4"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item " href="<?=$permission_url ?>" rel="<?=$row->id?>"><i class="simple-icon-eye"></i> Permissions</a>
										<a class="dropdown-item action_edit" href="<?=$edit_url?>"><i class="iconsminds-file-edit"></i> Edit Details</a>
										<a class="dropdown-item delete_record" href="javascript:void(0)" rel="<?=$row['id']?>"><i class="iconsminds-close"></i> Delete</a>
									</div>
								</span>
							</td>
							</tr>
							<?php 
                        } }
                        ?>
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
$(document).ready(function() {

    $('#sample_1').dataTable(
                {
                    "aLengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
                    "iDisplayLength": 10
                    
                }
        );

    $("#roles_listing").load( "<?= ADMIN_BASE_URL ?>roles/get_roles",{'station':<?=DEFAULT_OUTLET?>});
    $(document).off('change',"#search_station").on('change',"#search_station",function(){
        var station = $(this).val();
        $("#roles_listing").load('<?php ADMIN_BASE_URL?>roles/get_roles',{'station':station});
    });
    
    /*$("#search_outlet").change(function(){
        $("#roles_listing").load( "<? //= ADMIN_BASE_URL ?>roles/get_roles");
    });*/
});

    $(document).on("submit","form#roles_form", function(event){
        event.preventDefault();
        $("#role_spinners").show();
        $.ajax({
            type: "POST",
            url:  "<?= ADMIN_BASE_URL ?>roles/submit",
            data: $("#roles_form").serialize(),
            success: function(type){ 
                $("#role_spinners").hide();
                $("#roles_listing").load( "<?= ADMIN_BASE_URL ?>roles/get_roles",function() {
                //var outlet_text = $("#outlet option:selected").text();
                //$('#search_outlet option').filter(function() { return $(this).text() == outlet_text; }).attr('selected',true);
                    $('form#roles_form').find(":input").val('');
                    if(type == 1)
                        var message = 'Role Saved Successfully.';
                    if(type == 2)
                        var message = 'Role Updated Successfully.';
                    if(type == 3)
                    {
                        var message = 'Role already exists.';
                        toastr.error(message);
                        return;
                    }
                    if(type == 'no_permission'){
                        var message = 'You don\'t have permission.';
                        toastr.error(message);
                        return;
                    }
                    toastr.success(message);
                });
            }
        });
    });
    
   /* $(document).on("click","#role_edit", function(event){
        event.preventDefault();
        var role_id = $(this).attr('rel');
            $.ajax({
            type: "POST",
            url:  "<?=ADMIN_BASE_URL ?>roles/edit_role",
            data: {role_id: role_id},
            success: function(form_html){
                $("#role_spinners").hide();
                if(form_html == 'no_permission'){
                        var message = 'You don\'t have permission.';
                        toastr.error(message);
                        return;
                    } 
                $("#roles_form_div").html('');
                $("#roles_form_div").html(form_html);
                $("html, body").animate({ scrollTop: "0px" });
            }
        });

    });*/
    
      $(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
        swal({
            title : "Are you sure to delete the selected Role?",
            text : "You will not be able to recover this Role!",
            type : "warning",
            showCancelButton : true,
             confirmButtonColor : "#DD6B55",
            confirmButtonText : "Yes, delete it!",
            closeOnConfirm : false
        },
        function () {
            $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>roles/delete_role",
            data: {'id': id},
            async: false,
            success: function(data) {
               
             if (data  > 0) {
               toastr.error('Error : Role Is Assigned To User ');
               setTimeout(function() {   
                       location.reload()
                     }, 2000);
               return false;
             }
             else
             {
                $("#sample_1").load("<?= ADMIN_BASE_URL ?>roles/roles_load_listing");
                swal("Deleted!", "Role has been deleted.", "success");
             }
            }
            });
          
      });
    });
</script>