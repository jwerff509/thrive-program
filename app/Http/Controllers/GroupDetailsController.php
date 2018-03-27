<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\ValueChains;
use App\ReportingTerms;
use App\Vegetables;
use App\ValueChainUnits;
use App\AreaProgram;
use App\Zone;
use App\Village;
use App\SurveyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;


class GroupDetailsController extends Controller
{

    protected $rules = [

        // Rules from Groups Controller
        'group_id' => ['nullable', 'numeric'],
        'group_name' => ['required', 'max:191'],
        'zone' => ['required', 'max:191'],
        'area_program' => ['required', 'max:191'],
        'village_name' => ['required', 'max:191'],

        // Rules for GroupDetails Controller
        'reporting_term' => ['required'],
        'year' => ['required'],
        'data_collector' => ['required'],
    ];

    public function group()
    {

      return $this->belongsTo('App\Group');

    }

    public function group_members()
    {

      return $this->hasMany('App\GroupMembers');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group_details.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // Original function call
    //public function create($id)

    // New fuction call
    public function create()
    {

        //$test = Input::get();
        /*
        $groupID = session('group_id');
        $group_name = session('group_name');
        $area_program_id = session('area_program');
        $zone = session('zone');
        $village_name = session('village_name');
        */

        //$group = Group::find($id);
        // Testing out combining the "group" form and the group_details form
        $groups = Group::pluck('name', 'group_id');
        $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();

        $valueChains = ValueChains::pluck('description', 'id')->all();
        $reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        $vegetables = Vegetables::pluck('description', 'id')->all();
        $valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();

        // Get the reporting terms
        // This needs to be added later

        // Original view
        //return view('group_details.create', compact('valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations'));

        // New view that combines old Groups with Group Details
        return view('group_details.create', compact('groups', 'areaPrograms', 'valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ind_survey_details()
    {

      //$groups = Group::all();
      //$dbGroups = $groups->pluck('group_id', 'name');



        // Get the group
        //$group = Group::find($id);

        // Testing out combining the "group" form and the group_details form
        $groups = Group::pluck('name', 'group_id');
        $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();

        $valueChains = ValueChains::pluck('description', 'id')->all();
        $reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        $vegetables = Vegetables::pluck('description', 'id')->all();
        $valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();

        // Get the reporting terms
        // This needs to be added later

        return view('group_details.individual.create', compact('groups', 'areaPrograms', 'valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations'));

    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $term = Input::get('reporting_term');
      $year = Input::get('year');

      $this->validate($request, $this->rules);

      if(is_null($request->sales_location)) {

        $input = Input::all();

      } else {

        $input = $request->except(['sales_location']);
        $salesLocations = Input::get('sales_location[]');

        $temp = '';

        foreach($request->sales_location as $salesLocation) {

          $temp = $temp . $salesLocation .", ";

        }

        $input['sales_locations'] = $temp;

      }

      $next = Input::get('submitbutton');

      /*
      -- 3/25/18 - New Code. I combined the original group_create and group_details_create forms.
      -- So now I have to validate the group, zone, and village first. Then create the new
      -- survey_details record. Once I have that ID I can save the group_details record.
      */
      if($input['group_id'] == '') {
        // Create a new group and get the Group ID.
        $name = [
          'name' => $input['group_name']
        ];
        $newGroup = Group::create($name);
        $groupID = $newGroup->id;

      } else {
        $groupID = $input['group_id'];
      }

      if($input['zone_id'] == '') {
        // Create a new zone and get the zone ID.
        $name = [
          'name' => $input['zone_name']
        ];
        $newZone = Zone::create($name);
        $zoneID = $newZone->id;

      } else {
        $zoneID = $input['zone_id'];
      }

      if($input['village_id'] == '') {
        // Create a new group and get the Group ID.
        $name = [
          'name' => $input['village_name']
        ];
        $newVillage = Village::create($name);
        $villageID = $newVillage->id;

      } else {
        $villageID = $input['village_id'];
      }

      // Create a new survey_details record
      $details = [
        'group_id' => $groupID,
        'area_program_id' => Input::get('area_program'),
        'zone_id' => $zoneID,
        'village_id' => $villageID
      ];

      $newSurveyDetails = SurveyDetails::create($details);
      $surveyDetailsID = $newSurveyDetails->survey_details_id;

      $input['survey_details_id'] = $surveyDetailsID;

      $newGroupDetails = GroupDetails::create($input);

      // This should no longer be needed
      //$lastGroupID = Input::get('group_id');

      $groupDetailsID = $newGroupDetails->id;

      if($next == 'Add Group Members') {

        return Redirect()->action(
          //'GroupMemberMetricsController@create', [$lastSurveyID, $lastGroupDetailsID]
          'GroupMemberMetricsController@create', compact('surveyDetailsID', 'groupDetailsID')

        );

      } else {

        return Redirect()->action(
          //'PersonController@create', [$lastSurveyID, $lastGroupDetailsID]
          'PersonController@create', compact('surveyDetailsID', 'groupDetailsID')
        );

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
      $data = Group::select('group_id', 'name')->where("name", "LIKE", "%". $query ."%")->get();
      return response()->json($data);
    }


    public function zonesFind($query)
    {
      $data = Zone::select('zone_id', 'name')->where("name", "LIKE", "%". $query ."%")->get();
      return response()->json($data);
    }

    public function villagesFind($query)
    {
      $data = Village::select('village_id', 'name')->where("name", "LIKE", "%". $query ."%")->get();
      return response()->json($data);
    }

}
