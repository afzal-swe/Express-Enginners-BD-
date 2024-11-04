


@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <h3>Statement Section</h3>
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
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <!-- /.card-header -->
                        
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                  <form class="form-horizontal form-label-left input_mask" action="{{ route('income_statement.store') }}" method="post">
                                    @csrf

                                          <div class="x_title">
                                            <h2>Daly Income Statement</h2><hr>
                                            <div class="clearfix"></div>
                                          </div>

                                          <div class="">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Date <span class="text-danger">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="date" class="form-control" name="income_date" value="{{ old('income_date') }}" required>
                                            </div>
                                          </div>

                                          <div class="">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">Particulars <span class="text-danger">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control" name="income_particulars" placeholder="Particulars" value="{{ old('income_particulars') }}" required>
                                            </div>
                                          </div>

                                          <div class="">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason <span class="text-danger">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" name="income_reason" value="{{ old('income_reason') }}" placeholder="Reason" required>
                                            </div>
                                          </div>

                                          <div class="">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount <span class="text-danger">*</span></label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control" name="income_amount" value="{{ old('income_amount') }}" placeholder="Amount" required>
                                              </div>
                                          </div>
     

                                     
                                        <br><hr>

                                            <div class="card-footer">
                                              <div class="ln_solid"></div>
                                              <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                  <a href="{{ route('daly_statement.store') }}" class="btn btn-primary" type="reset">Reset</a>
                                                  <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                              </div>
                                            </div>
                                        
                                    </form>
                                </div>
                              </div>
                       
                        <!-- /.card-body -->
                      </div>
                </div>











                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="card">
                      
                      <!-- /.card-header -->
                      
                          <div class="modal-content">
                             
                              <div class="modal-body">
                                <form class="form-horizontal form-label-left" action="{{ route('expense_statement_store') }}" method="POST">
                                  @csrf

                                        <div class="x_title">
                                          <h2>Daly Expense Statement</h2><hr>
                                          <div class="clearfix"></div>
                                        </div>

                                        <div class="">
                                          <label class="control-label col-md-12 col-sm-12 col-xs-12">Expense Date <span class="text-danger">*</span></label>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="date" class="form-control date" name="expense_date" value="{{ old('expense_date') }}" required>
                                          </div>
                                        </div>

                                        <div class="">
                                          <label class="control-label col-md-12 col-sm-12 col-xs-12">Particulars <span class="text-danger">*</span></label>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" name="expense_particulars" placeholder="Particulars" value="{{ old('expense_particulars') }}" required>
                                          </div>
                                        </div>

                                        <div class="">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason <span class="text-danger">*</span></label>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" name="expense_reason" value="{{ old('expense_reason') }}" placeholder="Reason" required>
                                          </div>
                                        </div>

                                        <div class="">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount <span class="text-danger">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" name="expense_amount" value="{{ old('expense_amount') }}" placeholder="Amount" required>
                                            </div>
                                        </div>
   

                                   
                                      <br><hr>

                                          <div class="card-footer">
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <a href="{{ route('daly_statement.store') }}" class="btn btn-primary" type="reset">Reset</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                              </div>
                                            </div>
                                          </div>
                                      
                                  </form>
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