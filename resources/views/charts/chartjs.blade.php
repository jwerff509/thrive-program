
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

  <script>

    var quarter = <?php echo $labels ?>;

    var endToEnd = <?php echo $endToEnd; ?>;
    var nrm = <?php echo $nrm; ?>;
    var drr = <?php echo $drr; ?>;
    var ewv = <?php echo $ewv; ?>;

    var seeds = <?php echo $impSeed; ?>;
    var storage = <?php echo $impStorage; ?>;
    var practices = <?php echo $impPractices; ?>;
    var ppi = <?php echo ($ppi); ?>;


    var lineChartData = {
      labels: quarter,
      datasets: [{
        label: 'End to End',
        borderColor: "#3e95cd",
        data: endToEnd
      }, {
        label: 'NRM',
        borderColor: "#8e5ea2",
        data: nrm
      }, {
        label: 'DRR',
        borderColor: "#c45850",
        data: drr
      }, {
        label: 'EWV',
        borderColor: "#dee102",
        data: ewv
      }]
    };



    var pieChartData = {
      labels: ['Low Risk (PPI Score > 74)', 'Medium Risk (PPI Score between 50 and 74)', 'High Risk (PPI Score between 25 and 49)', 'Extreme Risk (PPI Score < 25)'],
      datasets: [{
        backgroundColor: ['#2ecc71', '#f1c40f', '#f1590f', '#ff0000'],
        data: [3, 22, 173, 84]
      }]
    };


    var multiChartData = {
      labels: ['Member Improvements'],
      datasets: [{
        label: 'Improved Seed',
        backgroundColor: "rgba(220,220,220,0.5)",
        data: seeds
      }, {
        label: 'Improved Storage',
        backgroundColor: "rgba(151,187,205,0.5)",
        data: storage
      }, {
        label: 'Improved Practices',
        backgroundColor: "rgba(153,255,51,1)",
        data: practices
      }]

    };


    window.onload = function() {


      var ctx = document.getElementById("lineChart").getContext("2d");

      window.myLine = new Chart(ctx, {
        type: 'line',
        data: lineChartData,
        options: {
          responstive: true,
          title: {
            display: true,
            text: 'Number of Households Engaged in These Pillars'
          }
        }
      });


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


      var ctx2 = document.getElementById("multiChart").getContext("2d");

      window.multiBar = new Chart(ctx2, {
        type: 'bar',
        data: multiChartData,
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
            text: 'Total Members Using Improved Seed, Storage, and Practices'
          }
        }
      });



    };
  </script>
