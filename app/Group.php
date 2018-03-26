<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Nicolaslopezj\Searchable\SearchableTrait;

class Group extends Model
{

  use Eloquence;
  use SearchableTrait;

  protected $searchable = [
    'columns' => [
      'name' => 10,
    ],
  ];

  protected $searchableColumns = ['name'];

/* Old Groups table
  protected $fillable = [
    'group_id', 'name', 'area_program', 'zone', 'village_name'
  ];
*/

  // New Groups table
  protected $fillable = [
    'name', 'alternate_id'
  ];

  public function groupDetails()
  {
    return $this->hasMany(GroupDetails::class);
  }

}
