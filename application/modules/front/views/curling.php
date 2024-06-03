<style>
     canvas
     {
         background-color: #e2e2e2;
     }
      .error{
         color:red;
     }
 </style>
 <main >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card mb-4">
                        <div id="smartWizardValidation">
                            <ul class="card-header">
                                <li><a href="#step-0">Step 1<br /><small>Informasjon om klubben</small></a></li>
                                <li><a href="#step-1">Step 2<br /><small>Informasjon om utøveren</small></a></li>
                                <li><a href="#step-2">Step 3<br /><small>Informasjon om skaden</small></a></li>
                                <li><a href="#step-3">Step 4<br /><small>Informasjon om utbetaling og forsikring</small></a></li>
                                <li><a href="#step-4">Step 5<br /><small>Verifisering</small></a></li>
                                <li><a href="#step-5">Step 6<br /><small>Samtykke</small></a></li>
                                

                            </ul>

                            <div class="card-body">
                                <div id="step-0"  >
                                    <form id="form-step-0" class="tooltip-label-right" novalidate>
                                        <div class="partner-image">
                                            <img src="<?php echo STATIC_FRONT_IMAGE.'top_banner.png'; ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12 col-md-12">
                                                <p><i class="iconsminds-right-2"></i>
                                                Alle skader må være innrapportert via dette skadeskjema, før skadeutbetaling kan utføres.
                                                </p>
                                                <p><i class="iconsminds-right-2"></i>
                                                Skadeskjemaet må fylles ut av skadelidte, noen som handler på skadelidtes vegne (etter å ha innhentet nødvendig samtykke til det) eller har foreldreansvaret overfor skadelidte - når aktuelt.
                                                </p>
                                            </div>

                                            <input type="hidden" name="claim_id" value="<?php if(isset($new->id) && !empty($new->id)) echo $new->id; ?>" >
                                            <input type="hidden" name="federation_id" value="<?php if(isset($new->federation) && !empty($new->federation)) echo $new->federation; ?>" >

                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="email">Klubbnavn</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="nameValidation" required value="<?php if(isset($new->c_name) && !empty($new->c_name)) echo $new->c_name; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Kontaktperson</label>
                                                <input type="text" class="form-control" name="contact"
                                                    id="contactpValidation"  required value="<?php if(isset($new->c_contact) && !empty($new->c_contact)) echo $new->c_contact; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Adresse</label>
                                                <input type="text" class="form-control" name="address"
                                                    id="addressValidation"  required value="<?php if(isset($new->c_address) && !empty($new->c_address))  echo $new->c_address; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Krets</label>
                                                <input type="text" class="form-control" name="circuit"
                                                    id="addressValidation"  required value="<?php if(isset($new->circuit) && !empty($new->circuit))  echo $new->circuit; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Postnr/sted</label><br>
                                                <input type="text" class="form-control inpt-code" name="code"
                                                    id="codeValidation" required value="<?php if(isset($new->c_code) && !empty($new->c_code))  echo $new->c_code; ?>">
                                                <input type="text" class="form-control inpt-num" name="phone"
                                                id="phoneValidation" required value="<?php if(isset($new->c_phone) && !empty($new->c_phone))  echo $new->c_phone; ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="step-1">
                                    <form id="form-step-1" class="tooltip-label-right" novalidate>
                                        <div class="row">
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Fornavn</label>
                                                <input type="text" class="form-control" name="a_name"
                                                    id="a_nameValidation"  required value="<?php if(isset($new->a_name) && !empty($new->a_name)) echo $new->a_name; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Etternavn</label>
                                                <input type="text" class="form-control" name="a_surname"
                                                    id="nameValidation"  required value="<?php  if(isset($new->a_surname) && !empty($new->a_surname)) echo $new->a_surname; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Fødselsdato</label>
                                                <input type="text" class="form-control" name="a_birth"
                                                    id="nameValidation"  required  value="<?php  if(isset($new->a_birth) && !empty($new->a_birth)) echo $new->a_birth; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Idrettsnr.</label>
                                                <input type="text" class="form-control" name="a_sportsno"
                                                    id="la_sportsValidation"  required value="<?php if(isset($new->a_sportsno) && !empty($new->a_sportsno)) echo $new->a_sportsno; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Adresse</label>
                                                <input type="text" class="form-control" name="a_address"
                                                    id="a_addressValidation" required value="<?php  if(isset($new->a_address) && !empty($new->a_address)) echo $new->a_address; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Postnr/sted</label><br>
                                                <input type="text" class="form-control inpt-code" name="a_code"
                                                    id="a_codeValidation" required value="<?php if(isset($new->a_code) && !empty($new->a_code)) echo $new->a_code; ?>">
                                                <input type="text" class="form-control inpt-num" name="a_phone"
                                                id="a_phoneValidation" required value="<?php  if(isset($new->a_phone) && !empty($new->a_phone))  echo $new->a_phone; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Navn på foresatte</label>
                                                <input type="text" class="form-control" name="a_guardian"
                                                    id="a_guardianValidation"  required value="<?php  if(isset($new->a_guardian) && !empty($new->a_guardian))  echo $new->a_guardian; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Telefon</label>
                                                <input type="text" class="form-control" name="telephone"
                                                    id="a_telValidation"  required value="<?php  if(isset($new->a_telephone) && !empty($new->a_telephone))  echo $new->a_telephone; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">E-post</label>
                                                <input type="text" class="form-control" name="e_post"
                                                    id="a_postValidation"  required value="<?php  if(isset($new->a_epost) && !empty($new->a_epost))  echo $new->a_epost; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Mobiltelefon</label>
                                                <input type="text" class="form-control" name="mobile_tel"
                                                    id="a_mobtelValidation" required value="<?php  if(isset($new->a_mobile_tel) && !empty($new->a_mobile_tel))  echo $new->a_mobile_tel; ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="step-2">
                                     <form  id="form-step-2" class="tooltip-label-right" novalidate>
                                        <div class="row">
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Hvordan skjedde skaden? Beskriv hendelsesforløpet.</label>
                                                <textarea  class="form-control" name="injury_reason"
                                                    id="a_nameValidation"  required> <?php  if(isset($new->injury_reason) && !empty($new->injury_reason))  echo $new->injury_reason; ?></textarea>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Kort beskrivelse av skaden</label>
                                                <textarea  class="form-control" name="damage_desc"
                                                    id="a_birthValidation"  required> <?php  if(isset($new->damage_desc) && !empty($new->damage_desc))  echo $new->damage_desc; ?></textarea>
                                            </div>
                                            <!--<div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Skadet kroppsdel</label>
                                                <select class="custom-select" id="damagevalidation" name="damage_part" required>
                                                <option value="">Select</option>
                                                <?php $res=Modules::run('api/_get_specific_table_with_pagination',array("status"=> "1") , "id asc","body_parts","part",1,0)->result_array();
                                                foreach($res as $key=> $value):?>
                                                    <option value="<?php echo $value['part']; ?>"  <?php if(isset($new->damage_part) && !empty($new->damage_part) && $new->damage_part==$value['part']) echo "selected"; ?>><?php echo $value['part']; ?> </option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>-->
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Skadet kroppsdel</label>
                                                <input type="text" class="form-control" name="damage_part"
                                                    id="damagevalidation"  required value="<?php  if(isset($new->damage_part) && !empty($new->damage_part))  echo $new->damage_part; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Idrett</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="sport" required>
                                                        <option value="">Select</option>
                                                        <option value="Curling"  <?php if(isset($new->sport) && !empty($new->sport) && $new->sport=="Curling") echo "selected"; ?>>Curling</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Når skjedde skaden?</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="place_of_damage" required>
                                                        <option value="">Select</option>
                                                        <option value="I konkurranse" <?php if(isset($new->place_of_damage) && !empty($new->place_of_damage) && $new->place_of_damage=="I konkurranse") echo "selected"; ?>>I konkurranse</option>
                                                        <option value="Under trening" <?php if(isset($new->place_of_damage) && !empty($new->place_of_damage) && $new->place_of_damage=="Under trening") echo "selected"; ?>>Under trening</option>
                                                        <option value="Som dommer" <?php if(isset($new->place_of_damage) && !empty($new->place_of_damage) && $new->place_of_damage=="Som dommer") echo "selected"; ?>>Som dommer</option>
                                                        <option value="I fritiden" <?php if(isset($new->place_of_damage) && !empty($new->place_of_damage) && $new->place_of_damage=="I fritiden") echo "selected"; ?>>I fritiden</option>
                                                        <option value="På reise" <?php if(isset($new->place_of_damage) && !empty($new->place_of_damage) && $new->place_of_damage=="På reise") echo "selected"; ?>>På reise</option>
                                                        <option value="Annet" <?php if(isset($new->place_of_damage) && !empty($new->place_of_damage) && $new->place_of_damage=="Annet") echo "selected"; ?>>Annet</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">På hvilken tid av året?</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="season" required>
                                                        <option value="">Select</option>
                                                        <option value="I sesong"  <?php if(isset($new->season) && !empty($new->season) && $new->season=="I sesong") echo "selected"; ?>>I sesong</option>
                                                        <option value="Utenfor sesong" <?php if(isset($new->season) && !empty($new->season) && $new->season=="Utenfor sesong") echo "selected"; ?>>Utenfor sesong</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>Dato</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="damage_date" required value="<?php  if(isset($new->damage_date) && !empty($new->damage_date))  echo $new->damage_date; ?>">
                                                    <span class="input-group-text input-group-append input-group-addon ">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>Klokkeslett</label>
                                                <div class="input-group datetimepicker1">
                                                    <input type="text" class="form-control" name="damage_time"  required value="<?php  if(isset($new->damage_time) && !empty($new->damage_time))  echo $new->damage_time; ?>">
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="step-3">
                                     <form  id="form-step-3" class="tooltip-label-right" novalidate>
                                        <div class="row">
                                            
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Forsikring under</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="insurance_under" required>
                                                        <option value="">Select</option>
                                                        <option value="Basislisens" <?php if(isset($new->insurance_under) && !empty($new->insurance_under) && $new->insurance_under=="Basislisens") echo "selected"; ?>>Basislisens </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Erstatning utbetales til</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="claim_paidto" required>
                                                        <option value="">Select</option>
                                                        <option value="Klubb" <?php if(isset($new->claim_paidto) && !empty($new->claim_paidto) && $new->claim_paidto=="Klubb") echo "selected"; ?>>Klubb</option>
                                                        <option value="Spiller/foresatt" <?php if(isset($new->claim_paidto) && !empty($new->claim_paidto) && $new->claim_paidto=="Spiller/foresatt") echo "selected"; ?>>Spiller/foresatt</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Kontonummer</label>
                                                <input type="text" class="form-control" name="bank_account_no"
                                                    id="contactpValidation"  required value="<?php  if(isset($new->bank_account_no) && !empty($new->bank_account_no))  echo $new->bank_account_no; ?>">
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Annen forsikring</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="other_insurance" required>
                                                        <option value="">Select</option>
                                                        <option value="Ikke ulykkesforsikret ved annen forsikring" <?php if(isset($new->other_insurance) && !empty($new->other_insurance) && $new->other_insurance=="Ikke ulykkesforsikret ved annen forsikring") echo "selected"; ?>>Ikke ulykkesforsikret ved annen forsikring </option>
                                                        <option value="Ulykkesforsikret også ved annen forsikring" <?php if(isset($new->other_insurance) && !empty($new->other_insurance) && $new->other_insurance=="Ulykkesforsikret også ved annen forsikring") echo "selected"; ?>>Ulykkesforsikret også ved annen forsikring </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="step-4" >
                                     <form id="form-step-4" class="tooltip-label-right" onsubmit="validateCaptcha()" >
                                        <div id="captcha">
                                        </div>
                                        <div class="row">

                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">  
                                                <a onclick="createCaptcha()"><p style="color: #dea1ac;cursor: pointer;">Skriv inn sikkerhetskoden du ser til venstre:</p></a>
                                                <input type="text" placeholder="Captcha"  class="form-control" id="cpatchaTextBox" required/>
                                                <p>store og små bokstaver</p>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">   
                                                <button class="btn btn-secondary mb-1" type="submit">Verify</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                                <div id="step-5">
                                     <form  id="form-step-5" class="tooltip-label-right" novalidate>
                                        <div class="row">
                                             <div class="col-sm-12 col-xs-12 col-md-12">
                                                <p><i class="iconsminds-right-2"></i>
                                                    Vi, Lloyd's Insurance Company S.A., og andre forsikringsmarkedsdeltakere trenger ditt samtykke til å bruke den sensitive informasjon om deg som er beskrevet nedenfor i forbindelse med kravet ditt. Du trenger ikke å gi ditt samtykke, og du kan trekke tilbake samtykket ditt når som helst ved å sende en e-post til skade@affinity.no (uten at det imidlertid påvirker lovligheten av behandlingen basert på samtykke før tilbaketrekking). Imidlertid, hvis du ikke gir ditt samtykke eller trekker tilbake ditt samtykke, kan dette hindre oss i, eller på annen måte påvirke vår evne til å håndtere kravet ditt.
                                                </p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-6">
                                                <h6>Gir du ditt samtykke til bruken av data og informasjon du har gitt i forbindelse med kravet?</h6>
                                                <div class="mb-4">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="permission"
                                                            class="custom-control-input" value="Ja" <?php if(!isset($new->permission)) echo "checked"; ?>    <?php if(isset($new->permission) && !empty($new->permission) && $new->permission=="Ja") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customRadio1">Ja </label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="permission"
                                                            class="custom-control-input" value="Nei" <?php if(!isset($new->permission)) echo "checked"; ?>  required  <?php if(isset($new->permission) && !empty($new->permission) && $new->permission=="Nei") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customRadio2">Nei</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-6">
                                                <h6>Har du oppgitt informasjon om andre personer?</h6>
                                                <div class="mb-4">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="self"
                                                            class="custom-control-input" Value="Ja"  <?php if(!isset($new->self)) echo "checked"; ?>  <?php if(isset($new->self) && !empty($new->self) && $new->self=="Jai") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customRadio3">Ja</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio4" name="self"
                                                            class="custom-control-input" value="Nei" <?php if(isset($new->self) && !empty($new->self) && $new->self=="Nei") echo "checked"; ?>>
                                                        <label class="custom-control-label" for="customRadio4">Nei</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <p class="muted text-center p-4">Ufullstendig utfylt skadeskjema vil bli returnert og ikke behandlet eller lagret.</p>
                                    </form>
                                </div>
                            </div>

                            <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
                                <button class="btn btn-secondary prev-btn" type="button">Previous</button>
                                <button class="btn btn-secondary next-btn" type="button">Next</button>
                                <button class="btn btn-secondary finish-btn" type="submit">Finish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    
    
    <script>
    
        $(document).ready(function(){

   $("#form-step-3").validate({
        rules: {
            bank_account_no: {
                required: true,
                noSpecialChars: true,
                noSpaces: true
            }
            // Add more rules as needed
        },
        messages: {
            bank_account_no: {
                required: "Bank Account Number is required",
                noSpecialChars: "Bank Account Number cannot contain special characters",
                noSpaces: "Bank Account Number cannot contain spaces"
            }
            // Add more messages as needed
        }
    });
 // Custom validation method to disallow special characters
    $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]*$/.test(value);
    }, "Special characters are not allowed");

    // Custom validation method to disallow spaces
    $.validator.addMethod("noSpaces", function(value, element) {
        return this.optional(element) || !/\s/.test(value);
    }, "Spaces are not allowed");
});
        var code;
        function createCaptcha() {
          document.getElementById('captcha').innerHTML = "";
          var charsArray =
          "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
          var lengthOtp = 6;
          var captcha = [];
          for (var i = 0; i < lengthOtp; i++) {
            var index = Math.floor(Math.random() * charsArray.length + 1); 
            if (captcha.indexOf(charsArray[index]) == -1)
              captcha.push(charsArray[index]);
            else i--;
          }
          var canv = document.createElement("canvas");
          canv.id = "captcha";
          canv.width = 100;
          canv.height = 50;
          var ctx = canv.getContext("2d");
          ctx.font = "25px Georgia";
          ctx.strokeText(captcha.join(""), 0, 30);
          code = captcha.join("");
          document.getElementById("captcha").appendChild(canv); 
        }
        function validateCaptcha() {
          event.preventDefault();
          debugger
          if (document.getElementById("cpatchaTextBox").value == code) {
              document.getElementById("cpatchaTextBox").style.borderColor ="green";
              document.getElementById("cpatchaTextBox").disabled = true;
          }else{
            createCaptcha();
            return false;
          }
        }
        
        
         
    
        $('.finish-btn').off('click').click(function(e){
			e.preventDefault();
            var form_data=$('#form-step-0, #form-step-1, #form-step-2, #form-step-3, #form-step-4, #form-step-5').serialize();
            $.ajax({
					type: 'POST',
					url: "<?= BASE_URL ?>front/submit_claim",
					data: {'data': form_data,'federation':'<?php echo $this->uri->segment(1) ?>'},
					async: false,
					success: function(){
                        window.location.href = "<?php echo BASE_URL.'suksess' ?>";
					}
				});
			
		});
        
        $(document).ready(function(){
            <?php if(isset($claim_id))
            {?>
                 verification();
                 function verification()
        {
            Swal.mixin({
                input: 'password',
                confirmButtonText: 'Verify &rarr;',
                allowOutsideClick: false,
                progressSteps: ['']
                }).queue([
                {
                    title: 'Skriv inn koden din'
                }
                ]).then((result) => {
                    code = JSON.stringify(result.value);
                    var check_response=check(code);
                    if(check_response)
                    {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                        icon: 'success',
                        title: 'Verified'
                        })
                    }else
                    {
                        location.reload();
                    }
                    
                })
            
        }
        function check(code)
        {
            var response=true;
            $.ajax({
                type: 'POST',
                url: "<?= BASE_URL ?>front/verify_code",
                data: {'code': code,'claim_id':'<?php echo $claim_id ?>'},
                async: false,
                success: function(res){
                    response= res.status;
                }
            });
            return response;
        }
            <?php } ?>
        });

        


    </script>