<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramMeasures extends Model
{

  protected $fillable = [
    'country_id',
    'quarter',
    'improved_seed_actual',
    'improved_storage_actual',
    'improved_tools_actual',
    'farmers_with_irrigation_actual',
    'increase_in_yield_per_hectare_actual',
    'num_savings_groups_actual',
    'num_savings_group_members_actual',
    'members_with_vf_loan_actual',
    'farmers_with_vc_ins_actual',
    'num_producers_groups_actual',
    'num_producers_group_members_actual',
    'num_prod_groups_sell_vc_product_actual',
    'num_prod_groups_local_markets_actual',
    'num_prod_groups_expanded_markets_actual',
    'hectares_reclaimed_for_ag_actual',
    'hectares_farmed_soil_water_cons_actual',
    'farmers_using_water_catchment_actual',
    'comm_watershed_rehab_actual',
    'trees_planted_actual',
    'members_with_emer_savings_actual',
    'farmers_using_ews_actual',
    'members_received_ewv_training_actual',
    'ewv_trainees_attest_value_trans_actual',
    'faith_leaders_in_ewv_training_actual',
    'groups_undertaking_political_rep_actual',
    'children_given_care_by_groups_actual',
    'unique_hh_inc_sources_actual',
    'direct_beneficiaries_actual',
    'num_children_actual',
    'num_women_actual',
    'num_hh_members_actual',
  ];

  protected $table = "program_measures";

}
