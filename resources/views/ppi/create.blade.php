
@extends('adminlte::page')

@section('title', 'Add PPI Scores')

{{--
@section('content_header')
    <h1>Dashboard (all data is as of the last 3 months)</h1>
@stop
--}}

{{--
@extends('layouts.app')
--}}
@section('content')

@include('ppi/partials/_header')

<div class="panel-body">
  <h2><center><strong>Add</strong> PPI Information</center></h2>
  </br></br>

  {!! Form::model(new App\Ppi, ['method' => 'POST', 'route' => ['ppi.store']]) !!}
    @include('ppi/partials/_form', ['submit_text' => 'Save and Add Another'])
  {!! Form::close() !!}

  </div>
</div>

@endsection
