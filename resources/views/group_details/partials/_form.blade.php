<div class="container-fluid">

  <div class="form-group row">
    {!! Form::label('reporting_term', 'ID6: ', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('reporting_term', array('default' => 'Reporting Term...') + $reportingTerms, array('id' => 'id', 'class' => 'form-control')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('year', 'ID7: ', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('year', array(
        'default' => 'Reporting Year...',
        '2017' => '2017',
        '2018' => '2018',
        '2019' => '2019',
      )) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('producers_group', 'ID8: Producers Group, farmer field school, or farmer unit group', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('producers_group', array('0' => 'No', '1' => 'Yes')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('savings_group_members', 'ID9: ', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('savings_group_members', '', array('class' => 'form-control', 'placeholder' => '# Members Actively Saving')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('account_balance', 'ID10: ', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('account_balance', '', array('class' => 'form-control', 'placeholder' => 'Total Savings Acct Balance')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('group_meetings', 'ID11: ', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('group_meetings', '', array('class' => 'form-control', 'placeholder' => '# Meetings in Last 90 Days')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('primary_value_chain', 'G1: ', array('class' => 'col-md-5 form-control-label text-right text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_value_chain', array('default' => 'Primary Value Chain...') + $valueChains, array('id' => 'id', 'class' => 'form-control')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>



  <!-- Need to add logic here to only show the vegetable select box if the Primary Thrive supported value chain is horticulture   -->



  <div class="form-group row">
    {!! Form::label('primary_veg', 'G2: IF HORTICULTURE ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_veg', array('default' => 'Select a vegetable...') + $vegetables, array('id' => 'id', 'class' => 'form-control')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('units_harvested', 'G3: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('units_harvested', '', array('class' => 'form-control', 'placeholder' => 'Units of VC Harvested')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_seed', 'G4: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('improved_seed', '', array('class' => 'form-control', 'placeholder' => '# Using Improved Seed')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_storage', 'G5: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('improved_storage', '', array('class' => 'form-control', 'placeholder' => '# Using Improved Storage')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_tools', 'G6: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('improved_tools', '', array('class' => 'form-control', 'placeholder' => '# Using Improved Tools')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('mem_with_irrigation', 'G7: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('mem_with_irrigation', '', array('class' => 'form-control', 'placeholder' => '# Members with Irrigation')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('vf_loan', 'G8: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('vf_loan', '', array('class' => 'form-control', 'placeholder' => '# Accessing VF Loan')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('vf_insurance', 'G9: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('vf_insurance', '', array('class' => 'form-control', 'placeholder' => '# Using VF Crop Insurance')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('mem_reclaimed_land', 'G10: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('mem_reclaimed_land', '', array('class' => 'form-control', 'placeholder' => '# Hectares of AG Land Reclaimed')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('soil_water_cons', 'G11: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('soil_water_cons', '', array('class' => 'form-control', 'placeholder' => '# Practicing Soil/Water Cons')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('water_catchment', 'G12: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('water_catchment', '', array('class' => 'form-control', 'placeholder' => '# Using Water Catchment')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_unit', 'G13: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('sales_unit', array('default' => 'Primary Value Chain Unit...') + $valueChainUnits, array('id' => 'id', 'class' => 'form-control')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('units_sold', 'G14: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('units_sold', '', array('class' => 'form-control', 'placeholder' => '# VC Units Sold')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_price', 'G15: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('sales_price', '', array('class' => 'form-control', 'placeholder' => 'Sales Price per VC Unit')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_location', 'G16: Select All Locations Where Group Has Sold Goods this quarter', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::checkbox('sales_location[]', 'Village Market') !!}<span> Village Market <br></span>
      {!! Form::checkbox('sales_location[]', 'District Market') !!}<span> District Market <br></span>
      {!! Form::checkbox('sales_location[]', 'Provincial/Regional Market') !!}<span> Regional Market <br></span>
      {!! Form::checkbox('sales_location[]', 'National Market') !!}<span> National Market <br></span>
      {!! Form::checkbox('sales_location[]', 'International Market') !!}<span> International Market <br></span>
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('trees_planted', 'G17: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('trees_planted', '', array('class' => 'form-control', 'placeholder' => '# Trees Planted/Regenerated')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('hectares_reclaimed', 'G18: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control', 'placeholder' => 'Hectares Land Regen/Reclaimed')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('mem_with_savings', 'G19: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('mem_with_savings', '', array('class' => 'form-control', 'placeholder' => '# Members with Emer Savings')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('ews_available', 'G20: Is there an Early Warning System (EWS) established in the community', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('ews_available', array('0' => 'No', '1' => 'Yes')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('ewv_training', 'G21: Number of members have attended an EWV training in the last 3 months', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('ewv_training', '', array('class' => 'form-control', 'placeholder' => '# Attended EWV Training')) !!}
      <span class="help-block"></br></span>
    </div>
  </div>

  <div class="card-footer text-center">
    {!! Form::hidden('group_id', $group->id) !!}
    {!! Form::submit('Add Group Members', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::submit('Add Individual Data', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
