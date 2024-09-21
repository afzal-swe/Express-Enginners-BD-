@extends('backend.layouts.app')
@section('content')



  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        

       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daly Statement</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            

            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daly Income Statement</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" action="{{ route('income_statement.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="date" class="form-control" name="income_date" value="{{ old('income_date') }}" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Particulars <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="income_particulars" placeholder="Particulars" value="{{ old('income_particulars') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="income_reason" value="{{ old('income_reason') }}" placeholder="Reason" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="income_amount" value="{{ old('income_amount') }}" placeholder="Amount" required>
                            </div>
                        </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						   <a href="{{ route('daly_statement.store') }}" class="btn btn-primary" type="reset">Reset</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daly Expense Statement
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="{{ route('expense_statement_store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="date" class="form-control" name="expense_date" value="{{ old('expense_date') }}" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Particulars <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="expense_particulars" placeholder="Particulars" value="{{ old('expense_particulars') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="expense_reason" value="{{ old('expense_reason') }}" placeholder="Reason" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="expense_amount" value="{{ old('expense_amount') }}" placeholder="Amount" required>
                            </div>
                        </div>
                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <a href="{{ route('daly_statement.store') }}" class="btn btn-primary" type="reset">Reset</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>


             
            </div>

          
          </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

@endsection