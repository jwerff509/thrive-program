<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\GroupMemberMetrics;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
Use DB;

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

      /*
      **  See this link - you need to change this function around!!!!
      **
      **  After the $members query, you need the IF statement - if there are members, send them to the edit group members page
      **  If there aren't any members, send them to the create group members page.
      **
      **  https://selftaughtcoders.com/from-idea-to-launch/lesson-23/laravel-5-application-form-model-binding-laravelcollective-forms-html-library-bootstrap-framework/
      **
      */

      // Get the group
      $group = Group::find($groupID);

      // Get the group details record
      $groupDetails = GroupDetails::find($groupDetailsID);
      // Get the reporting terms
      // This needs to be added later


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


      return view('group_member_details.create', compact('group', 'groupDetails', 'members'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$inputs = $request->all();

        //$inputs = Input::get('member_id');

        $data = array(
          'nrc_number' => $request->nrc_number,
          'family_name' => $request->family_name,
          'other_name' => $request->other_name,
          'sex' => $request->sex,
          'phone_number' => $request->phone_number
        );



        foreach($request as $key => $value) {


        }


        exit;



        $this->validate($request, $this->rules);

        $input = Input::all();
        $newMember = GroupMemberMetrics::insert($input);
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
