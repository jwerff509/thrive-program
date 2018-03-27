<div class="container-fluid justify-content-center">

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-inline">
          {!! Form::label('nrc_number', 'NRC#', array('class' => 'form-control-label')) !!}
          {!! Form::label('family_name', 'Family Name', array('class' => 'form-control-label', 'size' => '20')) !!}
          {!! Form::label('other_name', 'Other Names', array('class' => 'form-control-label', 'size' => '20')) !!}
          {!! Form::label('vc_units_sold', 'HH9', array('class' => 'form-control-label')) !!}
          {!! Form::label('hectares_reclaimed', 'HH10', array('class' => 'form-control-label')) !!}
          {!! Form::label('hectares_under_conservation', 'HH11', array('class' => 'form-control-label')) !!}
          {!! Form::label('water_catchment_used', 'HH12', array('class' => 'form-control-label')) !!}
          {!! Form::label('emergency_savings', 'HH13', array('class' => 'form-control-label')) !!}
          {!! Form::label('use_ews', 'HH14', array('class' => 'form-control-label')) !!}
          {!! Form::label('ewv_training', 'HH15', array('class' => 'form-control-label')) !!}
          {!! Form::label('mindset_change', 'HH16', array('class' => 'form-control-label')) !!}
        </div>
      </div>
    </div>
  </div>

  @for($i=1; $i<21; $i++)
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <div class="form-inline">
            {!! Form::text('nrc_number[]', '', array('class' => 'form-control', 'size' => '10', 'placeholder' => 'NRC Number')) !!}
            {!! Form::text('family_name[]', '', array('class' => 'form-control', 'size' => '20')) !!}
            {!! Form::text('other_name[]', '', array('class' => 'form-control', 'size' => '20')) !!}
            {!! Form::text('vc_units_sold', '', array('class' => 'form-control', 'size' => '10')) !!}
            {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control', 'size' => '10')) !!}
            {!! Form::text('hectares_under_conservation', '', array('class' => 'form-control', 'size' => '10')) !!}
            {!! Form::select('water_catchment_used', array('0' => 'No', '1' => 'Yes')) !!}
            {!! Form::select('emergency_savings', array('0' => 'No', '1' => 'Yes')) !!}
            {!! Form::select('use_ews', array('0' => 'No', '1' => 'Yes')) !!}
            {!! Form::select('ewv_training', array('0' => 'No', '1' => 'Yes')) !!}
            {!! Form::select('mindset_change', array('0' => 'No', '1' => 'Yes')) !!}
          </div>
        </div>
      </div>
    </div>
  @endfor

</div>

<div class="card-footer text-center">
  {!! Form::submit('Save and Add Another', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
