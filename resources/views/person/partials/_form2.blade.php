<div class="container-fluid">

  <div class="form-group row">
    {!! Form::label('nrc_number', 'NRC#', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('family_name', 'Family Name', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('other_name', 'Other Names', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('improved_seed', 'Improved Seed', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('improved_storage', 'Improved Storage', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('improved_practices', 'Improved Practices', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('hectares_with_irrigation', '# HA with Irrigation', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('accessed_vf_loan', 'Accessed VF Loan', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('crop_insurance', 'Crop Insurance', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('hectares_harvested', '# HA Harvested', array('class' => 'col-lg-1 col-xl-1 form-control-label')) !!}
    {!! Form::label('kgs_harvested', '# Units Harvested', array('class' => 'col-lg-2 col-xl-2 form-control-label')) !!}
  </div>



  {{--}}
    {!! Form::label('vc_units_sold', 'HH9', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('hectares_reclaimed', 'HH10', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('hectares_under_conservation', 'HH11', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('water_catchment_used', 'HH12', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('emergency_savings', 'HH13', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('use_ews', 'HH14', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('ewv_training', 'HH15', array('class' => 'col-md-5 form-control-label')) !!}
    {!! Form::label('mindset_change', 'HH16', array('class' => 'col-md-5 form-control-label')) !!}
    --}}
<!--  </div> -->

  <div class="form-group row form-inline">

    <div class="col-lg-1 col-xl-1">
      {!! Form::text('nrc_number', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::text('family_name', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::text('other_name', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::select('improved_seed', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::select('improved_storage', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::select('improved_practices', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::text('hectares_with_irrigation', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::select('accessed_vf_loan', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::select('crop_insurance', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-lg-1 col-xl-1">
      {!! Form::text('hectares_harvested', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-lg-2 col-xl-2">
      {!! Form::text('kgs_harvested', '', array('class' => 'form-control')) !!}
    </div>







    <!--
    {{--}}

    <div class="col-md-4">
      {!! Form::text('vc_units_sold', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::text('hectares_under_conservation', '', array('class' => 'form-control')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::select('water_catchment_used', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::select('emergency_savings', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::select('use_ews', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::select('ewv_training', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    <div class="col-md-4">
      {!! Form::select('mindset_change', array('0' => 'No', '1' => 'Yes')) !!}
    </div>

    --}}
  -->

</div>

<div class="card-footer text-center">
  {!! Form::submit('Save and Add Another', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
