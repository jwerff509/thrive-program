
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

  <script>

    var quarter = <?php echo $labels ?>;

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


    var agChartData = {
      labels: quarter,
      datasets: [{
        label: 'Improved Seed',
        borderColor: "#3e95cd",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: impSeedActual
      }, {
        label: 'Improved Storage',
        borderColor: "#8e5ea2",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: impStorageActual
      }, {
        label: 'Improved Practices',
        borderColor: "#c45850",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: impToolsActual
      }, {
        label: '# Using Irrigation',
        borderColor: "#ea9714",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: haWithIrrigationActual
      }]
    };

    var finChartData = {
      labels: quarter,
      datasets: [{
        label: 'Savings Groups',
        borderColor: "#3e95cd",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numSGActual
      }, {
        label: 'Savings Group Members',
        borderColor: "#8e5ea2",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numSGMemActual
      }, {
        label: 'VF Clients with Loans',
        borderColor: "#c45850",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: memWithLoanActual
      }, {
        label: '# Using VC Insurance',
        borderColor: "#ea9714",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: memWithVCInsActual
      }]
    };

    var marketChartData = {
      labels: quarter,
      datasets: [{
        label: 'Producers Groups',
        borderColor: "#3e95cd",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numPGActual
      }, {
        label: 'Producers Group Members',
        borderColor: "#8e5ea2",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numPGMemActual
      }, {
        label: 'PG Members who sell VC Product',
        borderColor: "#c45850",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numPGSellVCActual
      }, {
        label: 'PG Members Accessing Local Markets',
        borderColor: "#ea9714",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numPGSellLocalActual
      }, {
        label: 'PG Members Accessing Expanded Markets',
        borderColor: "#19d506",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numPGSellExpandedActual
      }]
    };

    var nrmChartData = {
      labels: quarter,
      datasets: [{
        label: 'Ha Reclaimed for Ag',
        borderColor: "#3e95cd",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: haRecAgActual
      }, {
        label: 'Ha w/ Soil & Water Cons',
        borderColor: "#8e5ea2",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: haSoilWaterConsActual
      }, {
        label: '# Using Water Catchment',
        borderColor: "#c45850",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numUsingWaterCatchActual
      }, {
        label: 'Communities with Watershed Rehab',
        borderColor: "#ea9714",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: commWatershedActual
      }, {
        label: '# Trees Planted',
        borderColor: "#19d506",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: treesPlantedActual
      }]
    };

    var shocksChartData = {
      labels: quarter,
      datasets: [{
        label: '# With Emergency Savings',
        borderColor: "#3e95cd",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numWithEmerSavingsActual
      }, {
        label: '# Using Early Warning Systems',
        borderColor: "#8e5ea2",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numUsingEWSActual
      }]
    };

    var worldviewChartData = {
      labels: quarter,
      datasets: [{
        label: '# Received EWV Training',
        borderColor: "#3e95cd",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numEwvTrainingActual
      }, {
        label: '# Attesting Value Transformation',
        borderColor: "#8e5ea2",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numAttestValueTransActual
      }, {
        label: '# Faith Leaders in EWV Training',
        borderColor: "#c45850",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numLeadersInEWVTrainigActual
      }, {
        label: '# Groups Undertaking Political Rep',
        borderColor: "#ea9714",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numGroupsPolRepActual
      }, {
        label: '# Children Given Care by Groups',
        borderColor: "#19d506",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: numChildrenGroupCareActual
      }, {
        label: '# Unique HH Income Sources',
        borderColor: "#000000",
        backgroundColor: 'rgba(0,0,0,0)',
        borderWidth: 2,
        data: uniqueHHIncSourcesActual
      }]
    };

    window.onload = function() {

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


              };
  </script>
