<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\GroupMemberMetrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class GroupMemberMetricsController extends Controller
{

    protected $rules = [
      'member_id' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($groupID, $groupDetailsID)
    {

      // Get the group
      $group = Group::find($groupID);

      // Get the group details record
      $groupDetails = GroupDetails::find($groupDetailsID);
      // Get the reporting terms
      // This needs to be added later

      return view('group_member_details.create')->with('group', $group)->with('groupDetails', $groupDetails);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->rules);

        $input = Input::all();
        $newMember = GroupMemberMetrics::create($input);
        $next = Input::get('submitbutton');

        If($next == 'Save and Add Another')
        {
          $lastGroupID = Input::get('group_id');
          $lastGroupDetailsID = Input::get('group_details_id');

          return Redirect()->action(
            'GroupMemberMetricsController@create', [$lastGroupID, $lastGroupDetailsID]
          );
        } else {
          return view('home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupMemberMetrics  $groupMemberMetrics
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMemberMetrics $groupMemberMetrics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupMemberMetrics  $groupMemberMetrics
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupMemberMetrics $groupMemberMetrics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupMemberMetrics  $groupMemberMetrics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupMemberMetrics $groupMemberMetrics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupMemberMetrics  $groupMemberMetrics
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupMemberMetrics $groupMemberMetrics)
    {
        //
    }
}
