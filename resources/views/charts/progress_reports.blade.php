@extends('adminlte::page')

@section('title', 'Progress Reports')

@section('content_header')
    <h1>Data Entry Progress Reports</h1>
@stop

@section('content')

<div class="container-fluid">

  <div class="row">
    <div class="col-12">
      <div class="box box-info">
        <div class="box-header with-border">
            <div class="panel-heading">
              <div class="row">
                {!! Form::select('group', array('default' => 'Select a Group') + $groups, array('id' => 'group_id', 'class' => 'form-control')) !!}
              </div>
              <div class="row">
                {!! Form::select('area_program', array('default' => 'Area Program') + $areaPrograms, array('id' => 'area_program_id', 'class' => 'form-control')) !!}
              </div>
              <div class="row">
                <select name="ap" id="ap" class="form-control col-xl-1">
                  <option value="1">A.P. 1</option>
                  <option value="2">A.P. 2</option>
                </select>
              </div>
              <div class="row">
                <a href="/export-to-excel">Export Data to Excel</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Groups Entered</span>
          <span class="info-box-number"><b>{{ count($groups) }}</b></span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title text-middle">Number of Members Entered</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-condensed">
            <tbody>
              <tr>
                <th>Group Name</th>
                <th>Number of Members</th>
              </tr>

            @foreach($memEntered as $member)
              <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->num_members }}</td>
              </tr>
            @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

</div>

<!--
  <div class="row">
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Recently Added Records</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                    <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li>


                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                      <span class="label label-info pull-right">$700</span></a>
                    <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                  </div>
                </li>


                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                    <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                  </div>
                </li>


                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                      <span class="label label-success pull-right">$399</span></a>
                    <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                  </div>
                </li>


              </ul>
            </div>

            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
          </div>
        </div>
      </div>
-->

@stop
