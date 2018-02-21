
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

{{--@include('person/partials/_header2') --}}

  <h2><center><strong>Add</strong> Individual Data</center></h2>
  </br></br>
  <div class="box-header with-border">

      {!! Form::model(new App\PersonSurvey, ['method' => 'POST', 'route' => ['person.store']]) !!}
        @include('person/partials/_form2', ['submit_text' => 'Save'])
      {!! Form::close() !!}

@endsection
