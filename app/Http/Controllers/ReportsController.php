<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupMemberMetrics;
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


    // This query gets a trend for all members using improved seeds
    /*
    $impSeedTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_desc', 'group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.improved_seed', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $current->subMonth(9))
            ->groupBy('group_details.report_term_desc', 'group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $labels = array_column($impSeedTrend, 'report_term_desc');
    $impSeedTrend = array_column($impSeedTrend, 'members');

    // This query gets a trend for all members using improved storage methods
    $impStorageTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_desc', 'group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.improved_storage', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $current->subMonth(9))
            ->groupBy('group_details.report_term_desc', 'group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $impStorageTrend = array_column($impStorageTrend, 'members');

    // This query gets a trend for all members using improved farming practices
    $impPracticesTrend = DB::table('group_details')
            ->join('group_member_metrics', 'group_details.id', '=', 'group_member_metrics.group_details_id')
            ->select('group_details.report_term_desc', 'group_details.report_term_date', DB::raw('count(distinct(group_member_metrics.member_id)) as members'))
            ->where('group_member_metrics.improved_practices', '=', '1')
            ->whereDate('group_details.report_term_date', '>', $current->subMonth(9))
            ->groupBy('group_details.report_term_desc', 'group_details.report_term_date')
            ->orderBy('group_details.report_term_date')
            ->get()->toArray();
    $impPracticesTrend = array_column($impPracticesTrend, 'members');
    */
/*
    echo "Seed Trend: ". json_encode($impSeedTrend) ."<br><br>";
    echo "Storage Trend: ". json_encode($impStorageTrend) ."<br><br>";
    echo "Practices Trend: ". json_encode($impPracticesTrend) ."<br><br>";
    die;
*/

    // This query gets the total number of members in the system (all time)
    $totalMembers = DB::table('group_member_metrics')
            ->select(DB::raw('COUNT(DISTINCT(member_id)) as total_members'))
            ->get()->toArray();
    $totalMembers = array_column($totalMembers, 'total_members');

    // This query gets the number of members that were registered in the last 3 months
    $newUsers = DB::table('group_member_metrics')
            ->select(DB::raw('COUNT(DISTINCT(member_id)) as new_members'))
            ->whereDate('created_at', '>', $quarter)
            ->get()->toArray();
    $newUsers = array_column($newUsers, 'new_members');

    // This query returns the total balance of all savings group accounts from the last 3 months
    $savings = DB::table('group_details')
            ->select(DB::raw('COUNT(id) as num_groups, SUM(account_balance) as total_savings'))
            ->where('savings_group', '=', '1')
            ->whereDate('report_term_date', '>', $quarter)
            ->get()->toArray();
    $numSavingsGroups = array_column($savings, 'num_groups');
    $totalSavings = array_column($savings, 'total_savings');

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
        $quarters[] .= 'Jul - Sep '. substr($lable, 0, 4);
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

      'totalUsers' => $totalMembers[0],
      'newUsers' => $newUsers[0],
      'totalSavingsGroups' => $numSavingsGroups[0],
      'totalProducers' => $totalProducers[0],
      'savingsBalance' => $totalSavings[0],
      'impSeed' => json_encode($impSeed),
      'impStorage' => json_encode($impStorage),
      'impPractices' => json_encode($impPractices),
      'ppi' => json_encode($ppi),
      'labels' => json_encode($quarters),
      'endToEnd' => $numEndtoEnd[0],
      'nrm' => $numNrm[0],
      'drr' => $numDrr[0],
      'ewv' => $numEwv[0]
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


}
