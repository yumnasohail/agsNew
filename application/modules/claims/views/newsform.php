<style>
  table tbody tr td{
    width:50%;
  }
  .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
    background-color:none!important;
}
table
{
    width: 100%;
}
th
{
    width: 35%;
}
#myModal_log p{
    color: black;
}
</style>
<main>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Skadesaker</h1>
              <h1 class="color-theme-1" style="float:right;">Sak# <?php  echo $claim_id; ?></h1>
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
                        <li class="nav-item text-center">
                            <a class="nav-link" id="fifth-tab_" data-toggle="tab" href="#fifthFull" role="tab" aria-controls="second" aria-selected="false">Logg</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="sixth-tab_" data-toggle="tab" href="#sixthFull" role="tab" aria-controls="second" aria-selected="false">Notater</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="seventh-tab_" data-toggle="tab" href="#seventhFull" role="tab" aria-controls="second" aria-selected="false">Godkjenn/Avslå</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link" id="eight-tab_" data-toggle="tab" href="#eightFull" role="tab" aria-controls="second" aria-selected="false">Saksbehandling</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="firstFull" role="tabpanel" aria-labelledby="first-tab_">
                          <div class="append_detail"> 

                          </div>
                        </div>
                        <div class="tab-pane fade" id="secondFull" role="tabpanel" aria-labelledby="second-tab_">
                            <div class="editable_data"> 

                            </div>
                        </div>
                        <div class="tab-pane fade" id="fifthFull" role="tabpanel" aria-labelledby="fifth-tab_">
                            <table class=" table table-bordered border-theme1" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th>Dato</th>
                                        <th>Utført av</th>
                                        <th style="width:60%" >Beskrivelse</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($logs as $key => $value){ ?>
                                    <tr>
                                        <td>
                                            <p class="">
                                            <?php echo $value['date_time']; ?>
                                            </p>
                                        </td>
                                        <td>
                                        <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$value['performed_by']), "id desc","users","first_name",1,0)->row_array();  ?>
                                            <p class=""><?php echo $res['first_name']; ?></p>
                                        </td>
                                        <td style="width:60%">
                                            <p class=""><?php echo $value['message'];?></p>
                                        </td>
                                        <td>
                                             <?php if(!empty($value['description'])){ ?>
                                           <p class="info_detail" rel="<?php echo $value['id']; ?>">info </p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="sixthFull" role="tabpanel" aria-labelledby="sixth-tab_">
                            <fieldset class="border-theme1">
                                <legend>Write a note</legend>
                                <form id="note_form">
                                    <div class="contain_auto" >
                                        <input type="hidden" value="<?php  echo $claim_id; ?>" name="claim_id">
                                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                            <textarea  class="form-control note_desc" name="note_desc" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-outline-primary note_submit">Save note</button>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset class="border-theme1">
                                <legend>Saved notes</legend>
                                <div class="contain_auto" >
                                <?php  foreach($note as $key => $value):?>
                                    <p class="note_para"><?php echo $value['description']; ?>
                                    <i class="simple-icon-close close-icon" rel="<?php echo $value['id']; ?>"></i></p>
                                <?php endforeach; ?>
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
                          //  if( $processed_data->status!="2" ){ ?>
                                <div class="border " >
                                    <button class="btn btn-link btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        
                                        Godkjenn         
                                        
                                    </button>

                                    <div id="collapseOne" class="collapse show " data-parent="#accordion">
                                        <div class="p-4">
                                            <?php if( $processed_data->status!="1" ){ ?>
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
                                                            <option value="<?php echo $value['id'] ?>" <?php if($value['id']!="1") echo "disabled" ?>><?php echo $value['name']; ?> </option>
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
                                                        <option  <?php if($processed_data->period_id == $value['id']){ echo "selected";}else if($claim_datetime>=date("Y-m-d", strtotime($value['start_date'])) && $claim_datetime<=date("Y-m-d", strtotime($value['end_date']))){ echo "selected";} ?> value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?> </option>
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
                                                <input type="text" class="form-control" name="regress" required value="<?php if(isset($processed_data->regress) && !empty($processed_data->regress)) echo $processed_data->regress ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Kroppsdel</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                    <option></option>
                                                    <?php foreach($body_parts as $key => $value): ?>
                                                        <option value="<?php echo $value['part'] ?>" <?php if(isset($processed_data->body_part) && !empty($processed_data->body_part) && $processed_data->body_part==$value['part']) echo "selected"; ?>><?php echo $value['part'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <select class="custom-select" id="inputGroupSelect02" name="side" >
                                                        <option></option>
                                                        <option value="left" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="left") echo "selected"; ?>>left </option>
                                                        <option value="center" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="center") echo "selected"; ?>>center </option>
                                                        <option value="right" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="right") echo "selected"; ?>>right </option>
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
                                                        <option value="<?php echo $value['type'] ?>"  <?php if(isset($processed_data->damage_type) && !empty($processed_data->damage_type) && $processed_data->damage_type==$value['type']) echo "selected"; ?>><?php echo $value['type'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">-->
                                            <!--    <label for="lastName">Forsikret nedenfor</label>-->
                                            <!--    <div class="input-group mb-3">-->
                                            <!--        <select class="form-control select2-multiple n_category_type" id="inputGroupSelect02 " name="insurance_type[]"  multiple="multiple" data-width="100%">-->
                                            <!--            <?php foreach($category as $key => $value): ?>-->
                                            <!--                <option  value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?> </option>-->
                                            <!--            <?php endforeach; ?>-->
                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<?php foreach($category as $key => $value):?>-->
                                            <!--<div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 n_hiding_div hide">-->
                                            <!--    <label for="password">Reservasjon(<?php echo $value['name'];  ?>)</label>-->
                                            <!--    <input type="number" class="form-control n_reservation_amount" name="reservation<?php echo $value['id'];  ?>" id="n_reservation<?php echo $value['id'];  ?>"   value="<?php  echo "0.00"; ?>" required>-->
                                            <!--</div>-->
                                            <!--<?php endforeach; ?>-->
                                            
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">Forsikret nedenfor</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-control select2-multiple n_category_type" id="inputGroupSelect02 " name="insurance_type[]"  multiple="multiple" data-width="100%">
                                                            <?php foreach($category as $key => $value): 
                                                                $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$claim_id,"coverage_cat"=>$value['id']), "id desc","claim_reservations","id",1,1)->num_rows();?>

                                                                <option value="<?php echo $value['id'] ?>" <?php if($res>0) echo "selected";  ?>><?php echo $value['name']; ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <?php foreach($category as $key => $value):
                                                    $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$claim_id,"coverage_cat"=>$value['id']), "id desc","claim_reservations","id,amount",1,1)->row_array();?>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 n_hiding_div <?php if(empty($res)) echo "hide"; ?> ">
                                                    <label for="password">Reservasjon(<?php echo $value['name'];  ?>)</label>
                                                    <input type="number" class="form-control n_reservation_amount" name="reservation<?php echo $value['id'];  ?>" id="n_reservation<?php echo $value['id'];  ?>"   value="<?php if(isset($res['amount']) && !empty($res['amount'])) echo $res['amount']; else echo "0.00"; ?>" required>
                                                </div>
                                                <?php endforeach; ?>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12" style="text-align:right;">
                                                <input type="hidden" name="total" id="ttl">
                                                <span>Total reservasjon</span>
                                                <span class="ttl"><?php if(!empty($processed_data->total) && isset($processed_data->total)) echo $processed_data->total; else echo "0.00"; ?></span>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatikk</label>
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
                                            <legend>Send e-post</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5" checked name="approve_email_claimant">
                                                    <label class="custom-control-label" for="customCheck5">Send e-post til skadelidt</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Emne</label>
                                                <input type="text" class="form-control"  required name="s_subject" value="Skademelding er behandlet - <?php echo $fed->federation_slug; ?> [AGS_<?php echo strtolower($claim_id); ?>]">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Avsendernavn</label>
                                                <input type="text" class="form-control" required name="s_sendername" value="<?php echo $maler['name']; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Tekst</label>
                                                <textarea  class="form-control ckeditor" name="s_text" required id="s_text">
                                                    Hei,<br><br><br>

                                                    Ditt skadeskjema angående <?php echo $news->a_name." ".$news->a_surname; ?>  sendt inn via <?php echo BASE_URL.strtolower($fed->federation_slug); ?> er registrert og behandlet.
                                                    <br>
                                                    TEKST HER
                                                    <br>
                                                    Har du spørsmål kan du ta kontakt med oss ved å svare på denne e-posten. Vennligst vis til vårt referansenummer; <?php echo $claim_id; ?> ved alle fremtidige henvendelser i forbindelse med skaden. Dersom du tar kontakt per e-post, vennligst ikke fjern koden som står i klammer i emnefeltet.
                                                    <br><br><br>
                                                    Med vennlig hilsen<br>
                                                    AGS Forsikring AS<br>
                                                    </textarea>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary approve_btn" >Godkjenn skadeskjema!</button>
                                            </div>
                                        </fieldset>
                                        </form>
                                        <?php } else echo  "Krav Allerede godkjent";?>
                                        </div>
                                    </div>
                                </div>
                                <div class="border ">
                                    <button class="btn btn-link collapsed btn-full background-theme1 border-theme1" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Avslå
                                    </button>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="p-4">
                                        <form id="decline_form">
                                            <fieldset class="border-theme1">
                                            <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Type avslag</label>
                                                <?php foreach($reject_status as $key => $value): ?>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="rejectcheck<?php echo $key; ?>" name="rejection_type" value="<?php echo $value['id']; ?>" <?php if(isset($processed_data->rejection_type) && !empty($processed_data->rejection_type) && $processed_data->rejection_type==$value['id']) echo "checked"; ?>>
                                                    <label class="custom-control-label" for="rejectcheck<?php echo $key; ?>"><?php echo $value['title']; ?></label>
                                                </div>
                                                <?php endforeach; ?>
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
                                                <label for="lastName">Polise</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select policy_id" id="inputGroupSelect02" name="period_id" >
                                                    <?php 
                                                    $claim_datetime=date("Y-m-d", strtotime($news->claim_datetime));
                                                    foreach($policies as $key => $value): ?>
                                                        <option  <?php  if(isset($processed_data->period_id) && !empty($processed_data->period_id) && $processed_data->period_id==$value['id']) echo "selected"; elseif($claim_datetime>=date("Y-m-d", strtotime($value['start_date'])) && $claim_datetime<=date("Y-m-d", strtotime($value['end_date']))){ echo "selected";} ?> value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?> </option>
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
                                                        <option value="<?php echo $value['part'] ?>" <?php if(isset($processed_data->body_part) && !empty($processed_data->body_part) && $processed_data->body_part==$value['part']) echo "selected"; ?>><?php echo $value['part'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <select class="custom-select" id="inputGroupSelect02" name="side" >
                                                        <option></option>
                                                        <option value="left" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="left") echo "selected"; ?>>left </option>
                                                        <option value="center" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="center") echo "selected"; ?>>center </option>
                                                        <option value="right" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="right") echo "selected"; ?>>right </option>
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
                                                        <option value="<?php echo $value['type'] ?>" <?php if(isset($processed_data->damage_type) && !empty($processed_data->damage_type) && $processed_data->damage_type==$value['type']) echo "selected"; ?>><?php echo $value['type'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatikk</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7" name="email_ihs" <?php if(isset($processed_data->email_ihs) && !empty($processed_data->email_ihs) && $processed_data->email_ihs=="1") echo "checked"; ?>>
                                                    <label class="custom-control-label" for="customCheck7">Gi IHS begrenset tilgang til denne saken</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck8" name="underwriter" <?php if(isset($processed_data->underwriter) && !empty($processed_data->underwriter) && $processed_data->underwriter=="1") echo "checked"; ?>>
                                                    <label class="custom-control-label" for="customCheck8">Marker som: Konsulter underwriter</label>
                                                </div>
                                            </div>
                                            </div>
                                            </fieldset>
                                            <fieldset class="border-theme1">
                                            <legend>Send e-post</legend>
                                            <div class="contain_auto">
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck10" checked name="decline_email_claimant">
                                                        <label class="custom-control-label" for="customCheck10">Send e-post til skadelidt</label>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="password">Emne</label>
                                                    <input type="text" class="form-control" name="d_subject" required value="Skademelding er behandlet - <?php echo $fed->federation_slug; ?> [AGS_<?php echo strtolower($claim_id); ?>]">
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="password">Avsendernavn</label>
                                                    <input type="text" class="form-control" name="d_sendername" required value="<?php echo $maler['name']; ?>">
                                                </div>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="password">Tekst</label>
                                                    <textarea  class="form-control ckeditor" name="d_text" required id="d_text">
                                                    Hei,<br><br><br>

                                                    Ditt skadeskjema angående <?php echo $news->a_name." ".$news->a_surname; ?>  sendt inn via <?php echo BASE_URL.strtolower($fed->federation_slug); ?> er behandlet.
                                                    <br>
                                                    Før vi kan behandle saken videre må vi be deg rette opp følgende mangler: TEKST HER
                                                    <br>
                                                    Klikk på linken for å endre ditt skjema og sende på nytt:
                                                        <br>
                                                            <?php echo BASE_URL."oppdater/".strtolower($fed->federation_slug)."/".$claim_id; ?>
                                                        <br>
                                                    Ditt passord for tilgang til skjemaet er: <?php echo $news->code; ?>
                                                    <br>
                                                    Har du spørsmål kan du ta kontakt med oss ved å svare på denne e-posten. Vennligst vis til vårt referansenummer; <?php echo $claim_id; ?> ved alle fremtidige henvendelser i forbindelse med skaden. Dersom du tar kontakt per e-post, vennligst ikke fjern koden som står i klammer i emnefeltet.
                                                    <br><br><br>
                                                    Med vennlig hilsen<br>
                                                    AGS Forsikring AS<br>
                                                    </textarea>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-primary decline_btn">Avslå skadeskjema!</button>
                                                </div>
                                            </fieldset>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="border " >
                                    <button class="btn btn-link btn-full background-theme1 border-theme1" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        
                                        Venter på mer informasjon        
                                        
                                    </button>

                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="p-4">
                                            <?php if( $processed_data->status!="4" ){ ?>
                                        <form id="Waiting_form">
                                        <fieldset class="border-theme1">
                                        <legend>Saksdata</legend>
                                        <div class="contain_auto" >
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Status sak</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                    <option >Plukke ut</option>
                                                        <option value="4">Venter</option>
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
                                                        <option  <?php if($processed_data->period_id == $value['id']){ echo "selected";}else if($claim_datetime>=date("Y-m-d", strtotime($value['start_date'])) && $claim_datetime<=date("Y-m-d", strtotime($value['end_date']))){ echo "selected";} ?> value="<?php echo $value['id']; ?>"><?php echo date("Y-m-d", strtotime($value['start_date']))." / ".date("Y-m-d", strtotime($value['end_date']))." - ".$value['policy_title']; ?> </option>
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
                                                <input type="text" class="form-control" name="regress" required value="<?php if(isset($processed_data->regress) && !empty($processed_data->regress)) echo $processed_data->regress ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                <label for="lastName">Kroppsdel</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="body_part" >
                                                    <option></option>
                                                    <?php foreach($body_parts as $key => $value): ?>
                                                        <option value="<?php echo $value['part'] ?>" <?php if(isset($processed_data->body_part) && !empty($processed_data->body_part) && $processed_data->body_part==$value['part']) echo "selected"; ?>><?php echo $value['part'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <select class="custom-select" id="inputGroupSelect02" name="side" >
                                                        <option></option>
                                                        <option value="left" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="left") echo "selected"; ?>>left </option>
                                                        <option value="center" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="center") echo "selected"; ?>>center </option>
                                                        <option value="right" <?php if(isset($processed_data->side) && !empty($processed_data->side) && $processed_data->side=="right") echo "selected"; ?>>right </option>
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
                                                        <option value="<?php echo $value['type'] ?>"  <?php if(isset($processed_data->damage_type) && !empty($processed_data->damage_type) && $processed_data->damage_type==$value['type']) echo "selected"; ?>><?php echo $value['type'] ?> </option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <!-- <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Automatikk</label>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck_2" name="email_ihs">
                                                    <label class="custom-control-label" for="customCheck_2">Gi IHS begrenset tilgang til denne saken</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck_3" name="underwriter">
                                                    <label class="custom-control-label" for="customCheck_3">Marker som: Konsulter underwriter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck_4" name="close_case_inactivity">
                                                    <label class="custom-control-label" for="customCheck_4">Denne saken kan lukkes automatisk ved manglende aktivitet</label>
                                                </div>
                                            </div> -->
                                            </div>
                                            </fieldset>
                                            <fieldset class="border-theme1">
                                            <legend>Send e-post</legend>
                                        <div class="contain_auto">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck_5" checked name="approve_email_claimant">
                                                    <label class="custom-control-label" for="customCheck_5">Send e-post til skadelidt</label>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Emne</label>
                                                <input type="text" class="form-control"  required name="s_subject" value="Skademelding er behandlet - <?php echo $fed->federation_slug; ?> [AGS_<?php echo strtolower($claim_id); ?>]">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Avsendernavn</label>
                                                <input type="text" class="form-control" required name="s_sendername" value="<?php echo $maler['name']; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Tekst</label>
                                                <textarea  class="form-control ckeditor" name="v_text" required id="v_text">
                                                    Hei,<br><br><br>

                                                    Ditt skadeskjema angående <?php echo $news->a_name." ".$news->a_surname; ?>  sendt inn via <?php echo BASE_URL.strtolower($fed->federation_slug); ?> er registrert og behandlet.
                                                    <br>
                                                    TEKST HER
                                                    <br>
                                                    Har du spørsmål kan du ta kontakt med oss ved å svare på denne e-posten. Vennligst vis til vårt referansenummer; <?php echo $claim_id; ?> ved alle fremtidige henvendelser i forbindelse med skaden. Dersom du tar kontakt per e-post, vennligst ikke fjern koden som står i klammer i emnefeltet.
                                                    <br><br><br>
                                                    Med vennlig hilsen<br>
                                                    AGS Forsikring AS<br>
                                                    </textarea>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary waiting_btn" >Send inn skjemaet!</button>
                                            </div>
                                        </fieldset>
                                        </form>
                                        <?php } else echo  "Venter nå på mer informasjon";?>
                                        </div>
                                    </div>
                                </div>
                           
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
                                                        <span style="margin-left: 6%;"> <?php echo $news->claim_stat; ?></span>
                                                        </label>
                                    
                                                </div>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                                                    <label for="lastName">Status sak</label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="inputGroupSelect02" name="status" >
                                                            <?php foreach($status as $key => $value): ?>
                                                                    <option value="<?php echo $value['id'] ?>" <?php if($value['id']=="3") echo "disabled"; if($value['id']==$processed_data->status) echo "selected"; ?>><?php echo $value['name']; ?> </option>
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
                                                        <select class="form-control select2-multiple category_type" id="inputGroupSelect02 " name="insurance_type[]"  multiple="multiple" data-width="100%">
                                                            <?php foreach($category as $key => $value): 
                                                                $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$claim_id,"coverage_cat"=>$value['id']), "id desc","claim_reservations","id",1,1)->num_rows();?>

                                                                <option value="<?php echo $value['id'] ?>" <?php if($res>0) echo "selected";  ?>><?php echo $value['name']; ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <?php foreach($category as $key => $value):
                                                    $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$claim_id,"coverage_cat"=>$value['id']), "id desc","claim_reservations","id,amount",1,1)->row_array();?>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 hiding_div <?php if(empty($res)) echo "hide"; ?> ">
                                                    <label for="password">Reservasjon(<?php echo $value['name'];  ?>)</label>
                                                    <input type="number" class="form-control reservation_amount" name="reservation<?php echo $value['id'];  ?>" id="reservation<?php echo $value['id'];  ?>"   value="<?php if(isset($res['amount']) && !empty($res['amount'])) echo $res['amount']; else echo "0.00"; ?>" required>
                                                </div>
                                                <?php endforeach; ?>
                                                <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 " style="text-align:right;">
                                                    <input type="hidden" name="total" id="ttl1" value="<?php if(!empty($processed_data->total)) echo $processed_data->total; else echo "0.00"; ?>">
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
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2u" name="email_ihs"  >
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
                                                        <div class="tab-pane fade show active" id="first" role="tabpanel"
                                                            aria-labelledby="first-tab">
                                                            <table class="data-table data-table-feature table table-bordered border-theme1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Dato</th>
                                                                        <th>Bruker</th>
                                                                        <th>Type</th>
                                                                        <th>Belop</th>
                                                                        <th>Status</th>
                                                                        <th>Alternativer</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($transactions as $key => $value){ ?>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="list-item-heading">
                                                                            <?php echo $value['dato'].' '.$value['time']; ?>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                        <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$value['user']), "id desc","users","first_name",1,0)->row_array();  ?>
                                                                            <p class="text-muted"><?php echo $res['first_name']; ?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted"><?php echo $value['type'];?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted"><?php if($value['trans']=="0"){ echo "-";} echo $value['belop'];?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted"><?php if($value['trans_status']=="pending" && $value['trans']=="0"){ echo "Avventer";   } else if($value['trans_status']=="transferred"){ echo "Overført"; }else if($value['trans_status']=="approved"){ echo "Godkjent"; }else if($value['trans_status']=="declined" && $value['trans']=="0"){ echo "Avvist";   }  else echo ""; ?></p>
                                                                        </td>
                                                                        <td>
                                                                        <?php
                                                                        $res=Modules::run('api/_get_specific_table_with_pagination',array("t_id"=>$value['id']), "id desc","sub_amounts","id",1,0)->result_array();
                                                                         if(!empty($res)){?>
                                                                            <span class="text-muted check_detail" rel="<?php echo $value['id']; ?>"><i class="iconsminds-file" style="font-size:16px;"></i></span>
                                                                        <?php  } 
                                                                        if($value['trans_status']=="pending"  && $value['trans']=="0" ){?>
                                                                            <i class="simple-icon-close change_stat" status="declined" rel="<?php echo $value['id']; ?>" style="font-size: 16px;padding: 3px;color: #e42a2a;cursor:pointer"></i>
                                                                       <?php  }?>
                                                                        
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
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
                                                                <?php foreach($per_cat as $c => $ct): ?>
                                                                    <tr>
                                                                        <td>
                                                                        <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$ct['coverage_cat']), "id desc","coverage_category","name",1,0)->row_array();?>

                                                                            <p class="list-item-heading"><?php echo $res['name']; ?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-muted"><?php echo $ct['belop']; ?></p>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<fieldset class="border-theme1">-->
                                            <!--    <legend>Statistics</legend>-->
                                            <!--    <div class="row side-set">-->
                                            <!--        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">-->
                                            <!--            <table class=" table-bordered border-theme1 table">-->
                                            <!--            <thead class="border-theme1 ">-->
                                            <!--                    <tr>-->
                                            <!--                        <th colspan="2">Payout Status</th>-->
                                            <!--                    </tr>-->
                                            <!--                </thead>-->
                                            <!--                <thead class=" border-theme1 ">-->
                                            <!--                    <tr>-->
                                            <!--                        <th>type</th>-->
                                            <!--                        <th>sum</th>-->
                                            <!--                    </tr>-->
                                            <!--                </thead>-->
                                            <!--                <tbody>-->
                                            <!--                    <tr>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="list-item-heading">Overførte utbetalinger</p>-->
                                            <!--                        </td>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="text-muted">0.00</p>-->
                                            <!--                        </td>-->
                                            <!--                    </tr>-->
                                            <!--                    <tr>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="list-item-heading">Godkjente utbetalinger</p>-->
                                            <!--                        </td>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="text-muted">0.00</p>-->
                                            <!--                        </td>-->
                                            <!--                    </tr>-->
                                            <!--                    <tr>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="list-item-heading">Utbetalinger som avventer godkjenning</p>-->
                                            <!--                        </td>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="text-muted">0.00</p>-->
                                            <!--                        </td>-->
                                            <!--                    </tr>-->
                                            <!--                </tbody>-->
                                            <!--            </table>-->
                                            <!--        </div>-->
                                            <!--        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">-->
                                            <!--            <table class=" table-bordered border-theme1 table">-->
                                            <!--            <thead class="border-theme1 ">-->
                                            <!--                    <tr>-->
                                            <!--                        <th colspan="2">Forecast for total payment</th>-->
                                            <!--                    </tr>-->
                                            <!--                </thead>-->
                                            <!--                <thead class=" border-theme1 ">-->
                                            <!--                    <tr>-->
                                            <!--                        <th>type</th>-->
                                            <!--                        <th>sum</th>-->
                                            <!--                    </tr>-->
                                            <!--                </thead>-->
                                            <!--                <tbody>-->
                                            <!--                    <tr>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="list-item-heading">Utbetalinger totalt</p>-->
                                            <!--                        </td>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="text-muted">0.00</p>-->
                                            <!--                        </td>-->
                                            <!--                    </tr>-->
                                            <!--                    <tr>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="list-item-heading">Gjenstående reservasjoner</p>-->
                                            <!--                        </td>-->
                                            <!--                        <td>-->
                                            <!--                            <p class="text-muted">0.00</p>-->
                                            <!--                        </td>-->
                                            <!--                    </tr>-->
                                            <!--                </tbody>-->
                                            <!--            </table>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</fieldset>-->
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
                                                            <input type="text" class="form-control" name="ta_dato[]" value="<?php echo date('d-m-Y'); ?>">
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
                                                    <input type="checkbox" class="custom-control-input" id="Egenskaper1" name="claimnt_mail" checked>
                                                    <label class="custom-control-label" for="Egenskaper1">Send e-post til skadelidt når denne betalingen overføres</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="custom-control-input" id="Egenskaper2" name="reduce_reservation" checked>
                                                    <label class="custom-control-label" for="Egenskaper2" >Reduser reservasjon automatisk med betalingsbeløpet</label>
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
                                                    <option value="0">Select</option>
                                                    <option value="claimant">Skadelidt/foresatt</option>
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
                                                <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("claim_id"=>$claim_id,"deduct >"=> "0") , "id desc","transaction","id",1,0)->row_array()  ?>
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
                                                    <input type="radio" id="recepient<?php echo $key ?>" name="recepient[]"  value="<?php echo $value['id']; ?>" class="custom-control-input" <?php if($key=="0") echo "checked"; ?>>
                                                    <label class="custom-control-label" for="recepient<?php echo $key ?>"><?php echo $value['name']; ?></label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label>Type betaling</label>
                                                <?php foreach($payment_category as $key => $value){ ?>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="payment<?php echo $key ?>" name="payment[]" value="<?php echo $value['id']; ?>" class="custom-control-input payment_type_select" <?php if($key=="0") echo "checked"; ?>>
                                                    <label class="custom-control-label" for="payment<?php echo $key ?>"><?php echo $value['name']; ?></label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php 
                                            $clm=Modules::run('api/_get_specific_table_with_pagination',array('id'=>$processed_data->period_id), "id desc","policy_period","currency",1,1)->row_array();
                                            if(!empty($clm['currency']))
                                                $currency=$clm['currency'];
                                            else
                                                $currency='NOK';
                                            ?>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6 pay_currency_div">
                                                <label for="password">Payment Currency</label>
                                                <input type="text" class="form-control" name="pay_currency" id="pay_currency" value="<?php echo $currency; ?>">
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
                                                <input type="number" class="form-control pay_amount" name="amount"  readonly="readonly" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2  to_center">
                                                <button type="button" class="btn btn-sm btn-outline-primary calculator">Kalkuler automatisk</button>
                                            </div>
                                            
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                                                <label for="password">Melding</label>
                                                <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$processed_data->period_id) , "id desc","policy_period","*",1,0)->row_array();  ?>
                                                <?php $fd=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$federation_id) , "id desc","federations","title",1,0)->row_array()  ?>
                                                <input type="text" class="form-control" name="message" required value="<?php echo "Case ".$claim_id." - ".$fd['title'] ." (".date("Y-m-d", strtotime($res['start_date']))." / ".date("Y-m-d", strtotime($res['end_date'])).")";?>">
                                                
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
   // if(stat=="Ikke behandlet"){
    $.ajax({
      type: 'POST',
      url: "<?php echo ADMIN_BASE_URL?>claims/get_editable_detail",
      data: {'id': '<?php echo $claim_id; ?>'},
      async: false,
      success: function(result) {
        $('.editable_data').html(result);
      }
    });
   // }else
    //{
     //   $('.editable_data').html("Skjemaet er "+stat+ ", og kan derfor ikke endres.");
   // }
   
  });
  
  
  
 

    $('.payment_type_select').change(function(){
        if($(this).val()==1){
         $(".pay_currency_div").css("display", "none");
        }else
        {
            $(".pay_currency_div").css("display", "block");
        }
        return false;
    });
    $('.approve_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#Approve_form').serialize();
        process_ajax(form_data,"approve_btn");
    });

    $('.waiting_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#Waiting_form').serialize();
        process_ajax(form_data,"waiting_btn");
    });
    
    

    $('.decline_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#decline_form').serialize();
        process_ajax(form_data,"decline_btn");
       
    });

  
    $('.update_btn').off('click').click(function(e){
        e.preventDefault();
        var form_data=$('#update_form').serialize();
        process_ajax(form_data,"update_btn");
       
    });

function process_ajax(form_data,type)
    {
        if(type!="update_btn"){
            var s_text=d_text=v_text="";
            if(type=="decline_btn")
                d_text=tinymce.get('d_text').getContent();
            else if(type=="waiting_btn")
                v_text=tinymce.get('v_text').getContent();
            else if(type=="approve_btn")
                s_text=tinymce.get('s_text').getContent();
        $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>claims/process_claim",
            data: {'data': form_data,'claim_id':'<?php echo $this->uri->segment(5) ?>','d_text':d_text,'s_text':s_text,'v_text':v_text},
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
        }else
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
    }
    $('#selected_period').change(function(){
        deductible();
    });
    $('#selected_period').change(function(){
        deductible();
    });
    
    $(document).ready(function(){
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

   
    $(".n_reservation_amount").keyup(function(){
        n_reservation_calculate();
        
    });
    function n_reservation_calculate()
    {
        var tot=0.00;
        var cat=$('.n_category_type').val();
        cat.map((Item) => { 
            if($('#n_reservation'+Item).val()>0)
            tot=parseInt(tot)+parseInt($('#n_reservation'+Item).val());
        })     
        var total=tot.toFixed(2);
        $('.ttl').html(total);
        $('#ttl').val(total);
    }
    
    $('.n_category_type').change(function(){
        $('.n_hiding_div').addClass('hide');
        var cat=$(this).val();
        cat.map((Item) => { 
            $('#n_reservation'+Item).parent().removeClass('hide');
        })
      
        n_reservation_calculate();
    });
    $(".reservation_amount").keyup(function(){
        reservation_calculate();
        
    });
    function reservation_calculate()
    {
        var tot=0.00;
        var cat=$('.category_type').val();
        cat.map((Item) => { 
            if($('#reservation'+Item).val()>0)
            tot=parseInt(tot)+parseInt($('#reservation'+Item).val());
        })     
        var total=tot.toFixed(2);
        $('.ttl1').html(total);
        $('#ttl1').val(total);
    }
    $('.category_type').change(function(){
        $('.hiding_div').addClass('hide');
        var cat=$(this).val();
        cat.map((Item) => { 
            $('#reservation'+Item).parent().removeClass('hide');
        })
      
        reservation_calculate();
    });
    $('#addressbook').change(function(){
        var a_id=$(this).val();
        $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>claims/get_addressbook_detail",
            data: {'a_id': a_id,'claim_id':'<?php echo $this->uri->segment(5) ?>'},
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
            hyTy = '<div class="row" > <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1"> </div><div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-2"> <label for="lastName">Dato</label> <div class="input-group date"> <input type="text" class="form-control" name="ta_dato[]" value="<?php echo date('d-m-Y'); ?>"> <span class="input-group-text input-group-append input-group-addon"> <i class="simple-icon-calendar"></i> </span> </div></div><div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-3"> <label for="lastName">Deknlngskategori</label> <div class="input-group mb-3"> <select class="custom-select" id="inputGroupSelect02" name="ta_coverage_cat[]" > <?php foreach($coverage_cat as $key=> $value){ ?> <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?> </option> <?php } ?> </select> <div class="input-group-append"> <label class="input-group-text" for="inputGroupSelect02">Options</label> </div></div></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Betalit till</label> <input type="text" class="form-control" name="ta_paidto[]" required> </div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Belop</label> <input type="text" class="form-control belop" name="ta_belop[]" required> </div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1 to_center"> <button type="button" class="btn btn-sm btn-outline-primary clone-remover">x</button> </div></div>';
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
             tot=(parseInt(add)-parseInt(deduct)).toFixed(2);
            $('.pay_amount').val(tot);
        });


        $('.add_transaction').off('click').click(function(e){  
        e.preventDefault();
        var valid="1";
        $("#transaction_form").find("input").each(function() {
            if($(this).val()=="" && $(this).attr('name')!="message" && $(this).attr('name')!="kid" && $(this).attr('name')!="ta_paidto[]")
            {
                 valid="0";
            }
        });
        if(valid=="1"){
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
        }else
        {
            toastr.error("Fyll ut alle dataene for å behandle transaksjonen");
            return false;
        }
    });

    
    $(document).on("click", ".check_detail", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>claims/transaction_detail",
			data: {'id': id},
			async: false,
			success: function(test_body) {
				var test_desc = test_body;
				$('#myModal').modal('show');
				$("#myModal .modal-body").html(test_desc);
			}
		});
    });
    
    
    $(document).on("click", ".note_submit", function(event){
        event.preventDefault();
        var form_data=$('#note_form').serialize();
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>claims/note",
			data: {'form_data': form_data},
			async: false,
			success: function(result) {
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
    

    $(document).on("click", ".close-icon", function(event){
        event.preventDefault();
        var id=$(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>claims/delete_note",
			data: {'id': id},
			async: false,
			success: function(result) {
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
    
            $(document).on("click", ".info_detail", function(event){
            event.preventDefault();
            var id = $(this).attr('rel');
            //alert(id); return false;
              $.ajax({
                    type: 'post',
                    url: "<?php echo ADMIN_BASE_URL?>logs/log_detail",
                    data: {'id': id},
                    async: false,
                    success: function(test_body) {
                    var test_desc = test_body;
                    $('#myModal_log').modal('show')
                    $("#myModal_log .modal-body .text_here").html(test_desc);
                    }
                });
            });
      $(document).off('click', '.change_stat').on('click', '.change_stat', function(e){
    e.preventDefault();
		var id = $(this).attr('rel');
        var stat = $(this).attr('status');
      swal({
        title : "Er du sikker på at du vil endre betalingsstatus?",
        type : "info",
        showCancelButton : true,
        confirmButtonColor : "#81ccee",
        confirmButtonText : "Ja, endring",
        closeOnConfirm : false
      },
        function () {
            
               $.ajax({
        			type: 'POST',
        			url: "<?= ADMIN_BASE_URL ?>godkjen/transaction_status",
        			data: {'id': id,'stat':stat},
        			async: false,
        			success: function(test_body) {
        			}
        		});
        swal("Endret!", "Betalingsstatus har vært chnage.", "success");
                        location.reload();
      });

    })
</script>