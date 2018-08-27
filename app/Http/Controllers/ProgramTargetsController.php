<?php

namespace App\Http\Controllers;
use App\Country;
use App\ProgramTargets;
use Illuminate\Http\Request;

class ProgramTargetsController extends Controller
{

  protected $rules = [
      'country_id' => ['required'],
      'improved_seed_target' => ['required', 'numeric'],
      'improved_storage_target' => ['required', 'numeric'],
      'improved_tools_target' => ['required', 'numeric'],
      'farmers_with_irrigation_target' => ['required', 'numeric'],
      'increase_in_yield_per_hectare_target' => ['required', 'numeric'],
      'ha_with_irrigation_target' => ['required', 'numeric'],
      'num_savings_groups_target' => ['required', 'numeric'],
      'num_savings_group_members_target' => ['required', 'numeric'],
      'savings_groups_total_balance_target' => ['required', 'numeric'],
      'members_with_vf_loan_target' => ['required', 'numeric'],
      'farmers_with_vc_ins_target' => ['required', 'numeric'],
      'num_producers_groups_target' => ['required', 'numeric'],
      'num_producers_group_members_target' => ['required', 'numeric'],
      'num_prod_groups_sell_vc_product_target' => ['required', 'numeric'],
      'num_prod_groups_local_markets_target' => ['required', 'numeric'],
      'num_prod_groups_expanded_markets_target' => ['required', 'numeric'],
      'hectares_reclaimed_for_ag_target' => ['required', 'numeric'],
      'hectares_farmed_soil_water_cons_target' => ['required', 'numeric'],
      'farmers_using_water_catchment_target' => ['required', 'numeric'],
      'comm_watershed_rehab_target' => ['required', 'numeric'],
      'trees_planted_target' => ['required', 'numeric'],
      'members_with_emer_savings_target' => ['required', 'numeric'],
      'farmers_using_ews_target' => ['required', 'numeric'],
      'members_received_ewv_training_target' => ['required', 'numeric'],
      'ewv_trainees_attest_value_trans_target' => ['required', 'numeric'],
      'faith_leaders_in_ewv_training_target' => ['required', 'numeric'],
      'groups_undertaking_political_rep_target' => ['required', 'numeric'],
      'children_given_care_by_groups_target' => ['required', 'numeric'],
      'unique_hh_inc_sources_target' => ['required', 'numeric'],
      'direct_beneficiaries_target' => ['required', 'numeric'],
      'num_children_target' => ['required', 'numeric'],
      'num_women_target' => ['required', 'numeric'],
      'num_hh_members_target' => ['required', 'numeric'],
  ];

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function create() {

    $countries = Country::pluck('name', 'country_id')->all();
    return view('program_targets.create', compact('countries'));

  }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request) {

    $this->validate($request, $this->rules);

    ProgramTargets::create($request->all());

    $request->session()->flash('alert-success', 'LOP targets added successfully!');
    return redirect()->route('home');

  }

  /**
  * Lists the countries that have program targets that can be edited
  *
  *
  * @return \Illuminate\Http\Response
  */

 public function list() {

   $countries = Country::pluck('name', 'country_id')->all();
   return view('program_targets.edit',compact('countries'));

 }


   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function edit($id) {

    $target = ProgramTargets::find($id);
    return view('program_targets.edit',compact('target'));

  }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function update(Request $request, $id) {

    $this->validate($request, $this->rules);

    ProgramTargets::find($id)->update($request->all());
    return redirect()->route('program_targets.index')->with('success','Program targets updated successfully!');

  }

}
