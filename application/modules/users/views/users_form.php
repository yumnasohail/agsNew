
					
	<main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <?php
					if (!isset($update_id) ||empty($update_id))
						$update_id = 0;
				?>

                    <h1>	<?php if(!empty($update_id)) echo "Update"; else echo "Add"; ?> User</h1>
                    
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        	<div class="card-body card-padding">
					<!--begin::Form-->
					<?php
						$attributes = array('autocomplete' => 'off','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'users/submit/' . $update_id , $attributes, $hidden);
					?> 
					        <div class="row">
					
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Username<span style="color:red">*</span></button>
                                </div>
										<?php
											if(!isset($users['user_name']) || empty($users['user_name'])) 
												$users['user_name'] = "";
										?>
										<input type="text" class="form-control" name="user_name" value="<?=$users['user_name']?>" aria-label=""
                                    aria-describedby="basic-addon1">
								</div>
                            
                            
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">First Name<span style="color:red">*</span></button>
                                    </div>
										<?php
											if(!isset($users['first_name']) || empty($users['first_name'])) 
												$users['first_name'] = "";
										?>
										<input type="text" class="form-control " name="first_name" value="<?=$users['first_name']?>" aria-label=""
                                    aria-describedby="basic-addon1">
								</div>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Last Name<span style="color:red">*</span></button>
                                    </div>
										<?php
											if(!isset($users['last_name']) || empty($users['last_name'])) 
												$users['last_name'] = "";
										?>
										<input type="text" class="form-control notrequired" name="last_name" value="<?=$users['last_name']?>" aria-label=""
                                    aria-describedby="basic-addon1">
								</div>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Country</button>
                                    </div>
									<?php
										if(!isset($users['country']) || empty($users['country'])) 
											$users['country'] = "";
									?>
									<input type="text" class="form-control notrequired" name="country" value="<?=$users['country']?>" aria-label=""
                                    aria-describedby="basic-addon1">
								</div>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">City</button>
                                    </div>
									<?php
										if(!isset($users['city']) || empty($users['city'])) 
											$users['city'] = "";
									?>
									<input type="text" class="form-control m-input notrequired" name="city" value="<?=$users['city']?>" aria-label=""
                                    aria-describedby="basic-addon1">
								</div>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">State</button>
                                    </div>
									<?php
										if(!isset($users['state']) || empty($users['state'])) 
											$users['state'] = "";
									?>
									<input type="text" class="form-control notrequired" name="state" value="<?=$users['state']?>" aria-label=""
                                    aria-describedby="basic-addon1">
								</div>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Phone#</button>
                                    </div>
										<?php
											if(!isset($users['phone']) || empty($users['phone'])) 
												$users['phone'] = "";
										?>
										<input type="text" class="form-control m-input " name="phone" value="<?=$users['phone']?>" aria-describedby="basic-addon1">
								</div>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Email<span style="color:red">*</span></button>
                                    </div>
										<?php
											if(!isset($users['email']) || empty($users['email'])) 
												$users['email'] = "";
										?>
										<input type="email" class="form-control email" name="email" value="<?=$users['email']?>" aria-describedby="basic-addon1">
								</div>
								<?php 
									if($update_id == 0) { ?>
									<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Password<span style="color:red">*</span></button>
                                    </div>
										<input type="password" class="form-control " name="password" aria-describedby="basic-addon1">
								</div>
								<?php } ?>
								<div class="col-lg-6 input-group mb-3">
									<div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Address<span style="color:red">*</span></button>
                                    </div>
										<?php
											if(!isset($users['address1']) || empty($users['address1'])) 
												$users['address1'] = "";
										?>
										<input type="text" class="form-control  notrequired" name="address1" value="<?=$users['address1']?>" aria-describedby="basic-addon1">
								</div>
							
								
								
								<div class="col-lg-6 input-group mb-4">
								    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">Gender</button>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <?php
											if(!isset($users['gender']) || empty($users['gender'])) 
												$users['gender'] = "";
										?>
                                        <input type="radio" id="customRadio1" name="gender"
                                            class="custom-control-input" <?php if(strtolower($users['gender']) == 'male') echo 'checked';?> value="male">
                                        <label class="custom-control-label" for="customRadio1" >Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="gender"
                                            class="custom-control-input"  value="female" <?php if(strtolower($users['gender']) == 'female') echo 'checked';?>>
                                        <label class="custom-control-label" for="customRadio2" >Female</label>
                                    </div>
                                </div>
                            
                            
								
								<div class="col-lg-6 input-group mb-4">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">Assign Role <span style="color:red">*</span></button>
                                    </div>
                                    <select name="role_id"  class="custom-select" id="inputGroupSelect03">
                                        	<option value="" selected="">
												Select role
											</option>
											<?php
												if(!isset($users['role_id']) || empty($users['role_id'])) 
													$users['role_id'] = "";
												if(isset($roles_title) && !empty($roles_title)) {
													foreach($roles_title as $key=> $rt): ?>
														<option <?php if($users['role_id'] == $key) echo 'selected="selected"';?> value="<?=$key?>">
															<?=$rt?>
														</option>	
													<?php 	
													endforeach;
												}
											?>
                                    </select>
                                </div>
                            
								
							</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
										<button type="submit" class="btn btn-primary submit_button">
											Submit
										</button>
										<button type="reset" class="btn btn-secondary">
											Cancel
										</button>
									</div>
								</div>
							</div>
						</div>
					<?php echo form_close(); ?> 
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
		</div>
	</div>
</div>
</main>
<script>
	var validate_input= "input[type=text],input[type=radio],input[type=email],input[type=password], select";
	function validateremove(){
      $(validate_input).off('click').click(function(){
        $('body').find(validate_input).removeClass('red_border');
		$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
      })
    }
	validateremove();
	$('.form-horizontal').submit(function(e){
		e.preventDefault();
		var self = this;
		var email = $('.email').val();
		$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
		if(validateForm()) {
			$.ajax({
				type: 'POST',
				url: "<?php echo ADMIN_BASE_URL; ?>users/check_duplicate_email",
				data: {'email': email,'user':'<?=$update_id?>'},
				async: false,
				success: function (result) {
					$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
					var message= $(result).find('message').text();
					var type= $(result).find('type').text();
					if(type == "error") {
						swal( {title: "Email all ready exist!", text: "Please select another email", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"});
						$(".email").addClass("red_border");
					}
					else{
						$(".submit_button").addClass("m-loader m-loader--light m-loader--right");
						var user_name=$(".user_name").val();
						$.ajax({
							type:"post",
							data: {'user_name': user_name,'user':'<?=$update_id?>'},
							url: "<?= ADMIN_BASE_URL?>users/validate",
							success:function(result){
								$(".submit_button").removeClass("m-loader m-loader--light m-loader--right");
								if(result == 1)
									swal( {title: "Username all ready exist!", text: "Please select another username", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"});
								else
									self.submit();
							}
						});
					}
					
				}
			});
		}
	});
	function validateForm() {
		var check = true
		$('.form-horizontal').find(validate_input).each(function(){
		if(!$(this).hasClass('notrequired') && !$(this).val()){
			check = false
			$(this).addClass('red_border')
		}
		});
		return check;
	}
</script>