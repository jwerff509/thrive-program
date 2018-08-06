@extends('adminlte::page')

@section('title', 'Manage Users')

{{--
@section('content_header')
    <h1>Dashboard (all data is as of the last 3 months)</h1>
@stop
--}}

{{--
@extends('layouts.app')
--}}
@section('content')


<div class="container-fluid">
  <div class="row col-md-8 col-md-offset-2">
    <h2><center><strong>Manage</strong> System Users</center></h2><br><br>
  </div>
</div>




<div class="card card-block">
            <h2 class="card-title"><b>Manage</b> Users</h2>
            <p class="card-text">Here you can add, edit, and delete users from the system.</p>
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New User</button>
        </div>

        <div>
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email (User ID)</th>
                    <th>Is Admin ?</th>
                    <th>Edit or Delete</th>
                </tr>
                </thead>
                <tbody id="user-list" name="user-list">
                @foreach ($users as $user)
                    <tr id="user{{$user['id']}}">
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['isAdmin']}}</td>
                        <td>
                            <button class="btn btn-info open-modal" value="{{$user['id']}}">Edit
                            </button>
                            <button class="btn btn-danger delete-link" value="{{$user['id']}}">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="userEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="userEditorModalLabel">User Editor</h4>
                        </div>


                        <div class="register-box-body">
                            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
                            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                                {!! csrf_field() !!}

                                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-flat"
                                >{{ trans('adminlte::adminlte.register') }}</button>
                            </form>
                            <div class="auth-links">
                                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
