

<!--
{{--
<div class="form-group row">
  {!! Form::label('country', 'Select Your Country', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
  {!! Form::select('country', array(
    '' => '-- Select Your Country --',
    'Honduras' => 'Honduras',
    'Malawi' => 'Malawi',
    'Rwanda' => 'Rwanda',
    'Tanzania' => 'Tanzania',
    'Zambia' => 'Zambia'
  )) !!}
  --}}
-->
<div class="container-fluid">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!--
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<div class="form-group row">

  {!! Form::label('group_id1', 'Select a Group', array('class' => 'col-md-5 form-control-label text-right')) !!}
  <div class="col-md-2">
  {!! Form::input('typeahead', array('class' => 'col-md-2 form-control')) !!}

  <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";

    $('input.typeahead').typeahead({

      source:  function (query, process) {

      return $.get(path, { query: query }, function (data) {

              return process(data);

          });

      }

  });

</script>
<!--
{{--
  {!! Form::select('group_id1[]', $groups, array('class' => 'form-control', 'id' => 'group_id1') ) !!}

  <script>
    $(document).ready(function() {

      $('#group_id1').select2({
          placeholder: "Choose groups...",
          minimumInputLength: 2,
          ajax: {
              url: '/groups/find',
              dataType: 'json',
              data: function (params) {
                  return {
                      q: $.trim(params.term)
                  };
              },
              processResults: function (data) {
                  return {
                      results: data
                  };
              },
              cache: true
          }
      });
    });
  </script>
--}}
-->

  </div>

</div>




    <!--
{{--
  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('group_id')) ? 'has-error' : ''; ?>">
      {!! Form::label('group_id', 'ID1: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('group_id','', array('class' => 'form-control', 'placeholder' => 'Group ID # (if known)')) !!}
        <span class="help-block">
          @if ($errors->has('group_id'))
            {{ $errors->first('group_id') }}
          @endif
        </span>
      </div>
    </div>
  </div>

--}}
-->

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('name')) ? 'has-error' : ''; ?>">
    {!! Form::label('name', 'ID2 - Group Name:', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Group Name')) !!}
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
        {!! Form::select('area_program', array(
          '' => 'Select an Area Program...',
          'Mwamba' => 'Mwamba',
          'Mpika' => 'Mpika',
          'Katete' => 'Katete',
          'Buyantanshi' => 'Buyantanshi',
          'Kawaza' => 'Kawaza')) !!}
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
        {!! Form::text('zone', '', array('class' => 'form-control', 'placeholder' => 'Zone Name')) !!}
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
        {!! Form::text('village_name', '', array('class' => 'form-control', 'placeholder' => 'Village Name')) !!}
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
    {!! Form::submit('Add Members List', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
