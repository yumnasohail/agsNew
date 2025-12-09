<style>
  table tbody tr td{
    width:50%;
  }
  .container1
  {
      width:50%;
      margin: 0 auto;
  }
::-webkit-scrollbar-thumb {
width: 12px!important;
}
#loader_report{
  position: absolute;
  top: 0;
  bottom: 0%;
  left: 30%;
  right: 0%;
  z-index: 99999;
  opacity:0.7;
  background:  url('https://i.pinimg.com/originals/65/ba/48/65ba488626025cff82f091336fbf94bb.gif')  no-repeat;
}
</style>
<main>
    <div id="loader_report" style="display:none;"></div>
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1 class="color-theme-1">Rapporter</h1>

              <div class="separator mb-5"></div>
          </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12 col-lg-12 col-12 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="mb-4">
                
                </h5>
                
                  <div class="form-body section-box">
                    <div class="row container1">
                        <form id="report-form">
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                             <label for="lastName">Skjema</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="federation" name="federation" >
                                    <option value="">Alle</option>
                                    <?php foreach($fed as $key => $val):?>
                                    <option value="<?php echo $val['id']; ?>" <?php if($val['id']==3) echo "selected"; ?>><?php echo $val['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12 append_policy">
                             
                        </div>
                        
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                             <label for="lastName">Forsikringsgiver</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="insurer" name="insurer" >
                                    <option value="">Alle</option>
                                    <?php foreach($insurers as $key => $value):?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                            <label for="lastName">Fra</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" name="start_date" value="<?php echo date('d-m-Y', strtotime('-1 years'));?>">
                                <span class="input-group-text input-group-append input-group-addon">
                                    <i class="simple-icon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                            <label for="lastName">til</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" name="end_date" value="<?php echo date('d-m-Y');?>">
                                <span class="input-group-text input-group-append input-group-addon">
                                    <i class="simple-icon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                            <label for="password">Skjemastatus</label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="godkjent" checked>
                                <label class="custom-control-label" for="customCheck2">Godkjent</label>
                            </div>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="avslatt" checked>
                                <label class="custom-control-label" for="customCheck3">Avslått</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4" name="update" checked>
                                <label class="custom-control-label" for="customCheck4">Midlertidig avslag, åpen for brukerredigering</label>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                            <label for="password">Sakstatus</label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="customCheck5" name="apen" checked>
                                <label class="custom-control-label" for="customCheck5">Åpen</label>
                            </div>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="customCheck6" name="avsluttet" checked>
                                <label class="custom-control-label" for="customCheck6">Avsluttet</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck7" name="avvist" checked>
                                <label class="custom-control-label" for="customCheck7">Avvist</label>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12">
                            <label for="password">Sportscover-status</label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="customCheck5" name="nottransferred" checked>
                                <label class="custom-control-label" for="customCheck5">Ikke overført</label>
                            </div>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="customCheck6" name="transferred" checked>
                                <label class="custom-control-label" for="customCheck6">Overført</label>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                             <label for="lastName">Rapportere</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="report" name="report" >
                                    <option value="1">Report #1 (Rapporten viser utvalgt informsjon om skadesaker - én sak per rad.)</option>
                                    <option value="2">Report #2 (Rapporten viser hva som var status på ulike tidspunkt)</option>
                                    <option value="3">Report #3 (Rapporten viser utbetalt/reservert beløp gruppert på idrett og standard/utvidet dekning)</option>
                                    <option value="4">Report #4 (Rapporten viser porteføljen med oversikt over poliseårganger og tilhørende nøkkeltall)</option>
                                    <option value="5">Report #5 (Report according to specification from Lloyds Insurance Company SA (LIC))</option>
                                    <option value="6">Report #6 (Liste med innmeldte skader, basert på dato valgt i "Innmeldt i periode" ovenfor.)</option>
                                    <option value="7">Report #7 (Monthly Paid Bdx)</option>
                                    <option value="8">Report #8 (Monthly Written Bdx)</option>
                                    <option value="9">Report #9 (Estimated PC to Client)</option>
                                    <option value="10">Report #10 (Premium Payments Specifications)</option>
                                    <option value="11">Report #11 (RIB to Client)</option>
                                    <option value="12">Report #12 Premiums and Commission - UMR</option>
                                    <option value="13">Report #13 (Estimated PC to Client)</option>                                    
                                    <option value="14">Report #14 (RIB to Client)</option>
                                    <option value="15">Report #15 (AGS Commission and Premium Report)</option>
                                    <option value="16">Report #16 (Paid Bdx - Based on Underwriting year)</option>


                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 rpt_4" style="display:none;">
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input " id="customCheck16" name="with_claim_fee" checked>
                                <label class="custom-control-label" for="customCheck16">med skadegebyr (vises ikke til selskapet)</label>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 Velg" style="display:none;">
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input " id="custCheck26" name="selective_col">
                                <label class="custom-control-label" for="custCheck26">Velg rapportkolonner</label>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12 col_div" style="display:none;">
                           <div class="row columns_list"  style="background-color: #f6f6f6;padding:15px 0 15px 0;">
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12 rpt_7" style="display:none;">
                             <label for="lastName">Reporting Month</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="month" name="month" >
                                    <?php
                                         for($m=01; $m<=12; $m++){
                                           echo '<option value="'.sprintf("%02d", $m).'">'.date('F', mktime(0, 0, 0, $m)).'</option>';
                                         }
                                       ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12 rpt_7 rpt_10 rpt_12" style="display:none;">
                             <label for="lastName"> Reporting Year</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="year" name="year" >
                                    <?php
                                         for($m=date('Y'); $m>=2016; $m--){
                                           echo '<option value="'.date($m, strtotime('-1 years')).'">'.date($m, strtotime('-1 years')).'</option>';
                                         }
                                       ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-100 col-sm-12 col-xs-12 col-md-12  rpt_15" style="display:none;">
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input " id="custCheck29" name="check_by_year">
                                <label class="custom-control-label" for="custCheck29">Sjekk etter år</label>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12 check_by_year" style="display:none;">
                             <label for="lastName"> Reporting Year Start</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="start_year" name="start_year" >
                                    <?php
                                         for($m=date('Y'); $m>=2016; $m--){
                                           echo '<option value="'.date($m, strtotime('-1 years')).'">'.date($m, strtotime('-1 years')).'</option>';
                                         }
                                       ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12 check_by_year" style="display:none;">
                             <label for="lastName"> Reporting Year End</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="end_year" name="end_year" >
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-offset-12 col-md-12" style="padding-bottom:15px;">
                            <button  class="btn btn-outline-primary gt_rpt"  style="width: 100%;">
                            <i class="fa fa-check"></i>&nbsp;Generer rapport
                            </button>
                        </div>
                        </form>
                    </div>
                <div class="tbl_report" style="overflow-x: auto;">
                    
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<script>
  $('#report').on('change', function(event) {
    event.preventDefault();
    var number=$(this).val();
    $('.rpt_4').css('display', 'none');
    if(number=="7" || number=="8" || number=="13" || number=="14")
        $('.rpt_7').css('display', 'block');
    else if(number=="10"){
        $('.rpt_7').css('display', 'block');
        $('.rpt_10').css('display', 'block');
    }else if(number=="12")
    {
        $('.rpt_7').css('display', 'none');
        $('.rpt_12').css('display', 'block');
    }
    else
        $('.rpt_7').css('display', 'none');
    if(number=="4")
        $('.rpt_4').css('display', 'block');
    if(number=="2"){
        $('.Velg').css('display', 'block');
    }else{
        $('.Velg').css('display', 'none');
    }
    if(number=="15"){
        $('.rpt_15').css('display', 'block');
        var check=$('#custCheck29').is(":checked");
        if(check==true){
            $('.check_by_year').css('display', 'block');
        }else{
            $('.check_by_year').css('display', 'none');
        }
    }else{
        $('.rpt_15').css('display', 'none');
        $('.check_by_year').css('display', 'none');
        $('.check_by_year').css('display', 'none');
    }
    if(number=="16"){
        $('.rpt_10').css('display', 'block');
    }else{
        $('.rpt_10').css('display', 'none');
    }
    });
    
    
    
    
$(document).ready(function() {   
    $('#custCheck26').on('click', function(event) {
        var check=$(this).is(":checked");
        if(check==true){
            $('.col_div').css('display', 'block');
            var report = $('#report').val();
            $.ajax({
                type: 'post',
                url: "<?php echo ADMIN_BASE_URL?>reports/selective_columns",
                data: {'report':report},
                async: true,
                success: function(test_body) {
                    $('.columns_list').html(test_body);
                }
            });
        }else{
            $('.col_div').css('display', 'none');
        }
    });
    $('#custCheck29').on('click', function(event) {
        var check=$(this).is(":checked");
        if(check==true){
            $('.check_by_year').css('display', 'block');
        }else{
            $('.check_by_year').css('display', 'none');
        }
    });

    function populateEndYears() {
        var startYear = parseInt($('#start_year').val());
        var currentYear = new Date().getFullYear();

        var options;

        if (!isNaN(startYear)) {
            for (var y = startYear; y <= currentYear; y++) {
                options += '<option value="' + y + '">' + y + '</option>';
            }
        }

        $('#end_year').html(options);
    }

    $('#start_year').on('change', populateEndYears);

    $('#custCheck29').on('click', populateEndYears);
});


    
    $('.gt_rpt').on('click', function(event) {
            event.preventDefault();
            $("#loader_report").attr("style", "display:block");
            var valid=true;
            var report=$('#report').val();
            var insurer=$('#insurer').val();
            if(report=="15"){
                var check=$('#custCheck29').is(":checked");
                if(check==true){
                    var startYear=$('#start_year').val();
                    var endYear=$('#end_year').val();
                    if(startYear==null || endYear==null){
                        valid=false;
                        toastr.info('Please Select start and end year');
                        $("#loader_report").attr("style", "display:none");
                    }
                }
            }
            if(  (report=="9" && insurer==""))
            {
                valid=false;
                toastr.info('Please Select a insurer first');
                  $("#loader_report").attr("style", "display:none");
            }
            if(valid){
                $.ajax({
                    type: 'post',
                    url: "<?php echo ADMIN_BASE_URL?>reports/report_result",
                    data: {data:$('#report-form').serialize()},
                    async: true,
                    success: function(test_body) {
                        $('.tbl_report').html(test_body);
                         datatable();
                         $("#loader_report").attr("style", "display:none");
                    }
                });
            }
            
        });
        
        
    $('#federation').on('change', function(event) {
            event.preventDefault();
            policy();
        });
        $(document).ready(function(){
            policy();
        });
        function policy()
        {
            var id = $('#federation').val();
          $.ajax({
                type: 'post',
                url: "<?php echo ADMIN_BASE_URL?>reports/fed_policy",
                data: {'id': id},
                async: true,
                success: function(test_body) {
                    $('.append_policy').html(test_body);
                }
            });
        }
        
        //  $('#report').on('change', function(event) {
        //     event.preventDefault();
            
        // });
</script>

<script>
    function export_to_CSV(filename) {
            var dt = new Date();
            var day = dt.getDate();
            var month = dt.getMonth() + 1;
            var year = dt.getFullYear();
            var postfix = year + "." + month + "." + day;
            var a = document.createElement('a');
            var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
            var table_html = $('#tblReportData')[0].outerHTML;
            table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
            var css_html = '<style>td {border: 0.5pt solid #c0c0c0} .tRight { text-align:right} .tLeft { text-align:left} </style>';
            a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</' + 'head><body>' + table_html + '</body></html>');
            a.download = 'AGS_Report_' + postfix + '.xls';
            a.click();
    }

    function exportSheet() {
    var dt = new Date();
    var day = dt.getDate();
    var month = dt.getMonth() + 1;
    var year = dt.getFullYear();
    var postfix = year + "." + month + "." + day;

    // Get data from the first table
    var table1 = document.getElementById('tblReportData');
    var table1Data = XLSX.utils.table_to_sheet(table1);

    // Apply styles to the first sheet
    applyBasicStyles(table1Data);

    // Get data from the second table
    var table2 = document.getElementById('tblAdditionalData');
    var table2Data = XLSX.utils.table_to_sheet(table2);

    // Apply styles to the second sheet
    applyBasicStyles(table2Data);

    // Create a new workbook and add both sheets
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, table1Data, "Per Client");
    XLSX.utils.book_append_sheet(wb, table2Data, "Per Binder Year");

    // Export the workbook to a file
    XLSX.writeFile(wb, `AGS_Report_${postfix}.xlsx`);
}

function applyBasicStyles(sheet) {
    const range = XLSX.utils.decode_range(sheet['!ref']);
    for (let R = range.s.r; R <= range.e.r; ++R) {
        for (let C = range.s.c; C <= range.e.c; ++C) {
            const cell_address = { c: C, r: R };
            const cell_ref = XLSX.utils.encode_cell(cell_address);
            if (!sheet[cell_ref]) continue;

            // Example of adding styles
            if (R === 0) { // Header row
                sheet[cell_ref].s = {
                    font: {
                        name: 'Arial',
                        sz: 14,
                        bold: true,
                        color: { rgb: "FFFFFF" }
                    },
                    fill: {
                        fgColor: { rgb: "0000FF" } // Header background color
                    }
                };
            } else {
                sheet[cell_ref].s = {
                    font: {
                        name: 'Arial',
                        sz: 12,
                        color: { rgb: "000000" }
                    }
                };
            }
        }
    }
}






function datatable()
{
	$(".data-table-feature").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        drawCallback: function () {
          $($(".dataTables_wrapper .pagination li:first-of-type"))
            .find("a")
            .addClass("prev");
          $($(".dataTables_wrapper .pagination li:last-of-type"))
            .find("a")
            .addClass("next");

          $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
          paginate: {
            previous: "<i class='simple-icon-arrow-left'></i>",
            next: "<i class='simple-icon-arrow-right'></i>"
          },
          search: "_INPUT_",
          searchPlaceholder: "Search...",
          lengthMenu: "Items Per Page _MENU_"
        },
      });
}
</script>