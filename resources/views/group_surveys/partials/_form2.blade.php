<div class="container-fluid">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

  <div class="form-group row">
    <div class="flash-message col-md-6 col-md-offset-3">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div>

<!-- Testing the storage link
{{--
    <div class="form-group row">
      <a href="{{ asset('storage/Test2.xlsx') }}">Test 2 download </a>
    </div>
    --}}
-->
    <div id="part-1">
    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('group_name')) ? 'has-error' : ''; ?>">
      {!! Form::label('group_name', 'ID2 - Group Name:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('group_name', Session('group_name'), array('class' => 'typeahead-group-name form-control', 'placeholder' => 'Group Name', 'autocomplete' => 'off', 'id' => 'group_name' )) !!}

          <script>
            jQuery(document).ready(function($) {

              // Set the Options for "Bloodhound" suggestion engine
              var engine = new Bloodhound({
                remote: {
                  // url: 'http://localhost/groupsFind/%QUERY%',
                  url: 'https://thriveprograms.org/groupsFind/%QUERY%',
                  //{{--url: "{{ route('groupsFind', ['QUERY' => '%QUERY%']) }}", --}}
                  wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace
              });

              $("#group_name").typeahead({
                //hint: true,
                //highlight: true,
                //minLength: 1,
                limit: 10
              }, {
                source: engine.ttAdapter(),
                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'groups',
                valueKey: 'group_id',
                displayKey: 'name',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {

                  empty: [
                  '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                  ],

                  header: [
                  '<div class="list-group search-results-dropdown">'
                  ],
                  suggestion: function (data) {
                    //return '<a href="' + data.name + '" class="list-group-item">' + data.id + ' - @' + data.name + '</a>'
                    return '<div style="font-weight:bold; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
                  }
                }
              //}).on('typeahead:selected typeahead:autocompleted typeahead:change', function(e, datum) {
              }).on('typeahead:change typeahead:selected', function(e, datum) {
                console.log(datum);
                $('#group_id').val(datum.group_id);
                $('#group_name').val(datum);
                //console.log($('#group_name'));
              });
            });

          </script>

          <span class="help-block">
            @if ($errors->has('group_name'))
              {{ $errors->first('group_name') }}
            @endif
          </span>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('area_program')) ? 'has-error' : ''; ?>">
      {!! Form::label('area_program', 'ID3 - Area Program:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::select('area_program', array('default' => 'Area Program...') + $areaPrograms, Session('area_program'), array('class' => 'form-control', 'id' => 'id')) !!}
          <span class="help-block">
            @if ($errors->has('area_program'))
              {{ $errors->first('area_program') }}
            @endif
          </span>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('zone')) ? 'has-error' : ''; ?>">
      {!! Form::label('zone', 'ID4 - Zone Name:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('zone', Session('zone'), array('class' => 'typeahead-zone form-control', 'placeholder' => 'Zone Name', 'id' => 'zone', 'autocomplete' => 'off')) !!}
          <script>
            jQuery(document).ready(function($) {

              // Set the Options for "Bloodhound" suggestion engine
              var zones = new Bloodhound({
                remote: {
                  //url: 'http://localhost/zonesFind/%QUERY%',
                  url:  'https://thriveprograms.org/zonesFind/%QUERY%',
                  //{{--url: "{{ route('groupsFind', ['QUERY' => '%QUERY%']) }}", --}}
                  wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace
              });

              $("#zone").typeahead({
                //hint: true,
                //highlight: true,
                //minLength: 1,
                limit: 10
              }, {
                source: zones.ttAdapter(),
                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'zones',
                valueKey: 'zone_id',
                displayKey: 'name',
                // the key from the array we want to display (name,id,email,etc...)
                templates: {

                  empty: [
                  '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                  ],

                  header: [
                  '<div class="list-group search-results-dropdown">'
                  ],
                  suggestion: function (data) {
                    //return '<a href="' + data.name + '" class="list-group-item">' + data.id + ' - @' + data.name + '</a>'
                    return '<div style="font-weight:bold; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
                  }
                }
              }).on('typeahead:selected typeahead:autocompleted', function(e, datum) {
                $('#zone_id').val(datum.zone_id);
                console.log($('#zone_id'));
              });
            });
          </script>
        <span class="help-block">
          @if ($errors->has('zone'))
            {{ $errors->first('zone') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('village_name')) ? 'has-error' : ''; ?>">
    {!! Form::label('village_name', 'ID5 - Village Name:', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('village_name', Session('village_name'), array('class' => 'typeahead-village-name form-control', 'placeholder' => 'Village Name', 'id' => 'village_name', 'autocomplete' => 'off')) !!}
        <script>
          jQuery(document).ready(function($) {

            // Set the Options for "Bloodhound" suggestion engine
            var villages = new Bloodhound({
              remote: {
                //url: 'http://localhost/villagesFind/%QUERY%',
                url: 'https://thriveprograms.org/villagesFind/%QUERY%',
                //{{--url: "{{ route('groupsFind', ['QUERY' => '%QUERY%']) }}", --}}
                wildcard: '%QUERY%'
              },
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#village_name").typeahead({
              //hint: true,
              //highlight: true,
              //minLength: 1,
              limit: 10
            }, {
              source: villages.ttAdapter(),
              // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
              name: 'villages',
              valueKey: 'village_id',
              displayKey: 'name',
              // the key from the array we want to display (name,id,email,etc...)
              templates: {

                empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],

                header: [
                '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                  //return '<a href="' + data.name + '" class="list-group-item">' + data.id + ' - @' + data.name + '</a>'
                  return '<div style="font-weight:bold; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
                }
              }
            }).on('typeahead:selected typeahead:autocompleted', function(e, datum) {
              $('#village_id').val(datum.village_id);
              console.log($('#village_id'));
            });
          });
        </script>
        <span class="help-block">
          @if ($errors->has('village_name'))
            {{ $errors->first('village_name') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('reporting_term')) ? 'has-error' : ''; ?>">
      {!! Form::label('reporting_term', 'ID6 - Time Frame (Quarter):', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('reporting_term', array('' => 'Select Quarter...') + $reportingTerms, Session('reporting_term'), array('id' => 'id', 'class' => 'form-control')) !!}
        <span class="help-block">
          @if ($errors->has('reporting_term'))
            {{ $errors->first('reporting_term') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('year')) ? 'has-error' : ''; ?>">
      {!! Form::label('year', 'ID7 - Year:', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('year', array(
          '' => 'Select Year...',
          '2017' => '2017',
          '2018' => '2018',
          '2019' => '2019',
        ), Session('year')) !!}
        <span class="help-block">
          @if ($errors->has('year'))
            {{ $errors->first('year') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <div class="card-footer text-center">
    {!! Form::button('Add Individual Data', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

<!--
{{--}}
  <div class="card-footer text-center">
    @echo {{ $group_name }}
  </div>
  --}}
-->

</div>

<!--- End Part 1 ------------------------------------------------------->


<!--
{{-- }}

  <div class="form-group row">
    {!! Form::label('group_type', 'G1 - Producers Group, Farmer Field School, or Farmer Unit Group', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('group_type', array('None' => 'None or N/A', 'Producers Group' => 'Producers Group', 'Farmer Field School' => 'Farmer Field School', 'Farmer Unit Group' => 'Farmer Unit Group')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('num_savings_group_members', 'G2 - # Members Actively Saving (Last 90 Days):', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('num_savings_group_members', '', array('class' => 'form-control', 'placeholder' => '# Members Actively Saving')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('account_balance', 'G3 - Total Amount Saved:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('account_balance', '', array('class' => 'form-control', 'placeholder' => 'Total Savings Acct Balance')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('primary_value_chain', 'G4 - Primary THRIVE Supported Value Chain:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_value_chain', array('default' => 'None or N/A') + $valueChains, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <!-- This script shows the 'primary_veg' selection box only if "Horticulture" is selected
       in the 'primary_value_chain' select box above.                                   -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>

    $('#primary_value_chain').on('change', function() {
      $("#horticulture").css('display', (this.value === '2') ? 'block' : 'none');
    });

  </script>

  <div class="form-group row" id="horticulture" style="display:none;">
    {!! Form::label('primary_vegetable_grown', 'G5 - What is/was the PRIMARY Vegetable Grown:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_vegetable_grown', array('default' => 'Select a vegetable...') + $vegetables, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('value_chain_unit', 'G13 - PRIMARY Unit of Sale for Value Chain:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('value_chain_unit', array('default' => 'None or N/A') + $valueChainUnits, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_price', 'G15 - Current Sales Price per Value Chain Unit:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('sales_price', '', array('class' => 'form-control', 'placeholder' => 'Sales Price per VC Unit')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_locations', 'G16 - Select All Locations Where Group Has Sold Goods this quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::checkbox('sales_locations[]', 'Village Market') !!}<span> Village Market <br></span>
      {!! Form::checkbox('sales_locations[]', 'District Market') !!}<span> District Market <br></span>
      {!! Form::checkbox('sales_locations[]', 'Provincial/Regional Market') !!}<span> Regional Market <br></span>
      {!! Form::checkbox('sales_locations[]', 'National Market') !!}<span> National Market <br></span>
      {!! Form::checkbox('sales_locations[]', 'International Market') !!}<span> International Market <br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('trees_planted', 'G8 - # of Trees Planted/Regenerated During This Quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('trees_planted', '', array('class' => 'form-control', 'placeholder' => '# Trees Planted/Regenerated')) !!}
    </div>
  </div>

<!-- Need to make this 2 input boxes, one for width and one for length and then calculate the hectares from there. -->
  <div class="form-group row">
    {!! Form::label('hectares_reclaimed', 'G9 - Size of Land Regenerated/Reclaimed This Quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_reclaimed_width', '', array('class' => 'form-control', 'placeholder' => 'Width (meters)')) !!}
      {!! Form::text('hectares_reclaimed_length', '', array('class' => 'form-control', 'placeholder' => 'Length (meters)')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('num_group_meetings', 'ID11 - # of Group Meetings (Last 90 Days):', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('num_group_meetings', '', array('class' => 'form-control', 'placeholder' => '# Meetings in Last 90 Days')) !!}
    </div>
  </div>

  <div class="card-footer text-center">
    {!! Form::button('Add Individual Data', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
<!-- End Part 1 -->

--}}
-->




<!-- Begin Part 2 -->

<div id="part-2" style="display:none">
  <div class="container-fluid justify-content-center">

  {{-- }}@include('group_surveys/partials/_header') --}}

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
      {!! Form::label('savings_group_member', 'Q1: Savings Group Member', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::select('savings_group_member', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('producers_group_member', 'Q2: Producers Group Member', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('producers_group_member', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_seed', 'Q3: Improved seed', array('class' => 'col-md-5 form-control-label  text-right')) !!}
      <div class="col-md-2 justify-content-center">
        {!! Form::select('improved_seed', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_storage', 'Q4: Improved storage', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('improved_storage', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('improved_practices', 'Q5: Improved practices', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('improved_practices', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_with_irrigation', 'Q6: Hectares With Irrigation', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('hectares_with_irrigation', '', array('class' => 'form-control', 'placeholder' => '# hectares with irrigation')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('accessed_vf_loan', 'Q7: Accessed VF loan', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('accessed_vf_loan', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('crop_insurance', 'Q8: Crop Insurance', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('crop_insurance', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_harvested', 'Q9: Hectares Harvested (all crops) ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('hectares_harvested', '', array('class' => 'form-control', 'placeholder' => '# hectares harvested of VC')) !!}
      </div>
    </div>

    <div class="card-footer text-center">
      {!! Form::button('Go Back', ['class' => 'btn btn-sm btn-warning', 'id' => 'hideshow2']) !!}
      {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
      {!! Form::button('Next Page', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow3']) !!}
    </div>

    </div>

  </div> <!------------------- End of Part 2 ------------------->



  <!-- Begin Part 3 -->

  <div id="part-3" style="display:none">
    <div class="container-fluid justify-content-center">

    <div class="form-group row">
      {!! Form::label('sell_vc_at_market', 'Q10: Sell VC Product at Market', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('sell_vc_at_market', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_reclaimed', 'Q11: Hectares Reclaimed', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('hectares_reclaimed', '', array('class' => 'form-control', 'placeholder' => '# hectares reclaimed')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('hectares_under_conservation', 'Q12: Hectares Soil/Water Conservation', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('hectares_under_conservation', '', array('class' => 'form-control', 'placeholder' => '# hectares soil/water conserv')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('water_catchment_used', 'Q13: Water catchment used', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('water_catchment_used', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('emergency_savings', 'Q14: Has emergency savings', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('emergency_savings', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('use_ews', 'Q15: Use EWS', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('use_ews', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('ewv_training', 'Q16: EWV Training', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('ewv_training', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('mindset_change', 'Q17: Mindset change', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('mindset_change', array('0' => 'No', '1' => 'Yes')) !!}
      </div>
    </div>

    <div class="card-footer text-center">
      {!! Form::button('Go Back', ['class' => 'btn btn-sm btn-warning', 'id' => 'hideshow4']) !!}
      {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
      {!! Form::button('Next Page', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow5']) !!}
    </div>

  </div>

  </div> <!------------------- End of Part 3 ------------------->


<!--  PPI Questions Below  -->
<div id="part-4" style="display:none">
  <div class="container-fluid justify-content-center">

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

<!-- End form loop -->



    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('data_collector')) ? 'has-error' : ''; ?>">
        {!! Form::label('data_collector', 'Data Collector Name', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('data_collector', Session('data_collector'), array('class' => 'form-control', 'placeholder' => 'Name of Data Collector')) !!}
          <span class="help-block">
            @if ($errors->has('data_collector'))
              {{ $errors->first('data_collector') }}
            @endif
          </span>
        </div>
      </div>
    </div>

    <div class="card-footer text-center">
      {!! Form::hidden('group_id', Session('group_id')) !!}
      {!! Form::hidden('zone_id', Session('zone_id')) !!}
      {!! Form::hidden('village_id', Session('village_id')) !!}
      {!! Form::button('Go Back', ['class' => 'btn btn-sm btn-warning', 'id' => 'hideshow6']) !!}
      {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
      {!! Form::submit('Save & Add Another', ['class' => 'btn btn-sm btn-info', 'name' => 'submitbutton']) !!}
      {!! Form::submit('Save & Close Survey', ['class' => 'btn btn-sm btn-success', 'name' => 'submitbutton']) !!}
    </div>

</div> <!------------------- End of Part 2 ------------------->

  <script>
  jQuery(document).ready(function(){

    jQuery('#hideshow').click(function() {
        jQuery('#part-1').toggle();
        jQuery('#part-2').toggle();
    });

    jQuery('#hideshow2').click(function() {
        jQuery('#part-2').toggle();
        jQuery('#part-1').toggle();
    });

    jQuery('#hideshow3').click(function() {
        jQuery('#part-3').toggle();
        jQuery('#part-2').toggle();
    });

    jQuery('#hideshow4').click(function() {
        jQuery('#part-2').toggle();
        jQuery('#part-3').toggle();
    });

    jQuery('#hideshow5').click(function() {
        jQuery('#part-3').toggle();
        jQuery('#part-4').toggle();
    });

    jQuery('#hideshow6').click(function() {
        jQuery('#part-4').toggle();
        jQuery('#part-3').toggle();
    });

  });
  </script>

</div>
