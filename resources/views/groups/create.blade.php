@extends('layouts.app')

@section('content')
  <h2>Add New Group</h2>

  {!! Form::model(new App\Group, ['route' => ['groups.store']]) !!}
    @include('groups/partials/_form', ['submit_text' => 'Create Group'])
  {!! Form::close() !!}

@endsection  
