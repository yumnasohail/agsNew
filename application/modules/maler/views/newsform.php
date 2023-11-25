<style>
  table tbody tr td{
    width:50%;
  }
  .contain_1
  {
    width:80%;
    margin:0 auto;
  }
  .saves{
    text-align: center;
  }
  .mce-menu-has-icons{
    top: 1105.38px;
  }
  div < div < div < i{
    top: 1810.38px !important;
  }
  #mce-1009{
    margin-top: 1071.38px !important;
  }
  .ck>div{
    top: 1070.38px !important;
  }
  .mce-tooltip-n > div{
    top: 1070.38px !important;
  }
</style>
<?php $update_id = $news['id']; ?>
<?php $updates = $this->uri->segment(4); ?>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Mails</h1>
              

              <div class="separator mb-5"></div>
          </div>
      </div>

        <?php
              $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
              if (empty($update_id)) {
                  $update_id = 0;
              } else {
                  $hidden = array('hdnId' => $update_id); ////edit case
              }
              if (isset($hidden) && !empty($hidden))
                  echo form_open_multipart(ADMIN_BASE_URL . 'maler/submit/' .$updates.'/'. $update_id, $attributes, $hidden);
              else
                  echo form_open_multipart(ADMIN_BASE_URL . 'maler/submit/'.$updates.'/'. $update_id, $attributes);
        ?>

           <div class="col-md-12 col-lg-12 col-12 mb-4">
              <div class="card">
                  <div class="card-header col-xl-12 class-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <ul class="nav nav-tabs card-header-tabs" role="tablist" style="width: 20%;">
                          <li class="nav-item w-50 text-center">
                              <a class="nav-link active" id="first-tab_" data-toggle="tab"
                                  href="#firstFull" role="tab" aria-controls="first"
                                  aria-selected="true">Maler</a>
                          </li>
                          <li class="nav-item w-50 text-center">
                              <a class="nav-link" id="second-tab_" data-toggle="tab" href="#secondFull"
                                  role="tab" aria-controls="second" aria-selected="false">E-post</a>
                          </li>
                      </ul>
                  </div>
                  <div class="card-body">
                      <div class="tab-content">
                          <div class="tab-pane fade show active" id="firstFull" role="tabpanel"
                              aria-labelledby="first-tab_">
                              <div class="row mb-4">
                                  <div class="col-md-12 col-lg-12 col-12 mb-4">
                              
                                   
                                          <h5 class="mb-4">
                                          
                                          </h5>
                                       
                                            <div class="form-body section-box">
                                              <div class="row">
                                              
                                              <input type="hidden"  name="f_id" value="<?php echo $f_id; ?>">
                                                  </div>
                                              </div>
                                            <fieldset class="border-theme1">
                                                  <legend>SMTP information</legend>
                                                <div class="row contain_1">
                                                    <div class="col-sm-6 col-md-6 form-group position-relative inpts error-l-50">
                                                       <label><b>Username</b></label>
                                                      <input type="text" name="username" class="form-control inpt" value="<?php echo $news['username']?>">   
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 form-group position-relative inpt1 error-l-50">
                                                       <label><b>Password</b></label>
                                                       <input type="text" name="password" class="form-control inpt" value="<?php echo $news['password']?>">
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 form-group position-relative inpt1 error-l-50">
                                                       <label><b>Host</b></label>
                                                       <input type="text" name="host" class="form-control inpt" value="<?php echo $news['host']?>">
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 form-group position-relative inpt1 error-l-50">
                                                       <label><b>Port</b></label>
                                                       <input type="text" name="port" class="form-control inpt" value="<?php echo $news['port']?>">
                                                    </div>
                                                </div>
                                            </fieldset>
                                                
                                              <div class="form-actions fluid no-mrg saves">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="col-md-offset-2 col-md-12" style="padding-top:15px;">
                                                     <span style="margin-left:40px"></span> <button style="    width: 350px;" class="btn btn-outline-primary " type="submit" ><i class="fa fa-check"></i>&nbsp;Save</button>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-6"> </div>
                                                </div>
                                              </div>
                                        </div>
                                   
                              
                                </div>
                              </div>
                          <div class="tab-pane fade" id="secondFull" role="tabpanel"
                              aria-labelledby="second-tab_">
                                <div class="container-fluid">
                                  <div class="row">
                                      
                                  </div>
                                  <div class="row mb-4">
                                    <div class="col-md-12 col-lg-12 col-12 mb-4">
                                   
                                        <div class="card-body">
                                            <h5 class="mb-4">
                                            
                                            </h5>
                                              <div class="form-body section-box">
                                                <div class="row">

                                                <div class="col-xl-12 col-md-12 col-lg-12">
                                                    <fieldset class="border-theme1">
                                                  <legend>Default sender information</legend>
                                                <div class="row contain_1">
                                                    <div class="col-sm-6 col-md-6 form-group position-relative inpts error-l-50">
                                                       <label><b>Name</b></label>
                                                      <input type="text" name="name" class="form-control inpt" value="<?php echo $news['name']?>">   
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 form-group position-relative inpt1 error-l-50">
                                                       <label><b>E-post</b></label>
                                                       <input type="email" name="e-post" class="form-control inpt" value="<?php echo $news['e-post']?>">
                                                    </div>
                                                </div>
                                                </fieldset>
                                                  </div>


                                                  <div class="col-xl-12 col-md-12 col-lg-12">
                                                    <fieldset class="border-theme1">
                                                  <legend>Autoresponder to submitter</legend>
                                                <div class="row contain_1">
                                                  <div class="col-sm-6 col-md-6 form-group position-relative inpts error-l-50">
                                                       <label><b>Subject</b></label>
                                                      <input type="text" name="subject" class="form-control inpt" value="<?php echo $news['subject']?>">   
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 form-group position-relative error-l-50">
                                                       <textarea name="email"  id="" class="form-control ckeditor inpt"><?php echo $news['email']; ?></textarea> 
                                                    </div>
                                                  

                                                </div>
                                                </fieldset>
                                                  </div>

                                                  <div class="col-xl-12 col-md-12 col-lg-12">
                                                    <fieldset class="border-theme1">
                                                  <legend>Autoresponder to submitter (Oppdater)</legend>
                                                <div class="row contain_1">
                                                  <div class="col-sm-6 col-md-6 form-group position-relative inpts error-l-50">
                                                       <label><b>Subject</b></label>
                                                      <input type="text" name="subject_four" class="form-control inpt" value="<?php echo $news['subject_four']?>">   
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 form-group position-relative error-l-50">
                                                       <textarea name="email_four"  id="" class="form-control ckeditor inpt"><?php echo $news['email_four']; ?></textarea> 
                                                    </div>
                                                  

                                                </div>
                                                </fieldset>
                                                  </div>
                                                

                                                 <div class="col-xl-12 col-md-12 col-lg-12 field2">
                                                   <fieldset class="border-theme1">
                                                  <legend>Default submission to submitter - approved</legend>
                                                <div class="row contain_1">
                                                    <div class="col-sm-6 col-md-6 two_inpt form-group position-relative error-l-50">
                                                       <label><b>Subject</b></label>
                                                      <input type="text" name="subject_one" class="form-control two_inpts" value="<?php echo $news['subject_one']?>">   
                                                    </div>

                                                    <div class="col-sm-12 col-md-12 texts form-group position-relative error-l-50">
                                                       <textarea name="email_one" class="form-control ckeditor"><?php echo $news['email_one']; ?></textarea> 
                                                    </div>
                                                </div>
                                                </fieldset>
                                                 </div>
                                             

                                           
                                                 <div class="col-xl-12 col-md-12 col-lg-6 field2">
                                                    <fieldset class="border-theme1">
                                                  <legend>Default submission to submitter - rejected</legend>
                                                <div class="row contain_1">
                                                    <div class="col-sm-6 col-md-6 two_inpt form-group position-relative error-l-50">
                                                       <label><b>Subject</b></label>
                                                      <input type="text" name="subject_two" class="form-control two_inpts" value="<?php echo $news['subject_two']?>">   
                                                    </div>

                                                    <div class="col-sm-12 col-md-12 texts form-group position-relative error-l-50">
                                                       <textarea name="email_two" class="form-control ckeditor"><?php echo $news['email_two']; ?></textarea> 
                                                    </div>
                                                </div>
                                                </fieldset>
                                                 </div>


                                                <div class="col-xl-12 col-md-12 col-lg-6 field">
                                                  <fieldset class="border-theme1">
                                                  <legend>Email upon payment</legend>
                                                <div class="row contain_1">
                                                    <div class="col-sm-6 col-md-6 two_inpt form-group position-relative error-l-50">
                                                       <label><b>Subject</b></label>
                                                      <input type="text" name="subject_three" class="two_inpts form-control" value="<?php echo $news['subject_three']?>">   
                                                    </div>

                                                    <div class="col-sm-12 col-md-12 texts form-group position-relative error-l-50">
                                                       <textarea name="email_three" class="form-control ckeditor"><?php echo $news['email_three']; ?></textarea> 
                                                    </div>
                                                </div>
                                                </fieldset>
                                                </div>
                                              </div>
                                                


                                            <div class="form-actions fluid no-mrg">
                                              <div class="row">
                                                <div class="col-md-12" style="text-align: center; margin-top: 40px;">
                                                  <div class="col-md-offset-2 col-md-12" style="padding-bottom:15px;">
                                                   <span style="margin-left:40px"></span> <button  class="btn btn-outline-primary " type="submit" ><i class="fa fa-check"></i>&nbsp;Save</button>
                                                     </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                              </div>
                                            </div>  
                                          </div>
                                        </div>
                                  
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
          <?php echo form_close(); ?> 
</main>