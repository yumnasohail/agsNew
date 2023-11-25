
<main>
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                <h1 class="color-theme-1">Ny polise</h1>
                <div class="separator mb-5"></div>
                </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                    <?php 
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_policy', 'class' => 'form-horizontal');
                        echo form_open_multipart(ADMIN_BASE_URL.'policies/submit/', $attributes); ?>
                        <fieldset class="border-theme1">
                            <legend>Valg</legend>
                            <div class="contain_auto" >
                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                    <label for="lastName">Velg skjema</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="inputGroupSelect02" name="federation" >
                                            <option >Select</option>
                                            <?php 
                                            foreach($fed as $key => $value){ ?>s
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?> </option>
                                            <?php  } ?>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">-->
                                <!--    <label for="password">Vis forsikringstype</label>-->
                                <!--    <div class="custom-control custom-checkbox ">-->
                                <!--        <input type="checkbox" class="custom-control-input" id="insurer_link" name="insurer_link" value="1">-->
                                <!--        <label class="custom-control-label" for="insurer_link">Vis forsikringstype fra skadeskjema i forbindelse med denne polisen</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Navn</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                
                                <!--<div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">-->
                                <!--    <label for="password">PolicyNumber hos Sportscover</label>-->
                                <!--    <input type="text" class="form-control" name="policy_no" required>-->
                                <!--</div>-->
                            </div>
                        </fieldset>
                        <fieldset class="border-theme1">
                            <legend>Poliseperiode</legend>
                            <div class="contain_auto" >
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Poliseperiode</label>
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input" id="period_check" name="period_check" value="1">
                                        <label class="custom-control-label" for="period_check">Opprett poliseperiode ved lagring</label>
                                    </div>
                                </div>
                                <div id="period_detail" >
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label>Periode fra</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="start_date" id="start_date">
                                            <span class="input-group-text input-group-append input-group-addon">

                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div> 
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label>Periode til</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="end_date"  id="end_date">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div> 
                                    </div>
                                    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12 insurer_view">
                                        <label for="lastName">Velg forsikringsgiver</label>
                                        <div class="input-group mb-3">
                                            <select class="custom-select insurer" id="inputGroupSelect02" name="insurer" >
                                            <option >Select</option>
                                            <?php foreach($ins as $key => $value): ?>
                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </option>
                                            <?php endforeach; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">ContractID / Unique Market Reference</label>
                                        <input type="text" class="form-control" name="contract_id" required placeholder="[eg.B601320N37161AAXX]">
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">AGS Policy no</label>
                                        <input type="text" class="form-control" name="ags_policy_no" required  placeholder="[eg.AEGISG0D00010]">
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Kommisjon(%)</label>
                                        <input type="number" class="form-control" name="comission" required  >
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Egenandel</label>
                                        <input type="number" class="form-control" name="deductible" required  >
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Valuta</label>
                                        <input type="text" class="form-control" name="currency" required  >
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Kravavgift</label>
                                        <input type="text" class="form-control" name="claim_fee" required  >
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Sum Insured Amount</label>
                                        <input type="text" class="form-control" name="insured_amt" required  >
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Renewal Incentive Bonus (RIB)</label>
                                        <input type="text" class="form-control" name="rib" required  >
                                    </div>
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <label for="password">Profit Commission (PC)</label>
                                        <input type="text" class="form-control" name="profit_comission" required  >
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <button type="button" class="btn btn-sm btn-outline-primary submit_policy" style="margin-top: 3%;">Opprett ny polise </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>


$(document).off("click", "#period_check").on("click", "#period_check", function(){
    if ($("input[name='period_check']").is(':checked'))
    {
        document.getElementById('period_detail').style.display="none"; 
    }
    else{
        document.getElementById('period_detail').style.display="block"; 
    }
});

    $(document).on("change", ".insurer", function(event){
    event.preventDefault();
    var name = $(this).find(':selected').text();
    $.ajax({
        type:"post",
        url:"<?php echo ADMIN_BASE_URL.'policies/sanction_check'; ?>",
        data:{"name":name},
        async: false,
        success:function(result){
            if(result=="Secure")
            {
                toastr.success(result)
            }else if(result="Not secure"){
                toastr.error(result)
            }else{
                toastr.info(result)
            }
        }
    })
});

$(document).off("click", ".submit_policy").on("click", ".submit_policy", function(event){
    event.preventDefault();
    var form = $('#form_policy');
    form = new FormData(form[0]);
    $.ajax({
        type:"post",
        url:"<?php echo ADMIN_BASE_URL.'policies/submit'; ?>",
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
                $("#form_policy")[0].reset();
            }else
            {
                toastr.error(message);
            }
            
        }
    })
});


$('#start_date').change(function(event) { 
    event.preventDefault();
    var start_date=$(this).val();
    var end_date=moment(start_date).add(1, 'year');
    end_date=moment(end_date).format('MM/DD/YYYY');
    $('#end_date').val(end_date);
    
});
</script>
