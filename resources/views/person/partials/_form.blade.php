<div class="form-group row">
  {!! Form::label('nrc_number', 'Farmer ID (NRC Number):', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('nrc_number', '', array('class' => 'form-control')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('last_name', 'Last Name:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('last_name', '', array('class' => 'form-control')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('first_name', 'First Name:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('first_name', '', array('class' => 'form-control')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('middle_name', 'Middle Name:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('middle_name', '', array('class' => 'form-control')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('sex', 'Sex:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('sex', array('Female' => 'Female', 'Male' => 'Male')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('cellphone_number', 'Cellphone Number:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('cellphone_number', '', array('class' => 'form-control')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('spouse_name', 'Spouse Name:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('spouse_name', '', array('class' => 'form-control')) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('children_under_59_months', '# of Children 0-59 Months:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-2">
    {!! Form::selectRange('males_under_59_months', 0, 15) !!}
    <span class="help-block">Males</span>
  </div>
  <div class="col-md-2">
    {!! Form::selectRange('females_under_59_months', 0, 15) !!}
    <span class="help-block">Females</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('children_6_to_14', '# of Children 6-14 Years:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-2">
    {!! Form::selectRange('males_6_to_14', 0, 15) !!}
    <span class="help-block">Males</span>
  </div>
  <div class="col-md-2">
    {!! Form::selectRange('females_6_to_14', 0, 15) !!}
    <span class="help-block">Females</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('children_6_to_14', '# of Children 15-18 Years:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-2">
    {!! Form::selectRange('males_15_to_18', 0, 15) !!}
    <span class="help-block">Males</span>
  </div>
  <div class="col-md-2">
    {!! Form::selectRange('females_15_to_18', 0, 15) !!}
    <span class="help-block">Females</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('adults_over_19', '# of Adults 19 Years and Above:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-2">
    {!! Form::selectRange('male_adults', 0, 15) !!}
    <span class="help-block">Males</span>
  </div>
  <div class="col-md-2">
    {!! Form::selectRange('female_adults', 0, 15) !!}
    <span class="help-block">Females</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('total_household_size', 'Total Household Size:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-5">
    {!! Form::selectRange('total_household_size', 0, 30) !!}
  </div>
</div>

<div class="card-footer text-center">
  {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
