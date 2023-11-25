<style>
  table tbody tr td{
    width:50%;
  }
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Adressebok</h1>
              <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL . 'addressbook'; ?>">&nbsp;&nbsp;&nbsp;Back</a> 

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
                if (empty($update_id)) {
                    $update_id = 0;
                } else {
                    $hidden = array('hdnId' => $update_id); ////edit case
                }
                if (isset($hidden) && !empty($hidden))
                    echo form_open_multipart(ADMIN_BASE_URL . 'addressbook/submit/' . $update_id, $attributes, $hidden);
                else
                    echo form_open_multipart(ADMIN_BASE_URL . 'addressbook/submit/' . $update_id, $attributes);
                ?>
                  <div class="form-body section-box">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                <?php
                                $data = array(
                                    'name' => 'name',
                                    'id' => 'name',
                                    'class' => 'form-control',
                                    'value' => $news['name'],
                                    'type' => 'text',
                                    'required' => 'required'
                                );
                                ?>
                                <label>Navn</label>
                                <?php echo form_input($data); ?>
                        </div>
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                <?php
                                $data = array(
                                    'name' => 'address',
                                    'id' => 'address',
                                    'class' => 'form-control',
                                    'value' => $news['address'],
                                    'type' => 'text',
                                    'required' => 'required'
                                );
                                ?>
                                <label>Adresse</label>
                                <?php echo form_input($data); ?>
                        </div>
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                <?php
                                $data = array(
                                    'name' => 'postal_code',
                                    'id' => 'postal_code',
                                    'class' => 'form-control',
                                    'value' => $news['postal_code'],
                                    'type' => 'text',
                                    'required' => 'required'
                                );
                                $data1 = array(
                                  'name' => 'place',
                                  'id' => 'place',
                                  'class' => 'form-control',
                                  'value' => $news['place'],
                                  'type' => 'text',
                                  'required' => 'required'
                              );
                                ?>
                                <label>Postnr/sted</label>
                                <div class="row">
                                  <div class="col-sm-4 col-md-4">
                                    <?php echo form_input($data); ?>
                                  </div>
                                  <div class="col-sm-8 col-md-8">
                                    <?php echo form_input($data1); ?>
                                  </div>
                                </div>
                        </div>
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                <?php
                                $data = array(
                                    'name' => 'account_no',
                                    'id' => 'account_no',
                                    'class' => 'form-control',
                                    'value' => $news['account_no'],
                                    'type' => 'text',
                                    'required' => 'required'
                                );
                                ?>
                                <label>Kontonr.</label>
                                <?php echo form_input($data); ?>
                        </div>
                    </div>
                    <div class="form-body section-box">
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                          <h3>Viewing</h3>
                          <label>Vis i skjemaer</label>
                          <?php foreach($fed as $key => $value):
                           $res = Modules::run('api/get_specific_table_data',array("a_id"=>$update_id,"f_id"=>$value['id']),'id','id','federations_address',1,0)->num_rows();
                             ?>
                                <div class="custom-control custom-checkbox " style="padding-left:1.5rem">
                                    <input type="checkbox"  <?php if($res=="1") echo "checked";?> name="fed[]" value="<?php echo $value['id']; ?>"  class="custom-control-input" id="customCheckThis<?php echo $key; ?>">
                                    <label class="custom-control-label" for="customCheckThis<?php echo $key; ?>"><?php echo $value['title']; ?></label>
                                </div>
                            <?php
                        endforeach; ?> 
                        </div>
                    </div>


                <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button  class="btn btn-outline-primary " type="submit" ><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'addressbook'; ?>">
                        <button type="button" class="btn btn-outline-primary " style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
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

