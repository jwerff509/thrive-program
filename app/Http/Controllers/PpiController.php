<?php

namespace App\Http\Controllers;

use App\Ppi;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;


class PpiController extends Controller
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

        // Get the person
        $person = Person::find($id);

        return view('ppi.create')->with('person', $person);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input['nrc_number'] = Input::get('person_id');
        $next = Input::get('submitbutton');

        if($request->report_term_desc == 'October - December') {
          $rptDate = $request->year .'-12-31';
        } elseif ($request->report_term_desc == 'January - March') {
          $rptDate = $request->year .'-03-31';
        } elseif ($request->report_term_desc == 'April - June') {
          $rptDate = $request->year .'-06-30';
        } else {
          $rptDate = $request->year .'-09-30';
        }

        $input['report_term_date'] = $rptDate;

        $totalScore = 0;
        $totalScore += $request->question_1;
        $totalScore += $request->question_2;
        $totalScore += $request->question_3;
        $totalScore += $request->question_4;
        $totalScore += $request->question_5;
        $totalScore += $request->question_6;
        $totalScore += $request->question_7;
        $totalScore += $request->question_8;
        $totalScore += $request->question_9;
        $totalScore += $request->question_10;

        $input['total_ppi_score'] = $totalScore;

        $input += Input::all();
        $newPpi = Ppi::create($input);

        If($next == 'Save and Add Another Household')
        {
          return view('person.create');
        } else {
          return view('home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ppi  $ppi
     * @return \Illuminate\Http\Response
     */
    public function show(Ppi $ppi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ppi  $ppi
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppi $ppi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ppi  $ppi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ppi $ppi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ppi  $ppi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppi $ppi)
    {
        //
    }
}
