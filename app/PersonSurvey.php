<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonSurvey extends Model
{

  protected $fillable = [
    'group_id', 'group_details_id', 'nrc_number', 'family_name', 'other_name', 'improved_seed', 'improved_storage', 'improved_practices', 'hectares_with_irrigation',
    'accessed_vf_loan', 'crop_insurance', 'hectares_harvested', 'kgs_harvested', 'vc_units_sold', 'hectares_reclaimed', 'hectares_under_conservation', 'water_catchment_used',
    'emergency_savings', 'use_ews', 'ewv_training', 'mindset_change'
  ];

  protected $table = 'person_surveys';

}
