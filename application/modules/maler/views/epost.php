<style>
  table tbody tr td{
    width:50%;
  }
  .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
    background-color:none!important;
}
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Skadesaker</h1>
              <div class="separator mb-5"></div>
          </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12 col-lg-12 col-12 mb-4">
            <div class="card">
                <div class="card-header pl-0 pr-0">
                    <ul class="nav nav-tabs card-header-tabs  ml-0 mr-0" role="tablist">
                        <li class="nav-item text-center">
                            <a class="nav-link active" id="first-tab_" data-toggle="tab" href="#firstFull" role="tab" aria-controls="first" aria-selected="true">Vis</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="second-tab_" data-toggle="tab" href="#secondFull" role="tab" aria-controls="second" aria-selected="false">Endre</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="firstFull" role="tabpanel" aria-labelledby="first-tab_">
                          
                        </div>
                      
                        <div class="tab-pane fade" id="secondFull" role="tabpanel" aria-labelledby="second-tab_">
                            <h6 class="mb-4">This is second text</h6>

                            </div>
                        <div class="tab-pane fade" id="sixthFull" role="tabpanel" aria-labelledby="sixth-tab_">
                            <fieldset class="border-theme1">
                                <legend>Write a note</legend>
                                <div class="contain_auto" >
                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                        <textarea  class="form-control" name="reservation" required></textarea>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary">Save note</button>
                                </div>
                            </fieldset>
                            <fieldset class="border-theme1">
                                <legend>Saved notes</legend>
                                <div class="contain_auto" >
                                    <p>No note has been written for this damage case.</p>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="seventhFull" role="tabpanel" aria-labelledby="seventh-tab_">
                            <div id="accordion">
                            <?php
                            if(empty($processed_data))
                            {
                                $processed_data = new stdClass();
                                $processed_data->status="0";
                            }
                            if($processed_data->status!="1" && $processed_data->status!="2" ){ ?>
                                <div class="border " >
                                    <button class="btn btn-link btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        
                                        Vedta         
                                        
                                    </button>

                                    <div id="collapseOne" class="collapse show " data-parent="#accordion">
                                        <div class="p-4">
                                        <form id="Approve_form">
                                        <fieldset class="border-theme1">
                                        <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Status sak</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                    <option >Plukke ut</option>
                                                    <?php foreach($status as $key => $value): ?>
                                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">To the police</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select policy_id" id="selected_period" name="period_id"  >
                                                    <?php 
                                                    $claim_datetime=date("Y-m-d", strtotime($news->claim_datetime));
                                                    foreach($policies as $key => $value): ?>
                                                        <option  <?php if($claim_datetime>=date("Y-m-d", strtotime($value['start_date'])) && $claim_datetime<=date("Y-m-d", strtotime($value['end_date']))){ echo "selected";} ?> value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Egenandel</label>
                                                <input type="text" class="form-control" name="deductible" id="Egenandel" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Regress</label>
                                                <input type="text" class="form-control" name="regress" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Kroppsdel</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                    <option></option>
                                                    <?php foreach($body_parts as $key => $value): ?>
                                                        <option value="<?php echo $value['part'] ?>"><?php echo $value['part'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <select class="custom-select" id="inputGroupSelect02" name="side" >
                                                        <option></option>
                                                        <option value="left">left </option>
                                                        <option value="center">center </option>
                                                        <option value="right">right </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Skadetype</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="damage_type" >
                                                    <option></option>
                                                    <?php foreach($damage_type as $key => $value): ?>
                                                        <option value="<?php echo $value['type'] ?>"><?php echo $value['type'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Forsikret nedenfor</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="insurance_type" >
                                                        <option >Plukke ut</option>
                                                        <?php foreach($category as $key => $value): ?>
                                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Reservasjon</label>
                                                <input type="number" class="form-control" name="reservation" id="reservation" required value="0.00">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Invaliditet</label>
                                                <input type="number" class="form-control" name="validity" id="validity" required value="0.00">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12" style="text-align:right;">
                                                <input type="hidden" name="total" id="ttl">
                                                <span>Total reservasjon</span>
                                                <span class="ttl">0.00</span>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatikk</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="email_insurer">
                                                    <label class="custom-control-label" for="customCheck1">Eksporter denne saken til forsikringsgiver</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="email_ihs">
                                                    <label class="custom-control-label" for="customCheck2">Gi IHS begrenset tilgang til denne saken</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="underwriter">
                                                    <label class="custom-control-label" for="customCheck3">Marker som: Konsulter underwriter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="close_case_inactivity">
                                                    <label class="custom-control-label" for="customCheck4">Denne saken kan lukkes automatisk ved manglende aktivitet</label>
                                                </div>
                                            </div>
                                            </div>
                                            </fieldset>
                                            <fieldset class="border-theme1">
                                            <legend>Send Email</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Send Email to victim</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Subject</label>
                                                <input type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Sender Name</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Sender Name</label>
                                                <textarea  class="form-control"  required></textarea>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary approve_btn" >Approve Claim</button>
                                            </div>
                                        </fieldset>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="border ">
                                    <button class="btn btn-link collapsed btn-full background-theme1 border-theme1" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Decline
                                    </button>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="p-4">
                                        <form id="decline_form">
                                            <fieldset class="border-theme1">
                                            <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Type of Rejection</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="rejectcheck1" name="rejection_type" value="Refusal">
                                                    <label class="custom-control-label" for="rejectcheck1">Refusal</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="rejectcheck2" name="rejection_type" value="temporary">
                                                    <label class="custom-control-label" for="rejectcheck2">Temporary rejection with the posibility of user editing</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Status sak</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02"  name="status" >
                                                            <option value="3" >Avvist</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">To the police</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select policy_id" id="inputGroupSelect02" name="period_id" >
                                                    <?php 
                                                    $claim_datetime=date("Y-m-d", strtotime($news->claim_datetime));
                                                    foreach($policies as $key => $value): ?>
                                                        <option  <?php if($claim_datetime>=date("Y-m-d", strtotime($value['start_date'])) && $claim_datetime<=date("Y-m-d", strtotime($value['end_date']))){ echo "selected";} ?> value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Kroppsdel</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                    <option></option>
                                                    <?php foreach($body_parts as $key => $value): ?>
                                                        <option value="<?php echo $value['part'] ?>"><?php echo $value['part'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <select class="custom-select" id="inputGroupSelect02" name="side" >
                                                        <option></option>
                                                        <option value="left">left </option>
                                                        <option value="center">center </option>
                                                        <option value="right">right </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Skadetype</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="damage_part" >
                                                    <option></option>
                                                    <?php foreach($damage_type as $key => $value): ?>
                                                        <option value="<?php echo $value['type'] ?>"><?php echo $value['type'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatic</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">Export this case to the insurer</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">Give IHS limited access to the case</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                    <label class="custom-control-label" for="customCheck8">Mark as: Consult underwriter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                    <label class="custom-control-label" for="customCheck9">This case can be closed automatically in case to inactivity</label>
                                                </div>
                                            </div>
                                            </div>
                                            </fieldset>
                                            <fieldset class="border-theme1">
                                            <legend>Send Email</legend>
                                            <div class="contain_auto">
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                        <label class="custom-control-label" for="customCheck10">Send Email to victim</label>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="password">Subject</label>
                                                    <input type="text" class="form-control" name="regress" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="password">Sender Name</label>
                                                    <input type="text" class="form-control" name="regress" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Sender Name</label>
                                                    <textarea  class="form-control" name="regress" required></textarea>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-primary decline_btn">Decline Claim</button>
                                                </div>
                                            </fieldset>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php } else { ?>
                                <h6 class="mb-4">Dette skjemaet er <?php echo $news->claim_stat; ?>!</h6>
                            <?php } ?> 
                                </div>
                            </div>
                        <div class="tab-pane fade" id="eightFull" role="tabpanel" aria-labelledby="eight-tab_">
                           <?php if($news->claim_stat!="Ikke behandlet"){ ?>
                            <div id="procedural">
                                <div class="border " >
                                    <button class="btn btn-link btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                        Overview
                                    </button>

                                    <div id="collapseTwo" class="collapse show " data-parent="#procedural">
                                        <div class="p-4">
                                        <form id="update_form">
                                            <fieldset class="border-theme1">
                                            <legend>Saksdata</legend>
                                            <div class="contain_auto" >
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName" style="width:100%;">Status
                                                    <?php  $res=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$processed_data->status), "id desc","claim_status","name","1","1")->row_array(); ?>
                                                        <span style="margin-left: 6%;"> <?php echo $res['name']; ?></span>
                                                        </label>
                                    
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">Status sak</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                            <?php foreach($status as $key => $value): ?>
                                                                    <option value="<?php echo $value['id'] ?>" <?php if($value['id']=="3") echo "disabled" ?>><?php echo $value['name']; ?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <label class="input-group-text " for="inputGroupSelect02">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">To the police</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select policy_id" id="selected_period" name="period_id"  >
                                                        <?php 
                                                        foreach($policies as $key => $value): ?>
                                                            <option  <?php if($processed_data->period_id == $value['id']){ echo "selected";} ?> value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?> </option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Egenandel</label>
                                                    <input type="text" class="form-control" name="deductible" value="<?php echo $processed_data->deductible ?>"  required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Regress</label>
                                                    <input type="text" class="form-control" name="regress" required value="<?php echo $processed_data->regress ?>">
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">Kroppsdel</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                        <option></option>
                                                        <?php foreach($body_parts as $key => $value): ?>
                                                            <option value="<?php echo $value['part'] ?>"  <?php if($processed_data->body_part==$value['part'] ) echo "selected"; ?>><?php echo $value['part'] ?> </option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                        <select class="custom-select" id="inputGroupSelect02" name="side" >
                                                            <option></option>
                                                            <option value="left" <?php if($processed_data->side=="left") echo "selected"; ?>>left </option>
                                                            <option value="center" <?php if($processed_data->side=="center" ) echo "selected"; ?>>center </option>
                                                            <option value="right" <?php if($processed_data->side=="right" ) echo "selected"; ?>>right </option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">Skadetype</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="inputGroupSelect02" name="damage_type" >
                                                        <option></option>
                                                        <?php foreach($damage_type as $key => $value): ?>
                                                            <option value="<?php echo $value['type'] ?>"  <?php if($processed_data->damage_type==$value['type']) echo "selected"; ?>><?php echo $value['type'] ?> </option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">Forsikret nedenfor</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="inputGroupSelect02" name="insurance_type" >
                                                            <option >Plukke ut</option>
                                                            <?php foreach($category as $key => $value): ?>
                                                                <option value="<?php echo $value['id'] ?>" <?php if($processed_data->insurance_type==$value['id']) echo "selected";  ?>><?php echo $value['name']; ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Reservasjon</label>
                                                    <input type="number" class="form-control" name="reservation" id="reservation1"   value="<?php if(isset($processed_data->reservation) && !empty($processed_data->reservation)){echo $processed_data->reservation; }else{ echo "0.00";} ?>" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Invaliditet</label>
                                                    <input type="number" class="form-control" name="validity" id="validity1"   value="<?php if(!empty($processed_data->validity)){echo $processed_data->validity;} else{ echo "0.00";} ?>" required>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12" style="text-align:right;">
                                                    <input type="hidden" name="total" id="ttl1">
                                                    <span>Total reservasjon</span>
                                                    <span class="ttl1"><?php if(!empty($processed_data->total)) echo $processed_data->total; else echo "0.00"; ?></span>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Automatikk</label>
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1u" name="email_insurer" <?php if($processed_data->email_insurer=="1") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customCheck1u">Eksporter denne saken til forsikringsgiver</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2u" name="email_ihs"  <?php if($processed_data->email_ihs=="1") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customCheck2u">Gi IHS begrenset tilgang til denne saken</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3u" name="underwriter"  <?php if($processed_data->underwriter=="1") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customCheck3u">Marker som: Konsulter underwriter</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck4u" name="close_case_inactivity"  <?php if($processed_data->close_case_inactivity=="1") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customCheck4u">Denne saken kan lukkes automatisk ved manglende aktivitet</label>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-primary update_btn">Update case data</button>
                                                </div>
                                                </fieldset>
                                            </form>
                                            <div class="top-bot-set">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs card-header-tabs " role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                                                                role="tab" aria-controls="first" aria-selected="true">All Transaction</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="third-tab" data-toggle="tab" href="#third"
                                                                role="tab" aria-controls="third" aria-selected="false">Payouts - Per category</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <h1>This is text...</h1>
                                                        <div class="tab-pane fade" id="third" role="tabpanel"
                                                            aria-labelledby="third-tab">
                                                            <table class="data-table data-table-feature table table-bordered border-theme1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Category</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="list-item-heading"></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted"></p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class="border-theme1">
                                                <legend>Statistics</legend>
                                                <div class="row side-set">
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                        <table class=" table-bordered border-theme1 table">
                                                        <thead class="border-theme1 ">
                                                                <tr>
                                                                    <th colspan="2">Payout Status</th>
                                                                </tr>
                                                            </thead>
                                                            <thead class=" border-theme1 ">
                                                                <tr>
                                                                    <th>type</th>
                                                                    <th>sum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Overførte utbetalinger</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">0.00</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Godkjente utbetalinger</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">0.00</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Utbetalinger som avventer godkjenning</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">0.00</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                        <table class=" table-bordered border-theme1 table">
                                                        <thead class="border-theme1 ">
                                                                <tr>
                                                                    <th colspan="2">Forecast for total payment</th>
                                                                </tr>
                                                            </thead>
                                                            <thead class=" border-theme1 ">
                                                                <tr>
                                                                    <th>type</th>
                                                                    <th>sum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Utbetalinger totalt</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">0.00</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <p class="list-item-heading">Gjenstående reservasjoner</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-muted">0.00</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> 
                                <div class="border " >
                                    <button class="btn btn-link collapsed btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        Utbetaling
                                    </button>

                                    <div id="collapseOne" class="collapse " data-parent="#procedural">
                                    <?php if($news->claim_stat=="Godkjent"){ ?>
                                        <form id="transaction_form" class="transaction_form">
                                        <div class="p-4">
                                        <fieldset class="border-theme1">
                                            <legend>Delbelop</legend>
                                            <div class="rap_clone">
                                                <div class="row" >
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1">
                                                    </div>
                                                    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-2">
                                                        <label for="lastName">Dato</label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control" name="ta_dato[]">
                                                            <span class="input-group-text input-group-append input-group-addon">
                                                                <i class="simple-icon-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-3">
                                                        <label for="lastName">Deknlngskategori</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select" id="inputGroupSelect02" name="ta_coverage_cat[]" >
                                                            <?php foreach($coverage_cat as $key => $value){ ?>
                                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?> </option>
                                                            <?php  } ?>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                        <label for="password">Betalit till</label>
                                                        <input type="text" class="form-control" name="ta_paidto[]" required>
                                                    </div>
                                                
                                                    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                        <label for="password">Belop</label>
                                                        <input type="text" class="form-control belop" name="ta_belop[]"  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contain_auto">
                                                <button type="button" class="btn btn-sm btn-outline-primary add_field_button">Legg till ny rad</button>
                                            </div>
                                        </fieldset>
                                        <fieldset class="border-theme1">
                                            <legend>Egenskaper</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="Egenskaper1" name="claimnt_mail">
                                                    <label class="custom-control-label" for="Egenskaper1">Send e-post til skadelidt når denne betalingen overføres</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="Egenskaper2" name="reduce_reservation">
                                                    <label class="custom-control-label" for="Egenskaper2">Reduser reservasjon automatisk med betalingsbeløpet</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Hovedkategori</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="coverage_category" >
                                                    <?php foreach($category as $key => $value){ ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </option>
                                                           <?php  } ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Fyll ut felter</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="addressbook" name="addressbook" >
                                                    <option>Select</option>
                                                    <?php foreach($addressbook as $key => $val): ?>
                                                        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Beskrivelse</label>
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Egenandel som er fratrukket</label>
                                                <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("trans"=>"0"), "id desc","sub_amounts","id",1,0)->row_array()  ?>
                                                <input type="text" class="form-control t_deduct"  name="t_deduct" required value="<?php   if($res <=0 ) echo $processed_data->deductible; else  echo "0.00"; ?>">
                                            </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="border-theme1">
                                            <legend>Mottager</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label>Mottagerkategori</label>
                                              
                                                <?php foreach($recepient_category as $key => $value){ ?>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="recepient<?php echo $key ?>" name="recepient[]"  value="<?php echo $value['id']; ?>" class="custom-control-input" >
                                                    <label class="custom-control-label" for="recepient<?php echo $key ?>"><?php echo $value['name']; ?></label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label>Type betaling</label>
                                                <?php foreach($payment_category as $key => $value){ ?>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="payment<?php echo $key ?>" name="payment[]" value="<?php echo $value['id']; ?>" class="custom-control-input" >
                                                    <label class="custom-control-label" for="payment<?php echo $key ?>"><?php echo $value['name']; ?></label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Navn</label>
                                                <input type="text" class="form-control" name="a_name" id="a_name" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Adresse</label>
                                                <input type="text" class="form-control" name="a_address" id="a_address" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Kontonr.</label>
                                                <input type="text" class="form-control" name="a_account" id="a_account" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Postnr/sted</label><br>
                                                <input type="text" class="form-control inpt-code" name="a_postalcode" 
                                                    id="a_postalcode" required>
                                                <input type="text" class="form-control inpt-num" name="a_place"
                                                id="a_place" required>
                                            </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="border-theme1">
                                            <legend>Betalingsdetaljer</legend>
                                        <div class="contain_auto row">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-10">
                                                <label for="password">Beløp til utbetaling</label>
                                                <input type="text" class="form-control pay_amount" name="amount"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2  to_center">
                                                <button type="button" class="btn btn-sm btn-outline-primary calculator">Kalkuler automatisk</button>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Melding</label>
                                                <input type="text" class="form-control" name="message" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Forfallsdato</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="due_date">
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">KID</label>
                                                <input type="text" class="form-control" name="kid" required>
                                            </div>
                                            </div>
                                        </fieldset>
                                            <button type="button" class="btn btn-sm btn-outline-primary add_transaction" style="margin-top: 3%;">Legg til transaksjon </button>
                                        </div>
                                        </form>
                                    <?php } else { ?>
                                        <h6 class="mb-4">Transaksjoner kan kun legges inn på godkjente skjemaer.</h6>
                                    <?php } ?>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                                <h6 class="mb-4">Kravet er ikke behandlet ennå!</h6>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>




<script>
  $(document).ready(function() {
    $.ajax({
      type: 'POST',
      url: "<?php echo ADMIN_BASE_URL?>claims/get_claim_detail",
      data: {'id': '<?php echo $claim_id; ?>'},
      async: false,
      success: function(result) {
        $('.append_detail').html(result);
      }
    });
    var stat="<?php echo $news->claim_stat; ?>";
    if(stat=="Ikke behandlet"){
    $.ajax({
      type: 'POST',
      url: "<?php echo ADMIN_BASE_URL?>claims/get_editable_detail",
      data: {'id': '<?php echo $claim_id; ?>'},
      async: false,
      success: function(result) {
        $('.editable_data').html(result);
      }
    });
    }else
    {
        $('.editable_data').html("Skjemaet er "+stat+ ", og kan derfor ikke endres.");
    }
   
  });

    $('.approve_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#Approve_form').serialize();
        process_ajax(form_data);
    });
    

    $('.decline_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#decline_form').serialize();
        process_ajax(form_data);
       
    });

    $('.decline_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#decline_form').serialize();
        process_ajax(form_data);
       
    });
    $('.update_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#update_form').serialize();
        process_ajax(form_data);
       
    });


    function process_ajax(form_data)
    {
        $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>claims/process_claim",
            data: {'data': form_data,'claim_id':'<?php echo $this->uri->segment(5) ?>'},
            async: false,
            success: function(result){
                var status= result.status;
                var message= result.message;
                if(status)
                {
                    Swal.fire({
                        position:'bottom-end',
                        icon: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    location.reload();
                }else
                {
                    toastr.error(message);
                }
            }
        });
    }
    $('#selected_period').change(function(){
        deductible();
    });
    $('#selected_period').change(function(){
        deductible();
    });
    function deductible()
    {
        var selected_period=$('#selected_period').val();
        $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>claims/get_period_deductible",
            data: {'period_id': selected_period},
            async: false,
            success: function(result){
                $('#Egenandel').val(result);
            }
        });
    }

    $("#reservation, #validity").keyup(function(){
        var res=0;
        var val=0;
        if($("#reservation").val()>0)
            res=$("#reservation").val();
        else
            res=0;
        if($("#validity").val()>0)
            val=$("#validity").val();
        else
            val=0;       
        var tot=parseInt(res)+parseInt(val);
        var total=tot.toFixed(2);
        $('.ttl').html(total);
        $('#ttl').val(total);
    });


    $("#reservation1, #validity1").keyup(function(){
        var res=0;
        var val=0;
        if($("#reservation1").val()>0)
            res=$("#reservation1").val();
        else
            res=0;
        if($("#validity1").val()>0)
            val=$("#validity1").val();
        else
            val=0;       
        var tot=parseInt(res)+parseInt(val);
        var total=tot.toFixed(2);
        $('.ttl1').html(total);
        $('#ttl1').val(total);
    });
    $('#addressbook').change(function(){
        var a_id=$(this).val();
        $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>claims/get_addressbook_detail",
            data: {'a_id': a_id},
            async: false,
            success: function(result){
                 $('#a_name').val($(result).find("name").text());
                 $('#a_address').val($(result).find("address").text());
                 $('#a_postalcode').val($(result).find("postal_code").text());
                 $('#a_place').val($(result).find("place").text());
                 $('#a_account').val($(result).find("account_no").text());

            }
        });
    });
    $(document).ready(function() {
    var add_button      = $(".add_field_button");
            hyTy = '<div class="row" > <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1"> </div><div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-2"> <label for="lastName">Dato</label> <div class="input-group date"> <input type="text" class="form-control" name="ta_dato[]"> <span class="input-group-text input-group-append input-group-addon"> <i class="simple-icon-calendar"></i> </span> </div></div><div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-3"> <label for="lastName">Deknlngskategori</label> <div class="input-group mb-3"> <select class="custom-select" id="inputGroupSelect02" name="ta_coverage_cat[]" > <?php foreach($coverage_cat as $key=> $value){ ?> <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?> </option> <?php } ?> </select> <div class="input-group-append"> <label class="input-group-text" for="inputGroupSelect02">Options</label> </div></div></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Betalit till</label> <input type="text" class="form-control" name="ta_paidto[]" required> </div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Belop</label> <input type="text" class="form-control belop" name="ta_belop[]" required> </div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1 to_center"> <button type="button" class="btn btn-sm btn-outline-primary clone-remover">x</button> </div></div>';
            $(add_button).click(function(e){
                e.preventDefault();
                     $(this).parent().parent().find('.rap_clone').append(hyTy);
                     $(".input-group.date").datepicker({
                        autoclose: true,
                        rtl: false,
                        templates: {
                        leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        rightArrow: '<i class="simple-icon-arrow-right"></i>'
                        }
                    });
                    $('.clone-remover').on("click", function(e){
                        $(this).parent().parent().remove();
                    })
            });
            $('.clone-remover').on("click", function(e){
                $(this).parent().parent().remove();
            })
        });
        $('.calculator').off('click').click(function(e){  
        var add=belop=tot=deduct=0.00;
            $(".belop").each(function(){
                belop=$(this).val();
                if(!belop)
                    belop=0.00;
                add=(parseInt(belop)+parseInt(add)).toFixed(2);
            });
             deduct=$('.t_deduct').val();
             if(!deduct)
                deduct=0.00;
             tot=(parseInt(add)+parseInt(deduct)).toFixed(2);
            $('.pay_amount').val(tot);
        });


        $('.add_transaction').off('click').click(function(e){  
        e.preventDefault();
        var form_data=$('#transaction_form').serialize();
        $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>claims/add_transactions",
            data: {'data': form_data,'claim_id':'<?php echo $this->uri->segment(5) ?>'},
            async: false,
            success: function(result){
                var status= result.status;
                var message= result.message;
                if(status)
                {
                    Swal.fire({
                        position:'bottom-end',
                        icon: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    location.reload();
                }else
                {
                    toastr.error(message);
                }
            }
        });
    });
</script>