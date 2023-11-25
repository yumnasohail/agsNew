<style type="text/css">
	.tr{
		background-color: purple;
	}

	

  .table1 td{
    border: none !important;

  }
  .table1 th{
    border: none !important;
        background-color: #e7e4e4 !important;
        color: black !important;

  }
  .table1{
    background-color: #e7e4e4;
    margin-bottom: 0px !important;
  }
  table thead{
    background-color: #e7e4e4;
    color: black;
  }
  /*table td{
    width: 30% !important;
  }*/
</style>
 <main>
    <div class="container-fluid">
        <div class="row">
             <?php
                if(isset($trans) && !empty($trans)){?>
            <div class="col-12" style="text-align:center;">
                <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block approve_btn" style="width:20%;" >&nbsp;&nbsp;&nbsp; Godkjenne alle</a>
            </div>
            <?php } ?>
        </div>

        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <?php
                                
                                if(isset($trans) && !empty($trans)){
                                foreach($trans as $key => $value): ?>
                                    <div class="row invoice" style="margin-bottom: 2%;">
                                        <div class="col-12">
                                            <div class="invoice-contents" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0"
                                                offset="0"
                                                style=" width:90%; margin: 0 auto; box-shadow: 0 1px 15px rgba(0,0,0,.04), 0 1px 6px rgba(0,0,0,.04); font-family: Helvetica,Arial,sans-serif !important; position: relative;">
                                                <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
                                                    style="width:100%;  border-collapse:separate !important; border-spacing:0;color:#242128; margin:0;padding:30px;"
                                                    heigth="auto">

                                                    <tbody>
                                                        <tr>
                                                            <td  valign="center"
                                                                style="padding-bottom:15px;  border-top:0;width:100% !important;">
                                                                <p class="text-theme-1"
                                                                    style=" font-weight: 700; line-height: 1.2; font-size: 20px; white-space: nowrap; ">
                                                                    Sak : <?php echo $value['claim_id']; ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="padding-top:6px; border-top:1px solid #f1f0f0">
                                                                <table style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                style="vertical-align:middle; border-radius: 3px; padding:30px; background-color: #f9f9f9; border-right: 5px solid white;">
                                                                                <p
                                                                                    style="color:#8f8f8f; font-size: 14px;  line-height: 1.6; margin:0; padding:0;">
                                                                                    Skjema:     <?php echo $value['federation_title']; ?><br>
                                                                                    Type:       <?php echo "lisensforsikring" ?><br>
                                                                                    Giver:      <?php echo $value['insurer_title']; ?><br>
                                                                                    Dekning:    <?php echo $value['insurance_under']; ?><br>
                                                                                    Navn:       <?php echo $value['a_name']." ".$value['a_surname']; ?><br>
                                                                                    Skadedato:  <?php echo date("Y-m-d",strtotime($value['damage_date']))." ".$value['damage_time']; ?><br>
                                                                                </p>
                                                                            </td>

                                                                            <td
                                                                                style=" padding-top:0px; padding-bottom:0; vertical-align:middle; padding:30px; background-color: #f9f9f9; border-radius: 3px; border-left: 5px solid white;">
                                                                                <p  style="color:#8f8f8f; font-size: 14px; padding: 0; line-height: 1.6; margin:0; ">
                                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0",'trans_status'=>"transferred"), "id desc"," transaction","SUM(belop) as belop",1,1)->row_array(); ?>    
                                                                                    Overforte Utbetalinger:      <?php echo $res['belop']; ?><br>
                                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0",'trans_status'=>"approved"), "id desc"," transaction","SUM(belop) as belop",1,1)->row_array(); ?>    
                                                                                    Godkjente Utbetalinger:      <?php echo $value['belop']; ?><br>
                                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0",'trans_status'=>"pending"), "id desc"," transaction","SUM(belop) as belop",1,1)->row_array(); ?>    
                                                                                    Avventer godkejenning:       <?php echo $value['belop']; ?><br>
                                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0",'trans_status'=>"hold"), "id desc"," transaction","SUM(belop) as belop",1,1)->row_array(); ?>    
                                                                                    pa hold:                     <?php echo $value['belop']; ?><br>
                                                                                    Gir Utbetalinger totalt:     <?php echo $value['belop_sum']; ?><br>
                                                                                </p>
                                                                            </td>
                                                                            <td
                                                                                style=" padding-top:0px; padding-bottom:0; vertical-align:middle; padding:30px; background-color: #f9f9f9; border-radius: 3px; border-left: 5px solid white;">
                                                                                <p  style="color:#8f8f8f; font-size: 14px; padding: 0; line-height: 1.6; margin:0; ">
                                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0"), "id desc"," transaction","SUM(belop) as belop",1,1)->row_array(); ?>
                                                                                    Utbetalinger totalt:         <?php echo $res['belop']; ?><br>
                                                                                    <?php $reserve=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id']), "id desc","claim_reservations","SUM(amount) as amount",1,1)->row_array(); ?>
                                                                                    Gjenstaende reserv:          <?php echo $reserve['amount'];?><br>
                                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0"), "id desc"," transaction","SUM(belop) as belop",1,1)->row_array(); ?>
                                                                                    Gir Prognose totalt utbetaling:      <?php echo $res['belop']+$reserve['amount']; ?><br>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table style="width: 100%; margin-top:8px;">
                                                                    <thead class="bg-theme-1">
                                                                        <tr>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Dato
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Bruker
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Belop
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Betalingsmottager
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Sanksjonskontroll
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Status
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Alternativer
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php $res=Modules::run('api/_get_specific_table_with_pagination',array('claim_id'=>$value['claim_id'],"trans"=>"0"), "id desc"," transaction","*",1,10000)->result_array(); 
                                                                    foreach($res as $key => $val):
                                                                    ?>
                                                                        <tr>
                                                                            <td style="padding-top:0px; padding-bottom:5px;">
                                                                                <h4
                                                                                    style="font-size: 16px; line-height: 1; margin-bottom:0;  font-weight:500; margin-top: 10px;">
                                                                                    <?php echo date("Y-m-d",strtotime($val['dato']))." ".$val['time']; ?>
                                                                                    </h4>
                                                                            </td>
                                                                            <td>
                                                                                <p href="#"
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;  margin-top:0px; margin-bottom:0;">
                                                                                    <?php $user=Modules::run('api/_get_specific_table_with_pagination',array("id"=>$val['user']), "id desc","users","first_name",1,0)->row_array();  ?>
                                                                                        <?php echo $user['first_name']; ?>
                                                                                                                                </p>
                                                                            </td>
                                                                            <td style="padding-top:0px; padding-bottom:0;">
                                                                                <p
                                                                                    style="font-size: 13px; line-height: 1;  margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                                                    <?php echo $val['belop']; ?></p>
                                                                            </td>
                                                                            <td style="padding-top:0px; padding-bottom:5px;">
                                                                                <p
                                                                                    style="font-size: 16px; line-height: 1; margin-bottom:0;  font-weight:500; margin-top: 10px;">
                                                                                    <?php echo $val['a_name']; ?>
                                                                                    </p>
                                                                            </td>
                                                                            <td style="padding-top:0px; padding-bottom:5px;">
                                                                                <p
                                                                                    style="font-size: 16px; line-height: 1; margin-bottom:0;  font-weight:500; margin-top: 10px;">
                                                                                    <?php echo $val['sanction_result']; ?>
                                                                                    </p>
                                                                            </td>
                                                                            <td>
                                                                                <p href="#"
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;  margin-top:0px; margin-bottom:0;">
                                                                                    <?php  if($val['trans_status']=="pending") echo "Venter på godkjenning"; else if($val['trans_status']=="approved") echo "godkjent"; else if($val['trans_status']=="transferred") echo "overført"; else if($val['trans_status']=="declined") echo "Avvist"; ?>
                                                                                    </p>
                                                                            </td>
                                                                            <td style="padding-top:0px; padding-bottom:0;">
                                                                                <?php if($val['trans_status']=="pending"){ ?>
                                                                                <p
                                                                                    style="font-size: 13px; line-height: 1;  margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                                                    <i class="simple-icon-info check_detail"   rel="<?php echo $val['id']; ?>" style="font-size: 16px;padding: 3px;color: #159eff;"></i>
                                                                                    <i class="simple-icon-check change_stat" status="approved" rel="<?php echo $val['id']; ?>" style="font-size: 16px;padding: 3px;color: #1db336;"></i>
                                                                                    <i class="simple-icon-close change_stat" status="declined" rel="<?php echo $val['id']; ?>" style="font-size: 16px;padding: 3px;color: #e42a2a;"></i>
                                                                                    <i class="simple-icon-pin change_stat" status="hold" rel="<?php echo $val['id']; ?>" style="font-size: 16px;padding: 3px;color: #c3510e;"></i>
                                                                                </p>
                                                                                <?php }elseif($val['trans_status']=="transferred"){ ?>
                                                                                    <p
                                                                                        style="font-size: 13px; line-height: 1; margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;">
                                                                                        <i class="simple-icon-info" style="font-size: 16px;color: #159eff;"></i>
                                                                                    </p>
                                                                                    <?php }else {?>
                                                                                        <p style="font-size: 13px; line-height: 1;margin-bottom:0; margin-top:0; vertical-align:top; white-space:nowrap;"></p>
                                                                                    <?php }?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; 
                                }else { ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12">
                                                    <p>Ingen transaksjoner for godkjenning</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


    $(document).on("click", ".change_stat", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
        var stat = $(this).attr('status');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>godkjen/transaction_status",
			data: {'id': id,'stat':stat},
			async: false,
			success: function(test_body) {
                location.reload();
			}
		});
    });
    
    
    $(document).off('click', '.approve_btn').on('click', '.approve_btn', function(e){
    e.preventDefault();
      swal({
        title : "Er du sikker på at du vil godkjenne alle betalinger?",
        text : "Alle betalinger blir godkjent",
        type : "info",
        showCancelButton : true,
        confirmButtonColor : "#81ccee",
        confirmButtonText : "Ja, godkjenn",
        closeOnConfirm : false
      },
        function () {
        swal("Godkjent!", "Betalinger er godkjent.", "success");
        window.location.href = '<?php echo ADMIN_BASE_URL . 'godkjen/approve'; ?>';
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
