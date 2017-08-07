<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupDetails extends Model
{

    protected $fillable = [
      'group_id', 'report_term', 'report_term_description', 'year', 'savings_group', 'account_balance', 'producers_group', 'value_chain', 'value_chain_unit', 'sales_price', 'sales_locations'
    ];

    public function groups()
    {
      return $this->belongsTo(Group::class);
    }

    public function salesLocations()
    {
      return $this->hasMany('App\GroupSalesLocations');
    }

}
