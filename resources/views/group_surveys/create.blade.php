@extends('adminlte::page')

@section('title', 'Add Group Survey')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Group Survey</center></h2><br><br>
  </div>
</div>


<!-- I think you could open a Form::model here on the group_surveys model!!  -->


<!-- Old Form::model opening -->
{{--}}
{!! Form::model(new App\GroupDetails, ['method' => 'POST', 'route' => ['group_details.store']]) !!}
--}}

<!-- New Form opening -->
{!! Form::open(['method' => 'POST', 'route' => 'group_surveys.store']) !!}
  @include('group_surveys/partials/_form')
{!! Form::close() !!}

@endsection
