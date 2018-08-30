
@extends('adminlte::page')

@section('title', 'Program Targets')

@section('content')

  <div class="container-fluid justify-content-center">

  @if ($message = Session::get('success'))
    <div class="alert alert-success"><p>{{ $message }}</p></div>
  @endif

  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View or Edit Program Targets</b></h3>
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
                <a class="btn btn-primary" href="{{ route('program-targets.edit',$country->country_id) }}">Edit</a>
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
