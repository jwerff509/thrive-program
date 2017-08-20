
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

    var chainLabels = <?php echo $chainLabels; ?>;
    var chainMembers = <?php echo $chainMembers; ?>;


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

    var chainMembersData = {
      labels: chainLabels,
      datasets: [{
        label: chainLabels,
        backgroundColor: "#3e95cd",
        data: chainMembers
      }]
    };


    window.onload = function() {


      var ctx = document.getElementById("agTrends").getContext("2d");

      window.agLine = new Chart(ctx, {
        type: 'line',
        data: agTrendsData,
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Recent Agricultural Technology Trends'
          }
        }
      });


      var finTrends = document.getElementById("finTrends").getContext("2d");

      window.finTrends = new Chart(finTrends, {
        type: 'line',
        data: finTrendsData,
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Recent Financial Trends'
          }
        }
      });

      var valChainMembers = document.getElementById("chainMembers").getContext("2d");

      window.valChainMembers = new Chart(valChainMembers, {
        type: 'bar',
        data: {
          labels: ['Aquaculture', 'Beans', 'Dairy', 'Groundnuts', 'Maize', 'Poultry'],
          datasets: [
            {
              label: "Farmers Engaged in Value Chains",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#dee102"],
              data: [137, 265, 99, 240, 200, 175]
            }
          ]
        },
        options: {
          legend: { display: true },
          title: true,
          text: 'Farmers Engaged In Project Value Chains'
        }
      });

      var valChainRevenue = document.getElementById("chainRevenue").getContext("2d");

      window.valChainRevenue = new Chart(valChainRevenue, {
        type: 'bar',
        data: {
          labels: ['Aquaculture', 'Beans', 'Dairy', 'Groundnuts', 'Maize', 'Poultry'],
          datasets: [
            {
              label: "Gross Revenue of Harvest per Value Chain ($)",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#dee102"],
              data: [1509, 450, 1674, 375, 413, 508]
            }
          ]
        },
        options: {
          legend: { display: true },
          title: true,
          text: 'Gross Revenue of Harvest per Value Chain'
        }
      });


    };
  </script>
