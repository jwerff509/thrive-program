<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramTargets extends Model
{

  protected $fillable = [
    'country_id',
    'improved_seed_target',
    'improved_storage_target',
    'improved_tools_target',
    'farmers_with_irrigation_target',
    'increase_in_yield_per_hectare_target',
    'ha_with_irrigation_target',
    'num_savings_groups_target',
    'num_savings_group_members_target',
    'savings_groups_total_balance_target',
    'members_with_vf_loan_target',
    'farmers_with_vc_ins_target',
    'num_producers_groups_target',
    'num_producers_group_members_target',
    'num_prod_groups_sell_vc_product_target',
    'num_prod_groups_local_markets_target',
    'num_prod_groups_expanded_markets_target',
    'hectares_reclaimed_for_ag_target',
    'hectares_farmed_soil_water_cons_target',
    'farmers_using_water_catchment_target',
    'comm_watershed_rehab_target',
    'trees_planted_target',
    'members_with_emer_savings_target',
    'farmers_using_ews_target',
    'members_received_ewv_training_target',
    'ewv_trainees_attest_value_trans_target',
    'faith_leaders_in_ewv_training_target',
    'groups_undertaking_political_rep_target',
    'participants_trained_in_cva_target',
    'children_given_care_by_groups_target',
    'unique_hh_inc_sources_target',
    'direct_beneficiaries_target',
    'num_children_target',
    'num_women_target',
    'num_hh_members_target',
  ];

  protected $table = "program_targets";

}
