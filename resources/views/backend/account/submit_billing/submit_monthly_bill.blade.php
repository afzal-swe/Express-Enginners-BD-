

@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Monthly Bill</h3>
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
                          <h3 class="card-title"> Submit Monthly Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    
                                    <form action="{{ route('submit_monthly_billing') }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">



                                            <div class="row">

                                                
                                                
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date<span class="text-danger">*</span></label>
                                                        <input type="date" name="date" id="date" class="form-control" placeholder="DD/MM/YYYY" value="{{ old('date') }}" required> 
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Billing ID : <span class="text-danger">*</span></label>
                                                    <input type="text" name="billing_id" class="form-control" value="EEBD/MB/" placeholder="Billing ID" required>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Amount <span class="text-danger">*</span></label>
                                                        <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Month Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="month_name" class="form-control" placeholder="Month Name" value="{{ old('month_name') }}" required>
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">No Of Month <span class="text-danger">*</span></label>
                                                        <input type="text" name="no_month" class="form-control" placeholder="No Of Month" value="{{ old('no_month') }}" required>
                                                    </div>
                                                </div> --}}
                                                
                                            </div>



                    
                                            {{-- <div class="row">
                                               
    
                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="exampleInputFile">Project Name / SL Number <span class="text-danger">*</span></label>
                                                    <select name="project_id" class="form-control" required>
                                                        <option disabled selected><= Choose Project Name =></option>
                                                        @foreach ($project_list as $row)
                                                            
                                                        <option value="{{ $row->id }}" class="text-info">{{ $row->project_name }} | {{ $row->project_sl }}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="form-group col-sm-12 col-lg-12 col-md-12">
                                                <label for="">Description <span class="text-danger">*</span></label>
                                                <input type="text" name="description" class="form-control" value="Lift Maintenance & Servicing Charge For" readonly> </input>
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
    

    