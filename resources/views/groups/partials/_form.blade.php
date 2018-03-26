<div class="container-fluid">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>


<div class="form-group row">

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('name')) ? 'has-error' : ''; ?>">
    {!! Form::label('name', 'ID2 - Group Name:', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('name', '', array('class' => 'typeahead-name form-control', 'placeholder' => 'Group Name', 'autocomplete' => 'off', 'id' => 'name' )) !!}

<!-- Bootstrap typeahed, come back to this if the other shit doesn't work -->
<!--
{{--}}
        <script type="text/javascript">
          var path = "{{ route('groupsFind') }}";

          $('#name').typeahead({
            source:  function (query, process) {
              return $.get(path, { query: query }, function (data) {
                console.log(data);
                //return $.map(data.results);
                return process(data);
              });
            },

            select: function (event, data) {
              console.log('inside select');
              console.log(data.id);

              $('#route_name').val(ui.item.value);


          }});
        </script>
        --}}
-->

<script>

  jQuery(document).ready(function($) {

    // Set the Options for "Bloodhound" suggestion engine
    var engine = new Bloodhound({
      remote: {
        url: 'http://localhost/groupsFind/%QUERY%',
        wildcard: '%QUERY%'
      },
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace

    });

    $("#name").typeahead({

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
        /*
        empty: [
        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
        ],
        */
        header: [
        '<div class="list-group search-results-dropdown">'
        ],
        suggestion: function (data) {
          //return '<a href="' + data.name + '" class="list-group-item">' + data.id + ' - @' + data.name + '</a>'
          return '<div style="font-weight:bold; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
        }
      }

    }).on('typeahead:selected typeahead:autocompleted', function(e, datum) {

      //console.log(datum.id);
      //console.log(datum.name);
      $('#id').val(datum.id);

    });

  });

</script>


        <span class="help-block">
          @if ($errors->has('name'))
            {{ $errors->first('name') }}
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
        {!! Form::text('zone', '', array('class' => 'typeahead form-control', 'placeholder' => 'Zone Name')) !!}
        <!--
        {{-- }}
        <script type="text/javascript">
          var path = "{{ route('zonesFind') }}";
          $('#zone .typeahead').typeahead({
            name: 'zone',
            source:  function (query, process) {
              return $.get(path, { query: query }, function (data) {
                return process(data);
              });
            }
          });
        </script>
        --}}
      -->
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
        {!! Form::text('village_name', '', array('class' => 'typeahead form-control', 'placeholder' => 'Village Name', 'id' => 'village')) !!}
        <!--
        {{--}}
        <script type="text/javascript">
          var path = "{{ route('villagesFind') }}";
          $('#village_name .typeahead').typeahead({
            source:  function (query, process) {
              return $.get(path, { query: query }, function (data) {
                return process(data);
              });
            }
          });
        </script>
        --}}
      -->
        <span class="help-block">
          @if ($errors->has('village_name'))
            {{ $errors->first('village_name') }}
          @endif
        </span>
      </div>
    </div>
  </div>

  <br><br>

  <!--
  Put a hidden variable in the form to pass to the controller as to which screen they should go to next
  Because if you change the value (text) of the submit button the program will always default to going
  to the individual survey, and never the group survey.
-->

  <div class="card-footer text-center">
    {!! Form::hidden('id', '', array('id' => 'id')) !!}
    {!! Form::submit('Add Members List', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
