<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupDetails;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class GroupsController extends Controller
{

    protected $rules = [
        'group_id' => ['required', 'numeric'],
        'name' => ['required', 'max:191'],
        'zone' => ['required', 'max:191'],
        'area_program' => ['required', 'max:191'],
        'village_name' => ['required', 'max:191'],
    ];

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = Group::all();

        $dbGroups = $groups->pluck('name', 'id');

        return view('groups.create', ['groups' => $dbGroups]);
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

/*
        $countryData = Input::only('country');
        $country = new Country;
        $country->name = $countryData->country;
        $country->save();
*/

        //$input = Input::except('country');
        $input = Input::all();
        $newGroup = Group::create($input);

        $last_inserted = $newGroup->id;

        return Redirect()->action(
          'GroupDetailsController@create', [$last_inserted]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        // Get the group
        $groups = Group::all();

        $dbGroups = $groups->pluck('id', 'name', 'area_program', 'village_name');

        //Show the view and pass the group to it
        return view('groups.index')->with('groups', json_encode($dbGroups));


    }

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


    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Group::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }

}
