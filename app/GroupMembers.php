<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model
{

    protected $fillable = [
      'group_id', 'nrc_number'
    ];

}
