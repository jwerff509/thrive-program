
@extends('adminlte::page')

@section('title', 'Add Group')

@section('content')

<div class="container">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Add</strong> Group Data</center></h2><br><br>
  </div>
</div>

{!! Form::model(new App\Group, ['route' => ['groups.store']]) !!}
  @include('groups/partials/_form', ['submit_text' => 'Create Group'])
{!! Form::close() !!}

@endsection
