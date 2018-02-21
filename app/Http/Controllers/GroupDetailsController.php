<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\ValueChains;
use App\ReportingTerms;
use App\Vegetables;
use App\ValueChainUnits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class GroupDetailsController extends Controller
{
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
    public function create($id)
    {

        // Get the group
        $group = Group::find($id);

        $valueChains = ValueChains::pluck('description', 'id')->all();
        $reportingTerms = ReportingTerms::pluck('description', 'id')->all();
        $vegetables = Vegetables::pluck('description', 'id')->all();
        $valueChainUnits = ValueChainUnits::pluck('description', 'id')->all();

        // Get the reporting terms
        // This needs to be added later

        return view('group_details.create', compact('group', 'valueChains', 'reportingTerms', 'vegetables', 'valueChainUnits', 'salesLocations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

      //$rptTerm = ReportingTerms::where('id', $request->reporting_term)->first();

      //$input['reporting_term'] = $rptTerm->id;

      $next = Input::get('submitbutton');

      $newGroupDetails = GroupDetails::create($input);

      $lastGroupID = Input::get('group_id');

      $lastGroupDetailsID = $newGroupDetails->id;

      if($next == 'Add Group Members') {

        return Redirect()->action(
          'GroupMemberMetricsController@create', [$lastGroupID, $lastGroupDetailsID]
        );

      } elseif($next == 'Add Individual Data (Beta)') {

        return Redirect()->action(
          'PersonController@create2', [$lastGroupID, $lastGroupDetailsID]
        );

      } else {

        return Redirect()->action(
          'PersonController@create', [$lastGroupID, $lastGroupDetailsID]
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
}
