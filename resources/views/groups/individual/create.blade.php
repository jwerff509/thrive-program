
@extends('adminlte::page')

@section('title', 'Add Group')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Group With Individual Data</center></h2><br><br>
  </div>
</div>

{!! Form::model(new App\Group, ['route' => ['groups.store']]) !!}
  @include('groups/individual/partials/_form')
{!! Form::close() !!}

@endsection
