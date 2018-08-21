<?php

namespace App\Http\Controllers;

use DB;
use App\Group;
use App\ValueChains;
use App\ReportingTerms;
use App\Vegetables;
use App\ValueChainUnits;
use App\AreaProgram;
use App\Zone;
use App\Village;
use App\SurveyDetails;
use App\Person;
use App\GroupSurvey;
use App\APZones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;


class GroupSurveysController extends Controller
{

    protected $rules = [
        'group_name' => ['required', 'max:191'],
        'zone' => ['required', 'max:191'],
        'area_program' => ['required', 'max:191'],
        'village_name' => ['required', 'max:191'],
        'reporting_term' => ['required'],
        'year' => ['required'],
        'nrc_number' => ['required'],
        'family_name' => ['required'],
        'other_name' => ['required']
  //      'data_collector' => ['required'],
    ];

    public function group_survey_members()
    {
      return $this->hasMany('App\GroupSurveyMembers');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group_surveys.create');
    }

    /**
     * Show the form for creating a new group_survey with a members list.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = Group::pluck('name', 'group_id');
        $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();
        $valueChains = ValueChains::pluck('description', 'id')->all();
        $reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        $vegetables = Vegetables::pluck('description', 'id')->all();
        $valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();

        return view('group_surveys.create', compact('groups', 'areaPrograms', 'valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations', 'apZones'));

    }

    /**
     * Show the form for creating step 1 of a new group_survey with a members list.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1(Request $request)
    {

        $groups = Group::pluck('name', 'group_id');
        $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();
        $valueChains = ValueChains::pluck('description', 'id')->all();
        $reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        $vegetables = Vegetables::pluck('description', 'id')->all();
        $valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();
        $survey = $request->session()->get('survey');

        return view('group_surveys.create-step1', compact('groups', 'areaPrograms', 'valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations', 'apZones', 'survey', $survey));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Request $request)
    {

        //$groups = Group::pluck('name', 'group_id');
        //$areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();
        //$valueChains = ValueChains::pluck('description', 'id')->all();
        //$reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        //$vegetables = Vegetables::pluck('description', 'id')->all();
        //$valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();

        $validatedData = $this->validate($request, $this->rules);

        if(empty($request->session()->get('survey'))) {
          $survey = new GroupSurvey();
          $survey->fill($validatedData);
          $request->session()->put('survey', $survey);
        } else {
          $survey = $request->session()->get('survey');
          $survey->fill($validatedData);
          $request->session()->put('survey', $survey);
        }

        return redirect('/group_surveys/create-step2');
    }




    /**
     * Show the form for creating a new group_survey with individual data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {

        $groups = Group::pluck('name', 'group_id');
        $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();
        $valueChains = ValueChains::pluck('description', 'id')->all();
        $reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        $vegetables = Vegetables::pluck('description', 'id')->all();
        $valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();

        return view('group_surveys.create2', compact('groups', 'areaPrograms', 'valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //$term = Input::get('reporting_term');
      //$year = Input::get('year');

      $this->validate($request, $this->rules);

      if(is_null($request->sales_locations)) {

        $input = Input::all();
        //$input = $request->except(['nrc_number', 'family_name', 'other_name', 'sex', 'phone_number', 'land_width', 'land_length']);

      } else {

        //$input = $request->except(['sales_location', 'nrc_number', 'family_name', 'other_name', 'sex', 'phone_number', 'land_width', 'land_length']);
        $input = $request->except(['sales_locations[]']);
        $salesLocations = Input::get('sales_locations[]');

        $temp = '';

        foreach($request->sales_locations as $salesLocation) {
          $temp = $temp . $salesLocation .", ";
        }

        $input['sales_locations'] = $temp;

      }

      $next = Input::get('submitbutton');

      // Check to see if the group, zone, and village exist already
      // If not, then we need to insert the new records before continuing
      if($input['group_id'] == '') {

        $name = [
          'name' => $input['group_name']
        ];

        // Check to see if the group name exists - doing this to prevent duplicates.
        // The typeahead functionality sometimes does not pick up the group name.
        $exists = Group::where('name', '=', $name['name'])->first();

        if(is_null($exists)) {
          // Create a new group and get the Group ID.
          $newGroup = Group::create($name);
          $groupID = $newGroup->group_id;
        } else {
          $groupID = $exists->group_id;
        }

      } else {
        $groupID = $input['group_id'];
      }

      if($input['zone_id'] == '') {
        // Create a new zone and get the zone ID.
        $name = [
          'name' => $input['zone']
        ];

        // Check to see if the zone name exists - doing this to prevent duplicates.
        // The typeahead functionality sometimes does not pick up the zone name.
        $exists = Zone::where('name', '=', $name['name'])->first();

        if(is_null($exists)) {
          // Create a new group and get the Group ID.
          $newZone = Zone::create($name);
          $zoneID = $newZone->id;
        } else {
          $zoneID = $exists->zone_id;
        }

      } else {
        $zoneID = $input['zone_id'];
      }

      if($input['village_id'] == '') {
        // Create a new group and get the Group ID.
        $name = [
          'name' => $input['village_name']
        ];

        // Check to see if the village name exists - doing this to prevent duplicates.
        // The typeahead functionality sometimes does not pick up the village name.
        $exists = Village::where('name', '=', $name['name'])->first();

        if(is_null($exists)) {
          // Create a new group and get the Group ID.
          $newVillage = Village::create($name);
          $villageID = $newVillage->id;
        } else {
          $villageID = $exists->village_id;
        }

      } else {
        $villageID = $input['village_id'];
      }

      // update the relevant id's on the input
      $input['group_id'] = $groupID;
      $input['area_program_id'] = Input::get('area_program');
      $input['zone_id'] = $zoneID;
      $input['village_id'] = $villageID;

      // We need to convert the land length and width to hectares before inserting it.
      // One hectare is equal to 10,000 square meters.

      $length = Input::get('hectares_reclaimed_length');
      $width = Input::get('hectares_reclaimed_width');
      $hectares = ($length * $width / 10000);

      $input['hectares_reclaimed'] = $hectares;

      // Insert the record into the model
      $groupSurvey = GroupSurvey::create($input);

      // Need to check to see if any/all of the members exist already
      // If they do then we only need to insert their nrc_number and land dimensions
      // If they don't exist, we need to add them to the person table before
      // inserting them into the group_survey_members table.
      /*
      foreach($request->nrc_number as $key => $value) {

        if($request->nrc_number[$key] <> '') {

          // Need to add the member to the group if they haven't been added already
          $exists = Person::where('nrc_number', '=', $request->nrc_number[$key])
                          ->count();

          // If the person record doesn't exist, we need to create it
          if($exists == 0) {

            Person::insert(
              [
                'nrc_number' => $request->nrc_number[$key],
                'family_name' => $request->family_name[$key],
                'other_name' => $request->other_name[$key],
                'sex' => $request->sex[$key],
                'phone_number' => $request->phone_number[$key]
            ]);

          }

          // Once we know the member is in the person table we can insert them
          // into the group_survey_members table after formatting the array.
          $member = array(
            'nrc_number' => $request->nrc_number[$key],
            'land_length' => $request->land_length[$key],
            'land_width' => $request->land_width[$key],
          );

          $groupSurvey->GroupSurveyMembers()->create($member);

        }

      } // End foreach
      */

      $request->session()->flash('alert-success', 'Survey was successfully added!');

      return redirect()->route('home');

    } // End function Store()


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {

      $this->validate($request, $this->rules);

      $input = Input::all();

      $next = $input['submitbutton'];

      // Check to see if the group, zone, and village exist already
      // If not, then we need to insert the new records before continuing

      if($input['group_id'] == '') {
        // Create a new group and get the Group ID.
        $name = [
          'name' => $input['group_name']
        ];

        // Check to see if the group name exists - doing this to prevent duplicates.
        // The typeahead functionality sometimes does not pick up the group name.
        $exists = Group::where('name', '=', $name['name'])->first();

        if(is_null($exists)) {
          // Create a new group and get the Group ID.
          $newGroup = Group::create($name);
          $groupID = $newGroup->group_id;
        } else {
          $groupID = $exists->group_id;
        }

      } else {
        $groupID = $input['group_id'];
      }

      if($input['zone_id'] == '') {
        // Create a new zone and get the zone ID.
        $name = [
          'name' => $input['zone']
        ];

        // Check to see if the zone name exists - doing this to prevent duplicates.
        // The typeahead functionality sometimes does not pick up the zone name.
        $exists = Zone::where('name', '=', $name['name'])->first();

        if(is_null($exists)) {
          // Create a new group and get the Group ID.
          $newZone = Zone::create($name);
          $zoneID = $newZone->id;
        } else {
          $zoneID = $exists->zone_id;
        }

      } else {
        $zoneID = $input['zone_id'];
      }

      if($input['village_id'] == '') {
        // Create a new group and get the Group ID.
        $name = [
          'name' => $input['village_name']
        ];

        // Check to see if the village name exists - doing this to prevent duplicates.
        // The typeahead functionality sometimes does not pick up the village name.
        $exists = Village::where('name', '=', $name['name'])->first();

        if(is_null($exists)) {
          // Create a new group and get the Group ID.
          $newVillage = Village::create($name);
          $villageID = $newVillage->id;
        } else {
          $villageID = $exists->village_id;
        }

      } else {
        $villageID = $input['village_id'];
      }

      $gsInfo[] = "";

      // update the relevant id's on the input
      $gsInfo['group_id'] = $groupID;
      $gsInfo['area_program_id'] = Input::get('area_program');
      $gsInfo['zone_id'] = $zoneID;
      $gsInfo['village_id'] = $villageID;
      $gsInfo['reporting_term'] = $input['reporting_term'];
      $gsInfo['year'] = $input['year'];
      $gsInfo['data_collector'] = $input['data_collector'];

      // We need to convert the land length and width to hectares before inserting it.
      // One hectare is equal to 10,000 square meters.
      /* Deprecated on 8/1/2018 - JV.
      $length = Input::get('hectares_reclaimed_length');
      $width = Input::get('hectares_reclaimed_width');
      $hectares = ($length * $width / 10000);
      $input['hectares_reclaimed'] = $hectares;
      */

      // Create a new GroupSurvey object and get its ID
      $groupSurvey = GroupSurvey::create($gsInfo);

      // Need to check to see if the member exists in the person table already
      // If they don't exist, we need to add them to the person table before
      // inserting them into the group_survey_individuals table.

      $exists = Person::where('nrc_number', '=', $request->nrc_number)
                      ->count();

      // If the person record doesn't exist, we need to create it
      if($exists == 0) {

        Person::insert(
          [
            'nrc_number' => $request->nrc_number,
            'family_name' => $request->family_name,
            'other_name' => $request->other_name
        ]);

      }

      // Once we know the member is in the person table we can insert them
      // into the group_survey_individuals table after formatting the array.
      $member = array(

        'nrc_number' => $request->nrc_number,
        'savings_group_member' => $request->savings_group_member,
        'producers_group_member' => $request->producers_group_member,
        'improved_seed' => $request->improved_seed,
        'improved_storage' => $request->improved_storage,
        'improved_practices' => $request->improved_practices,
        'hectares_with_irrigation' => $request->hectares_with_irrigation,
        'accessed_vf_loan' => $request->accessed_vf_loan,
        'crop_insurance' => $request->crop_insurance,
        'hectares_harvested' => $request->hectares_harvested,
        'sell_vc_at_market' => $request->sell_vc_at_market,
        'hectares_reclaimed' => $request->hectares_reclaimed,
        'hectares_under_conservation' => $request->hectares_under_conservation,
        'water_catchment_used' => $request->water_catchment_used,
        'emergency_savings' => $request->emergency_savings,
        'use_ews' => $request->use_ews,
        'ewv_training' => $request->ewv_training,
        'mindset_change' => $request->mindset_change

      );

      $groupSurvey->GroupSurveyIndividual()->create($member);

      // Show a modal here with the success message and ask what they want to do
      // either enter more members data, or save and close out of the survey.

      //return redirect()->route('home');


      if($next == 'Save & Close Survey') {

        $request->session()->flash('alert-success', 'Survey was successfully added!');
        return redirect()->route('home');

      } else {

        $parameters = [
          'group_id' => $gsInfo['group_id'],
          'group_name' => $request['group_name'],
          'area_program_id' => $gsInfo['area_program_id'],
          'area_program' => $request['area_program'],
          'zone_id' => $gsInfo['zone_id'],
          'zone' => $request['zone'],
          'village_id' => $gsInfo['village_id'],
          'village_name' => $request['village_name'],
          'reporting_term' => $gsInfo['reporting_term'],
          'year' => $gsInfo['year'],
          'data_collector' => $gsInfo['data_collector']
        ];

        $request->session()->flash('alert-success', 'Group member was successfully added!');
        return redirect()->back()->with($parameters);
        //return redirect()->back()->withInput($request->only('group_id', 'group_name', 'area_program', 'zone', 'village_name', 'reporting_term', 'year', 'data_collector'));

      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupDetails  $groupDetails
     * @return \Illuminate\Http\Response
     */
    public function show(GroupDetails $groupDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupDetails  $groupDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupDetails $groupDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupDetails  $groupDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupDetails $groupDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupDetails  $groupDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupDetails $groupDetails)
    {
        //
    }

    public function groupsFind($query)
    {
      $data = Group::select('group_id', 'name')->where("name", "LIKE", "%". $query ."%")->orderBy('name')->get();
      return response()->json($data);
    }

    //public function zonesFind($query)
    public function zonesFind(Request $request)
    {
      //$data = Zone::select('zone_id', 'name')->where("name", "LIKE", "%". $query ."%")->orderBy('name')->get();
      //return response()->json($data);

      $apZones = DB::table('zones')
                    ->join('area_program_zones', 'zones.zone_id', '=', 'area_program_zones.zone_id')
                    ->select('zones.zone_id', 'zones.name')
                    ->where('area_program_zones.area_program_id', '=', $request->area_program)
                    ->get();
      $data = view('group_surveys.partials._zone-select', compact($apZones))->render();
      //'apZones' = json_encode($apZones);
      return response()->json(['options' => $data]);
    }

    public function villagesFind($query)
    {
      $data = Village::select('village_id', 'name')->where("name", "LIKE", "%". $query ."%")->orderBy('name')->get();
      return response()->json($data);
    }

    // This needs work - have to join to zones table to get zone name
    public function apZonesFind($area_program) {
      $apZones = DB::table('zones')
                    ->join('area_program_zones', 'zones.zone_id', '=', 'area_program_zones.zone_id')
                    ->select('zones.zone_id', 'zones.name')
                    ->where('area_program_zones.area_program_id', '=', $area_program)
                    ->get();
      $data = view('group_surveys/partials/_zone-select', compact($apZones))->render();
      //'apZones' = json_encode($apZones);
      return response()->json(['options' => $data]);
    }

}
