









@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3> New User Added Form Section</h3>
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
                          <h3 class="card-title"> Add Section</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                  <form class="form-horizontal form-label-left" action="{{ route('user.store') }}" method="post" >

                                    @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                              <label>Name <samp class="text-danger">*</samp></label>
                                              <input type="text" class="form-control col-md-12 col-xs-12" name="name" placeholder="User Name" value="{{ old('name') }}">
                                              @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                              @enderror
                                            </div>

                                            <div class="form-group">
                                              <label>Number </label>
                                                <input type="number" name="phone" required="required" class="form-control col-md-12 col-xs-12" placeholder="01XXXXXXXXX" value="{{ old('phone')}}">
                                            </div>


                                            <div class="form-group">
                                              <label>Email </label>
                                                <input type="email" name="email" class="form-control col-md-12 col-xs-12" placeholder="example@gmail.com" value="{{ old('email')}}">
                                                @error('email')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                              <label>Password </label>
                                              
                                                <input id="password" type="password" name="password" class="form-control col-md-12 col-xs-12" required="required">
                                              
                                            </div>

                                            <div class="form-group">
                                              <label>Address </label>
                                                <textarea id="summernot" required="required" name="address" class="form-control col-md-12 col-xs-12"  value="{{ old('address') }}">
                      
                                                 </textarea>  
                                            </div>


                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Parmission <samp class="text-danger">*</samp></label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select name="status" id="" class="form-control col-md-12 col-xs-12">
                                                    <option selected disabled>Select Parmission</option>
                                                    <option value="1">Supper Admin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Editor</option>
                                                </select>
                                                
                                            </div>

                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status <samp class="text-danger">*</samp></label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select name="status" id="" class="form-control col-md-12 col-xs-12">
                                                    <option selected disabled>Select Option</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                                
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

