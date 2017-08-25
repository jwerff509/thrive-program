  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'At A Glance')

  @section('content_header')
      <h1>Program At A Glance</h1>
  @stop

  @section('content')

    <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Members: <b>{{ $totalUsers }}</b></span>
            <span class="info-box-text">Females: <b>{{ $totalFemales }}</b></span>
            <span class="info-box-text">Males: <b>{{ $totalMales }}</b></span>
            <span class="info-box-text">Unknown: <b>{{ $totalUnreported }}</b></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Children: <b>{{ $totalChildren }}</b></span>
            <span class="info-box-text">Females: <b>{{ $totalFemaleChildren }}</b></span>
            <span class="info-box-text">Males: <b>{{ $totalMaleChildren }}</b></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Savings Groups: <b>{{ number_format($totalSavingsGroups) }}</b></span>
            <span class="info-box-text">Total Balance: <b>${{ number_format($savingsBalance) }}</b></span>
          </div>
        </div>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-leaf"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Producers Groups:</span>
            <span class="info-box-number">{{ number_format($totalProducers) }}</span>
          </div>
        </div>
      </div>

    </div>

    @include('charts.chartjs')



    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <canvas id="pillarChart" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <canvas id="pieChart" style="height: 140px; width: 175px;" width="250" height="140"></canvas>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <canvas id="lineChart" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <canvas id="housePillarChart" style="height: 140px; width: 350px;" width="250" height="140"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>




  @stop
