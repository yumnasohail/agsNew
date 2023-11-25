/*==== result-chart =====*/
var ctx = document.getElementById('result-chart');
Chart.defaults.global.defaultFontFamily = 'Barlow';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontStyle = '500';
Chart.defaults.global.defaultFontColor = '#233d63';
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' ],
        datasets: [{
            label: "One",
            data: [ 10, 25, 13, 22, 32, 25],
            backgroundColor: 'rgba(255,255,255, 0.0)',
            borderColor: '#4021ba',
            pointBackgroundColor: '#ffffff',
            pointHoverBackgroundColor: '#4021ba',
            pointBorderColor: '#4021ba',
            borderWidth: 2,
            pointRadius: 4
        }, {
            label: "Two",
            data: [5, 12, 25, 18, 15, 34],
            backgroundColor: 'rgba(255,255,255, 0.0)',
            borderColor: '#F66B5D',
            pointBackgroundColor: '#ffffff',
            pointHoverBackgroundColor: '#F66B5D',
            pointBorderColor: '#F66B5D',
            borderWidth: 2,
            pointRadius: 4
        }]
    },

    // Configuration options go here
    options: {
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            backgroundColor: '#233d63',
            xPadding: 15,
            yPadding: 15,
            borderWidth: 3,
            borderColor:  "rgba(255, 255, 255, .1)"
        },
        legend: {
            display: false,
            tooltips: {
                displayColors:false,
            },
            labels: {
                fontSize: 14,
                fontStyle: 'bold',
                fontColor: '#000',
                boxWidth: 50,
                padding: 25,
                defaultFontStyle: 'bold',
                fontFamily: 'Barlow',
                usePointStyle: true,
            }
        },

        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: '#eee',
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: '#eee',
                },
                ticks: {
                    fontSize: 14,
                }
            }]

        },
        elements: {
            line: {
                //tension: 0.00001,
                tension: 0.4,
                borderWidth: 1,
            }
        }
    }
});