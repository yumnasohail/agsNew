<p>Viser skadesak med referansenummer <?php echo $new->id; ?>,inmeldt av Binder  <?php echo $federation; ?> den <?php echo $new->claim_datetime; ?></p>
<?php if($editable=="0"){ ?>
<h2 class="mb-4">Informasjon om klubben</h2>
<table class=" table table-bordered border-theme1">
    <tbody>
    <tr>
        <td>Klubbnavn</td>
        <td><?php echo $new->c_name; ?></td>
    </tr>
    <tr>
        <td>Kontaktperson</td>
        <td><?php echo $new->c_contact; ?></td>
    </tr>
    <tr>
        <td>Adresse</td>
        <td><?php echo $new->c_address; ?></td>
    </tr>
    <tr>
        <td>Postnr/sted</td>
        <td><?php echo $new->c_code." ".$new->c_phone; ?></td>
    </tr>

    </tbody>
</table>

<h2 class="mb-4">Informasjon om utøveren</h2>
<table class=" table table-bordered border-theme1">
    <tbody>
    <tr>
        <td>Fornavn</td>
        <td><?php echo $new->a_name; ?></td>
    </tr>
    <tr>
        <td>Etternavn</td>
        <td><?php echo $new->a_surname; ?></td>
    </tr>
     <tr>
        <td>Fødselsdato</td>
        <td><?php echo $new->a_birth; ?></td>
    </tr>
    <tr>
        <td>Idrettsnr.</td>
        <td><?php echo $new->a_sportsno; ?></td>
    </tr>
    <tr>
        <td>Adresse</td>
        <td><?php echo $new->a_address; ?></td>
    </tr>
    <tr>
        <td>Postnr/sted</td>
        <td><?php echo $new->a_code." ".$new->a_phone; ?></td>
    </tr>
    <tr>
        <td>Navn på foresatte</td>
        <td><?php echo $new->a_guardian; ?></td>
    </tr>
    <tr>
        <td>Telefon</td>
        <td><?php echo $new->a_telephone; ?></td>
    </tr>
    <tr>
        <td>E-post</td>
        <td><?php echo $new->a_epost; ?></td>
    </tr>
    <tr>
        <td>Mobiltelefon</td>
        <td><?php echo $new->a_mobile_tel; ?></td>
    </tr>
    </tbody>
</table>

<h2 class="mb-4">Informasjon om skaden</h2>
<table class=" table table-bordered border-theme1">
    <tbody>
    
    <tr>
        <td>Hvordan skjedde skaden? Beskriv hendelsesforløpet.</td>
        <td><?php echo $new->injury_reason; ?></td>
    </tr>
    <tr>
        <td>Kort beskrivelse av skaden</td>
        <td><?php echo $new->damage_desc; ?></td>
    </tr>
    <tr>
        <td>Skadet kroppsdel</td>
        <td><?php echo $new->damage_part; ?></td>
    </tr>
    <tr>
        <td>Idrett</td>
        <td><?php echo $new->sport; ?></td>
    </tr>
    <tr>
        <td>Når skjedde skaden?</td>
        <td><?php echo $new->place_of_damage; ?></td>
    </tr>
    <tr>
        <td>På hvilken tid av året?</td>
        <td><?php echo $new->season; ?></td>
    </tr>
    <tr>
        <td>Dato</td>
        <td><?php echo $new->damage_date; ?></td>
    </tr>
    <tr>
        <td>Klokkeslett</td>
        <td><?php echo $new->damage_time; ?></td>
    </tr>
    <tr>
        <td>Underlag</td>
        <td><?php echo $new->basis; ?></td>
    </tr>
    <!-- <tr>
        <td>Kamp/trening med utøvere i</td>
        <td><?php echo $new->match_with; ?></td>
    </tr> -->

    </tbody>
</table>


<h2 class="mb-4">Informasjon om utbetaling og forsikring</h2>
<table class="table table-bordered border-theme1">
    <tbody>
    
    <tr>
        <td>Forsikring under</td>
        <td><?php echo $new->insurance_under; ?></td>
    </tr>

    <tr>
        <td>Erstatning utbetales til</td>
        <td><?php echo $new->claim_paidto; ?></td>
    </tr>

    <tr>
        <td>Kontonummer</td>
        <td><?php echo $new->bank_account_no; ?></td>
    </tr>
    
    <tr>
        <td>Annen forsikring</td>
        <td><?php echo $new->other_insurance; ?></td>
    </tr>

    </tr>
    </tbody>
</table>


<h2 class="mb-4">Samtykke</h2>
<table class=" table table-bordered border-theme1">
    <tbody>
    <tr>
        <td>Gir du ditt samtykke til bruken av data og informasjon du har gitt i forbindelse med kravet?</td>
        <td><?php echo $new->permission; ?></td>
    </tr>

    <tr>
        <td>Har du oppgitt informasjon om andre personer?</td>
        <td><?php echo $new->self; ?></td>
    </tr>

    </tbody>
</table>
<?php } else{ ?>
<form action="<?php echo ADMIN_BASE_URL.'claims/edit_form'; ?>" method="post" id="claim_form"> 
    <input type="hidden" name="c_id" value="<?php echo $new->id; ?>">
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="email">Klubbnavn</label>
        <input type="text" class="form-control" name="name"
            id="nameValidation" required value="<?php echo $new->c_name; ?>">
    </div>
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Kontaktperson</label>
        <input type="text" class="form-control" name="contact"
            id="contactpValidation"  required value="<?php echo $new->c_contact; ?>">
    </div>
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Adresse</label>
        <input type="text" class="form-control" name="address"
            id="addressValidation"  required value="<?php echo $new->c_address; ?>">
    </div>
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Postnr/sted</label><br>
        <input type="text" class="form-control inpt-code" name="code"
            id="codeValidation" required value="<?php echo $new->c_code; ?>">
        <input type="text" class="form-control inpt-num" name="phone"
        id="phoneValidation" required value="<?php echo $new->c_phone; ?>">

    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Fornavn</label>
        <input type="text" class="form-control" name="a_name"
            id="a_nameValidation"  required value="<?php echo $new->a_name; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Etternavn</label>
        <input type="text" class="form-control" name="a_surname"
            id="nameValidation"   value="<?php echo $new->a_surname; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Fødselsnr.</label>
        <input type="number" class="form-control" name="a_birth"
            id="nameValidation"   value="<?php echo $new->a_birth; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="lastName">Idrettsnr.</label>
        <input type="text" class="form-control" name="a_sportsno"
            id="la_sportsValidation"  required value="<?php echo $new->a_sportsno; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Adresse</label>
        <input type="text" class="form-control" name="a_address"
            id="a_addressValidation" required  value="<?php echo $new->a_address; ?>">
    </div>
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Postnr/sted</label><br>
        <input type="text" class="form-control inpt-code" name="a_code"
            id="a_codeValidation" required value="<?php echo $new->a_code; ?>">
        <input type="text" class="form-control inpt-num" name="a_phone"
        id="a_phoneValidation" required value="<?php echo $new->a_phone; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="lastName">Navn på foresatte</label>
        <input type="text" class="form-control" name="a_guardian"
            id="a_guardianValidation"  required value="<?php echo $new->a_guardian; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Telefon</label>
        <input type="text" class="form-control" name="telephone"
            id="a_telValidation"  required value="<?php echo $new->a_telephone; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="lastName">E-post</label>
        <input type="text" class="form-control" name="e_post"
            id="a_postValidation"  required value="<?php echo $new->a_epost; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="lastName">Mobiltelefon</label>
        <input type="text" class="form-control" name="mobile_tel"
            id="a_mobtelValidation" required value="<?php echo $new->a_mobile_tel; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Hvordan skjedde skaden? Beskriv hendelsesforløpet.</label>
        <textarea  class="form-control" name="injury_reason"
            id="a_nameValidation"  required ><?php echo $new->injury_reason; ?></textarea>
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="lastName">Kort beskrivelse av skaden</label>
        <textarea  class="form-control" name="damage_desc"
            id="a_birthValidation"  required><?php echo $new->damage_desc; ?></textarea>
    </div>
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Skadet kroppsdel</label>
        <input type="text" class="form-control" name="damage_part"
            id="addressValidation"  required value="<?php echo $new->damage_part; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Idrett</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="sport">
                <option value="Rugby" <?php if($new->sport=="Rugby") echo "selected"; ?>>Rugby </option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Når skjedde skaden?</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="place_of_damage">
                <option value="I kamp" <?php if($new->place_of_damage=="I kamp") echo "selected"; ?>>I kamp</option>
                <option value="Under trening" <?php if($new->place_of_damage=="Under trening") echo "selected"; ?>>Under trening</option>
                <option value="Som dommer" <?php if($new->place_of_damage=="Som dommer") echo "selected"; ?>>Som dommer</option>
                <option value="I fritiden" <?php if($new->place_of_damage=="I fritiden") echo "selected"; ?>>I fritiden</option>
                <option value="På reise" <?php if($new->place_of_damage=="På reise") echo "selected"; ?>>På reise</option>
                <option value="Annet" <?php if($new->place_of_damage=="Annet") echo "selected"; ?>>Annet</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">På hvilken tid av året?</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="season">
                <option value="I sesong" <?php if($new->season=="I sesong") echo "selected"; ?>>I sesong</option>
                <option value="Utenfor sesong" <?php if($new->season=="Utenfor sesong") echo "selected"; ?>>Utenfor sesong</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label>Dato</label>
        <div class="input-group date">
            <input type="text" class="form-control" name="damage_date" value="<?php echo $new->damage_date; ?>">
            <span class="input-group-text input-group-append input-group-addon ">
                <i class="simple-icon-calendar"></i>
            </span>
        </div>
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label>Klokkeslett</label>
        <div class="input-group date">
            <input type="text" class="form-control" name="damage_time" value="<?php echo $new->damage_time; ?>">
            <span class="input-group-text input-group-append input-group-addon">
                <i class="simple-icon-calendar"></i>
            </span>
        </div>
    </div>
        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Underlag</label>
        <div class="input-group mb-3">  
            <select class="custom-select" id="inputGroupSelect02" name="basis" >
                <option value="Gress" <?php if($new->basis=="Gress") echo "selected"; ?>>Gress </option>
                <option value="Kunstdekke" <?php if($new->basis=="Kunstdekke") echo "selected"; ?>>Kunstdekke </option>
                <option value="Snø/is" <?php if($new->basis=="Snø/is") echo "selected"; ?>>Snø/is </option>
                <option value="Grus" <?php if($new->basis=="Grus") echo "selected"; ?>>Grus  </option>
                <option value="Innendørs" <?php if($new->basis=="Innendørs") echo "selected"; ?>>Innendørs  </option>
                <option value="Annet" <?php if($new->basis=="Annet") echo "selected"; ?>>Annet  </option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
        <!-- <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Kamp/trening med utøvere i</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="match_with">
                <option value="Egen aldersklasse" <?php if($new->match_with=="Egen aldersklasse") echo "selected"; ?>>Egen aldersklasse</option>
                <option value="Seniorklassen" <?php if($new->match_with=="Seniorklassen") echo "selected"; ?>>Seniorklassen</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div> -->
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Forsikring under</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="insurance_under">
                <option value="Individuell" <?php if($new->insurance_under=="Individuell") echo "selected"; ?>>Individuell </option>
                <option value="Individuell utvidet" <?php if($new->insurance_under=="Individuell utvidet") echo "selected"; ?>>Individuell utvidet </option>
                <option value="Landslag" <?php if($new->insurance_under=="Landslag") echo "selected"; ?>>Landslag </option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Erstatning utbetales til</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="claim_paidto">
                <option value="Klubb" <?php if($new->claim_paidto=="Klubb") echo "selected"; ?>>Klubb</option>
                <option value="Spiller/foresatt" <?php if($new->claim_paidto=="Spiller/foresatt") echo "selected"; ?>>Spiller/foresatt</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Kontonummer</label>
        <input type="text" class="form-control" name="bank_account_no"
            id="contactpValidation"  required value="<?php echo $new->bank_account_no; ?>">
    </div>
        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
            <label for="lastName">Annen forsikring</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="other_insurance">
                <option value="Ikke ulykkesforsikret ved annen forsikring" <?php if($new->other_insurance=="Ikke ulykkesforsikret ved annen forsikring") echo "selected"; ?>>Ikke ulykkesforsikret ved annen forsikring </option>
                <option value="Ulykkesforsikret også ved annen forsikring" <?php if($new->other_insurance=="Ulykkesforsikret også ved annen forsikring") echo "selected"; ?>>Ulykkesforsikret også ved annen forsikring </option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-6">
        <h6>Gir du ditt samtykke til bruken av data og informasjon du har gitt i forbindelse med kravet?</h6>
        <div class="mb-4">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="permission"
                    class="custom-control-input" value="Ja" <?php if($new->permission=="Ja") echo "checked"; ?>>
                <label class="custom-control-label" for="customRadio1">Ja </label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="permission"
                    class="custom-control-input" value="Nei" <?php if($new->permission=="Nei") echo "checked"; ?>>
                <label class="custom-control-label" for="customRadio2">Nei</label>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-6">
        <h6>Har du oppgitt informasjon om andre personer?</h6>
        <div class="mb-4">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="self"
                    class="custom-control-input" value="Jai" <?php if($new->self=="Jai") echo "checked"; ?>>  
                <label class="custom-control-label" for="customRadio3">Ja</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="self"
                    class="custom-control-input" value="Nei" <?php if($new->self=="Nei") echo "checked"; ?>>
                <label class="custom-control-label" for="customRadio4">Nei</label>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-outline-primary finish-btn" name="button">lagre</button>
</form>

<?php } ?>


<script>
$('.finish-btn').off('click').click(function(e){
    e.preventDefault();
    $('#claim_form :input').each(function(){
        if($(this).attr('type')!="button"){
            if($(this).val()!=""){
                empty =false;
            }else{
                toastr.error('Vennligst fyll ut kravdataene');
            }
        }
    });
    if(empty==false)
    {
        var form_data=$('#claim_form').serialize();
        $.ajax({
            type: 'POST',
            url: "<?= BASE_URL ?>claims/update_claim",
            data: {'data': form_data,'federation':'<?php echo $federation; ?>'},
            async: false,
            success: function(){
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: 'Krav oppdatert',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    }
});


</script>