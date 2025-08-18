<style>
  table tbody tr td{
    width:50%;
  }
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Nyheter</h1>
              <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL . 'news'; ?>">&nbsp;&nbsp;&nbsp;Back</a> 

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
                    echo form_open_multipart(ADMIN_BASE_URL . 'news/submit/' . $update_id, $attributes, $hidden);
                else
                    echo form_open_multipart(ADMIN_BASE_URL . 'news/submit/' . $update_id, $attributes);
                ?>
                  <div class="form-body section-box">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group last">
                          <label class="control-label col-md-4">Last opp bilde</label>
                          <div class="col-md-5">
                            <div class="thumbnail" style="width: 200px; height: 150px;">
                              <?php
                                if(!isset($news['image'])) $news['image']='';
                                $filename = UPLOAD_FRONT_NEWS.$news['image'];
                                if (!empty($news['image'])) {
                              ?>
                                <img id="previewImage" src="<?php echo UPLOAD_FRONT_NEWS.$news['image'] ?>" style="width:200px; height:150px; object-fit:cover;" />
                              <?php } else { ?>
                                <img id="previewImage" src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" style="width:200px; height:150px; object-fit:cover;" />
                              <?php } ?>
                            </div>

                            <div style="margin-top:10px;">
                            <input type="file" name="news_file" id="news_file" class="default" 
                            <?php echo empty($news['image']) ? 'required' : ''; ?> />
                              <input type="hidden" id="hdn_image" value="<?php if(isset($news['image'])) echo $news['image']; ?>" name="hdn_image"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                              <?php
                              $data = array(
                                  'name' => 'title',
                                  'id' => 'name',
                                  'class' => 'form-control',
                                  'value' => $news['title'],
                                  'type' => 'text',
                                  'required' => 'required'
                              );
                              ?>
                              <label>Tittel</label>
                              <?php echo form_input($data); ?>
                      </div>
                      <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                              <?php
                              $data = array(
                                  'name' => 'date',
                                  'id' => 'date',
                                  'class' => 'form-control',
                                  'value' => $news['date'],
                                  'type' => 'date',
                                  'required' => 'required'
                              );
                              ?>
                              <label>Dato</label>
                              <?php echo form_input($data); ?>
                      </div>
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                <?php
                                $data = array(
                                    'name' => 'author',
                                    'id' => 'author',
                                    'class' => 'form-control',
                                    'value' => $news['author'],
                                    'type' => 'text',
                                    'required' => 'required'
                                );
                                ?>
                                <label>Forfatter</label>
                                <?php echo form_input($data); ?>
                                
                        </div>
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                
                                <label>Kort beskrivelse
                                </label>
                                <textarea  class="form-control short_desc" name="short_desc" required><?php echo $news['short_desc']; ?></textarea>
                                
                        </div>
                        <div class="col-sm-6 col-md-6 form-group position-relative error-l-50">
                                
                                <label>Lang beskrivelse
                                </label>
                                <textarea class="form-control ckeditor" name="long_desc" id="long_desc"><?php echo $news['long_desc']; ?></textarea>
                                
                        </div>
                    </div>


                <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button  class="btn btn-outline-primary " type="submit" ><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'news'; ?>">
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

<script>
  document.getElementById("news_file").addEventListener("change", function(event) {
    const [file] = event.target.files;
    if (file) {
      document.getElementById("previewImage").src = URL.createObjectURL(file);
    }
  });

  $('#form_sample_1').submit(function(e) {
    var content = CKEDITOR.instances['long_desc'].getData().trim();
    if(content === '') {
        alert('Lang beskrivelse is required');
        e.preventDefault(); // prevent form submission
        return false;
    }
});
</script>