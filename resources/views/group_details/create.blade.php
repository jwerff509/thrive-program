@extends('layouts.app')

@section('content')

@include('group_details/partials/_header');

<div class="panel-body">
  <h2><center><strong>Add</strong> Group Details</center></h2>
  </br></br>

  {!! Form::model(new App\GroupDetails, ['method' => 'POST', 'route' => ['group_details.store']]) !!}
    @include('group_details/partials/_form', ['submit_text' => 'Add Group Details'])
  {!! Form::close() !!}

  </div>
</div>

@endsection
