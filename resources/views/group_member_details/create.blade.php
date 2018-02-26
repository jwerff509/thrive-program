@extends('adminlte::page')

@section('title', 'Add Group Members')

@section('content')

@include('group_member_details/partials/_header')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Group Members</center></h2><br><br>
  </div>
</div>

{!! Form::model(new App\GroupMemberMetrics, ['method' => 'POST', 'route' => ['group_member_metrics.store'], 'style' => 'display:inline-block']) !!}
  @include('group_member_details/partials/_form', ['submit_text' => 'Add Group Members'])
{!! Form::close() !!}

@endsection
