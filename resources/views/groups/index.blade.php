@extends('layouts.app')

@section('content')
    <h2>Groups</h2>

    @if( !$groups->count() )
      You have no groups to view.
    @else
      <ul>
        @foreach( $groups as $group)
          <li><a href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a></li>
        @endforeach
      </ul>
    @endif

@endsection
