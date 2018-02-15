<?php

namespace App\Http\Controllers;

use App\GroupMembers;
use Illuminate\Http\Request;

use App\Group;
use App\GroupDetails;
use App\GroupMemberMetrics;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
Use DB;

class GroupMembers extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupMembers  $groupMembers
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMembers $groupMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupMembers  $groupMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupMembers $groupMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupMembers  $groupMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupMembers $groupMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupMembers  $groupMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupMembers $groupMembers)
    {
        //
    }
}
