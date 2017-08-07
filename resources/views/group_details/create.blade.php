@extends('layouts.app')

@section('content')

@include('group_details/partials/_header');

  <div class="row">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h2><strong>Add</strong> Group Details</h2>
              </div>
              <div class="card-block">
              </br></br>

  {!! Form::model(new App\GroupDetails, ['method' => 'POST', 'route' => ['group_details.store']]) !!}
    @include('group_details/partials/_form', ['submit_text' => 'Add Group Details'])
  {!! Form::close() !!}

@endsection
