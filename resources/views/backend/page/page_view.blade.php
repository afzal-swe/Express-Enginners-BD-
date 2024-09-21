
@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Pages </small></h3>
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
                          <h3 class="card-title">Message List Here</h3>
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
                                    <th>Page Banner</th>
                                    <th>Page Name</th>
                                    <th>Page Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
   
                              @foreach ($pages as $key=>$row)
                                    <tr>
                                      <td>{{++$key}}</td>
                                      <td><img src="{{ asset($row->banner) }}" style="height: 70px; width:160px"></td>
                                      <td>{{ $row->page_name ?? '' }}</td>
                                      <td>{{ $row->page_title ?? ""}}</td>
                                      <td> 
                                        @if ($row->status==1)
                                          <p class="text-success" >Active</p>
                                        @else
                                          <p class="text-primary" >Deactive</p>
                                        @endif
                                      </td>
                                      
                                      <td>
                                        <a href="{{ route('page.edit',$row->slug) }}" class="btn btn-info btn-xs editbtn " title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('page.delete',$row->slug) }}" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
          <h4 class="modal-title">Create New Page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('page.create') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Page Name <span class="text-danger">*</span></label>
                        <input type="text" name="page_name" class="form-control @error('page_name') is-invalid @enderror " placeholder="Page Name" value="{{old('page_name')}}" required>
                        @error('page_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Page Title <span class="text-danger">*</span></label>
                        <input type="text" name="page_title" class="form-control @error('page_title') is-invalid @enderror " placeholder="Page Title" value="{{old('page_title')}}" required>
                        @error('page_title')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="textarea">Description </label>
                          <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12"  value="{{ old('description') }}">
                            
                          </textarea>
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

                    <div class="form-group">
                        <label for="textarea">Banner </label>
                          <input type="file"  name="banner" class="form-control col-md-7 col-xs-12" required >
                    </div><br><hr>
                       
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

