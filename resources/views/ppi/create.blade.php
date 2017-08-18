@extends('layouts.app')

@section('content')

@include('ppi/partials/_header');

<div class="panel-body">
  <h2><center><strong>Add</strong> Household Income Sources</center></h2>
  </br></br>

  {!! Form::model(new App\Ppi, ['method' => 'POST', 'route' => ['ppi.store']]) !!}
    @include('ppi/partials/_form', ['submit_text' => 'Save and Add Another'])
  {!! Form::close() !!}

  </div>
</div>

@endsection
