


@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Table</h1>
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
                          <h3 class="card-title"> Update Section</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <form action="{{ route('notice.update',$notice->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                                <label for="">Notice Title</label>
                                                <input type="text" class="form-control" name="notice"  value="{{ $notice->notice }}">
                                            </div>

                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status</label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="status" id="" class="form-control col-md-7 col-xs-12">
                                                    
                                                  <option value="1" @if ($notice->status==1) selected @endif>Active</option>
                                                  <option value="0" @if ($notice->status==0) selected @endif>Deactive</option>
                                                </select>
                                              </div>
                                            </div>

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
        </div>
    </section>
  </div>

@endsection