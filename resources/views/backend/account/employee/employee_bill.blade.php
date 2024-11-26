

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
            <h3>Employee Bill</h3>
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
                          <h3 class="card-title"> Create Employee Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    
                                    <form action="{{ route('employee_bill.store') }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">



                                            <div class="row">

                                                
                                                
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date<span class="text-danger">*</span></label>
                                                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="DD/MM/YYYY" value="{{ old('date') }}" > 
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Employee ID <span class="text-danger">*</span></label>
                                                        <input type="text" name="e_id" class="form-control @error('e_id') is-invalid @enderror" placeholder="Employee ID" value="{{ old('e_id') }}">
                                                        @error('e_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Reason <span class="text-danger">*</span></label>
                                                        <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" placeholder="Reason" value="{{ old('reason') }}">
                                                        @error('reason')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>



                    
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Company<span class="text-danger">*</span></label>
                                                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" placeholder="Company">
                                                        @error('company')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                          
                                              
                                            

                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="">Deposit <span class="text-danger">*</span></label>
                                                <input type="text" name="deposit" class="form-control @error('deposit') is-invalid @enderror" value="{{ old('deposit') }}" placeholder="Deposit">
                                                @error('deposit')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Create Employee Bill</button>
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
    

    