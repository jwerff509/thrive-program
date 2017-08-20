<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'group_id', 'name', 'area_program', 'zone', 'village_name'
    ];

    public function groupDetails()
    {
      return $this->hasMany(GroupDetails::class);
    }
}
