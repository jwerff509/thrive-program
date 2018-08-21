@extends('adminlte::page')

@section('title', 'Progress Reports')

@section('content_header')
    <h1>Data Entry Progress Reports</h1>
@stop

@section('content')

<div class="container-fluid">

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="ion ion-ios-people-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Groups Entered</span>
          <span class="info-box-number"><b>{{ count($groups) }}</b></span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-cash"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Savings Group Members</span>
          <span class="info-box-number"><b>{{ $totalSGMembers }}</b></span>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Recently Entered Groups</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">

          <table class="table table-hover table-striped">
            <tbody>
              <tr>
                <th><u>Group Name</u></th>
                <th><u># of<br>Members</u></th>
                <th><u># Actively<br>Saving</u></th>
                <th><u>Total<br>Savings</u></th>
                <th><u># Group<br>Meetings</u></th>
                <th><u>Amt Harvested<br>from VC</u></th>
                <th><u># Using<br>Improved Seed</u></th>
                <th><u># Using<br>Improved Storage</u></th>
                <th><u># Using<br>Improved Tools</u></th>
                <th><u># With<br>Irrigation</u></th>
                <th><u># Using<br>VF Loan</u></th>
                <th><u>Units of<br>VC Sold</u></th>
                <th><u># of Trees<br>Planted</u></th>
                <th><u>HA of Land<br>Reclaimed</u></th>
                <th><u># With Emer.<br>Savings</u></th>
                <th><u># Attended<br>EWV Training</u></th>
              </tr>

            @foreach($memEntered as $member)
              <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->num_members_counted }}</td>
                <td>{{ $member->num_savings_group_members_counted }}</td>
                <td>K {{ $member->total_amt_saved }}</td>
                <td>{{ $member->group_meetings }}</td>
                <td>{{ $member->units_harvested }}</td>
                <td>{{ $member->improved_seed }}</td>
                <td>{{ $member->improved_storage }}</td>
                <td>{{ $member->improved_tools }}</td>
                <td>{{ $member->members_with_irrigation }}</td>
                <td>{{ $member->members_with_vf_loan }}</td>
                <td>{{ $member->units_sold }}</td>
                <td>{{ $member->trees_planted }}</td>
                <td>{{ $member->hectares_reclaimed }}</td>
                <td>{{ $member->members_with_emergency_savings }}</td>
                <td>{{ $member->members_attended_ewv_training }}</td>
              </tr>
            @endforeach

            </tbody>
          </table>

          <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-6">{{ $memEntered->links() }}</div>
          </div>

        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

<!--
{{--}}
  @include('charts.progressCharts')

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <canvas id="soilConsChart" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <canvas id="waterCatchChart" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
        </div>
      </div>
    </div>
  </div>
--}}
-->

<!-- This was the section I was going to use for the dropdowns to change the criteria for the reports.
    So when you get to that point copy/paste this back up top and add the dropdowns -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
            <div class="panel-heading justify-content-center text-center">
              <!--
              {{-- }}
              <div class="row">
                {!! Form::select('group', array('default' => 'Select a Group') + $groups, array('id' => 'group_id', 'class' => 'form-control')) !!}
              </div>
              <div class="row">
                {!! Form::select('area_program', array('default' => 'Area Program') + $areaPrograms, array('id' => 'area_program_id', 'class' => 'form-control')) !!}
              </div>
              <div class="row">
                <select name="ap" id="ap" class="form-control col-xl-1">
                  <option value="1">A.P. 1</option>
                  <option value="2">A.P. 2</option>
                </select>
              </div>
              --}}
            -->
              <div class="row">
                <a href="/export-to-excel">Export Data to Excel</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

</div>

@stop
