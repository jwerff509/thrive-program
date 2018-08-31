
@extends('adminlte::page')

@section('title', 'Country Dashboards')

@section('content')

  <div class="container-fluid justify-content-center">

  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
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
