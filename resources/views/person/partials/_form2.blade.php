<div class="container-fluid text-center">

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-inline">
          {!! Form::label('nrc_number', 'NRC#', array('class' => 'form-control-label')) !!}
          {!! Form::label('family_name', 'Family Name', array('class' => 'form-control-label', 'size' => '20')) !!}
          {!! Form::label('other_name', 'Other Names', array('class' => 'form-control-label', 'size' => '20')) !!}
          {!! Form::label('improved_seed', 'Improved Seed', array('class' => 'form-control-label')) !!}
          {!! Form::label('improved_storage', 'Improved Storage', array('class' => 'form-control-label')) !!}
          {!! Form::label('improved_practices', 'Improved Practices', array('class' => 'form-control-label')) !!}
          {!! Form::label('hectares_with_irrigation', '# HA with Irrigation', array('class' => 'form-control-label', 'size' => '10')) !!}
          {!! Form::label('accessed_vf_loan', 'Accessed VF Loan', array('class' => 'form-control-label')) !!}
          {!! Form::label('crop_insurance', 'Crop Insurance', array('class' => 'form-control-label')) !!}
          {!! Form::label('hectares_harvested', '# HA Harvested', array('class' => 'form-control-label', 'size' => '10')) !!}
          {!! Form::label('kgs_harvested', '# Units Harvested', array('class' => 'form-control-label', 'size' => '10')) !!}
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
            {!! Form::select('improved_seed[]', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')) !!}
            {!! Form::select('improved_storage[]', array('0' => 'No', '1' => 'Yes', ), array('class' => 'form-control')) !!}
            {!! Form::select('improved_practices[]', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')) !!}
            {!! Form::text('hectares_with_irrigation[]', '', array('class' => 'form-control', 'size' => '10')) !!}
            {!! Form::select('accessed_vf_loan[]', array('0' => 'No', '1' => 'Yes')) !!}
            {!! Form::select('crop_insurance[]', array('0' => 'No', '1' => 'Yes')) !!}
            {!! Form::text('hectares_harvested[]', '', array('class' => 'form-control', 'size' => '10')) !!}
            {!! Form::text('kgs_harvested[]', '', array('class' => 'form-control', 'size' => '10')) !!}
          </div>
        </div>
      </div>
    </div>
  @endfor

</div>

<div class="card-footer text-center">  
  {!! Form::submit('Next Page', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
