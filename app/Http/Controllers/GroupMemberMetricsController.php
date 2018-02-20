<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\GroupMemberMetrics;
use App\Person;
use App\ReportingTerms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
Use DB;

class GroupMemberMetricsController extends Controller
{

    protected $rules = [
      'nrc_number' => 'required',
      'family_name' => 'required|string',
      'other_name' => 'required|string',
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

      /*
      **  See this link - you need to change this function around!!!!
      **
      **  After the $members query, you need the IF statement - if there are members, send them to the edit group members page
      **  If there aren't any members, send them to the create group members page.
      **
      **  https://selftaughtcoders.com/from-idea-to-launch/lesson-23/laravel-5-application-form-model-binding-laravelcollective-forms-html-library-bootstrap-framework/
      **
      */



      /* When you get to the point of showing existing group members!
      **
      ** Have an "IF" statement - if there are members, redirect to the edit page
      ** If not, redirect to the create page.
      */


      // Get the group
      $group = Group::find($groupID);

      // Get the group details record
      $groupDetails = GroupDetails::find($groupDetailsID);

      // Get the reporting terms
      $rptTerm = ReportingTerms::find($groupDetails->reporting_term);



      //  Need to edit this code to display existing group members on this page!!!!

      //$members = Person::pluck('nrc_number', 'last_name', 'first_name', 'sex', 'cellphone_number');
      $members = DB::table('group_members')
              ->select('nrc_number', 'family_name', 'other_name', 'sex', 'phone_number')
              ->where('group_id', '=', $group->ID)
              ->get()->toArray();
      //$members = array_column($members, 'num_members');
      //$members = Person::find(1);
      //$members = Person::all();





      //$test = compact('members');
      //var_dump($members);
      //exit;

      //return view('group_member_details.create')->with('group', $group)->with('groupDetails', $groupDetails)->with('members', $members);


      return view('group_member_details.create', compact('group', 'groupDetails', 'members', 'rptTerm'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      foreach($request->nrc_number as $key => $value) {

        if($request->nrc_number[$key] <> '') {

/*
          $this->validate($request, [
            'nrc_number.*.nrc_number' => 'required|string',
            'nrc_number.*.family_name' => 'required|string',
          ]);
*/
          $member = array(

            'group_id' => Input::get('group_id'),
            'group_details_id' => Input::get('group_details_id'),
            'nrc_number' => $request->nrc_number[$key],
            'family_name' => $request->family_name[$key],
            'other_name' => $request->other_name[$key],
            'sex' => $request->sex[$key],
            'phone_number' => $request->phone_number[$key],

          );

          GroupMemberMetrics::insert($member);

        }

      }

      $request->session()->flash('alert-success', 'Group members saved successfully');

      return redirect()->route('home');

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
