
@extends('adminlte::page')

@section('title', 'Add Group Members')

{{--
@section('content_header')
    <h1>Dashboard (all data is as of the last 3 months)</h1>
@stop
--}}

{{--
@extends('layouts.app')
--}}
@section('content')

@include('group_member_details/partials/_header')

<div class="panel-body">
  <h2><center><strong>Add</strong> Group Member Details</center></h2>
  </br></br>

  {!! Form::model(new App\GroupMemberMetrics, ['method' => 'POST', 'route' => ['group_member_metrics.store']]) !!}
    @include('group_member_details/partials/_form', ['submit_text' => 'Add Group Members'])
  {!! Form::close() !!}

@endsection
