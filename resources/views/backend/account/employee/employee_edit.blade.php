

@extends('backend.layouts.app')
@section('content')



{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Employee Edit</h3>
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
                          <h3 class="card-title"> Update Employee</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    
                                    <form action="{{ route('employee.update',$employee_edit->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">



                                            <div class="row">

                                                
                                                
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Employee Name</label>
                                                        <input type="text" name="e_name" class="form-control" value="{{ $employee_edit->e_name ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Employee ID</label>
                                                        <input type="text" name="e_id_number" class="form-control" value="{{ $employee_edit->e_id_number ?? '' }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Designation</label>
                                                        <input type="text" name="designation" class="form-control" value="{{ $employee_edit->designation ?? '' }}">
                                                    </div>
                                                </div>
                                                
                                            </div>



                    
                                            <div class="row">
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="phone" class="form-control" value="{{ $employee_edit->phone ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Employee Address</label>
                                                    <input type="text" name="address" class="form-control" value="{{ $employee_edit->address ?? '' }}">
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Join Date</label>
                                                        <input type="text" name="join_date" class="form-control" value="{{ $employee_edit->join_date ?? '' }}">
                                                    </div>
                                                </div>
                                          
                                                
                                            </div>




                                            <div class="row">
                                          
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Employee Salary</label>
                                                    <input type="text" name="salary" class="form-control" value="{{ $employee_edit->salary ?? '' }}">
                                                </div>

                                                <div class="colcol-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Publication</label>
                                                        <select name="status" id="" class="form-control">
                                                          
                                                            <option value="1" @if ($employee_edit->status == 1) selected @endif>Active</option>
                                                            <option value="0" @if ($employee_edit->status == 0) selected @endif>Deactive</option>
                                                        </select>
                                                      </div>
                                  
                                                </div>

                                               
                                            </div>


                                        <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Employee Update</button>
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
    

    