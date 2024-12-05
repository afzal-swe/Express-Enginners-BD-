












@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3> Work Bill</h3>
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
                          <h3 class="card-title"> Submit Work Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <form action="{{ route('submit_work_bill.update') }}" method="post">
                                    {{-- <form action="#" method="post"> --}}
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="row">

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Billing Date <span class="text-danger">*</span></label>
                                                    <input type="date" name="billing_date" class="form-control" placeholder="Billing Date" required>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Billing Ref : <span class="text-danger">*</span></label>
                                                    <input type="text" name="ref" class="form-control @error('ref') is-invalid @enderror" value="EEBD/WB/">
                                                    @error('ref')
                                                        <samp class="text-danger">{{ $message }}</samp>
                                                    @enderror
                                                </div>
   
                                            </div>

                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label>Total Price <span class="text-danger">*</span></label>
                                                    <input type="text" name="total_price" class="form-control" placeholder="Total Price" required>
                                                </div>

                                            
                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="">In Word <span class="text-danger">*</span></label>
                                                <input type="text" name="in_word" class="form-control" placeholder="Only" required>
                                            </div>
                                          
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
    
