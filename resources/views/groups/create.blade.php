@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2><strong>Add</strong> New Group</h2>
            </div>
            <div class="card-block">
            </br></br>

  {!! Form::model(new App\Group, ['route' => ['groups.store']]) !!}
    @include('groups/partials/_form', ['submit_text' => 'Create Group'])
  {!! Form::close() !!}

@endsection
