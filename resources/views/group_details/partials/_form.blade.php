<div class="container-fluid">


  <!-- The following code is from the Groups create form, I'm putting it here to test out combining that page with this one -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>


  <div class="form-group row">

    <div class="form-group row">
      <div class="form-group <?php echo ($errors->has('group_name')) ? 'has-error' : ''; ?>">
      {!! Form::label('group_name', 'ID2 - Group Name:', array('class' => 'col-md-5 form-control-label text-right')) !!}
        <div class="col-md-2">
          {!! Form::text('group_name', '', array('class' => 'typeahead-group-name form-control', 'placeholder' => 'Group Name', 'autocomplete' => 'off', 'id' => 'group_name' )) !!}
          <script>
            jQuery(document).ready(function($) {

              // Set the Options for "Bloodhound" suggestion engine
              var engine = new Bloodhound({
                remote: {
                  url: 'http://localhost/groupsFind/%QUERY%',
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
              }).on('typeahead:selected typeahead:autocompleted', function(e, datum) {
                $('#group_id').val(datum.group_id);
                console.log($('#group_id'));
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
          {!! Form::select('area_program', array('default' => 'Area Program...') + $areaPrograms, array('id' => 'id', 'class' => 'form-control')) !!}
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
          {!! Form::text('zone', '', array('class' => 'typeahead-zone form-control', 'placeholder' => 'Zone Name', 'id' => 'zone', 'autocomplete' => 'off')) !!}
          <script>
            jQuery(document).ready(function($) {

              // Set the Options for "Bloodhound" suggestion engine
              var zones = new Bloodhound({
                remote: {
                  url: 'http://localhost/zonesFind/%QUERY%',
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
        {!! Form::text('village_name', '', array('class' => 'typeahead-village-name form-control', 'placeholder' => 'Village Name', 'id' => 'village_name', 'autocomplete' => 'off')) !!}
        <script>
          jQuery(document).ready(function($) {

            // Set the Options for "Bloodhound" suggestion engine
            var villages = new Bloodhound({
              remote: {
                url: 'http://localhost/villagesFind/%QUERY%',
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



  <!-- End of code from Groups create form. All code below this line is original to the group details create form -->












  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('reporting_term')) ? 'has-error' : ''; ?>">
      {!! Form::label('reporting_term', 'ID6 - Time Frame (Quarter):', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('reporting_term', array('' => 'Select Quarter...') + $reportingTerms, array('id' => 'id', 'class' => 'form-control')) !!}
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
      {!! Form::label('year', 'ID7 - Year:', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('year', array(
          '' => 'Select Year...',
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
    {!! Form::label('group_type', 'ID8 - Producers Group, Farmer Field School, or Farmer Unit Group', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('group_type', array('None' => 'None or N/A', 'Producers Group' => 'Producers Group', 'Farmer Field School' => 'Farmer Field School', 'Farmer Unit Group' => 'Farmer Unit Group')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('savings_group_members', 'ID9 - # Members Actively Saving (Last 90 Days):', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('savings_group_members', '', array('class' => 'form-control', 'placeholder' => '# Members Actively Saving')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('account_balance', 'ID10 - Total Amount Saved:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('account_balance', '', array('class' => 'form-control', 'placeholder' => 'Total Savings Acct Balance')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('group_meetings', 'ID11 - # of Group Meetings (Last 90 Days):', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('group_meetings', '', array('class' => 'form-control', 'placeholder' => '# Meetings in Last 90 Days')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('primary_value_chain', 'G1 - Primary THRIVE Supported Value Chain:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_value_chain', array('default' => 'None or N/A') + $valueChains, array('id' => 'id', 'class' => 'form-control')) !!}
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
    {!! Form::label('primary_veg', 'G2 - What is/was the PRIMARY Vegetable Grown:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('primary_veg', array('default' => 'Select a vegetable...') + $vegetables, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('units_harvested', 'G3 - How Much was Harvested/Produced from Value Chain:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('units_harvested', '', array('class' => 'form-control', 'placeholder' => 'Units of VC Harvested')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_seed', 'G4 - # Members Using Improved Seed:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('improved_seed', '', array('class' => 'form-control', 'placeholder' => '# Using Improved Seed')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_storage', 'G5 - # Members Using Improved Crop Storage:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('improved_storage', '', array('class' => 'form-control', 'placeholder' => '# Using Improved Storage')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('improved_tools', 'G6 - # Members Using Imrpoved Tools/Practices:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('improved_tools', '', array('class' => 'form-control', 'placeholder' => '# Using Improved Tools')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_with_irrigation', 'G7 - # Members That Currently Have Irrigation:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_with_irrigation', '', array('class' => 'form-control', 'placeholder' => '# Members with Irrigation')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_with_vf_loan', 'G8 - # Members Currently Accessing VF Loan:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_with_vf_loan', '', array('class' => 'form-control', 'placeholder' => '# Accessing VF Loan')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_with_crop_ins', 'G9 - # Members Currently Accessing VF Crop Insurance:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_with_crop_ins', '', array('class' => 'form-control', 'placeholder' => '# Using VF Crop Insurance')) !!}
    </div>
  </div>


<!-- Need to make this 2 input boxes, one for width and one for length and then calculate the hectares from there. -->
<!-- 3/20/18 - Moving this to the members list section as per Moffat's request.
{{--
  <div class="form-group row">
    {!! Form::label('hectares_reclaimed1', 'G10 - How Much Land Was Reclaimed for Agricultural Purposes (Last 90 Days):', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_reclaimed1', '', array('class' => 'form-control', 'placeholder' => '# Hectares of AG Land Reclaimed')) !!}
    </div>
  </div>
  --}}
-->

  <div class="form-group row">
    {!! Form::label('members_using_soil_water_cons', 'G11 - # Members Currently Practicing Soil Conservation Techniques:', array('class' => 'col-md-5 form-control-label text-right')) !!}
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_ripping', 'G11a - Ripping: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_ripping', '', array('class' => 'form-control', 'placeholder' => 'Ripping')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_mulching', 'G11b - Mulching: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_mulching', '', array('class' => 'form-control', 'placeholder' => 'Mulching')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_composting_liming', 'G11c - Composting / Liming: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_composting_liming', '', array('class' => 'form-control', 'placeholder' => 'Composting / Liming')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_crop_rotation', 'G11d - Crop Rotation: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_crop_rotation', '', array('class' => 'form-control', 'placeholder' => 'Crop Rotation')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_multiple_techniques', 'G11e - 3 or More Techniques on Same Land: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_multiple_techniques', '', array('class' => 'form-control', 'placeholder' => '3 or More Techniques')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('water_catchment', 'How Many Members are CURRENTLY Using the Following Water Catchment Techniques:', array('class' => 'col-md-5 form-control-label text-right')) !!}
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_contour_ridges', 'G12a - Contour Ridges:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_contour_ridges', '', array('class' => 'form-control', 'placeholder' => 'Contour Ridges')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_vetiver_grass', 'G12b - Vetiver Grass:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_vetiver_grass', '', array('class' => 'form-control', 'placeholder' => 'Vetiver Grass')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_weir', 'G12c - Weir:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_weir', '', array('class' => 'form-control', 'placeholder' => 'Weir')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_using_fallow', 'G12d - Fallow:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_using_fallow', '', array('class' => 'form-control', 'placeholder' => 'Fallow')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('value_chain_unit', 'G13 - PRIMARY Unit of Sale for Value Chain:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('value_chain_unit', array('default' => 'None or N/A') + $valueChainUnits, array('id' => 'id', 'class' => 'form-control')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('units_sold', 'G14 - How Much Was Sold From the Value Chain in the Last 3 Months by the Group Members:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('units_sold', '', array('class' => 'form-control', 'placeholder' => '# VC Units Sold')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_price', 'G15 - Current Sales Price per Value Chain Unit:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('sales_price', '', array('class' => 'form-control', 'placeholder' => 'Sales Price per VC Unit')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sales_location', 'G16 - Select All Locations Where Group Has Sold Goods this quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::checkbox('sales_location[]', 'Village Market') !!}<span> Village Market <br></span>
      {!! Form::checkbox('sales_location[]', 'District Market') !!}<span> District Market <br></span>
      {!! Form::checkbox('sales_location[]', 'Provincial/Regional Market') !!}<span> Regional Market <br></span>
      {!! Form::checkbox('sales_location[]', 'National Market') !!}<span> National Market <br></span>
      {!! Form::checkbox('sales_location[]', 'International Market') !!}<span> International Market <br></span>
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('trees_planted', 'G17 - # of Trees Planted/Regenerated During This Quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('trees_planted', '', array('class' => 'form-control', 'placeholder' => '# Trees Planted/Regenerated')) !!}
    </div>
  </div>

<!-- Need to make this 2 input boxes, one for width and one for length and then calculate the hectares from there. -->
  <div class="form-group row">
    {!! Form::label('hectares_reclaimed2', 'G18 - Size of Land Regenerated/Reclaimed This Quarter:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('hectares_reclaimed_width', '', array('class' => 'form-control', 'placeholder' => 'Width (meters)')) !!}
      {!! Form::text('hectares_reclaimed_length', '', array('class' => 'form-control', 'placeholder' => 'Length (meters)')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_with_emergency_savings', 'G19 - # of Members Who Currently Have Emergency Savings Available:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_with_emergency_savings', '', array('class' => 'form-control', 'placeholder' => '# Members with Emer Savings')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('ews_established', 'G20 - Is There an Early Warning System (EWS) Established in the Community:', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::select('ews_established', array('0' => 'No', '1' => 'Yes')) !!}
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('members_attended_ewv_training', 'G21 - # Members that have Attended an EWV Training (Last 90 Days):', array('class' => 'col-md-5 form-control-label text-right')) !!}
    <div class="col-md-2">
      {!! Form::text('members_attended_ewv_training', '', array('class' => 'form-control', 'placeholder' => '# Attended EWV Training')) !!}
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
    {!! Form::submit('Add Group Members', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
