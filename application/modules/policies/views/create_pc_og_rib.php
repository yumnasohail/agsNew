
<main>
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                <h1 class="color-theme-1">PC og RIB </h1>
                <div class="separator mb-5"></div>
                </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                    <?php 
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_policy', 'class' => 'form-horizontal');
                        echo form_open_multipart(ADMIN_BASE_URL.'policies/submit_pc_og_rib/', $attributes); ?>
                        <fieldset class="border-theme1">
                            <!--<legend>Valg</legend>-->
                            <div class="contain_auto" >
                                <input type="hidden" name="update_id" value="<?php if(isset($res['id'])) echo $res['id'];?>">
                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                    <label for="lastName">Polise</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select policy_id" id="inputGroupSelect02" name="policy_id" >
                                            <?php 
                                            foreach($policies as $key => $value){ ?>s
                                            <option <?php if(isset($res['policy_id']) && $res['policy_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['policy_title'] ?> </option>
                                            <?php  } ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                    <label for="lastName">Periode</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select period_id" id="inputGroupSelect02" name="period_id" >
                                           <?php 
                                           if(isset($policy_periods)){
                                            foreach($policy_periods as $key => $value){ ?>s
                                            <option <?php if(isset($res['period_id']) && $res['period_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['contract_id'] ." - (".date("d/m/Y", strtotime($value['start_date']))." - ".date("d/m/Y", strtotime($value['end_date'])).")" ?> </option>
                                            <?php  }
                                            }?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Fortjenesteprovisjon</label>
                                    <input type="text" class="form-control" name="pc" value="<?php if(isset($res['pc'])) echo $res['pc'];?>" required>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">RIB</label>
                                    <input type="text" class="form-control" name="rib" value="<?php if(isset($res['rib'])) echo $res['rib'];?>" required>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label>Dato</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="date" value="<?php if(isset($res['date'])) echo date("d-m-Y", strtotime($res['date'])); else echo date('d-m-Y'); ?>" id="start_date">
                                            <span class="input-group-text input-group-append input-group-addon">

                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div> 
                                    </div>
                                
                            
                            </div>
                        </fieldset>
                        <button type="button" class="btn btn-sm btn-outline-primary submit_policy" style="margin-top: 3%;">lagre </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>


$( document ).ready(function() {
   var policy_id=$('.policy_id').val();
   
     $(".period_id").empty();
    $.ajax({
                type: 'post',
                url: "<?= ADMIN_BASE_URL ?>policies/get_policy_periods",
                data: {'id': policy_id},
                async: false,
                success: function(result) {
                    $('.period_id').append(result);
                }
            });
});

 

$(document).off("click", ".submit_policy").on("click", ".submit_policy", function(event){
    event.preventDefault();
    var form = $('#form_policy');
    form = new FormData(form[0]);
    $.ajax({
        type:"post",
        url:"<?php echo ADMIN_BASE_URL.'policies/submit_pc_og_rib'; ?>",
        data:{"form_data":form},
        contentType: false,
        cache: false,
        processData:false,  
        data: form,
        success:function(result){
            var status= result.status;
            var message= result.message;
            if(status)
            {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                })
                window.location.href = "<?php echo ADMIN_BASE_URL.'policies/pc_og_rib'; ?>";

            }else
            {
                toastr.error(message);
            }
            
        }
    })
});


$('.policy_id').change(function(event) { 
    event.preventDefault();
    var policy_id=$(this).val();
     $(".period_id").empty();
    $.ajax({
                type: 'post',
                url: "<?= ADMIN_BASE_URL ?>policies/get_policy_periods",
                data: {'id': policy_id},
                async: false,
                success: function(result) {
                    $('.period_id').append(result);
                }
            });
    
});
</script>
