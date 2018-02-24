<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

class AjaxDemoController extends Controller
{
    //

    public function groupsCreate() {

      $areaPrograms = DB::table('vegetables')->pluck("name", "id")->all();
      return view('groups.create', compact('areaPrograms'));

    }

    public function selectAjax(Request $request) {

      if($request->ajax()) {

      }

    }

}
