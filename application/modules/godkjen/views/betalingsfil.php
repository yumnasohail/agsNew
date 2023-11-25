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
  table p {
    margin-top: .5rem!important;
    margin-bottom: .5rem!important;
}
</style>
 <main>
    <div class="container-fluid">
        <div class="row">
        </div>

        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <p>Fra denne siden kan du generere betalingsfil med alle godkjente utbetalinger som ligger i køen. Dersom en betaling ikke skal overføres likevel, må denne slettes i saksbehandlingsfanen til den aktuelle skadesak, før betalingsfil genereres.<br>
                                Etter at filen er generert, kan den lastes inn i nettbanken. Når den er lastet inn i nettbanken kan du trykke på e-post-ikonet for å informere skadelidte om at pengene overføres.</p>
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
                                                            <td colspan="2" style="padding-top:6px; border-top:1px solid #f1f0f0">
                                                                <table style="width: 100%; margin-top:8px;">
                                                                    <thead class="bg-theme-1">
                                                                        <tr>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Lagt til
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Godkjent
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Skjema
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Forsikringsgiver
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Skadesak
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Betalingsmottager
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Beløp
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                Kontonr
                                                                            </th>
                                                                            <th
                                                                                style="font-size: 10px; color:white;padding: 8px;">
                                                                                <i class="iconsminds-save"></i>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php 
                                                                    if(!empty($trans))
                                                                    foreach($trans as $key => $val):
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <p
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;">
                                                                                    <?php echo $val['dato']." ".$val['time']; ?>
                                                                                    </p>
                                                                            </td>
                                                                            <td>
                                                                                <p 
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;">
                                                                                   <?php echo $val['approve_datetime'];?>
                                                                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p 
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;">
                                                                                   <?php echo $val['federation_title'];?>
                                                                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p 
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;">
                                                                                   <?php echo $val['insurer_title'];?>
                                                                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p 
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;">
                                                                                   <?php echo $val['claim_id'];?>
                                                                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p
                                                                                    style="font-size: 13px; text-decoration: none; line-height: 1;">
                                                                                    <?php echo $val['a_name']." ".$val['a_surname']; ?>
                                                                                    </p>
                                                                            </td>
                                                                            <td>
                                                                                <p
                                                                                    style="font-size: 13px; line-height: 1; vertical-align:top; white-space:nowrap;">
                                                                                    <?php echo $val['belop_sum']; ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p
                                                                                    style="font-size: 13px; line-height: 1;vertical-align:top; white-space:nowrap;">
                                                                                    <?php echo $val['bank_account_no']; ?></p>
                                                                            </td>
                                                                            
                                                                            <td>
                                                                                <i style="color:green" class="simple-icon-check"></i>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                        <tr style="border-top:1px solid #f1f0f0;">
                                                                            <td colspan="6">
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if(!empty($trans)) echo $total['belop_sum']; ?>
                                                                            </td>
                                                                            <td colspan="2">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                         <div class="col-12" style="text-align:center;margin-top: 3%;">
                                        <p>
                                            Totalt <?php echo $pay_count; ?> betalinger fordelt på <?php echo $claim_count; ?> krav, <?php echo $fed_count; ?> skjemaer og <?php echo $insurer_count; ?> forsikringsselskaper som venter på overføring<br>
                                            Fordeling per forsikringsselskap<br>
                                            <?php 
                                            foreach($insurer as $key => $val):
                                            ?>
                                            <p><?php echo $val['insurer_title']." = ".$val['belop_sum'];?></p>
                                            <?php endforeach; ?></p>
                                        </div>
                                        <?php if(!empty($trans)) { ?>
                                        <div class="col-12" style="text-align:center;margin-top: 3%;">
                                            <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block generate_file" style="width:20%;" >&nbsp;&nbsp;&nbsp; Generer betalingsfil</a>
                                        </div>
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>

    
$(document).off('click', '.generate_file').on('click', '.generate_file', function(e){
    e.preventDefault();
      swal({
        title : "Er du sikker på at du vil overføre betaling?",
        type : "info",
        showCancelButton : true,
        confirmButtonColor : "#81ccee",
        confirmButtonText : "Ja, godkjenn",
        closeOnConfirm : false
      },
        function () {
           $.ajax({
    			type: 'POST',
    			url: "<?= ADMIN_BASE_URL ?>godkjen/generate_payment_file",
    			data: {},
    			async: false,
    			success: function(result) {
    			    var text =$(result).find("text").text();
    			     var id =$(result).find("id").text();
		            download("AGS_Danske_Bank_"+id,text);
    			}
    		});
    		swal("Fullført!", "Overføringsfil generert mot disse transaksjonene", "success");
    		location.reload();
      });

    })
    
      
    function download(filename, text) {
      var element = document.createElement('a');
      element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
      element.setAttribute('download', filename);
    
      element.style.display = 'none';
      document.body.appendChild(element);
    
      element.click();
    
      document.body.removeChild(element);
    }
    </script>