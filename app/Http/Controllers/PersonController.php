<?php

namespace App\Http\Controllers;

use App\PersonSurvey;
use App\Income;
use App\GroupMemberMetrics;
use App\Group;
use App\GroupDetails;
use App\ReportingTerms;
use App\SurveyDetails;
use App\AreaProgram;
use App\Zone;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class PersonController extends Controller
{

    protected $rules = [
        'nrc_number' => ['required'],
        'family_name' => ['required', 'max:191'],
        'other_name' => ['required', 'max:191'],
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
    public function create($surveyDetailsID, $groupDetailsID)
    {

      // Get the survey details
      $surveyDetails = SurveyDetails::find($surveyDetailsID);

      // Get the group details record
      $groupDetails = GroupDetails::find($groupDetailsID);

      // Get the reporting terms
      $rptTerm = ReportingTerms::find($groupDetails->reporting_term);

      // Build the header information
      $group = Group::select('name')->where('group_id', '=', $surveyDetails->group_id)->first()->toArray();
      $group_name = $group['name'];

      $ap = AreaProgram::select('name')->where('area_program_id', '=', $surveyDetails->area_program_id)->first()->toArray();
      $ap_name = $ap['name'];

      $zone = Zone::select('name')->where('zone_id', '=', $surveyDetails->zone_id)->first()->toArray();
      $zone_name = $zone['name'];

      $village = Village::select('name')->where('village_id', '=', $surveyDetails->village_id)->first()->toArray();
      $village_name = $village['name'];

      $header = [
        'group_name' => $group_name,
        'ap_name' => $ap_name,
        'zone_name' => $zone_name,
        'village_name' => $village_name,
        'reporting_term' => $rptTerm->description,
        'year' => $groupDetails->year
      ];


      return view('person.create', compact('header', 'groupDetails', 'members', 'surveyDetails'));

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

           'group_details_id' => Input::get('group_details_id'),
           'nrc_number' => $request->nrc_number[$key],
           'family_name' => $request->family_name[$key],
           'other_name' => $request->other_name[$key],
           'improved_seed' => $request->improved_seed[$key],
           'improved_storage' => $request->improved_storage[$key],
           'improved_practices' => $request->improved_practices[$key],
           'hectares_with_irrigation' => $request->hectares_with_irrigation[$key],
           'accessed_vf_loan' => $request->accessed_vf_loan[$key],
           'crop_insurance' => $request->crop_insurance[$key],
           'hectares_harvested' => $request->hectares_harvested[$key],
           'kgs_harvested' => $request->kgs_harvested[$key],

         );

         //GroupMemberMetrics::insert($member);

       }

     }



   }

     /* Old Store Function
     *
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

        $request->session()->flash('alert-success', 'Data was saved successfully!');
        return redirect()->back()->with('message', 'Success');

/*
        return Redirect()->action(
          'PersonController@create', [$last_inserted]
        );

      } else {
        return view('home');
      }

    }
*/
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
