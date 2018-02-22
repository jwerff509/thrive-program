
@extends('adminlte::page')

@section('title', 'Add New Person')

{{--
@section('content_header')
    <h1>Dashboard (all data is as of the last 3 months)</h1>
@stop
--}}

{{--
@extends('layouts.app')
--}}
@section('content')

@include('person/partials/_header')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Individual Data</center></h2><br><br>
  </div>
</div>

  {!! Form::model(new App\PersonSurvey, ['class' => 'justify-content-center', 'method' => 'POST', 'route' => ['person.store']]) !!}
    @include('person/partials/_form', ['submit_text' => 'Save'])
  {!! Form::close() !!}

@endsection
