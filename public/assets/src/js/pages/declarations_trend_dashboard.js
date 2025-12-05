$(function () {

    'use strict';

          var options = {
            series: [{
            name: 'Naissances',
            data: [1044, 1055, 957, 1056, 861, 958, 863, 1045, 1012, 999, 1002, 956]
          }, {
            name: 'Décès',
            data: [1276, 1385, 1101, 1198, 1187, 1105, 1291, 1296, 1285, 1201, 1398, 1384]
          }],
            chart: {
            type: 'bar',
            foreColor:"#172b4c",
            height: 380,
                toolbar: {
                  show: false,
                }
          },
          plotOptions: {
            bar: {
              borderRadius: 3,
              horizontal: false,
              columnWidth: '40%',
            },
          },
          dataLabels: {
            enabled: false,
          },
          grid: {
              show: true,
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          colors: ['#3596f7', '#172b4c'],
          xaxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],

          },
          yaxis: {

          },
           legend: {
                show: true,
              position: 'top',
                horizontalAlign: 'right',
           },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function (val) {
                return "Total : " + val
              }
            },
              marker: {
                show: false,
            },
          }
          };

          var chart = new ApexCharts(document.querySelector("#declarations_trend_dashboard"), options);
          chart.render();


})
