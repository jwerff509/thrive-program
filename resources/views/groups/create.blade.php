
@extends('adminlte::page')

@section('title', 'Add Group')

{{--
@section('content_header')
    <h1>Dashboard (all data is as of the last 3 months)</h1>
@stop
--}}

{{--
@extends('layouts.app')
--}}
@section('content')



  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
<!--
<div class="row">
    <div class="col-md-6">
    -->
        <div class="card">
            <div class="card-header">
                <h2><center><strong>Add</strong> New Group</center></h2>
            </div>
            <div class="card-block">
            </br></br>

  {!! Form::model(new App\Group, ['route' => ['groups.store']]) !!}
    @include('groups/partials/_form', ['submit_text' => 'Create Group'])
  {!! Form::close() !!}

@endsection
