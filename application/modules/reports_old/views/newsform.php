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
</style>
<main>
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
                                    <?php foreach($fed as $key => $val):?>
                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
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
                                <select class="custom-select" id="inputGroupSelect02" name="insurer" >
                                    <option value="">Select</option>
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
                                <input type="text" class="form-control" name="start_date">
                                <span class="input-group-text input-group-append input-group-addon">
                                    <i class="simple-icon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group position-relative error-l-75 col-sm-12 col-xs-12 col-md-12">
                            <label for="lastName">til</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" name="end_date">
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
                                <select class="custom-select" id="inputGroupSelect02" name="report" >
                                    <option value="1">Report #1 (Rapporten viser utvalgt informsjon om skadesaker - én sak per rad.)</option>
                                    <option value="2">Report #2 (Rapporten viser hva som var status på ulike tidspunkt)</option>
                                    <option value="3">Report #3 (Rapporten viser utbetalt/reservert beløp gruppert på idrett og standard/utvidet dekning)</option>
                                    <option value="4">Report #4 (Rapporten viser porteføljen med oversikt over poliseårganger og tilhørende nøkkeltall)</option>
                                    <option value="5">Report #5 (Report according to specification from Lloyds Insurance Company SA (LIC))</option>
                                    <option value="6">Report #6 (Liste med innmeldte skader, basert på dato valgt i "Innmeldt i periode" ovenfor.)</option>
                                    <option value="7">Report #7 (Betalt Premium Bordereaux)</option>
                                    <option value="8">Report #8 (Skriftlig risiko Bordereaux)</option>
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
<script>

    $('.gt_rpt').on('click', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "<?php echo ADMIN_BASE_URL?>reports/report_result",
                data: {data:$('#report-form').serialize()},
                async: false,
                success: function(test_body) {
                    $('.tbl_report').html(test_body);
                }
            });
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
                async: false,
                success: function(test_body) {
                    $('.append_policy').html(test_body);
                }
            });
        }
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
            a.download = 'exported_table_' + postfix + '.xls';
            a.click();
    }


</script>