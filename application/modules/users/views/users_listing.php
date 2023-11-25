 <main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
                <a style="float:right;" href="<?=ADMIN_BASE_URL?>users/create"><button type="button" class="btn btn-primary mb-1">Add</button></a>
                <div class="separator mb-5"></div>
                
            </div>
            
        </div>
        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="data-table data-table-feature">
                            <thead>
                                <tr>
                                    <th>
        								S.No
        							</th>
        							<th>
        								User Name
        							</th>
        							<th>
        								Full Name
        							</th>
        							<th>
        								Email
        							</th>
        							<th>
        								Phone
        							</th>
        							<th>
        								Status
        							</th>
        							<th>
        								Actions
        							</th>
                                </tr>
                            </thead>
                            	<tbody>
        			<?php
                	$i = 0;
                	if (isset($users_rec)) {
                    	foreach ($users_rec as $row):
                        	$i++;
                        	$edit_url = ADMIN_BASE_URL . 'users/create/' . $row['id'];
                       
                    ?>
        			<tr>
        				<td>
        					<?php echo $i;?>
        				</td>
        				<td>
        					<?php echo $row['user_name'];?>
        				</td>
        				<td>
        					<?php echo $row['first_name']." ".$row['last_name'];?>
        				</td>
        				<td>
        					<?php echo $row['email'];?>
        				</td>
        				<td>
        					<?php echo $row['phone'];?>
        				</td>
        				<td>
        					<?php 
        						$status_class = "danger";
        						if(isset($row['status']) && !empty($row['status']))
        							if($row['status'] == 1)
        								$status_class = "info";
        
        					?>
        					<span class="m-badge  m-badge--<?=$status_class?> m-badge--wide">
        						<?php
        							echo ($status_class != 'danger' ? 'Active' : 'Unactive');
        						?>
        					</span>
        				</td>
        				<td >
    						<a  class="action_publish"  rel=<?=$row['id']?> status=<?=$row['status']?>><i class="simple-icon-arrow-<?php echo ($status_class != 'danger' ? 'up' : 'down');?>-circle"></i> </a>
    						<a  class="view_details"  rel="<?=$row['id']?>"><i class="iconsminds-file-clipboard-file---text"></i> </a>
    						<a  class="change_password"  rel="<?=$row['id']?>"><i class="simple-icon-eye"></i> </a>
    						<a  href="<?=$edit_url?>"><i class="iconsminds-file-edit"></i> </a>
    						<a  class="delete_record" rel=<?=$row['id']?>><i class="iconsminds-delete-file"></i> </a>
    						
        				</td>
        			</tr>
        				<?php endforeach;
        			} ?>
        		</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
	$(document).on("click", ".view_details", function(event){
        event.preventDefault();
        var id = $(this).attr('rel');
          $.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>users/detail",
			data: {'id': id},
			async: false,
			success: function(test_body) {
			var test_desc = test_body;
			$('#detail_model').modal('show');
			$("#detail_model .modal-body").html(test_desc);
			}
		});
	});
	$(document).off("click",".action_publish").on("click",".action_publish", function(event) {
		event.preventDefault();
		var id = $(this).attr('rel');
		var status = $(this).attr('status');
			$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>users/change_status_event",
			data: {'id': id, 'status': status},
			async: false,
			success: function(result) {
				toaster_success_setting();
				toastr.success("Status change successfully");
				location.reload();
			}
		});
	});
	$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected User?",
			text : "You will not be able to recover this User!",
			type : "warning",
			showCancelButton : true,
			confirmButtonColor : "#DD6B55",
			confirmButtonText : "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0,
			closeOnConfirm : false
		}).then(function(e) {
			if(e.value) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL?>users/delete",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "User has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "User has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "User is safe :)", "error");
		});
    });
	$(document).on("click", ".change_password", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>users/change_password",
			data: {'id': id},
			async: false,
			success: function(test_body) {
				var test_desc = test_body;
				$('#password_model').modal('show');
				$("#password_model .modal-body").html(test_desc);
				password_submit();
			}
		});
	});
	function password_submit() {
		$('.submit_password').off('click').click(function(e){
			e.preventDefault();
			var check = true;
			$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
			$("input[type=text],input[type=password]").off('click').click(function(){
				$('body').find("input[type=text],input[type=password]").removeClass('red_border');
				$(".submit_password").removeClass("m-loader m-loader--light m-loader--right");
			});
			$('.form-horizontal').find("input[type=text],input[type=password]").each(function(){
			if(!$(this).hasClass('notrequired') && !$(this).val()){
				check = false;
				$(this).addClass('red_border');
				$(".submit_password").removeClass("m-loader m-loader--light m-loader--right");
			}
			});
			if(check == true) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL ?>users/change_password_action",
					data: {'user_name': $('.form-horizontal').find("input[name=update]").val(), 'password':$('.form-horizontal').find("input[name=password]").val()},
					async: false,
					success: function(){
						$('#password_model').modal('hide');
						toastr.success('Password changed successfully.');
					}
				});
			}
		});
	}
</script>