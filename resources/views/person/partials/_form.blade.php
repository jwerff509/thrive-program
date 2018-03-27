<div class="container-fluid">

  <div class="flash-message col-md-5 col-md-offset-3">
    @foreach(['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a hrfe="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('nrc_number')) ? 'has-error' : ''; ?>">
      {!! Form::label('nrc_number', 'NRC#: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('nrc_number', '', array('class' => 'form-control', 'placeholder' => 'NRC #')) !!}
          <span class="help-block">
            @if ($errors->has('nrc_number'))
              {{ $errors->first('nrc_number') }}
            @endif
          </span>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('last_name')) ? 'has-error' : ''; ?>">
      {!! Form::label('family_name', 'HHID2: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('family_name', '', array('class' => 'form-control', 'placeholder' => 'Family Name')) !!}
          <span class="help-block">
            @if ($errors->has('family_name'))
              {{ $errors->first('family_name') }}
            @endif
          </span>
        </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('first_name')) ? 'has-error' : ''; ?>">
      {!! Form::label('other_name', 'HHID3: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('other_name', '', array('class' => 'form-control', 'placeholder' => 'Other Name')) !!}
          <span class="help-block">
            @if ($errors->has('other_name'))
              {{ $errors->first('other_name') }}
            @endif
          </span>
        </div>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_seed', 'H1: Improved seed', array('class' => 'col-md-5 form-control-label  text-right')) !!}
    <div class="col-md-2 justify-content-center">
      {!! Form::select('improved_seed', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_storage', 'H2: Improved storage', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('improved_storage', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_practices', 'H3: Improved practices', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('improved_practices', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('hectares_with_irrigation', 'H4: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_with_irrigation', '', array('class' => 'form-control', 'placeholder' => '# hectares with irrigation')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('accessed_vf_loan', 'H5: Accessed VF loan', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('accessed_vf_loan', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('crop_insurance', 'H6: Crop Insurance', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('crop_insurance', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('hectares_harvested', 'H7: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_harvested', '', array('class' => 'form-control', 'placeholder' => '# hectares harvested of VC')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('kgs_harvested', 'H8: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('kgs_harvested', '', array('class' => 'form-control', 'placeholder' => '# Kgs harvested of VC')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('vc_units_sold', 'HH9: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('vc_units_sold', '', array('class' => 'form-control', 'placeholder' => '# units of VC sold')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('hectares_reclaimed', 'HH10: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control', 'placeholder' => '# hectares reclaimed')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('hectares_under_conservation', 'HH11: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_under_conservation', '', array('class' => 'form-control', 'placeholder' => '# hectares soil/water conserv')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('water_catchment_used', 'HH12: Water catchment used', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('water_catchment_used', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('emergency_savings', 'HH13: Has emergency savings', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('emergency_savings', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('use_ews', 'HH14: Use EWS', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('use_ews', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('ewv_training', 'HH15: EWV Training', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('ewv_training', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('mindset_change', 'HH16: Mindset change', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('mindset_change', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

<br><br>

  <div class="card-footer text-center col-md-7 col-md-offset-2">
    {!! Form::hidden('survey_details_id', $surveyDetails->id) !!}
    {!! Form::hidden('group_details_id', $groupDetails->id) !!}
    {!! Form::submit('Save and Add Another', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
