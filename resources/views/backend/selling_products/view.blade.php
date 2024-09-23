



@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Selling Products </small></h3>
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
                          <h3 class="card-title">Selling Products List Here</h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($view_sellin_products as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{ asset($row->image ?? '') }}" style="height: 70px; width:160px"></td>
                                    <td>{{ $row->title ?? '' }}</td>
                                    
                                    <td>
                                    @if ($row->status==1)
                                        <a href="{{ route('selling_products.status',$row->id) }}" class="btn btn-success" style="width:100px;"> Active </a>
                                    @else
                                        <a href="{{ route('selling_products.status',$row->id) }}" class="btn btn-primary" style="width:100px;" >Deactive</a>
                                    @endif
                                    </td>

                                    <td >
                                    <a href="{{ route('selling_products.edit',$row->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('selling_products.delete',$row->id) }}" id="delete" class="btn btn-danger btn-sm delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
