<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
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

        // Get the reporting terms
        // This needs to be added later

        return view('group_details.create')->with('group', $group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $input = $request->except(['sales_location']);
      $salesLocations = Input::get('sales_location[]');

      $temp = '';
      foreach($request->sales_location as $salesLocation) {

        $temp = $temp . $salesLocation .", ";

      }

      $input['sales_locations'] = $temp;
      $newGroupDetails = GroupDetails::create($input);
      $lastGroupID = Input::get('group_id');
      $lastGroupDetailsID = $newGroupDetails->id;

      return Redirect()->action(
        'GroupMemberMetricsController@create', [$lastGroupID, $lastGroupDetailsID]
      );

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