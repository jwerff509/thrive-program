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

                  <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                    @endforeach
                  </div> <!-- end .flash-message -->

                <div class="panel-body">
                    Please choose one of the following:
                    <br><br>
                    <a href="{{ url('program-measures/enter') }}">Enter Quarterly Data</a>
                    <br><br>
                    <a href="{{ url('program-targets/index') }}">Edit LOP Targets</a>
                    <!--
                    {{-- }}
                    <a href="{{ url('program-measures/edit') }}">Edit Quarterly Data</a>
                    <br><br>
                    --}}
                  -->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
