<div class="form-group row">
  {!! Form::label('member_id', 'Member ID (NRC Number):', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('member_id', '', array('class' => 'form-control')) !!}
  </div>
</div>
<!-- Need to add 2 fields, one for their family name and one for "other" names -->

<div class="form-group row">
  {!! Form::label('improved_seed', 'Is this member using improved seed:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('improved_seed', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('improved_storage', 'Is this member using improved storage methods:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('improved_storage', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('improved_practices', 'Is this member using improved farming techniques:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('improved_practices', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_with_irrigation', '# of hectares with irrigation:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_with_irrigation', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('accessed_vf_loan', 'Has this member accessed a Vision Fund loan:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('accessed_vf_loan', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('crop_insurance', 'Does this member have crop insurance:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('crop_insurance', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_harvested', 'How many hectares did this farmer harvest:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_harvested', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('kgs_harvested', 'How many Kgs did this farmer harvest:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('kgs_harvested', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('sold_group_value_chain_product', 'Did this farmer sell a group value chain product:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('sold_group_value_chain_product', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_reclaimed', 'How many hectares were reclaimed for agriculture:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('hectares_under_conservation', 'How many hectares were farmed with soil & water conservation techniques:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('hectares_under_conservation', '', array('class' => 'form-control')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('water_catchment_used', 'Did this farmer use water catchment techniques:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('water_catchment_used', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('emergency_savings', 'Does this farmer have any savings available for emergencies:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('emergency_savings', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('use_ews', 'Does this farmer use an early warning system (EWS):', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('use_ews', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('ewv_training', 'Has this farmer received EWV training:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('ewv_training', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="form-group row">
  {!! Form::label('mindset_change', 'Has this farmer reported a change in their mindset:', array('class' => 'col-md-5 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('mindset_change', array('0' => 'No', '1' => 'Yes')) !!}
  </div>
</div>
<div class="card-footer">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::hidden('group_details_id', $groupDetails->id) !!}
  {!! Form::submit('Save and Add Another', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
