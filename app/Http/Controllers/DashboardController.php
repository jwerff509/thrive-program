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
