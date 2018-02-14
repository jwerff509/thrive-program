<?php

namespace App\Http\Controllers;

use App\PersonSurvey;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class PersonController extends Controller
{

    protected $rules = [
        'member_id' => ['required'],
        'last_name' => ['required', 'max:191'],
        'first_name' => ['required', 'max:191'],
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
    public function create()
    {
          return view('person.create');
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

      $newPerson = PersonSurvey::create($input);

      $last_inserted = $newPerson->id;
      $next = Input::get('submitbutton');

      If($next == 'Save and Add Another')
      {
        $lastGroupID = Input::get('group_id');
        $lastGroupDetailsID = Input::get('group_details_id');

        return Redirect()->action(
          'PersonController@create', [$last_inserted]
        );
      } else {
        return view('home');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
