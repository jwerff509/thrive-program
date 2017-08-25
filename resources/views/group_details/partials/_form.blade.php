<div class="form-group row">
  {!! Form::label('report_term_desc', 'ID6: Time Frame', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('report_term_desc', array(
      'October - December' => 'October - December',
      'January - March' => 'January - March',
      'April - June' => 'April - June',
      'July - September' => 'July - September',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('year', 'ID7: Reporting Year', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('year', array(
      '2019' => '2019',
      '2018' => '2018',
      '2017' => '2017',
      '2016' => '2016',
      '2015' => '2015',
      '2014' => '2014',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('savings_group', 'G1: Savings Group', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('savings_group', array('0' => 'No', '1' => 'Yes')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('account_balance', 'G2: Total Balance of the Group Savings Account', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('account_balance', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('producers_group', 'G3: Producers Group', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('producers_group', array('0' => 'No', '1' => 'Yes')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('value_chain', 'G4: Primary Value Chain', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('value_chain', array(
      '1' => 'Aquaculture',
      '2' => 'Beans',
      '3' => 'Dairy',
      '4' => 'Goats',
      '5' => 'Groundnuts',
      '6' => 'Horticulture',
      '7' => 'Poultry'
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<!--
<div class="form-group row">
  {!! Form::label('value_chain_unit', 'G5: What Unit is the Value Chain Typically Sold In', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('value_chain_unit', array(
      '1' => 'Unit 1',
      '2' => 'Unit 2',
      '3' => 'Unit 3',
      '4' => 'Unit 4',
      '5' => 'Unit 5'
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
-->
<div class="form-group row">
  {!! Form::label('sales_price', 'G5: Current Sales Price per KG (ZMK)', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('sales_price', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('sales_location', 'G6: Select All Locations Where Group Has Sold Goods', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::checkbox('sales_location[]', 'Village Market') !!}<span> Village Market <br></span>
    {!! Form::checkbox('sales_location[]', 'Town Market') !!}<span> Town Market <br></span>
    {!! Form::checkbox('sales_location[]', 'District Market') !!}<span> District Market <br></span>
    {!! Form::checkbox('sales_location[]', 'Regional Market') !!}<span> Regional Market <br></span>
    {!! Form::checkbox('sales_location[]', 'National Market') !!}<span> National Market <br></span>
    {!! Form::checkbox('sales_location[]', 'International Market') !!}<span> International Market <br></span>
    <span class="help-block"></br></span>
  </div>
</div>
<div class="card-footer text-center">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
