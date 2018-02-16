<div class="container-fluid">

<div class="form-group row">
  <!-- {!! Form::label('active', 'Active ?', array('class' => 'col-sm-1 form-control-label')) !!} -->
  {!! Form::label('member_id', 'NRC #', array('class' => 'col-md-2 form-control-label')) !!}
  {!! Form::label('family_name', 'HHID2', array('class' => 'col-md-3 form-control-label')) !!}
  {!! Form::label('other_name', 'HHID3', array('class' => 'col-md-3 form-control-label')) !!}
  {!! Form::label('sex', 'HHID4: Sex', array('class' => 'col-sm-2 form-control-label')) !!}
  {!! Form::label('phone_num', 'HHID5: Phone #', array('class' => 'col-md-1 form-control-label')) !!}
</div>


@if(count($members) > 0)

  @foreach($members as $member)

    <div class="form-inline">

<!--
      <div class="col-1">
        {!! Form::checkbox('active', '1', array('class' => 'form-control')) !!}
      </div>
    -->

      <div class="col-md-2">
        {!! Form::text('member_id', $member->nrc_number, array('class' => 'col-md-2 form-control')) !!}
      </div>

      <div class="col-md-3">
        {!! Form::text('family_name', $member->last_name, array('class' => 'form-control')) !!}
      </div>

      <div class="col-md-3">
        {!! Form::text('other_name', $member->first_name, array('class' => 'form-control')) !!}
      </div>

      <div class="col-sm-1">
        {!! Form::text('sex', $member->sex, array('class' => 'form-control')) !!}
      </div>

      <div class="col-md-2">
        {!! Form::text('phone_number', $member->cellphone_number, array('class' => 'form-control')) !!}
      </div>

    </div>

  @endforeach

@else

  @for($i=1; $i<=10; $i++)

    <div class="form-inline">
<!--
      <div class="col-sm-1">
        {!! Form::checkbox('active[]', '0', array('class' => 'form-control')) !!}
      </div>
-->
      <div class="col-md-2">
        {!! Form::text('member_id[]', '', array('class' => 'form-control')) !!}
      </div>

      <div class="col-md-3">
          {!! Form::text('family_name[]', '', array('class' => 'form-control')) !!}
      </div>

      <div class="col-md-3">
          {!! Form::text('other_name[]', '', array('class' => 'form-control')) !!}
      </div>

      <div class="col-md-2">
          {!! Form::text('sex[]', '', array('class' => 'form-control')) !!}
      </div>

      <div class="col-md-1">
          {!! Form::text('phone_number[]', '', array('class' => 'form-control')) !!}
      </div>

    </div>

  @endfor

@endif

<div class="form-group row"><br><br><br></div>

</div>


<div class="card-footer text-center">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::hidden('group_details_id', $groupDetails->id) !!}
  {!! Form::submit('Save and Add Another', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
