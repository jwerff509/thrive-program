<div class="container-fluid justify-content-center">

  <div class="form-group row">

    <div class="flash-message col-md-6 col-md-offset-3">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
    </div>

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('country')) ? 'has-error' : ''; ?>">
      {!! Form::label('country_id', 'Country:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::select('country_id', array('' => 'Select a country...') + $countries, array('class' => 'form-control', 'id' => 'country_id')) !!}
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('reporting_term')) ? 'has-error' : ''; ?>">
        {!! Form::label('reporting_term', 'Select a Quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::select('reporting_term', array(
            '' => 'Select Quarter...',
            '12-31' => '(Q1): 01/10 - 31/12',
            '03-31' => '(Q2): 01/01 - 31/03',
            '06-30' => '(Q3): 01/04 - 30/06',
            '09-30' => '(Q4): 01/07 - 30/09',
          ), Session('reporting_term')) !!}
          <span class="help-block">
            @if ($errors->has('reporting_term'))
              {{ $errors->first('reporting_term') }}
            @endif
          </span>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('year')) ? 'has-error' : ''; ?>">
        {!! Form::label('year', 'Select a Year:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::select('year', array(
            '' => 'Select Year...',
            '2017' => '2017',
            '2018' => '2018',
            '2019' => '2019',
            '2020' => '2020',
            '2021' => '2021',
            '2022' => '2022',
            '2023' => '2023',
          ), Session('year')) !!}
          <span class="help-block">
            @if ($errors->has('year'))
              {{ $errors->first('year') }}
            @endif
          </span>
        </div>
      </div>
    </div>

    <hr>

    <div class="form-group row">
      {!! Form::label('header', 'Quarterly Actuals', array('class' => 'col-md-6 form-control-label text-right')) !!}
    </div>

    <div class="form-group row">
      {!! Form::label('improved_seed_actual', '# Farmers Using Improved Seed', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('improved_seed_actual', '', array('class' => 'form-control', 'placeholder' => 'improved seed')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_storage_actual', '# Farmers Using Improved Crop Storage', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('improved_storage_actual', '', array('class' => 'form-control', 'placeholder' => 'improved storage')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_tools_actual', '# Farmers Using Improved Tools & Practices', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('improved_tools_actual', '', array('class' => 'form-control', 'placeholder' => 'improved tools & practices')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_with_irrigation_actual', '# Farmers Using Some Form of Irrigation', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('farmers_with_irrigation_actual', '', array('class' => 'form-control', 'placeholder' => '# farmers using irrigation')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('increase_in_yield_per_hectare_actual', 'Ave. % Increase in Yield per Hectare', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('increase_in_yield_per_hectare_actual', '', array('class' => 'form-control', 'placeholder' => '% Increase in Yield per Ha')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('ha_with_irrigation_actual', '# Hectares of Farmland with Irrigation', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('ha_with_irrigation_actual', '', array('class' => 'form-control', 'placeholder' => '# Ha Farmland with Irrigation')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_savings_groups_actual', '# of Savings Groups', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_savings_groups_actual', '', array('class' => 'form-control', 'placeholder' => '# of Savings Groups')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_savings_group_members_actual', '# of Savings Group Members', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_savings_group_members_actual', '', array('class' => 'form-control', 'placeholder' => '# Savings Group Members')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('savings_groups_total_balance_actual', 'Total Balance of SG Group Accounts in USD', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('savings_groups_total_balance_actual', '', array('class' => 'form-control', 'placeholder' => 'Total Bal of SG Accounts')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('members_with_vf_loan_actual', '# VF Clients with Ag or Microenterprise Loans', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('members_with_vf_loan_actual', '', array('class' => 'form-control', 'placeholder' => '# VF Clients with Loans')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_with_vc_ins_actual', '# Farmers Using Value Chain Insurance', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('farmers_with_vc_ins_actual', '', array('class' => 'form-control', 'placeholder' => '# Farmers Using VC Insurance')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_producers_groups_actual', '# of Producers Groups (PGs)', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_producers_groups_actual', '', array('class' => 'form-control', 'placeholder' => '# of Producers Groups')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_producers_group_members_actual', '# of Producers Group Members', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_producers_group_members_actual', '', array('class' => 'form-control', 'placeholder' => '# of PG Members')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_prod_groups_sell_vc_product_actual', '# of PGs who Sell Value Chain Products', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_prod_groups_sell_vc_product_actual', '', array('class' => 'form-control', 'placeholder' => '# of PGs who Sell VC Products')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_prod_groups_local_markets_actual', '# of PGs Accessing Local Markets', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_prod_groups_local_markets_actual', '', array('class' => 'form-control', 'placeholder' => '# of PGs Using Local Markets')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_prod_groups_expanded_markets_actual', '# of PGs Accessing Markets Beyond Local Markets', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_prod_groups_expanded_markets_actual', '', array('class' => 'form-control', 'placeholder' => '# of PGs Using Expanded Markets')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_reclaimed_for_ag_actual', '# Hectares Reclaimed for Agriculture', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('hectares_reclaimed_for_ag_actual', '', array('class' => 'form-control', 'placeholder' => '# Ha Reclaimed for Ag')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_farmed_soil_water_cons_actual', '# Ha. Farmed with Soil & Water Conservation Techniques', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('hectares_farmed_soil_water_cons_actual', '', array('class' => 'form-control', 'placeholder' => '# Ha. with Soil & Water Cons Techniques')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_using_water_catchment_actual', '# of Farmers Using Water Catchment Techniques', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('farmers_using_water_catchment_actual', '', array('class' => 'form-control', 'placeholder' => '# Using Water Catchment Techniques')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('comm_watershed_rehab_actual', '# of Communities With Watershed Rehabilitated & Protected', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('comm_watershed_rehab_actual', '', array('class' => 'form-control', 'placeholder' => '# of Comm With Watershed Protected')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('trees_planted_actual', '# of Trees Planted/Regenerated', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('trees_planted_actual', '', array('class' => 'form-control', 'placeholder' => '# of Trees Planted/Regenerated')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('members_with_emer_savings_actual', '# of THRIVE Participants With Emergency Savings ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('members_with_emer_savings_actual', '', array('class' => 'form-control', 'placeholder' => '# of THRIVE Participants With Emergency Savings')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_using_ews_actual', '# of Farmers Using Early Warning Systems ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('farmers_using_ews_actual', '', array('class' => 'form-control', 'placeholder' => '# of Farmers Using EWS')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('members_received_ewv_training_actual', '# of People Having Received EWV Training ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('members_received_ewv_training_actual', '', array('class' => 'form-control', 'placeholder' => '# of People Having Received EWV Training')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('ewv_trainees_attest_value_trans_actual', '# of EWV Trainees Attesting to Value Transformation ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('ewv_trainees_attest_value_trans_actual', '', array('class' => 'form-control', 'placeholder' => '# # of EWV Trainees Attesting to Value Transformation')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('faith_leaders_in_ewv_training_actual', '# of Faith Leaders Engaged in EWV Training ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('faith_leaders_in_ewv_training_actual', '', array('class' => 'form-control', 'placeholder' => '# of Faith Leaders Engaged in EWV Training')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('groups_undertaking_political_rep_actual', '# of Vulnerable Groups Undertaking Political Representation ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('groups_undertaking_political_rep_actual', '', array('class' => 'form-control', 'placeholder' => '# of Vulnerable Groups Undertaking Political Representation')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('children_given_care_by_groups_actual', '# of Vulnerable Children Given Care by the Groups ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('children_given_care_by_groups_actual', '', array('class' => 'form-control', 'placeholder' => '# of Vulnerable Children Given Care by the Groups')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('unique_hh_inc_sources_actual', '# of Unique Household Income Sources in Previous 3 Months ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('unique_hh_inc_sources_actual', '', array('class' => 'form-control', 'placeholder' => '# of Unique Household Income Sources in Previous 3 Months')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('direct_beneficiaries_actual', '# of Direct Beneficiaries ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('direct_beneficiaries_actual', '', array('class' => 'form-control', 'placeholder' => '# of Direct Beneficiaries')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_children_actual', '# of Children ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_children_actual', '', array('class' => 'form-control', 'placeholder' => '# of Children')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_women_actual', '# of Women ', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_women_actual', '', array('class' => 'form-control', 'placeholder' => '# of Women')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_hh_members_actual', '# of Total Household Members ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_hh_members_actual', '', array('class' => 'form-control', 'placeholder' => '# of HH Members')) !!}
      </div>
    </div>

    <div class="card-footer text-center">
      {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
      {!! Form::submit('Save', ['class' => 'btn btn-sm btn-success', 'name' => 'submitbutton']) !!}
    </div>

  </div>

</div>
