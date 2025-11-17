<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<?php 
  $user_data = $this->session->userdata('route_user_data');
  if (isset($user_data['user_id']) && !empty($user_data['user_id']))
		$user_id = $user_data['user_id'];?> 
<main>
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <h1>Dashboard</h1>
                    <div class="separator mb-5"></div>


                </div>
               
                <div class="col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-reset mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><?php echo $approved; ?> Krav</p>
                                    <p class="text-small text-white">Godkjent</p>
                                </div>
                            </div>
                            <div>
                                <div role="progressbar"
                                    class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                                    data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?php echo $approved; ?>" aria-valuemax="<?php echo $tot; ?>"
                                    data-show-percent="false">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <a href="#" class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-timer mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><?php echo $pending+$pendings; ?> Krav</p>
                                    <p class="text-small text-white">Ikke behandlet og Avsl책tt, Avventer</p>
                                </div>
                            </div>
                            <div>
                                <div role="progressbar"
                                    class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                                    data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?php echo $pending+$pendings; ?>" aria-valuemax="<?php echo $tot; ?>"
                                    data-show-percent="false">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-yes mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><?php echo $finished; ?> Krav</p>
                                    <p class="text-small text-white">Avsluttet</p>
                                </div>
                            </div>

                            <div>
                                <div role="progressbar"
                                    class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                                    data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?php echo $finished; ?>" aria-valuemax="<?php echo $tot; ?>"
                                    data-show-percent="false">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <a href="#" class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="simple-icon-close mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><?php echo $rejected; ?> Krav</p>
                                    <p class="text-small text-white">Avvist</p>
                                </div>
                            </div>
                            <div>
                                <div role="progressbar"
                                    class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                                    data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?php echo $rejected; ?>" aria-valuemax="<?php echo $tot; ?>"
                                    data-show-percent="false">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php 
                
                if( $user_id=="1" || $user_id=="14"){
                ?>
                <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="col-xl-12 col-lg-12 col-md-12 mb-4" style="display: inline-flex;">
                        <div class="col-xl-4 col-lg-4 mb-4" style="margin: 0px !important;">
                          <h5 class="card-title">AGS Commission and Premium</h5>
                        </div>

                          <!-- <div class="col-xl-8 col-lg-8 mb-8" style="margin: 0px !important;">
                            <div class="input-daterange input-daterange-year input-group" id="datepicker">
                              <select class="input-sm form-control selected_federation">
                                <option value="">All</option>
                                <?php foreach($fd as $key => $value): ?>
                                    <option value="<?php echo $value['id']; ?>"  <?php if($value['title']=="NAIF") echo "selected"; ?>><?php echo $value['title']; ?></option>
                                <?php endforeach; ?>
                              </select>
                              <input type="text" class="input-sm form-control graphStartDate" name="graphStart" placeholder="Start" />
                              <span class="input-group-addon"></span>
                              <input type="text" class="input-sm form-control graphEndDate" name="graphEnd" placeholder="End" />
                              <div class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right btn_search_comission">&nbsp;&nbsp;&nbsp;<i class="iconsminds-reset mr-2 text-white align-text-bottom d-inline-block"></i> Search</div>
                            </div>
                          </div> -->


                        <div class="col-xl-8 col-lg-8 mb-8" style="margin: 0px !important;">
                          <div class="input-daterange input-daterange-year input-group" id="datepicker">
                            <select class="input-sm form-control selected_federation">
                              <option value="">All</option>
                              <?php foreach($fd as $key => $value): ?>
                                  <option value="<?php echo $value['id']; ?>" <?php if($value['title']=="NAIF") echo "selected"; ?>>
                                      <?php echo $value['title']; ?>
                                  </option>
                              <?php endforeach; ?>
                            </select>

                            <!-- Normal date range -->
                            <input type="text" class="input-sm form-control graphStartDate" name="graphStart" placeholder="Start" />
                            <input type="text" class="input-sm form-control graphEndDate" name="graphEnd" placeholder="End" />

                            <!-- Year-only input (hidden by default) -->
                            <input type="number" class="input-sm form-control singleYearInput" name="singleYear" placeholder="Year" style="display:none;" />

                            <div class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right btn_search_comission">
                              &nbsp;&nbsp;&nbsp;<i class="iconsminds-reset mr-2 text-white align-text-bottom d-inline-block"></i> Search
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="graph">
                        <canvas id="lineChart" height="100"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                  <div class="card dashboard-filled-line-chart" style="height: 100%;">
                      <div class="card-body ">
                          <div class="float-left float-none-xs">
                              <div class="d-inline-block">
                                  <h5 class="d-inline">Ukentlige krav</h5>
                                  <span class="text-muted text-small d-block">Krav sendt inn</span>
                              </div>
                          </div>
                      </div>
                      <div class="chart card-body pt-0">
                          <canvas id="conversionChart"></canvas>
                      </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4" style="display: inline-flex;">
                          <div class="col-xl-8 col-lg-8 mb-8" style="margin: 0px !important;">
                            <h5 class="card-title">Invoiced Amount Per Policy</h5>
                          </div>
                          <div class="col-xl-4 col-lg-4 mb-4" style="margin: 0px !important;">
                            <div class="input-daterange input-daterange-year input-group" id="datepicker">
                              <input type="text" class="input-sm form-control startDate" name="start" placeholder="Start" />
                              <span class="input-group-addon"></span>
                              <input type="text" class="input-sm form-control endDate" name="end" placeholder="End" />
                              <div class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right btn_search">&nbsp;&nbsp;&nbsp;<i class="iconsminds-reset mr-2 text-white align-text-bottom d-inline-block"></i> Search</div>
                            </div>
                          </div>
                        </div>
                        <table class="table" id="dataTable9">
                        </table>
                      </div>
                    </div>
                  </div>
                



                <?php }else{?>
                <div class="col-lg-12 col-xl-6">

                    <div class="icon-cards-row">
                        <div class="glide dashboard-numbers">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <?php foreach($fd as $key => $value): ?>
                                    <li class="glide__slide">
                                        <a href="<?php echo ADMIN_BASE_URL.'claims/list/'.$value['title']; ?>" class="card">
                                            <div class="card-body text-center">
                                                <i class="<?php echo $value['icon']; ?>"></i>
                                                <p class="card-text mb-0"><?php echo $value['name']; ?></p>
                                                <?php 
                                                $res=Modules::run('api/_get_specific_table_with_pagination',array('federation'=>$value['id']), 'id desc','claims','id',1,10000)->num_rows();

                                                ?>
                                                <p class="lead text-center"><?php echo $res ?></p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class="col-md-12 col-sm-12 mb-4">
                            <div class="card dashboard-filled-line-chart">
                                <div class="card-body ">
                                    <div class="float-left float-none-xs">
                                        <div class="d-inline-block">
                                            <h5 class="d-inline">Ukentlige krav</h5>
                                            <span class="text-muted text-small d-block">Krav sendt inn</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart card-body pt-0">
                                    <canvas id="conversionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  <div class="col-xl-6 col-lg-12 mb-4">
                      <div class="card h-100">
                          <div class="card-body">
                              <h5 class="card-title">Kalender</h5>
                              <div class="calendar"></div>
                          </div>
                      </div>
                  </div>
            </div>

            <div class="row">
              <div class="col-xl-12 col-lg-12 mb-12">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 mb-12">
                  </div>
                </div>
                <div class="row">

                  <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4" style="display: inline-flex;">
                          <div class="col-xl-8 col-lg-8 mb-8" style="margin: 0px !important;">
                            <h5 class="card-title">Invoiced Amount Per Policy</h5>
                          </div>
                          <div class="col-xl-4 col-lg-4 mb-4" style="margin: 0px !important;">
                            <div class="input-daterange input-daterange-year input-group" id="datepicker">
                              <input type="text" class="input-sm form-control startDate" name="start" placeholder="Start" />
                              <span class="input-group-addon"></span>
                              <input type="text" class="input-sm form-control endDate" name="end" placeholder="End" />
                              <div class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block btn-right btn_search">&nbsp;&nbsp;&nbsp;<i class="iconsminds-reset mr-2 text-white align-text-bottom d-inline-block"></i> Search</div>
                            </div>
                          </div>
                        </div>
                        <table class="table" id="dataTable9">
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <?php } ?>
        </div>
    </main>
    <script src="<?php echo STATIC_ADMIN_JS?>vendor/Chart.bundle.min.js"></script>
    <script src="<?php echo STATIC_ADMIN_JS?>vendor/chartjs-plugin-datalabels.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <script>
window.addEventListener("load", function(){
     
      var rootStyle = getComputedStyle(document.body);
    var themeColor1 = rootStyle.getPropertyValue("--theme-color-1").trim();
    var themeColor2 = rootStyle.getPropertyValue("--theme-color-2").trim();
    var themeColor3 = rootStyle.getPropertyValue("--theme-color-3").trim();
    var themeColor4 = rootStyle.getPropertyValue("--theme-color-4").trim();
    var themeColor5 = rootStyle.getPropertyValue("--theme-color-5").trim();
    var themeColor6 = rootStyle.getPropertyValue("--theme-color-6").trim();
    var themeColor1_10 = rootStyle
      .getPropertyValue("--theme-color-1-10")
      .trim();
    var themeColor2_10 = rootStyle
      .getPropertyValue("--theme-color-2-10")
      .trim();
    var themeColor3_10 = rootStyle
      .getPropertyValue("--theme-color-3-10")
      .trim();
    var themeColor4_10 = rootStyle
      .getPropertyValue("--theme-color-4-10")
      .trim();

    var themeColor5_10 = rootStyle
      .getPropertyValue("--theme-color-5-10")
      .trim();
    var themeColor6_10 = rootStyle
      .getPropertyValue("--theme-color-6-10")
      .trim();

    var primaryColor = rootStyle.getPropertyValue("--primary-color").trim();
    var foregroundColor = rootStyle
      .getPropertyValue("--foreground-color")
      .trim();
    var separatorColor = rootStyle.getPropertyValue("--separator-color").trim();

    /* 03.02. Resize */
    var subHiddenBreakpoint = 1440;
    var searchHiddenBreakpoint = 768;
    var menuHiddenBreakpoint = 768;
    Chart.defaults.LineWithShadow = Chart.defaults.line;
      Chart.controllers.LineWithShadow = Chart.controllers.line.extend({
        draw: function (ease) {
          Chart.controllers.line.prototype.draw.call(this, ease);
          var ctx = this.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.15)";
          ctx.shadowBlur = 10;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 10;
          ctx.responsive = true;
          ctx.stroke();
          Chart.controllers.line.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });
      var chartTooltip = {
        backgroundColor: foregroundColor,
        titleFontColor: primaryColor,
        borderColor: separatorColor,
        borderWidth: 0.5,
        bodyFontColor: primaryColor,
        bodySpacing: 10,
        xPadding: 15,
        yPadding: 15,
        cornerRadius: 0.15,
        displayColors: false
      };
      var count=<?php echo json_encode($graph['count']) ?>;
      var date=<?php echo json_encode($graph['date'])?>;
      if (document.getElementById("conversionChart")) {
        var conversionChart = document
          .getElementById("conversionChart")
          .getContext("2d");
        var myChart = new Chart(conversionChart, {
          type: "LineWithShadow",
          options: {
            plugins: {
              datalabels: {
                display: false
              }
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  gridLines: {
                    display: true,
                    lineWidth: 1,
                    color: "rgba(0,0,0,0.1)",
                    drawBorder: false
                  },
                  ticks: {
                    beginAtZero: true,
                    padding: 0
                  }
                }
              ],
              xAxes: [
                {
                  gridLines: {
                    display: false
                  }
                }
              ]
            },
            legend: {
              display: false
            },
            tooltips: chartTooltip
          },
          data: {
            labels: date,
            datasets: [
              {
                label: "",
                data: count,
                borderColor: themeColor2,
                pointBackgroundColor: foregroundColor,
                pointBorderColor: themeColor2,
                pointHoverBackgroundColor: themeColor2,
                pointHoverBorderColor: foregroundColor,
                pointRadius: 4,
                pointBorderWidth: 2,
                pointHoverRadius: 5,
                fill: true,
                borderWidth: 2,
                backgroundColor: themeColor2_10
              }
            ]
          }
        });
      }
    });
    $(document).on('click', function(e) {
      var btnSearch = $(".btn_search");
      if (!$(e.target).closest(btnSearch).length) {
        $('.startDate').removeClass('errorClass');
        $('.endDate').removeClass('errorClass');
      }
    });


    $(document).ready(function() {
      const currentYear = new Date().getFullYear();
      const start = currentYear - 5;
      $('.startDate').val(start.toString());
      $('.endDate').val(currentYear.toString());
      getDateWiseRecord(start, currentYear);

    });


    $(document).off("click", ".btn_search").on("click", ".btn_search", function(event) {
      let startDate = $('.startDate').val();
      let endDate = $('.endDate').val();
      getDateWiseRecord(startDate, endDate);
    });


  function getDateWiseRecord(startDate, endDate) {

    if (startDate !== "" && endDate!== "") {
      
      $.ajax({
        type: "POST",
        url: "<?php echo ADMIN_BASE_URL ?>dashboard/searchIncome/",
        data: {
          "startDate": startDate,
          "endDate": endDate
        },
        dataType: "json",
        success: function(json) {

          if ($.fn.dataTable && $.fn.DataTable.isDataTable('#dataTable9')) {
              $('#dataTable9').DataTable().destroy();
              $('#dataTable9').empty();
          }
          $("#dataTable9").css({
            display: "block"
          });
          $('#dataTable9').DataTable({
            "processing": true,
            "serverSide": false,
            "filter": true,
            "orderMulti": false,
            "bDestroy": true,
            "data": json.data,
            "columns": json.columns,
            "responsive": true,
          });
        },
        error: function(data) {
          alert("Error while fetching Data");
        }
      });
    } else if (_.isEmpty(startDate) && _.isEmpty(endDate)) {
      $('.startDate').addClass('errorClass');
      $('.endDate').addClass('errorClass');
    } else if (_.isEmpty(startDate)) {
      $('.startDate').addClass('errorClass');
    } else if (_.isEmpty(endDate)) {
      $('.endDate').addClass('errorClass');
    } else {
      $('.startDate').removeClass('errorClass');
      $('.endDate').removeClass('errorClass');
    }
  }
  $(document).off("click", ".processLogs").on("click", ".processLogs", function(event) {
    event.preventDefault();
    openConfrim.open();
  });
  let openConfrim = $.confirm({
    content: function() {
      var self = this;
      return $.ajax({
        url: '<?= ADMIN_BASE_URL . "dashboard/getPendingClaims" ?>',
        dataType: 'json',
        method: 'get'
      }).done(function(response) {
        self.setContentAppend('<div>Kravlogger oppdateres</div>');
      }).fail(function() {
        self.setContentAppend('<div>Ukjent feil oppstår, prøv senere.!</div>');
      });
    },
    title: 'Kravlogger',
    draggable: true,
    dragWindowGap: 0,
    animationBounce: 1.5,
    closeAnimation: 'zoom',
    animation: 'scale',
    theme: 'modern',
    lazyOpen: true,
  });



  // $(document).on('click', function(e) {
  //   var btnSearch = $(".btn_search_comission");
  //   if (!$(e.target).closest(btnSearch).length) {
  //     $('.graphStartDate').removeClass('errorClass');
  //     $('.graphEndDate').removeClass('errorClass');
  //   }
  // });
  // $(document).off("click", ".btn_search_comission").on("click", ".btn_search_comission", function(event) {
  //   let startDate = $('.graphStartDate').val();
  //   let endDate = $('.graphEndDate').val();
  //   let f_id = $('.selected_federation').val();
  //   getDateWiseComission(startDate, endDate ,f_id);
  // });


  $(document).on('click', function(e) {
      const btnSearch = $(".btn_search_comission");
      if (!$(e.target).closest(btnSearch).length) {
          $('.graphStartDate, .graphEndDate, .singleYearInput').removeClass('errorClass');
      }
  });

  // Handle search button click
  $(document).off("click", ".btn_search_comission").on("click", ".btn_search_comission", function(event) {
      const f_id = $('.selected_federation').val();
      let startDate = '';
      let endDate = '';

      if (f_id === "") {
          // If "All" selected → use single year
          const year = $('.singleYearInput').val();
          if (!year) {
              $('.singleYearInput').addClass('errorClass');
              return;
          }
          startDate =year;
          endDate = year;
      } else {
          // Federation selected → use date range
          startDate = $('.graphStartDate').val();
          endDate = $('.graphEndDate').val();

          if (!startDate || !endDate) {
              $('.graphStartDate, .graphEndDate').addClass('errorClass');
              return;
          }
      }

      // 🔥 Call your existing function
      getDateWiseComission(startDate, endDate, f_id);
  });
  
  function getColor(i) {
    const colors = ['#ddf5f5', '#ccffe8', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1', '#fd7e14', '#20c997', '#6610f2', '#e83e8c'];
    return colors[i % colors.length];
  }

  // function getDateWiseComission(startDate, endDate ,f_id) {
  //   if (!_.isEmpty(startDate) && !_.isEmpty(endDate)) {
  //     $('.graphStartDate, .graphEndDate').removeClass('errorClass');
  //     $.ajax({
  //       type: "POST",
  //       url: "<?php echo ADMIN_BASE_URL ?>dashboard/searchComission/",
  //       data: {
  //         "startDate": startDate,
  //         "endDate": endDate,
  //         "f_id":f_id
  //       },
  //       dataType: "json",
  //       success: function(response) {
  //         const years = response.years;
  //         const federations = response.federations;
  //         const table_data = response.table_data;

  //         const labels = [];
  //         const paidData = [];
  //         const commissionData = [];

  //         years.forEach(year => {
  //           Object.entries(federations).forEach(([fid, fname]) => {
  //             const row = table_data[fid]?.[year] || { paid: 0, comission: 0 };
  //             labels.push(`${year}`);
  //             paidData.push(row.paid);
  //             commissionData.push(row.comission);
  //           });
  //         });

  //         const datasets = [
  //           {
  //             label: 'Paid',
  //             data: paidData,
  //             backgroundColor: getColor(0)
  //           },
  //           {
  //             label: 'Commission',
  //             data: commissionData,
  //             backgroundColor: getColor(1)
  //           }
  //         ];

  //         drawChart(labels, datasets);
          
  //       },
  //       error: function() {
  //         alert("Error while fetching Data");
  //       }
  //     });
  //   } else {
  //     // Error handling for empty dates
  //     $('.graphStartDate').toggleClass('errorClass', _.isEmpty(startDate));
  //     $('.graphEndDate').toggleClass('errorClass', _.isEmpty(endDate));
  //   }
  // }

  function getDateWiseComission(startDate, endDate, f_id) {
    if (!_.isEmpty(startDate) && !_.isEmpty(endDate)) {
        $('.graphStartDate, .graphEndDate').removeClass('errorClass');
        $.ajax({
            type: "POST",
            url: "<?php echo ADMIN_BASE_URL ?>dashboard/searchComission/",
            data: {
                "startDate": startDate,
                "endDate": endDate,
                "f_id": f_id
            },
            dataType: "json",
            success: function(response) {
                const years = response.years;
                const federations = response.federations;
                const table_data = response.table_data;

                const labels = [];
                const paidData = [];
                const commissionData = [];

                if (years.length === 1) {
                    // ✅ Only 1 year selected → X-axis = federations
                    Object.entries(federations).forEach(([fid, fname]) => {
                        const row = table_data[fid]?.[years[0]] || { paid: 0, comission: 0 };
                        labels.push(fname);            // X-axis = federation name
                        paidData.push(row.paid);
                        commissionData.push(row.comission);
                    });
                } else {
                    // Multiple years → X-axis = years
                    years.forEach(year => {
                        Object.entries(federations).forEach(([fid, fname]) => {
                            const row = table_data[fid]?.[year] || { paid: 0, comission: 0 };
                            labels.push(`${year}`);      // X-axis = years
                            paidData.push(row.paid);
                            commissionData.push(row.comission);
                        });
                    });
                }

                const datasets = [
                    {
                        label: 'Paid',
                        data: paidData,
                        backgroundColor: getColor(0)
                    },
                    {
                        label: 'Commission',
                        data: commissionData,
                        backgroundColor: getColor(1)
                    }
                ];

                drawChart(labels, datasets);
            },
            error: function() {
                alert("Error while fetching Data");
            }
        });
    } else {
        $('.graphStartDate').toggleClass('errorClass', _.isEmpty(startDate));
        $('.graphEndDate').toggleClass('errorClass', _.isEmpty(endDate));
    }
}




  
  let chartInstance = null;

  function drawChart(labels, datasets) {
    const container = document.querySelector('.graph');

    // Destroy existing chart if any
    if (chartInstance) {
      chartInstance.destroy();
      chartInstance = null;
    }

    // Clear container completely
    container.innerHTML = '';

    // Create new canvas
    const canvas = document.createElement('canvas');
    container.appendChild(canvas);

    // Create new Chart
    chartInstance = new Chart(canvas.getContext('2d'), {
      type: 'bar',
      data: {
        labels: labels,
        datasets: datasets
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'top' },
          title: { display: true, text: 'Federation-wise Premiums and Commissions' }
        },
        scales: {
          x: {
            stacked: true,
            display: false,
            ticks: {
              display: false
            },
            grid: {
              display: false
            }
          },
          y: {
            stacked: true
          }
        }
      }
    });
  }

  $(document).ready(function() {
    const currentYear = new Date().getFullYear();
    const startYear = currentYear - 5;

    // Set the input fields
    $('.graphStartDate').val(startYear.toString());
    $('.graphEndDate').val(currentYear.toString());

    // Call your function with startYear and currentYear
    getDateWiseComission(startYear.toString(), currentYear.toString(), "3");


    $(document).on('change', '.selected_federation', function() {
        const selected = $(this).val();

        if (selected === "") { 
            // "All" selected → show single year input
            $('.graphStartDate, .graphEndDate').hide();
            $('.singleYearInput').show();
        } else {
            // Federation selected → show start & end range
            $('.singleYearInput').hide();
            $('.graphStartDate, .graphEndDate').show();
        }
    });

    // Trigger change on load
    $('.selected_federation').trigger('change');

  });

  </script>