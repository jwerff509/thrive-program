<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\Country;
use App\AreaProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class GroupsController extends Controller
{

    protected $rules = [
        'group_id' => ['nullable', 'numeric'],
        'name' => ['required', 'max:191'],
        'zone' => ['required', 'max:191'],
        'area_program' => ['required', 'max:191'],
        'village_name' => ['required', 'max:191'],
    ];

    public function group_details()
    {

      return $this->hasMany('App\GroupDetails');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }



    /**
     * Show the form for creating a new group with member list survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$groups = Group::all();

        $groups = Group::pluck('name', 'group_id');
        $areaPrograms = AreaProgram::pluck('name', 'area_program_id')->all();

        //return view('groups.create', ['groups' => $dbGroups]);
        return view('groups.create', compact('groups', 'areaPrograms'));
    }



    /**
     * Show the form for creating a new group with individual data survey
     *
     * @return \Illuminate\Http\Response
     */
    public function ind_survey()
    {

        $groups = Group::all();
        $dbGroups = $groups->pluck('group_id', 'name');
        return view('groups.individual.create', ['groups' => $dbGroups]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // Old function header below, may need to restore this
    //public function store(Request $request)
    public function store(Request $request)
    {

        $this->validate($request, $this->rules);

        $input = Input::all();

        $request->session()->put('group_id', $request->id);
        $request->session()->put('group_name', $request->name);
        $request->session()->put('area_program', $request->area_program);
        $request->session()->put('zone', $request->zone);
        $request->session()->put('village_name', $request->village_name);


        //$newGroup = Group::create($input);
        //$last_inserted = $newGroup->id;
        $next = Input::get('submitbutton');

        if($next == 'Add Members List') {

          return Redirect()->action(
            //'GroupDetailsController@create', [$last_inserted]);
            'GroupDetailsController@create', compact($input));

        } else {

          return Redirect()->action(
            'GroupDetailsController@ind_survey_details', [$last_inserted]);

        }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
     /*
    public function show()
    {

        // Get the group
        $groups = Group::all();

        $dbGroups = $groups->pluck('id', 'name', 'area_program', 'village_name');

        //Show the view and pass the group to it
        return view('groups.search')->with('groups', json_encode($dbGroups));

    }
    */



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('groups'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Group $group)
    public function update(Group $group)
    {
        $input = array_except(Input::all(), '_method');
        $group->update($input);

        return Redirect::route('groups.show', $group->id)->with('message', 'Group Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return Redirect::route('groups.index')->with('message', 'Group Deleted Successfully');
    }

/* This was used for Select2js, which I never got working. Using bootstrap typeahed instead
   which is the function below this one.

    public function find(Request $request)
    {

      $term = trim($request->q);

      if(empty($term)) {
        return \Response::json([]);
      }

      $groups = Group::search($term)->limit(10)->get();

      $formatted_groups = [];

      foreach ($groups as $group) {
        $formatted_groups[] = ['id' => $group->id, 'name' => $group->name];
      }

      return \Response::json($formatted_groups);

    }
*/


//    public function groupsFind(Request $request)
/*
    public function groupsFind($query)
    {

      //$data = Group::select('id', 'name')->where("name", "LIKE", "%{$request->input('query')}%")->get();
      $data = Group::select('group_id', 'name')->where("name", "LIKE", "%". $query ."%")->get();

      return response()->json($data);
      //return Group::select('name')->where("name", "LIKE", "%{$request->input('query')}%")->get();

    }
*/

/*
  Old function no longer used

    public function find (Request $request)
    {

      return Group::search($request->get('q'))->get();

    }
*/



}
