<?php
function timezone_menu2($default = 'UTC', $class = "form-control select2me", $name = 'timezones')
    {
        $CI =& get_instance();
        $CI->lang->load('date');
        $zones_array = array();
          $timestamp = time();
          foreach(timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
          }

        if ($default == 'GMT')
            $default = 'UTC';

        $menu = '<select name="'.$name.'"';

        if ($class != '')
        {
            $menu .= ' class="'.$class.'"';
        }

        $menu .= ' data-placeholder="Select Time Zone ...">\n';

        foreach ($zones_array as $row)
        {
           
     
 
            $selected = ($default == $row['zone']) ? " selected='selected'" : '';
            $menu .= "<option value='{$row['zone']}'{$selected}>".$row['diff_from_GMT'].' '.$row['zone']."</option>\n";
        }

        $menu .= "</select>";

        return $menu;
    }


?>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<input type="hidden" name="old_image_name" value="<?=(isset($general_settings['pack_image']) && !empty($general_settings['pack_image']) ?$general_settings['pack_image'] : '');?>" >
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<?php
									if (!isset($pack_id) ||empty($pack_id))
										$pack_id = 0;
								?>
								<h3 class="m-portlet__head-text">
                                    <i class="fa fa-list"></i>
								
									 Update General Setting
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			 <?php
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal no-mrg');
                        if (!empty($general_settings))
                            $update_id = $general_settings['id'];
                        if (empty($update_id) || $update_id == 0) {
                            $update_id = 0;
                            $hidden = array('hdnId' => $update_id); ////edit case
                        } else {
                            $hidden = array('hdnId' => $update_id); ////edit case
                        }
                        echo form_open_multipart(ADMIN_BASE_URL . 'general_setting/submit/' . $update_id, $attributes, $hidden);
                    ?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Slogan <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="slogan" name="slogan" value="<?=(isset($general_settings['slogan']) && !empty($general_settings['slogan']) ? $general_settings['slogan'] : '')?>" required="required">
								</div>
							</div>
						</div>
			
						<div class="form-group m-form__group row">
							<div class="col-md-6 col-md-offset-6">
                                <div class="col-md-12">
                                    <div class="form-group last">
                                        <label for="exampleInputEmail1">
										Upload Logo:
									</label>
                                        <div class="col-md-8">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                	<img src="<?=(isset($general_settings['image']) && !empty($general_settings['image']) ? Modules::run('api/image_path_with_default',ACTUAL_GENERAL_SETTING_IMAGE_PATH,$general_settings['image'],STATIC_FRONT_IMAGE,DEFAULT_PACKAGES) : STATIC_FRONT_IMAGE.DEFAULT_PACKAGES);?>" alt=""/>
                                            	</div>
	                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
	                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileupload-new">
                                                        <i class="fa fa-paper-clip"></i> Select image
                                                    </span>
                                                    <span class="fileupload-exists">
                                                        <i class="fa fa-undo"></i> Change
                                                    </span>
                                                    <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                    <input type="file" name="outlet_fav_icon" id="outlet_fav_icon" class="default"  <?php //if($update_id==0) echo 'required="required"';?> />
                                                    <input type="hidden" id="hdn_image" value="<?php if(isset($general_settings['image'])) echo  $general_settings['image'] ?>" name="hdn_image_fav_icon"/>
                                                </span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Footer text <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="footer_text" name="footer_text" value="<?=(isset($general_settings['footer_text']) && !empty($general_settings['footer_text']) ? $general_settings['footer_text'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Promotion Heading <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="promotion_heading" name="promotion_heading" value="<?=(isset($general_settings['promotion_heading']) && !empty($general_settings['promotion_heading']) ? $general_settings['promotion_heading'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Promotion Text <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="promotion_text" name="promotion_text" value="<?=(isset($general_settings['promotion_text']) && !empty($general_settings['promotion_text']) ? $general_settings['promotion_text'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Currency <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="currency" name="currency" value="<?=(isset($general_settings['currency']) && !empty($general_settings['currency']) ? $general_settings['currency'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<legend>Contact Information:</legend>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Contact Text <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="contact_text" name="contact_text" value="<?=(isset($general_settings['contact_text']) && !empty($general_settings['contact_text']) ? $general_settings['contact_text'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Email for booking notifications <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="b_email" name="b_email" value="<?=(isset($general_settings['b_email']) && !empty($general_settings['b_email']) ? $general_settings['b_email'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Address <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="address" name="address" value="<?=(isset($general_settings['address']) && !empty($general_settings['address']) ? $general_settings['address'] : '')?>" required="required">
								</div>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Phone # <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="phone" name="phone" value="<?=(isset($general_settings['phone']) && !empty($general_settings['phone']) ? $general_settings['phone'] : '')?>" required="required">
								</div>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Email <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="email" name="email" value="<?=(isset($general_settings['email']) && !empty($general_settings['email']) ? $general_settings['email'] : '')?>" required="required">
								</div>
							</div>
						</div>
						<legend>Social Links</legend>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Facebook Link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="facebook" name="facebook" value="<?=(isset($general_settings['facebook']) && !empty($general_settings['facebook']) ? $general_settings['facebook'] : '')?>" required="required">
								</div>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Instagram Link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="instagram" name="instagram" value="<?=(isset($general_settings['instagram']) && !empty($general_settings['instagram']) ? $general_settings['instagram'] : '')?>" required="required">
								</div>
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Youtube Link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input" id="youtube" name="youtube" value="<?=(isset($general_settings['youtube']) && !empty($general_settings['youtube']) ? $general_settings['youtube'] : '')?>" required="required">
								</div>
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
									<a href="<?php echo ADMIN_BASE_URL . 'packages'; ?>">
										<button type="button"  id="cancel_edit" value="Cancel" class="btn btn-secondary">
											Cancel
										</button>
									</a>
								</div>
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
</div>
<script>
    jQuery(document).ready(function () {

//      $.fn.editable.defaults.mode = 'inline';

        $("#media_file").change(function () {
            var img = $(this).val();
            var replaced_val = img.replace("C:\\fakepath\\", '');
            $('#hdn_image').val(replaced_val);
        });

        $('.theme-panel ul li').click(function () {
            var theme = $(this).attr('data-style');
            $('#hdn_theme').val(theme);
            $('ul > li').removeClass("current");
            $("html, body").animate({scrollTop: "0px"});
        });

        $('.theme-panel ul li').removeClass('current');
        $('.theme-panel ul li').each(function () {
            var theme = $(this).attr('data-style');
            var current_theme = $('#hdn_theme').val();
            if (theme == current_theme) {
                $(this).addClass('current');
            }
        });

    });


    $("#outlet_fav_icon").change(function() {
        var img = $(this).val();
        var replaced_val = img.replace("C:\\fakepath\\", '');
        $('#hdn_image_fav_icon').val(replaced_val);
    });
</script>


