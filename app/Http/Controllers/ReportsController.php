<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupMemberMetrics;
use App\Person;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use Excel;
Use Carbon\Carbon;

class ReportsController extends Controller
{

  public function chartjs() {

    $current = Carbon::now();
    $quarter = Carbon::now();
    $quarter->subMonth(3);
    $half = Carbon::now();
    $half->subMonth(6);
    $threeQuarter = Carbon::now();
    $threeQuarter->subMonth(9);
    $year = Carbon::now();
    $year->subMonth(12);

    // Get total number of members and break it out by sex
    $totalMembers = Person::count();
    $totalFemales = Person::where('sex', 'Female')->count();
    $totalMales = Person::where('sex', 'Male')->count();
    $totalUnreported = Person::where('sex','Unknown')->count();

    // Count the total number of children.
    $totalChildren = DB::table('person')
            ->select(DB::raw('sum(males_under_59_months + females_under_59_months + males_6_to_14 + females_6_to_14 + males_15_to_18 + females_15_to_18) as num_children'))
            ->get()->toArray();
    $totalChildren = array_column($totalChildren, 'num_children');

    // Count the total number of female children.
    $totalFemaleChildren = DB::table('person')
            ->select(DB::raw('sum(females_under_59_months + females_6_to_14 + females_15_to_18) as num_female_children'))
            ->get()->toArray();
    $totalFemaleChildren = array_column($totalFemaleChildren, 'num_female_children');

    // Count the total number of male children.
    $totalMaleChildren = DB::table('person')
            ->select(DB::raw('sum(males_under_59_months + males_6_to_14 + males_15_to_18) as num_male_children'))
            ->get()->toArray();
    $totalMaleChildren = array_column($totalMaleChildren, 'num_male_children');


    // This query gets the number of members that were registered in the last 3 months
    $newUsers = DB::table('group_member_metrics')
            ->select(DB::raw('COUNT(DISTINCT(member_id)) as new_members'))
            ->whereDate('created_at', '>', $quarter)
            ->get()->toArray();
    $newUsers = array_column($newUsers, 'new_members');

    // This query returns the total balance of all savings group accounts from the last 3 months
    // 2/21/2018 - This query is being commented out because the data collection method changed
    // and we are no longer tracking if the group is a savings group, we are only tracking the
    // number of savings group members.
    /*
    $savings = DB::table('group_details')
            ->select(DB::raw('COUNT(id) as num_groups, SUM(account_balance) as total_savings'))
            ->where('savings_group', '=', '1')
            ->whereDate('report_term_date', '>', $quarter)
            ->get()->toArray();
    $numSavingsGroups = array_column($savings, 'num_groups');
    $totalSavings = array_column($savings, 'total_savings');
    */

    // This query returns the total balance of all producers groups
    $producers = DB::table('group_details')
            ->select(DB::raw('COUNT(id) as num_groups'))
            ->where('producers_group', '=', '1')
            ->whereDate('report_term_date', '>', $quarter)
            ->get()->toArray();
    $totalProducers = array_column($producers, 'num_groups');

    // This query returns the total number of hectares that were harvested in the last 3 months
    // 8/17/2017 - this query is not being used at the moment, so I'm commenting it out.
    /*
    $hectares = DB::table('group_member_metrics')
            ->join('group_details', 'group_member_metrics.group_details_id', '=', 'group_details.id')
            ->select(DB::raw('SUM(group_member_metrics.hectares_harvested) as total_hectares'))
            ->whereDate('group_details.report_term_date', '>', $current->subMonth(3))
            ->get()->toArray();
    $totalHectares = array_column($hectares, 'total_hectares');
    */

    // This query will return the number of members using improved seed in the last 3 months
    /*
    $impSeed = DB::table('group_member_metrics')
            ->join('group_details', 'group_member_metrics.group_details_id', '=', 'group_details.id')
            ->select(DB::raw('COUNT(DISTINCT(group_member_metrics.member_id)) as num_members'))
            ->where('group_member_metrics.improved_seed', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $quarter)
            ->get()->toArray();
    $impSeed = array_column($impSeed, 'num_members');

    // This query will return the number of members using improved storage methods in the last 3 months
    $impStorage = DB::table('group_member_metrics')
            ->join('group_details', 'group_member_metrics.group_details_id', '=', 'group_details.id')
            ->select(DB::raw('COUNT(DISTINCT(group_member_metrics.member_id)) as num_members'))
            ->where('group_member_metrics.improved_storage', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $quarter)
            ->get()->toArray();
    $impStorage = array_column($impStorage, 'num_members');

    // This query will return the number of members using improved practices during the last 3 months
    $impPractices = DB::table('group_member_metrics')
            ->join('group_details', 'group_member_metrics.group_details_id', '=', 'group_details.id')
            ->select(DB::raw('COUNT(DISTINCT(group_member_metrics.member_id)) as num_members'))
            ->where('group_member_metrics.improved_practices', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $quarter)
            ->get()->toArray();
    $impPractices = array_column($impPractices, 'num_members');
*/


    // This query returns the number of members in each risk group based on their ppi scores
    $ppi = DB::table('ppi_scores')
            ->select(DB::raw('sum(case when total_ppi_score > 74 then 1 else 0 end) as num_low_risk,
            sum(case when total_ppi_score > 49 and total_ppi_score < 75 then 1 else 0 end) as num_med_risk,
            sum(case when total_ppi_score > 24 and total_ppi_score < 49 then 1 else 0 end) as num_high_risk,
            sum(case when total_ppi_score >= 0 and total_ppi_score < 25 then 1 else 0 end) as num_xtrm_risk'))
            ->whereDate('report_term_date', '>', $quarter)
            ->get();


    $pillars = DB::table('pillar_members_quarterly')
            ->select('report_term_date', 'num_end_to_end', 'num_nrm', 'num_drr', 'num_ewv')
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->orderBy('report_term_date')
            ->get()->toArray();
    $labels = array_column($pillars, 'report_term_date');
    $numEndtoEnd = array_column($pillars, 'num_end_to_end');
    $numNrm = array_column($pillars, 'num_nrm');
    $numDrr = array_column($pillars, 'num_drr');
    $numEwv = array_column($pillars, 'num_ewv');


    $newThreeQtr =  $threeQuarter->toDateString();
    $newCurr = $current->toDateString();

    // This query shows the number of households involved in each pillar over the past 9 months
    $pillar_one = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('report_term_date', 'SUM(pillar_one) as pillar_one'))
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->groupBy('report_term_date')
            ->get()->toArray();
    $pillar_one = array_column($pillar_one, 'pillar_one');

    $pillar_two = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('report_term_date', 'SUM(pillar_two) as pillar_two'))
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->groupBy('report_term_date')
            ->get()->toArray();
    $pillar_two = array_column($pillar_two, 'pillar_two');

    $pillar_three = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('report_term_date', 'SUM(pillar_three) as pillar_three'))
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->groupBy('report_term_date')
            ->get()->toArray();
    $pillar_three = array_column($pillar_three, 'pillar_three');

    $pillar_four = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('report_term_date', 'SUM(pillar_four) as pillar_four'))
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->groupBy('report_term_date')
            ->get()->toArray();
    $pillar_four = array_column($pillar_four, 'pillar_four');


    // This query returns the number of households at each graduation step for the past 3 months
/*
    \DB::listen(function($gradSteps) {
    var_dump($gradSteps);
});
*/


    $gradSteps = DB::table('members_by_grad_step_by_quarter')
            ->select(DB::raw('num_grad_step, sex, count(distinct(member_id)) as num_members'))
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->groupBy('sex', 'num_grad_step')
            ->get()->toArray();


/*
          echo json_encode($gradSteps) ."<br>";
          exit;
*/


    // This query returns the number of pillars that each household is involved in.
    // Ie - How many households are involved in activities from 2 different pillars, 3 different pillars, etc.
    $pillarsByHousehold = DB::table('pillar_members_count_by_quarter')
            ->select(DB::raw('num_pillars, count(distinct(member_id)) as num_members'))
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->groupBy('num_pillars')
            ->get()->toArray();

/*
    $ppi->map(function($i) {
      return array_values((array)$i);
    });
*/
  //echo json_encode($labels) ."<br>";

    $quarters = array();
    foreach($labels as $label) {
      if(substr($label, 5, 5) == '12-31') {
        $quarters[] .= 'Oct - Dec '. substr($label, 0, 4);
      } elseif(substr($label, 5, 5) == '03-31') {
        $quarters[] .= 'Jan - Mar '. substr($label, 0, 4);
      } elseif(substr($label, 5, 5) == '06-30') {
        $quarters[] .= 'Apr - Jun '. substr($label, 0, 4);
      } else {
        $quarters[] .= 'Jul - Sep '. substr($label, 0, 4);
      }
    }


    //echo json_encode($quarters) ."<br><br>";
    //die;
    /*
    'impSeedTrend' => json_encode($impSeedTrend),
    'impStorageTrend' => json_encode($impStorageTrend),
    'impPracticesTrend' => json_encode($impPracticesTrend),
    */


    $data = array(
      'totalUsers' => $totalMembers,
      'totalFemales' => $totalFemales,
      'totalMales' => $totalMales,
      'totalUnreported' => $totalUnreported,
      'totalChildren' => $totalChildren[0],
      'totalFemaleChildren' => $totalFemaleChildren[0],
      'totalMaleChildren' => $totalMaleChildren[0],
      'newUsers' => $newUsers[0],
    //  'totalSavingsGroups' => $numSavingsGroups[0],
      'totalProducers' => $totalProducers[0],
      'savingsBalance' => $totalSavings[0],
      'ppi' => json_encode($ppi),
      'labels' => json_encode($quarters),
      'endToEnd' => json_encode($numEndtoEnd),
      'nrm' => json_encode($numNrm),
      'drr' => json_encode($numDrr),
      'ewv' => json_encode($numEwv),
      'pillarOne' => json_encode($pillar_one),
      'pillarTwo' => json_encode($pillar_two),
      'pillarThree' => json_encode($pillar_three),
      'pillarFour' => json_encode($pillar_four),
      'gradSteps' => json_encode($gradSteps),
      'pillarsByHousehold' => json_encode($pillarsByHousehold),
    );

/*
    $excelTests = GroupMemberMetrics::select('group_id', DB::raw('count(distinct(member_id)) as members'))
            ->where('improved_seed', '=', '1')
            ->groupBy('group_id')
            ->get();

    $excelTestArray = [];
    $excelTestArray[] = ['Group ID', 'Members Using Improved Seed'];

    foreach($excelTests as $excelTest) {
      $excelTestArray[] = $excelTest->toArray();
    }

    Excel::create('metrics', function($excel) use($excelTestArray) {
      $excel->sheet('Sheet 1', function($sheet) use($excelTestArray) {
        $sheet->fromArray($excelTestArray, null, 'A1', false, false);
      });

    })->store('csv');
    */

    //return view('charts.chartjs')->with('viewer', json_encode($improvedSeed));
    //return view('charts.dashboard')->with('viewer', json_encode($improvedSeed));
    return view('charts.dashboard')->with($data);

  }

  public function pillars() {

    $current = Carbon::now();
    $quarter = Carbon::now();
    $quarter->subMonth(3);
    $half = Carbon::now();
    $half->subMonth(6);
    $threeQuarter = Carbon::now();
    $threeQuarter->subMonth(9);
    $year = Carbon::now();
    $year->subMonth(12);

    // This query gets a trend for all members using improved seeds
    /*
    $impSeedTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.improved_seed', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $threeQuarter)
            ->whereDate('group_details.report_term_date', '<=', $current)
            ->groupBy('group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $labels = array_column($impSeedTrend, 'report_term_date');
    $impSeedTrend = array_column($impSeedTrend, 'members');

    // This query gets a trend for all members using improved storage methods
    $impStorageTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.improved_storage', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $threeQuarter)
            ->whereDate('group_details.report_term_date', '<=', $current)
            ->groupBy('group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $impStorageTrend = array_column($impStorageTrend, 'members');

    // This query gets a trend for all members using improved farming practices
    $impPracticesTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.improved_practices', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $threeQuarter)
            ->whereDate('group_details.report_term_date', '<=', $current)
            ->groupBy('group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $impPracticesTrend = array_column($impPracticesTrend, 'members');

    // This query gets a trend for all members using some form of irrigation
    $impIrrigationTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.hectares_with_irrigation', '>', '0')
            ->whereDate('group_details.report_term_date', '>', $threeQuarter)
            ->whereDate('group_details.report_term_date', '<=', $current)
            ->groupBy('group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $impIrrigationTrend = array_column($impIrrigationTrend, 'members');
    */

    // This query returns the agricultural trends for the past 9 months
    $agTrends = DB::table('ag_trends')
            ->select('report_term_date', 'num_imp_seed', 'num_imp_storage', 'num_imp_practices', 'num_imp_irrigation')
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->orderBy('report_term_date')
            ->get()->toArray();
    $labels = array_column($agTrends, 'report_term_date');
    $impSeedTrend = array_column($agTrends, 'num_imp_seed');
    $impStorageTrend = array_column($agTrends, 'num_imp_storage');
    $impPracticesTrend = array_column($agTrends, 'num_imp_practices');
    $impIrrigationTrend = array_column($agTrends, 'num_imp_irrigation');

    // This query returns the financial trends for the past 9 months
    $finTrends = DB::table('financial_trends')
            ->select('report_term_date', 'num_members', 'num_loans_accessed', 'num_crop_insurance')
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->orderBy('report_term_date')
            ->get()->toArray();
    $groupMembersTrend = array_column($finTrends, 'num_members');
    $loansTrend = array_column($finTrends, 'num_loans_accessed');
    $cropInsTrend = array_column($finTrends, 'num_crop_insurance');


    // This part of the financial queries will have to be on it's own chart, as it will screw
    // up the axes for the rest of the financial data above.
    // This query returns the total balance of all savings group accounts from the last 9 months
    $savings = DB::table('group_details')
            ->select(DB::raw('COUNT(id) as num_groups, SUM(account_balance) as total_savings'))
            ->where('savings_group', '=', '1')
            ->whereDate('report_term_date', '>', $threeQuarter)
            ->whereDate('report_term_date', '<=', $current)
            ->get()->toArray();
    $numSavingsGroups = array_column($savings, 'num_groups');
    $totalSavings = array_column($savings, 'total_savings');

    // Get the number of farmers engaged in project value chains for the last 3 months
    $valueChains = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->join('person', 'person.nrc_number', '=', 'group_member_metrics.member_id')
            ->select('group_details.report_term_date', 'group_details.value_chain', 'person.sex', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->whereDate('group_details.report_term_date', '>', $quarter)
            ->whereDate('group_details.report_term_date', '<=', $current)
            ->groupBy('person.sex', 'group_details.value_chain', 'group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $chainLabels = array_column($valueChains, 'value_chain');
    $chainMembers = array_column($valueChains, 'members');




    $quarters = array();
    foreach($labels as $label) {
      if(substr($label, 5, 5) == '12-31') {
        $quarters[] .= 'Oct - Dec '. substr($label, 0, 4);
      } elseif(substr($label, 5, 5) == '03-31') {
        $quarters[] .= 'Jan - Mar '. substr($label, 0, 4);
      } elseif(substr($label, 5, 5) == '06-30') {
        $quarters[] .= 'Apr - Jun '. substr($label, 0, 4);
      } else {
        $quarters[] .= 'Jul - Sep '. substr($label, 0, 4);
      }
    }

    $data = array(
      'quarters' => json_encode($quarters),
      'impSeedTrend' => json_encode($impSeedTrend),
      'impStorageTrend' => json_encode($impStorageTrend),
      'impPracticesTrend' => json_encode($impPracticesTrend),
      'impIrrigationTrend' => json_encode($impIrrigationTrend),
      'groupMembersTrend' => json_encode($groupMembersTrend),
      'loansTrend' => json_encode($loansTrend),
      'cropInsTrend' => json_encode($cropInsTrend),
      'chainLabels' => json_encode($chainLabels),
      'chainMembers' => json_encode($chainMembers),
    );

    return view('charts.pillars')->with($data);

  }


}
