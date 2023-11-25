
<main>
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                <h1 class="color-theme-1">Oppdater Policy</h1>
                <div class="separator mb-5"></div>
                </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                    <?php 
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_period', 'class' => 'form-horizontal');
                        echo form_open_multipart(ADMIN_BASE_URL.'policies/submit_update_period/', $attributes); ?>
                   
                            <div class="contain_auto" >
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label>Periode fra</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="start_date" id="start_date" value="<?php echo date("d-m-Y", strtotime($result['start_date'])); ?>" disabled>
                                        <span class="input-group-text input-group-append input-group-addon">
                                            <i class="simple-icon-calendar"></i>
                                        </span>
                                    </div> 
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label>Periode til</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo date("d-m-Y", strtotime($result['end_date'])); ?>" disabled>
                                        <span class="input-group-text input-group-append input-group-addon">
                                            <i class="simple-icon-calendar"></i>
                                        </span>
                                    </div> 
                                </div>
                                
                                <input type="hidden" value="<?php echo $result['id']; ?>"   name="update_id" >
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">ContractID / Unique Market Reference</label>
                                    <input type="text" class="form-control" name="contract_id" required placeholder="[eg.B601320N37161AAXX]" value="<?php echo $result['contract_id']; ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">AGS Policy no</label>
                                    <input type="text" class="form-control" name="ags_policy_no" required placeholder="[eg.AEGISG0D00010]" value="<?php echo $result['ags_policy_no']; ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Kommisjon(%)</label>
                                    <input type="number" class="form-control" name="comission" required value="<?php echo $result['comission']; ?>" >
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Egenandel</label>
                                    <input type="number" class="form-control" name="deductible" required value="<?php echo $result['deductible']; ?>" >
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Valuta</label>
                                    <input type="text" class="form-control" name="currency" required value="<?php echo $result['currency']; ?>" >
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Kravavgift</label>
                                    <input type="text" class="form-control" name="claim_fee" required  value="<?php echo $result['claim_fee']; ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Sum Insured Amount</label>
                                    <input type="text" class="form-control" name="insured_amt" required  value="<?php echo $result['insured_amt']; ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Renewal Incentive Bonus (RIB)</label>
                                    <input type="text" class="form-control" name="rib" required  value="<?php echo $result['rib']; ?>">
                                </div>
                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                    <label for="password">Profit Commission (PC)</label>
                                    <input type="text" class="form-control" name="profit_comission" required value="<?php echo $result['profit_comission']; ?>" >
                                </div>
                            </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary" style="margin-top: 3%;">Oppdater politikkperioden</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>


</script>