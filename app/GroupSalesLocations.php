<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupSalesLocations extends Model
{

    protected $fillable = [
      'group_details_id', 'sales_location'
    ];

    public function groupDetails()
    {
      return $this->belongsTo('App\GroupDetails');
    }

}
