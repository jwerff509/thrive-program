@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          <h2><center><strong>Add</strong> New Household</center></h2>
        </div>
        <div class="card-block">
        </br></br>
        {!! Form::model(new App\Person, ['route' => ['person.store']]) !!}
          @include('person/partials/_form', ['submit_text' => 'Save and Add Income'])
        {!! Form::close() !!}

@endsection
