
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>



  <script>

    var countries = <?php echo $labels ?>;

    // Data for Agricultural Chart
    var impSeedActual = <?php echo $impSeedActual; ?>;
    var impStorageActual = <?php echo $impStorageActual; ?>;
    var impToolsActual = <?php echo $impToolsActual; ?>;
    var haWithIrrigationActual = <?php echo $haWithIrrigationActual; ?>;

    // Data for Financial Services chart
    var numSGActual = <?php echo $num_savings_groups_actual; ?>;
    var numSGMemActual = <?php echo $num_savings_group_members_actual; ?>;
    var memWithLoanActual = <?php echo $members_with_vf_loan_actual; ?>;
    var memWithVCInsActual = <?php echo $farmers_with_vc_ins_actual; ?>;

    // Data for Access to Markets chart
    var numPGActual = <?php echo $num_producers_groups_actual; ?>;
    var numPGMemActual = <?php echo $num_producers_group_members_actual; ?>;
    var numPGSellVCActual = <?php echo $num_prod_groups_sell_vc_product_actual; ?>;
    var numPGSellLocalActual = <?php echo $num_prod_groups_local_markets_actual; ?>;
    var numPGSellExpandedActual = <?php echo $num_prod_groups_expanded_markets_actual; ?>;

    // Data for Natural Resource Management chart
    var haRecAgActual = <?php echo $hectares_reclaimed_for_ag_actual; ?>;
    var haSoilWaterConsActual = <?php echo $hectares_farmed_soil_water_cons_actual; ?>;
    var numUsingWaterCatchActual = <?php echo $farmers_using_water_catchment_actual; ?>;
    var commWatershedActual = <?php echo $comm_watershed_rehab_actual; ?>;
    var treesPlantedActual = <?php echo $trees_planted_actual; ?>;

    // Data for Resilience to Shocks and Stresses chart
    var numWithEmerSavingsActual = <?php echo $members_with_emer_savings_actual; ?>;
    var numUsingEWSActual = <?php echo $farmers_using_ews_actual; ?>;

    // Data for Empowered Worldview chart
    var numEwvTrainingActual = <?php echo $members_received_ewv_training_actual; ?>;
    var numAttestValueTransActual = <?php echo $ewv_trainees_attest_value_trans_actual; ?>;
    var numLeadersInEWVTrainigActual = <?php echo $faith_leaders_in_ewv_training_actual; ?>;
    var numGroupsPolRepActual = <?php echo $groups_undertaking_political_rep_actual; ?>;
    var numChildrenGroupCareActual = <?php echo $children_given_care_by_groups_actual; ?>;
    var uniqueHHIncSourcesActual = <?php echo $unique_hh_inc_sources_actual; ?>;



    var rwAg = <?php echo $rwAg; ?>;
    var tzAg = <?php echo $tzAg; ?>;
    var zbAg = <?php echo $zbAg; ?>;
    var mwAg = <?php echo $mwAg; ?>;
    var hdAg = <?php echo $hdAg; ?>;

    var rwFin = <?php echo $rwFin; ?>;
    var tzFin = <?php echo $tzFin; ?>;
    var zbFin = <?php echo $zbFin; ?>;
    var mwFin = <?php echo $mwFin; ?>;
    var hdFin = <?php echo $hdFin; ?>;

    var rwMkt = <?php echo $rwMkt; ?>;
    var tzMkt = <?php echo $tzMkt; ?>;
    var zbMkt = <?php echo $zbMkt; ?>;
    var mwMkt = <?php echo $mwMkt; ?>;
    var hdMkt = <?php echo $hdMkt; ?>;

    var rwColors = ['rgba(255,99,132,1)', 'rgba(255,99,132,1)', 'rgba(255,99,132,1)', 'rgba(255,99,132,1)', 'rgba(255,99,132,1)'];
    var tzColors = ['rgba(255,159,64,1)', 'rgba(255,159,64,1)', 'rgba(255,159,64,1)', 'rgba(255,159,64,1)', 'rgba(255,159,64,1)'];
    var zbColors = ['rgba(0,204,51,1)', 'rgba(0,204,51,1)', 'rgba(0,204,51,1)', 'rgba(0,204,51,1)', 'rgba(0,204,51,1)'];
    var mwColors = ['rgba(0,102,255,1)', 'rgba(0,102,255,1)', 'rgba(0,102,255,1)', 'rgba(0,102,255,1)', 'rgba(0,102,255,1)'];
    var hdColors = ['rgba(102,0,102,1)', 'rgba(102,0,102,1)', 'rgba(102,0,102,1)', 'rgba(102,0,102,1)', 'rgba(102,0,102,1)'];

    var countries = <?php echo $labels; ?>;
    var allCountryColors = ['rgba(255,99,132,1)', 'rgba(255,159,64,1)', 'rgba(0,204,51,1)', 'rgba(0,102,255,1)', 'rgba(102,0,102,1)'];


    window.onload = function() {

      var pieChartData = {
        labels: countries,
        datasets: [{
          backgroundColor: allCountryColors,
          data: ['10', '50', '15', '35']
        }]
      };


      var ctxPie1 = document.getElementById("pieChart1").getContext("2d");

      window.myPieChart = new Chart(ctxPie1, {
        type: 'doughnut',
        data: pieChartData,
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderColor: 'rgb(0, 255, 0)',
              borderSkipped: 'bottom'
            }
          },
          responstive: true,
          title: {
            display: true,
            text: 'Improved Seed'
          }
        }
      });

      var ctxPie2 = document.getElementById("pieChart2").getContext("2d");

      window.myPieChart = new Chart(ctxPie2, {
        type: 'pie',
        data: pieChartData,
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderColor: 'rgb(0, 255, 0)',
              borderSkipped: 'bottom'
            }
          },
          responstive: true,
          title: {
            display: true,
            text: 'Improved Storage'
          }
        }
      });

      var ctxPie3 = document.getElementById("pieChart3").getContext("2d");

      window.myPieChart = new Chart(ctxPie3, {
        type: 'doughnut',
        data: pieChartData,
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderColor: 'rgb(0, 255, 0)',
              borderSkipped: 'bottom'
            }
          },
          responstive: true,
          title: {
            display: true,
            text: 'Improved Tools & Practices'
          }
        }
      });

      var ctxPie4 = document.getElementById("pieChart4").getContext("2d");

      window.myPieChart = new Chart(ctxPie4, {
        type: 'pie',
        data: pieChartData,
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderColor: 'rgb(0, 255, 0)',
              borderSkipped: 'bottom'
            }
          },
          responstive: true,
          title: {
            display: true,
            text: '# Using Irrigation'
          }
        }
      });

      var ctxPie5 = document.getElementById("pieChart5").getContext("2d");

      window.myPieChart = new Chart(ctxPie5, {
        type: 'pie',
        data: pieChartData,
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderColor: 'rgb(0, 255, 0)',
              borderSkipped: 'bottom'
            }
          },
          responstive: true,
          title: {
            display: true,
            text: 'Ha With Irrigation'
          }
        }
      });






      var ctx = document.getElementById("myChart");

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Improved Seed", "Improved Storage", "Improved Tools", "# Using Irrigation", "Ha With Irrigation",],
          datasets: [{
              label: 'Rwanda',
              data: rwAg, // [10, 19, 3, 5, 2],
              backgroundColor: rwColors,
              borderColor: rwColors,
              borderWidth: 2
            },
            {
              label: 'Tanzania',
              data: tzAg,
              backgroundColor: tzColors,
              borderColor: tzColors,
              borderWidth: 2
            },
            {
              label: 'Zambia',
              data: zbAg,
              backgroundColor: zbColors,
              borderColor: zbColors,
              borderWidth: 2
            },
            {
              label: 'Malawi',
              data: mwAg,
              backgroundColor: mwColors,
              borderColor: mwColors,
              borderWidth: 2
            },
            {
              label: 'Honduras',
              data: hdAg,
              backgroundColor: hdColors,
              borderColor: hdColors,
              borderWidth: 2
            },
          ]
        },
        options: {
          scales: {
            yAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }],
            xAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });

      // Financial Services Trends bar chart
      var ctxFin = document.getElementById("finChart");

      var finChart = new Chart(ctxFin, {
        type: 'bar',
        data: {
          labels: ["Savings Groups", "Savings Group Members", "VF Clients with Loans", "Farmers with VC Insurance"],
          datasets: [{
              label: 'Rwanda',
              data: rwFin, // [10, 19, 3, 5, 2],
              backgroundColor: rwColors,
              borderColor: rwColors,
              borderWidth: 2
            },
            {
              label: 'Tanzania',
              data: tzFin,
              backgroundColor: tzColors,
              borderColor: tzColors,
              borderWidth: 2
            },
            {
              label: 'Zambia',
              data: zbFin,
              backgroundColor: zbColors,
              borderColor: zbColors,
              borderWidth: 2
            },
            {
              label: 'Malawi',
              data: mwFin,
              backgroundColor: mwColors,
              borderColor: mwColors,
              borderWidth: 2
            },
            {
              label: 'Honduras',
              data: hdFin,
              backgroundColor: hdColors,
              borderColor: hdColors,
              borderWidth: 2
            },
          ]
        },
        options: {
          scales: {
            yAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }],
            xAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });


      // Access to Markets bar chart
      var ctxMkt = document.getElementById("marketChart");

      var mktChart = new Chart(ctxMkt, {
        type: 'bar',
        data: {
          labels: ["Producers Groups", "Producers Group Members", "PGs Who Sell VC Product", "PGs Who Access Local Markets", "PGs Who Access Markets Beyond Local"],
          datasets: [{
              label: 'Rwanda',
              data: rwMkt, // [10, 19, 3, 5, 2],
              backgroundColor: rwColors,
              borderColor: rwColors,
              borderWidth: 2
            },
            {
              label: 'Tanzania',
              data: tzMkt,
              backgroundColor: tzColors,
              borderColor: tzColors,
              borderWidth: 2
            },
            {
              label: 'Zambia',
              data: zbMkt,
              backgroundColor: zbColors,
              borderColor: zbColors,
              borderWidth: 2
            },
            {
              label: 'Malawi',
              data: mwMkt,
              backgroundColor: mwColors,
              borderColor: mwColors,
              borderWidth: 2
            },
            {
              label: 'Honduras',
              data: hdMkt,
              backgroundColor: hdColors,
              borderColor: hdColors,
              borderWidth: 2
            },
          ]
        },
        options: {
          scales: {
            yAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }],
            xAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });


/*
      var ctx = document.getElementById("agChart").getContext("2d");
        window.myAgLineChart = new Chart(ctx, {
          type: 'line',
          data: agChartData,
          options: {
            responsive: true,
            title: {
              display: true,
              text: 'Agricultural Technology Trends'
            }
          }
        });

        var ctxFin = document.getElementById("finChart").getContext("2d");
          window.myFinLineChart = new Chart(ctxFin, {
            type: 'line',
            data: finChartData,
            options: {
              responsive: true,
              title: {
                display: true,
                text: 'Financial Services Trends'
              }
            }
          });

          var ctxMarket = document.getElementById("marketChart").getContext("2d");
            window.myMarketLineChart = new Chart(ctxMarket, {
              type: 'line',
              data: marketChartData,
              options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Access to Markets Trends'
                }
              }
            });

            var ctxNrm = document.getElementById("nrmChart").getContext("2d");
              window.myNrmLineChart = new Chart(ctxNrm, {
                type: 'line',
                data: nrmChartData,
                options: {
                  responsive: true,
                  title: {
                    display: true,
                    text: 'Natural Resource Management Trends'
                  }
                }
              });

              var ctxShocks = document.getElementById("shocksChart").getContext("2d");
                window.myNrmLineChart = new Chart(ctxShocks, {
                  type: 'line',
                  data: shocksChartData,
                  options: {
                    responsive: true,
                    title: {
                      display: true,
                      text: 'Resilience to Shocks & Stresses Trends'
                    }
                  }
                });

                var ctxWorldview = document.getElementById("worldviewChart").getContext("2d");
                  window.myNrmLineChart = new Chart(ctxWorldview, {
                    type: 'line',
                    data: worldviewChartData,
                    options: {
                      responsive: true,
                      title: {
                        display: true,
                        text: 'Empowered Worldview Trends'
                      }
                    }
                  });
*/

              };


  </script>
