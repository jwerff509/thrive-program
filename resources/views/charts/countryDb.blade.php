  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'At A Glance')

  @section('content_header')
    <div class="row">
      <div class="col-md-8">
        <h1>{{ $country }} At A Glance</h1>
      </div>
      <!--
      {{--}}
      <div class="col-sm-3 pull-right">
        <label>Change Country: </label>
        {!! Form::select('country_id', ['' => 'Select...']+$countries, null, ['class' => 'form-control']) !!}
      </div>
      --}}
    -->
    </div>
  @stop

  @section('content')

    <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-purple">
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
        <div class="info-box bg-purple">
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
        <div class="info-box bg-purple">
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
        <div class="info-box bg-purple">
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

  </div>

    <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="row">

    @include('charts.countryDb_chartjs')

    <div class="col-md-12 col-sm-12 col-xs-12">
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
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="agChart" ></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># Using Improved Seed</span>
                <span class="progress-number"><b>{{ number_format($impSeedTotal) }}</b>/{{ number_format($impSeedTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $seedBarColor }} progress-bar-striped" style="width: {{ $seedBarWidth }}%" data-toggle="tooltip" title="{{ number_format($seedBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Using Improved Crop Storage</span>
                <span class="progress-number"><b>{{ number_format($impStorageTotal) }}</b>/{{ number_format($impStorageTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $storageBarColor }} progress-bar-striped" style="width: {{ $storageBarWidth }}%" data-toggle="tooltip" title="{{ number_format($storageBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Using Improved Tools & Practices</span>
                <span class="progress-number"><b>{{ number_format($impToolsTotal) }}</b>/{{ number_format($impToolsTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $toolBarColor }} progress-bar-striped" style="width: {{ $toolBarWidth }}%" data-toggle="tooltip" title="{{ number_format($toolBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Using Some Form of Irrigation</span>
                <span class="progress-number"><b>{{ number_format($numWithIrrigationTotal) }}</b>/{{ number_format($numWithIrrigationTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numWithIrrBarColor }} progress-bar-striped" style="width: {{ $numWithIrrBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numWithIrrBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Ave. % Increase in Yield per Hectare</span>
                <span class="progress-number"><b>{{ number_format($increasedYieldTotal) }}</b>/{{ number_format($increasedYieldTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $incYieldBarColor }} progress-bar-striped" style="width: {{ $incYieldBarWidth }}%" data-toggle="tooltip" title="{{ number_format($incYieldBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># HA of Farmland with Irrigation</span>
                <span class="progress-number"><b>{{ number_format($haWithIrrigationTotal) }}</b>/{{ number_format($haWithIrrigationTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haIrrBarColor }} progress-bar-striped" style="width: {{ $haIrrBarWidth }}%" data-toggle="tooltip" title="{{ number_format($haIrrBarWidth) }}% completed"></div>
                </div>
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

    <div class="row">

    @include('charts.countryDb_chartjs')

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border bg-maroon disabled color-palette">
          <h3 class="box-title">Quarterly Recap - Access to Financial Services</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="finChart" ></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># of Savings Groups (SG)</span>
                <span class="progress-number"><b>{{ number_format($numSGTotal) }}</b>/{{ number_format($num_savings_groups_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $sgBarColor }} progress-bar-striped" style="width: {{ $sgBarWidth }}%" data-toggle="tooltip" title="{{ number_format($sgBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of Savings Group Members</span>
                <span class="progress-number"><b>{{ number_format($numSGMemTotal) }}</b>/{{ number_format($num_savings_group_members_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $sgMemBarColor }} progress-bar-striped" style="width: {{ $sgMemBarWidth }}%" data-toggle="tooltip" title="{{ number_format($sgMemBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Total Bal of SG Accounts (USD)</span>
                <span class="progress-number"><b>${{ number_format($sgBalTotal) }}</b>/${{ number_format($savings_groups_total_balance_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $sgBalBarColor }} progress-bar-striped" style="width: {{ $sgBalBarWidth }}%" data-toggle="tooltip" title="{{ number_format($sgBalBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># VF Clients with Loans</span>
                <span class="progress-number"><b>{{ number_format($memVFLoanTotal) }}</b>/{{ number_format($members_with_vf_loan_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $memVFLoanBarcolor }} progress-bar-striped" style="width: {{ $memVFLoanBarWidth }}%" data-toggle="tooltip" title="{{ number_format($memVFLoanBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers with VC Insurance</span>
                <span class="progress-number"><b>{{ number_format($farmersVCInsTotal) }}</b>/{{ number_format($farmers_with_vc_ins_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $farmVCInsBarColor }} progress-bar-striped" style="width: {{ $farmVCInsBarWidth }}%" data-toggle="tooltip" title="{{ number_format($farmVCInsBarWidth) }}% completed"></div>
                </div>
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

    <div class="row">

    @include('charts.countryDb_chartjs')

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border bg-green disabled color-palette">
          <h3 class="box-title">Quarterly Recap - Access to Markets</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="marketChart"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># of Producers Groups (PG)</span>
                <span class="progress-number"><b>{{ number_format($numPGTotal) }}</b>/{{ number_format($num_producers_groups_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $pgBarColor }} progress-bar-striped" style="width: {{ $pgBarWidth }}%" data-toggle="tooltip" title="{{ number_format($pgBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of Producers Group Members</span>
                <span class="progress-number"><b>{{ number_format($numPGMemTotal) }}</b>/{{ number_format($num_producers_group_members_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgMemBarColor }} progress-bar-striped" style="width: {{ $numPgMemBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numPgMemBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># PG Members who Sell Value Chain Products</span>
                <span class="progress-number"><b>{{ number_format($numPGSellVCProdTotal) }}</b>/{{ number_format($num_prod_groups_sell_vc_product_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgSellVcBarColor }} progress-bar-striped" style="width: {{ $numPgSellVcBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numPgSellVcBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># PGs Accessing Local Markets</span>
                <span class="progress-number"><b>{{ number_format($numPGSellLocalTotal) }}</b>/{{ number_format($numPgLocalMarketsTarget) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgLocalBarcolor }} progress-bar-striped" style="width: {{ $numPgLocalBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numPgLocalBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># PGs Accessing Markets Beyond Local Markets</span>
                <span class="progress-number"><b>{{ number_format($numPGSellExpandedTotal) }}</b>/{{ number_format($num_prod_groups_expanded_markets_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numPgExpandedBarColor }} progress-bar-striped" style="width: {{ $numPgExpandedBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numPgExpandedBarWidth) }}% completed"></div>
                </div>
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

    <div class="row">

    @include('charts.countryDb_chartjs')

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border bg-purple disabled color-palette">
          <h3 class="box-title">Quarterly Recap - Natural Resource Management</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="nrmChart"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># Hectares Reclaimed for Ag</span>
                <span class="progress-number"><b>{{ number_format($haReclaimedAgTotal) }}</b>/{{ number_format($hectares_reclaimed_for_ag_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haRecAgBarcolor }} progress-bar-striped" style="width: {{ $haRecAgBarWidth }}%" data-toggle="tooltip" title="{{ number_format($haRecAgBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Ha. with Soil & Water Cons</span>
                <span class="progress-number"><b>{{ number_format($haFarmedSoilConsTotal) }}</b>/{{ number_format($hectares_farmed_soil_water_cons_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $haSoilConsBarColor }} progress-bar-striped" style="width: {{ $haSoilConsBarWidth }}%" data-toggle="tooltip" title="{{ number_format($haSoilConsBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Water Catchment</span>
                <span class="progress-number"><b>{{ number_format($numUsingWaterCatchmentTotal) }}</b>/{{ number_format($farmers_using_water_catchment_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numWaterCatchBarColor }} progress-bar-striped" style="width: {{ $numWaterCatchBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numWaterCatchBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Communities with Watershed Rehabilitated</span>
                <span class="progress-number"><b>{{ number_format($commWatershedRehabTotal) }}</b>/{{ number_format($comm_watershed_rehab_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $commWatershedBarColor }} progress-bar-striped" style="width: {{ $commWatershedBarWidth }}%" data-toggle="tooltip" title="{{ number_format($commWatershedBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Trees Planted / Regenerated</span>
                <span class="progress-number"><b>{{ number_format($treesPlantedTotal) }}</b>/{{ number_format($trees_planted_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $treesPlantedBarColor }} progress-bar-striped" style="width: {{ $treesPlantedBarWidth }}%" data-toggle="tooltip" title="{{ number_format($treesPlantedBarWidth) }}% completed"></div>
                </div>
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

    <div class="row">

    @include('charts.countryDb_chartjs')

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border bg-navy disabled color-palette">
          <h3 class="box-title">Quarterly Recap - Resilience to Shocks and Stresses</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="shocksChart"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># THRIVE Participants with Emer Savings</span>
                <span class="progress-number"><b>{{ number_format($memWithEmerSavingsTotal) }}</b>/{{ number_format($members_with_emer_savings_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $memEmerSavingsBarColor }} progress-bar-striped" style="width: {{ $memEmerSavingsBarWidth }}%" data-toggle="tooltip" title="{{ number_format($memEmerSavingsBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Farmers Using Early Warning Systems</span>
                <span class="progress-number"><b>{{ number_format($numUsingEwsTotal) }}</b>/{{ number_format($farmers_using_ews_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numEwsBarColor }} progress-bar-striped" style="width: {{ $numEwsBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numEwsBarWidth) }}% completed"></div>
                </div>
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

    <div class="row">

    @include('charts.countryDb_chartjs')

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border bg-yellow disabled color-palette">
          <h3 class="box-title">Quarterly Recap - Empowered Worldview</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart">
                <canvas id="worldviewChart"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion (LOP)</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text"># of People Who Received EWV Training</span>
                <span class="progress-number"><b>{{ number_format($numReceivedEwvTrainingTotal) }}</b>/{{ number_format($members_received_ewv_training_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numEwvTrainingBarColor }} progress-bar-striped" style="width: {{ $numEwvTrainingBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numEwvTrainingBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of EWV Trainees Attesting to Value Trans</span>
                <span class="progress-number"><b>{{ number_format($ewvTraineesAttestValueTransTotal) }}</b>/{{ number_format($ewv_trainees_attest_value_trans_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $numEwvTrainingBarColor }} progress-bar-striped" style="width: {{ $numEwvTrainingBarWidth }}%" data-toggle="tooltip" title="{{ number_format($numEwvTrainingBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># of Faith Leaders Engaged in EWV Training</span>
                <span class="progress-number"><b>{{ number_format($faithLeadersEwvTrainingTotal) }}</b>/{{ number_format($faith_leaders_in_ewv_training_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $faithLeadersEwvBarColor }} progress-bar-striped" style="width: {{ $faithLeadersEwvBarWidth }}%" data-toggle="tooltip" title="{{ number_format($faithLeadersEwvBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Groups Undertaking Political Rep</span>
                <span class="progress-number"><b>{{ number_format($groupsPoliticalRepTotal) }}</b>/{{ number_format($groups_undertaking_political_rep_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $groupsPoliticalRepBarColor }} progress-bar-striped" style="width: {{ $groupsPoliticalRepBarWidth }}%" data-toggle="tooltip" title="{{ number_format($groupsPoliticalRepBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Vulnerable Children Given Care by Groups</span>
                <span class="progress-number"><b>{{ number_format($childrenCaredByGroupsTotal) }}</b>/{{ number_format($children_given_care_by_groups_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $childCareByGroupsBarColor }} progress-bar-striped" style="width: {{ $childCareByGroupsBarWidth }}%" data-toggle="tooltip" title="{{ number_format($childCareByGroupsBarWidth) }}% completed"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text"># Unique HH Income Sources (Last 3 Months)</span>
                <span class="progress-number"><b>{{ number_format($uniqueHhIncSourcestotal) }}</b>/{{ number_format($unique_hh_inc_sources_target) }}</span>
                <div class="progress sm">
                  <div class="progress-bar {{ $hhIncSourcesBarColor }} progress-bar-striped" style="width: {{ $hhIncSourcesBarWidth }}%" data-toggle="tooltip" title="{{ number_format($hhIncSourcesBarWidth) }}% completed"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @stop
