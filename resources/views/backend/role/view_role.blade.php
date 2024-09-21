


@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Role </small></h3>
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
                          <h3 class="card-title">Users List Here</h3>
                          <div class="x_title">
                            <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Page</button>
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
                                    <th>SL</th>
                                    <th>Role Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
   
                              @foreach ($view_role as $key=>$row)
                                    <tr>
                                      <td>{{++$key}}</td>
                                      <td>{{ $row->role_name ?? ''}}</td>
                                      <td>{{ $row->slug ?? ''}}</td>
                                      <td> 
                                        @if ($row->status==1)
                                            <p class="text-success" >Active</p>
                                        @else
                                            <p class="text-primary" >Deactive</p>
                                        @endif
                                      </td>
                                      
                                      <td>
                                        <a href="{{ route('role.edit',$row->slug) }}" class="btn btn-info btn-xs editbtn " title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('role.delete',$row->slug) }}" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fas fa-trash-alt"></i></a>
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



  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Insert New Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('role.create') }}" method="post">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Role Name <span class="text-danger">*</span></label>
                        <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror " placeholder="Role Name" value="{{old('role_name')}}" required>
                        @error('role_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                      <label for="exampleInputFile">Publication<span class="text-danger">*</span></label>
                      <select name="status" id="" class="form-control  @error('status') is-invalid @enderror " required>
                        <option value="" selected disabled>== Choose Options ==</option>
                          
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                          
                      </select>
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                       
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



@endsection

  