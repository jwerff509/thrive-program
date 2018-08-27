<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupMemberMetrics;
use App\Person;
use App\Group;
use App\GroupDetails;
use App\AreaProgram;
use App\Zone;
use App\Village;
use App\GroupSurvey;
use App\ExcelExportGroup;
use App\ExcelExportIndividual;
use App\ProgramTargets;
use App\ProgramMeasures;
use App\Country;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use Excel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DashboardController extends Controller
{

  public function countryDashboard() {

    $id = '1';

    $temp = Country::select('name')->where('country_id', '=', $id)->first();

    $country = $temp->name;

    $lopTargets = ProgramTargets::where('country_id', '=', $id)->get();
    $lopActualsTemp = ProgramMeasures::where('country_id', '=', $id)->orderBy('quarter', 'desc')->take(4)->get()->toArray();

    $lopActuals = array_reverse($lopActualsTemp);

    foreach($lopTargets as $lopTarget) {
      $impSeedTarget = $lopTarget->improved_seed_target;
      $impStorageTarget = $lopTarget->improved_storage_target;
      $impToolsTarget = $lopTarget->improved_tools_target;
      $numWithIrrigationTarget = $lopTarget->farmers_with_irrigation_target;
      $increasedYieldTarget = $lopTarget->increase_in_yield_per_hectare_target;
      $haWithIrrigationTarget = $lopTarget->ha_with_irrigation_target;
      $dirBensTarget = $lopTarget->direct_beneficiaries_target;
      $numChildrenTarget = $lopTarget->num_children_target;
      $numWomenTarget = $lopTarget->num_women_target;
      $numHHMemTarget = $lopTarget->num_hh_members_target;
    }

    // Create an array of the actual values, by quarter
    $labels = array_column($lopActuals, 'quarter');
    $impSeedActual = array_column($lopActuals, 'improved_seed_actual');
    $impStorageActual = array_column($lopActuals, 'improved_storage_actual');
    $impToolsActual = array_column($lopActuals, 'improved_tools_actual');
    $numWithIrrigationActual = array_column($lopActuals, 'farmers_with_irrigation_actual');
    $increasedYieldActual = array_column($lopActuals, 'increase_in_yield_per_hectare_actual');
    $haWithIrrigationActual = array_column($lopActuals, 'ha_with_irrigation_actual');

    // Probably want to keep these at the end in order to keep all of the categories grouped together.
    $dirBensActual = array_column($lopActuals, 'direct_beneficiaries_actual');
    $numChildrenActual = array_column($lopActuals, 'num_children_actual');
    $numWomenActual = array_column($lopActuals, 'num_women_actual');
    $numHHMemActual = array_column($lopActuals, 'num_hh_members_actual');

    // Get some totals for the progress bars
    $impSeedTotal = end($impSeedActual);
    $impStorageTotal = end($impStorageActual);
    $impToolsTotal = end($impToolsActual);
    $numWithIrrigationTotal = end($numWithIrrigationActual);
    $increasedYieldTotal = end($increasedYieldActual);
    $haWithIrrigationTotal = end($haWithIrrigationActual);
    $dirBensTotal = end($dirBensActual);
    $numChildrenTotal = end($numChildrenActual);
    $numWomenTotal = end($numWomenActual);
    $numHHMemTotal = end($numHHMemActual);

    // Get the colors for the progress Bars
    $seedBarColor = $this->barColor($impSeedTotal, $impSeedTarget);

/*
    $impSeedLopTarget = '9800';
    $impStorageLopTarget = '9800';
    $impToolsLopTarget = '9800';
    $numUsingIrrigationLopTarget = '9800';
    $increaseYieldLopTarget = '100';
    $haWithIrrigationLopTarget = '400';
    $dirBensLopTarget = '15700';
    $numChildrenLopTarget = '46600';
    $numWomenLopTarget = '8164';
    $numHHMemLopTarget = '78500';

    $impSeedTotal = '1684';
    $impStorageTotal = '0';
    $impToolsTotal = '1684';
    $numUsingIrrigationTotal = '1684';
    $increaseYieldTotal = '0';
    $haWithIrrigationTotal = '90';
    $dirBensTotal = '14031';
    $numChildrenTotal = '34285';
    $numWomenTotal = '5805';
    $numHHMemTotal = '71739';
*/
    $data = array(
      'country' => $country,
      'labels' => json_encode($labels),
      'impSeedTarget' => $impSeedTarget,
      'impStorageTarget' => $impStorageTarget,
      'impToolsTarget' => $impToolsTarget,
      'numWithIrrigationTarget' => $numWithIrrigationTarget,
      'increasedYieldTarget' => $increasedYieldTarget,
      'haWithIrrigationTarget' => $haWithIrrigationTarget,
      'dirBensTarget' => $dirBensTarget,
      'numChildrenTarget' => $numChildrenTarget,
      'numWomenTarget' => $numWomenTarget,
      'numHHMemTarget' => $numHHMemTarget,
      'impSeedActual' => json_encode($impSeedActual),
      'impStorageActual' => json_encode($impStorageActual),
      'impToolsActual' => json_encode($impToolsActual),
      'numWithIrrigationActual' => json_encode($numWithIrrigationActual),
      'increasedYieldActual' => json_encode($increasedYieldActual),
      'haWithIrrigationActual' => json_encode($haWithIrrigationActual),
      'dirBensActual' => json_encode($dirBensActual),
      'numChildrenActual' => json_encode($numChildrenActual),
      'numWomenActual' => json_encode($numWomenActual),
      'numHHMemActual' => json_encode($numHHMemActual),
      'impSeedTotal' => $impSeedTotal,
      'seedBarColor' => $seedBarColor,
      'impStorageTotal' => $impStorageTotal,
      'impToolsTotal' => $impToolsTotal,
      'numWithIrrigationTotal' => $numWithIrrigationTotal,
      'increasedYieldTotal' => $increasedYieldTotal,
      'haWithIrrigationTotal' => $haWithIrrigationTotal,
      'dirBensTotal' => $dirBensTotal,
      'numChildrenTotal' => $numChildrenTotal,
      'numWomenTotal' => $numWomenTotal,
      'numHHMemTotal' => $numHHMemTotal,
    );

    return view('charts.countryDb')->with($data);

  }


  public function barColor($actual, $goal) {

    $progress = $actual/$goal*100;

    switch($progress) {
      case $progress < 26:
        $barColor = 'progress-bar-red';
        break;
      case $progress < 51:
        $barColor = 'progress-bar-yellow';
        break;
      case $progress < 76:
        $barColor = 'progress-bar-aqua';
        break;
      case $progress < 101:
        $barColor = 'progress-bar-green';
        break;
      default:
        $barColor = 'progress-bar-red';
        break;
    }

    return $barColor;

  }




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
    // 3/27/18 - the four counts below are all working and have been tested.
    $totalMembers = Person::count();
    $totalFemales = Person::where('sex', 'Female')->count();
    $totalMales = Person::where('sex', 'Male')->count();
    $totalUnreported = Person::whereNull('sex')->orWhere('sex','=','')->orWhere('sex','=','Unknown')->count();

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
    $newUsers = GroupMemberMetrics::whereDate('created_at', '>', $quarter)->distinct('nrc_number')->count();

    // This query returns the total balance of all savings group accounts from the last 3 months
    // 2/21/2018 - This query has been edited because the data collection method changed
    // and we are no longer tracking if the group is a savings group, we are only tracking the
    // number of savings group members, so now we check to see if there are any members of
    // a savings group, and if there are we count it as a group and sum up the balance.
    // This may need to be edited further, as it probably needs to be grouped by each group id
    $savingsGroups = GroupSurvey::where('num_savings_group_members', '>', '0')->whereDate('created_at', '>=', $quarter)->whereDate('created_at', '<=', $current)->count();
    $savingsBalance = GroupSurvey::where('num_savings_group_members', '>', '0')->whereDate('created_at', '>=', $quarter)->whereDate('created_at', '<=', $current)->sum('account_balance');

    // This query returns the total count of all producers groups added in the last quarter
    $producersGroups = GroupSurvey::where('group_type', '=', 'Producers Group')->whereDate('created_at', '>=', $quarter)->whereDate('created_at', '<=', $current)->count();

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
            //->whereDate('reporting_term', '>', $quarter)
            ->get();


    $pillars = DB::table('pillar_members_quarterly')
            ->select('description', 'num_end_to_end', 'num_nrm', 'num_drr', 'num_ewv')
            //->whereDate('report_term_date', '>', $threeQuarter)
            //->whereDate('report_term_date', '<=', $current)
            ->orderBy('description')
            ->get()->toArray();
    $labels = array_column($pillars, 'description');
    $numEndtoEnd = array_column($pillars, 'num_end_to_end');
    $numNrm = array_column($pillars, 'num_nrm');
    $numDrr = array_column($pillars, 'num_drr');
    $numEwv = array_column($pillars, 'num_ewv');

    $newThreeQtr =  $threeQuarter->toDateString();
    $newCurr = $current->toDateString();


    // This query shows the number of households involved in each pillar over the past 9 months
    $pillar_one = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('reporting_term', 'SUM(pillar_one) as pillar_one'))
            ->whereDate('start_date', '>', $newThreeQtr)
            ->whereDate('end_date', '<=', $newCurr)
            ->groupBy('reporting_term')
            ->get()->toArray();
    $pillar_one = array_column($pillar_one, 'pillar_one');

    //var_dump($pillar_one);
    //exit;

    /* Original below
    $pillar_two = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('reporting_term', 'SUM(pillar_two) as pillar_two'))
            ->whereDate('reporting_term', '>', $threeQuarter)
            ->whereDate('reporting_term', '<=', $current)
            ->groupBy('reporting_term')
            ->get()->toArray();
    */
    $pillar_two = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('reporting_term', 'SUM(pillar_two) as pillar_two'))
            ->whereDate('start_date', '>', $threeQuarter)
            ->whereDate('end_date', '<=', $current)
            ->groupBy('reporting_term')
            ->get()->toArray();
    $pillar_two = array_column($pillar_two, 'pillar_two');

    $pillar_three = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('reporting_term', 'SUM(pillar_three) as pillar_three'))
            ->whereDate('start_date', '>', $threeQuarter)
            ->whereDate('end_date', '<=', $current)
            ->groupBy('reporting_term')
            ->get()->toArray();
    $pillar_three = array_column($pillar_three, 'pillar_three');

    $pillar_four = DB::table('members_per_pillar_by_quarter')
            ->select(DB::Raw('reporting_term', 'SUM(pillar_four) as pillar_four'))
            ->whereDate('start_date', '>', $threeQuarter)
            ->whereDate('end_date', '<=', $current)
            ->groupBy('reporting_term')
            ->get()->toArray();
    $pillar_four = array_column($pillar_four, 'pillar_four');


    // This query returns the number of households at each graduation step for the past 3 months
    $gradSteps = DB::table('members_by_grad_step_by_quarter')
            ->select(DB::raw('num_grad_step, sex, count(distinct(nrc_number)) as num_members'))
            ->whereDate('start_date', '>', $threeQuarter)
            ->whereDate('end_date', '<=', $current)
            ->groupBy('sex', 'num_grad_step')
            ->get()->toArray();



    // This query returns the number of pillars that each household is involved in.
    // Ie - How many households are involved in activities from 2 different pillars, 3 different pillars, etc.
    $pillarsByHousehold = DB::table('pillar_members_count_by_quarter')
            ->select(DB::raw('num_pillars, count(distinct(nrc_number)) as num_members'))
            ->whereDate('start_date', '>', $threeQuarter)
            ->whereDate('end_date', '<=', $current)
            ->groupBy('num_pillars')
            ->get()->toArray();

/*
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
*/

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
      'newUsers' => $newUsers,
      'totalSavingsGroups' => $savingsGroups,
      'totalProducers' => $producersGroups,
      'savingsBalance' => $savingsBalance,
      'ppi' => json_encode($ppi),

      //'labels' => json_encode($quarters),
      'labels' => json_encode($labels),

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
            ->select('description', 'year', 'num_imp_seed', 'num_imp_storage', 'num_imp_practices', 'num_imp_irrigation')
            // ->whereDate('reporting_term', '>', $threeQuarter)
            //->whereDate('reporting_term', '<=', $current)
            //->orderBy('reporting_term')
            ->get()->toArray();
    $labels = array_column($agTrends, 'description');
    $impSeedTrend = array_column($agTrends, 'num_imp_seed');
    $impStorageTrend = array_column($agTrends, 'num_imp_storage');
    $impPracticesTrend = array_column($agTrends, 'num_imp_practices');
    $impIrrigationTrend = array_column($agTrends, 'num_imp_irrigation');

    // This query returns the financial trends for the past 9 months
    $finTrends = DB::table('financial_trends')
            ->select('reporting_term', 'num_members', 'num_loans_accessed', 'num_crop_insurance')
            ->whereDate('reporting_term', '>', $threeQuarter)
            ->whereDate('reporting_term', '<=', $current)
            ->orderBy('reporting_term')
            ->get()->toArray();
    $groupMembersTrend = array_column($finTrends, 'num_members');
    $loansTrend = array_column($finTrends, 'num_loans_accessed');
    $cropInsTrend = array_column($finTrends, 'num_crop_insurance');


    // This part of the financial queries will have to be on it's own chart, as it will screw
    // up the axes for the rest of the financial data above.
    // This query returns the total balance of all savings group accounts from the last 9 months
    $savings = DB::table('group_surveys')
            ->select(DB::raw('COUNT(group_id) as num_groups, SUM(account_balance) as total_savings'))
            ->where('num_savings_group_members', '>', '0')
            ->whereDate('reporting_term', '>', $threeQuarter)
            ->whereDate('reporting_term', '<=', $current)
            ->get()->toArray();
    $numSavingsGroups = array_column($savings, 'num_groups');
    $totalSavings = array_column($savings, 'total_savings');

    // Get the number of farmers engaged in project value chains for the last 3 months
    /*  2/22/2018 - JV.  This query no longer functions due to a change in the way we are
    **  recording the data. We need to revisit this indicator and change the criteria or
    **  come up with a different indicator.
    */
    $valueChains = DB::table('group_surveys')
            ->join('group_survey_members', 'group_surveys.id', '=', 'group_survey_members.group_survey_id')
            ->join('value_chain', 'group_surveys.primary_value_chain', '=', 'value_chain.id')
            ->join('groups', 'group_surveys.group_id', '=', 'groups.group_id')
            ->select('value_chain.description', 'groups.name', DB::raw('count(distinct(group_survey_members.nrc_number)) as members'))
            ->whereDate('group_surveys.created_at', '>', $quarter)
            ->whereDate('group_surveys.created_at', '<=', $current)
            ->groupBy('value_chain.description', 'groups.name')
            ->get()->toArray();
    $chainLabels = array_column($valueChains, 'description');
    $groupNames = array_column($valueChains, 'name');
    $chainMembers = array_column($valueChains, 'members');

/*
    echo json_encode($chainLabels);
    exit;
*/



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





  public function progress_reports() {

    $current = Carbon::now();
    $quarter = Carbon::now();
    $quarter->subMonth(3);
    $half = Carbon::now();
    $half->subMonth(6);
    $threeQuarter = Carbon::now();
    $threeQuarter->subMonth(9);
    $year = Carbon::now();
    $year->subMonth(12);

    // Return the total number of surveys entered in the last 3 months
    $totalSurveys = GroupSurvey::whereDate('created_at', '>', $quarter)
        ->whereDate('created_at', '<=', $current)
        ->count();

    // Return the total number of members that are actively saving in a savings group
    $totalSGMembers = DB::table('group_surveys')
        //->select('group_id', 'num_savings_group_members')
        ->select('num_savings_group_members')
        ->whereDate('created_at', '>', $quarter)
        ->whereDate('created_at', '<=', $current)
        //->groupBy('group_id')
        ->sum('num_savings_group_members');

    // This query returns various details about the groups that have been entered for the last quarter.
    $memEntered = DB::table('members_entered_by_group')
        ->whereDate('created_at', '>', $quarter)
        ->whereDate('created_at', '<=', $current)
        ->paginate(5);

    $groups = Group::select('name', 'group_id')->orderBy('name')->get()->toArray();
    $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();
    $zones = Zone::pluck('name', 'zone_id')->all();
    $villages = Village::pluck('name', 'village_id')->all();


    // Return the number of members by soil conservation technique
    /*
    $soilCons = DB::table('members_by_soil_cons')
            ->select('General Techniques', 'Ripping', 'Mulching', 'Composting/Liming', 'Crop Rotation', '3 or More Techniques')
            ->get()->toArray();
            var_dump($soilCons);
            echo "<br><br>". json_encode($soilCons);
            exit;
    $soilConsLabels = array_keys($soilCons[0]);
    $groupNames = array_column($valueChains, 'name');
    $chainMembers = array_column($valueChains, 'members');

    var_dump($soilConsLabels);
    exit;
    */


    return view('charts.progress_reports', compact('groups', 'areaPrograms', 'zones', 'villages', 'memEntered', 'areaPrograms', 'totalSurveys', 'totalSGMembers'));

  }

  // Export the data to an Excel file
  public function export() {
    //require_once __DIR__ . '/../../src/Bootstrap.php';

    $spreadsheet = new Spreadsheet();

    // Set document properties
    $spreadsheet->getProperties()->setCreator('THRIVE Program')
        ->setLastModifiedBy('THRIVE Program')
        ->setTitle('THRIVE Program Database Export');

    // Get some data to put in the spreadsheet
    $groupData = ExcelExportGroup::all()->toArray();
    $individualData = ExcelExportIndividual::all()->toArray();

    if(count($groupData) == 0 && count($individualData) == 0) {
      session()->flash('alert-danger', 'No Data to Download');
      return Redirect::back();
    }

    if(count($groupData) > 0) {

      $columnTitles = array_keys($groupData[0]);

      $spreadsheet->setActiveSheetIndex(0)
          ->fromArray(
            $columnTitles,
            NULL,
            'A1'
          );

      $spreadsheet->setActiveSheetIndex(0)
          ->fromArray(
            $groupData,
            NULL,
            'A2'
          );

      // Rename worksheet
      $spreadsheet->getActiveSheet()->setTitle('Surveys With Member List');

    }

    // Create a second sheet to hold the surveys with individual data.
    if(count($individualData) > 0) {

      // Create a new sheet to hold the individual survey data
      $indWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Surveys With Individual Data');

      // Add the new sheet to the existing Spreadsheet
      $spreadsheet->addSheet($indWorkSheet, 1);

      $indColumnTitles = array_keys($individualData[0]);

      $spreadsheet->setActiveSheetIndex(1)
          ->fromArray(
            $indColumnTitles,
            NULL,
            'A1'
          );

      $spreadsheet->setActiveSheetIndex(1)
          ->fromArray(
            $individualData,
            NULL,
            'A2'
          );

    }

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xls)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="01simple.xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('php://output');
    exit;

  }

}
