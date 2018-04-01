<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Nicolaslopezj\Searchable\SearchableTrait;

class GroupSurveyMembers extends Model
{

  use Eloquence;

  protected $primaryKey = 'group_survey_members_id';

  protected $fillable = [
    'group_survey_id',
    'nrc_number',
    'land_length',
    'land_width'
  ];

  public function groupSurvey()
  {
    return $this->belongsTo(GroupSurvey::class, 'group_survey_id');
  }

}
