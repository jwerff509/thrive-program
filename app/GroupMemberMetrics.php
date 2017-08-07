<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMemberMetrics extends Model
{

    protected $fillable = [
      'group_details_id', 'member_id', 'improved_seed', 'improved_storage', 'improved_practices', 'hectares_with_irrigation', 'accessed_vf_loan', 'crop_insurance',
      'hectares_harvested', 'kgs_harvested', 'sold_value_chain_product', 'hectares_reclaimed', 'hectares_under_conservation', 'water_catchment_used', 'emergency_savings',
      'use_ews', 'ewv_training', 'mindset_change'
    ];

}
