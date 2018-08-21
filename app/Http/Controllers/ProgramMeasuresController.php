<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramMeasuresController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {

      return view('program_measures.create');

    }

    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

    public function store(Request $request) {

      // Need validation logic
      /*
      request()->validate([

      ]);
      */

      ProgramMeasures::create($request->all());
      return redirect()->route('program_targets.index')->with('success','Program measures added successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id) {

      $measure = ProgramMeasures::find($id);
      return view('program_measures.edit',compact('measure'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id) {

        request()->validate([
        ]);

        ProgramMeasures::find($id)->update($request->all());
        return redirect()->route('program_measures.index')->with('success','Program measures updated successfully!');

    }

  }
