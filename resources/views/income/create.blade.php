@extends('layouts.app')

@section('content')

@include('income/partials/_header');

<div class="panel-body">
  <h2><center><strong>Add</strong> Household Income Sources</center></h2>
  </br></br>

  {!! Form::model(new App\Income, ['method' => 'POST', 'route' => ['income.store']]) !!}
    @include('income/partials/_form', ['submit_text' => 'Save and Add PPI'])
  {!! Form::close() !!}

  </div>
</div>

@endsection
