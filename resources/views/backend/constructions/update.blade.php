






@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Update Section</h3>
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
                    
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                  <form class="form-horizontal form-label-left" action="{{ route('constructions.update',$edit->id) }}" method="post" enctype="multipart/form-data">

                                    @csrf
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                             
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control col-sm-12 col-md-12 col-xs-12" value="{{ $edit->title ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                             
                                              <label for="">Description</label>
                                              <textarea name="description" id="summernote" class="form-control col-sm-12 col-md-12 col-xs-12">
                                                {!! $edit->description ?? '' !!}
                                              </textarea>
                                            </div>

                                            <div class="form-group">
                                              <label>Image </label>
                                                <input type="file" class="form-control col-sm-12 col-md-12 col-xs-12" name="image">

                                            </div>

                                            <div class="form-group">
                                              <img src="{{ asset($edit->image) }}" class="form-control col-sm-12 col-md-7 col-xs-12" style="height: 150px;">
                                              
                                            </div>

                                            

                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select name="status" id="" class="form-control col-md-12 col-xs-12">
                                                    
                                                  <option value="1" @if ($edit->status==1) selected @endif>Active</option>
                                                  <option value="0" @if ($edit->status==0) selected @endif>Deactive</option>
                                                </select>
                                              </div>
                                            </div>


                                       <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
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
    </section>
  </div>

@endsection














              
               

                

                
        
                
           