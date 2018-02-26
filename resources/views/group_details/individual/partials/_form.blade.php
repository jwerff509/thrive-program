<div class="container-fluid">

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('reporting_term')) ? 'has-error' : ''; ?>">
      {!! Form::label('reporting_term', 'ID6: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('reporting_term', array('' => 'Reporting Term...') + $reportingTerms, array('id' => 'id', 'class' => 'form-control')) !!}
        <span class="help-block">
          @if ($errors->has('reporting_term'))
            {{ $errors->first('reporting_term') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('reporting_term')) ? 'has-error' : ''; ?>">
      {!! Form::label('year', 'ID7: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('year', array(
          '' => 'Reporting Year...',
          '2017' => '2017',
          '2018' => '2018',
          '2019' => '2019',
        )) !!}
        <span class="help-block">
          @if ($errors->has('year'))
            {{ $errors->first('year') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('producers_group', 'G1: Producers Group', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('producers_group', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('savings_group_members', 'G2: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('savings_group_members', '', array('class' => 'form-control', 'placeholder' => '# Members Actively Saving')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('account_balance', 'G3: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('account_balance', '', array('class' => 'form-control', 'placeholder' => 'Total Savings Acct Balance')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('primary_value_chain', 'G4: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_value_chain', array('default' => 'Primary Value Chain...') + $valueChains, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <!-- This script shows the 'primary_veg' selection box only if "Horticulture" is selected
       in the 'primary_value_chain' select box above.
  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>

    $('#primary_value_chain').on('change', function() {

      $("#horticulture").css('display', (this.value === '2') ? 'block' : 'none');

    });

  </script>

  <div class="form-group row" id="horticulture" style="display:none;">
    {!! Form::label('primary_veg', 'G5: IF HORTICULTURE ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_veg', array('default' => 'Select a vegetable...') + $vegetables, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_unit', 'G6a: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('sales_unit', array('default' => 'Primary Value Chain Unit...') + $valueChainUnits, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_price', 'G6b: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('sales_price', '', array('class' => 'form-control', 'placeholder' => 'Sales Price per VC Unit')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_location', 'G7: Select All Locations Where Group Has Sold Goods this quarter', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::checkbox('sales_location[]', 'Village Market') !!}<span> Village Market <br></span>
      {!! Form::checkbox('sales_location[]', 'District Market') !!}<span> District Market <br></span>
      {!! Form::checkbox('sales_location[]', 'Provincial/Regional Market') !!}<span> Regional Market <br></span>
      {!! Form::checkbox('sales_location[]', 'National Market') !!}<span> National Market <br></span>
      {!! Form::checkbox('sales_location[]', 'International Market') !!}<span> International Market <br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('trees_planted', 'G8: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('trees_planted', '', array('class' => 'form-control', 'placeholder' => '# Trees Planted/Regenerated')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('hectares_reclaimed2', 'G9: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_reclaimed2', '', array('class' => 'form-control', 'placeholder' => 'Hectares Land Regen/Reclaimed')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('group_meetings', 'G10: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('group_meetings', '', array('class' => 'form-control', 'placeholder' => '# Meetings in Last 90 Days')) !!}
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
    {!! Form::hidden('group_id', $group->id) !!}
    {!! Form::submit('Add Individual Data', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
