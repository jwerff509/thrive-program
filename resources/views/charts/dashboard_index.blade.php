{{-- @extends('layouts.app') --}}


@extends('adminlte::page')

@section('title', 'Dashboard Index')

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
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Please choose one of the following:
                    <br><br>
                    <table class="table table-hover table-striped">
                      <tr>
                        <td>THRIVE Program</td>
                        <td><a class="btn btn-info" href="{{ url('elo-dashboard') }}">View ELO Dashboard</a></td>
                      </tr>

                        @foreach ($countries as $country)
                          <tr>
                            <td>{{ $country->name }}</td>
                            <td>
                              <a class="btn btn-info" href="{{ route('country-dashboard',$country->country_id) }}">View Dashboard</a>
                            </td>
                          </tr>
                        @endforeach

                        </table>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection
