
@extends('adminlte::page')

@section('title', 'Edit Program Targets')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Edit</strong> Program Targets for <b>{{ $country->name }}</b></center></h2><br><br>
  </div>
</div>

{!! Form::model($targets, ['method' => 'POST', 'route' => ['program-targets.update', $targets['id']]]) !!}
  @include('program_targets/partials/_editForm', ['submitButtonText' => 'Save Changes'])
{!! Form::close() !!}

@endsection
