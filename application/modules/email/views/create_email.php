
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
​
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.html-editor{
	width: 100%;
	height: 45%;
}
​
.save-btn{
  padding-left: 2%;
  padding-right: 2%;
}
.close-btn{
  padding-left: 1.5%;
  padding-right: 1.5%;
}
#mce_55{
  width: 85% !important;
  margin-left: 7%;
}
#mce_109{
  width: 85% !important;
  margin-left: 7%;
}
#mce_163{
  width: 85% !important;
  margin-left: 7%;
}
#mce_217{
  width: 85% !important;
  margin-left: 7%;
}
#mce_271{
  width: 85% !important;
  margin-left: 7%;
}
.frst_txt{
  margin-left: 4%;
}
</style>
​
​
 <?php $update_id = $email['id']; ?>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Create emails</h1>
              <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL . 'email'; ?>">&nbsp;&nbsp;&nbsp;Back</a> 
​
              <div class="separator mb-5"></div>
          </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12 col-lg-12 col-12 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="mb-4">
                
                </h5>
                <?php
                $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
                    echo form_open_multipart(ADMIN_BASE_URL . 'email/submit/'.$update_id , $attributes);
                ?>
​
                  <div class="form-body section-box">
                    <div class="row">
​
                        <div class=" col-md-11 col-sm-11 frst_txt">
                        <div class="card-body ">
                           
                            <fieldset class="border-theme1">
                            <legend>Email for approving claim</legend>
                            <textarea  class="ckeditor" id="" name="appr_claim" ><?=(isset($email['appr_claim']) && !empty($email['appr_claim']) ? $email['appr_claim'] : '')?></textarea>
                          </fieldset>
                        </div>
                    </div>
​
​
                      <div class=" col-md-11 col-sm-11 frst_txt">
                        <div class="card-body ">
                            <!-- <h5 class="mb-4">Email for rejecting claim</h5> -->
                            <fieldset class="border-theme1">
                            <legend>Email for rejecting claim</legend>
                            <textarea  class="ckeditor" id="" name="rej_claim"><?=(isset($email['rej_claim']) && !empty($email['rej_claim']) ? $email['rej_claim'] : '')?></textarea></fieldset>
                        </div>
                    </div>
​
                       <div class=" col-md-11 col-sm-11 frst_txt">
                        <div class="card-body ">
                            <!-- <h5 class="mb-4">Email for closing claim</h5> -->
                            <fieldset class="border-theme1">
                            <legend>Email for closing claim</legend>
                            <textarea  class="ckeditor" id="" name="close_claim"><?=(isset($email['close_claim']) && !empty($email['close_claim']) ? $email['close_claim'] : '')?></textarea></fieldset>
                        </div>
                    </div>
​
								<div class=" col-md-11 col-sm-11 frst_txt">
                        <div class="card-body ">
                            <!-- <h5 class="mb-4">Email for updating claim</h5> -->
                            <fieldset class="border-theme1">
                            <legend>Email for updating claim</legend>
                            <textarea  class="ckeditor" id="" name="updt_claim"><?=(isset($email['updt_claim']) && !empty($email['updt_claim']) ? $email['updt_claim'] : '')?></textarea></fieldset>
                        </div>
                    </div>
​
								<div class=" col-md-11 col-sm-11 frst_txt">
                        <div class="card-body ">
                            <!-- <h5 class="mb-4">Email for approving transaction</h5> -->
                            <fieldset class="border-theme1">
                            <legend>Email for approving transaction</legend>
                            <textarea  class="ckeditor" id="" name="appr_trans"><?=(isset($email['appr_trans']) && !empty($email['appr_trans']) ? $email['appr_trans'] : '')?></textarea></fieldset>
                        </div>
                    </div>
                    </div>
​
​
                <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-12 col-sm-12" style="text-align: center;">
                      <div class="col-md-offset-2 col-md-12" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button  class="btn btn-outline-primary save-btn " type="submit" ><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'email'; ?>">
                        <button type="button" class="btn btn-outline-primary close-btn " style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                        </a> </div>
                    </div>
                    <div class="col-md-6"> </div>
                  </div>
                </div>
                
                <?php echo form_close(); ?> 
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>
