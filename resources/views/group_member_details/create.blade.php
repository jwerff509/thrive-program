@extends('layouts.app')

@section('content')

@include('group_member_details/partials/_header');

<div class="panel-body">
  <h2><center><strong>Add</strong> Group Member Details</center></h2>
  </br></br>

  {!! Form::model(new App\GroupMemberMetrics, ['method' => 'POST', 'route' => ['group_member_metrics.store']]) !!}
    @include('group_member_details/partials/_form', ['submit_text' => 'Add Group Members'])
  {!! Form::close() !!}

@endsection
