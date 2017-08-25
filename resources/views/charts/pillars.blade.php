




  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'End to End Business Dashboard')

  @section('content_header')
      <h1>End to End Business Dashboard</h1>
  @stop

  @section('content')

    @include('charts.pillarsjs')

      <div class="row">

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <canvas id="agTrends" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <canvas id="finTrends" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
            </div>
          </div>
        </div>

      </div>

    <div class="row">

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <label for = "chainMembers"># of Farmers Engaged in Value Chain Activities<br /></label>
            <canvas id="chainMembers" style="height: 140px; width: 350px;" width="250" height="150"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <label for = "chainRevenue">Gross Revenue of Value Chain per Project Participant<br /></label>
            <canvas id="chainRevenue" style="height: 150px; width: 350px;" width="250" height="150"></canvas>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <!--
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <canvas id="multiChart" style="height: 140px; width: 350px;" width="350" height="140"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <canvas id="pieChart" style="height: 140px; width: 175px;" width="165" height="140"></canvas>
          </div>
        </div>
      </div>
-->
    </div>






  @stop
