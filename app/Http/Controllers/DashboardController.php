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

  public function countryIndex() {

    $countries = Country::all();
    return view('charts.country_index',compact('countries', $countries));

  }

  public function countryDashboard($id) {

    //$id = '1';

    $temp = Country::select('name')->where('country_id', '=', $id)->first();

    $country = $temp->name;

    $countries = Country::pluck('name', 'country_id')->all();
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
      $num_savings_groups_target = $lopTarget->num_savings_groups_target;
      $num_savings_group_members_target = $lopTarget->num_savings_group_members_target;
      $savings_groups_total_balance_target = $lopTarget->savings_groups_total_balance_target;
      $members_with_vf_loan_target = $lopTarget->members_with_vf_loan_target;
      $farmers_with_vc_ins_target = $lopTarget->farmers_with_vc_ins_target;
      $num_producers_groups_target = $lopTarget->num_producers_groups_target;
      $num_producers_group_members_target = $lopTarget->num_producers_group_members_target;
      $num_prod_groups_sell_vc_product_target = $lopTarget->num_prod_groups_sell_vc_product_target;
      $numPgLocalMarketsTarget = $lopTarget->num_prod_groups_local_markets_target;
      $num_prod_groups_expanded_markets_target = $lopTarget->num_prod_groups_expanded_markets_target;
      $hectares_reclaimed_for_ag_target = $lopTarget->hectares_reclaimed_for_ag_target;
      $hectares_farmed_soil_water_cons_target = $lopTarget->hectares_farmed_soil_water_cons_target;
      $farmers_using_water_catchment_target = $lopTarget->farmers_using_water_catchment_target;
      $comm_watershed_rehab_target = $lopTarget->comm_watershed_rehab_target;
      $trees_planted_target = $lopTarget->trees_planted_target;
      $members_with_emer_savings_target = $lopTarget->members_with_emer_savings_target;
      $farmers_using_ews_target = $lopTarget->farmers_using_ews_target;
      $members_received_ewv_training_target = $lopTarget->members_received_ewv_training_target;
      $ewv_trainees_attest_value_trans_target = $lopTarget->ewv_trainees_attest_value_trans_target;
      $faith_leaders_in_ewv_training_target = $lopTarget->faith_leaders_in_ewv_training_target;
      $groups_undertaking_political_rep_target = $lopTarget->groups_undertaking_political_rep_target;
      $children_given_care_by_groups_target = $lopTarget->children_given_care_by_groups_target;
      $unique_hh_inc_sources_target = $lopTarget->unique_hh_inc_sources_target;
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
    $num_savings_groups_actual = array_column($lopActuals, 'num_savings_groups_actual');
    $num_savings_group_members_actual = array_column($lopActuals, 'num_savings_group_members_actual');
    $savings_groups_total_balance_actual = array_column($lopActuals, 'savings_groups_total_balance_actual');
    $members_with_vf_loan_actual = array_column($lopActuals, 'members_with_vf_loan_actual');
    $farmers_with_vc_ins_actual = array_column($lopActuals, 'farmers_with_vc_ins_actual');
    $num_producers_groups_actual = array_column($lopActuals, 'num_producers_groups_actual');
    $num_producers_group_members_actual = array_column($lopActuals, 'num_producers_group_members_actual');
    $num_prod_groups_sell_vc_product_actual = array_column($lopActuals, 'num_prod_groups_sell_vc_product_actual');
    $num_prod_groups_local_markets_actual = array_column($lopActuals, 'num_prod_groups_local_markets_actual');
    $num_prod_groups_expanded_markets_actual = array_column($lopActuals, 'num_prod_groups_expanded_markets_actual');
    $hectares_reclaimed_for_ag_actual = array_column($lopActuals, 'hectares_reclaimed_for_ag_actual');
    $hectares_farmed_soil_water_cons_actual = array_column($lopActuals, 'hectares_farmed_soil_water_cons_actual');
    $farmers_using_water_catchment_actual = array_column($lopActuals, 'farmers_using_water_catchment_actual');
    $comm_watershed_rehab_actual = array_column($lopActuals, 'comm_watershed_rehab_actual');
    $trees_planted_actual = array_column($lopActuals, 'trees_planted_actual');
    $members_with_emer_savings_actual = array_column($lopActuals, 'members_with_emer_savings_actual');
    $farmers_using_ews_actual = array_column($lopActuals, 'farmers_using_ews_actual');
    $members_received_ewv_training_actual = array_column($lopActuals, 'members_received_ewv_training_actual');
    $ewv_trainees_attest_value_trans_actual = array_column($lopActuals, 'ewv_trainees_attest_value_trans_actual');
    $faith_leaders_in_ewv_training_actual = array_column($lopActuals, 'faith_leaders_in_ewv_training_actual');
    $groups_undertaking_political_rep_actual = array_column($lopActuals, 'groups_undertaking_political_rep_actual');
    $children_given_care_by_groups_actual = array_column($lopActuals, 'children_given_care_by_groups_actual');
    $unique_hh_inc_sources_actual = array_column($lopActuals, 'unique_hh_inc_sources_actual');
    $dirBensActual = array_column($lopActuals, 'direct_beneficiaries_actual');
    $numChildrenActual = array_column($lopActuals, 'num_children_actual');
    $numWomenActual = array_column($lopActuals, 'num_women_actual');
    $numHHMemActual = array_column($lopActuals, 'num_hh_members_actual');

    // Get the totals for the progress bars
    $impSeedTotal = end($impSeedActual);
    $impStorageTotal = end($impStorageActual);
    $impToolsTotal = end($impToolsActual);
    $numWithIrrigationTotal = end($numWithIrrigationActual);
    $increasedYieldTotal = end($increasedYieldActual);
    $haWithIrrigationTotal = end($haWithIrrigationActual);
    $numSGTotal = end($num_savings_groups_actual);
    $numSGMemTotal = end($num_savings_group_members_actual);
    $sgBalTotal = end($savings_groups_total_balance_actual);
    $memVFLoanTotal = end($members_with_vf_loan_actual);
    $farmersVCInsTotal = end($farmers_with_vc_ins_actual);
    $numPGTotal = end($num_producers_groups_actual);
    $numPGMemTotal = end($num_producers_group_members_actual);
    $numPGSellVCProdTotal = end($num_prod_groups_sell_vc_product_actual);
    $numPGSellLocalTotal = end($num_prod_groups_local_markets_actual);
    $numPGSellExpandedTotal = end($num_prod_groups_expanded_markets_actual);
    $haReclaimedAgTotal = end($hectares_reclaimed_for_ag_actual);
    $haFarmedSoilConsTotal = end($hectares_farmed_soil_water_cons_actual);
    $numUsingWaterCatchmentTotal = end($farmers_using_water_catchment_actual);
    $commWatershedRehabTotal = end($comm_watershed_rehab_actual);
    $treesPlantedTotal = end($trees_planted_actual);
    $memWithEmerSavingsTotal = end($members_with_emer_savings_actual);
    $numUsingEwsTotal = end($farmers_using_ews_actual);
    $numReceivedEwvTrainingTotal = end($members_received_ewv_training_actual);
    $ewvTraineesAttestValueTransTotal = end($ewv_trainees_attest_value_trans_actual);
    $faithLeadersEwvTrainingTotal = end($faith_leaders_in_ewv_training_actual);
    $groupsPoliticalRepTotal = end($groups_undertaking_political_rep_actual);
    $childrenCaredByGroupsTotal = end($children_given_care_by_groups_actual);
    $uniqueHhIncSourcestotal = end($unique_hh_inc_sources_actual);
    $dirBensTotal = end($dirBensActual);
    $numChildrenTotal = end($numChildrenActual);
    $numWomenTotal = end($numWomenActual);
    $numHHMemTotal = end($numHHMemActual);

    // Get the width and colors for the progress bars
    $seedBarWidth = $this->barWidth($impSeedTotal, $impSeedTarget);
    $seedBarColor = $this->barColor($impSeedTotal, $impSeedTarget);
    $storageBarWidth = $this->barWidth($impStorageTotal, $impStorageTarget);
    $storageBarColor = $this->barColor($impStorageTotal, $impStorageTarget);
    $toolBarWidth = $this->barWidth($impToolsTotal, $impToolsTarget);
    $toolBarColor = $this->barColor($impToolsTotal, $impToolsTarget);
    $numWithIrrBarWidth = $this->barWidth($numWithIrrigationTotal, $numWithIrrigationTarget);
    $numWithIrrBarColor = $this->barColor($numWithIrrigationTotal, $numWithIrrigationTarget);
    $incYieldBarWidth = $this->barWidth($increasedYieldTotal, $increasedYieldTarget);
    $incYieldBarColor = $this->barColor($increasedYieldTotal, $increasedYieldTarget);
    $haIrrBarWidth = $this->barWidth($haWithIrrigationTotal, $haWithIrrigationTarget);
    $haIrrBarColor = $this->barColor($haWithIrrigationTotal, $haWithIrrigationTarget);
    $sgBarWidth = $this->barWidth($numSGTotal, $num_savings_groups_target);
    $sgBarColor = $this->barColor($numSGTotal, $num_savings_groups_target);
    $sgMemBarWidth = $this->barWidth($numSGMemTotal, $num_savings_group_members_target);
    $sgMemBarColor = $this->barColor($numSGMemTotal, $num_savings_group_members_target);
    $sgBalBarWidth = $this->barWidth($sgBalTotal, $savings_groups_total_balance_target);
    $sgBalBarColor = $this->barColor($sgBalTotal, $savings_groups_total_balance_target);
    $memVFLoanBarWidth = $this->barWidth($memVFLoanTotal, $members_with_vf_loan_target);
    $memVFLoanBarcolor = $this->barColor($memVFLoanTotal, $members_with_vf_loan_target);
    $farmVCInsBarWidth = $this->barWidth($farmersVCInsTotal, $farmers_with_vc_ins_target);
    $farmVCInsBarColor = $this->barColor($farmersVCInsTotal, $farmers_with_vc_ins_target);
    $pgBarWidth = $this->barWidth($numPGTotal, $num_producers_groups_target);
    $pgBarColor = $this->barColor($numPGTotal, $num_producers_groups_target);
    $numPgMemBarWidth = $this->barWidth($numPGMemTotal, $num_producers_group_members_target);
    $numPgMemBarColor = $this->barColor($numPGMemTotal, $num_producers_group_members_target);
    $numPgSellVcBarWidth = $this->barWidth($numPGSellVCProdTotal, $num_prod_groups_sell_vc_product_target);
    $numPgSellVcBarColor = $this->barColor($numPGSellVCProdTotal, $num_prod_groups_sell_vc_product_target);
    $numPgLocalBarWidth = $this->barWidth($numPGSellLocalTotal, $numPgLocalMarketsTarget);
    $numPgLocalBarcolor = $this->barColor($numPGSellLocalTotal, $numPgLocalMarketsTarget);
    $numPgExpandedBarWidth = $this->barWidth($numPGSellExpandedTotal, $num_prod_groups_expanded_markets_target);
    $numPgExpandedBarColor = $this->barColor($numPGSellExpandedTotal, $num_prod_groups_expanded_markets_target);
    $haRecAgBarWidth = $this->barWidth($haReclaimedAgTotal, $hectares_reclaimed_for_ag_target);
    $haRecAgBarcolor = $this->barColor($haReclaimedAgTotal, $hectares_reclaimed_for_ag_target);
    $haSoilConsBarWidth = $this->barWidth($haFarmedSoilConsTotal, $hectares_farmed_soil_water_cons_target);
    $haSoilConsBarColor = $this->barColor($haFarmedSoilConsTotal, $hectares_farmed_soil_water_cons_target);
    $numWaterCatchBarWidth = $this->barWidth($numUsingWaterCatchmentTotal, $farmers_using_water_catchment_target);
    $numWaterCatchBarColor = $this->barColor($numUsingWaterCatchmentTotal, $farmers_using_water_catchment_target);
    $commWatershedBarWidth = $this->barWidth($commWatershedRehabTotal, $comm_watershed_rehab_target);
    $commWatershedBarColor = $this->barColor($commWatershedRehabTotal, $comm_watershed_rehab_target);
    $treesPlantedBarWidth = $this->barWidth($treesPlantedTotal, $trees_planted_target);
    $treesPlantedBarColor = $this->barColor($treesPlantedTotal, $trees_planted_target);
    $memEmerSavingsBarWidth = $this->barWidth($memWithEmerSavingsTotal, $members_with_emer_savings_target);
    $memEmerSavingsBarColor = $this->barColor($memWithEmerSavingsTotal, $members_with_emer_savings_target);
    $numEwsBarWidth = $this->barWidth($numUsingEwsTotal, $farmers_using_ews_target);
    $numEwsBarColor = $this->barColor($numUsingEwsTotal, $farmers_using_ews_target);
    $numEwvTrainingBarWidth = $this->barWidth($numReceivedEwvTrainingTotal, $members_received_ewv_training_target);
    $numEwvTrainingBarColor = $this->barColor($numReceivedEwvTrainingTotal, $members_received_ewv_training_target);
    $numValueTransBarWidth = $this->barWidth($ewvTraineesAttestValueTransTotal, $ewv_trainees_attest_value_trans_target);
    $numValueTransBarColor = $this->barColor($ewvTraineesAttestValueTransTotal, $ewv_trainees_attest_value_trans_target);
    $faithLeadersEwvBarWidth = $this->barWidth($faithLeadersEwvTrainingTotal, $faith_leaders_in_ewv_training_target);
    $faithLeadersEwvBarColor = $this->barColor($faithLeadersEwvTrainingTotal, $faith_leaders_in_ewv_training_target);
    $groupsPoliticalRepBarWidth = $this->barWidth($groupsPoliticalRepTotal, $groups_undertaking_political_rep_target);
    $groupsPoliticalRepBarColor = $this->barColor($groupsPoliticalRepTotal, $groups_undertaking_political_rep_target);
    $childCareByGroupsBarWidth = $this->barWidth($childrenCaredByGroupsTotal, $children_given_care_by_groups_target);
    $childCareByGroupsBarColor = $this->barColor($childrenCaredByGroupsTotal, $children_given_care_by_groups_target);
    $hhIncSourcesBarWidth = $this->barWidth($uniqueHhIncSourcestotal, $unique_hh_inc_sources_target);
    $hhIncSourcesBarColor = $this->barColor($uniqueHhIncSourcestotal, $unique_hh_inc_sources_target);
    $dirBensBarWidth = $this->barWidth($dirBensTotal, $dirBensTarget);
    $dirBensBarColor = $this->barColor($dirBensTotal, $dirBensTarget);
    $numChildrenBarWidth = $this->barWidth($numChildrenTotal, $numChildrenTarget);
    $numChildrenBarColor = $this->barColor($numChildrenTotal, $numChildrenTarget);
    $numWomenBarWidth = $this->barWidth($numWomenTotal, $numWomenTarget);
    $numWomenBarColor = $this->barColor($numWomenTotal, $numWomenTarget);
    $numHhBarWidth = $this->barWidth($numHHMemTotal, $numHHMemTarget);
    $numHhBarColor = $this->barColor($numHHMemTotal, $numHHMemTarget);

    $data = array(
      'country' => $country,
      'countries' => $countries,
      'labels' => json_encode($labels),
      // Targets
      'impSeedTarget' => $impSeedTarget,
      'impStorageTarget' => $impStorageTarget,
      'impToolsTarget' => $impToolsTarget,
      'numWithIrrigationTarget' => $numWithIrrigationTarget,
      'increasedYieldTarget' => $increasedYieldTarget,
      'haWithIrrigationTarget' => $haWithIrrigationTarget,
      'num_savings_groups_target' => $num_savings_groups_target,
      'num_savings_group_members_target' => $num_savings_group_members_target,
      'savings_groups_total_balance_target' => $savings_groups_total_balance_target,
      'members_with_vf_loan_target' => $members_with_vf_loan_target,
      'farmers_with_vc_ins_target' => $farmers_with_vc_ins_target,
      'num_producers_groups_target' => $num_producers_groups_target,
      'num_producers_group_members_target' => $num_producers_group_members_target,
      'num_prod_groups_sell_vc_product_target' => $num_prod_groups_sell_vc_product_target,
      'numPgLocalMarketsTarget' => $numPgLocalMarketsTarget,
      'num_prod_groups_expanded_markets_target' => $num_prod_groups_expanded_markets_target,
      'hectares_reclaimed_for_ag_target' => $hectares_reclaimed_for_ag_target,
      'hectares_farmed_soil_water_cons_target' => $hectares_farmed_soil_water_cons_target,
      'farmers_using_water_catchment_target' => $farmers_using_water_catchment_target,
      'comm_watershed_rehab_target' => $comm_watershed_rehab_target,
      'trees_planted_target' => $trees_planted_target,
      'members_with_emer_savings_target' => $members_with_emer_savings_target,
      'farmers_using_ews_target' => $farmers_using_ews_target,
      'members_received_ewv_training_target' => $members_received_ewv_training_target,
      'ewv_trainees_attest_value_trans_target' => $ewv_trainees_attest_value_trans_target,
      'faith_leaders_in_ewv_training_target' => $faith_leaders_in_ewv_training_target,
      'groups_undertaking_political_rep_target' => $groups_undertaking_political_rep_target,
      'children_given_care_by_groups_target' => $children_given_care_by_groups_target,
      'unique_hh_inc_sources_target' => $unique_hh_inc_sources_target,
      'dirBensTarget' => $dirBensTarget,
      'numChildrenTarget' => $numChildrenTarget,
      'numWomenTarget' => $numWomenTarget,
      'numHHMemTarget' => $numHHMemTarget,
      // Actuals
      'impSeedActual' => json_encode($impSeedActual),
      'impStorageActual' => json_encode($impStorageActual),
      'impToolsActual' => json_encode($impToolsActual),
      'numWithIrrigationActual' => json_encode($numWithIrrigationActual),
      'increasedYieldActual' => json_encode($increasedYieldActual),
      'haWithIrrigationActual' => json_encode($haWithIrrigationActual),
      'num_savings_groups_actual' => json_encode($num_savings_groups_actual),
      'num_savings_group_members_actual' => json_encode($num_savings_group_members_actual),
      'savings_groups_total_balance_actual' => json_encode($savings_groups_total_balance_actual),
      'members_with_vf_loan_actual' => json_encode($members_with_vf_loan_actual),
      'farmers_with_vc_ins_actual' => json_encode($farmers_with_vc_ins_actual),
      'num_producers_groups_actual' => json_encode($num_producers_groups_actual),
      'num_producers_group_members_actual' => json_encode($num_producers_group_members_actual),
      'num_prod_groups_sell_vc_product_actual' => json_encode($num_prod_groups_sell_vc_product_actual),
      'num_prod_groups_local_markets_actual' => json_encode($num_prod_groups_local_markets_actual),
      'num_prod_groups_expanded_markets_actual' => json_encode($num_prod_groups_expanded_markets_actual),
      'hectares_reclaimed_for_ag_actual' => json_encode($hectares_reclaimed_for_ag_actual),
      'hectares_farmed_soil_water_cons_actual' => json_encode($hectares_farmed_soil_water_cons_actual),
      'farmers_using_water_catchment_actual' => json_encode($farmers_using_water_catchment_actual),
      'comm_watershed_rehab_actual' => json_encode($comm_watershed_rehab_actual),
      'trees_planted_actual' => json_encode($trees_planted_actual),
      'members_with_emer_savings_actual' => json_encode($members_with_emer_savings_actual),
      'farmers_using_ews_actual' => json_encode($farmers_using_ews_actual),
      'members_received_ewv_training_actual' => json_encode($members_received_ewv_training_actual),
      'ewv_trainees_attest_value_trans_actual' => json_encode($ewv_trainees_attest_value_trans_actual),
      'faith_leaders_in_ewv_training_actual' => json_encode($faith_leaders_in_ewv_training_actual),
      'groups_undertaking_political_rep_actual' => json_encode($groups_undertaking_political_rep_actual),
      'children_given_care_by_groups_actual' => json_encode($children_given_care_by_groups_actual),
      'unique_hh_inc_sources_actual' => json_encode($unique_hh_inc_sources_actual),
      'dirBensActual' => json_encode($dirBensActual),
      'numChildrenActual' => json_encode($numChildrenActual),
      'numWomenActual' => json_encode($numWomenActual),
      'numHHMemActual' => json_encode($numHHMemActual),
      // Totals
      'impSeedTotal' => $impSeedTotal,
      'seedBarColor' => $seedBarColor,
      'impStorageTotal' => $impStorageTotal,
      'impToolsTotal' => $impToolsTotal,
      'numWithIrrigationTotal' => $numWithIrrigationTotal,
      'increasedYieldTotal' => $increasedYieldTotal,
      'haWithIrrigationTotal' => $haWithIrrigationTotal,
      'numSGTotal' => $numSGTotal,
      'numSGMemTotal' => $numSGMemTotal,
      'sgBalTotal' => $sgBalTotal,
      'memVFLoanTotal'  => $memVFLoanTotal,
      'farmersVCInsTotal'  => $farmersVCInsTotal,
      'numPGTotal'  => $numPGTotal,
      'numPGMemTotal'  => $numPGMemTotal,
      'numPGSellVCProdTotal'  => $numPGSellVCProdTotal,
      'numPGSellLocalTotal'  => $numPGSellLocalTotal,
      'numPGSellExpandedTotal'  => $numPGSellExpandedTotal,
      'haReclaimedAgTotal'  => $haReclaimedAgTotal,
      'haFarmedSoilConsTotal'  => $haFarmedSoilConsTotal,
      'numUsingWaterCatchmentTotal'  => $numUsingWaterCatchmentTotal,
      'commWatershedRehabTotal'  => $commWatershedRehabTotal,
      'treesPlantedTotal'  => $treesPlantedTotal,
      'memWithEmerSavingsTotal'  => $memWithEmerSavingsTotal,
      'numUsingEwsTotal'  => $numUsingEwsTotal,
      'numReceivedEwvTrainingTotal'  => $numReceivedEwvTrainingTotal,
      'ewvTraineesAttestValueTransTotal'  => $ewvTraineesAttestValueTransTotal,
      'faithLeadersEwvTrainingTotal'  => $faithLeadersEwvTrainingTotal,
      'groupsPoliticalRepTotal'  => $groupsPoliticalRepTotal,
      'childrenCaredByGroupsTotal'  => $childrenCaredByGroupsTotal,
      'uniqueHhIncSourcestotal'  => $uniqueHhIncSourcestotal,
      'dirBensTotal' => $dirBensTotal,
      'numChildrenTotal' => $numChildrenTotal,
      'numWomenTotal' => $numWomenTotal,
      'numHHMemTotal' => $numHHMemTotal,
      // Progress bar widths & colors
      'seedBarWidth' => $seedBarWidth,
      'seedBarColor' => $seedBarColor,
      'storageBarWidth' => $storageBarWidth,
      'storageBarColor' => $storageBarColor,
      'toolBarWidth' => $toolBarWidth,
      'toolBarColor' => $toolBarColor,
      'numWithIrrBarWidth' => $numWithIrrBarWidth,
      'numWithIrrBarColor' => $numWithIrrBarColor,
      'incYieldBarWidth' => $incYieldBarWidth,
      'incYieldBarColor' => $incYieldBarColor,
      'haIrrBarWidth' => $haIrrBarWidth,
      'haIrrBarColor' => $haIrrBarColor,
      'sgBarWidth' => $sgBarWidth,
      'sgBarColor' => $sgBarColor,
      'sgMemBarWidth' => $sgMemBarWidth,
      'sgMemBarColor' => $sgMemBarColor,
      'sgBalBarWidth' => $sgBalBarWidth,
      'sgBalBarColor' => $sgBalBarColor,
      'memVFLoanBarWidth' => $memVFLoanBarWidth,
      'memVFLoanBarcolor' => $memVFLoanBarcolor,
      'farmVCInsBarWidth' => $farmVCInsBarWidth,
      'farmVCInsBarColor' => $farmVCInsBarColor,
      'pgBarWidth' => $pgBarWidth,
      'pgBarColor' => $pgBarColor,
      'numPgMemBarWidth' => $numPgMemBarWidth,
      'numPgMemBarColor' => $numPgMemBarColor,
      'numPgSellVcBarWidth' => $numPgSellVcBarWidth,
      'numPgSellVcBarColor' => $numPgSellVcBarColor,
      'numPgLocalBarWidth' => $numPgLocalBarWidth,
      'numPgLocalBarcolor' => $numPgLocalBarcolor,
      'numPgExpandedBarWidth' => $numPgExpandedBarWidth,
      'numPgExpandedBarColor' => $numPgExpandedBarColor,
      'haRecAgBarWidth' => $haRecAgBarWidth,
      'haRecAgBarcolor' => $haRecAgBarcolor,
      'haSoilConsBarWidth' => $haSoilConsBarWidth,
      'haSoilConsBarColor' => $haSoilConsBarColor,
      'numWaterCatchBarWidth' => $numWaterCatchBarWidth,
      'numWaterCatchBarColor' => $numWaterCatchBarColor,
      'commWatershedBarWidth' => $commWatershedBarWidth,
      'commWatershedBarColor' => $commWatershedBarColor,
      'treesPlantedBarWidth' => $treesPlantedBarWidth,
      'treesPlantedBarColor' => $treesPlantedBarColor,
      'memEmerSavingsBarWidth' => $memEmerSavingsBarWidth,
      'memEmerSavingsBarColor' => $memEmerSavingsBarColor,
      'numEwsBarWidth' => $numEwsBarWidth,
      'numEwsBarColor' => $numEwsBarColor,
      'numEwvTrainingBarWidth' => $numEwvTrainingBarWidth,
      'numEwvTrainingBarColor' => $numEwvTrainingBarColor,
      'numValueTransBarWidth' => $numValueTransBarWidth,
      'numValueTransBarColor' => $numValueTransBarColor,
      'faithLeadersEwvBarWidth' => $faithLeadersEwvBarWidth,
      'faithLeadersEwvBarColor' => $faithLeadersEwvBarColor,
      'groupsPoliticalRepBarWidth' => $groupsPoliticalRepBarWidth,
      'groupsPoliticalRepBarColor' => $groupsPoliticalRepBarColor,
      'childCareByGroupsBarWidth' => $groupsPoliticalRepBarColor,
      'childCareByGroupsBarColor' => $childCareByGroupsBarColor,
      'hhIncSourcesBarWidth' => $hhIncSourcesBarWidth,
      'hhIncSourcesBarColor' => $hhIncSourcesBarColor,
      'dirBensBarWidth' => $dirBensBarWidth,
      'dirBensBarColor' => $dirBensBarColor,
      'numChildrenBarWidth' => $numChildrenBarWidth,
      'numChildrenBarColor' => $numChildrenBarColor,
      'numWomenBarWidth' => $numWomenBarWidth,
      'numWomenBarColor' => $numWomenBarColor,
      'numHhBarWidth' => $numHhBarWidth,
      'numHhBarColor' => $numHhBarColor,
    );

    return view('charts.countryDb')->with($data);

  }



  public function eloDashboard() {

    $lopTargets = ProgramTargets::all()->toArray();

    //$sumByCountry = DB::table('program_measure_sums_by_country')->get()->toArray();
    $sumByQuarter = DB::table('program_measure_sums_by_quarter')->get()->toArray();

    $lopActuals = DB::table('program_measure_totals')->get()->toArray();



    // Get the sum of all of the targets
    $impSeedTarget = array_sum(array_column($lopTargets, 'improved_seed_target'));
    $impStorageTarget = array_sum(array_column($lopTargets, 'improved_storage_target'));
    $impToolsTarget = array_sum(array_column($lopTargets, 'improved_tools_target'));
    $numWithIrrigationTarget = array_sum(array_column($lopTargets, 'farmers_with_irrigation_target'));
    $increasedYieldTarget = array_sum(array_column($lopTargets, 'increase_in_yield_per_hectare_target'));
    $haWithIrrigationTarget = array_sum(array_column($lopTargets, 'ha_with_irrigation_target'));
    $num_savings_groups_target = array_sum(array_column($lopTargets, 'num_savings_groups_target'));
    $num_savings_group_members_target = array_sum(array_column($lopTargets, 'num_savings_group_members_target'));
    $savings_groups_total_balance_target = array_sum(array_column($lopTargets, 'savings_groups_total_balance_target'));
    $members_with_vf_loan_target = array_sum(array_column($lopTargets, 'members_with_vf_loan_target'));
    $farmers_with_vc_ins_target = array_sum(array_column($lopTargets, 'farmers_with_vc_ins_target'));
    $num_producers_groups_target = array_sum(array_column($lopTargets, 'num_producers_groups_target'));
    $num_producers_group_members_target = array_sum(array_column($lopTargets, 'num_producers_group_members_target'));
    $num_prod_groups_sell_vc_product_target = array_sum(array_column($lopTargets, 'num_prod_groups_sell_vc_product_target'));
    $numPgLocalMarketsTarget = array_sum(array_column($lopTargets, 'num_prod_groups_local_markets_target'));
    $num_prod_groups_expanded_markets_target = array_sum(array_column($lopTargets, 'num_prod_groups_expanded_markets_target'));
    $hectares_reclaimed_for_ag_target = array_sum(array_column($lopTargets, 'hectares_reclaimed_for_ag_target'));
    $hectares_farmed_soil_water_cons_target = array_sum(array_column($lopTargets, 'hectares_farmed_soil_water_cons_target'));
    $farmers_using_water_catchment_target = array_sum(array_column($lopTargets, 'farmers_using_water_catchment_target'));
    $comm_watershed_rehab_target = array_sum(array_column($lopTargets, 'comm_watershed_rehab_target'));
    $trees_planted_target = array_sum(array_column($lopTargets, 'trees_planted_target'));
    $members_with_emer_savings_target = array_sum(array_column($lopTargets, 'members_with_emer_savings_target'));
    $farmers_using_ews_target = array_sum(array_column($lopTargets, 'farmers_using_ews_target'));
    $members_received_ewv_training_target = array_sum(array_column($lopTargets, 'members_received_ewv_training_target'));
    $ewv_trainees_attest_value_trans_target = array_sum(array_column($lopTargets, 'ewv_trainees_attest_value_trans_target'));
    $faith_leaders_in_ewv_training_target = array_sum(array_column($lopTargets, 'faith_leaders_in_ewv_training_target'));
    $groups_undertaking_political_rep_target = array_sum(array_column($lopTargets, 'groups_undertaking_political_rep_target'));
    $children_given_care_by_groups_target = array_sum(array_column($lopTargets, 'children_given_care_by_groups_target'));
    $unique_hh_inc_sources_target = array_sum(array_column($lopTargets, 'unique_hh_inc_sources_target'));
    $dirBensTarget = array_sum(array_column($lopTargets, 'direct_beneficiaries_target'));
    $numChildrenTarget = array_sum(array_column($lopTargets, 'num_children_target'));
    $numWomenTarget = array_sum(array_column($lopTargets, 'num_women_target'));
    $numHHMemTarget = array_sum(array_column($lopTargets, 'num_hh_members_target'));


    // Create an array of the actual values, by country
    //$labels = array_column($sumByCountry, 'name');
    $labels = array_column($sumByQuarter, 'quarter');


/*
    $rwAg = array();
    $rwFin = array();
    $rwMkt = array();
    $rwNrm = array();
    $rwRss = array();
    $rwEwv = array();

    $tzAg = array();
    $tzFin = array();
    $tzMkt = array();
    $tzNrm = array();
    $tzRss = array();
    $tzEwv = array();

    $zbAg = array();
    $zbFin = array();
    $zbMkt = array();
    $zbNrm = array();
    $zbRss = array();
    $zbEwv = array();

    $mwAg = array();
    $mwFin = array();
    $mwMkt = array();
    $mwNrm = array();
    $mwRss = array();
    $mwEwv = array();

    $hdAg = array();
    $hdFin = array();
    $hdMkt = array();
    $hdNrm = array();
    $hdRss = array();
    $hdEwv = array();

    foreach($sumByCountry as $country) {

      if($country->name == 'Rwanda') {
        // Agricultural Technology measures
        $rwAg[] = $country->improved_seed_actual;
        $rwAg[] = $country->improved_storage_actual;
        $rwAg[] = $country->improved_tools_actual;
        $rwAg[] = $country->farmers_with_irrigation_actual;
        //$rwAg[] = $country->increase_in_yield_per_hectare_actual;
        $rwAg[] = $country->ha_with_irrigation_actual;

        // Financial Services measures
        $rwFin[] = $country->num_savings_groups_actual;
        $rwFin[] = $country->num_savings_group_members_actual;
        $rwFin[] = $country->members_with_vf_loan_actual;
        $rwFin[] = $country->farmers_with_vc_ins_actual;

        // Access to Markets measures
        $rwMkt[] = $country->num_producers_groups_actual;
        $rwMkt[] = $country->num_producers_group_members_actual;
        $rwMkt[] = $country->num_prod_groups_sell_vc_product_actual;
        $rwMkt[] = $country->num_prod_groups_local_markets_actual;
        $rwMkt[] = $country->num_prod_groups_expanded_markets_actual;


      } elseif($country->name == 'Tanzania') {
        // Agricultural Technology measures
        $tzAg[] = $country->improved_seed_actual;
        $tzAg[] = $country->improved_storage_actual;
        $tzAg[] = $country->improved_tools_actual;
        $tzAg[] = $country->farmers_with_irrigation_actual;
        //$tzAg[] = $country->increase_in_yield_per_hectare_actual;
        $tzAg[] = $country->ha_with_irrigation_actual;

        // Financial Services measures
        $tzFin[] = $country->num_savings_groups_actual;
        $tzFin[] = $country->num_savings_group_members_actual;
        $tzFin[] = $country->members_with_vf_loan_actual;
        $tzFin[] = $country->farmers_with_vc_ins_actual;

        // Access to Markets measures
        $tzMkt[] = $country->num_producers_groups_actual;
        $tzMkt[] = $country->num_producers_group_members_actual;
        $tzMkt[] = $country->num_prod_groups_sell_vc_product_actual;
        $tzMkt[] = $country->num_prod_groups_local_markets_actual;
        $tzMkt[] = $country->num_prod_groups_expanded_markets_actual;


      } elseif($country->name == 'Zambia') {
        // Agricultural Technology measures
        $zbAg[] = $country->improved_seed_actual;
        $zbAg[] = $country->improved_storage_actual;
        $zbAg[] = $country->improved_tools_actual;
        $zbAg[] = $country->farmers_with_irrigation_actual;
        //$zbAg[] = $country->increase_in_yield_per_hectare_actual;
        $zbAg[] = $country->ha_with_irrigation_actual;

        // Financial Services measures
        $zbFin[] = $country->num_savings_groups_actual;
        $zbFin[] = $country->num_savings_group_members_actual;
        $zbFin[] = $country->members_with_vf_loan_actual;
        $zbFin[] = $country->farmers_with_vc_ins_actual;

        // Access to Markets measures
        $zbMkt[] = $country->num_producers_groups_actual;
        $zbMkt[] = $country->num_producers_group_members_actual;
        $zbMkt[] = $country->num_prod_groups_sell_vc_product_actual;
        $zbMkt[] = $country->num_prod_groups_local_markets_actual;
        $zbMkt[] = $country->num_prod_groups_expanded_markets_actual;

      } elseif($country->name == 'Malawi') {
        // Agricultural Technology measures
        $mwAg[] = $country->improved_seed_actual;
        $mwAg[] = $country->improved_storage_actual;
        $mwAg[] = $country->improved_tools_actual;
        $mwAg[] = $country->farmers_with_irrigation_actual;
        //$mwAg[] = $country->increase_in_yield_per_hectare_actual;
        $mwAg[] = $country->ha_with_irrigation_actual;

        // Financial Services measures
        $mwFin[] = $country->num_savings_groups_actual;
        $mwFin[] = $country->num_savings_group_members_actual;
        $mwFin[] = $country->members_with_vf_loan_actual;
        $mwFin[] = $country->farmers_with_vc_ins_actual;

        // Access to Markets measures
        $mwMkt[] = $country->num_producers_groups_actual;
        $mwMkt[] = $country->num_producers_group_members_actual;
        $mwMkt[] = $country->num_prod_groups_sell_vc_product_actual;
        $mwMkt[] = $country->num_prod_groups_local_markets_actual;
        $mwMkt[] = $country->num_prod_groups_expanded_markets_actual;

      } elseif($country->name == 'Honduras') {
        // Agricultural Technology measures
        $hdAg[] = $country->improved_seed_actual;
        $hdAg[] = $country->improved_storage_actual;
        $hdAg[] = $country->improved_tools_actual;
        $hdAg[] = $country->farmers_with_irrigation_actual;
        //$hdAg[] = $country->increase_in_yield_per_hectare_actual;
        $hdAg[] = $country->ha_with_irrigation_actual;

        // Financial Services measures
        $hdFin[] = $country->num_savings_groups_actual;
        $hdFin[] = $country->num_savings_group_members_actual;
        $hdFin[] = $country->members_with_vf_loan_actual;
        $hdFin[] = $country->farmers_with_vc_ins_actual;

        // Access to Markets measures
        $hdMkt[] = $country->num_producers_groups_actual;
        $hdMkt[] = $country->num_producers_group_members_actual;
        $hdMkt[] = $country->num_prod_groups_sell_vc_product_actual;
        $hdMkt[] = $country->num_prod_groups_local_markets_actual;
        $hdMkt[] = $country->num_prod_groups_expanded_markets_actual;

      }

    }

    */

    /* Uncomment this to try to figure out the bar/pie chart

    $impSeedActual = array_column($sumByCountry, 'improved_seed_actual');
    $impStorageActual = array_column($sumByCountry, 'improved_storage_actual');
    $impToolsActual = array_column($sumByCountry, 'improved_tools_actual');
    $numWithIrrigationActual = array_column($sumByCountry, 'farmers_with_irrigation_actual');
    $increasedYieldActual = array_column($sumByCountry, 'increase_in_yield_per_hectare_actual');
    $haWithIrrigationActual = array_column($sumByCountry, 'ha_with_irrigation_actual');
    $num_savings_groups_actual = array_column($sumByCountry, 'num_savings_groups_actual');
    $num_savings_group_members_actual = array_column($sumByCountry, 'num_savings_group_members_actual');
    $savings_groups_total_balance_actual = array_column($sumByCountry, 'savings_groups_total_balance_actual');
    $members_with_vf_loan_actual = array_column($sumByCountry, 'members_with_vf_loan_actual');
    $farmers_with_vc_ins_actual = array_column($sumByCountry, 'farmers_with_vc_ins_actual');
    $num_producers_groups_actual = array_column($sumByCountry, 'num_producers_groups_actual');
    $num_producers_group_members_actual = array_column($sumByCountry, 'num_producers_group_members_actual');
    $num_prod_groups_sell_vc_product_actual = array_column($sumByCountry, 'num_prod_groups_sell_vc_product_actual');
    $num_prod_groups_local_markets_actual = array_column($sumByCountry, 'num_prod_groups_local_markets_actual');
    $num_prod_groups_expanded_markets_actual = array_column($sumByCountry, 'num_prod_groups_expanded_markets_actual');
    $hectares_reclaimed_for_ag_actual = array_column($sumByCountry, 'hectares_reclaimed_for_ag_actual');
    $hectares_farmed_soil_water_cons_actual = array_column($sumByCountry, 'hectares_farmed_soil_water_cons_actual');
    $farmers_using_water_catchment_actual = array_column($sumByCountry, 'farmers_using_water_catchment_actual');
    $comm_watershed_rehab_actual = array_column($sumByCountry, 'comm_watershed_rehab_actual');
    $trees_planted_actual = array_column($sumByCountry, 'trees_planted_actual');
    $members_with_emer_savings_actual = array_column($sumByCountry, 'members_with_emer_savings_actual');
    $farmers_using_ews_actual = array_column($sumByCountry, 'farmers_using_ews_actual');
    $members_received_ewv_training_actual = array_column($sumByCountry, 'members_received_ewv_training_actual');
    $ewv_trainees_attest_value_trans_actual = array_column($sumByCountry, 'ewv_trainees_attest_value_trans_actual');
    $faith_leaders_in_ewv_training_actual = array_column($sumByCountry, 'faith_leaders_in_ewv_training_actual');
    $groups_undertaking_political_rep_actual = array_column($sumByCountry, 'groups_undertaking_political_rep_actual');
    $children_given_care_by_groups_actual = array_column($sumByCountry, 'children_given_care_by_groups_actual');
    $unique_hh_inc_sources_actual = array_column($sumByCountry, 'unique_hh_inc_sources_actual');
    $dirBensActual = array_column($sumByCountry, 'direct_beneficiaries_actual');
    $numChildrenActual = array_column($sumByCountry, 'num_children_actual');
    $numWomenActual = array_column($sumByCountry, 'num_women_actual');
    $numHHMemActual = array_column($sumByCountry, 'num_hh_members_actual');
*/

$impSeedActual = array_column($sumByQuarter, 'improved_seed_actual');
$impStorageActual = array_column($sumByQuarter, 'improved_storage_actual');
$impToolsActual = array_column($sumByQuarter, 'improved_tools_actual');
$numWithIrrigationActual = array_column($sumByQuarter, 'farmers_with_irrigation_actual');
$increasedYieldActual = array_column($sumByQuarter, 'increase_in_yield_per_hectare_actual');
$haWithIrrigationActual = array_column($sumByQuarter, 'ha_with_irrigation_actual');
$num_savings_groups_actual = array_column($sumByQuarter, 'num_savings_groups_actual');
$num_savings_group_members_actual = array_column($sumByQuarter, 'num_savings_group_members_actual');
$savings_groups_total_balance_actual = array_column($sumByQuarter, 'savings_groups_total_balance_actual');
$members_with_vf_loan_actual = array_column($sumByQuarter, 'members_with_vf_loan_actual');
$farmers_with_vc_ins_actual = array_column($sumByQuarter, 'farmers_with_vc_ins_actual');
$num_producers_groups_actual = array_column($sumByQuarter, 'num_producers_groups_actual');
$num_producers_group_members_actual = array_column($sumByQuarter, 'num_producers_group_members_actual');
$num_prod_groups_sell_vc_product_actual = array_column($sumByQuarter, 'num_prod_groups_sell_vc_product_actual');
$num_prod_groups_local_markets_actual = array_column($sumByQuarter, 'num_prod_groups_local_markets_actual');
$num_prod_groups_expanded_markets_actual = array_column($sumByQuarter, 'num_prod_groups_expanded_markets_actual');
$hectares_reclaimed_for_ag_actual = array_column($sumByQuarter, 'hectares_reclaimed_for_ag_actual');
$hectares_farmed_soil_water_cons_actual = array_column($sumByQuarter, 'hectares_farmed_soil_water_cons_actual');
$farmers_using_water_catchment_actual = array_column($sumByQuarter, 'farmers_using_water_catchment_actual');
$comm_watershed_rehab_actual = array_column($sumByQuarter, 'comm_watershed_rehab_actual');
$trees_planted_actual = array_column($sumByQuarter, 'trees_planted_actual');
$members_with_emer_savings_actual = array_column($sumByQuarter, 'members_with_emer_savings_actual');
$farmers_using_ews_actual = array_column($sumByQuarter, 'farmers_using_ews_actual');
$members_received_ewv_training_actual = array_column($sumByQuarter, 'members_received_ewv_training_actual');
$ewv_trainees_attest_value_trans_actual = array_column($sumByQuarter, 'ewv_trainees_attest_value_trans_actual');
$faith_leaders_in_ewv_training_actual = array_column($sumByQuarter, 'faith_leaders_in_ewv_training_actual');
$groups_undertaking_political_rep_actual = array_column($sumByQuarter, 'groups_undertaking_political_rep_actual');
$children_given_care_by_groups_actual = array_column($sumByQuarter, 'children_given_care_by_groups_actual');
$unique_hh_inc_sources_actual = array_column($sumByQuarter, 'unique_hh_inc_sources_actual');
$dirBensActual = array_column($sumByQuarter, 'direct_beneficiaries_actual');
$numChildrenActual = array_column($sumByQuarter, 'num_children_actual');
$numWomenActual = array_column($sumByQuarter, 'num_women_actual');
$numHHMemActual = array_column($sumByQuarter, 'num_hh_members_actual');


/*
    echo "<pre>";
    print_r($impSeedActual);
    echo "</pre>";

    print_r($rwAg);

    exit;
*/



    // Get the totals for the progress bars
    $impSeedTotal = array_sum($impSeedActual);
    $impStorageTotal = array_sum($impStorageActual);
    $impToolsTotal = array_sum($impToolsActual);
    $numWithIrrigationTotal = array_sum($numWithIrrigationActual);
    $increasedYieldTotal = array_sum($increasedYieldActual);
    $haWithIrrigationTotal = array_sum($haWithIrrigationActual);
    $numSGTotal = array_sum($num_savings_groups_actual);
    $numSGMemTotal = array_sum($num_savings_group_members_actual);
    $sgBalTotal = array_sum($savings_groups_total_balance_actual);
    $memVFLoanTotal = array_sum($members_with_vf_loan_actual);
    $farmersVCInsTotal = array_sum($farmers_with_vc_ins_actual);
    $numPGTotal = array_sum($num_producers_groups_actual);
    $numPGMemTotal = array_sum($num_producers_group_members_actual);
    $numPGSellVCProdTotal = array_sum($num_prod_groups_sell_vc_product_actual);
    $numPGSellLocalTotal = array_sum($num_prod_groups_local_markets_actual);
    $numPGSellExpandedTotal = array_sum($num_prod_groups_expanded_markets_actual);
    $haReclaimedAgTotal = array_sum($hectares_reclaimed_for_ag_actual);
    $haFarmedSoilConsTotal = array_sum($hectares_farmed_soil_water_cons_actual);
    $numUsingWaterCatchmentTotal = array_sum($farmers_using_water_catchment_actual);
    $commWatershedRehabTotal = array_sum($comm_watershed_rehab_actual);
    $treesPlantedTotal = array_sum($trees_planted_actual);
    $memWithEmerSavingsTotal = array_sum($members_with_emer_savings_actual);
    $numUsingEwsTotal = array_sum($farmers_using_ews_actual);
    $numReceivedEwvTrainingTotal = array_sum($members_received_ewv_training_actual);
    $ewvTraineesAttestValueTransTotal = array_sum($ewv_trainees_attest_value_trans_actual);
    $faithLeadersEwvTrainingTotal = array_sum($faith_leaders_in_ewv_training_actual);
    $groupsPoliticalRepTotal = array_sum($groups_undertaking_political_rep_actual);
    $childrenCaredByGroupsTotal = array_sum($children_given_care_by_groups_actual);
    $uniqueHhIncSourcestotal = array_sum($unique_hh_inc_sources_actual);
    $dirBensTotal = array_sum($dirBensActual);
    $numChildrenTotal = array_sum($numChildrenActual);
    $numWomenTotal = array_sum($numWomenActual);
    $numHHMemTotal = array_sum($numHHMemActual);

    // Get the width and colors for the progress bars
    $seedBarWidth = $this->barWidth($impSeedTotal, $impSeedTarget);
    $seedBarColor = $this->barColor($impSeedTotal, $impSeedTarget);
    $storageBarWidth = $this->barWidth($impStorageTotal, $impStorageTarget);
    $storageBarColor = $this->barColor($impStorageTotal, $impStorageTarget);
    $toolBarWidth = $this->barWidth($impToolsTotal, $impToolsTarget);
    $toolBarColor = $this->barColor($impToolsTotal, $impToolsTarget);
    $numWithIrrBarWidth = $this->barWidth($numWithIrrigationTotal, $numWithIrrigationTarget);
    $numWithIrrBarColor = $this->barColor($numWithIrrigationTotal, $numWithIrrigationTarget);
    $incYieldBarWidth = $this->barWidth($increasedYieldTotal, $increasedYieldTarget);
    $incYieldBarColor = $this->barColor($increasedYieldTotal, $increasedYieldTarget);
    $haIrrBarWidth = $this->barWidth($haWithIrrigationTotal, $haWithIrrigationTarget);
    $haIrrBarColor = $this->barColor($haWithIrrigationTotal, $haWithIrrigationTarget);
    $sgBarWidth = $this->barWidth($numSGTotal, $num_savings_groups_target);
    $sgBarColor = $this->barColor($numSGTotal, $num_savings_groups_target);
    $sgMemBarWidth = $this->barWidth($numSGMemTotal, $num_savings_group_members_target);
    $sgMemBarColor = $this->barColor($numSGMemTotal, $num_savings_group_members_target);
    $sgBalBarWidth = $this->barWidth($sgBalTotal, $savings_groups_total_balance_target);
    $sgBalBarColor = $this->barColor($sgBalTotal, $savings_groups_total_balance_target);
    $memVFLoanBarWidth = $this->barWidth($memVFLoanTotal, $members_with_vf_loan_target);
    $memVFLoanBarcolor = $this->barColor($memVFLoanTotal, $members_with_vf_loan_target);
    $farmVCInsBarWidth = $this->barWidth($farmersVCInsTotal, $farmers_with_vc_ins_target);
    $farmVCInsBarColor = $this->barColor($farmersVCInsTotal, $farmers_with_vc_ins_target);
    $pgBarWidth = $this->barWidth($numPGTotal, $num_producers_groups_target);
    $pgBarColor = $this->barColor($numPGTotal, $num_producers_groups_target);
    $numPgMemBarWidth = $this->barWidth($numPGMemTotal, $num_producers_group_members_target);
    $numPgMemBarColor = $this->barColor($numPGMemTotal, $num_producers_group_members_target);
    $numPgSellVcBarWidth = $this->barWidth($numPGSellVCProdTotal, $num_prod_groups_sell_vc_product_target);
    $numPgSellVcBarColor = $this->barColor($numPGSellVCProdTotal, $num_prod_groups_sell_vc_product_target);
    $numPgLocalBarWidth = $this->barWidth($numPGSellLocalTotal, $numPgLocalMarketsTarget);
    $numPgLocalBarcolor = $this->barColor($numPGSellLocalTotal, $numPgLocalMarketsTarget);
    $numPgExpandedBarWidth = $this->barWidth($numPGSellExpandedTotal, $num_prod_groups_expanded_markets_target);
    $numPgExpandedBarColor = $this->barColor($numPGSellExpandedTotal, $num_prod_groups_expanded_markets_target);
    $haRecAgBarWidth = $this->barWidth($haReclaimedAgTotal, $hectares_reclaimed_for_ag_target);
    $haRecAgBarcolor = $this->barColor($haReclaimedAgTotal, $hectares_reclaimed_for_ag_target);
    $haSoilConsBarWidth = $this->barWidth($haFarmedSoilConsTotal, $hectares_farmed_soil_water_cons_target);
    $haSoilConsBarColor = $this->barColor($haFarmedSoilConsTotal, $hectares_farmed_soil_water_cons_target);
    $numWaterCatchBarWidth = $this->barWidth($numUsingWaterCatchmentTotal, $farmers_using_water_catchment_target);
    $numWaterCatchBarColor = $this->barColor($numUsingWaterCatchmentTotal, $farmers_using_water_catchment_target);
    $commWatershedBarWidth = $this->barWidth($commWatershedRehabTotal, $comm_watershed_rehab_target);
    $commWatershedBarColor = $this->barColor($commWatershedRehabTotal, $comm_watershed_rehab_target);
    $treesPlantedBarWidth = $this->barWidth($treesPlantedTotal, $trees_planted_target);
    $treesPlantedBarColor = $this->barColor($treesPlantedTotal, $trees_planted_target);
    $memEmerSavingsBarWidth = $this->barWidth($memWithEmerSavingsTotal, $members_with_emer_savings_target);
    $memEmerSavingsBarColor = $this->barColor($memWithEmerSavingsTotal, $members_with_emer_savings_target);
    $numEwsBarWidth = $this->barWidth($numUsingEwsTotal, $farmers_using_ews_target);
    $numEwsBarColor = $this->barColor($numUsingEwsTotal, $farmers_using_ews_target);
    $numEwvTrainingBarWidth = $this->barWidth($numReceivedEwvTrainingTotal, $members_received_ewv_training_target);
    $numEwvTrainingBarColor = $this->barColor($numReceivedEwvTrainingTotal, $members_received_ewv_training_target);
    $numValueTransBarWidth = $this->barWidth($ewvTraineesAttestValueTransTotal, $ewv_trainees_attest_value_trans_target);
    $numValueTransBarColor = $this->barColor($ewvTraineesAttestValueTransTotal, $ewv_trainees_attest_value_trans_target);
    $faithLeadersEwvBarWidth = $this->barWidth($faithLeadersEwvTrainingTotal, $faith_leaders_in_ewv_training_target);
    $faithLeadersEwvBarColor = $this->barColor($faithLeadersEwvTrainingTotal, $faith_leaders_in_ewv_training_target);
    $groupsPoliticalRepBarWidth = $this->barWidth($groupsPoliticalRepTotal, $groups_undertaking_political_rep_target);
    $groupsPoliticalRepBarColor = $this->barColor($groupsPoliticalRepTotal, $groups_undertaking_political_rep_target);
    $childCareByGroupsBarWidth = $this->barWidth($childrenCaredByGroupsTotal, $children_given_care_by_groups_target);
    $childCareByGroupsBarColor = $this->barColor($childrenCaredByGroupsTotal, $children_given_care_by_groups_target);
    $hhIncSourcesBarWidth = $this->barWidth($uniqueHhIncSourcestotal, $unique_hh_inc_sources_target);
    $hhIncSourcesBarColor = $this->barColor($uniqueHhIncSourcestotal, $unique_hh_inc_sources_target);
    $dirBensBarWidth = $this->barWidth($dirBensTotal, $dirBensTarget);
    $dirBensBarColor = $this->barColor($dirBensTotal, $dirBensTarget);
    $numChildrenBarWidth = $this->barWidth($numChildrenTotal, $numChildrenTarget);
    $numChildrenBarColor = $this->barColor($numChildrenTotal, $numChildrenTarget);
    $numWomenBarWidth = $this->barWidth($numWomenTotal, $numWomenTarget);
    $numWomenBarColor = $this->barColor($numWomenTotal, $numWomenTarget);
    $numHhBarWidth = $this->barWidth($numHHMemTotal, $numHHMemTarget);
    $numHhBarColor = $this->barColor($numHHMemTotal, $numHHMemTarget);

    $data = array(
      //'country' => $country,
      'labels' => json_encode($labels),
      // Targets
      'impSeedTarget' => $impSeedTarget,
      'impStorageTarget' => $impStorageTarget,
      'impToolsTarget' => $impToolsTarget,
      'numWithIrrigationTarget' => $numWithIrrigationTarget,
      'increasedYieldTarget' => $increasedYieldTarget,
      'haWithIrrigationTarget' => $haWithIrrigationTarget,
      'num_savings_groups_target' => $num_savings_groups_target,
      'num_savings_group_members_target' => $num_savings_group_members_target,
      'savings_groups_total_balance_target' => $savings_groups_total_balance_target,
      'members_with_vf_loan_target' => $members_with_vf_loan_target,
      'farmers_with_vc_ins_target' => $farmers_with_vc_ins_target,
      'num_producers_groups_target' => $num_producers_groups_target,
      'num_producers_group_members_target' => $num_producers_group_members_target,
      'num_prod_groups_sell_vc_product_target' => $num_prod_groups_sell_vc_product_target,
      'numPgLocalMarketsTarget' => $numPgLocalMarketsTarget,
      'num_prod_groups_expanded_markets_target' => $num_prod_groups_expanded_markets_target,
      'hectares_reclaimed_for_ag_target' => $hectares_reclaimed_for_ag_target,
      'hectares_farmed_soil_water_cons_target' => $hectares_farmed_soil_water_cons_target,
      'farmers_using_water_catchment_target' => $farmers_using_water_catchment_target,
      'comm_watershed_rehab_target' => $comm_watershed_rehab_target,
      'trees_planted_target' => $trees_planted_target,
      'members_with_emer_savings_target' => $members_with_emer_savings_target,
      'farmers_using_ews_target' => $farmers_using_ews_target,
      'members_received_ewv_training_target' => $members_received_ewv_training_target,
      'ewv_trainees_attest_value_trans_target' => $ewv_trainees_attest_value_trans_target,
      'faith_leaders_in_ewv_training_target' => $faith_leaders_in_ewv_training_target,
      'groups_undertaking_political_rep_target' => $groups_undertaking_political_rep_target,
      'children_given_care_by_groups_target' => $children_given_care_by_groups_target,
      'unique_hh_inc_sources_target' => $unique_hh_inc_sources_target,
      'dirBensTarget' => $dirBensTarget,
      'numChildrenTarget' => $numChildrenTarget,
      'numWomenTarget' => $numWomenTarget,
      'numHHMemTarget' => $numHHMemTarget,
      // Actuals
      'impSeedActual' => json_encode($impSeedActual),
      'impStorageActual' => json_encode($impStorageActual),
      'impToolsActual' => json_encode($impToolsActual),
      'numWithIrrigationActual' => json_encode($numWithIrrigationActual),
      'increasedYieldActual' => json_encode($increasedYieldActual),
      'haWithIrrigationActual' => json_encode($haWithIrrigationActual),
      'num_savings_groups_actual' => json_encode($num_savings_groups_actual),
      'num_savings_group_members_actual' => json_encode($num_savings_group_members_actual),
      'savings_groups_total_balance_actual' => json_encode($savings_groups_total_balance_actual),
      'members_with_vf_loan_actual' => json_encode($members_with_vf_loan_actual),
      'farmers_with_vc_ins_actual' => json_encode($farmers_with_vc_ins_actual),
      'num_producers_groups_actual' => json_encode($num_producers_groups_actual),
      'num_producers_group_members_actual' => json_encode($num_producers_group_members_actual),
      'num_prod_groups_sell_vc_product_actual' => json_encode($num_prod_groups_sell_vc_product_actual),
      'num_prod_groups_local_markets_actual' => json_encode($num_prod_groups_local_markets_actual),
      'num_prod_groups_expanded_markets_actual' => json_encode($num_prod_groups_expanded_markets_actual),
      'hectares_reclaimed_for_ag_actual' => json_encode($hectares_reclaimed_for_ag_actual),
      'hectares_farmed_soil_water_cons_actual' => json_encode($hectares_farmed_soil_water_cons_actual),
      'farmers_using_water_catchment_actual' => json_encode($farmers_using_water_catchment_actual),
      'comm_watershed_rehab_actual' => json_encode($comm_watershed_rehab_actual),
      'trees_planted_actual' => json_encode($trees_planted_actual),
      'members_with_emer_savings_actual' => json_encode($members_with_emer_savings_actual),
      'farmers_using_ews_actual' => json_encode($farmers_using_ews_actual),
      'members_received_ewv_training_actual' => json_encode($members_received_ewv_training_actual),
      'ewv_trainees_attest_value_trans_actual' => json_encode($ewv_trainees_attest_value_trans_actual),
      'faith_leaders_in_ewv_training_actual' => json_encode($faith_leaders_in_ewv_training_actual),
      'groups_undertaking_political_rep_actual' => json_encode($groups_undertaking_political_rep_actual),
      'children_given_care_by_groups_actual' => json_encode($children_given_care_by_groups_actual),
      'unique_hh_inc_sources_actual' => json_encode($unique_hh_inc_sources_actual),
      'dirBensActual' => json_encode($dirBensActual),
      'numChildrenActual' => json_encode($numChildrenActual),
      'numWomenActual' => json_encode($numWomenActual),
      'numHHMemActual' => json_encode($numHHMemActual),
      // Totals
      'impSeedTotal' => $impSeedTotal,
      'seedBarColor' => $seedBarColor,
      'impStorageTotal' => $impStorageTotal,
      'impToolsTotal' => $impToolsTotal,
      'numWithIrrigationTotal' => $numWithIrrigationTotal,
      'increasedYieldTotal' => $increasedYieldTotal,
      'haWithIrrigationTotal' => $haWithIrrigationTotal,
      'numSGTotal' => $numSGTotal,
      'numSGMemTotal' => $numSGMemTotal,
      'sgBalTotal' => $sgBalTotal,
      'memVFLoanTotal'  => $memVFLoanTotal,
      'farmersVCInsTotal'  => $farmersVCInsTotal,
      'numPGTotal'  => $numPGTotal,
      'numPGMemTotal'  => $numPGMemTotal,
      'numPGSellVCProdTotal'  => $numPGSellVCProdTotal,
      'numPGSellLocalTotal'  => $numPGSellLocalTotal,
      'numPGSellExpandedTotal'  => $numPGSellExpandedTotal,
      'haReclaimedAgTotal'  => $haReclaimedAgTotal,
      'haFarmedSoilConsTotal'  => $haFarmedSoilConsTotal,
      'numUsingWaterCatchmentTotal'  => $numUsingWaterCatchmentTotal,
      'commWatershedRehabTotal'  => $commWatershedRehabTotal,
      'treesPlantedTotal'  => $treesPlantedTotal,
      'memWithEmerSavingsTotal'  => $memWithEmerSavingsTotal,
      'numUsingEwsTotal'  => $numUsingEwsTotal,
      'numReceivedEwvTrainingTotal'  => $numReceivedEwvTrainingTotal,
      'ewvTraineesAttestValueTransTotal'  => $ewvTraineesAttestValueTransTotal,
      'faithLeadersEwvTrainingTotal'  => $faithLeadersEwvTrainingTotal,
      'groupsPoliticalRepTotal'  => $groupsPoliticalRepTotal,
      'childrenCaredByGroupsTotal'  => $childrenCaredByGroupsTotal,
      'uniqueHhIncSourcestotal'  => $uniqueHhIncSourcestotal,
      'dirBensTotal' => $dirBensTotal,
      'numChildrenTotal' => $numChildrenTotal,
      'numWomenTotal' => $numWomenTotal,
      'numHHMemTotal' => $numHHMemTotal,
      // Progress bar widths & colors
      'seedBarWidth' => $seedBarWidth,
      'seedBarColor' => $seedBarColor,
      'storageBarWidth' => $storageBarWidth,
      'storageBarColor' => $storageBarColor,
      'toolBarWidth' => $toolBarWidth,
      'toolBarColor' => $toolBarColor,
      'numWithIrrBarWidth' => $numWithIrrBarWidth,
      'numWithIrrBarColor' => $numWithIrrBarColor,
      'incYieldBarWidth' => $incYieldBarWidth,
      'incYieldBarColor' => $incYieldBarColor,
      'haIrrBarWidth' => $haIrrBarWidth,
      'haIrrBarColor' => $haIrrBarColor,
      'sgBarWidth' => $sgBarWidth,
      'sgBarColor' => $sgBarColor,
      'sgMemBarWidth' => $sgMemBarWidth,
      'sgMemBarColor' => $sgMemBarColor,
      'sgBalBarWidth' => $sgBalBarWidth,
      'sgBalBarColor' => $sgBalBarColor,
      'memVFLoanBarWidth' => $memVFLoanBarWidth,
      'memVFLoanBarcolor' => $memVFLoanBarcolor,
      'farmVCInsBarWidth' => $farmVCInsBarWidth,
      'farmVCInsBarColor' => $farmVCInsBarColor,
      'pgBarWidth' => $pgBarWidth,
      'pgBarColor' => $pgBarColor,
      'numPgMemBarWidth' => $numPgMemBarWidth,
      'numPgMemBarColor' => $numPgMemBarColor,
      'numPgSellVcBarWidth' => $numPgSellVcBarWidth,
      'numPgSellVcBarColor' => $numPgSellVcBarColor,
      'numPgLocalBarWidth' => $numPgLocalBarWidth,
      'numPgLocalBarcolor' => $numPgLocalBarcolor,
      'numPgExpandedBarWidth' => $numPgExpandedBarWidth,
      'numPgExpandedBarColor' => $numPgExpandedBarColor,
      'haRecAgBarWidth' => $haRecAgBarWidth,
      'haRecAgBarcolor' => $haRecAgBarcolor,
      'haSoilConsBarWidth' => $haSoilConsBarWidth,
      'haSoilConsBarColor' => $haSoilConsBarColor,
      'numWaterCatchBarWidth' => $numWaterCatchBarWidth,
      'numWaterCatchBarColor' => $numWaterCatchBarColor,
      'commWatershedBarWidth' => $commWatershedBarWidth,
      'commWatershedBarColor' => $commWatershedBarColor,
      'treesPlantedBarWidth' => $treesPlantedBarWidth,
      'treesPlantedBarColor' => $treesPlantedBarColor,
      'memEmerSavingsBarWidth' => $memEmerSavingsBarWidth,
      'memEmerSavingsBarColor' => $memEmerSavingsBarColor,
      'numEwsBarWidth' => $numEwsBarWidth,
      'numEwsBarColor' => $numEwsBarColor,
      'numEwvTrainingBarWidth' => $numEwvTrainingBarWidth,
      'numEwvTrainingBarColor' => $numEwvTrainingBarColor,
      'numValueTransBarWidth' => $numValueTransBarWidth,
      'numValueTransBarColor' => $numValueTransBarColor,
      'faithLeadersEwvBarWidth' => $faithLeadersEwvBarWidth,
      'faithLeadersEwvBarColor' => $faithLeadersEwvBarColor,
      'groupsPoliticalRepBarWidth' => $groupsPoliticalRepBarWidth,
      'groupsPoliticalRepBarColor' => $groupsPoliticalRepBarColor,
      'childCareByGroupsBarWidth' => $groupsPoliticalRepBarColor,
      'childCareByGroupsBarColor' => $childCareByGroupsBarColor,
      'hhIncSourcesBarWidth' => $hhIncSourcesBarWidth,
      'hhIncSourcesBarColor' => $hhIncSourcesBarColor,
      'dirBensBarWidth' => $dirBensBarWidth,
      'dirBensBarColor' => $dirBensBarColor,
      'numChildrenBarWidth' => $numChildrenBarWidth,
      'numChildrenBarColor' => $numChildrenBarColor,
      'numWomenBarWidth' => $numWomenBarWidth,
      'numWomenBarColor' => $numWomenBarColor,
      'numHhBarWidth' => $numHhBarWidth,
      'numHhBarColor' => $numHhBarColor,

/*
      'rwAg' => json_encode($rwAg),
      'tzAg' => json_encode($tzAg),
      'zbAg' => json_encode($zbAg),
      'mwAg' => json_encode($mwAg),
      'hdAg' => json_encode($hdAg),

      'rwFin' => json_encode($rwFin),
      'tzFin' => json_encode($tzFin),
      'zbFin' => json_encode($zbFin),
      'mwFin' => json_encode($mwFin),
      'hdFin' => json_encode($hdFin),

      'rwMkt' => json_encode($rwMkt),
      'tzMkt' => json_encode($tzMkt),
      'zbMkt' => json_encode($zbMkt),
      'mwMkt' => json_encode($mwMkt),
      'hdMkt' => json_encode($hdMkt),
*/
    );

    return view('charts.eloDashboard')->with($data);

  }


  public function barColor($actual, $goal) {

    if($actual == 0 or $goal == 0) {
      $progress = 0;
    } else {
      $progress = $actual/$goal*100;
    }

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
        case $progress > 100:
          $barColor = 'progress-bar-green';
          break;
      default:
        $barColor = 'progress-bar-red';
        break;
    }

    return $barColor;

  }



  public function barWidth($total, $target) {

    if($total == 0 or $target == 0) {
      $barWidth = 0;
    } else {
      $barWidth = $total/$target*100;
    }

    return $barWidth;

  }












}
