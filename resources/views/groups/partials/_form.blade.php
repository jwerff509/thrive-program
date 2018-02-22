

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

<!--
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="form-group row">
  {!! Form::label('group_id1', 'Select a Group', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
  {!! Form::select('group_id1', $groups, array('id' => 'group_id1', 'class' => 'form-control') ) !!}
  <span class="help-block"><br>OR Enter a Group ID </span>
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

  </div>

</div>

--}}

{{--

<div class="form-group row">
  <div class="form-group <?php echo ($errors->has('group_id')) ? 'has-error' : ''; ?>">
  {!! Form::label('group_id', 'ID1: Group ID', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('group_id','', array('class' => 'form-control')) !!}
    <span class="help-block">
      @if ($errors->has('group_id'))
        {{ $errors->first('group_id') }}
      @else
        Enter the Group ID
      @endif
    </span>
  </div>
</div>
</div>

--}}
-->


<div class="container-fluid">

  <div class="form-group row">
    <div class="form-group <?php echo ($errors->has('name')) ? 'has-error' : ''; ?>">
    {!! Form::label('name', 'ID2: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
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
    {!! Form::label('area_program', 'ID3: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::select('area_program', array(
          '' => 'Select an Area Program...',
          'Mwamba' => 'Mwamba',
          'Mpika' => 'Mpika',
          'Katete' => 'Katete',
          'Buyantanshi' => 'Buyantanshi',
          'Kawaza' => 'Kawaza',
        'class' => 'form-control')) !!}
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
    {!! Form::label('zone', 'ID4: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
      <div class="col-md-2">
        {!! Form::text('zone', '', array('class' => 'form-control', 'placeholder' => 'Zone Code')) !!}
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
    {!! Form::label('village_name', 'ID5: ', array('class' => 'col-md-5 form-control-label text-right')) !!}
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

  <div class="card-footer text-center">
    {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>

</div>
