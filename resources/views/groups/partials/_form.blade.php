<div class="form-group">
  {!! Form::label('group_id', 'Group ID:') !!}
  {!! Form::text('group_id') !!}
</div>
<div class="form-group">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name') !!}
</div>
<div class="form-group">
  {!! Form::label('area_program', 'Area Program:') !!}
  {!! Form::text('area_program') !!}
</div>
<div class="form-group">
  {!! Form::label('village_name', 'Village Name:') !!}
  {!! Form::text('village_name') !!}
</div>
<div class="form-group">
  {!! Form::submit($submit_text, ['class' => 'btn primary']) !!}
</div>
