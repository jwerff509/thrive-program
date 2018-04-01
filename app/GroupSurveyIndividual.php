<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Nicolaslopezj\Searchable\SearchableTrait;

class GroupSurveyIndividual extends Model
{

  use Eloquence;

  //protected $primaryKey = 'group_survey_members_id';

  protected $fillable = [
    'group_survey_id',
    'nrc_number',
    'improved_seed',
    'improved_storage',
    'improved_practices',
    'hectares_with_irrigation',
    'accessed_vf_loan',
    'crop_insurance',
    'hectares_harvested',
    'kgs_harvested',
    'vc_units_sold',
    'hectares_reclaimed',
    'hectares_under_conservation',
    'water_catchment_used',
    'emergency_savings',
    'use_ews',
    'ewv_training',
    'mindset_change'
  ];

  public function groupSurvey()
  {
    return $this->belongsTo(GroupSurvey::class, 'group_survey_id');
  }

}
