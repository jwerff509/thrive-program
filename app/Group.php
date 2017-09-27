<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Group extends Model
{

  use Eloquence;

  protected $searchableColumns = ['name'];


  protected $fillable = [
    'group_id', 'name', 'area_program', 'zone', 'village_name'
  ];

  public function groupDetails()
  {
    return $this->hasMany(GroupDetails::class);
  }

}
