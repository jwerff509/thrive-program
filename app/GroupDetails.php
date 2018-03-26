<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupDetails extends Model
{

    protected $fillable = [
      'survey_details_id',
      'reporting_term',
      'report_term_date',
      'year', 'group_type',
      'savings_group_members',
      'members_that_reclaimed_land',
      'account_balance',
      'group_meetings',
      'primary_value_chain',
      'primary_vegetable_grown',
      'units_harvested',
      'improved_seed',
      'improved_storage',
      'improved_tools',
      'members_with_irrigation',
      'members_with_vf_loan',
      'members_with_crop_ins',
      'hectares_reclaimed1',
      'members_using_soil_water_cons',
      'members_using_ripping',
      'members_using_mulching',
      'members_using_composting_liming',
      'members_using_crop_rotation',
      'members_using_multiple_techniques',
      'members_using_water_catchment',
      'members_using_contour_ridges',
      'members_using_vetiver_grass',
      'members_using_weir',
      'members_using_fallow',
      'value_chain_unit',
      'units_sold',
      'sales_price',
      'sales_locations',
      'trees_planted',
      'hectares_reclaimed2',
      'members_with_emergency_savings',
      'ews_established',
      'members_attended_ewv_training',
      'data_collector',
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
