<div class="form-group row">
  {!! Form::label('member_id', 'HHID1: Unique ID', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('member_id', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('last_name', 'HHID2: Family Name', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('last_name', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('first_name', 'HHID3: Other Names', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('first_name', '', array('class' => 'form-control')) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('improved_seed', 'H1: Improved seed', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('improved_seed', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('improved_storage', 'H2: Improved storage', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('improved_storage', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('improved_practices', 'H3: Improved practices', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('improved_practices', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_with_irrigation', 'H4: # hectares with irrigation:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_with_irrigation', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('accessed_vf_loan', 'H5: Accessed VF loan', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('accessed_vf_loan', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('crop_insurance', 'H6: Crop Insurance', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('crop_insurance', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_harvested', 'H7: Hectares harvested (of VC)', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_harvested', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('kgs_harvested', 'H8: # of KGs Harvested (of VC)', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('kgs_harvested', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('sold_group_value_chain_product', 'HH9: Sold group value chain product', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('sold_group_value_chain_product', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_reclaimed', 'HH10: # Hectares reclaimed', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_under_conservation', 'HH11: # Hectares soil/water conservation', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_under_conservation', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('water_catchment_used', 'HH12: Water catchment used', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('water_catchment_used', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('emergency_savings', 'HH13: Have savings for emergency', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('emergency_savings', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('use_ews', 'HH14: Use EWS', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('use_ews', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('ewv_training', 'HH15: EWV Training', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('ewv_training', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('mindset_change', 'HH16: Mindset change', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('mindset_change', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="card-footer text-center">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::hidden('group_details_id', $groupDetails->id) !!}
  {!! Form::submit('Save and Add Another', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
