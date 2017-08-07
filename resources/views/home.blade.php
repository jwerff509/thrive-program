@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome {{ Auth::user()->name }} </div>

                <div class="panel-body">
                    Please choose one of the following:
                    <br>
                    <a href="{{ url('groups/create') }}">Enter Group Information</a>
                    <br>
                    <a href="{{ url('household/create') }}">Enter Household PPI Information</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
