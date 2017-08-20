
<div class="form-group row">
  {!! Form::label('group_id1', 'ID1: Group ID', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-sm-5">
  {!! Form::select('group_id1', $groups, null, array('id' => 'group_id1', 'placeholder' => 'Type a Group ID', 'class' => 'form-control')) !!}

  <!--
  <script type="text/javascript">
        $('#group_id').select2({
          placeholder: 'Groups',
          tags: true,
          tokenSeparators: [',',' '],
          ajax: {
            url: '/groups/create',
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {q: params.term }
            },
            processResults:  function (data) {
              return data;
            }
          }
        });
  </script>
-->

  <script type="text/javascript">
        $('#group_id1').select2({
          placeholder: 'Groups',
          ajax: {
            url: '/groups/create',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                      return {
                          text: item.name,
                          id: item.id
                      }
                  })
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
  {!! Form::label('zone', 'ID4: Zone', array('class' => 'col-md-3 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('zone', array(
      '' => 'Select a Zone...',
      'Mwamba' => 'Mwamba',
      'Mpika' => 'Mpika',
      'Katete' => 'Katete',
      'Buyantanshi' => 'Buyantanshi',
      'Kawaza' => 'Kawaza',
    )) !!}
    <span class="help-block">Select the Zone</span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('village_name', 'ID4: Village Name', array('class' => 'col-md-3 form-control-label')) !!}
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
