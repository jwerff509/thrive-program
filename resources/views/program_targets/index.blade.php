
@extends('adminlte::page')

@section('title', 'Program Targets')

@section('content')

  @if ($message = Session::get('success'))
    <div class="alert alert-success"><p>{{ $message }}</p></div>
  @endif

  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View or Edit Program Targets</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-hover table-striped">
            <tr>
              <th>Country</th>
              <th width="280px">Action</th>
            </tr>

          @foreach ($countries as $country)
            <tr>
              <td>{{ $country->name }}</td>
              <td>
                <a class="btn btn-info" href="{{ route('program-targets.show',$country->country_id) }}">View</a>
                <a class="btn btn-primary" href="{{ route('program-targets.update',$country->country_id) }}">Edit</a>
              </td>
            </tr>
          @endforeach

          </table>
        </div>

      </div>
    </div>
  </div>

@endsection
