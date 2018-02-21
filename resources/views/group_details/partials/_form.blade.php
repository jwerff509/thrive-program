<div class="form-group row">
  {!! Form::label('reporting_term', 'ID6: Time Frame', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('reporting_term', $reportingTerms, array('id' => 'id', 'class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('year', 'ID7: Reporting Year', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('year', array(
      '2017' => '2017',
      '2018' => '2018',
      '2019' => '2019',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('producers_group', 'ID8: Producers Group, farmer field school, or farmer unit group', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('producers_group', array('0' => 'No', '1' => 'Yes')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('savings_group_members', 'ID9: Members actively saving in a savings group in the last 3 months', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('savings_group_members', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('account_balance', 'ID10: Total Balance of the Group Savings Account', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('account_balance', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('group_meetings', 'ID11: How often has the group met in the last 90 days', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('group_meetings', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('primary_value_chain', 'G1: PRIMARY THRIVE Supported Value Chain', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('primary_value_chain', array('default' => 'Select a value chain...') + $valueChains, array('id' => 'id', 'class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>



<!-- Need to add logic here to only show the vegetable select box if the Primary Thrive supported value chain is horticulture   -->



<div class="form-group row">
  {!! Form::label('primary_veg', 'G2: IF HORTICULTURE - what is the primary vegetbale grown during this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('primary_veg', array('default' => 'Select a vegetable...') + $vegetables, array('id' => 'id', 'class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>





<div class="form-group row">
  {!! Form::label('units_harvested', 'G3: How much was harvested/produced from VC by group members (last 90 days)', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('units_harvested', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('improved_seed', 'G4: Number of members using improved seed for the project value chain during this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('improved_seed', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('improved_storage', 'G5: Number of members using improved storage solutions for the project value chain during this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('improved_storage', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('improved_tools', 'G6: Number of members using improved tools and practices during this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('improved_tools', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('mem_with_irrigation', 'G7: Number of members that CURRENTLY have irrigation for crops', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('mem_with_irrigation', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('vf_loan', 'G8: Number of members CURRENTLY accessing a Vision Fund loan', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('vf_loan', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('vf_insurance', 'G9: Number of members CURRENTLY using Vision Fund crop insurance', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('vf_insurance', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('mem_reclaimed_land', 'G10: Hectares of land that was "reclaimed" for agricultural purposes in the last 3 months', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('mem_reclaimed_land', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('soil_water_cons', 'G11: Number of members CURRENTLY practicing soil and water conservation techniques for any agricultural product', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('soil_water_cons', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('water_catchment', 'G12: Number of members CURRENTLY using water catchment techniques', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('water_catchment', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>







<div class="form-group row">
  {!! Form::label('sales_unit', 'G13: PRIMARY unit of sale for this value chain', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('sales_unit', array('default' => 'Select a value chain unit...') + $valueChainUnits, array('id' => 'id', 'class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('units_sold', 'G14: How much was sold from the VC in the last 3 months by members', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('units_sold', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('sales_price', 'G15: Current sales price per selected value chain unit', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('sales_price', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('sales_location', 'G16: Select All Locations Where Group Has Sold Goods this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::checkbox('sales_location[]', 'Village Market') !!}<span> Village Market <br></span>
    {!! Form::checkbox('sales_location[]', 'District Market') !!}<span> District Market <br></span>
    {!! Form::checkbox('sales_location[]', 'Provincial/Regional Market') !!}<span> Regional Market <br></span>
    {!! Form::checkbox('sales_location[]', 'National Market') !!}<span> National Market <br></span>
    {!! Form::checkbox('sales_location[]', 'International Market') !!}<span> International Market <br></span>
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('trees_planted', 'G17: Number of trees planted/regenerated during this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('trees_planted', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('hectares_reclaimed', 'G18: Number of hectares of land regenerated/reclaimed this quarter', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('mem_with_savings', 'G19: Number of members that CURRENTLY have emergency savings available', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('mem_with_savings', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('ews_available', 'G20: Is there an Early Warning System (EWS) established in the community', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('ews_available', array('0' => 'No', '1' => 'Yes')) !!}
    <span class="help-block"></br></span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('ewv_training', 'G21: Number of members have attended an EWV training in the last 3 months', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('ewv_training', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>


<div class="card-footer text-center">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::submit('Add Group Members', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Add Individual Data (Beta)', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Add Individual Data', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
