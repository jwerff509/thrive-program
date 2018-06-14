<div id="part-2" style="display:none">
  <div class="container-fluid justify-content-center">

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('nrc_number')) ? 'has-error' : ''; ?>">
        {!! Form::label('nrc_number', 'NRC#: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
          <div class="col-md-2">
            {!! Form::text('nrc_number[{{ $i }}]', '', array('class' => 'form-control', 'placeholder' => 'NRC #')) !!}
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



<!--  PPI Questions Below  -->


  <div class="form-group row">
      {!! Form::label('question_1', 'PPI1: Total Household Members', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_1', array(
          '' => 'Select...',
          '0' => 'Eight or more',
          '7' => 'Seven',
          '9' => 'Six',
          '11' => 'Five',
          '15' => 'Four',
          '21' => 'Three',
          '29' => 'One or two',
        )) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('question_2', 'PPI2: Are All members aged 7 to 16 currently attending school', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_2', array(
          '' => 'Select...',
          '0' => 'No',
          '3' => 'Yes',
          '6' => 'No one 7 to 16',
        )) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('question_3', 'PPI3: Highest grade that the female head/spouse has attained', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_3', array(
          '' => 'Select...',
          '0' => 'None, or first to fifth grade',
          '2' => 'Sixth grade',
          '4' => 'Seventh to ninth grade',
          '9' => 'Tenth grade or higher',
          '5' => 'No female head/spouse',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_4', 'PPI4: Floor material', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_4', array(
          '' => 'Select...',
          '0' => 'Mud, wood only, or other',
          '2' => 'Concrete, or covered concrete',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_5', 'PPI5: Roof Material', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_5', array(
          '' => 'Select...',
          '0' => 'Grass/straw/thatch, or other',
          '3' => 'Iron sheets, or other non-asbestos tiles',
          '5' => 'Concrete, asbestos sheets, or asbestos tiles',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_6', 'PPI6: Main Energy Type Used for Cooking', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_6', array(
          '' => 'Select...',
          '0' => 'Firewood, coal, crop/livestock residues, or other',
          '4' => 'Charcoal',
          '15' => 'Gas, electricity, solar, or kerosene/paraffin',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_7', 'PPI7: TVs, DVDs/VCRs or home theatres, or satellite dish/decoders', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_7', array(
          '' => 'Select...',
          '0' => 'No TVs (regardless of others)',
          '6' => 'TV, but nothing else',
          '10' => 'TV, and something else (DVD, dish, etc.)',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_8', 'PPI8: Non-electric or electric irons', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_8', array(
          '' => 'Select...',
          '0' => 'None',
          '4' => 'Only non-electric',
          '11' => 'Electric, or both electric and non-electric',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_9', 'PPI9: Cellular phones', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_9', array(
          '' => 'Select...',
          '0' => 'No',
          '6' => 'Yes',
        )) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('question_10', 'PPI10: How many beds and mattresses does your household own', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('question_10', array(
          '' => 'Select...',
          '0' => 'None',
          '2' => 'One or more beds, but no mattresses',
          '4' => 'One mattress (regardless of beds)',
          '7' => 'Two or more mattresses (regardless of beds)',
        )) !!}
      </div>
    </div>

  </div>


    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('data_collector')) ? 'has-error' : ''; ?>">
        {!! Form::label('data_collector', 'Data Collector Name', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('data_collector', '', array('class' => 'form-control', 'placeholder' => 'Name of Data Collector')) !!}
          <span class="help-block">
            @if ($errors->has('data_collector'))
              {{ $errors->first('data_collector') }}
            @endif
          </span>
        </div>
      </div>
    </div>

    <div class="card-footer text-center">
      {!! Form::hidden('group_id', '', array('id' => 'group_id')) !!}
      {!! Form::hidden('zone_id', '', array('id' => 'zone_id')) !!}
      {!! Form::hidden('village_id', '', array('id' => 'village_id')) !!}
      {!! Form::button('Go Back', ['class' => 'btn btn-sm btn-warning', 'id' => 'hideshow2']) !!}
      {!! Form::button('Add PPI Data', ['class' => 'btn btn-sm btn-primary', 'id' => 'btn-add']) !!}
      {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
      {!! Form::submit('Save Survey', ['class' => 'btn btn-sm btn-success', 'name' => 'submitbutton']) !!}
    </div>

</div>
