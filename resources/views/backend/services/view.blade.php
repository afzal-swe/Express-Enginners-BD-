



@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Services </small></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><- Go To Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Services List Here</h3>

                          
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Icon</th>
                                    <th>Services Name</th>
                                    <th>Services Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($view_services as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{ asset($row->icon ?? '') }}" style="height: 40px; width:60px"></td>
                                    <td>{{ $row->services_name ?? '' }}</td>
                                    <td>{{ $row->services_title ?? '' }}</td>
                                    <td>{{ Str::of($row->description ?? '')->limit(20) }}</td>
                                    <td>
                                    @if ($row->status==1)
                                        <a href="{{ route('service.status',$row->id) }}" class="btn btn-success" style="width:100px;"> Active </a>
                                    @else
                                        <a href="{{ route('service.status',$row->id) }}" class="btn btn-primary" style="width:100px;" >Deactive</a>
                                    @endif
                                    </td>

                                    <td >
                                    <a href="{{ route('services.edit',$row->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('services.delete',$row->id) }}" id="delete" class="btn btn-danger btn-sm delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                               

                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>





@endsection
