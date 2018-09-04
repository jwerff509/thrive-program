<?php

namespace App\Http\Controllers;
use App\Country;
use App\ProgramMeasures;
use Illuminate\Http\Request;

class ProgramMeasuresController extends Controller
{

  protected $rules = [
      'country_id' => ['required'],
      'reporting_term' => ['required'],
      'year' => ['required'],
      'improved_seed_actual' => ['required', 'numeric'],
      'improved_storage_actual' => ['required', 'numeric'],
      'improved_tools_actual' => ['required', 'numeric'],
      'farmers_with_irrigation_actual' => ['required', 'numeric'],
      'increase_in_yield_per_hectare_actual' => ['required', 'numeric'],
      'ha_with_irrigation_actual' => ['required', 'numeric'],
      'num_savings_groups_actual' => ['required', 'numeric'],
      'num_savings_group_members_actual' => ['required', 'numeric'],
      'savings_groups_total_balance_actual' => ['required', 'numeric'],
      'members_with_vf_loan_actual' => ['required', 'numeric'],
      'farmers_with_vc_ins_actual' => ['required', 'numeric'],
      'num_producers_groups_actual' => ['required', 'numeric'],
      'num_producers_group_members_actual' => ['required', 'numeric'],
      'num_prod_groups_sell_vc_product_actual' => ['required', 'numeric'],
      'num_prod_groups_local_markets_actual' => ['required', 'numeric'],
      'num_prod_groups_expanded_markets_actual' => ['required', 'numeric'],
      'hectares_reclaimed_for_ag_actual' => ['required', 'numeric'],
      'hectares_farmed_soil_water_cons_actual' => ['required', 'numeric'],
      'farmers_using_water_catchment_actual' => ['required', 'numeric'],
      'comm_watershed_rehab_actual' => ['required', 'numeric'],
      'trees_planted_actual' => ['required', 'numeric'],
      'members_with_emer_savings_actual' => ['required', 'numeric'],
      'farmers_using_ews_actual' => ['required', 'numeric'],
      'members_received_ewv_training_actual' => ['required', 'numeric'],
      'ewv_trainees_attest_value_trans_actual' => ['required', 'numeric'],
      'faith_leaders_in_ewv_training_actual' => ['required', 'numeric'],
      'groups_undertaking_political_rep_actual' => ['nullable', 'numeric'],
      'participants_trained_in_cva_actual' => ['nullable', 'numeric'],
      'groups_trained_in_cva_actual' => ['nullable', 'numeric'],
      'children_given_care_by_groups_actual' => ['required', 'numeric'],
      'unique_hh_inc_sources_actual' => ['required', 'numeric'],
      'direct_beneficiaries_actual' => ['required', 'numeric'],
      'num_children_actual' => ['required', 'numeric'],
      'num_women_actual' => ['required', 'numeric'],
      'num_hh_members_actual' => ['required', 'numeric'],
  ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {

      $countries = Country::pluck('name', 'country_id')->all();
      return view('program_measures.create', compact('countries'));

    }

    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

    public function store(Request $request) {

      $this->validate($request, $this->rules);

      $quarter = $request->year .'-'. $request->reporting_term;
      $request['quarter'] = $quarter;

      ProgramMeasures::create($request->all());

      $request->session()->flash('alert-success', 'Quarterly data added successfully!');
      return redirect()->route('home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id) {

      $measure = ProgramMeasures::find($id);
      return view('program_measures.edit',compact('measure'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id) {

        request()->validate([
        ]);

        ProgramMeasures::find($id)->update($request->all());
        return redirect()->route('program_measures.index')->with('success','Program measures updated successfully!');

    }

  }
