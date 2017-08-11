<div class="form-group row">
  {!! Form::label('income1', 'Income Source 1:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-4">
    {!! Form::text('income_source[1]','', array('class' => 'form-control')) !!}
    <span class="help-block">Income Source</span>
  </div>
  <div class="col-sm-3">
    {!! Form::text('yearly_income[1]','', array('class' => 'form-control')) !!}
    <span class="help-block">Total Yearly Income</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('income1', 'Income Source 2:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-4">
    {!! Form::text('income_source[2]','', array('class' => 'form-control')) !!}
    <span class="help-block">Income Source</span>
  </div>
  <div class="col-sm-3">
    {!! Form::text('yearly_income[2]','', array('class' => 'form-control')) !!}
    <span class="help-block">Total Yearly Income</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('income1', 'Income Source 3:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-4">
    {!! Form::text('income_source[3]','', array('class' => 'form-control')) !!}
    <span class="help-block">Income Source</span>
  </div>
  <div class="col-sm-3">
    {!! Form::text('yearly_income[3]','', array('class' => 'form-control')) !!}
    <span class="help-block">Total Yearly Income</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('income1', 'Income Source 4:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-4">
    {!! Form::text('income_source[4]','', array('class' => 'form-control')) !!}
    <span class="help-block">Income Source</span>
  </div>
  <div class="col-sm-3">
    {!! Form::text('yearly_income[4]','', array('class' => 'form-control')) !!}
    <span class="help-block">Total Yearly Income</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('income1', 'Income Source 5:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-4">
    {!! Form::text('income_source[5]','', array('class' => 'form-control')) !!}
    <span class="help-block">Income Source</span>
  </div>
  <div class="col-sm-3">
    {!! Form::text('yearly_income[5]','', array('class' => 'form-control')) !!}
    <span class="help-block">Total Yearly Income</span>
  </div>
</div>

<div class="card-footer text-center">
    {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>
</div>
