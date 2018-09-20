  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'ELO Dashboard')

  @section('content_header')
      <h1>THRIVE Program ELO Dashboard</h1>
  @stop

  @section('content')



    <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Direct Beneficiaries:</span>
            <span class="info-box-number">{{ number_format($dirBensTotal) }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: {{ $dirBensBarWidth }}%"></div>
            </div>
            <span class="progress-description text-right">LOP Target: <b>{{ number_format($dirBensTarget) }}</b></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-child"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"># of Children:</span>
            <span class="info-box-number">{{ number_format($numChildrenTotal) }}</span>
            <div class="progress">
              <div class=" progress-bar progress-bar-striped" style="width: {{ $numChildrenBarWidth }}%"></div>
            </div>
            <span class="progress-description text-right">LOP Target: <b>{{ number_format($numChildrenTarget) }}</b></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-female"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"># of Women:</span>
            <span class="info-box-number">{{ number_format($numWomenTotal) }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: {{ $numWomenBarWidth }}%"></div>
            </div>
            <span class="progress-description text-right">LOP Target: <b>{{ number_format($numWomenTarget) }}</b></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-home"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total HH Members:</span>
            <span class="info-box-number">{{ number_format($numHHMemTotal) }}</span>
            <div class="progress">
              <div class="progress-bar" style="width: {{ $numHhBarWidth }}%"></div>
            </div>
            <span class="progress-description text-right">LOP Target: <b>{{ number_format($numHHMemTarget) }}</b></span>
          </div>
        </div>
      </div>

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

        @include('charts.eloDb_chartjs')



<!--    ==============================================   Testing    ===================================================== -->




    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-light-blue disabled color-palette">
          <h3 class="box-title">Improved Agricultural Technology - Program Overview</h3>
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
        <div class="box-body">

          <div class="row">
            <div class="col-md-2">
              <div class="chart">
                <canvas id="pieChart1"></canvas>
              </div>
            </div>
            <div class="col-md-2">
              <div class="chart">
                <canvas id="pieChart2"></canvas>
              </div>
            </div>
            <div class="col-md-2">
              <div class="chart">
                <canvas id="pieChart3"></canvas>
              </div>
            </div>
            <div class="col-md-2">
              <div class="chart">
                <canvas id="pieChart4"></canvas>
              </div>
            </div>
            <div class="col-md-2">
              <div class="chart">
                <canvas id="pieChart5"></canvas>
              </div>
            </div>
            <div class="col-md-1">&nbsp;</div>
          </div>


        </div>
        <div class="box-footer">
              <div class="row">
                <div class="col-md-2 col-xs-3">
                  <div class="description-block">
                    <span class="description-percentage text-black"><b>{{ $impSeedTotal }}</b>/{{ $impSeedTarget }}</span>
                    <div class="progress sm">
                      <div class="progress-bar {{ $seedBarColor }} progress-bar-striped" style="width: {{ $seedBarWidth }}%"></div>
                    </div>
                    <span class="description-text"># Using Improved Seed</span>
                  </div>
                </div>

                <div class="col-md-2 col-xs-3">
                  <div class="description-block">
                    <span class="description-percentage text-black"><b>{{ $impStorageTotal }}</b>/{{ $impStorageTarget }}</span>
                    <div class="progress sm">
                      <div class="progress-bar {{ $storageBarColor }} progress-bar-striped" style="width: {{ $storageBarWidth }}%"></div>
                    </div>
                    <span class="description-text"># Using Improved Storage</span>
                  </div>
                </div>

                <div class="col-md-2 col-xs-3">
                  <div class="description-block">
                    <span class="description-percentage text-black"><b>{{ $impToolsTotal }}</b>/{{ $impToolsTarget }}</span>
                    <div class="progress sm">
                      <div class="progress-bar {{ $toolBarColor }} progress-bar-striped" style="width: {{ $toolBarWidth }}%"></div>
                    </div>
                    <span class="description-text"># Using Improved Tools</span>
                  </div>
                </div>

                <div class="col-md-2 col-xs-3">
                  <div class="description-block">
                    <span class="description-percentage text-black"><b>{{ $numWithIrrigationTotal }}</b>/{{ $numWithIrrigationTarget }}</span>
                    <div class="progress sm">
                      <div class="progress-bar {{ $numWithIrrBarColor }} progress-bar-striped" style="width: {{ $numWithIrrBarWidth }}%"></div>
                    </div>
                    <span class="description-text"># Using Some Form of Irrigation</span>
                  </div>
                </div>

                <div class="col-md-2 col-xs-3">
                  <div class="description-block justify-content-center">
                    <span class="description-percentage text-black"><b>{{ $haWithIrrigationTotal }}</b>/{{ $haWithIrrigationTarget }}</span>
                    <div class="progress sm">
                      <div class="progress-bar {{ $haIrrBarColor }} progress-bar-striped" style="width: {{ $haIrrBarWidth }}%"></div>
                    </div>
                    <span class="description-text">Ha With Irrigation</span>
                  </div>
                </div>
              </div>
              <!-- /.row -->
          </div>



<!--
{{--}}
            <div class="col-md-2">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># Using Improved Seed</span>
                <span class="progress-number"><b>{{ $impSeedTotal }}</b>/{{ $impSeedTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $seedBarColor }} progress-bar-striped" style="width: {{ $seedBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Using Improved Crop Storage</span>
                <span class="progress-number"><b>{{ $impStorageTotal }}</b>/{{ $impStorageTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $storageBarColor }} progress-bar-striped" style="width: {{ $storageBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Using Improved Tools & Practices</span>
                <span class="progress-number"><b>{{ $impToolsTotal }}</b>/{{ $impToolsTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $toolBarColor }} progress-bar-striped" style="width: {{ $toolBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Using Some Form of Irrigation</span>
                <span class="progress-number"><b>{{ $numWithIrrigationTotal }}</b>/{{ $numWithIrrigationTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numWithIrrBarColor }} progress-bar-striped" style="width: {{ $numWithIrrBarWidth }}%"></div>
                </div>
              </div>

--}}
-->

              <!--
              {{-- }}
              <div class="progress-group">
                <span class="progress-text">Ave. % Increase in Yield per Hectare</span>
                <span class="progress-number"><b>{{ $increasedYieldTotal }}</b>/{{ $increasedYieldTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $incYieldBarColor }} progress-bar-striped" style="width: {{ $incYieldBarWidth }}%"></div>
                </div>
              </div>
              --}}
            -->


            <!--
            {{--}}
              <div class="progress-group">
                <span class="progress-text"># Ha of Farmland with Irrigation</span>
                <span class="progress-number"><b>{{ $haWithIrrigationTotal }}</b>/{{ $haWithIrrigationTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haIrrBarColor }} progress-bar-striped" style="width: {{ $haIrrBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        --}}
      -->

      </div>
    </div>




<!-- ===============================================================  End Testing =================================================== -->




    <div class="clearfix visible-sm-block"></div>

    @include('charts.eloDb_chartjs')



    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-light-blue disabled color-palette">
          <h3 class="box-title">Improved Agricultural Technology - Program Overview</h3>
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
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="myChart" style="height: 400px; width: 1072px;" width="1072" height="400"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Improved Seed</span>
                <span class="progress-number"><b>{{ $impSeedTotal }}</b>/{{ $impSeedTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $seedBarColor }} progress-bar-striped" style="width: {{ $seedBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Improved Crop Storage</span>
                <span class="progress-number"><b>{{ $impStorageTotal }}</b>/{{ $impStorageTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $storageBarColor }} progress-bar-striped" style="width: {{ $storageBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Improved Tools & Practices</span>
                <span class="progress-number"><b>{{ $impToolsTotal }}</b>/{{ $impToolsTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $toolBarColor }} progress-bar-striped" style="width: {{ $toolBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Some Form of Irrigation</span>
                <span class="progress-number"><b>{{ $numWithIrrigationTotal }}</b>/{{ $numWithIrrigationTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numWithIrrBarColor }} progress-bar-striped" style="width: {{ $numWithIrrBarWidth }}%"></div>
                </div>
              </div>
              <!--
              {{-- }}
              <div class="progress-group">
                <span class="progress-text">Ave. % Increase in Yield per Hectare</span>
                <span class="progress-number"><b>{{ $increasedYieldTotal }}</b>/{{ $increasedYieldTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $incYieldBarColor }} progress-bar-striped" style="width: {{ $incYieldBarWidth }}%"></div>
                </div>
              </div>
              --}}
            -->
              <div class="progress-group">
                <span class="progress-text"># Hectares of Farmland with Irrigation</span>
                <span class="progress-number"><b>{{ $haWithIrrigationTotal }}</b>/{{ $haWithIrrigationTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haIrrBarColor }} progress-bar-striped" style="width: {{ $haIrrBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--  ****************   End of Improved Agricultural Technology Section   ------------------------------------------->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-maroon disabled color-palette">
          <h3 class="box-title">Access to Financial Services - Program Overview</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="finChart" style="height: 325px; width: 1072px;" width="1072" height="325"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># of Savings Groups (SG)</span>
                <span class="progress-number"><b>{{ $numSGTotal }}</b>/{{ $num_savings_groups_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $sgBarColor }} progress-bar-striped" style="width: {{ $sgBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of Savings Group Members</span>
                <span class="progress-number"><b>{{ $numSGMemTotal }}</b>/{{ $num_savings_group_members_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $sgMemBarColor }} progress-bar-striped" style="width: {{ $sgMemBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Total Bal of SG Accounts (USD)</span>
                <span class="progress-number"><b>{{ $sgBalTotal }}</b>/{{ $savings_groups_total_balance_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $sgBalBarColor }} progress-bar-striped" style="width: {{ $sgBalBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># VF Clients with Loans</span>
                <span class="progress-number"><b>{{ $memVFLoanTotal }}</b>/{{ $members_with_vf_loan_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $memVFLoanBarcolor }} progress-bar-striped" style="width: {{ $memVFLoanBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers with VC Insurance</span>
                <span class="progress-number"><b>{{ $farmersVCInsTotal }}</b>/{{ $farmers_with_vc_ins_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $farmVCInsBarColor }} progress-bar-striped" style="width: {{ $farmVCInsBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--  ****************   End of Access to Financial Services Section   ------------------------------------------->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-green disabled color-palette">
          <h3 class="box-title">Access to Markets - Program Overview</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="marketChart" style="height: 325px; width: 1072px;" width="1072" height="325"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># of Producers Groups (PG)</span>
                <span class="progress-number"><b>{{ $numPGTotal }}</b>/{{ $num_producers_groups_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $pgBarColor }} progress-bar-striped" style="width: {{ $pgBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of Producers Group Members</span>
                <span class="progress-number"><b>{{ $numPGMemTotal }}</b>/{{ $num_producers_group_members_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgMemBarColor }} progress-bar-striped" style="width: {{ $numPgMemBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># PG Members who Sell Value Chain Products</span>
                <span class="progress-number"><b>{{ $numPGSellVCProdTotal }}</b>/{{ $num_prod_groups_sell_vc_product_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgSellVcBarColor }} progress-bar-striped" style="width: {{ $numPgSellVcBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># PGs Accessing Local Markets</span>
                <span class="progress-number"><b>{{ $numPGSellLocalTotal }}</b>/{{ $numPgLocalMarketsTarget }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgLocalBarcolor }} progress-bar-striped" style="width: {{ $numPgLocalBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># PGs Accessing Markets Beyond Local Markets</span>
                <span class="progress-number"><b>{{ $numPGSellExpandedTotal }}</b>/{{ $num_prod_groups_expanded_markets_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgExpandedBarColor }} progress-bar-striped" style="width: {{ $numPgExpandedBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--  ****************   End of Access to Markets Section   ----------------------------------------------------------->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-purple disabled color-palette">
          <h3 class="box-title">Natural Resource Management - Program Overview</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="nrmChart" style="height: 325px; width: 1072px;" width="1072" height="325"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># Hectares Reclaimed for Ag</span>
                <span class="progress-number"><b>{{ $haReclaimedAgTotal }}</b>/{{ $hectares_reclaimed_for_ag_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haRecAgBarcolor }} progress-bar-striped" style="width: {{ $haRecAgBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Ha. Farmed with Soil & Water Conservation</span>
                <span class="progress-number"><b>{{ $haFarmedSoilConsTotal }}</b>/{{ $hectares_farmed_soil_water_cons_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haSoilConsBarColor }} progress-bar-striped" style="width: {{ $haSoilConsBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Water Catchment</span>
                <span class="progress-number"><b>{{ $numUsingWaterCatchmentTotal }}</b>/{{ $farmers_using_water_catchment_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numWaterCatchBarColor }} progress-bar-striped" style="width: {{ $numWaterCatchBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Communities with Watershed Rehabilitated</span>
                <span class="progress-number"><b>{{ $commWatershedRehabTotal }}</b>/{{ $comm_watershed_rehab_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $commWatershedBarColor }} progress-bar-striped" style="width: {{ $commWatershedBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Trees Planted / Regenerated</span>
                <span class="progress-number"><b>{{ $treesPlantedTotal }}</b>/{{ $trees_planted_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $treesPlantedBarColor }} progress-bar-striped" style="width: {{ $treesPlantedBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--  ****************   End of Natural Resource Management Section   ----------------------------------------------------------->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-navy disabled color-palette">
          <h3 class="box-title">Resilience to Shocks and Stresses - Program Overview</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="shocksChart" style="height: 325px; width: 1072px;" width="1072" height="325"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># THRIVE Participants with Emergency Savings</span>
                <span class="progress-number"><b>{{ $memWithEmerSavingsTotal }}</b>/{{ $members_with_emer_savings_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $memEmerSavingsBarColor }} progress-bar-striped" style="width: {{ $memEmerSavingsBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Early Warning Systems</span>
                <span class="progress-number"><b>{{ $numUsingEwsTotal }}</b>/{{ $farmers_using_ews_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numEwsBarColor }} progress-bar-striped" style="width: {{ $numEwsBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--  ****************   End of Resilience to Shocks and Stresses Section   ----------------------------------------------------------->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border bg-yellow disabled color-palette">
          <h3 class="box-title">Empowered Worldview - Program Overview</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="worldviewChart" style="height: 325px; width: 1072px;" width="1072" height="325"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># of People Having Received EWV Training</span>
                <span class="progress-number"><b>{{ $numReceivedEwvTrainingTotal }}</b>/{{ $members_received_ewv_training_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numEwvTrainingBarColor }} progress-bar-striped" style="width: {{ $numEwvTrainingBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of EWV Trainees Attesting to Value Transformation</span>
                <span class="progress-number"><b>{{ $ewvTraineesAttestValueTransTotal }}</b>/{{ $ewv_trainees_attest_value_trans_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numEwvTrainingBarColor }} progress-bar-striped" style="width: {{ $numEwvTrainingBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of Faith Leaders Engaged in EWV Training</span>
                <span class="progress-number"><b>{{ $faithLeadersEwvTrainingTotal }}</b>/{{ $faith_leaders_in_ewv_training_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $faithLeadersEwvBarColor }} progress-bar-striped" style="width: {{ $faithLeadersEwvBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Vulnerable Groups Undertaing Political Representation</span>
                <span class="progress-number"><b>{{ $groupsPoliticalRepTotal }}</b>/{{ $groups_undertaking_political_rep_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $groupsPoliticalRepBarColor }} progress-bar-striped" style="width: {{ $groupsPoliticalRepBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Vulnerable Children Given Care by Groups</span>
                <span class="progress-number"><b>{{ $childrenCaredByGroupsTotal }}</b>/{{ $children_given_care_by_groups_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $childCareByGroupsBarColor }} progress-bar-striped" style="width: {{ $childCareByGroupsBarWidth }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Unique HH Income Sources (Last 3 Months)</span>
                <span class="progress-number"><b>{{ $uniqueHhIncSourcestotal }}</b>/{{ $unique_hh_inc_sources_target }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $hhIncSourcesBarColor }} progress-bar-striped" style="width: {{ $hhIncSourcesBarWidth }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  @stop
