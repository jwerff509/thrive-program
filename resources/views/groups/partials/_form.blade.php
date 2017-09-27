
<!--
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
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="form-group row">
  {!! Form::label('group_id1', 'Select a Group', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
  {!! Form::select('group_id1', $groups, array('id' => 'group_id1', 'class' => 'form-control') ) !!}
<script>
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
</script>

  </div>
  <span class="help-block"><br></span>
</div>



<div class="form-group row">
  {!! Form::label('group_id', 'ID1: Group ID', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('group_id','', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Group ID</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('name', 'ID2: Group Name', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('name', '', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Group Name</span>
  </div>
</div>

<div class="form-group row">
  {!! Form::label('area_program', 'ID3: Area Program', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('area_program', array(
      '' => 'Select an Area Program...',
      'Mwamba' => 'Mwamba',
      'Mpika' => 'Mpika',
      'Katete' => 'Katete',
      'Buyantanshi' => 'Buyantanshi',
      'Kawaza' => 'Kawaza',
    )) !!}
    <span class="help-block">Select the Area Program Name</span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('zone', 'ID4: Zone Code', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('zone', '', array('class' => 'form-control')) !!}
  <span class="help-block">Enter the Zone Code</span>

  </div>
</div>
<div class="form-group row">
  {!! Form::label('village_name', 'ID5: Village Name', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
    {!! Form::text('village_name', '', array('class' => 'form-control')) !!}
    <span class="help-block">Enter the Village Name</span>
  </div>
</div>
<div class="card-footer text-center">
    {!! Form::submit($submit_text, ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
  </div>
</div>
