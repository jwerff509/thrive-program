<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'group_id', 'name', 'area_program', 'village_name'
    ];
}
