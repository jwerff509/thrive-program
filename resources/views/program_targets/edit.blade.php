
@extends('adminlte::page')

@section('title', 'Edit Program Targets')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Edit</strong> Program Targets</center></h2><br><br>
  </div>
</div>

{!! Form::model($programTargets, ['method' => 'POST', 'route' => ['program_targets.update', $programTargets->id]]) !!}
  @include('program_targets/partials/_form', ['submitButtonText' => 'Edit Targets'])
{!! Form::close() !!}

@endsection
