<style type="text/css">
	.tr{
		background-color: purple;
	}
table
{
    width: 100%;
}
th
{
    width: 35%;
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
            <h1>Logs</h1>
        </div>

        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                               <table class="data-table data-table-feature table table-bordered border-theme1" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th>Sak #</th>
                                        <th>Saksøker</th>
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
                                            <?php echo $value['claim_no']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="">
                                            <?php echo $value['a_name']." ".$value['a_surname']; ?>
                                            </p>
                                        </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>

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
    </script>
