



@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>Company All Team Member's </small></h3>
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
                          <h3 class="card-title">Member's List Here</h3>

                          <div class="x_title">
                            <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Member</button>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instragram</th>
                                    <th>Linkdin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                  @foreach ($our_team as $key=>$row)
                                    <tr>
                                      <td>{{++$key}}</td>
                                      <td><img src="{{ asset($row->image) }}" style="height: 30px; width:40px"></td>
                                      <td>{{ $row->name ?? ''}}</td>
                                      <td>{{ $row->designation ?? '' }}</td>
                                      <td>{{ Str::of($row->facebook ?? '')->limit(15) }}</td>
                                      <td>{{ Str::of($row->twitter ?? '')->limit(15) }}</td>
                                      <td>{{ Str::of($row->instagram ?? '')->limit(15) }}</td>
                                      <td>{{ Str::of($row->linkedin ?? '')->limit(15) }}</td>
                                      
                                      <td>
                                        @if ($row->status==1)
                                          <a href="#" class="btn btn-success" style="width:100px;"> Active </a>
                                        @else
                                          <a href="#" class="btn btn-primary" style="width:100px;" >Deactive</a>
                                        @endif
                                      </td>

                                      <td >
                                            <a href="#" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="#" id="delete" class="btn btn-danger btn-sm delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
          <h4 class="modal-title">Add New Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('add.member') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="">Member Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="">Member Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="Designation" value="{{old('designation')}}">
                    @error('designation')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="">Member Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Description" value="{{old('description')}}">
                    @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">


                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Facebook Link</label>
                      <input type="text" name="facebook" class="form-control" placeholder="Facebook Link" value="{{old('facebook')}}">
                      @error('facebook')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Twitter Link</label>
                      <input type="text" name="twitter" class="form-control" placeholder="Twitter Link" value="{{old('twitter')}}">
                      @error('twitter')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Instagram Link</label>
                      <input type="text" name="instagram" class="form-control" placeholder="Instagram Link" value="{{old('instagram')}}">
                      @error('instagram')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Linkedin Link</label>
                      <input type="text" name="linkedin" class="form-control" placeholder="Lnkedin Link" value="{{old('linkedin')}}">
                      @error('linkedin')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>


                </div>

                    <div class="form-group">
                        <label for="">Banner Image</label>
                        <input type="file" name="image" class="form-control" required>
                        
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Publication</label>
                      <select name="status" id="" class="form-control">
                        <option value="" selected disabled>== Choose Options ==</option>
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                      </select>
                    </div>

                   <hr>
                       
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
