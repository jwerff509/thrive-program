
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

@include('person/partials/_header2')

{{--
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          <h2><center><strong>Add</strong> New Person</center></h2>
        </div>
        <div class="card-block">
        </br></br>
        --}}
        {!! Form::model(new App\PersonSurvey, ['method' => 'POST', 'route' => ['person.store']]) !!}
          @include('person/partials/_form', ['submit_text' => 'Save'])
        {!! Form::close() !!}

@endsection
