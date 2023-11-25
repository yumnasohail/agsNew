<style>
  table tbody tr td{
    width:50%;
  }
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Federasjoner</h1>
              <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL . 'federations'; ?>">&nbsp;&nbsp;&nbsp;Back</a> 

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
                    $hidden = array('hdnId' => $update_id, 'hdnActive' => $news['status']); ////edit case
                }
                if (isset($hidden) && !empty($hidden))
                    echo form_open_multipart(ADMIN_BASE_URL . 'federations/submit/' . $update_id, $attributes, $hidden);
                else
                    echo form_open_multipart(ADMIN_BASE_URL . 'federations/submit/' . $update_id, $attributes);
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
                                    'name' => 'title',
                                    'id' => 'title',
                                    'class' => 'form-control',
                                    'value' => $news['title'],
                                    'type' => 'text',
                                    'required' => 'required'
                                );
                                ?>
                                <label>kort Tittel</label>
                                <?php echo form_input($data); ?>
                                <small class="form-text text-muted">If you have any short name of federation else just write the same.</small>
                        </div>
                    </div>


                <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button  class="btn btn-outline-primary " type="submit" ><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'federations'; ?>">
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

