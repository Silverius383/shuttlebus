@extends('layouts.headermg')
@section('content') 
@include('manager.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Daftar Stasiun</h4>
                  <h4 class="card-title pull-right">{{ date('d-m-Y', time()) }}</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($stations) > 0 ) 
                    <table class="col-md-12">
                      <thead class="text-primary">
                      <th>ID</th>
                    <th>Station Name</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $stations as $key => $station )
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                          <a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$station->id}}"data-toggle="tooltip">{{ $station->name }}</a></td>
                        <td>{{ $station->updated_at }}</td>
                        <td>@if($station->status == 1)
                          Available
                        @else
                          Not Available
                        @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#stationView{{$station->id}}" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                          <i class="glyphicon glyphicon-plus"></i>View</a>
                  @include('manager.stations.station-view')
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @endif 
                 </div>
                </div>
                {!! $stations->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('manager.stations.add-station')
@endsection