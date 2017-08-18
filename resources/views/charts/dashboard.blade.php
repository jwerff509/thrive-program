




  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'At A Glance')

  @section('content_header')
      <h1>Dashboard (all data is as of the last 3 months)</h1>
  @stop

  @section('content')

    <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Registered Members</span>
            <span class="info-box-number">{{ $totalUsers }}</small></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">New Members Registered in Last 3 Months</span>
            <span class="info-box-number">{{ $newUsers }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Savings Groups:</span>
            <span class="info-box-number">{{ number_format($totalSavingsGroups) }}</span>
            <span class="info-box-text">Total Balance for Savings Groups</span>
            <span class="info-box-number">${{ number_format($savingsBalance) }}</span>
          </div>
        </div>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-leaf"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Producers Groups</span>
            <span class="info-box-number">{{ number_format($totalProducers) }}</span>
          </div>
        </div>
      </div>

    </div>

    @include('charts.chartjs')

    <div class="row">
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

    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <canvas id="lineChart" style="height: 140px; width: 350px;" width="350" height="140"></canvas>
          </div>
        </div>
      </div>
    </div>




  @stop
