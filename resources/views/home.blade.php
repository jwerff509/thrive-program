{{-- @extends('layouts.app') --}}


@extends('adminlte::page')

@section('title', 'Home')

{{--
@section('content_header')
    <h1>Dashboard (all data is as of the last 3 months)</h1>
@stop
--}}


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome {{ Auth::user()->name }} </div>

                <div class="panel-body">
                    Please choose one of the following:
                    <br><br>
                    <a href="{{ url('groups/create') }}">Enter Group Survey</a>
                    <br><br>
                    <a href="{{ url('person/create') }}">Enter Individual Survey</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
