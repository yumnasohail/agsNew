<p>Viser skadesak med referansenummer <?php echo $new->id; ?>,inmeldt av Binder  <?php echo $federation; ?> den <?php echo $new->claim_datetime; ?></p>
<?php if($editable=="0"){ ?>
<h2 class="mb-4">Informasjon om klubben</h2>
<table class=" table table-bordered border-theme1">
    <tbody>
    <tr>
        <td>Klubbnavn</td>
        <td><?php echo $new->c_name; ?></td>
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
        <td>Idrettsnr.</td>
        <td><?php echo $new->a_sportsno; ?></td>
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
        <td>Person ID</td>
        <td><?php echo $new->a_member_no; ?></td>
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
        <td>Hoppfelt der skaden skjedde</td>
        <td><?php echo $new->jumping_feild; ?></td>
    </tr>
    <tr>
        <td>Dato</td>
        <td><?php echo $new->damage_date; ?></td>
    </tr>
    <tr>
        <td>Klokkeslett</td>
        <td><?php echo $new->damage_time; ?></td>
    </tr>

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
        <input type="text" class="form-control" name="a_birth"
            id="nameValidation"   value="<?php echo $new->a_birth; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="lastName">Idrettsnr.</label>
        <input type="text" class="form-control" name="a_sportsno"
            id="la_sportsValidation"  required value="<?php echo $new->a_sportsno; ?>">
    </div>
    <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-6">
        <label for="name">Medlemsnr.</label>
        <input type="text" class="form-control" name="a_member_no"
            id="nameValidation"  required value="<?php echo $new->a_member_no; ?>">
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
    <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-6">
        <label for="password">Hoppfelt der skaden skjedde</label>
        <input type="text" class="form-control" name="jumping_feild"
            id="jumpValidation"  required value="<?php echo $new->jumping_feild; ?>">
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
            <label for="lastName">Forsikring under</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="insurance_under">
                <option value="Tandem" <?php if($new->insurance_under=="Tandem") echo "selected"; ?>>Tandem </option>
                <option value="Basis" <?php if($new->insurance_under=="Basis") echo "selected"; ?>>Basis</option>
                <option value="Ekstra" <?php if($new->insurance_under=="Ekstra") echo "selected"; ?>>Ekstra </option>
                <option value="Basis utvidet" <?php if($new->insurance_under=="Basis utvidet") echo "selected"; ?>>Basis utvidet</option>
                <option value="Ekstra utvidet" <?php if($new->insurance_under=="Ekstra utvidet") echo "selected"; ?>>Ekstra utvidet </option>
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