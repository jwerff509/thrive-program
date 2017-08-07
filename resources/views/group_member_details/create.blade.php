@extends('layouts.app')

@section('content')

@include('group_member_details/partials/_header');

  <div class="row">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h2><strong>Add</strong> Group Member Details</h2>
              </div>
              <div class="card-block">
              </br></br>

  {!! Form::model(new App\GroupMemberMetrics, ['method' => 'POST', 'route' => ['group_member_metrics.store']]) !!}
    @include('group_member_details/partials/_form', ['submit_text' => 'Add Group Members'])
  {!! Form::close() !!}

@endsection
