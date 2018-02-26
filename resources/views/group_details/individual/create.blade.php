@extends('adminlte::page')

@section('title', 'Add Group Details')

@section('content')

@include('group_details/individual/partials/_header')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Group Details</center></h2><br><br>
  </div>
</div>

{!! Form::model(new App\GroupDetails, ['method' => 'POST', 'route' => ['group_details.store']]) !!}
  @include('group_details/individual/partials/_form')
{!! Form::close() !!}

@endsection
