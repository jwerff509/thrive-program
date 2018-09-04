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
          {!! Form::select('country_id', array('' => 'Select a country...') + $countries, array('class' => 'form-control', 'id' => 'country')) !!}
        </div>
      </div>
    </div>

    <hr>

    <div class="form-group row">
      {!! Form::label('header', 'LOP Targets', array('class' => 'col-md-6 form-control-label text-right')) !!}
    </div>

    <div class="form-group row">
      {!! Form::label('improved_seed_target', '# Farmers Using Improved Seed', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('improved_seed_target', '', array('class' => 'form-control', 'placeholder' => 'improved seed ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_storage_target', '# Farmers Using Improved Crop Storage', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('improved_storage_target', '', array('class' => 'form-control', 'placeholder' => 'improved storage ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_tools_target', '# Farmers Using Improved Tools & Practices', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('improved_tools_target', '', array('class' => 'form-control', 'placeholder' => 'improved tools & practices ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_with_irrigation_target', '# Farmers Using Some Form of Irrigation', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('farmers_with_irrigation_target', '', array('class' => 'form-control', 'placeholder' => '# farmers using irrigation ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('increase_in_yield_per_hectare_target', 'Ave. % Increase in Yield per Hectare', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('increase_in_yield_per_hectare_target', '', array('class' => 'form-control', 'placeholder' => '% Increase in Yield per Ha ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('ha_with_irrigation_target', '# Hectares of Farmland with Irrigation', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('ha_with_irrigation_target', '', array('class' => 'form-control', 'placeholder' => '# Ha Farmland with Irrigation ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_savings_groups_target', '# of Savings Groups', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_savings_groups_target', '', array('class' => 'form-control', 'placeholder' => '# of Savings Groups ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_savings_group_members_target', '# of Savings Group Members', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_savings_group_members_target', '', array('class' => 'form-control', 'placeholder' => '# Savings Group Members ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('savings_groups_total_balance_target', 'Total Balance of SG Group Accounts in USD', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('savings_groups_total_balance_target', '', array('class' => 'form-control', 'placeholder' => 'Total Bal of SG Accounts ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('members_with_vf_loan_target', '# VF Clients with Ag or Microenterprise Loans', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('members_with_vf_loan_target', '', array('class' => 'form-control', 'placeholder' => '# VF Clients with Loans ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_with_vc_ins_target', '# Farmers Using Value Chain Insurance', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('farmers_with_vc_ins_target', '', array('class' => 'form-control', 'placeholder' => '# Farmers Using VC Insurance ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_producers_groups_target', '# of Producers Groups (PGs)', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_producers_groups_target', '', array('class' => 'form-control', 'placeholder' => '# of Producers Groups ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_producers_group_members_target', '# of Producers Group Members', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_producers_group_members_target', '', array('class' => 'form-control', 'placeholder' => '# of PG Members ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_prod_groups_sell_vc_product_target', '# of PGs who Sell Value Chain Products', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_prod_groups_sell_vc_product_target', '', array('class' => 'form-control', 'placeholder' => '# of PGs who Sell VC Products ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_prod_groups_local_markets_target', '# of PGs Accessing Local Markets', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_prod_groups_local_markets_target', '', array('class' => 'form-control', 'placeholder' => '# of PGs Using Local Markets ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_prod_groups_expanded_markets_target', '# of PGs Accessing Markets Beyond Local Markets', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_prod_groups_expanded_markets_target', '', array('class' => 'form-control', 'placeholder' => '# of PGs Using Expanded Markets ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_reclaimed_for_ag_target', '# Hectares Reclaimed for Agriculture', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('hectares_reclaimed_for_ag_target', '', array('class' => 'form-control', 'placeholder' => '# Ha Reclaimed for Ag ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_farmed_soil_water_cons_target', '# Ha. Farmed with Soil & Water Conservation Techniques', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('hectares_farmed_soil_water_cons_target', '', array('class' => 'form-control', 'placeholder' => '# Ha. with Soil & Water Cons Techniques ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_using_water_catchment_target', '# of Farmers Using Water Catchment Techniques', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('farmers_using_water_catchment_target', '', array('class' => 'form-control', 'placeholder' => '# Using Water Catchment Techniques ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('comm_watershed_rehab_target', '# of Communities With Watershed Rehabilitated & Protected', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('comm_watershed_rehab_target', '', array('class' => 'form-control', 'placeholder' => '# of Comm With Watershed Protected ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('trees_planted_target', '# of Trees Planted/Regenerated', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('trees_planted_target', '', array('class' => 'form-control', 'placeholder' => '# of Trees Planted/Regenerated ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('members_with_emer_savings_target', '# of THRIVE Participants With Emergency Savings', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('members_with_emer_savings_target', '', array('class' => 'form-control', 'placeholder' => '# of THRIVE Participants With Emergency Savings ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('farmers_using_ews_target', '# of Farmers Using Early Warning Systems', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('farmers_using_ews_target', '', array('class' => 'form-control', 'placeholder' => '# of Farmers Using EWS ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('members_received_ewv_training_target', '# of People Having Received EWV Training', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('members_received_ewv_training_target', '', array('class' => 'form-control', 'placeholder' => '# of People Having Received EWV Training ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('ewv_trainees_attest_value_trans_target', '# of EWV Trainees Attesting to Value Transformation', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('ewv_trainees_attest_value_trans_target', '', array('class' => 'form-control', 'placeholder' => '# of EWV Trainees Attesting to Value Transformation ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('faith_leaders_in_ewv_training_target', '# of Faith Leaders Engaged in EWV Training', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('faith_leaders_in_ewv_training_target', '', array('class' => 'form-control', 'placeholder' => '# of Faith Leaders Engaged in EWV Training ')) !!}
      </div>
    </div>

    <!-- Show the 'primary_veg' selection box if "Horticulture" is selected as the primary value chain  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>

    $(document).ready(function() {

      // This onChange function is used when creating program targets.
      $('#country_id').on('change', function() {
        if(this.value === '1') {
          $("#political").css('display', 'block');
          $("#cva").css('display', 'none');
          $("#groupCva").css('display', 'none');
        } else if(this.value === '4') {
          $("#political").css('display', 'block');
          $("#cva").css('display', 'none');
          $("#groupCva").css('display', 'none');
        } else if(this.value === '5') {
          $("#political").css('display', 'block');
          $("#cva").css('display', 'none');
          $("#groupCva").css('display', 'none');
        } else if(this.value === '2') {
          $("#cva").css('display', 'block');
          $("#political").css('display', 'none');
          $("#groupCva").css('display', 'none');
        } else if (this.value === '3') {
          $("#groupCva").css('display', 'block');
          $("#political").css('display', 'none');
          $("#cva").css('display', 'none');
        }
      });

      // This function is used for the "Edit" program targets page
      var country = $('#country_id option:selected').val();

      if(country === '1') {
        $("#political").css('display', 'block');
        $("#cva").css('display', 'none');
        $("#groupCva").css('display', 'none');
      } else if(country === '4') {
        $("#political").css('display', 'block');
        $("#cva").css('display', 'none');
        $("#groupCva").css('display', 'none');
      } else if(country === '5') {
        $("#political").css('display', 'block');
        $("#cva").css('display', 'none');
        $("#groupCva").css('display', 'none');
      } else if(country === '2') {
        $("#cva").css('display', 'block');
        $("#political").css('display', 'none');
        $("#groupCva").css('display', 'none');
      } else if (country === '3') {
        $("#groupCva").css('display', 'block');
        $("#political").css('display', 'none');
        $("#cva").css('display', 'none');
      }

    });

    </script>

    <div class="form-group row" id="political" style="display:none;">
      {!! Form::label('groups_undertaking_political_rep_target', '# of Vulnerable Groups Undertaking Political Representation', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('groups_undertaking_political_rep_target', '', array('class' => 'form-control', 'placeholder' => '# of Vulnerable Groups Undertaking Political Representation')) !!}
      </div>
    </div>

    <div class="form-group row" id="cva" style="display:none;">
      {!! Form::label('participants_trained_in_cva_target', '# of Project Participants Trained in CVA', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('participants_trained_in_cva_target', '', array('class' => 'form-control', 'placeholder' => '# of Project Participants Trained in CVA')) !!}
      </div>
    </div>

    <div class="form-group row" id="groupCva" style="display:none;">
      {!! Form::label('groups_trained_in_cva_target', '# of Vulnerable Groups Trained in CVA', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('groups_trained_in_cva_target', '', array('class' => 'form-control', 'placeholder' => '# of Vulnerable Groups Trained in CVA')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('children_given_care_by_groups_target', '# of Vulnerable Children Given Care by the Groups', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('children_given_care_by_groups_target', '', array('class' => 'form-control', 'placeholder' => '# of Vulnerable Children Given Care by the Groups ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('unique_hh_inc_sources_target', '# of Unique Household Income Sources in Previous 3 Months', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('unique_hh_inc_sources_target', '', array('class' => 'form-control', 'placeholder' => '# of Unique Household Income Sources in Previous 3 Months ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('direct_beneficiaries_target', '# of Direct Beneficiaries', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('direct_beneficiaries_target', '', array('class' => 'form-control', 'placeholder' => '# of Direct Beneficiaries ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_children_target', '# of Children', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_children_target', '', array('class' => 'form-control', 'placeholder' => '# of Children ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_women_target', '# of Women', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::text('num_women_target', '', array('class' => 'form-control', 'placeholder' => '# of Women ')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('num_hh_members_target', '# of Total Household Members', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('num_hh_members_target', '', array('class' => 'form-control', 'placeholder' => '# of HH Members ')) !!}
      </div>
    </div>

    <div class="card-footer text-center">
      {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm btn-success', 'name' => 'submitbutton']) !!}
    </div>

  </div>

</div>
