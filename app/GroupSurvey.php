<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Nicolaslopezj\Searchable\SearchableTrait;

class GroupSurvey extends Model
{

  use Eloquence;

  //protected $primaryKey = 'group_survey_id';

  protected $fillable = [
    'group_id',
    'area_program_id',
    'zone_id',
    'village_id',
    'reporting_term',
    'year',
    'group_type',
    'num_savings_group_members',
    'members_that_reclaimed_land',
    'account_balance',
    'num_group_meetings',
    'primary_value_chain',
    'primary_vegetable_grown',
    'members_with_vf_loan',
    'units_harvested',
    'improved_seed',
    'improved_storage',
    'improved_tools',
    'members_with_irrigation',
    'members_with_crop_ins',
    'hectares_reclaimed',
    'members_using_soil_water_cons',
    'members_using_ripping',
    'members_using_mulching',
    'members_using_composting_liming',
    'members_using_crop_rotation',
    'members_using_multiple_techniques',
    'members_using_water_catchment',
    'members_using_contour_ridges',
    'members_using_vetiver_grass',
    'members_using_weir',
    'members_using_fallow',
    'value_chain_unit',
    'units_sold',
    'sales_price',
    'sales_locations',
    'trees_planted',
    'members_with_emergency_savings',
    'ews_established',
    'members_attended_ewv_training',
    'data_collector'
  ];

  public function groupSurveyMembers()
  {
    return $this->hasMany(GroupSurveyMembers::class);
  }

  public function groupSurveyIndividual()
  {
    return $this->hasMany(GroupSurveyIndividual::class);
  }

}
