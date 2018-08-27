
@extends('adminlte::page')

@section('title', 'Add Program Measures')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Program Measures</center></h2><br><br>
  </div>
</div>

{!! Form::model(new App\ProgramMeasures, ['route' => ['program_measures.store']]) !!}
  @include('program_measures/partials/_form')
{!! Form::close() !!}

@endsection
