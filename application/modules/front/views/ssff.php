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
                                            <img src="<?php echo STATIC_FRONT_IMAGE.'logo_ssff.gif'; ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12 col-md-12">
                                            <p>Detta formulär gäller för din försäkring och går till AGS Försäkring.</p>
                                                <p><i class="iconsminds-right-2"></i>
                                                Alla skador måste rapporteras genom detta formulär, innan någon utbetalning är möjlig.
                                                </p>
                                                <p><i class="iconsminds-right-2"></i>
                                                Formuläret måste fyllas i av den skadade, någon som handlar på den skadades vägnar (efter att ha erhållit erforderligt medgivande att göra det) eller en person med föräldraansvar för den skadade – i förekommande fall.
                                                </p>
                                                <p><i class="iconsminds-right-2"></i>
                                                SSFF/SHFs olycksrapportformulär måste också fyllas i och skickas så att avsnittet också informeras
                                                </p>
                                            </div>
                                            <input type="hidden" name="claim_id" value="<?php if(isset($new->id) && !empty($new->id)) echo $new->id; ?>" >
                                            <input type="hidden" name="federation_id" value="<?php if(isset($new->federation) && !empty($new->federation)) echo $new->federation; ?>" >

                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="email">Clubnamn</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="nameValidation" required value="<?php if(isset($new->c_name) && !empty($new->c_name)) echo $new->c_name; ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="step-1">
                                    <form id="form-step-1" class="tooltip-label-right" novalidate>
                                        <div class="row">
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Förnamn</label>
                                                <input type="text" class="form-control" name="a_name"
                                                    id="a_nameValidation"  required value="<?php if(isset($new->a_name) && !empty($new->a_name)) echo $new->a_name; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Licens</label>
                                                <input type="text" class="form-control" name="license"
                                                    id="licenseValidation"  required value="<?php if(isset($new->license) && !empty($new->license)) echo $new->license; ?>">
                                            </div>
                                            <!-- <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">födselsdatum</label>
                                                <input type="text" class="form-control" name="a_birth"
                                                    id="licenseValidation"  required value="<?php if(isset($new->a_birth) && !empty($new->a_birth)) echo $new->a_birth; ?>">
                                            </div> -->
                                            <?php
                                                $value = isset($new->a_birth) ? trim($new->a_birth) : '';
                                                $inputType = 'date';
                                                $displayValue = $value;
                                                if (!empty($value)) {
                                                    if (preg_match('/^\d{1,2}-\d{1,2}-\d{4}$/', $value)) {
                                                        $parts = explode('-', $value);
                                                        $day = $parts[0];
                                                        $month = $parts[1];
                                                        $year = $parts[2];
                                                        if (checkdate($month, $day, $year)) {
                                                            $inputType = 'date';
                                                            $displayValue = "$year-$month-$day"; // correct HTML5 format
                                                        }
                                                    } else {
                                                        $inputType = 'text';
                                                        $displayValue = $value;
                                                    }
                                                } else {
                                                    $inputType = 'date';
                                                    $displayValue = '';
                                                }
                                                if($inputType=="date"){
                                            ?>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>födselsdatum</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="a_birth" id="nameValidation"  required value="<?php  if(isset($new->a_birth) && !empty($new->a_birth)) echo $new->a_birth; ?>">
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                                <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                    <label for="name">födselsdatum</label>
                                                    <input type="number" class="form-control" name="a_birth" id="nameValidation"  required  value="<?php  if(isset($new->a_birth) && !empty($new->a_birth)) echo $new->a_birth; ?>">
                                                </div>
                                            <?php } ?>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Sport nr.</label>
                                                <input type="text" class="form-control" name="a_sportsno"
                                                    id="a_birthValidation"  required value="<?php if(isset($new->a_sportsno) && !empty($new->a_sportsno)) echo $new->a_sportsno; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Efternamn</label>
                                                <input type="text" class="form-control" name="a_surname"
                                                    id="nameValidation"  required value="<?php  if(isset($new->a_surname) && !empty($new->a_surname)) echo $new->a_surname; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Adress</label>
                                                <input type="text" class="form-control" name="a_address"
                                                    id="a_addressValidation" required value="<?php  if(isset($new->a_address) && !empty($new->a_address)) echo $new->a_address; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Postnr/postort</label><br>
                                                <input type="text" class="form-control inpt-code" name="a_code"
                                                    id="a_codeValidation" required value="<?php if(isset($new->a_code) && !empty($new->a_code)) echo $new->a_code; ?>">
                                                <input type="text" class="form-control inpt-num" name="a_phone"
                                                id="a_phoneValidation" required value="<?php  if(isset($new->a_phone) && !empty($new->a_phone))  echo $new->a_phone; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Namn på förmyndare</label>
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
                                                <label for="name">Vilken kroppsskada uppkom.</label>
                                                <textarea  class="form-control" name="injury_reason"
                                                    id="a_nameValidation"  required> <?php  if(isset($new->injury_reason) && !empty($new->injury_reason))  echo $new->injury_reason; ?> </textarea>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Kort beskrivning av olyckshändelsen</label>
                                                <textarea  class="form-control" name="damage_desc"
                                                    id="a_birthValidation"  required ><?php  if(isset($new->damage_desc) && !empty($new->damage_desc))  echo $new->damage_desc; ?></textarea>
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
                                                <label for="name">Skadad kroppsdel</label>
                                                <input type="text" class="form-control" name="damage_part"
                                                    id="damagevalidation"  required value="<?php  if(isset($new->damage_part) && !empty($new->damage_part))  echo $new->damage_part; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Var innträffade olycksfallet</label>
                                                <input type="text" class="form-control" name="where_acc_occur"
                                                    id="addressValidation"  required value="<?php  if(isset($new->where_acc_occur) && !empty($new->where_acc_occur))  echo $new->where_acc_occur; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Har du skickat händelsesrapport til SHF?</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="sentto_shf" required>
                                                        <option value="">Select</option>
                                                        <option value="Ja"  <?php if(isset($new->sentto_shf) && !empty($new->sentto_shf) && $new->sentto_shf=="Ja") echo "selected"; ?>>Ja </option>
                                                        <option value="Nei"  <?php if(isset($new->sentto_shf) && !empty($new->sentto_shf) && $new->sentto_shf=="Nei") echo "selected"; ?>>Nei</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>Datum</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="damage_date" required value="<?php  if(isset($new->damage_date) && !empty($new->damage_date))  echo $new->damage_date; ?>">
                                                    <span class="input-group-text input-group-append input-group-addon ">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>Tid</label>
                                                <div class="input-group datetimepicker1">
                                                    <input type="text" class="form-control" name="damage_time" required value="<?php  if(isset($new->damage_time) && !empty($new->damage_time))  echo $new->damage_time; ?>">
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                             
                                        </div>
                                    </form>
                                    <!--<h4 class="text-center">Thank you for your feedback!</h4>-->
                                    <!--<p class="muted text-center p-4">-->
                                    <!--    Podcasting operational change management inside of workflows to establish a-->
                                    <!--    framework. Taking seamless key performance indicators offline to maximise the-->
                                    <!--    long tail. Keeping your eye on the ball while performing a deep dive on the-->
                                    <!--    start-up mentality.-->
                                    <!--</p>-->
                                </div>
                                <div id="step-3">
                                     <form  id="form-step-3" class="tooltip-label-right" novalidate>
                                        <div class="row">
                                            
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Försäkrad under</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="insurance_under" required>
                                                        <option value="">Select</option>
                                                        <option value="Grund"  <?php if(isset($new->insurance_under) && !empty($new->insurance_under) && $new->insurance_under=="Grund") echo "selected"; ?>>Grund </option>
                                                        <option value="Standard"  <?php if(isset($new->insurance_under) && !empty($new->insurance_under) && $new->insurance_under=="Standard") echo "selected"; ?>>Standard</option>
                                                        <option value="Plus"  <?php if(isset($new->insurance_under) && !empty($new->insurance_under) && $new->insurance_under=="Plus") echo "selected"; ?>>Plus </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">IBAN-kontonummer</label>
                                                <input type="text" class="form-control" name="bank_account_no"
                                                    id="contactpValidation"  required value="<?php  if(isset($new->bank_account_no) && !empty($new->bank_account_no))  echo $new->bank_account_no; ?>">
                                                    <p>För att kunna överföra till ditt konto behöver vi ditt IBAN-kontonummer. Detta hittar du i nätbanken och på bankens webbsidor.</p>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Annan försäkring</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="other_insurance" required>
                                                        <option value="">Select</option>
                                                        <option value="Ikke ulykkesforsikret ved annen forsikring" <?php if(isset($new->other_insurance) && !empty($new->other_insurance) && $new->other_insurance=="Ikke ulykkesforsikret ved annen forsikring") echo "selected"; ?>>Inte olycksfallsförsäkrad av annan försäkring</option>
                                                        <option value="Ulykkesforsikret også ved annen forsikring" <?php if(isset($new->other_insurance) && !empty($new->other_insurance) && $new->other_insurance=="Ulykkesforsikret også ved annen forsikring") echo "selected"; ?>>Oavsiktligt försäkrad också med andra försäkringar</option>
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
                                                <a onclick="createCaptcha()"><p style="color: #dea1ac;cursor: pointer;">Ange säkerhetskoden du ser til vänster:</p></a>
                                                <input type="text" placeholder="Captcha"  class="form-control" id="cpatchaTextBox" required/>
                                                <p>Svårt at läsa? Tryck här igen.</p>
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
                                                Vi, Lloyd ' s försäkringsbolag S.A. och andra försäkrings aktörer behöver ditt medgivande för att använda dina person uppgifter som anges nedan i samband med ditt krav. Du behöver inte ge ditt samtycke och du kan när som helst återkalla ditt samtycke genom att skicka ett e-postmeddelande till: skade@affinity.no (utan att det påverkar lagligheten av behandlingen baserat på samtycke innan det dras tillbaka). Men om du inte ger ditt medgivande, eller om du återkallar ditt samtycke, kan detta hindra oss från att hantera eller på annat sätt påverka vår förmåga att hantera ditt krav.                                                </p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-6">
                                                <h6>Samtycker du till att använda data och information som du lämnat i samband med anspråket?</h6>
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
                                                <h6>Ger du oss information om andra människor?</h6>
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
                                       <p class="muted text-center p-4">Ofullstendig slutförd blankett returneras, och hanteras eller lagras inte.</p>
                                    </form>
                                </div>
                            </div>

                            <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
                                <button class="btn btn-secondary prev-btn" type="button">Previous</button>
                                <button class="btn btn-secondary next-btn" type="button">Next</button>
                                <button class="btn btn-secondary finish-btn" type="submit">Skicka formulär</button>
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