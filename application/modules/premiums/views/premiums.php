 <style>
    
     label
     {
             min-height: 40px;
     }
     .space_set {
            padding: 10px;
        }
 </style>
 <?php   $federation=$this->uri->segment(3);   ?>
 <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="color-theme-1">Forsikringspremie  (<?php echo $ttl_name; ?>)</h1>
                    <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right" href="<?php echo ADMIN_BASE_URL. 'premiums/policy_periods/'.$federation_id; ?>">&nbsp;&nbsp;&nbsp; Back</a>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                                <div class="col-sm-12" data-id="<?php echo $period_id ?>" data_f_id="<?php echo $federation_id ?>">
                                    <p>Beløp mottatt fra Federation : <strong><?php if(!empty($totals['paid'])) echo  round($totals['paid']); else echo "0"; ?> <?php echo $period['currency']; ?></strong></p>
                                    <p>Beløp betalt til AGS : <strong><?php if(!empty($totals['recieved'])) echo   round($totals['recieved']);  else echo "0";  ?> <?php echo $period['currency']; ?></strong></p>
                                    <p>Beløp betalt til forsikringsselskapet : <strong><?php if(!empty($totals['total_insurances'])) echo  round($totals['total_insurances']); else echo "0"; ?> <?php echo $period['currency']; ?></strong></p>
                                    <div class=" bg-theme-1   space_set">
                                        <?php echo date("d.m.Y", strtotime($period['start_date']))."  -  ".date("d.m.Y", strtotime($period['end_date'])); ?>
                                        <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right add_field_button" style="padding-top: 0px;padding-bottom: 0px;border-color: white; cursor:pointer;"> + legg til</a>
                                    </div>
                                    <div class="rap_clone">
                                    <?php 
                                   if(!empty($premiums))
                                    {
                                        foreach($premiums as $p => $pm):?>
                                        <div class=" row col-sm-12">
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                            <label>HB Dato innbetalt til AGS</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="dato"  id="dato" value="<?php  echo  date("d-m-Y", strtotime($pm['dato'])) ?>">
                                                    <span class="input-group-text input-group-append input-group-addon">
                                                        <i class="simple-icon-calendar"></i>
                                                    </span>
                                                </div> 
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                <label for="password">Beløp mottatt fra Federation (100%)</label>
                                                <input type="number" class="form-control" id="paid" required value="<?php  echo  $pm['paid']; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                <label for="password">Provisjon til AGS i%</label>
                                                <input type="number" class="form-control" id="comission" required value="<?php  echo  $pm['comission']; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                <label for="password">Beløp betalt til AGS</label>
                                                <input type="number" class="form-control" id="recieved" required value="<?php  echo  $pm['recieved']; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2">
                                                <label for="password">Beløp betalt til forsikringsselskapet</label>
                                                <input type="number" class="form-control" id="total_insurances" required value="<?php  echo  $pm['total_insurances']; ?>">
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1 to_end">
                                                <button type="button" class="btn btn-sm btn-outline-primary fjren" data-premium-id="<?php echo $pm['id']; ?>">Lagre</button>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1 to_end">
                                                <button type="button" class="btn btn-sm btn-outline-primary del_premium" data-premium-id="<?php echo $pm['id']; ?>">Slett</button>
                                            </div>
                                            <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-10">
                                                <textarea class="note form-control" placeholder="Note (optional)" name="note" id="note"><?php  echo  $pm['note']; ?></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <?php   endforeach;
                                        }
                                    ?>
                        </div>
                        <a class="btn btn-sm btn-primary ml-3 d-none d-md-inline-block btn-right add_field_button" style="color:white;padding-top: 0px;padding-bottom: 0px;border-color: white; cursor:pointer;"> + legg til</a>

                    </div>
                </div>
            </div>
        </div>
    </main>
<script type="text/javascript">
$(document).ready(function() {
            var add_button      = $(".add_field_button");
            hyTy = '<div class=" row col-sm-12"><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label>HB Dato innbetalt til AGS</label><div class="input-group date"> <input type="text" class="form-control" name="dato" id="dato" value=""> <span class="input-group-text input-group-append input-group-addon"> <i class="simple-icon-calendar"></i> </span></div></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Beløp mottatt fra Federation (100%)</label> <input type="number" class="form-control" id="paid" required value=""></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Provisjon til AGS i%</label> <input type="number" class="form-control" id="comission" required value=""></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Beløp betalt til AGS</label> <input type="number" class="form-control" id="recieved" required value=""></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-2"> <label for="password">Beløp betalt til forsikringsselskapet</label> <input type="number" class="form-control" id="total_insurances" required value=""></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-1 to_end"> <button type="button" class="btn btn-sm btn-outline-primary fjren" data-premium-id="">Lagre</button></div><div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-10"><textarea class="note form-control" placeholder="Note (optional)" name="note" id="note"></textarea></div></div><hr>';
            $(add_button).click(function(e){
                e.preventDefault();
                     $(this).parent().parent().find('.rap_clone').append(hyTy);
                     $(".input-group.date").datepicker({
                        autoclose: true,
                        format: 'd-m-yyyy',
                        templates: {
                        leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        rightArrow: '<i class="simple-icon-arrow-right"></i>',
                        }
                    });
                    keyup();
                    
            });
        });
        
   
    
    function keyup()
    {
        $('#paid,#comission').keyup(function(){
            var f_id='<?php echo $federation_id ?>';
           // if(f_id!=5 && f_id!=6 ){
                var recieved="0";
                var total_insurances="0";
                var paid=$(this).parent().parent().find('#paid').val();
                var comission=$(this).parent().parent().find('#comission').val();
                if(!paid)
                   paid="0";
                if(!comission)
                   comission="0";
                if(paid>"0" && comission>"0")
                {
                    recieved=Math.round(paid/100*comission);
                    total_insurances= Math.round(paid-recieved);
                }
                recieved.toString().toLocaleString();
                total_insurances.toString().toLocaleString();
                $(this).parent().parent().find('#recieved').val(recieved);
                $(this).parent().parent().find('#total_insurances').val(total_insurances);
            
           // }
        }); 
    }
    keyup();
    $(document).off('click', '.fjren').on('click', '.fjren', function(e){
        var parent=$(this).parent().parent().parent().parent();
        var period_id = parent.attr('data-id');
        var federation_id = parent.attr('data_f_id');
        var premium_id = $(this).attr('data-premium-id');
        var dato=$(this).closest('.row').find('#dato').val();
        var paid=$(this).closest('.row').find('#paid').val();
        var recieved=$(this).closest('.row').find('#recieved').val();
        var comission=$(this).closest('.row').find('#comission').val();
        var note = $(this).closest('.row').find('#note').val();
        var total_insurances=$(this).closest('.row').find('#total_insurances').val();
        e.preventDefault();
        if(dato!=""){
            if(paid!=""){
                if(recieved!=""){
                    if(comission!=""){
                        if(total_insurances!=""){
                            $.ajax({
                                type: 'POST',
                                url: "<?= ADMIN_BASE_URL?>premiums/save_premium",
                                data: {'period_id': period_id,'federation_id':federation_id,'premium_id':premium_id,'dato':dato
                                    ,'paid':paid,'recieved':recieved,'comission':comission,'total_insurances':total_insurances,'note':note},
                                async: false,
                                success: function(result) {
                                    if(result=="1"){
                                        Swal.fire({
                                            position: 'bottom-end',
                                            icon: 'success',
                                            title: 'Forsikringspremie er reddet',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        location.reload();
                                    }
                                }
                            });
                        }else
                            toastr.error('Vennligst skriv inn Ant. solgte forsikringer');
                    }else
                    toastr.error('Vennligst skriv inn Kommisjon');
                }else
                toastr.error('Vennligst skriv inn Mottatt fra forbund');
            }else
            toastr.error('Vennligst skriv inn Betalt til fors.giver');
        }else
        toastr.error('Vennligst skriv inn dato');

        


        
    });
    
    
       $(document).on("click", ".del_premium", function(event){
        event.preventDefault();
        var id=$(this).attr('data-premium-id');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>premiums/delete_premium",
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
</script>

