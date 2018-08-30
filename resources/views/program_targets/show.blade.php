
@extends('adminlte::page')

@section('title', 'Program Targets')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>LOP Targets for {{ $country->name }}</b></h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-hover table-striped">
            <tr>
              <th>Measure</th>
              <th>LOP Target</th>
            </tr>
            @foreach($targets as $target)
            <tr>
              <td># Farmers Using Improved Seed</td>
              <td>{{ $target->improved_seed_target }}</td>
            </tr>
            <tr>
              <td># Farmers Using Improved Crop Storage</td>
              <td>{{ $target->improved_storage_target }}</td>
            </tr>
            <tr>
              <td># Farmers Using Improved Tools & Practices</td>
              <td>{{ $target->improved_tools_target }}</td>
            </tr>
            <tr>
              <td># Farmers Using Some Form of Irrigation</td>
              <td>{{ $target->farmers_with_irrigation_target }}</td>
            </tr>
            <tr>
              <td>Ave. % Increase in Yield per Hectare</td>
              <td>{{ $target->increase_in_yield_per_hectare_target }}</td>
            </tr>
            <tr>
              <td># Hectares of Farmland With Irrigation</td>
              <td>{{ $target->ha_with_irrigation_target }}</td>
            </tr>
            <tr>
              <td># of Savings Groups</td>
              <td>{{ $target->num_savings_groups_target }}</td>
            </tr>
            <tr>
              <td># of Savings Group Members</td>
              <td>{{ $target->num_savings_group_members_target }}</td>
            </tr>
            <tr>
              <td>Total Balance of Savings Group Accounts (USD)</td>
              <td>{{ $target->savings_groups_total_balance_target }}</td>
            </tr>
            <tr>
              <td># VF Clients With Ag or Microenterprise Loans</td>
              <td>{{ $target->members_with_vf_loan_target }}</td>
            </tr>
            <tr>
              <td># Farmers Using Value Chain Insurance</td>
              <td>{{ $target->farmers_with_vc_ins_target }}</td>
            </tr>
            <tr>
              <td># of Producers Groups</td>
              <td>{{ $target->num_producers_groups_target }}</td>
            </tr>
            <tr>
              <td># of Producers Group Members</td>
              <td>{{ $target->num_producers_group_members_target }}</td>
            </tr>
            <tr>
              <td># of PGs Who Sell Value Chain Products</td>
              <td>{{ $target->num_prod_groups_sell_vc_product_target }}</td>
            </tr>
            <tr>
              <td># of PGs Accessing Local Markets</td>
              <td>{{ $target->num_prod_groups_local_markets_target }}</td>
            </tr>
            <tr>
              <td># of PGs Accessing Markets Beyond Local Markets</td>
              <td>{{ $target->num_prod_groups_expanded_markets_target }}</td>
            </tr>
            <tr>
              <td># Hectares Reclaimed for Agriculture</td>
              <td>{{ $target->hectares_reclaimed_for_ag_target }}</td>
            </tr>
            <tr>
              <td># Ha. Farmed with Soil & Water Conservation Techniques</td>
              <td>{{ $target->hectares_farmed_soil_water_cons_target }}</td>
            </tr>
            <tr>
              <td># of Farmers Using Water Catchment Techniques</td>
              <td>{{ $target->farmers_using_water_catchment_target }}</td>
            </tr>
            <tr>
              <td># of Communities with Watershed Rehabilitated & Protected</td>
              <td>{{ $target->comm_watershed_rehab_target }}</td>
            </tr>
            <tr>
              <td># of Trees Planted/Regenerated</td>
              <td>{{ $target->trees_planted_target }}</td>
            </tr>
            <tr>
              <td># of THRIVE Participants with Emergency Savings</td>
              <td>{{ $target->members_with_emer_savings_target }}</td>
            </tr>
            <tr>
              <td># of Farmers Using Early Warning Systems</td>
              <td>{{ $target->farmers_using_ews_target }}</td>
            </tr>
            <tr>
              <td># of People Having Received EWV Training</td>
              <td>{{ $target->members_received_ewv_training_target }}</td>
            </tr>
            <tr>
              <td># of EWV Trainees Attesting to Value Transformation</td>
              <td>{{ $target->ewv_trainees_attest_value_trans_target }}</td>
            </tr>
            <tr>
              <td># of Faith Leaders Engaged in EWV Training</td>
              <td>{{ $target->faith_leaders_in_ewv_training_target }}</td>
            </tr>
            <tr>
              <td># of Vulnerable Groups Undertaking Political Representation</td>
              <td>{{ $target->groups_undertaking_political_rep_target }}</td>
            </tr>
            <tr>
              <td># of Vulnerable Children Given Care by the Groups</td>
              <td>{{ $target->children_given_care_by_groups_target }}</td>
            </tr>
            <tr>
              <td># of Unique Household Income Sources in Previous 3 Months</td>
              <td>{{ $target->unique_hh_inc_sources_target }}</td>
            </tr>
            <tr>
              <td># of Direct Beneficiaries</td>
              <td>{{ $target->direct_beneficiaries_target }}</td>
            </tr>
            <tr>
              <td># of Children</td>
              <td>{{ $target->num_children_target }}</td>
            </tr>
            <tr>
              <td># of Women</td>
              <td>{{ $target->num_women_target }}</td>
            </tr>
            <tr>
              <td># of Total Household Members</td>
              <td>{{ $target->num_hh_members_target }}</td>
            </tr>
          @endforeach
          </table>
        </div>

      </div>
    </div>
  </div>



    <div class="card-footer text-center">
      <a href="{{ route('program-targets.index') }}" class="btn btn-sm btn-info">Back</a>
    </div>

  </div>

</div>

@endsection
