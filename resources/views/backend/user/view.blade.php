







@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>All User Informations</small></h3>
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
                          <h3 class="card-title">Roll List Here</h3>
                          <div class="x_title">
                            <a href="{{ route('user.create') }}">
                              <button type="button" class="btn btn-success btn-xs" style="float: right" >Add New Page</button>
                            </a>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>


                                <tr>
                                    <th>No </th>
                                    <th>Name </th>
                                    <th>Email </th>
                                    <th>phone </th>
                                    <th>Address </th>
                                    <th>Parmission </th>
                                    <th>Status </th>
                                    <th>Action</tr>
                            </thead>
                            <tbody>
   
                                @foreach ($user_view as $key=>$row)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ Str::of($row->address)->limit(30) }}</td>
                                        <td>
                                            @if ($row->parmission==1)
                                                <p class="text-success" >Supper Admin</p>
                                            @elseif ($row->parmission==2)
                                                <p class="text-info" >Admin</p>
                                            @else
                                                <p class="text-primary" >Editor</p>
                                            @endif
                                        </td>
                
                                        <td>
                                            @if ($row->status==1)
                                                <p class="text-success" >Active</p>
                                            @else
                                                <p class="text-primary" >Deactive</p>
                                            @endif
                                        </td>
                                      
                                      <td>
                                        <a href="{{ route('user.edit',$row->slug) }}" class="btn btn-info btn-xs editbtn " title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('user.delete',$row->slug) }}" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
