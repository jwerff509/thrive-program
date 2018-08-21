  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'At A Glance')

  @section('content_header')
      <h1>Rwanda At A Glance</h1>
  @stop

  @section('content')

    <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Direct Beneficiaries:</span>
            <span class="info-box-number">{{ $dirBensTotal }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">70% increase in last 3 months</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-child"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"># of Children:</span>
            <span class="info-box-number">{{ $numChildrenTotal }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">70% increase in last 3 months</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-female"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"># of Women:</span>
            <span class="info-box-number">{{ $numWomenTotal }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">70% increase in last 3 months</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-home"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total HH Members:</span>
            <span class="info-box-number">{{ $numHHMemTotal }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">70% increase in last 3 months</span>
          </div>
        </div>
      </div>


      <!-- fix for small devices only -->

      <div class="clearfix visible-sm-block"></div>



    @include('charts.high_level_chartjs')






        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border bg-light-blue disabled color-palette">
              <h3 class="box-title">Quarterly Recap - Improved Agricultural Technology</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--

                Cool thought - add a link within this group to download just the data for this chart !!!!!!!

                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
              -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="agChart" style="height: 480px; width: 1072px;" width="1072" height="480"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion (LOP)</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text"># Farmers Using Improved Seed</span>
                    <span class="progress-number"><b>{{ $impSeedTotal }}</b>/{{ $impSeedTarget }}</span>
                    <?php $seedWidth = $impSeedTotal / $impSeedTarget * 100 ?>
                    <div class="progress sm">
                      <?php
                        switch($seedWidth) {
                          case $seedWidth < 26:
                            $seedBar = 'progress-bar-red';
                            break;
                          case $seedWidth < 51:
                            $seedBar = 'progress-bar-yellow';
                            break;
                          case $seedWidth < 76:
                            $seedBar = 'progress-bar-aqua';
                            break;
                          case $seedWidth < 101:
                            $seedBar = 'progress-bar-green';
                            break;
                          default:
                            $seedBar = 'progress-bar-red';
                            break;
                        }
                      ?>
                      <div class="progress-bar {{ $seedBar }} progress-bar-striped" style="width: {{ $seedWidth }}%"></div>
                    </div>
                  </div>

                  <div class="progress-group">
                    <span class="progress-text"># Farmers Using Improved Crop Storage</span>
                    <span class="progress-number"><b>{{ $impStorageTotal }}</b>/{{ $impStorageTarget }}</span>
                    <?php $storageWidth = $impStorageTotal / $impStorageTarget * 100 ?>
                    <div class="progress sm">
                      <?php
                        switch($storageWidth) {
                          case $storageWidth < 26:
                            $storageBar = 'progress-bar-red';
                            break;
                          case $storageWidth < 51:
                            $storageBar = 'progress-bar-yellow';
                            break;
                          case $storageWidth < 76:
                            $storageBar = 'progress-bar-aqua';
                            break;
                          case $storageWidth < 101:
                            $storageBar = 'progress-bar-green';
                            break;
                          default:
                            $storageBar = 'progress-bar-red';
                            break;
                        }
                      ?>
                      <div class="progress-bar {{ $storageBar }}" style="width: {{ $storageWidth }}%"></div>
                    </div>
                  </div>

                  <div class="progress-group">
                    <span class="progress-text"># Farmers Using Improved Tools & Practices</span>
                    <span class="progress-number"><b>{{ $impToolsTotal }}</b>/{{ $impToolsTarget }}</span>
                    <?php $toolsWidth = $impToolsTotal / $impToolsTarget * 100 ?>
                    <div class="progress sm">
                      <?php
                        switch($toolsWidth) {
                          case $toolsWidth < 26:
                            $toolsBar = 'progress-bar-red';
                            break;
                          case $toolsWidth < 51:
                            $toolsBar = 'progress-bar-yellow';
                            break;
                          case $toolsWidth < 76:
                            $toolsBar = 'progress-bar-aqua';
                            break;
                          case $toolsWidth < 101:
                            $toolsBar = 'progress-bar-green';
                            break;
                          default:
                            $toolsBar = 'progress-bar-red';
                            break;
                        }
                      ?>
                      <div class="progress-bar {{ $toolsBar }}" style="width: {{ $toolsWidth }}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"># Farmers Using Some Form of Irrigation</span>
                    <span class="progress-number"><b>{{ $numWithIrrigationTotal }}</b>/{{ $numWithIrrigationTarget }}</span>
                    <?php $irrWidth = $numWithIrrigationTotal / $numWithIrrigationTarget * 100 ?>
                    <div class="progress sm">
                      <?php
                        switch($irrWidth) {
                          case $irrWidth < 26:
                            $irrBar = 'progress-bar-red';
                            break;
                          case $irrWidth < 51:
                            $irrBar = 'progress-bar-yellow';
                            break;
                          case $irrWidth < 76:
                            $irrBar = 'progress-bar-aqua';
                            break;
                          case $irrWidth < 101:
                            $irrBar = 'progress-bar-green';
                            break;
                          default:
                            $irrBar = 'progress-bar-red';
                            break;
                        }
                      ?>
                      <div class="progress-bar {{ $irrBar }}" style="width: {{ $irrWidth }}%"></div>
                    </div>
                  </div>

                  <div class="progress-group">
                    <span class="progress-text">Ave. % Increase in Yield per Hectare</span>
                    <span class="progress-number"><b>{{ $increasedYieldTotal }}</b>/{{ $increasedYieldTarget }}</span>
                    <?php $yieldWidth = $increasedYieldTotal / $increasedYieldTarget * 100 ?>
                    <div class="progress sm">
                      <?php
                        switch($yieldWidth) {
                          case $yieldWidth < 26:
                            $yieldBar = 'progress-bar-red';
                            break;
                          case $yieldWidth < 51:
                            $yieldBar = 'progress-bar-yellow';
                            break;
                          case $yieldWidth < 76:
                            $yieldBar = 'progress-bar-aqua';
                            break;
                          case $yieldWidth < 101:
                            $yieldBar = 'progress-bar-green';
                            break;
                          default:
                            $yieldBar = 'progress-bar-red';
                            break;
                        }
                      ?>
                      <div class="progress-bar {{ $yieldBar }}" style="width: {{ $yieldWidth }}%"></div>
                    </div>
                  </div>

                  <div class="progress-group">
                    <span class="progress-text"># Hectares of Farmland with Irrigation</span>
                    <span class="progress-number"><b>{{ $haWithIrrigationTotal }}</b>/{{ $haWithIrrigationTarget }}</span>
                    <?php $haWidth = $haWithIrrigationTotal / $haWithIrrigationTarget * 100 ?>
                    <div class="progress sm">
                      <?php
                        switch($haWidth) {
                          case $haWidth < 26:
                            $haBar = 'progress-bar-red';
                            break;
                          case $haWidth < 51:
                            $haBar = 'progress-bar-yellow';
                            break;
                          case $haWidth < 76:
                            $haBar = 'progress-bar-aqua';
                            break;
                          case $haWidth < 101:
                            $haBar = 'progress-bar-green';
                            break;
                          default:
                            $haBar = 'progress-bar-red';
                            break;
                        }
                      ?>
                      <div class="progress-bar {{ $haBar }}" style="width: {{ $haWidth }}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->







<!--

Old charts

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
-->

  @stop
