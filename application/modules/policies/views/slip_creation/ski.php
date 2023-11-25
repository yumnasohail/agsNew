
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="color-theme-1">Ny kontraktslipp - <?php echo $f_name; ?></h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                    <?php 
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_policy', 'class' => 'form-horizontal', 'target'=>"_blank");
                        echo form_open_multipart(ADMIN_BASE_URL.'policies/preview_1/', $attributes); ?>
                        <fieldset class="border-theme1">
                            <legend>Contract Details</legend>
                            <div class="contain_auto row">
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">UMR</label>
                                    <input type="text" class="form-control" name="umr" required value="B6013<?php echo date('y');?>N37161AAXX">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Policy Number</label>
                                    <input type="text" class="form-control" name="policy_number" required value="AEGISG000000">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Insurer</label>
                                    <input type="text" class="form-control" name="insurer" required value="<?php echo $f_name;?>">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border-theme1">
                            <legend>Risk Details</legend>
                            <div class="contain_auto row">
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">From</label>
                                    <input type="date" class="form-control" name="start_date" required value="<?php echo $StaringDate=date('Y-m-d'); ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">To</label>
                                    <input type="date" class="form-control" name="end_date" required value="<?php echo date("Y-m-d", strtotime(date("Y-m-d", strtotime($StaringDate)) . " + 1 year")); ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Address line 1</label>
                                    <input type="text" class="form-control" name="address1" required value="Henrik Ibsens gate 90">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Address line 2</label>
                                    <input type="text" class="form-control" name="address2" required value="0179 Oslo">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Address line 3</label>
                                    <input type="text" class="form-control" name="address3" required value="Norway">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Interest - Part A</label>
                                    <textarea  class="form-control" name="interest_a">Active Members of the Insured’s Parachute Association (NLF)</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Interest - Part B</label>
                                    <textarea  class="form-control" name="interest_b">Members of FNL sister organizations from other countries that qualifies for parachuting in Norway according to NLF rules, valid 30 days from paid.</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Deductible - Medical</label>
                                    <input type="text" class="form-control" name="deduct_m" value="NOK 1,000 each and every claim in respect of medical expenses" required>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Deductible - Personal Liability</label>
                                    <input type="text" class="form-control" name="deduct_l" value="NOK 7,500 for Personal Liability" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border-theme1">
                            <legend>Premium</legend>
                            <div class="contain_auto row">
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <span><strong>Part A</strong></span>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Tandem Nok</label>
                                    <textarea type="text" class="form-control" name="tandem" required>Tandem NOK 105,-</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Basic License</label>
                                    <textarea type="text" class="form-control" name="b_license" required>Basic Licence NOK 650,-</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Extended License</label>
                                    <textarea type="text" class="form-control" name="e_license" required>Extended Licence NOK +1.000,- (in addition to Basic)</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <span><strong>Part B</strong></span>
                                </div>
                                 <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Foreign Nok</label>
                                    <textarea type="text" class="form-control" name="foreign_nok" required>Foreign jumpers NOK 450,- / 30 days from paid to AGS.</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Premium Return</label>
                                    <textarea type="text" class="form-control" name="premium_return" required>Underwriters agree to a 5% premium return on this period (2019) of insurance should paid and outstanding claims from the expiring period of insurance be less than 50% of gross premium whichever the greater. Initial calculation to be undertaken once all premium funds are remitted to expiring Underwriters hereon.Should the figure exceed this percentage due to an outstanding claim, then underwriters agree to further reviews at 30/6, 30/9 and 31/12/19 or until it is clear that the loss ratio will not be below this level.</textarea>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">RIB</label>
                                    <textarea type="text" class="form-control" name="rib" required>For the 2022 period a 5% renewal incentive bonus (RIB).</textarea>
                                </div>
                                
                            </div>
                        </fieldset>
                         <fieldset class="border-theme1">
                            <legend>Fiscal and Regulatory</legend>
                            <div class="contain_auto row">
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <span>Alocation of premium to coding</span>
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <input type="text" class="form-control" name="p_to_c1" required value="90% KG">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <input type="text" class="form-control" name="p_to_c2" required value="10% NA">
                                </div>
                                
                            </div>
                        </fieldset>
                         <fieldset class="border-theme1">
                            <legend>Broker Remuneration and deduction section</legend>
                            <div class="contain_auto row">
                                
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                    <label for="password">Total Brokerage</label>
                                    <input type="text" class="form-control" name="brokerage" required value="25%">
                                </div>
                                
                            </div>
                        </fieldset>
                            <button type="button" class="btn btn-sm btn-outline-primary slip_doc" style="margin-top: 3%;" rel="preview">Forhåndsvisning</button>
                            <!--<button type="button" class="btn btn-sm btn-outline-primary slip_doc" style="margin-top: 3%;" rel="print">Skrive ut</button>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).on("click", ".slip_doc", function(event){
		event.preventDefault();
		var isValid=true;
		var type=$(this).attr('rel');
        // $("input , textarea").each(function() {
        //     $(this).css('border-color','#d7d7d7')
        //   var element = $(this);
        //   if (element.val() == "") {
        //       isValid = false;
        //       $(this).css('border-color','#ff1414')
        //       var targetOffset = $(this).offset().top-150;
        //         $('html, body').animate({scrollTop: targetOffset}, 1000);
        //       return false;
        //   }
        // });
        if(isValid){
            if(type=="preview")
            {
                $("#form_policy").submit();
            }
        }else
        {
            toastr.error('Fyll ut alle dataene');
        }
		
    });
</script>
