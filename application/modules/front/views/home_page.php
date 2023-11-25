 <style>
     canvas
     {
         background-color: #e2e2e2;
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
                                            <img src="<?php echo STATIC_FRONT_IMAGE.'logo_naif.png'; ?>">
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
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="email">Klubbnavn</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="nameValidation" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Kontaktperson</label>
                                                <input type="text" class="form-control" name="contact"
                                                    id="contactpValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Adresse</label>
                                                <input type="text" class="form-control" name="address"
                                                    id="addressValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Postnr/sted</label><br>
                                                <input type="text" class="form-control inpt-code" name="code"
                                                    id="codeValidation" required>
                                                <input type="text" class="form-control inpt-num" name="phone"
                                                id="phoneValidation" required>
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
                                                    id="a_nameValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Fødselsdato</label>
                                                <input type="text" class="form-control" name="a_birth"
                                                    id="a_birthValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Etternavn</label>
                                                <input type="text" class="form-control" name="a_surname"
                                                    id="nameValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Idrettsnr.</label>
                                                <input type="text" class="form-control" name="a_sportsno"
                                                    id="la_sportsValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Adresse</label>
                                                <input type="text" class="form-control" name="a_address"
                                                    id="a_addressValidation" required>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Postnr/sted</label><br>
                                                <input type="text" class="form-control inpt-code" name="a_code"
                                                    id="a_codeValidation" required>
                                                <input type="text" class="form-control inpt-num" name="a_phone"
                                                id="a_phoneValidation" required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Navn på foresatte</label>
                                                <input type="text" class="form-control" name="a_guardian"
                                                    id="a_guardianValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="name">Telefon</label>
                                                <input type="text" class="form-control" name="telephone"
                                                    id="a_telValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">E-post</label>
                                                <input type="text" class="form-control" name="e_post"
                                                    id="a_postValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Mobiltelefon</label>
                                                <input type="text" class="form-control" name="mobile_tel"
                                                    id="a_mobtelValidation" required>
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
                                                    id="a_nameValidation"  required></textarea>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label for="lastName">Kort beskrivelse av skaden</label>
                                                <textarea  class="form-control" name="damage_desc"
                                                    id="a_birthValidation"  required></textarea>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Skadet kroppsdel</label>
                                                <input type="text" class="form-control" name="damage_part"
                                                    id="addressValidation"  required>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Idrett</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="sport" required>
                                                        <option value="">Select</option>
                                                        <option value="1">Amerikansk fotball</option>
                                                        <option value="2">Lacrosse </option>
                                                        <option value="3">Frisbee </option>
                                                        <option value="3">Cheerleading </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Når skjedde skaden?</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="place_of_damage"  required>
                                                        <option value="">Select</option>
                                                        <option value="1">I kamp</option>
                                                        <option value="2">Under trening</option>
                                                        <option value="3">Som dommer</option>
                                                        <option value="2">I fritiden</option>
                                                        <option value="3">På reise</option>
                                                        <option value="3">Annet</option>
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
                                                        <option value="1">I sesong</option>
                                                        <option value="2">Utenfor sesong</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>Dato</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="damage_date" required>
                                                    <span class="input-group-text input-group-append input-group-addon ">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                <label>Klokkeslett</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="damage_time" required>
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Underlag</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="basis" required>
                                                        <option value="">Select</option>
                                                        <option value="1">Gress </option>
                                                        <option value="2">Kunstdekke </option>
                                                        <option value="1">Snø/is </option>
                                                        <option value="2">Grus  </option>
                                                        <option value="1">Innendørs  </option>
                                                        <option value="2">Annet  </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Kamp/trening med utøvere i</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="match_with" required>
                                                        <option value="">Select</option>
                                                        <option value="1">Egen aldersklasse</option>
                                                        <option value="2">Seniorklassen</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
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
                                                 <label for="lastName">Forsikring under</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="insurance_under" required>
                                                        <option value="">Select</option>
                                                        <option value="1">Individuell </option>
                                                        <option value="2">Individuell utvidet </option>
                                                        <option value="3">Landslag </option>
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
                                                        <option value="1">Klubb</option>
                                                        <option value="2">Spiller/foresatt</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
                                                <label for="password">Kontonummer</label>
                                                <input type="text" class="form-control" name="bank_account_no"
                                                    id="contactpValidation"  required>
                                            </div>
                                             <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
                                                 <label for="lastName">Annen forsikring</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="inputGroupSelect02" name="other_insurance" required>
                                                        <option value="">Select</option>
                                                        <option value="1">Ikke ulykkesforsikret ved annen forsikring </option>
                                                        <option value="2">Ulykkesforsikret også ved annen forsikring </option>
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
                                                <input type="text" placeholder="Captcha"  class="form-control" id="cpatchaTextBox"/>
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
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Ja </label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="permission"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">Nei</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-6">
                                                <h6>Har du oppgitt informasjon om andre personer?</h6>
                                                <div class="mb-4">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="self"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio3">Ja</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio4" name="self"
                                                            class="custom-control-input">
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
          }
          return false;
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
    </script>