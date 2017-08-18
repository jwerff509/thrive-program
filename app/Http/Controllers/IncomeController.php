<?php

namespace App\Http\Controllers;

use App\Income;
use App\Person;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class IncomeController extends Controller
{

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
    public function create($id)
    {

      // Get the person/household
      $person = Person::find($id);

      // Future improvement - split out the income into it's own table and
      // let them choose it from a dropdown list. Put that logic to populate
      // the list here.


      // Get the reporting terms
      // This needs to be added later
      return view('income.create')->with('person', $person);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $personID = Input::get('person_id');

      foreach($request->income_source as $key=>$income_source)
      {

        If($income_source != Null) {

          $income = new Income();
          $income->person_id = $personID;
          $income->income_source = $income_source;
          $income->yearly_income = $request->yearly_income[$key];

          $income->save();

        }

      }

      return Redirect()->action(
        'PpiController@create', [$personID]
      );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
