
@extends('adminlte::page')

@section('title', 'Add Program Targets')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Program Targets</center></h2><br><br>
  </div>
</div>

{!! Form::model(new App\ProgramTargets, ['route' => ['program_targets.store']]) !!}
  @include('program_targets/partials/_form')
{!! Form::close() !!}

@endsection
