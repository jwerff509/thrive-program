
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

  <script>

    var quarter = <?php echo $labels ?>;

    var impSeedActual = <?php echo $impSeedActual; ?>;
    var impStorageActual = <?php echo $impStorageActual; ?>;
    var impToolsActual = <?php echo $impToolsActual; ?>;
    var haWithIrrigationActual = <?php echo $haWithIrrigationActual; ?>;


/*
    var gradStepsFemales = [];
    var gradStepsMales = [];
    var gradStepsTotal = [];
    var totalMembers = 0;
    var y = 0;

    var pillarsByHousehold = <?php // echo $pillarsByHousehold; ?>;

    // Need to figure out a way to sum up the totals for each pillar.
    // That would be each time i is incremented to the next level

    for(i=0; i < gradSteps.length; i++) {

      if(i==0) {
        y = 1;
      }

      if(gradSteps[i].num_grad_step > y) {
        gradStepsTotal.push(totalMembers);
        totalMembers = 0;
        y++;
      }

      //if(i < y) {

      if(gradSteps[i].sex == "Female") {
        gradStepsFemales.push(gradSteps[i].num_members);
      } else if(gradSteps[i].sex == "Male") {
        gradStepsMales.push(gradSteps[i].num_members);
      } else if(gradSteps[i].sex == "Unknown") {

      }

      totalMembers = totalMembers + gradSteps[i].num_members;

    }

    if(gradSteps.length > 0) {

      var gradMembers2 = gradSteps[1].num_members;
      var gradMembers3 = gradSteps[2].num_members;
      var gradMembers4 = gradSteps[3].num_members;

    }

    if(pillarsByHousehold.length > 0) {


      var zeroPillarMembers = pillarsByHousehold[0].num_members;
      var onePillarMembers = pillarsByHousehold[1].num_members;
      var twoPillarMembers = pillarsByHousehold[2].num_members;
      var threePillarMembers = pillarsByHousehold[3].num_members;
      //var fourPillarMembers = pillarsByHousehold[4].num_members;

    }
*/
    var lineChartData = {
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

    /*

    var pieChartData = {
      labels: ['Low Risk (PPI Score > 74)', 'Medium Risk (PPI Score between 50 and 74)', 'High Risk (PPI Score between 25 and 49)', 'Extreme Risk (PPI Score < 25)'],
      datasets: [{
        backgroundColor: ['#2ecc71', '#f1c40f', '#f1590f', '#ff0000'],
        data: [ppi1, ppi2, ppi3, ppi4]
      }]
    };
*/
    window.onload = function() {

      var ctx = document.getElementById("agChart").getContext("2d");

        window.myLineChart = new Chart(ctx, {
          type: 'line',
          data: lineChartData,
          options: {
            responsive: true,
            title: {
              display: true,
              text: 'Agricultural Technology Trends'
            }
          }
        });


/*
      var ctx1 = document.getElementById("pieChart").getContext("2d");

      window.myPieChart = new Chart(ctx1, {
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
            text: 'Members PPI Scores (as of 30-Sept 2016)'
          }
        }
      });


      var ctx2 = document.getElementById("pillarChart").getContext("2d");

      window.multiBar = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ["Step 1", "Step 2", "Step 3", "Step 4"],
          datasets: [
            {
            // data: [gradMembers1, gradMembers2, gradMembers3, gradMembers4],
            label: "Male",
            data: gradStepsMales,
            backgroundColor: ["#114577", "#114577", "#114577", "#114577"],
            borderWidth: 1
            }, {
            // data: [gradMembers1, gradMembers2, gradMembers3, gradMembers4],
            label: "Female",
            data: gradStepsFemales,
            backgroundColor: ["#0082FF", "#0082FF", "#0082FF", "#0082FF"],
            borderWidth: 1
            }, {
            // data: [gradMembers1, gradMembers2, gradMembers3, gradMembers4],
            label: "Total",
            data: gradStepsTotal,
            backgroundColor: ["#FF9F00", "#FF9F00", "#FF9F00", "#FF9F00"],
            borderWidth: 1
          }]

        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Number of Households per Graduation Step (Last Quarter)',
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });

      var housePillar = document.getElementById("housePillarChart").getContext("2d");

      window.multiBar = new Chart(housePillar, {
        type: 'bar',
        data: {
          labels: ["0 Pillars", "1 Pillar", "2 Pillars", "3 Pillars"],
          datasets: [{
            data: [zeroPillarMembers, onePillarMembers, twoPillarMembers, threePillarMembers],
            backgroundColor: ['#ff0000', '#f1590f', '#f1c40f', '#3366cc'],
            borderWidth: 1
          }]

        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Number of Pillar Activities by Household (Last Quarter)',
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
*/
    };
  </script>
