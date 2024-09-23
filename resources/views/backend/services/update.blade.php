












@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Update Services</h3>
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
                          <h3 class="card-title"> Update Services</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <form action="{{ route('services.update',$edit_services->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                      
                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Services Name </label>
                                                    <input type="text" name="services_name" class="form-control" value="{{ $edit_services->services_name ?? '' }}"> 
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Services Title</label>
                                                    <input type="text" name="services_title" class="form-control" value="{{ $edit_services->services_title ?? '' }}">
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 col-lg-12 col-md-12">
                                                <label for="">Description</label>
                                                <textarea type="text" id="summernote" name="description" class="form-control"> 
                                                    {!! $edit_services->description ?? '' !!}
                                                </textarea>
                                            </div>


                                           

                                       
                                            <div class="row">

                                          
                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="exampleInputFile">Icon</label>
                                                    <input type="file" name="icon" class="form-control">
                                                </div>
                                               

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="exampleInputFile">Status</label>
                                                    <select name="status" class="form-control">
                                                      <option value="1" @if ($edit_services->status==1) selected @endif>Active</option>
                                                      <option value="0" @if ($edit_services->status==0) selected @endif>Deactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                              <img src="{{ asset($edit_services->icon) }}" class="form-control col-sm-12 col-md-6 col-xs-6" style="height: 150px;">
                                              
                                            </div>


                                       <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>

@endsection
    
