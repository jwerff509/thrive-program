<!--
<div class="form-group row">
  {!! Form::label('group_id1', 'Select a Group:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::select('group_id1', $groups, array('class' => 'form-control')) !!}
    <span class="help-block">Select an Existing Group</span>
  </div>
</div>
-->


<div class="form-group row">
  {!! Form::label('group_id', 'Group ID:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('group_id','', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Group ID</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('name', 'Name:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('name', '', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Group Name</span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('area_program', 'Area Program:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('area_program', '', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Area Program Name</span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('village_name', 'Village Name:', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('village_name', '', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Village Name</span>
  </div>
</div>
<div class="card-footer text-center">
    {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>
</div>
