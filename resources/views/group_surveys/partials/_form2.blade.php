<div class="container-fluid">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

  <div class="form-group row">

    <div id="part-1">

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

<!-- Begin Part 2 -->

<div id="part-2" style="display:none">

  <div class="container-fluid justify-content-center">

    <table class="table">
      <tbody>
        <tr>
          <th style="width:10px">#</th>
          <th>NRC Number</th>
          <th>Family Name</th>
          <th>Other Name</th>
          <th>Improved<br>Seed</th>
          <th>Improved<br>Storage</th>
          <th>Improved<br>Practices</th>
          <th>HA With<br>Irrigation</th>
          <th>Accessed<br>VF Loan</th>
          <th>Crop<br>Insurance</th>
          <th>Hectares Harvested</th>
          <th># Units Harvested</th>
        </tr>

      @for($i=1; $i<21; $i++)
        <tr>
          <td><b>{{ $i }}</b></td>
          <td>{!! Form::text('nrc_number[]', '', array('class' => 'form-control', 'size' => '10', 'placeholder' => 'NRC Number', 'id' => 'nrc_number'.$i)) !!}</td>
          <td>{!! Form::text('family_name[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
          <td>{!! Form::text('other_name[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
          <td>{!! Form::select('improved_seed[]', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')) !!}</td>
          <td>{!! Form::select('improved_storage[]', array('0' => 'No', '1' => 'Yes', ), array('class' => 'form-control')) !!}</td>
          <td>{!! Form::select('improved_practices[]', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')) !!}</td>
          <td>{!! Form::text('hectares_with_irrigation[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
          <td>{!! Form::select('accessed_vf_loan[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
          <td>{!! Form::select('crop_insurance[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
          <td>{!! Form::text('hectares_harvested[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
          <td>{!! Form::text('kgs_harvested[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
        </tr>
      @endfor

      </tbody>
    </table>



<!--
{{--}}
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
    --}}
  -->

<!--
{{--}}
    @for($i=1; $i<21; $i++)
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="form-inline">
              {!! Form::text('nrc_number[]', '', array('class' => 'form-control', 'size' => '10', 'placeholder' => 'NRC Number', 'id' => 'nrc_number'.$i)) !!}
              {!! Form::text('family_name[]', '', array('class' => 'form-control', 'size' => '10')) !!}
              {!! Form::text('other_name[]', '', array('class' => 'form-control', 'size' => '10')) !!}

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
--}}
-->
</div>

  <div class="card-footer text-center">
    {!! Form::button('Go Back', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow2']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
    {!! Form::button('Next Page', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow3']) !!}
  </div>

</div> <!------------------- End of Part 2 ------------------->

<div id="part-3" style="display:none"> <!--------------------   Start of Part 3 ---------------------------->

  <div class="container-fluid justify-content-center text-center">

    <table class="table">
      <tbody>
        <tr align="center">
          <th style="width:10px">#</th>
          <th>VC Units Sold</th>
          <th># Hectares<br>Reclaimed</th>
          <th># Hectares Soil<br>Conservation</th>
          <th>Water Catchment<br>used</th>
          <th>Has Emergency<br>Savings</th>
          <th>Use EWS</th>
          <th>EWV Training</th>
          <th>Mindset Change</th>
        </tr>

        @for($i=1; $i<21; $i++)
          <tr>
            <td><b>{{ $i }}</b></td>
            <td>{!! Form::text('vc_units_sold[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
            <td>{!! Form::text('hectares_reclaimed[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
            <td>{!! Form::text('hectares_under_conservation[]', '', array('class' => 'form-control', 'size' => '10')) !!}</td>
            <td>{!! Form::select('water_catchment_used[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
            <td>{!! Form::select('emergency_savings[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
            <td>{!! Form::select('use_ews[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
            <td>{!! Form::select('ewv_training[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
            <td>{!! Form::select('mindset_change[]', array('0' => 'No', '1' => 'Yes')) !!}</td>
          </tr>
        @endfor

      </tbody>
    </table>


<!--
{{--}}
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
--}}
-->

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
    {!! Form::button('Go Back', ['class' => 'btn btn-sm btn-primary', 'id' => 'hideshow4']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
    {!! Form::submit('Save Survey', ['class' => 'btn btn-sm btn-success', 'name' => 'submitbutton']) !!}
  </div>

</div> <!------------------- End of Part 3 ------------------->

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
        //jQuery('#part-3-labels').show();
        //jQuery('#')
        //jQuery('#part-2-labels').css("display","none");

    });

    jQuery('#hideshow4').click(function() {
        jQuery('#part-2').toggle();
        jQuery('#part-3').toggle();
    });

  });
  </script>

</div>
