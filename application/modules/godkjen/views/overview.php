<main>
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                <h1 class="color-theme-1">Oversikt</h1>
                <div class="separator mb-5"></div>
                </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                            <table class=" table-bordered border-theme1 table ">
                                <thead class="border-theme1 background-theme1">
                                    <tr>
                                        <th>ID</th>
                                        <th>Generert</th>
                                        <th>Periode</th>
                                        <th>Skjema</th>
                                        <th>Forsikringsgiver</th>
                                        <th>Saker</th>
                                        <th>Utbet.</th>
                                        <th>Total sum</th>
                                        <th>Sendt e-post?</th>
                                        <th>Alt.</th>
                                    </tr>
                                </thead>
                                <?php 
                                    foreach($payments as $key => $value): ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-muted"><?php echo $value['id']; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo "(".date("Y-m-d H:i:s", strtotime($value['datetime'])); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo "(".date("Y-m-d", strtotime($value['period_from']))." - ".date("Y-m-d", strtotime($value['period_to'])).")"; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['form_count']." skjemaer" ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['insurer_count']." forsikringsgiver" ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['claim_count'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['payment_count'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php echo $value['belop'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"><?php if($value['mail_sent']=="1") echo "Ja, ".$value['payment_count']." stk."; ?></p>
                                        </td>
                                        <td>
                                       <?php if($value['mail_sent']=="0"){ ?><i style="font-size:24px; cursor:pointer;" rel="<?php echo $value['id']; ?>" class="iconsminds-envelope send_email"></i> <?php } ?>
                                       <i style="font-size:22px; cursor:pointer;" rel="<?php echo $value['id']; ?>" class="iconsminds-save save_file"></i>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
$(document).on("click", ".send_email", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>godkjen/send_email",
			data: {'id': id},
			async: false,
			success: function(result) {
                var text =$(result).find("text").text();
                Swal.fire({
                            position:'bottom-end',
                            icon: 'success',
                            title: text,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.reload();
			}
		});
    });

    $(document).on("click", ".save_file", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?= ADMIN_BASE_URL ?>godkjen/downloadfile",
			data: {'id': id},
			async: false,
			success: function(result) {
			    var text =$(result).find("text").text();
			    download("AGS_Danske_Bank_"+id,text);
			}
		});
    });
    
    
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