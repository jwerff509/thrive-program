
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

  <script>

    var quarters = <?php echo $quarters ?>;

    var impSeed = <?php echo $impSeedTrend; ?>;
    var impStorage = <?php echo $impStorageTrend; ?>;
    var impPractices = <?php echo $impPracticesTrend; ?>;
    var impIrrigation = <?php echo $impIrrigationTrend; ?>;

    var groupMembersTrend = <?php echo $groupMembersTrend; ?>;
    var loansTrend = <?php echo $loansTrend; ?>;
    var cropInsTrend = <?php echo $cropInsTrend; ?>;


    var agTrendsData = {
      labels: quarters,
      datasets: [{
        label: 'Improved Seed',
        borderColor: "#3e95cd",
        data: impSeed
      }, {
        label: 'Improved Storage',
        borderColor: "#8e5ea2",
        data: impStorage
      }, {
        label: 'Improved Practices',
        borderColor: "#c45850",
        data: impPractices
      }, {
        label: 'Irrigation Techniques',
        borderColor: "#00cc00",
        data: impIrrigation
      }]
    };

    var finTrendsData = {
      labels: quarters,
      datasets: [{
        label: 'Savings Group Members',
        borderColor: "#3e95cd",
        data: impSeed
      }, {
        label: 'Members Accessing VF Loans',
        borderColor: "#8e5ea2",
        data: impStorage
      }, {
        label: 'Members with Crop Insurance',
        borderColor: "#c45850",
        data: impPractices
      }]
    };


    window.onload = function() {


      var ctx = document.getElementById("agTrends").getContext("2d");

      window.agLine = new Chart(ctx, {
        type: 'line',
        data: agTrendsData,
        options: {
          responstive: true,
          title: {
            display: true,
            text: 'Recent Agricultural Technology Trends'
          }
        }
      });


      var finTrends = document.getElementById("finTrends").getContext("2d");

      window.agLine = new Chart(finTrends, {
        type: 'line',
        data: finTrendsData,
        options: {
          responstive: true,
          title: {
            display: true,
            text: 'Recent Financial Trends'
          }
        }
      });



    };
  </script>
