








@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4> Update Project Info : <span class="text-success">{{ $project_edit->project_name }} - ({{ $project_edit->project_sl }})</span></h4>
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
                                    <form action="{{ route('project.update',$project_edit->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                              <label>Project Name </label>
                                                <input type="text" name="project_name" class="form-control col-md-12 col-xs-12" value="{{ $project_edit->project_name ?? "" }}">
                                            </div>

                                            <div class="form-group">
                                              <label>Project SL/Number (4) </label>
                                              <input type="text" name="project_sl" class="form-control col-md-12 col-xs-12" value="{{ $project_edit->project_sl ?? "" }}" readonly>
                                            </div>

                                            <div class="form-group">
                                              <label>Phone Number </label>
                                              <input type="text" name="phone" class="form-control col-md-12 col-xs-12" value="{{ $project_edit->phone ?? "" }}"> 
                                            </div>
                                            
                                            <div class="form-group">
                                              <label>Address </label>
                                              <input type="text" name="address" class="form-control  col-md-12 col-xs-12" value="{{ $project_edit->address ?? "" }}">
                                            </div>

                                            <div class="form-group">
                                              <label>Monthly Bill (৳) </label>
                                              <input type="text" name="monthly_bill" class="form-control  col-md-12 col-xs-12" value="{{ $project_edit->monthly_bill ?? "" }} ">
                                            </div>


                                           
                                           
                                            

                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status</label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select name="status" id="" class="form-control  col-md-12 col-xs-12">
                                                    <option value="1" @if ($project_edit->status=="1") selected @endif>Active</option>
                                                    <option value="0" @if ($project_edit->status=="0") selected @endif>Deactive</option>
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
        </div>
    </section>
  </div>

@endsection