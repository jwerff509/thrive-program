@extends('adminlte::page')

@section('title', 'Add Group Details')

@section('content')

{{-- @include('group_details/partials/_header')  --}}

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Survey Details</center></h2><br><br>
  </div>
</div>

<!-- Old Form::model opening -->
{{--}}
{!! Form::model(new App\GroupDetails, ['method' => 'POST', 'route' => ['group_details.store']]) !!}
--}}

<!-- New Form opening -->
{!! Form::open(['method' => 'POST', 'route' => 'group_details.store']) !!}
  @include('group_details/partials/_form')
{!! Form::close() !!}

@endsection
