<div class="form-group row">
  {!! Form::label('report_term_desc', 'Reporting Term:', array('class' => 'col-md-5 form-control-label')) !!}
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
  {!! Form::label('year', 'Reporting Year:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('year', array(
      '2021' => '2021',
      '2020' => '2020',
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
  {!! Form::label('savings_group', 'Is This a Savings Group:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('savings_group', array('0' => 'No', '1' => 'Yes')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('account_balance', 'Total Balance of the Group Savings Account:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('account_balance', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('producers_group', 'Is This a Producers Group:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('producers_group', array('0' => 'No', '1' => 'Yes')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('value_chain', 'What is the Primary Value Chain:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('value_chain', array(
      '1' => 'Value Chain 1',
      '2' => 'Value Chain 2',
      '3' => 'Value Chain 3',
      '4' => 'Value Chain 4',
      '5' => 'Value Chain 5'
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('value_chain_unit', 'What Unit is the Value Chain Typically Sold In:', array('class' => 'col-md-5 form-control-label')) !!}
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
<div class="form-group row">
  {!! Form::label('sales_price', 'What is the Current Sales Price per Unit:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('sales_price', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('sales_location', 'Select All Locations Where Group Has Sold Goods:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::checkbox('sales_location[]', 'Village Market') !!}
    {!! Form::checkbox('sales_location[]', 'Town Market') !!}
    {!! Form::checkbox('sales_location[]', 'District Market') !!}
    {!! Form::checkbox('sales_location[]', 'Regional Market') !!}
    {!! Form::checkbox('sales_location[]', 'National Market') !!}
    {!! Form::checkbox('sales_location[]', 'International Market') !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="card-footer text-center">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
