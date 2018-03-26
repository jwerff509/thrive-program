<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class SurveyDetails extends Model
{

  protected $fillable = [
    'group_id', 'area_program_id', 'zone_id', 'village_id'
  ];

  protected $primaryKey = 'survey_details_id';

}
